<?php
/**
 * contact_handler.php
 * Handles AJAX POST from the contact form and sends email via Gmail SMTP
 */

header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

require_once 'config.php';
require_once 'vendor/SimpleMailer.php';

// ── Sanitise & validate inputs ──────────────────────────────────────────────
function clean(string $val): string {
    return htmlspecialchars(trim($val), ENT_QUOTES, 'UTF-8');
}

$firstName = clean($_POST['firstName'] ?? '');
$lastName  = clean($_POST['lastName']  ?? '');
$email     = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$service   = clean($_POST['service']   ?? '');
$message   = clean($_POST['message']   ?? '');

if (!$firstName || !$lastName || !$email || !$message) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
    exit;
}

$fullName = "$firstName $lastName";

// ── Build the HTML email body ────────────────────────────────────────────────
$subject   = "💼 New Contact from $fullName — Portfolio";
$timestamp = date('F j, Y \a\t g:i A');
$ipAddress = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';

$htmlBody = <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<style>
  body{font-family:'Segoe UI',Arial,sans-serif;background:#0c1117;margin:0;padding:0;}
  .wrap{max-width:600px;margin:30px auto;background:#141c26;border-radius:16px;overflow:hidden;border:1px solid rgba(255,255,255,0.08);}
  .header{background:linear-gradient(135deg,#0d1f0f,#1a3d1f);padding:36px 36px 28px;border-bottom:2px solid #00e5a0;}
  .header h1{margin:0;font-size:22px;color:#fff;letter-spacing:-0.5px;}
  .header p{margin:6px 0 0;color:rgba(255,255,255,0.5);font-size:13px;}
  .dot{display:inline-block;width:8px;height:8px;border-radius:50%;background:#00e5a0;margin-right:8px;vertical-align:middle;}
  .body{padding:32px 36px;}
  .field{margin-bottom:20px;}
  .field label{display:block;font-size:11px;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:#6b8099;margin-bottom:6px;}
  .field value{display:block;font-size:15px;color:#e8edf2;line-height:1.6;}
  .message-box{background:#0c1117;border:1px solid rgba(255,255,255,0.07);border-radius:10px;padding:18px;margin-top:6px;}
  .message-box value{color:#c8d6e5;font-size:14px;line-height:1.8;}
  .badge{display:inline-block;padding:4px 12px;border-radius:50px;font-size:11px;font-weight:700;background:rgba(0,229,160,0.1);color:#00c988;border:1px solid rgba(0,229,160,0.25);}
  .footer{background:#0c1117;padding:20px 36px;font-size:12px;color:#3d5068;border-top:1px solid rgba(255,255,255,0.05);}
  hr{border:none;border-top:1px solid rgba(255,255,255,0.07);margin:20px 0;}
</style>
</head>
<body>
<div class="wrap">
  <div class="header">
    <h1><span class="dot"></span>New Message — Portfolio Contact Form</h1>
    <p>Received {$timestamp}</p>
  </div>
  <div class="body">
    <div class="field">
      <label>From</label>
      <value>{$fullName} &lt;{$email}&gt;</value>
    </div>
    <hr/>
    <div class="field">
      <label>Service Requested</label>
      <value><span class="badge">{$service}</span></value>
    </div>
    <hr/>
    <div class="field">
      <label>Message</label>
      <div class="message-box"><value>{$message}</value></div>
    </div>
    <hr/>
    <div class="field">
      <label>Reply To</label>
      <value><a href="mailto:{$email}" style="color:#00e5a0;text-decoration:none;">{$email}</a></value>
    </div>
  </div>
  <div class="footer">
    Sent from your portfolio contact form &nbsp;·&nbsp; IP: {$ipAddress}<br/>
    To reply, simply email <strong style="color:#c8d6e5;">{$email}</strong>
  </div>
</div>
</body>
</html>
HTML;

// ── Send the notification email ──────────────────────────────────────────────
$mailer = new SimpleMailer(
    str_replace(' ', '', GMAIL_APP_PASSWORD) ? GMAIL_ADDRESS : GMAIL_ADDRESS,
    str_replace(' ', '', GMAIL_APP_PASSWORD),
    GMAIL_FROM_NAME
);

// Check if App Password is still the placeholder
if (GMAIL_APP_PASSWORD === 'oios dmqm ipmv dwjm') {
    // Log to file as fallback (useful before password is configured)
    $logLine = "[{$timestamp}] FROM: {$fullName} <{$email}> | SERVICE: {$service} | MSG: {$message}" . PHP_EOL;
    @file_put_contents(__DIR__ . '/contact_log.txt', $logLine, FILE_APPEND | LOCK_EX);
    echo json_encode(['success' => true, 'message' => 'Message received! (Email delivery pending SMTP setup.)']);
    exit;
}

$sent = $mailer->send(
    NOTIFY_EMAIL,
    'Darrylle Tan',
    $subject,
    $htmlBody
);

// ── Also send auto-reply to the client ──────────────────────────────────────
if ($sent) {
    $replyHtml = <<<HTML
    <!DOCTYPE html><html><head><meta charset="UTF-8"/>
    <style>body{font-family:'Segoe UI',Arial,sans-serif;background:#f5f7f6;margin:0;padding:0;}
    .wrap{max-width:560px;margin:30px auto;background:#fff;border-radius:14px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.08);}
    .header{background:#0d3d35;padding:36px;text-align:center;}
    .header h1{color:#00e5a0;margin:0;font-size:24px;}
    .header p{color:rgba(255,255,255,0.6);margin:8px 0 0;font-size:13px;}
    .body{padding:32px;color:#2a2a2a;line-height:1.7;}
    .body p{margin:0 0 14px;}
    .highlight{color:#0d3d35;font-weight:700;}
    .footer{background:#f5f7f6;padding:18px 32px;font-size:12px;color:#999;text-align:center;}</style>
    </head><body><div class="wrap">
    <div class="header"><h1>Message Received! 🎉</h1><p>Darrylle A. Tan · Portfolio</p></div>
    <div class="body">
      <p>Hi <span class="highlight">{$firstName}</span>,</p>
      <p>Thank you for reaching out! I've received your message and will get back to you within <strong>24 hours</strong>.</p>
      <p><strong>What you submitted:</strong><br/>Service: <em>{$service}</em><br/>Message: <em>{$message}</em></p>
      <p>In the meantime, feel free to connect on <a href="https://www.linkedin.com/in/tandarrylle/" style="color:#0d3d35;">LinkedIn</a> or browse my projects at my portfolio.</p>
      <p>Talk soon,<br/><span class="highlight">Darrylle A. Tan</span><br/><span style="color:#888;font-size:13px;">tandarrylle@gmail.com · 09062075819</span></p>
    </div>
    <div class="footer">© 2025 Darrylle A. Tan Portfolio · Candelaria, Zambales, Philippines</div>
    </div></body></html>
HTML;

    $mailer->send(
        $email,
        $fullName,
        "Got your message, {$firstName}! I'll reply soon ✅",
        $replyHtml
    );
}

echo json_encode([
    'success' => $sent,
    'message' => $sent
        ? "Message sent! I'll get back to you within 24 hours."
        : 'Delivery failed. Please email me directly at tandarrylle@gmail.com',
]);
