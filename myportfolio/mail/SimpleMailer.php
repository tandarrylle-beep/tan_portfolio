<?php
/**
 * SimpleMailer — Minimal Gmail SMTP mailer
 * No Composer needed. Drop this file in your project.
 * Uses PHP's built-in socket functions.
 */

class SimpleMailer {
    public string  $Host       = 'smtp.gmail.com';
    public int     $Port       = 587;
    public string  $Username   = '';
    public string  $Password   = '';
    public string  $FromEmail  = '';
    public string  $FromName   = '';
    public string  $Subject    = '';
    public string  $Body       = '';       // HTML body
    public string  $AltBody    = '';       // Plain text fallback
    public string  $ErrorInfo  = '';

    private array  $to         = [];
    private array  $replyTo    = [];
    private        $sock;

    public function addAddress(string $email, string $name = ''): void {
        $this->to[] = ['email' => $email, 'name' => $name];
    }
    public function addReplyTo(string $email, string $name = ''): void {
        $this->replyTo[] = ['email' => $email, 'name' => $name];
    }
    public function isHTML(bool $flag = true): void {} // compatibility stub

    public function send(): bool {
        try {
            // Open SMTP connection (STARTTLS)
            $this->sock = fsockopen('tcp://' . $this->Host, $this->Port, $errno, $errstr, 10);
            if (!$this->sock) throw new \RuntimeException("Connection failed: $errstr ($errno)");
            stream_set_timeout($this->sock, 15);

            $this->expect('220');
            $this->cmd("EHLO " . gethostname());
            $this->expect('250');
            $this->cmd("STARTTLS");
            $this->expect('220');

            // Upgrade to TLS
            if (!stream_socket_enable_crypto($this->sock, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
                throw new \RuntimeException("TLS negotiation failed");
            }

            $this->cmd("EHLO " . gethostname());
            $this->expect('250');
            $this->cmd("AUTH LOGIN");
            $this->expect('334');
            $this->cmd(base64_encode($this->Username));
            $this->expect('334');
            $this->cmd(base64_encode($this->Password));
            $this->expect('235');

            $this->cmd("MAIL FROM:<{$this->FromEmail}>");
            $this->expect('250');

            foreach ($this->to as $r) {
                $this->cmd("RCPT TO:<{$r['email']}>");
                $this->expect('250');
            }

            $this->cmd("DATA");
            $this->expect('354');

            $headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: multipart/alternative; boundary=\"_PORT_BOUNDARY_\"\r\n";
            $headers .= "From: {$this->FromName} <{$this->FromEmail}>\r\n";
            $headers .= "To: " . $this->formatAddresses($this->to) . "\r\n";
            if (!empty($this->replyTo)) {
                $headers .= "Reply-To: " . $this->formatAddresses($this->replyTo) . "\r\n";
            }
            $headers .= "Subject: =?UTF-8?B?" . base64_encode($this->Subject) . "?=\r\n";
            $headers .= "Date: " . date('r') . "\r\n";
            $headers .= "X-Mailer: PortfolioMailer/1.0\r\n";

            $plain = $this->AltBody ?: strip_tags($this->Body);
            $body  = "--_PORT_BOUNDARY_\r\n";
            $body .= "Content-Type: text/plain; charset=UTF-8\r\nContent-Transfer-Encoding: base64\r\n\r\n";
            $body .= chunk_split(base64_encode($plain)) . "\r\n";
            $body .= "--_PORT_BOUNDARY_\r\n";
            $body .= "Content-Type: text/html; charset=UTF-8\r\nContent-Transfer-Encoding: base64\r\n\r\n";
            $body .= chunk_split(base64_encode($this->Body)) . "\r\n";
            $body .= "--_PORT_BOUNDARY_--\r\n";

            $msg = $headers . "\r\n" . $body;
            // Dot-stuffing
            $msg = str_replace("\n.", "\n..", $msg);
            $this->write($msg . "\r\n.");
            $this->expect('250');

            $this->cmd("QUIT");
            fclose($this->sock);
            return true;

        } catch (\Throwable $e) {
            $this->ErrorInfo = $e->getMessage();
            if (isset($this->sock) && is_resource($this->sock)) fclose($this->sock);
            return false;
        }
    }

    private function formatAddresses(array $list): string {
        return implode(', ', array_map(fn($r) =>
            $r['name'] ? "\"{$r['name']}\" <{$r['email']}>" : $r['email'], $list));
    }
    private function cmd(string $c): void { $this->write($c . "\r\n"); }
    private function write(string $data): void { fwrite($this->sock, $data); }
    private function expect(string $code): string {
        $resp = '';
        while (($line = fgets($this->sock, 512)) !== false) {
            $resp .= $line;
            if (strlen($line) >= 4 && $line[3] === ' ') break;
        }
        if (substr(trim($resp), 0, 3) !== $code) {
            throw new \RuntimeException("Expected $code, got: " . trim($resp));
        }
        return $resp;
    }
}
