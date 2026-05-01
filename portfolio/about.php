<?php
require_once 'config.php';
$page_title = 'About — ' . SITE_NAME;
$page_desc  = 'Learn about ' . $personal['name'] . ' — ' . $personal['title'];
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
    <div class="breadcrumb">Home <span>/ About</span></div>
    <h1 class="page-hero-title">About <span class="outline">Me</span></h1>
    <p class="page-hero-sub">IT student, freelance developer, and passionate problem-solver from Zambales, Philippines.</p>
  </div>
</div>

<!-- BIO SECTION -->
<section class="section" style="padding-top:5rem;">
  <div class="container">
    <div class="about-grid">

      <!-- Photo Column -->
      <div class="about-photo-wrap reveal">
        <div class="about-photo-frame">
          <img src="<?= htmlspecialchars($personal['photo']) ?>" alt="<?= htmlspecialchars($personal['name']) ?>"/>
        </div>
        <div class="about-photo-social">
          <?php foreach ($socials as $s): ?>
          <a href="<?= $s['url'] ?>" target="_blank" rel="noopener" class="social-btn" title="<?= $s['label'] ?>">
            <?= strtoupper($s['short']) ?>
          </a>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Content Column -->
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
          <div class="info-row"><span class="info-label">Status:</span><span class="info-val"><?= htmlspecialchars($personal['status']) ?></span></div>
        </div>

        <div class="about-btns">
          <a href="contact.php" class="btn-primary">Hire Me</a>
          <a href="<?= htmlspecialchars($personal['cv_link']) ?>" target="_blank" rel="noopener" class="btn-ghost">Download CV</a>
        </div>

        <!-- Skills -->
        <div class="skills-wrap reveal d2">
          <?php foreach ($skill_tags as $category => $tags): ?>
          <div class="skills-title"><?= htmlspecialchars($category) ?></div>
          <div class="skill-tags">
            <?php foreach ($tags as $tag): $soft = ($category === 'Soft Skills') ? ' soft' : ''; ?>
            <span class="skill-tag<?= $soft ?>"><?= htmlspecialchars($tag) ?></span>
            <?php endforeach; ?>
          </div>
          <?php endforeach; ?>
        </div>

      </div><!-- /about-content -->
    </div><!-- /about-grid -->
  </div>
</section>

<!-- EDUCATION -->
<section class="section section-alt" id="education">
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
        <div class="edu-school"><?= htmlspecialchars($personal['school']) ?> — <?= htmlspecialchars($personal['year']) ?></div>
      </div>
      <div class="edu-badge"><?= htmlspecialchars($personal['year']) ?></div>
    </div>
  </div>
</section>

<!-- SKILL BARS -->
<section class="section" id="skills">
  <div class="container">
    <div class="reveal">
      <span class="label">Technical Proficiency</span>
      <h2 class="section-title">Skills & <span class="outline">Tools</span></h2>
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

<!-- CTA -->
<section class="cta-strip">
  <div class="cta-strip-inner reveal">
    <h2 class="cta-title">Let's work <span class="accent">together.</span></h2>
    <p class="cta-sub">I'm available for freelance projects and open to new opportunities.</p>
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
