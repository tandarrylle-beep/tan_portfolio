<?php
require_once 'config.php';
$page_title = 'Projects — ' . SITE_NAME;
$page_desc  = 'Portfolio projects by ' . $personal['name'] . ': Sign Language Translator, Student Database, Big Brew App and more.';
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
    <div class="breadcrumb">Home <span>/ Projects</span></div>
    <h1 class="page-hero-title">My <span class="outline">Projects</span></h1>
    <p class="page-hero-sub">A collection of work I've built — from AI-powered mobile apps to relational databases and ordering systems.</p>
  </div>
</div>

<!-- PROJECTS FULL LIST -->
<section class="section">
  <div class="container">
    <!-- Filter Tags (visual only, can be extended with JS) -->
    <div class="reveal" style="display:flex;flex-wrap:wrap;gap:0.75rem;margin-bottom:3rem;">
      <button class="filter-btn active" data-filter="all">All Projects</button>
      <button class="filter-btn" data-filter="mobile">Mobile App</button>
      <button class="filter-btn" data-filter="ai">AI / ML</button>
      <button class="filter-btn" data-filter="database">Database</button>
    </div>
    <style>
      .filter-btn{
        font-family:var(--font);font-size:0.82rem;font-weight:600;
        padding:7px 20px;border-radius:50px;border:1px solid var(--border);
        background:transparent;color:var(--muted);cursor:pointer;
        transition:border-color 0.2s,color 0.2s,background 0.2s;
        letter-spacing:0.02em;
      }
      .filter-btn.active,.filter-btn:hover{
        border-color:var(--accent);color:var(--accent);background:var(--accent-dim);
      }
    </style>

    <!-- Project Cards (expanded detail) -->
    <div style="display:flex;flex-direction:column;gap:2rem;">
      <?php foreach ($projects as $i => $proj): ?>
      <div class="project-full-card reveal" style="
        background:var(--surface);
        border:1px solid var(--border);
        border-radius:20px;
        overflow:hidden;
        display:grid;
        grid-template-columns:280px 1fr;
        transition:border-color 0.3s,box-shadow 0.4s;
      ">
        <style>
          .project-full-card:hover{border-color:var(--border2);box-shadow:0 16px 50px rgba(0,0,0,0.3);}
        </style>

        <!-- Left: Visual -->
        <div style="
          background:linear-gradient(135deg,<?= $proj['color']['from'] ?>,<?= $proj['color']['to'] ?>);
          display:flex;align-items:center;justify-content:center;
          position:relative;overflow:hidden;min-height:240px;
        ">
          <div style="font-family:var(--font-head);font-size:6rem;font-weight:800;opacity:0.06;color:white;position:absolute;letter-spacing:-0.05em;user-select:none;">
            <?= $proj['num'] ?>
          </div>
          <div style="
            width:72px;height:72px;border-radius:20px;
            display:flex;align-items:center;justify-content:center;
            border:1px solid <?= $proj['accent'] ?>33;
            background:rgba(255,255,255,0.06);
            backdrop-filter:blur(8px);
            position:relative;z-index:2;
          ">
            <?php echo getProjectIconLarge($proj['type'], $proj['accent']); ?>
          </div>
          <div style="position:absolute;bottom:1.2rem;left:1.2rem;z-index:2;">
            <span style="
              font-size:0.68rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;
              color:<?= $proj['accent'] ?>;background:rgba(0,0,0,0.4);
              padding:4px 12px;border-radius:50px;backdrop-filter:blur(4px);
            "><?= htmlspecialchars($proj['type']) ?></span>
          </div>
        </div>

        <!-- Right: Content -->
        <div style="padding:2.5rem;">
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;flex-wrap:wrap;gap:0.5rem;">
            <span style="font-size:0.7rem;font-weight:700;letter-spacing:0.12em;text-transform:uppercase;color:<?= $proj['accent'] ?>;">
              Project <?= $proj['num'] ?> · <?= htmlspecialchars($proj['year']) ?>
            </span>
            <span style="
              font-size:0.7rem;font-weight:600;padding:4px 12px;border-radius:50px;
              background:rgba(0,229,160,0.1);color:var(--accent2);border:1px solid rgba(0,229,160,0.2);
            "><?= htmlspecialchars($proj['status']) ?></span>
          </div>

          <h3 style="font-family:var(--font-head);font-size:1.3rem;font-weight:700;color:var(--white);margin-bottom:0.75rem;line-height:1.25;">
            <?= htmlspecialchars($proj['name']) ?>
          </h3>

          <p style="font-size:0.9rem;font-weight:300;color:var(--muted);line-height:1.8;margin-bottom:1.5rem;">
            <?= htmlspecialchars($proj['desc']) ?>
          </p>

          <ul style="list-style:none;display:flex;flex-direction:column;gap:0.5rem;margin-bottom:1.5rem;">
            <?php foreach ($proj['bullets'] as $b): ?>
            <li style="font-size:0.85rem;color:var(--text);padding-left:18px;position:relative;line-height:1.6;">
              <span style="position:absolute;left:0;color:var(--accent);font-size:0.75rem;">→</span>
              <?= htmlspecialchars($b) ?>
            </li>
            <?php endforeach; ?>
          </ul>

          <div style="display:flex;flex-wrap:wrap;gap:7px;">
            <?php foreach ($proj['tools'] as $t): ?>
            <span class="tool-pill" style="font-size:0.72rem;"><?= htmlspecialchars($t) ?></span>
            <?php endforeach; ?>
          </div>
        </div>

      </div><!-- /project-full-card -->
      <?php endforeach; ?>
    </div>

    <!-- Add More Projects CTA -->
    <div class="reveal" style="text-align:center;margin-top:4rem;padding:3rem;background:var(--surface);border:1px dashed var(--border);border-radius:16px;">
      <div style="font-size:2rem;margin-bottom:1rem;">🚀</div>
      <div style="font-family:var(--font-head);font-size:1.1rem;font-weight:700;color:var(--off-white);margin-bottom:0.5rem;">More Coming Soon</div>
      <p style="font-size:0.87rem;color:var(--muted);max-width:400px;margin:0 auto 1.5rem;">I'm always building something new. Follow my GitHub to stay updated on latest projects.</p>
      <a href="https://github.com/tandarrylle-beep/my-portfolio.git" target="_blank" rel="noopener" class="btn-ghost">View GitHub →</a>
    </div>

  </div>
</section>

<!-- CTA -->
<section class="cta-strip">
  <div class="cta-strip-inner reveal">
    <h2 class="cta-title">Have a project <span class="accent">in mind?</span></h2>
    <p class="cta-sub">Let's collaborate and build something amazing together.</p>
    <div class="cta-btns">
      <a href="contact.php" class="btn-primary">Start a Project</a>
      <a href="services.php" class="btn-ghost">My Services</a>
    </div>
  </div>
</section>

<?php include 'components/footer.php'; ?>
<script src="assets/js/main.js"></script>
<script>
// Filter buttons
document.querySelectorAll('.filter-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    // Future: filter cards by data-filter attribute
  });
});
</script>
</body>
</html>

<?php
function getProjectIconLarge(string $type, string $color): string {
  if (str_contains(strtolower($type), 'ai') || str_contains(strtolower($type), 'ml')) {
    return '<svg viewBox="0 0 24 24" stroke="'.$color.'" fill="none" stroke-width="1.4" stroke-linecap="round" width="32" height="32"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>';
  } elseif (str_contains(strtolower($type), 'mobile') || str_contains(strtolower($type), 'app')) {
    return '<svg viewBox="0 0 24 24" stroke="'.$color.'" fill="none" stroke-width="1.4" stroke-linecap="round" width="32" height="32"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="9" y1="7" x2="15" y2="7"/><circle cx="12" cy="17" r="1" fill="'.$color.'"/></svg>';
  } elseif (str_contains(strtolower($type), 'database')) {
    return '<svg viewBox="0 0 24 24" stroke="'.$color.'" fill="none" stroke-width="1.4" stroke-linecap="round" width="32" height="32"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>';
  }
  return '<svg viewBox="0 0 24 24" stroke="'.$color.'" fill="none" stroke-width="1.4" stroke-linecap="round" width="32" height="32"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>';
}
