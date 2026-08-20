<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Components',
    'description' => 'LBCC component development and documentation area.',
    'section_nav' => true,
    'section_nav_include' => __DIR__ . '/navs/section-nav-default.php',
    'sidebar' => false,
    'sidebar_include' => '',
    'custom_hero' => false
]);

$componentIncludesDir = __DIR__ . '/includes/components';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="lbcc-page">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<?php if ($page['custom_hero']) { ?>
<?php // Include Custom Hero Component here... ?>
<?php } ?>
<main id="main-content">

    <?php include $componentIncludesDir . '/hero.php'; ?>

    <div class="container">
        <?php include $componentIncludesDir . '/utilities.php'; ?>
        <?php include $componentIncludesDir . '/block-arrow-link.php'; ?>
        <?php include $componentIncludesDir . '/buttons.php'; ?>
        <?php include $componentIncludesDir . '/card.php'; ?>
        <?php include $componentIncludesDir . '/card-as-link.php'; ?>
        <?php include $componentIncludesDir . '/badge.php'; ?>
        <?php include $componentIncludesDir . '/footer-i-heart-lb.php'; ?>
        <?php include $componentIncludesDir . '/quicklinks.php'; ?>
        <?php include $componentIncludesDir . '/spacer.php'; ?>
    </div>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
