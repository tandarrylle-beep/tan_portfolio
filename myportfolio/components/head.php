<?php
// components/head.php
// Usage: include with $page_title and $page_desc set beforehand
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title><?= htmlspecialchars($page_title ?? SITE_NAME . ' — ' . SITE_TAGLINE) ?></title>
<meta name="description" content="<?= htmlspecialchars($page_desc ?? SITE_DESC) ?>"/>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="<?= $base_path ?? '' ?>assets/css/main.css"/>
<style>
/* =============================================
   INTERACTIVE PARTICLE CANVAS BACKGROUND
   ============================================= */
#bg-canvas {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  z-index: 0;
  pointer-events: none;
}
</style>
</head>
<body>
<canvas id="bg-canvas"></canvas>
