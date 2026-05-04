<?php
require_once 'config.php';
$page_title = 'Contact — ' . SITE_NAME;
$page_desc  = 'Get in touch with ' . $personal['name'] . ' for full-time, part-time, or gig-based projects.';
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
    <p class="page-hero-sub">
      Open to full-time roles, part-time positions, and gig-based projects. Let's build something great together.
    </p>
  </div>
</div>

<!-- CONTACT MAIN -->
<section class="section">
  <div class="container">
    <div class="contact-grid">

      <!-- ── LEFT: Info ── -->
      <div class="reveal">
        <span class="label">Contact Info</span>
        <h2 class="section-title" style="font-size:clamp(1.6rem,3vw,2.2rem);">
          Let's Work <span class="outline">Together</span>
        </h2>
        <p style="font-size:.95rem;font-weight:300;color:var(--muted);line-height:1.9;margin-top:1rem;">
          I'm currently open to opportunities across different arrangements — whether you need a dedicated team member, a flexible collaborator, or a specialist for a specific project.
        </p>

        <!-- Availability Types -->
        <div class="avail-types">
          <div class="avail-type">
            <div class="avail-type-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" width="18" height="18">
                <rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/>
              </svg>
            </div>
            <div>
              <div class="avail-type-label">Full-Time</div>
              <div class="avail-type-sub">Open to full-time on-site or remote roles</div>
            </div>
            <span class="avail-type-badge">Open</span>
          </div>
          <div class="avail-type">
            <div class="avail-type-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" width="18" height="18">
                <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
              </svg>
            </div>
            <div>
              <div class="avail-type-label">Part-Time</div>
              <div class="avail-type-sub">Flexible part-time or contract positions</div>
            </div>
            <span class="avail-type-badge">Open</span>
          </div>
          <div class="avail-type">
            <div class="avail-type-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" width="18" height="18">
                <path d="M14.5 10c-.83 0-1.5-.67-1.5-1.5v-5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5z"/>
                <path d="M20.5 10H19V8.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                <path d="M9.5 14c.83 0 1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5S8 21.33 8 20.5v-5c0-.83.67-1.5 1.5-1.5z"/>
                <path d="M3.5 14H5v1.5c0 .83-.67 1.5-1.5 1.5S2 16.33 2 15.5 2.67 14 3.5 14z"/>
                <path d="M14 14.5c0-.83.67-1.5 1.5-1.5h5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-5c-.83 0-1.5-.67-1.5-1.5z"/>
                <path d="M15.5 19H14v1.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5-.67-1.5-1.5-1.5z"/>
                <path d="M10 9.5C10 8.67 9.33 8 8.5 8h-5C2.67 8 2 8.67 2 9.5S2.67 11 3.5 11h5c.83 0 1.5-.67 1.5-1.5z"/>
                <path d="M8.5 5H10V3.5C10 2.67 9.33 2 8.5 2S7 2.67 7 3.5 7.67 5 8.5 5z"/>
              </svg>
            </div>
            <div>
              <div class="avail-type-label">Gig / Project-Based</div>
              <div class="avail-type-sub">One-time or short-term project engagements</div>
            </div>
            <span class="avail-type-badge">Open</span>
          </div>
        </div>

        <!-- Contact Info Cards -->
        <div class="contact-info-list">
          <div class="contact-info-item">
            <div class="contact-icon-wrap">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                <polyline points="22,6 12,13 2,6"/>
              </svg>
            </div>
            <div>
              <div class="contact-item-label">Email</div>
              <div class="contact-item-val">
                <a href="mailto:<?= htmlspecialchars($personal['email']) ?>" style="color:inherit;">
                  <?= htmlspecialchars($personal['email']) ?>
                </a>
              </div>
            </div>
          </div>

          <div class="contact-info-item">
            <div class="contact-icon-wrap">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.8 19.79 19.79 0 01.0 1.12 2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.08 6.08l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>
              </svg>
            </div>
            <div>
              <div class="contact-item-label">Phone</div>
              <div class="contact-item-val"><?= htmlspecialchars($personal['phone']) ?></div>
            </div>
          </div>

          <div class="contact-info-item">
            <div class="contact-icon-wrap">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                <circle cx="12" cy="10" r="3"/>
              </svg>
            </div>
            <div>
              <div class="contact-item-label">Location</div>
              <div class="contact-item-val"><?= htmlspecialchars($personal['location']) ?></div>
            </div>
          </div>
        </div>

        <!-- Social -->
        <div style="margin-top:2rem;">
          <div style="font-size:.75rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--dim);margin-bottom:1rem;">
            Connect with me
          </div>
          <div style="display:flex;gap:.75rem;">
            <?php foreach ($socials as $s): ?>
            <a href="<?= $s['url'] ?>" target="_blank" rel="noopener" class="social-btn"
               style="width:44px;height:44px;flex:0 0 44px;border-radius:10px;"
               title="<?= $s['label'] ?>">
              <?= strtoupper($s['short']) ?>
            </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div><!-- /left -->

      <!-- ── RIGHT: Form ── -->
      <div class="contact-form-card reveal d1">
        <div class="form-title">Send a Message</div>
        <div class="form-sub">I respond within 24 hours. All fields marked * are required.</div>

        <!-- Status messages -->
        <div class="form-alert form-alert-success" id="formSuccess" style="display:none;">
          ✅ Message sent successfully! I'll get back to you within 24 hours.
        </div>
        <div class="form-alert form-alert-error" id="formError" style="display:none;"></div>

        <form id="contactForm" novalidate>
          <div class="form-row">
            <div class="form-group">
              <label for="firstName">First Name *</label>
              <input type="text" id="firstName" name="firstName" placeholder="Juan" required autocomplete="given-name"/>
            </div>
            <div class="form-group">
              <label for="lastName">Last Name *</label>
              <input type="text" id="lastName" name="lastName" placeholder="dela Cruz" required autocomplete="family-name"/>
            </div>
          </div>

          <div class="form-group">
            <label for="email">Email Address *</label>
            <input type="email" id="email" name="email" placeholder="juan@example.com" required autocomplete="email"/>
          </div>

          <div class="form-group">
            <label for="workType">Work Arrangement</label>
            <select id="workType" name="workType">
              <option value="Not specified">Select arrangement...</option>
              <option value="Full-Time">Full-Time Position</option>
              <option value="Part-Time">Part-Time Position</option>
              <option value="Gig / Project-Based">Gig / Project-Based</option>
              <option value="Internship / Training">Internship / Training</option>
            </select>
          </div>

          <div class="form-group">
            <label for="service">Service Needed</label>
            <select id="service" name="service">
              <option value="Not specified">Select a service...</option>
              <?php foreach ($services as $svc): ?>
              <option value="<?= htmlspecialchars($svc['name']) ?>"><?= htmlspecialchars($svc['name']) ?></option>
              <?php endforeach; ?>
              <option value="Multiple Services">Multiple Services</option>
              <option value="Other / Not Sure">Other / Not Sure</option>
            </select>
          </div>

          <div class="form-group" style="margin-bottom:1.5rem;">
            <label for="message">Your Message *</label>
            <textarea id="message" name="message"
              placeholder="Tell me about your project, role, timeline, and budget..." required></textarea>
          </div>

          <button type="submit" class="btn-submit" id="submitBtn">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" width="18" height="18">
              <line x1="22" y1="2" x2="11" y2="13"/>
              <polygon points="22 2 15 22 11 13 2 9 22 2"/>
            </svg>
            <span id="submitText">Send Message</span>
          </button>
        </form>

        <p style="font-size:.73rem;color:var(--dim);text-align:center;margin-top:1rem;">
          Your information is private and never shared with third parties.
        </p>
      </div>

    </div><!-- /contact-grid -->
  </div>
</section>

<!-- AVAILABILITY STYLES -->
<style>
.avail-types {
  display:flex;flex-direction:column;gap:.75rem;
  margin:1.75rem 0;
}
.avail-type {
  display:flex;align-items:center;gap:1rem;
  padding:1rem 1.2rem;
  background:var(--surface);
  border:1px solid var(--border);
  border-radius:12px;
  transition:border-color .2s;
}
.avail-type:hover { border-color:var(--border2); }
.avail-type-icon {
  width:38px;height:38px;flex-shrink:0;
  background:var(--accent-dim);border-radius:9px;
  display:flex;align-items:center;justify-content:center;
  color:var(--accent);
}
.avail-type-label {
  font-size:.88rem;font-weight:600;color:var(--off-white);margin-bottom:2px;
}
.avail-type-sub {
  font-size:.77rem;color:var(--muted);
}
.avail-type-badge {
  margin-left:auto;flex-shrink:0;
  font-size:.68rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;
  background:rgba(0,229,160,.1);color:var(--accent2);
  border:1px solid rgba(0,229,160,.2);
  padding:3px 12px;border-radius:50px;
}

/* Alert messages */
.form-alert {
  border-radius:10px;padding:1rem 1.2rem;
  font-size:.88rem;font-weight:500;margin-bottom:1.25rem;
}
.form-alert-success {
  background:rgba(0,229,160,.08);
  border:1px solid rgba(0,229,160,.25);
  color:var(--accent2);
}
.form-alert-error {
  background:rgba(255,80,80,.08);
  border:1px solid rgba(255,80,80,.2);
  color:#ff8080;
}
</style>

<?php include 'components/footer.php'; ?>
<script src="assets/js/main.js"></script>
<script>
// ── CONTACT FORM → send_mail.php ──
document.getElementById('contactForm').addEventListener('submit', async function(e) {
  e.preventDefault();

  const btn      = document.getElementById('submitBtn');
  const btnText  = document.getElementById('submitText');
  const successEl = document.getElementById('formSuccess');
  const errorEl   = document.getElementById('formError');

  // Hide previous messages
  successEl.style.display = 'none';
  errorEl.style.display   = 'none';

  // Client-side validation
  const required = ['firstName','lastName','email','message'];
  let valid = true;
  required.forEach(id => {
    const el = document.getElementById(id);
    if (!el.value.trim()) {
      el.style.borderColor = '#ff6b6b';
      valid = false;
    } else {
      el.style.borderColor = '';
    }
  });
  if (!valid) {
    errorEl.textContent = 'Please fill in all required fields.';
    errorEl.style.display = 'block';
    return;
  }

  // Email format check
  const emailEl = document.getElementById('email');
  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailEl.value.trim())) {
    emailEl.style.borderColor = '#ff6b6b';
    errorEl.textContent = 'Please enter a valid email address.';
    errorEl.style.display = 'block';
    return;
  }

  // Loading state
  btn.disabled = true;
  btnText.textContent = 'Sending…';
  btn.style.opacity = '0.75';

  try {
    const formData = new FormData(this);
    const response = await fetch('send_mail.php', {
      method: 'POST',
      body: formData
    });

    const data = await response.json();

    if (data.success) {
      successEl.style.display = 'block';
      successEl.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      this.reset();
      btnText.textContent = 'Message Sent ✓';
      btn.style.background = 'var(--accent2)';
      setTimeout(() => {
        btnText.textContent = 'Send Message';
        btn.disabled = false;
        btn.style.opacity = '';
        btn.style.background = '';
      }, 5000);
    } else {
      errorEl.textContent = data.message || 'Something went wrong. Please try again.';
      errorEl.style.display = 'block';
      btnText.textContent = 'Send Message';
      btn.disabled = false;
      btn.style.opacity = '';
    }
  } catch (err) {
    errorEl.textContent = 'Network error. Please email me directly at tandarrylle@gmail.com';
    errorEl.style.display = 'block';
    btnText.textContent = 'Send Message';
    btn.disabled = false;
    btn.style.opacity = '';
  }
});

// Clear red borders on input
['firstName','lastName','email','message'].forEach(id => {
  document.getElementById(id)?.addEventListener('input', function() {
    this.style.borderColor = '';
    document.getElementById('formError').style.display = 'none';
  });
});
</script>
</body>
</html>
