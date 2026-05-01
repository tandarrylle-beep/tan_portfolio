<?php
require_once 'config.php';
$page_title = 'Contact — ' . SITE_NAME;
$page_desc  = 'Get in touch with ' . $personal['name'] . ' for freelance projects, collaborations, or inquiries.';
include 'components/head.php';
include 'components/nav.php';
?>

<!-- PAGE HERO -->
<div class="page-hero">
  <div class="page-hero-circles" aria-hidden="true">
    <div class="phc" style="width:500px;height:500px;bottom:-150px;right:-100px;"></div>
    <div class="phc" style="width:220px;height:220px;top:60px;right:200px;border-color:rgba(0,229,160,0.06);"></div>
  </div>
  <div class="page-hero-inner">
    <div class="breadcrumb">Home <span>/ Contact</span></div>
    <h1 class="page-hero-title">Get in <span class="outline">Touch</span></h1>
    <p class="page-hero-sub">Have a project in mind? I'd love to hear about it. Let's build something great together.</p>
  </div>
</div>

<!-- CONTACT MAIN -->
<section class="section">
  <div class="container">
    <div class="contact-grid">

      <!-- Left: Info -->
      <div class="reveal">
        <span class="label">Contact Info</span>
        <h2 class="section-title" style="font-size:clamp(1.6rem,3vw,2.2rem);">Let's Work <span class="outline">Together</span></h2>
        <p style="font-size:0.95rem;font-weight:300;color:var(--muted);line-height:1.9;margin-top:1rem;">
          I'm currently available for freelance projects. Whether you need a website, mobile app, database, or data solution — let's talk.
        </p>

        <div class="contact-info-list">
          <div class="contact-info-item">
            <div class="contact-icon-wrap">
              <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            </div>
            <div>
              <div class="contact-item-label">Email</div>
              <div class="contact-item-val"><?= htmlspecialchars($personal['email']) ?></div>
            </div>
          </div>

          <div class="contact-info-item">
            <div class="contact-icon-wrap">
              <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.8a19.79 19.79 0 01-3.07-8.68A2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.08 6.08l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
            </div>
            <div>
              <div class="contact-item-label">Phone</div>
              <div class="contact-item-val"><?= htmlspecialchars($personal['phone']) ?></div>
            </div>
          </div>

          <div class="contact-info-item">
            <div class="contact-icon-wrap">
              <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <div>
              <div class="contact-item-label">Location</div>
              <div class="contact-item-val"><?= htmlspecialchars($personal['location']) ?></div>
            </div>
          </div>
        </div>

        <div class="avail-badge">
          <span class="avail-dot"></span>
          Available for Freelance Work
        </div>

        <!-- Social links -->
        <div style="margin-top:2rem;">
          <div style="font-size:0.78rem;font-weight:600;letter-spacing:0.1em;text-transform:uppercase;color:var(--dim);margin-bottom:1rem;">Follow me on</div>
          <div style="display:flex;gap:0.75rem;">
            <?php foreach ($socials as $s): ?>
            <a href="<?= $s['url'] ?>" target="_blank" rel="noopener" class="social-btn" title="<?= $s['label'] ?>" style="width:44px;height:44px;flex:0 0 44px;border-radius:10px;">
              <?= strtoupper($s['short']) ?>
            </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- Right: Form -->
      <div class="contact-form-card reveal d1">
        <div class="form-title">Send a Message</div>
        <div class="form-sub">Fill in the form and I'll get back to you within 24 hours.</div>

        <form id="contactForm" novalidate>
          <div class="form-row">
            <div class="form-group">
              <label for="firstName">First Name</label>
              <input type="text" id="firstName" name="firstName" placeholder="John" required/>
            </div>
            <div class="form-group">
              <label for="lastName">Last Name</label>
              <input type="text" id="lastName" name="lastName" placeholder="Doe" required/>
            </div>
          </div>

          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="john@example.com" required/>
          </div>

          <div class="form-group">
            <label for="service">Service Needed</label>
            <select id="service" name="service">
              <option value="">Select a service...</option>
              <?php foreach ($services as $svc): ?>
              <option value="<?= htmlspecialchars($svc['name']) ?>"><?= htmlspecialchars($svc['name']) ?></option>
              <?php endforeach; ?>
              <option value="other">Other / Not Sure</option>
            </select>
          </div>

          <div class="form-group" style="margin-bottom:1.5rem;">
            <label for="message">Your Message</label>
            <textarea id="message" name="message" placeholder="Tell me about your project, timeline, and budget..." required></textarea>
          </div>

          <button type="submit" class="btn-submit">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
              <line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/>
            </svg>
            Send Message
          </button>
        </form>

        <div class="success-msg" id="successMsg">
          ✅ Message sent! I'll get back to you within 24 hours.
        </div>

        <p style="font-size:0.75rem;color:var(--dim);text-align:center;margin-top:1rem;">
          Your information is kept private and never shared.
        </p>
      </div>

    </div><!-- /contact-grid -->
  </div>
</section>

<?php include 'components/footer.php'; ?>
<script src="assets/js/main.js"></script>
</body>
</html>
