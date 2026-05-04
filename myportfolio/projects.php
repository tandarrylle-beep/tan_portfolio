<?php
require_once 'config.php';
$page_title = 'Projects — ' . SITE_NAME;
$page_desc  = 'Portfolio projects by ' . $personal['name'];
include 'components/head.php';
include 'components/nav.php';

// ─── EXPANDED PROJECT DATA ────────────────────────────────────────────────────
$all_projects = [

  // 01 — SIGN LANGUAGE TRANSLATOR
  [
    'id'      => 'sign-language-translator',
    'num'     => '01',
    'name'    => 'Real-Time AI Sign Language Translator',
    'type'    => 'AI / Mobile App',
    'year'    => '2025',
    'status'  => 'Completed',
    'color'   => ['from' => '#1a003a', 'to' => '#3d0070'],
    'accent'  => '#b44dff',
    'tags'    => ['All', 'AI / ML', 'Mobile App'],
    'desc'    => 'An AI-powered mobile application that performs real-time Filipino Sign Language (FSL) gesture-to-text translation using MediaPipe Hand Landmarker and a custom LSTM neural network — with sub-200ms inference on Android devices, fully offline.',
    'highlights' => [
      'Sub-200ms inference latency on Android using on-device TFLite ML',
      '100% offline — zero cloud dependency for AI inference',
      '~30% frame processing speed improvement via profiling & refactoring',
      'Covers 100+ FSL signs with live camera and video import modes',
      'Custom LSTM model trained & evaluated with Scikit-learn metrics',
      'Model evaluation: accuracy, precision, recall, F1-score metrics',
      'Data preprocessing & feature engineering via NumPy & Pandas',
    ],
    'tools'   => ['React Native', 'LSTM', 'MediaPipe', 'TensorFlow Lite', 'JavaScript', 'Android'],
    'images'  => [
      ['src' => 'assets/img/projects/sign_home.jpg',     'caption' => 'Home Screen — SIGN App'],
      ['src' => 'assets/img/projects/sign_live.jpg',     'caption' => 'Live Sign Translator Page'],
      ['src' => 'assets/img/projects/sign_import.jpg',   'caption' => 'Import Video for AI Translation'],
      ['src' => 'assets/img/projects/sign_datalist.jpg', 'caption' => 'FSL Datalist — 100+ Signs'],
      ['src' => 'assets/img/projects/sign_about.jpg',    'caption' => 'About Page — FSL Translator'],
    ],
  ],

  // 02 — BIG BREW ORDERING SYSTEM
  [
    'id'      => 'big-brew-app',
    'num'     => '02',
    'name'    => 'Big Brew Ordering System',
    'type'    => 'Mobile App',
    'year'    => '2025',
    'status'  => 'Completed',
    'color'   => ['from' => '#2a1000', 'to' => '#6b2f00'],
    'accent'  => '#ff8c00',
    'tags'    => ['All', 'Mobile App'],
    'desc'    => 'A full-featured mobile ordering app for Big Brew, a retail milk tea business. Features a dynamic categorized menu, real-time price calculation, persistent cart via AsyncStorage, calendar-integrated scheduling, and multiple payment methods.',
    'highlights' => [
      'Dynamic cart with real-time price computation & add-ons',
      'Persistent order history using AsyncStorage',
      'Calendar-integrated order scheduling with date picker',
      'Payment methods: Cash, GCash, Credit Card, Debit Card',
      'Zero critical bugs at delivery — tested across Android devices',
      'Reusable UI components & optimized state management',
    ],
    'tools'   => ['Android Studio', 'Kotlin', 'AsyncStorage'],
    'images'  => [
      ['src' => 'assets/img/projects/bigbrew_login.png',    'caption' => 'Login Screen'],
      ['src' => 'assets/img/projects/bigbrew_milktea.png',  'caption' => 'Milk Tea Menu'],
      ['src' => 'assets/img/projects/bigbrew_kiwi.png',     'caption' => 'Fruit Tea Menu'],
      ['src' => 'assets/img/projects/bigbrew_orders.png',   'caption' => 'View Customer Orders'],
      ['src' => 'assets/img/projects/bigbrew_payment.png',  'caption' => 'Payment Method Selection'],
      ['src' => 'assets/img/projects/bigbrew_calendar.png', 'caption' => 'Calendar-Integrated Scheduling'],
    ],
  ],

  // 03 — HEALTHCARE DATABASE
  [
    'id'      => 'healthcare-database',
    'num'     => '03',
    'name'    => 'Healthcare Appointment System — SQL Database',
    'type'    => 'Database Management',
    'year'    => '2025',
    'status'  => 'Completed',
    'color'   => ['from' => '#001a3a', 'to' => '#003a7a'],
    'accent'  => '#4d9fff',
    'tags'    => ['All', 'Database'],
    'desc'    => 'A fully normalized relational SQL database for a Healthcare Appointment Management System. Models 6+ entities with full referential integrity, stored procedures for automated scheduling, and query-ready architecture designed for 10,000+ patient records.',
    'highlights' => [
      'Normalized to 3NF — 6+ entities with full referential integrity',
      'ERD designed in ERDPlus with complete schema documentation',
      'Stored procedures, joins & triggers for automated scheduling',
      '~50% reduction in manual report generation steps',
      'Indexing-ready architecture for 10,000+ simulated patient records',
    ],
    'tools'   => ['MySQL', 'SQL', 'ERDPlus', 'MySQL Workbench', 'Database Normalization (1NF–3NF)'],
    'images'  => [],
  ],

  // 04 — BARANGAY GIS (Internship)
  [
    'id'      => 'barangay-gis',
    'num'     => '04',
    'name'    => 'Barangay Geospatial Household Information System',
    'type'    => 'GIS / Data Management',
    'year'    => '2025',
    'status'  => 'Completed',
    'color'   => ['from' => '#1a1400', 'to' => '#3a2c00'],
    'accent'  => '#f0c040',
    'tags'    => ['All', 'Data Management'],
    'desc'    => 'GIS Data Specialist Internship at the Assessor\'s Office – Zambales LGU. Encoded and validated 3,500+ geospatial household records across 7 barangays using QGIS, digitized spatial layers, and performed ETL operations for government digitization compliance.',
    'highlights' => [
      '3,500+ geospatial records encoded across 7 barangays — 98%+ accuracy',
      'Digitized lot boundaries, ownership data, and land values in QGIS',
      '~40% reduction in manual lookup time for land-record queries',
      'ETL operations enforcing data integrity for government compliance',
      'Map production & spatial analysis supporting local governance',
    ],
    'tools'   => ['QGIS', 'Geospatial Data', 'Data Validation'],
    'images'  => [],
    'badge'   => 'Internship · Assessor\'s Office, Zambales LGU',
  ],

];

// Unique filter tags (ordered)
$filter_tags = ['All', 'AI / ML', 'Mobile App', 'Database', 'Data Management'];
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
    <p class="page-hero-sub">
      <?= count($all_projects) ?> projects spanning AI/ML, mobile apps, databases, and geospatial systems.
    </p>
  </div>
</div>

<!-- PROJECTS SECTION -->
<section class="section">
  <div class="container">

    <!-- Filter Bar -->
    <div class="filter-bar reveal">
      <?php foreach ($filter_tags as $tag): ?>
      <button class="filter-btn <?= $tag === 'All' ? 'active' : '' ?>"
              data-filter="<?= htmlspecialchars(strtolower(str_replace(['/', ' '], ['-',''], $tag))) ?>">
        <?= htmlspecialchars($tag) ?>
      </button>
      <?php endforeach; ?>
    </div>

    <!-- Project Cards -->
    <?php foreach ($all_projects as $proj):
      $tagStr = implode(' ', array_map(
        fn($t) => strtolower(str_replace(['/', ' '], ['-',''], $t)),
        $proj['tags']
      ));
      $hasImgs = !empty($proj['images']);
    ?>
    <div class="project-full reveal" data-tags="<?= htmlspecialchars($tagStr) ?>">
      <div class="project-full-inner">

        <!-- LEFT: Visuals -->
        <div class="project-visuals">
          <?php if ($hasImgs): ?>
          <div class="proj-gallery">
            <div class="proj-gallery-main" onclick="openLightbox('<?= $proj['id'] ?>', 0)">
              <img src="<?= htmlspecialchars($proj['images'][0]['src']) ?>"
                   alt="<?= htmlspecialchars($proj['images'][0]['caption']) ?>"
                   class="gallery-main-img"
                   id="main-img-<?= $proj['id'] ?>"/>
              <div class="gallery-overlay">
                <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" width="22" height="22">
                  <path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/>
                </svg>
                <span>Expand</span>
              </div>
            </div>
            <?php if (count($proj['images']) > 1): ?>
            <div class="proj-gallery-thumbs">
              <?php foreach ($proj['images'] as $ti => $img): ?>
              <button class="thumb-btn <?= $ti===0?'active':'' ?>"
                      data-idx="<?= $ti ?>"
                      data-src="<?= htmlspecialchars($img['src']) ?>"
                      data-caption="<?= htmlspecialchars($img['caption']) ?>"
                      onclick="switchGallery('<?= $proj['id'] ?>', this)"
                      title="<?= htmlspecialchars($img['caption']) ?>">
                <img src="<?= htmlspecialchars($img['src']) ?>" alt=""/>
              </button>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
          </div>
          <?php else: ?>
          <div class="proj-no-img" style="background:linear-gradient(135deg,<?= $proj['color']['from'] ?>,<?= $proj['color']['to'] ?>);">
            <div class="proj-no-img-num"><?= $proj['num'] ?></div>
            <?= getProjectIconLarge($proj['type'], $proj['accent']) ?>
            <div class="proj-no-img-label" style="color:<?= $proj['accent'] ?>;"><?= htmlspecialchars($proj['type']) ?></div>
          </div>
          <?php endif; ?>
        </div>

        <!-- RIGHT: Content -->
        <div class="project-content">
          <div class="proj-meta-row">
            <span class="proj-num" style="color:<?= $proj['accent'] ?>">
              Project <?= $proj['num'] ?> · <?= $proj['year'] ?>
            </span>
            <div style="display:flex;gap:6px;flex-wrap:wrap;align-items:center;">
              <span class="proj-status"><?= htmlspecialchars($proj['status']) ?></span>
              <?php if (!empty($proj['badge'])): ?>
              <span class="proj-badge"><?= htmlspecialchars($proj['badge']) ?></span>
              <?php endif; ?>
            </div>
          </div>

          <h3 class="proj-name"><?= htmlspecialchars($proj['name']) ?></h3>
          <p class="proj-desc"><?= htmlspecialchars($proj['desc']) ?></p>

          <div class="proj-highlights">
            <div class="proj-highlights-title">Key Highlights</div>
            <ul>
              <?php foreach ($proj['highlights'] as $h): ?>
              <li><?= htmlspecialchars($h) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>

          <div class="proj-tools">
            <?php foreach ($proj['tools'] as $t): ?>
            <span class="tool-pill"><?= htmlspecialchars($t) ?></span>
            <?php endforeach; ?>
          </div>
        </div>

      </div>
    </div><!-- /project-full -->
    <?php endforeach; ?>

    <!-- Coming Soon -->
    <div class="proj-coming-soon reveal">
      <div class="coming-soon-icon">🚀</div>
      <div class="coming-soon-title">More Coming Soon</div>
      <p>Always building something new. Follow my GitHub for updates.</p>
      <a href="https://github.com/tandarrylle-beep/my-portfolio.git" target="_blank" rel="noopener" class="btn-ghost">View GitHub →</a>
    </div>

  </div>
</section>

<!-- ── LIGHTBOX ── -->
<div class="lightbox" id="lightbox">
  <div class="lightbox-backdrop" onclick="closeLightbox()"></div>
  <button class="lightbox-close" onclick="closeLightbox()">&times;</button>
  <button class="lightbox-nav lightbox-prev" id="lb-prev" onclick="lbNav(-1)">&#8249;</button>
  <div class="lightbox-content">
    <img id="lb-img" src="" alt=""/>
    <div class="lightbox-caption" id="lb-caption"></div>
  </div>
  <button class="lightbox-nav lightbox-next" id="lb-next" onclick="lbNav(1)">&#8250;</button>
</div>

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

<!-- ──────────── PAGE-SPECIFIC STYLES ──────────── -->
<style>
.filter-bar { display:flex;flex-wrap:wrap;gap:.75rem;margin-bottom:3rem; }
.filter-btn {
  font-family:var(--font);font-size:.82rem;font-weight:600;
  padding:7px 20px;border-radius:50px;
  border:1px solid var(--border);background:transparent;color:var(--muted);
  cursor:pointer;transition:all .2s;letter-spacing:.02em;
}
.filter-btn.active,.filter-btn:hover { border-color:var(--accent);color:var(--accent);background:var(--accent-dim); }

.project-full {
  margin-bottom:2.5rem;background:var(--surface);
  border:1px solid var(--border);border-radius:20px;overflow:hidden;
  transition:border-color .3s,box-shadow .4s;
}
.project-full:hover { border-color:var(--border2);box-shadow:0 16px 50px rgba(0,0,0,.3); }
.project-full.hidden { display:none; }

.project-full-inner { display:grid;grid-template-columns:440px 1fr; }

.project-visuals { background:var(--bg2); }

.proj-gallery { height:100%;display:flex;flex-direction:column; }
.proj-gallery-main {
  flex:1;position:relative;overflow:hidden;min-height:300px;
  background:#000;cursor:pointer;
}
.gallery-main-img {
  width:100%;height:100%;object-fit:contain;max-height:400px;
  transition:transform .4s;display:block;
}
.proj-gallery-main:hover .gallery-main-img { transform:scale(1.02); }
.gallery-overlay {
  position:absolute;inset:0;background:rgba(0,0,0,.55);
  display:flex;flex-direction:column;align-items:center;justify-content:center;gap:6px;
  opacity:0;transition:opacity .3s;
  color:white;font-size:.82rem;font-weight:600;letter-spacing:.06em;
}
.proj-gallery-main:hover .gallery-overlay { opacity:1; }

.proj-gallery-thumbs {
  display:flex;gap:6px;padding:10px;
  background:var(--bg);overflow-x:auto;scrollbar-width:thin;
  flex-shrink:0;
}
.thumb-btn {
  flex-shrink:0;width:62px;height:62px;border-radius:8px;overflow:hidden;
  border:2px solid transparent;cursor:pointer;background:none;padding:0;
  transition:border-color .2s,opacity .2s;opacity:.5;
}
.thumb-btn img { width:100%;height:100%;object-fit:cover; }
.thumb-btn.active,.thumb-btn:hover { border-color:var(--accent);opacity:1; }

.proj-no-img {
  height:100%;min-height:300px;
  display:flex;flex-direction:column;align-items:center;justify-content:center;gap:1rem;
  position:relative;overflow:hidden;
}
.proj-no-img-num {
  position:absolute;font-family:var(--font-head);
  font-size:7rem;font-weight:800;opacity:.05;color:white;letter-spacing:-.05em;
}
.proj-no-img-label {
  position:relative;z-index:2;font-size:.75rem;font-weight:700;
  letter-spacing:.1em;text-transform:uppercase;
  background:rgba(0,0,0,.4);padding:4px 14px;border-radius:50px;
}

.project-content { padding:2.5rem;display:flex;flex-direction:column;gap:1.25rem; }
.proj-meta-row { display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.5rem; }
.proj-num { font-size:.72rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase; }
.proj-status {
  font-size:.7rem;font-weight:600;padding:4px 12px;border-radius:50px;
  background:rgba(0,229,160,.1);color:var(--accent2);border:1px solid rgba(0,229,160,.2);
}
.proj-badge {
  font-size:.68rem;font-weight:600;padding:4px 12px;border-radius:50px;
  background:rgba(240,192,64,.1);color:var(--gold);border:1px solid rgba(240,192,64,.25);
}
.proj-name { font-family:var(--font-head);font-size:1.25rem;font-weight:700;color:var(--white);line-height:1.25; }
.proj-desc { font-size:.9rem;font-weight:300;color:var(--muted);line-height:1.8; }
.proj-highlights-title { font-size:.72rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--dim);margin-bottom:.75rem; }
.proj-highlights ul { list-style:none;display:flex;flex-direction:column;gap:.5rem; }
.proj-highlights li { font-size:.86rem;color:var(--text);padding-left:18px;position:relative;line-height:1.6; }
.proj-highlights li::before { content:'→';position:absolute;left:0;color:var(--accent);font-size:.75rem; }
.proj-tools { display:flex;flex-wrap:wrap;gap:6px;margin-top:auto; }

.proj-coming-soon {
  text-align:center;margin-top:1rem;padding:3rem;
  background:var(--surface);border:1px dashed var(--border);border-radius:16px;
}
.coming-soon-icon { font-size:2rem;margin-bottom:1rem; }
.coming-soon-title { font-family:var(--font-head);font-size:1.1rem;font-weight:700;color:var(--off-white);margin-bottom:.5rem; }
.proj-coming-soon p { font-size:.87rem;color:var(--muted);max-width:400px;margin:0 auto 1.5rem; }

/* Lightbox */
.lightbox {
  position:fixed;inset:0;z-index:1000;
  display:none;align-items:center;justify-content:center;
}
.lightbox.open { display:flex; }
.lightbox-backdrop { position:absolute;inset:0;background:rgba(0,0,0,.94);backdrop-filter:blur(10px); }
.lightbox-content { position:relative;z-index:2;max-width:90vw;max-height:90vh;text-align:center; }
.lightbox-content img { max-width:88vw;max-height:80vh;object-fit:contain;border-radius:10px;display:block; }
.lightbox-caption { font-size:.84rem;color:rgba(255,255,255,.55);margin-top:12px;letter-spacing:.04em; }
.lightbox-close {
  position:fixed;top:1.5rem;right:1.5rem;z-index:3;
  background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);
  color:white;font-size:1.5rem;width:44px;height:44px;border-radius:50%;
  cursor:pointer;display:flex;align-items:center;justify-content:center;
  transition:background .2s;
}
.lightbox-close:hover { background:rgba(255,255,255,.25); }
.lightbox-nav {
  position:fixed;top:50%;transform:translateY(-50%);z-index:3;
  background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.15);
  color:white;font-size:2.2rem;width:52px;height:52px;border-radius:50%;
  cursor:pointer;display:flex;align-items:center;justify-content:center;
  transition:background .2s;
}
.lightbox-nav:hover { background:rgba(255,255,255,.2); }
.lightbox-prev { left:1.5rem; }
.lightbox-next { right:1.5rem; }

@media(max-width:860px) {
  .project-full-inner { grid-template-columns:1fr; }
  .proj-gallery-main { min-height:240px; }
  .proj-no-img { min-height:220px; }
  .project-content { padding:1.75rem; }
}
</style>

<?php include 'components/footer.php'; ?>
<script src="assets/js/main.js"></script>
<script>
// ── FILTER ──
document.querySelectorAll('.filter-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const f = btn.dataset.filter;
    document.querySelectorAll('.project-full').forEach(card => {
      const tags = card.dataset.tags || '';
      card.classList.toggle('hidden', f !== 'all' && !tags.includes(f));
    });
  });
});

// ── GALLERY SWITCH ──
function switchGallery(projId, thumbEl) {
  const mainImg = document.getElementById('main-img-' + projId);
  if (!mainImg) return;
  const src     = thumbEl.dataset.src;
  const caption = thumbEl.dataset.caption;
  mainImg.style.opacity = '0';
  setTimeout(() => { mainImg.src = src; mainImg.alt = caption; mainImg.style.opacity = '1'; }, 180);
  const wrap = thumbEl.closest('.proj-gallery-thumbs');
  if (wrap) wrap.querySelectorAll('.thumb-btn').forEach(t => t.classList.remove('active'));
  thumbEl.classList.add('active');
}

// ── LIGHTBOX ──
let lbImages = [], lbIdx = 0;

function openLightbox(projId, startIdx) {
  lbImages = [];
  // Find card containing this project's gallery
  const card = document.querySelector('#main-img-' + projId)?.closest('.project-full');
  if (!card) return;
  card.querySelectorAll('.thumb-btn').forEach(t => {
    lbImages.push({ src: t.dataset.src, caption: t.dataset.caption });
  });
  // Single image (no thumbs)
  if (!lbImages.length) {
    const mi = document.getElementById('main-img-' + projId);
    if (mi) lbImages.push({ src: mi.src, caption: mi.alt });
  }
  // Find which thumb is currently active
  const activeTb = card.querySelector('.thumb-btn.active');
  lbIdx = activeTb ? parseInt(activeTb.dataset.idx) : 0;
  renderLightbox();
  document.getElementById('lightbox').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function renderLightbox() {
  const img = lbImages[lbIdx];
  if (!img) return;
  const el = document.getElementById('lb-img');
  el.style.opacity = '0';
  setTimeout(() => { el.src = img.src; el.alt = img.caption; el.style.opacity = '1'; el.style.transition = 'opacity .25s'; }, 100);
  document.getElementById('lb-caption').textContent = img.caption + '  (' + (lbIdx+1) + ' / ' + lbImages.length + ')';
  const show = lbImages.length > 1;
  document.getElementById('lb-prev').style.display = show ? 'flex' : 'none';
  document.getElementById('lb-next').style.display = show ? 'flex' : 'none';
}

function lbNav(dir) {
  lbIdx = (lbIdx + dir + lbImages.length) % lbImages.length;
  renderLightbox();
}

function closeLightbox() {
  document.getElementById('lightbox').classList.remove('open');
  document.body.style.overflow = '';
}

document.addEventListener('keydown', e => {
  if (!document.getElementById('lightbox').classList.contains('open')) return;
  if (e.key === 'Escape') closeLightbox();
  if (e.key === 'ArrowRight') lbNav(1);
  if (e.key === 'ArrowLeft')  lbNav(-1);
});
</script>
</body>
</html>

<?php
function getProjectIconLarge(string $type, string $color): string {
  $t = strtolower($type);
  $s = 'position:relative;z-index:2;';
  if (str_contains($t,'ai')||str_contains($t,'ml'))
    return '<svg viewBox="0 0 24 24" stroke="'.$color.'" fill="none" stroke-width="1.4" stroke-linecap="round" width="40" height="40" style="'.$s.'"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>';
  if (str_contains($t,'mobile')||str_contains($t,'app'))
    return '<svg viewBox="0 0 24 24" stroke="'.$color.'" fill="none" stroke-width="1.4" stroke-linecap="round" width="40" height="40" style="'.$s.'"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="9" y1="7" x2="15" y2="7"/><circle cx="12" cy="17" r="1" fill="'.$color.'"/></svg>';
  if (str_contains($t,'database')||str_contains($t,'sql'))
    return '<svg viewBox="0 0 24 24" stroke="'.$color.'" fill="none" stroke-width="1.4" stroke-linecap="round" width="40" height="40" style="'.$s.'"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>';
  if (str_contains($t,'gis')||str_contains($t,'geo'))
    return '<svg viewBox="0 0 24 24" stroke="'.$color.'" fill="none" stroke-width="1.4" stroke-linecap="round" width="40" height="40" style="'.$s.'"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>';
  return '<svg viewBox="0 0 24 24" stroke="'.$color.'" fill="none" stroke-width="1.4" stroke-linecap="round" width="40" height="40" style="'.$s.'"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>';
}
