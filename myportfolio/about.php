<?php
require_once 'config.php';
require_once 'includes/helpers.php';
$page_title = 'About — ' . SITE_NAME;
include 'components/head.php';
include 'components/nav.php';
?>

<div class="page-hero">
  <div class="page-hero-circles" aria-hidden="true">
    <div class="phc" style="width:500px;height:500px;bottom:-150px;right:-100px;"></div>
    <div class="phc" style="width:220px;height:220px;top:60px;right:200px;border-color:rgba(0,229,160,0.06);"></div>
  </div>
  <div class="page-hero-inner">
    <div class="breadcrumb">Home <span>/ About</span></div>
    <h1 class="page-hero-title">About <span class="outline">Me</span></h1>
    <p class="page-hero-sub">IT Graduate with Academic Distinction — AI Developer, Full-Stack Builder, Data Specialist.</p>
  </div>
</div>

<!-- BIO -->
<section class="section" style="padding-top:5rem;">
  <div class="container">
    <div class="about-grid">

      <div class="about-photo-wrap reveal">
        <div class="about-photo-frame">
          <img src="<?= htmlspecialchars($personal['photo']) ?>" alt="<?= htmlspecialchars($personal['name']) ?>"/>
        </div>
        <!-- Availability on photo card -->
        <div style="margin-top:1.2rem;display:flex;flex-direction:column;gap:8px;">
          <?php foreach ($availability as $av): ?>
          <div style="display:flex;align-items:center;gap:10px;padding:9px 14px;background:<?= $av['bg'] ?>;border:1px solid <?= $av['border'] ?>;border-radius:8px;">
            <span style="width:7px;height:7px;border-radius:50%;background:<?= $av['color'] ?>;box-shadow:0 0 6px <?= $av['color'] ?>;flex-shrink:0;"></span>
            <span style="font-size:0.82rem;font-weight:600;color:<?= $av['color'] ?>;"><?= htmlspecialchars($av['label']) ?></span>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="about-photo-social" style="margin-top:1.2rem;">
          <?php foreach ($socials as $s): ?>
          <a href="<?= $s['url'] ?>" target="_blank" rel="noopener" class="social-btn" title="<?= $s['label'] ?>">
            <?= strtoupper($s['short']) ?>
          </a>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="about-content reveal d1">
        <span class="label">My Biography</span>
        <h2 class="section-title"><?= htmlspecialchars($personal['title']) ?></h2>
        <p class="about-desc"><?= htmlspecialchars($personal['bio_long']) ?></p>

        <div class="info-grid">
          <div class="info-row"><span class="info-label">Name:</span><span class="info-val"><?= htmlspecialchars($personal['name']) ?></span></div>
          <div class="info-row"><span class="info-label">From:</span><span class="info-val"><?= htmlspecialchars($personal['location']) ?></span></div>
          <div class="info-row"><span class="info-label">Email:</span><span class="info-val"><?= htmlspecialchars($personal['email']) ?></span></div>
          <div class="info-row"><span class="info-label">Phone:</span><span class="info-val"><?= htmlspecialchars($personal['phone']) ?></span></div>
          <div class="info-row"><span class="info-label">Age:</span><span class="info-val"><?= htmlspecialchars($personal['age']) ?> years old</span></div>
          <div class="info-row"><span class="info-label">Open to:</span><span class="info-val">Full-Time · Part-Time · Gigs</span></div>
        </div>

        <div class="about-btns">
          <a href="contact.php" class="btn-primary">Hire Me</a>
          <a href="<?= htmlspecialchars($personal['cv_link']) ?>" target="_blank" rel="noopener" class="btn-ghost">Download CV</a>
        </div>

        <!-- Skills tags -->
        <div class="skills-wrap reveal d2">
          <?php foreach ($skill_tags as $category => $tags): ?>
          <div class="skills-title"><?= htmlspecialchars($category) ?></div>
          <div class="skill-tags">
            <?php foreach ($tags as $tag):
              $soft = ($category === 'Soft Skills') ? ' soft' : '';
              $subtle = ($category === 'Tools & Platforms') ? ' soft' : '';
            ?>
            <span class="skill-tag<?= $soft.$subtle ?>"><?= htmlspecialchars($tag) ?></span>
            <?php endforeach; ?>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- EXPERIENCE -->
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
          <div style="font-family:var(--font-head);font-size:1.2rem;font-weight:700;color:var(--white);margin-bottom:4px;"><?= htmlspecialchars($exp['role']) ?></div>
          <div style="font-size:0.9rem;color:var(--muted);"><?= htmlspecialchars($exp['company']) ?></div>
        </div>
        <div style="display:flex;flex-direction:column;align-items:flex-end;gap:6px;">
          <span style="font-size:0.78rem;font-weight:600;color:var(--accent2);background:var(--accent-dim);border:1px solid rgba(0,229,160,0.2);padding:5px 15px;border-radius:50px;">
            <?= htmlspecialchars($exp['period']) ?>
          </span>
          <span style="font-size:0.7rem;color:var(--dim);font-style:italic;"><?= htmlspecialchars($exp['type']) ?></span>
        </div>
      </div>
      <ul style="list-style:none;display:flex;flex-direction:column;gap:0.65rem;margin-bottom:1.5rem;">
        <?php foreach ($exp['bullets'] as $b): ?>
        <li style="font-size:0.88rem;color:var(--text);padding-left:18px;position:relative;line-height:1.7;">
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

<!-- EDUCATION -->
<section class="section">
  <div class="container">
    <div class="reveal">
      <span class="label">Background</span>
      <h2 class="section-title" style="margin-bottom:2.5rem;">Academic <span class="outline">Education</span></h2>
    </div>
    <div class="edu-card reveal d1">
      <div class="edu-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
          <path d="M22 10v6M2 10l10-5 10 5-10 5-10-5z"/>
          <path d="M6 12v5c3 3 9 3 12 0v-5"/>
        </svg>
      </div>
      <div class="edu-text">
        <div class="edu-degree"><?= htmlspecialchars($personal['degree']) ?></div>
        <div class="edu-school"><?= htmlspecialchars($personal['school']) ?></div>
        <div style="margin-top:6px;">
          <span style="font-size:0.75rem;font-weight:600;color:var(--gold);background:rgba(240,192,64,0.1);border:1px solid rgba(240,192,64,0.2);padding:3px 12px;border-radius:50px;">
            🏆 <?= htmlspecialchars($personal['distinction']) ?>
          </span>
        </div>
      </div>
      <div class="edu-badge"><?= htmlspecialchars($personal['year']) ?></div>
    </div>
  </div>
</section>

<!-- SKILL BARS -->
<section class="section section-alt">
  <div class="container">
    <div class="reveal">
      <span class="label">Technical Proficiency</span>
      <h2 class="section-title">Skills & <span class="outline">Tools</span></h2>
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

<section class="cta-strip">
  <div class="cta-strip-inner reveal">
    <h2 class="cta-title">Let's work <span class="accent">together.</span></h2>
    <p class="cta-sub">Full-time, part-time, or a quick gig — I'm ready.</p>
    <div class="cta-btns">
      <a href="contact.php" class="btn-primary">Get in Touch</a>
      <a href="services.php" class="btn-ghost">View Services</a>
    </div>
  </div>
</section>

<?php include 'components/footer.php'; ?>
<script src="assets/js/main.js"></script>
</body>
</html>
