<?php
require_once 'config.php';
$page_title = SITE_NAME . ' — Freelance Developer';
$page_desc  = SITE_DESC;
include 'components/head.php';
include 'components/nav.php';
?>

<!-- ============ HERO ============ -->
<section class="hero" id="home">
  <!-- Decorative grid lines -->
  <div class="hero-decoration" aria-hidden="true">
    <div class="hero-grid-line hgl-v" style="left:20%"></div>
    <div class="hero-grid-line hgl-v" style="left:40%"></div>
    <div class="hero-grid-line hgl-v" style="left:60%"></div>
    <div class="hero-grid-line hgl-v" style="left:80%"></div>
    <div class="hero-grid-line hgl-h" style="top:33%"></div>
    <div class="hero-grid-line hgl-h" style="top:66%"></div>
  </div>

  <div class="hero-glow" aria-hidden="true"></div>

  <div class="hero-inner">
    <div class="hero-text">

      <div class="hero-badge">
        <span class="badge-dot"></span>
        Available for Freelance Work
      </div>

      <p class="hero-greeting">
        Hi, I'm <strong><?= htmlspecialchars($personal['nickname']) ?></strong>
      </p>

      <h1 class="hero-title">
        <span id="typed-text" style="min-width:200px;display:inline-block;"></span>
        <span class="outline-text"><?= strtoupper($personal['nickname']) ?></span>
      </h1>

      <p class="hero-desc"><?= htmlspecialchars($personal['bio_short']) ?></p>

      <div class="hero-btns">
        <a href="contact.php" class="btn-primary">
          <span>Hire Me</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" width="16" height="16"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
        <a href="projects.php" class="btn-ghost">View Projects</a>
        <a href="<?= htmlspecialchars($personal['cv_link']) ?>" target="_blank" rel="noopener" class="btn-icon" title="Download CV">
          <svg viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M7 10l5 5 5-5M12 15V3"/></svg>
        </a>
      </div>

    </div>

    <!-- Hero Photo -->
    <div class="hero-photo">
      <div class="hero-photo-frame">
        <img src="<?= htmlspecialchars($personal['photo']) ?>" alt="<?= htmlspecialchars($personal['name']) ?>"/>
      </div>

      <div class="hero-photo-tag">
        <div class="photo-tag-num" data-target="<?= $stats[0]['num'] ?>">0</div>
        <div class="photo-tag-label"><?= htmlspecialchars($stats[0]['label']) ?></div>
      </div>

      <div class="hero-photo-tag2">
        <div class="tag2-icon">
          <svg viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
        </div>
        <div>
          <div class="tag2-text">Full Stack</div>
          <div class="tag2-sub">Web Developer</div>
        </div>
      </div>
    </div>

  </div><!-- /hero-inner -->

  <div class="hero-scroll" aria-hidden="true">
    <div class="hero-scroll-line"></div>
    Scroll to explore
  </div>
</section>

<!-- ============ STATS BAR ============ -->
<div class="stats-bar">
  <div class="stats-bar-inner">
    <?php foreach ($stats as $i => $s): $delay = "d{$i}"; ?>
    <div class="stat-item reveal <?= $i > 0 ? $delay : '' ?>">
      <div class="stat-num" data-target="<?= $s['num'] ?>" data-suffix="<?= $s['suffix'] ?? '' ?>">
        0<?= $s['suffix'] ?? '' ?>
      </div>
      <div class="stat-label"><?= htmlspecialchars($s['label']) ?></div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- ============ SERVICES PREVIEW ============ -->
<section class="section section-alt" id="services">
  <div class="container">
    <div class="reveal">
      <span class="label">What I Offer</span>
      <h2 class="section-title">Services I <span class="outline">Provide</span></h2>
    </div>
    <div class="services-grid reveal d1">
      <?php foreach ($services as $svc): ?>
      <div class="service-card">
        <div class="svc-icon-wrap">
          <?php echo getServiceIcon($svc['icon']); ?>
        </div>
        <div class="svc-name"><?= htmlspecialchars($svc['name']) ?></div>
        <div class="svc-desc"><?= htmlspecialchars($svc['desc']) ?></div>
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

<!-- ============ PROJECTS PREVIEW ============ -->
<section class="section" id="work">
  <div class="container">
    <div class="reveal" style="display:flex;align-items:flex-end;justify-content:space-between;flex-wrap:wrap;gap:1rem;margin-bottom:3.5rem;">
      <div>
        <span class="label">Portfolio</span>
        <h2 class="section-title">Featured <span class="outline">Projects</span></h2>
      </div>
      <a href="projects.php" class="btn-ghost" style="font-size:0.85rem;padding:0.6rem 1.5rem;">View All →</a>
    </div>

    <div class="projects-grid">
      <?php foreach ($projects as $i => $proj): ?>
      <div class="project-card reveal <?= "d{$i}" ?>">
        <div class="project-card-top" style="background:linear-gradient(135deg,<?= $proj['color']['from'] ?>,<?= $proj['color']['to'] ?>);">
          <div class="project-mockup">
            <div class="project-num-bg"><?= $proj['num'] ?></div>
          </div>
          <div class="project-icon" style="border-color:<?= $proj['accent'] ?>33;">
            <?php echo getProjectIcon($proj['type'], $proj['accent']); ?>
          </div>
        </div>
        <div class="project-card-body">
          <div class="project-meta">
            <span class="project-num" style="color:<?= $proj['accent'] ?>">Project <?= $proj['num'] ?></span>
            <span class="project-status"><?= $proj['status'] ?></span>
          </div>
          <div class="project-name"><?= htmlspecialchars($proj['name']) ?></div>
          <div class="project-desc"><?= htmlspecialchars($proj['desc']) ?></div>
          <div class="project-tools">
            <?php foreach ($proj['tools'] as $t): ?>
            <span class="tool-pill"><?= htmlspecialchars($t) ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ SKILLS ============ -->
<section class="section section-alt" id="skills">
  <div class="container">
    <div class="reveal">
      <span class="label">Technical Proficiency</span>
      <h2 class="section-title">Skills & <span class="outline">Technologies</span></h2>
    </div>
    <div class="skill-bars-grid">
      <?php foreach ($skills as $cat => $skillList): ?>
      <div class="skill-category-card reveal">
        <div class="skill-cat-title"><?= htmlspecialchars($cat) ?></div>
        <div class="skill-bars">
          <?php foreach ($skillList as $sk): ?>
          <div class="skill-bar-row">
            <div class="skill-bar-top">
              <span class="skill-bar-name"><?= htmlspecialchars($sk['name']) ?></span>
              <span class="skill-bar-pct"><?= $sk['pct'] ?>%</span>
            </div>
            <div class="skill-bar-track">
              <div class="skill-bar-fill" data-width="<?= $sk['pct'] ?>"></div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ CTA ============ -->
<section class="cta-strip">
  <div class="cta-strip-inner reveal">
    <h2 class="cta-title">Ready to build something <span class="accent">great?</span></h2>
    <p class="cta-sub">I'm available for freelance projects. Let's talk about your idea and make it real.</p>
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
// ============ ICON HELPER FUNCTIONS ============
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

function getProjectIcon(string $type, string $color): string {
  if (str_contains(strtolower($type), 'ai') || str_contains(strtolower($type), 'ml')) {
    return '<svg viewBox="0 0 24 24" stroke="'.$color.'" fill="none" stroke-width="1.6" stroke-linecap="round"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4"/></svg>';
  } elseif (str_contains(strtolower($type), 'mobile') || str_contains(strtolower($type), 'app')) {
    return '<svg viewBox="0 0 24 24" stroke="'.$color.'" fill="none" stroke-width="1.6" stroke-linecap="round"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="9" y1="7" x2="15" y2="7"/></svg>';
  } elseif (str_contains(strtolower($type), 'database')) {
    return '<svg viewBox="0 0 24 24" stroke="'.$color.'" fill="none" stroke-width="1.6" stroke-linecap="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>';
  }
  return '<svg viewBox="0 0 24 24" stroke="'.$color.'" fill="none" stroke-width="1.6" stroke-linecap="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>';
}
