<?php
require_once 'config.php';
$page_title = 'Services — ' . SITE_NAME;
$page_desc  = 'Freelance services offered by ' . $personal['name'] . ': Web Development, Mobile Apps, UI/UX Design, AI Integration, Database Management';
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
    <div class="breadcrumb">Home <span>/ Services</span></div>
    <h1 class="page-hero-title">My <span class="outline">Services</span></h1>
    <p class="page-hero-sub">Six disciplines. One developer. From pixel-perfect designs to automated workflows and clean databases — I cover it end to end.</p>
  </div>
</div>

<!-- SERVICES GRID (Full Detail) -->
<section class="section" id="services-list">
  <div class="container">
    <div class="reveal" style="margin-bottom:1rem;">
      <span class="label">What I Offer</span>
      <h2 class="section-title">How I Can <span class="outline">Help You</span></h2>
    </div>

    <!-- Detailed 2-column cards -->
    <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:1.5rem;margin-top:3.5rem;" class="reveal d1">
      <?php foreach ($services as $i => $svc): $delay = "d" . ($i % 3); ?>
      <div class="service-detail-card reveal <?= $delay ?>" style="
        background:var(--surface);
        border:1px solid var(--border);
        border-radius:16px;
        padding:2.5rem;
        transition:border-color 0.3s, transform 0.3s var(--ease-spring), box-shadow 0.4s;
        position:relative;overflow:hidden;
      ">
        <style>
          .service-detail-card:hover{border-color:var(--border2);transform:translateY(-4px);box-shadow:0 20px 60px rgba(0,0,0,0.3);}
          .service-detail-card::before{content:'';position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--accent),transparent);transform:scaleX(0);transform-origin:left;transition:transform 0.4s var(--ease);}
          .service-detail-card:hover::before{transform:scaleX(1);}
        </style>

        <div style="display:flex;align-items:flex-start;gap:1.2rem;margin-bottom:1.5rem;">
          <div class="svc-icon-wrap">
            <?php echo getServiceIcon($svc['icon']); ?>
          </div>
          <div>
            <div style="font-family:var(--font-head);font-size:1.15rem;font-weight:700;color:var(--white);margin-bottom:3px;">
              <?= htmlspecialchars($svc['name']) ?>
            </div>
            <div style="font-size:0.8rem;color:var(--accent2);font-weight:500;">
              <?= htmlspecialchars($svc['tagline']) ?>
            </div>
          </div>
        </div>

        <p style="font-size:0.9rem;font-weight:300;color:var(--muted);line-height:1.8;margin-bottom:1.5rem;">
          <?= htmlspecialchars($svc['desc']) ?>
        </p>

        <ul style="list-style:none;display:flex;flex-direction:column;gap:0.6rem;margin-bottom:1.5rem;">
          <?php foreach ($svc['bullets'] as $b): ?>
          <li style="font-size:0.86rem;color:var(--text);padding-left:20px;position:relative;line-height:1.6;">
            <span style="position:absolute;left:0;color:var(--accent);font-weight:700;">✓</span>
            <?= htmlspecialchars($b) ?>
          </li>
          <?php endforeach; ?>
        </ul>

        <div class="svc-tools">
          <?php foreach ($svc['tools'] as $t): ?>
          <span class="tool-pill"><?= htmlspecialchars($t) ?></span>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- CTA -->
<section class="cta-strip">
  <div class="cta-strip-inner reveal">
    <h2 class="cta-title">Got a project in <span class="accent">mind?</span></h2>
    <p class="cta-sub">I'm currently available for freelance work. Let's talk about what you need and how I can help.</p>
    <div class="cta-btns">
      <a href="contact.php" class="btn-primary">Get in Touch</a>
      <a href="about.php" class="btn-ghost">Learn About Me</a>
    </div>
  </div>
</section>

<?php include 'components/footer.php'; ?>
<script src="assets/js/main.js"></script>
</body>
</html>

<?php
function getServiceIcon(string $icon): string {
  $icons = [
    'code'     => '<svg viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
    'mobile'   => '<svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="9" y1="7" x2="15" y2="7"/><line x1="9" y1="11" x2="15" y2="11"/></svg>',
    'design'   => '<svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 9h6M9 12h6M9 15h4"/></svg>',
    'ai'       => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>',
    'database' => '<svg viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>',
    'excel'    => '<svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>',
  ];
  return $icons[$icon] ?? $icons['code'];
}
