<?php
// components/nav.php
$nav_links = [
  ['href' => ($base_path ?? '') . 'index.php',    'label' => 'Home'],
  ['href' => ($base_path ?? '') . 'about.php',    'label' => 'About'],
  ['href' => ($base_path ?? '') . 'services.php', 'label' => 'Services'],
  ['href' => ($base_path ?? '') . 'projects.php', 'label' => 'Projects'],
  ['href' => ($base_path ?? '') . 'contact.php',  'label' => 'Contact'],
];
$current = basename($_SERVER['PHP_SELF']);
?>
<nav id="navbar">
  <a href="<?= ($base_path ?? '') ?>index.php" class="nav-logo">
    <div class="nav-logo-mark">
      <span>D</span>
    </div>
    <span class="nav-logo-text">Darrylle<span class="dot">.</span></span>
  </a>

  <ul class="nav-links">
    <?php foreach ($nav_links as $link):
      $active = (basename($link['href']) === $current) ? ' class="active"' : '';
    ?>
    <li><a href="<?= $link['href'] ?>"<?= $active ?>><?= $link['label'] ?></a></li>
    <?php endforeach; ?>
  </ul>

  <div class="nav-right">
    <a href="<?= ($base_path ?? '') ?>contact.php" class="btn-hire">
      <span>Hire Me</span>
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
    <button class="hamburger" id="hamburger" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobile-menu">
  <div class="mobile-menu-inner">
    <?php foreach ($nav_links as $link):
      $active = (basename($link['href']) === $current) ? ' active' : '';
    ?>
    <a href="<?= $link['href'] ?>" class="mobile-link<?= $active ?>"><?= $link['label'] ?></a>
    <?php endforeach; ?>
    <a href="<?= ($base_path ?? '') ?>contact.php" class="btn-hire mobile-hire">
      <span>Hire Me</span>
    </a>
  </div>
</div>
