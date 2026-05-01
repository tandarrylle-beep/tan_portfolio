<?php
// components/footer.php
global $personal, $socials;
?>
<footer>
  <div class="footer-inner">
    <div class="footer-brand">
      <div class="footer-logo">
        <div class="nav-logo-mark"><span>D</span></div>
        <span><?= htmlspecialchars($personal['name']) ?></span>
      </div>
      <p class="footer-tagline">Building digital solutions that matter.</p>
    </div>

    <div class="footer-links">
      <a href="index.php">Home</a>
      <a href="about.php">About</a>
      <a href="services.php">Services</a>
      <a href="projects.php">Projects</a>
      <a href="contact.php">Contact</a>
    </div>

    <div class="footer-socials">
      <?php foreach ($socials as $s): ?>
      <a href="<?= $s['url'] ?>" target="_blank" rel="noopener" class="social-btn" aria-label="<?= $s['label'] ?>">
        <?= strtoupper($s['short']) ?>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="footer-bottom">
    <p>© <?= date('Y') ?> <?= htmlspecialchars($personal['name']) ?>. All Rights Reserved.</p>
    <p class="footer-made">Crafted with passion in the Philippines 🇵🇭</p>
  </div>
</footer>
