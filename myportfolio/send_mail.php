<?php
/**
 * send_mail.php — Gmail SMTP mailer (no external library)
 * ─────────────────────────────────────────────────────────
 * HOW TO ACTIVATE (one-time setup):
 *
 *  1. Go to your Google Account → Security → 2-Step Verification → enable it.
 *  2. Go to https://myaccount.google.com/apppasswords
 *     App name: "Portfolio Contact Form"  → Generate → copy the 16-char password.
 *  3. Paste it below as GMAIL_APP_PASS (no spaces).
 *  4. Upload this file to your PHP host.
 *  5. Done — contact form submissions will arrive in your Gmail inbox.
 */

// ── CONFIGURATION ─────────────────────────────────────────
define('GMAIL_USER',     'tandarrylle@gmail.com');  // your Gmail address
define('GMAIL_APP_PASS', 'oios dmqm ipmv dwjm');    // <-- PASTE YOUR APP PASSWORD HERE
define('NOTIFY_TO',      'tandarrylle@gmail.com');  // where notifications go (same Gmail is fine)
define('SITE_NAME_CFG',  'Darrylle Tan Portfolio');
// ──────────────────────────────────────────────────────────

header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

// ── SANITIZE & VALIDATE ──────────────────────────────────
function clean(string $v): string {
    return htmlspecialchars(strip_tags(trim($v)), ENT_QUOTES, 'UTF-8');
}

$firstName = clean($_POST['firstName'] ?? '');
$lastName  = clean($_POST['lastName']  ?? '');
$email     = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$service   = clean($_POST['service']   ?? 'Not specified');
$message   = clean($_POST['message']   ?? '');

if (!$firstName || !$lastName || !$email || !$message) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid email address.']);
    exit;
}

// ── BUILD EMAIL CONTENT ──────────────────────────────────
$fullName    = $firstName . ' ' . $lastName;
$timestamp   = date('F j, Y — g:i A T');
$subjectLine = "💼 New Inquiry from {$fullName} — " . SITE_NAME_CFG;

// Plain-text fallback
$plainText = "NEW CONTACT FORM SUBMISSION\n"
           . "===========================\n\n"
           . "Name:      {$fullName}\n"
           . "Email:     {$email}\n"
           . "Service:   {$service}\n"
           . "Sent:      {$timestamp}\n\n"
           . "Message:\n{$message}\n\n"
           . "---\nReply directly to this email to respond to {$firstName}.";

// HTML email body
$htmlBody = <<<HTML
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"/></head>
<body style="margin:0;padding:0;background:#0c1117;font-family:'Segoe UI',Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#0c1117;padding:40px 20px;">
  <tr><td align="center">
    <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;background:#141c26;border-radius:16px;overflow:hidden;border:1px solid rgba(255,255,255,0.07);">

      <!-- Header -->
      <tr><td style="background:linear-gradient(135deg,#0d2a1a,#0a1f14);padding:32px 36px;border-bottom:2px solid #00e5a0;">
        <table width="100%" cellpadding="0" cellspacing="0">
          <tr>
            <td>
              <div style="display:inline-block;background:#00e5a0;border-radius:8px;width:36px;height:36px;text-align:center;line-height:36px;font-size:1.2rem;font-weight:800;color:#080c10;vertical-align:middle;margin-right:10px;">D</div>
              <span style="color:#ffffff;font-size:1.1rem;font-weight:700;vertical-align:middle;">Darrylle Tan · Portfolio</span>
            </td>
            <td align="right">
              <span style="background:rgba(0,229,160,0.12);border:1px solid rgba(0,229,160,0.3);border-radius:50px;padding:4px 14px;font-size:0.75rem;font-weight:600;color:#00e5a0;letter-spacing:0.08em;">NEW INQUIRY</span>
            </td>
          </tr>
        </table>
      </td></tr>

      <!-- Title -->
      <tr><td style="padding:28px 36px 8px;">
        <h1 style="margin:0;font-size:1.5rem;font-weight:700;color:#ffffff;letter-spacing:-0.02em;">
          You've got a new message 💼
        </h1>
        <p style="margin:8px 0 0;font-size:0.9rem;color:#6b8099;">Received: {$timestamp}</p>
      </td></tr>

      <!-- Info Grid -->
      <tr><td style="padding:20px 36px;">
        <table width="100%" cellpadding="0" cellspacing="0" style="background:#0c1117;border-radius:12px;border:1px solid rgba(255,255,255,0.07);overflow:hidden;">
          <tr>
            <td style="padding:14px 18px;border-bottom:1px solid rgba(255,255,255,0.05);">
              <span style="display:block;font-size:0.68rem;font-weight:600;letter-spacing:0.1em;text-transform:uppercase;color:#3d5068;margin-bottom:3px;">Full Name</span>
              <span style="font-size:0.95rem;color:#e8edf2;font-weight:600;">{$fullName}</span>
            </td>
          </tr>
          <tr>
            <td style="padding:14px 18px;border-bottom:1px solid rgba(255,255,255,0.05);">
              <span style="display:block;font-size:0.68rem;font-weight:600;letter-spacing:0.1em;text-transform:uppercase;color:#3d5068;margin-bottom:3px;">Email Address</span>
              <a href="mailto:{$email}" style="font-size:0.95rem;color:#00e5a0;font-weight:500;text-decoration:none;">{$email}</a>
            </td>
          </tr>
          <tr>
            <td style="padding:14px 18px;">
              <span style="display:block;font-size:0.68rem;font-weight:600;letter-spacing:0.1em;text-transform:uppercase;color:#3d5068;margin-bottom:3px;">Service Requested</span>
              <span style="background:rgba(0,229,160,0.1);border:1px solid rgba(0,229,160,0.2);border-radius:50px;padding:3px 12px;font-size:0.82rem;font-weight:600;color:#00c988;">{$service}</span>
            </td>
          </tr>
        </table>
      </td></tr>

      <!-- Message -->
      <tr><td style="padding:0 36px 28px;">
        <div style="font-size:0.72rem;font-weight:600;letter-spacing:0.1em;text-transform:uppercase;color:#3d5068;margin-bottom:10px;">Message</div>
        <div style="background:#0c1117;border-left:3px solid #00e5a0;border-radius:0 10px 10px 0;padding:18px 20px;font-size:0.92rem;color:#c8d6e5;line-height:1.8;white-space:pre-wrap;">{$message}</div>
      </td></tr>

      <!-- CTA -->
      <tr><td style="padding:0 36px 32px;" align="center">
        <a href="mailto:{$email}?subject=Re: Your inquiry via Darrylle Tan Portfolio"
           style="display:inline-block;background:#00e5a0;color:#080c10;font-size:0.9rem;font-weight:700;padding:12px 32px;border-radius:50px;text-decoration:none;letter-spacing:0.01em;">
          Reply to {$firstName} →
        </a>
      </td></tr>

      <!-- Footer -->
      <tr><td style="padding:18px 36px;border-top:1px solid rgba(255,255,255,0.06);text-align:center;">
        <p style="margin:0;font-size:0.75rem;color:#3d5068;">
          This notification was sent from your portfolio contact form at tandarrylle@gmail.com
        </p>
      </td></tr>

    </table>
  </td></tr>
</table>
</body>
</html>
HTML;

// ── SEND VIA GMAIL SMTP (PHP socket) ────────────────────
$result = sendGmailSmtp(
    GMAIL_USER,
    GMAIL_APP_PASS,
    NOTIFY_TO,
    $email,         // reply-to
    $fullName,
    $subjectLine,
    $htmlBody,
    $plainText
);

if ($result['success']) {
    echo json_encode(['success' => true, 'message' => 'Message sent! I\'ll get back to you within 24 hours.']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Could not send message. Please email me directly at tandarrylle@gmail.com']);
    // Optional: error_log('Mail error: ' . $result['error']);
}

// ─────────────────────────────────────────────────────────
// GMAIL SMTP FUNCTION (pure PHP, no PHPMailer needed)
// ─────────────────────────────────────────────────────────
function sendGmailSmtp(
    string $gmailUser,
    string $appPass,
    string $toEmail,
    string $replyTo,
    string $replyToName,
    string $subject,
    string $htmlBody,
    string $textBody
): array {
    $host    = 'smtp.gmail.com';
    $port    = 587;
    $timeout = 20;

    // Open socket
    $errno = 0; $errstr = '';
    $sock = @fsockopen($host, $port, $errno, $errstr, $timeout);
    if (!$sock) return ['success' => false, 'error' => "Connection failed: $errstr ($errno)"];

    stream_set_timeout($sock, $timeout);

    $boundary = '----=_Part_' . md5(uniqid());
    $from_name = SITE_NAME_CFG . ' Contact Form';

    // MIME multipart message
    $mime  = "MIME-Version: 1.0\r\n";
    $mime .= "Content-Type: multipart/alternative; boundary=\"{$boundary}\"\r\n\r\n";
    $mime .= "--{$boundary}\r\n";
    $mime .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $mime .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $mime .= $textBody . "\r\n\r\n";
    $mime .= "--{$boundary}\r\n";
    $mime .= "Content-Type: text/html; charset=UTF-8\r\n";
    $mime .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $mime .= chunk_split(base64_encode($htmlBody)) . "\r\n";
    $mime .= "--{$boundary}--";

    $encodedSubject = '=?UTF-8?B?' . base64_encode($subject) . '?=';

    // SMTP conversation
    function smtpSend($sock, string $cmd): string {
        fwrite($sock, $cmd . "\r\n");
        $resp = '';
        while ($line = fgets($sock, 515)) {
            $resp .= $line;
            if (strlen($line) >= 4 && $line[3] === ' ') break;
        }
        return $resp;
    }

    try {
        fgets($sock, 515); // 220 banner
        smtpSend($sock, "EHLO portfolio.local");
        smtpSend($sock, "STARTTLS");

        // Upgrade to TLS
        stream_socket_enable_crypto($sock, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);

        smtpSend($sock, "EHLO portfolio.local");
        smtpSend($sock, "AUTH LOGIN");
        smtpSend($sock, base64_encode($gmailUser));
        $authResp = smtpSend($sock, base64_encode($appPass));

        if (strpos($authResp, '235') === false) {
            fclose($sock);
            return ['success' => false, 'error' => 'AUTH failed. Check App Password. Response: ' . $authResp];
        }

        smtpSend($sock, "MAIL FROM:<{$gmailUser}>");
        smtpSend($sock, "RCPT TO:<{$toEmail}>");
        smtpSend($sock, "DATA");

        // Build full message headers + body
        $message  = "From: =?UTF-8?B?" . base64_encode($from_name) . "?= <{$gmailUser}>\r\n";
        $message .= "To: {$toEmail}\r\n";
        $message .= "Reply-To: =?UTF-8?B?" . base64_encode($replyToName) . "?= <{$replyTo}>\r\n";
        $message .= "Subject: {$encodedSubject}\r\n";
        $message .= "Date: " . date('r') . "\r\n";
        $message .= $mime;

        fwrite($sock, $message . "\r\n.\r\n");
        $sendResp = '';
        while ($line = fgets($sock, 515)) {
            $sendResp .= $line;
            if (strlen($line) >= 4 && $line[3] === ' ') break;
        }

        smtpSend($sock, "QUIT");
        fclose($sock);

        if (strpos($sendResp, '250') !== false) {
            return ['success' => true];
        }
        return ['success' => false, 'error' => 'Send failed: ' . $sendResp];

    } catch (Throwable $e) {
        fclose($sock);
        return ['success' => false, 'error' => $e->getMessage()];
    }
}
