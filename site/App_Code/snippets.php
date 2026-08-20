<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Snippets',
    'description' => 'LBCC snippet development and documentation area.',
    'section_nav' => true,
    'section_nav_include' => __DIR__ . '/navs/section-nav-default.php',
    'sidebar' => false,
    'sidebar_include' => '',
    'custom_hero' => false
]);

$snippetIncludesDir = __DIR__ . '/includes/snippets';
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

    <div class="container my-5">
        <p class="eyebrow mb-2">Templates &amp; Resources</p>
        <p class="lead text-body-secondary mb-0">This is a baseline snippet library modeled after the GCC reference page and adapted to the current LBCC starter code. We can refine background options, wrappers, and snippet-specific patterns as we build each one out.</p>
    </div>

    <?php include $snippetIncludesDir . '/section.php'; ?>

    <section class="mb-5" id="columns">
        <div class="container">
            <h2>Columns</h2>
            <?php include $snippetIncludesDir . '/columns.php'; ?>
        </div>
    </section>

    <section class="mb-5" id="equal-columns">
        <div class="container">
            <h2>Equal Columns</h2>
            <?php include $snippetIncludesDir . '/columns-equal.php'; ?>
        </div>
    </section>

    <section class="mb-5" id="full-width-bg">
        <div class="container">
            <h2>Full Width Background</h2>
        </div>
        <?php include $snippetIncludesDir . '/full-width-bg.php'; ?>
    </section>

    <section class="mb-5" id="accordion">
        <div class="container">
            <h2>Accordion</h2>
            <?php include $snippetIncludesDir . '/accordion.php'; ?>
        </div>
    </section>

    <section class="mb-5" id="collapse">
        <div class="container">
            <h2>Collapse</h2>
            <?php include $snippetIncludesDir . '/collapse.php'; ?>
        </div>
    </section>

    <section class="mb-5" id="card">
        <div class="container">
            <h2>Card</h2>
            <?php include $snippetIncludesDir . '/card.php'; ?>
        </div>
    </section>

    <section class="mb-5" id="carousel-anything">
        <div class="container">
            <h2>Carousel Anything</h2>
            <?php include $snippetIncludesDir . '/carousel-anything.php'; ?>
        </div>
    </section>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
