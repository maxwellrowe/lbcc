<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Accounting',
    'description' => 'Placeholder single program template.',
    'section_nav' => true,
    'section_nav_include' => __DIR__ . '/navs/section-nav-business.php',
    'sidebar' => false,
    'sidebar_include' => '',
    'custom_hero' => true
]);
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="lbcc-page">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<div class="bg-water-gradient page-hero">
    <div class="container-xxl py-4">
        <?php // Breadcrumbs Include
            include __DIR__ . '/breadcrumbs.php'; 
        ?> 
        <?php if ($pageTitle !== '') { ?>
            <h1 class="page-title-default mb-0 mt-5 fs-6xl lbcc-animate lbcc-fade lbcc-duration-700"><?php echo lbcc_escape($pageTitle); ?></h1>
        <?php } ?>
    </div>

    <div class="rounded-top-5 page-cap"></div>
</div>
<main id="main-content" class="py-5">
    <div class="container-xxl">
        
    </div>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
