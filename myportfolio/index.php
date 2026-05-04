<?php
require_once 'config.php';
require_once 'includes/helpers.php';
$page_title = SITE_NAME . ' — AI Developer · Full-Stack · Data Specialist';
$page_desc  = SITE_DESC;
include 'components/head.php';
include 'components/nav.php';
?>

<!-- ============ HERO ============ -->
<section class="hero" id="home">
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

      <!-- Availability Badges -->
      <div class="avail-row" style="display:flex;flex-wrap:wrap;gap:8px;margin-bottom:1.5rem;opacity:0;animation:fadeUp 0.6s 0.15s forwards;">
        <?php foreach ($availability as $av): ?>
        <span class="avail-pill" style="background:<?= $av['bg'] ?>;border:1px solid <?= $av['border'] ?>;color:<?= $av['color'] ?>;">
          <span class="avail-dot-s" style="background:<?= $av['color'] ?>;box-shadow:0 0 6px <?= $av['color'] ?>;"></span>
          <?= htmlspecialchars($av['label']) ?>
        </span>
        <?php endforeach; ?>
      </div>

      <p class="hero-greeting" style="opacity:0;animation:fadeUp 0.6s 0.3s forwards;">
        Hi, I'm <strong><?= htmlspecialchars($personal['nickname']) ?></strong> — IT Graduate
      </p>

      <h1 class="hero-title" style="opacity:0;animation:fadeUp 0.7s 0.45s forwards;">
        <span id="typed-text" style="min-width:10px;display:inline-block;color:var(--accent)"></span>
        <span class="outline-text"><?= strtoupper($personal['nickname']) ?></span>
      </h1>

      <p class="hero-desc" style="opacity:0;animation:fadeUp 0.6s 0.6s forwards;">
        <?= htmlspecialchars($personal['bio_short']) ?>
      </p>

      <div class="hero-btns" style="opacity:0;animation:fadeUp 0.6s 0.75s forwards;">
        <a href="contact.php" class="btn-primary">
          Hire Me
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
        <div class="photo-tag-num" data-target="5">5</div>
        <div class="photo-tag-label">Projects Done</div>
      </div>
      <div class="hero-photo-tag2">
        <div class="tag2-icon">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4"/></svg>
        </div>
        <div>
          <div class="tag2-text">AI & Full-Stack</div>
          <div class="tag2-sub">Developer</div>
        </div>
      </div>
    </div>
  </div>

  <div class="hero-scroll" aria-hidden="true">
    <div class="hero-scroll-line"></div>
    Scroll to explore
  </div>
</section>

<!-- ============ STATS BAR ============ -->
<div class="stats-bar">
  <div class="stats-bar-inner">
    <?php foreach ($stats as $i => $s): ?>
    <div class="stat-item reveal <?= $i > 0 ? "d{$i}" : '' ?>">
      <div class="stat-num" data-target="<?= $s['num'] ?>" data-suffix="<?= $s['suffix'] ?? '' ?>">0<?= $s['suffix'] ?? '' ?></div>
      <div class="stat-label"><?= htmlspecialchars($s['label']) ?></div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- ============ SERVICES ============ -->
<section class="section section-alt" id="services">
  <div class="container">
    <div class="reveal">
      <span class="label">What I Offer</span>
      <h2 class="section-title">Services I <span class="outline">Provide</span></h2>
    </div>
    <div class="services-grid reveal d1">
      <?php foreach ($services as $svc): ?>
      <div class="service-card">
        <div class="svc-icon-wrap"><?= serviceIcon($svc['icon']) ?></div>
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
    <div class="reveal" style="text-align:center;margin-top:2.5rem;">
      <a href="services.php" class="btn-ghost">See All Services →</a>
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
      <?php foreach (array_slice($projects, 0, 3) as $i => $proj): ?>
      <a href="projects.php#<?= $proj['id'] ?>" class="project-card reveal <?= "d{$i}" ?>">
        <div class="project-card-top" style="background:linear-gradient(135deg,<?= $proj['color']['from'] ?>,<?= $proj['color']['to'] ?>);">
          <?php if (!empty($proj['images'])): ?>
          <img src="<?= htmlspecialchars($proj['images'][0]['src']) ?>"
               alt="<?= htmlspecialchars($proj['name']) ?>"
               style="width:100%;height:100%;object-fit:cover;object-position:center top;opacity:0.7;transition:opacity 0.3s;"
               loading="lazy"
               onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='0.7'"/>
          <?php else: ?>
          <div class="project-mockup">
            <div class="project-num-bg"><?= $proj['num'] ?></div>
          </div>
          <div class="project-icon" style="border-color:<?= $proj['accent'] ?>33;">
            <?= projectIcon($proj['type'], $proj['accent']) ?>
          </div>
          <?php endif; ?>
          <div class="project-img-overlay" style="position:absolute;inset:0;background:linear-gradient(to top,<?= $proj['color']['to'] ?> 0%,transparent 60%);pointer-events:none;"></div>
        </div>
        <div class="project-card-body">
          <div class="project-meta">
            <span class="project-num" style="color:<?= $proj['accent'] ?>">Project <?= $proj['num'] ?></span>
            <span class="project-status"><?= $proj['status'] ?></span>
          </div>
          <div class="project-name"><?= htmlspecialchars($proj['name']) ?></div>
          <div class="project-desc"><?= htmlspecialchars($proj['desc']) ?></div>
          <div class="project-tools">
            <?php foreach (array_slice($proj['tools'], 0, 4) as $t): ?>
            <span class="tool-pill"><?= htmlspecialchars($t) ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ EXPERIENCE ============ -->
<section class="section section-alt">
  <div class="container">
    <div class="reveal">
      <span class="label">Work Experience</span>
      <h2 class="section-title">Professional <span class="outline">Experience</span></h2>
    </div>
    <?php foreach ($experience as $exp): ?>
    <div class="reveal d1" style="margin-top:2.5rem;background:var(--surface2);border:1px solid var(--border2);border-radius:16px;padding:2.5rem;position:relative;overflow:hidden;">
      <div style="position:absolute;top:0;left:0;bottom:0;width:3px;background:linear-gradient(180deg,var(--accent),transparent);"></div>
      <div style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:1rem;margin-bottom:1.5rem;">
        <div>
          <div style="font-family:var(--font-head);font-size:1.15rem;font-weight:700;color:var(--white);margin-bottom:4px;">
            <?= htmlspecialchars($exp['role']) ?>
          </div>
          <div style="font-size:0.9rem;color:var(--muted);"><?= htmlspecialchars($exp['company']) ?></div>
        </div>
        <div style="display:flex;flex-direction:column;align-items:flex-end;gap:6px;">
          <span style="font-size:0.78rem;font-weight:600;color:var(--accent2);background:var(--accent-dim);border:1px solid rgba(0,229,160,0.2);padding:4px 14px;border-radius:50px;">
            <?= htmlspecialchars($exp['period']) ?>
          </span>
          <span style="font-size:0.7rem;color:var(--dim);font-style:italic;"><?= htmlspecialchars($exp['type']) ?></span>
        </div>
      </div>
      <ul style="list-style:none;display:flex;flex-direction:column;gap:0.6rem;margin-bottom:1.5rem;">
        <?php foreach ($exp['bullets'] as $b): ?>
        <li style="font-size:0.875rem;color:var(--text);padding-left:18px;position:relative;line-height:1.7;">
          <span style="position:absolute;left:0;color:var(--accent);">→</span>
          <?= htmlspecialchars($b) ?>
        </li>
        <?php endforeach; ?>
      </ul>
      <div style="display:flex;flex-wrap:wrap;gap:7px;">
        <?php foreach ($exp['tools'] as $t): ?>
        <span class="tool-pill"><?= htmlspecialchars($t) ?></span>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ============ SKILLS ============ -->
<section class="section">
  <div class="container">
    <div class="reveal">
      <span class="label">Technical Proficiency</span>
      <h2 class="section-title">Skills & <span class="outline">Technologies</span></h2>
    </div>
    <div class="skill-bars-grid" style="grid-template-columns:repeat(3,1fr);">
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
    <p class="cta-sub">Available for full-time roles, part-time contracts, and gig projects. Let's talk.</p>
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

<style>
.avail-pill{display:inline-flex;align-items:center;gap:6px;padding:5px 14px;border-radius:50px;font-size:0.75rem;font-weight:700;letter-spacing:0.03em;}
.avail-dot-s{width:6px;height:6px;border-radius:50%;flex-shrink:0;animation:pulse-dot 2s infinite;}
</style>
