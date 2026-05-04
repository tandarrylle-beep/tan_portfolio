<?php
/**
 * SimpleMailer — Lightweight Gmail SMTP mailer
 * Uses PHP stream sockets (no external dependencies needed)
 * Works with Gmail App Password (2FA required on Google account)
 */
class SimpleMailer {

    private string $host     = 'smtp.gmail.com';
    private int    $port     = 587;
    private string $username = '';
    private string $password = '';
    private string $fromName = '';
    private string $fromEmail= '';

    private $socket = null;
    private array  $log = [];

    public function __construct(string $username, string $password, string $fromName = '') {
        $this->username  = $username;
        $this->password  = $password;
        $this->fromEmail = $username;
        $this->fromName  = $fromName ?: $username;
    }

    public function send(string $toEmail, string $toName, string $subject, string $htmlBody, string $textBody = ''): bool {
        try {
            // Connect
            $this->socket = fsockopen('tcp://' . $this->host, $this->port, $errno, $errstr, 10);
            if (!$this->socket) throw new \Exception("Connection failed: $errstr ($errno)");
            stream_set_timeout($this->socket, 15);

            $this->expect('220');

            // EHLO
            $this->send_cmd("EHLO " . ($_SERVER['HTTP_HOST'] ?? 'localhost'));
            $this->expect('250');

            // STARTTLS
            $this->send_cmd("STARTTLS");
            $this->expect('220');
            if (!stream_socket_enable_crypto($this->socket, true, STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT)) {
                throw new \Exception("TLS failed");
            }

            // Re-EHLO after TLS
            $this->send_cmd("EHLO " . ($_SERVER['HTTP_HOST'] ?? 'localhost'));
            $this->expect('250');

            // AUTH LOGIN
            $this->send_cmd("AUTH LOGIN");
            $this->expect('334');
            $this->send_cmd(base64_encode($this->username));
            $this->expect('334');
            $this->send_cmd(base64_encode($this->password));
            $this->expect('235');

            // MAIL FROM
            $this->send_cmd("MAIL FROM:<{$this->fromEmail}>");
            $this->expect('250');

            // RCPT TO
            $this->send_cmd("RCPT TO:<{$toEmail}>");
            $this->expect('250');

            // DATA
            $this->send_cmd("DATA");
            $this->expect('354');

            // Build message
            $boundary = md5(uniqid((string)mt_rand(), true));
            $date     = date('r');

            $headers  = "Date: $date\r\n";
            $headers .= "From: =?UTF-8?B?" . base64_encode($this->fromName) . "?= <{$this->fromEmail}>\r\n";
            $headers .= "To: =?UTF-8?B?" . base64_encode($toName) . "?= <{$toEmail}>\r\n";
            $headers .= "Subject: =?UTF-8?B?" . base64_encode($subject) . "?=\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: multipart/alternative; boundary=\"$boundary\"\r\n";
            $headers .= "X-Mailer: Portfolio-SimpleMailer/1.0\r\n";

            $plain = $textBody ?: strip_tags(str_replace(['<br>', '<br/>', '</p>', '</div>'], "\n", $htmlBody));

            $body  = "--$boundary\r\n";
            $body .= "Content-Type: text/plain; charset=UTF-8\r\nContent-Transfer-Encoding: base64\r\n\r\n";
            $body .= chunk_split(base64_encode($plain)) . "\r\n";
            $body .= "--$boundary\r\n";
            $body .= "Content-Type: text/html; charset=UTF-8\r\nContent-Transfer-Encoding: base64\r\n\r\n";
            $body .= chunk_split(base64_encode($htmlBody)) . "\r\n";
            $body .= "--$boundary--\r\n";

            fwrite($this->socket, $headers . "\r\n" . $body . "\r\n.\r\n");
            $this->expect('250');

            $this->send_cmd("QUIT");
            fclose($this->socket);
            return true;

        } catch (\Exception $e) {
            $this->log[] = "ERROR: " . $e->getMessage();
            if ($this->socket) @fclose($this->socket);
            return false;
        }
    }

    private function send_cmd(string $cmd): void {
        fwrite($this->socket, $cmd . "\r\n");
        $this->log[] = "> $cmd";
    }

    private function read_response(): string {
        $resp = '';
        while ($line = fgets($this->socket, 512)) {
            $resp .= $line;
            if ($line[3] === ' ') break; // last line of multi-line response
        }
        $this->log[] = "< " . trim($resp);
        return $resp;
    }

    private function expect(string $code): void {
        $resp = $this->read_response();
        if (substr($resp, 0, 3) !== $code) {
            throw new \Exception("Expected $code, got: " . trim($resp));
        }
    }

    public function getLog(): array { return $this->log; }
}
