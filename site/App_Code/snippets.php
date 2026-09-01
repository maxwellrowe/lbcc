<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Snippets',
    'description' => 'LBCC snippet development and documentation area.',
    'section_nav' => true,
    'section_nav_include' => __DIR__ . '/navs/section-nav-default.php',
    'sidenav' => false,
    'sidenav_include' => '',
    'custom_hero' => false
]);

$snippetIncludesDir = __DIR__ . '/includes/snippets';
$snippetAnchorItems = [
    ['link' => '#section', 'title' => 'Section'],
    ['link' => '#section-background-video', 'title' => 'Section with Background Video'],
    ['link' => '#columns', 'title' => 'Columns'],
    ['link' => '#equal-columns', 'title' => 'Equal Columns'],
    ['link' => '#tabs', 'title' => 'Tabs'],
    ['link' => '#accordion', 'title' => 'Accordion'],
    ['link' => '#collapse', 'title' => 'Collapse'],
    ['link' => '#card', 'title' => 'Card Well'],
    ['link' => '#carousel-anything', 'title' => 'Carousel Anything']
];
$snippetAnchorGroups = array_chunk($snippetAnchorItems, (int) ceil(count($snippetAnchorItems) / 3));
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

    <div class="container-xxl my-5">
        <p class="eyebrow mb-2">Templates &amp; Resources</p>
        <p class="lead text-body-secondary mb-0">This is a baseline snippet library modeled after the GCC reference page and adapted to the current LBCC starter code. We can refine background options, wrappers, and snippet-specific patterns as we build each one out.</p>
    </div>

    <div class="container-xxl">
        <section aria-labelledby="snippets-jump-heading" class="mb-5">
            <h2 id="snippets-jump-heading">Jump to a Snippet</h2>
            <p class="text-body-secondary mb-4">Use the links below to move directly to each snippet section on this page.</p>
            <div class="row row-cols-1 row-cols-lg-3 g-4">
                <?php foreach ($snippetAnchorGroups as $anchorGroup) { ?>
                    <div class="col">
                        <?php component_list_group($anchorGroup, 'lined', 'sm'); ?>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>

    <?php include $snippetIncludesDir . '/section.php'; ?>

    <?php include $snippetIncludesDir . '/section-background-video.php'; ?>

    <section class="mb-5" id="columns">
        <div class="container-xxl">
            <h2>Columns</h2>
            <?php include $snippetIncludesDir . '/columns.php'; ?>
        </div>
    </section>

    <section class="mb-5" id="equal-columns">
        <div class="container-xxl">
            <h2>Equal Columns</h2>
            <?php include $snippetIncludesDir . '/columns-equal.php'; ?>
        </div>
    </section>

    <?php include $snippetIncludesDir . '/tabs.php'; ?>

    <?php include $snippetIncludesDir . '/accordion.php'; ?>

    <section class="mb-5" id="collapse">
        <div class="container-xxl">
            <h2>Collapse</h2>
            <?php include $snippetIncludesDir . '/collapse.php'; ?>
        </div>
    </section>

    <section class="mb-5" id="card">
        <div class="container-xxl">
            <h2>Card Well</h2>
            <?php include $snippetIncludesDir . '/card.php'; ?>
        </div>
    </section>

    <section class="mb-5" id="carousel-anything">
        <div class="container-xxl">
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
