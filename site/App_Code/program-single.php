<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Single Program Example',
    'description' => 'Placeholder single program template.',
    'section_nav' => true,
    'section_nav_include' => __DIR__ . '/navs/section-nav-programs.php',
    'sidebar' => false,
    'sidebar_include' => '',
    'custom_hero' => false
]);
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="lbcc-page">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<main id="main-content" class="py-5">
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-9">
                <h1>Single Program Example</h1>
            </div>
        </div>
    </div>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
