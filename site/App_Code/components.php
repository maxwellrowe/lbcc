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
$componentAnchorItems = [
    ['link' => '#hero-heading', 'title' => 'Hero'],
    ['link' => '#block-arrow-link-heading', 'title' => 'Block Arrow Link'],
    ['link' => '#buttons-heading', 'title' => 'Buttons'],
    ['link' => '#title-with-ctas-heading', 'title' => 'Title with CTAs'],
    ['link' => '#card-component-heading', 'title' => 'Card'],
    ['link' => '#card-as-link-heading', 'title' => 'Card as Link'],
    ['link' => '#contact-card-heading', 'title' => 'Contact Card'],
    ['link' => '#degree-certificate-heading', 'title' => 'Degree / Certificate'],
    ['link' => '#program-card-heading', 'title' => 'Program Card'],
    ['link' => '#support-matrix-heading', 'title' => 'Support Matrix'],
    ['link' => '#list-group-heading', 'title' => 'List Group'],
    ['link' => '#events-component-heading', 'title' => 'Events'],
    ['link' => '#badge-heading', 'title' => 'Badge'],
    ['link' => '#footer-i-heart-lb-heading', 'title' => 'Footer I Heart LB'],
    ['link' => '#quicklinks-heading', 'title' => 'Quicklinks'],
    ['link' => '#testimonial-carousel-heading', 'title' => 'Testimonial Carousel'],
    ['link' => '#vertical-slider-heading', 'title' => 'Vertical Slider'],
    ['link' => '#fade-slider-heading', 'title' => 'Fade Slider'],
    ['link' => '#quiet-video-heading', 'title' => 'Quiet Video'],
    ['link' => '#ticker-heading', 'title' => 'Ticker'],
    ['link' => '#spacer-heading', 'title' => 'Spacer']
];
$componentAnchorGroups = array_chunk($componentAnchorItems, (int) ceil(count($componentAnchorItems) / 3));
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
    <div class="container-xxl">
        <section aria-labelledby="components-jump-heading" class="mb-5">
            <h2 id="components-jump-heading">Jump to a Component</h2>
            <p class="text-body-secondary mb-4">Use the links below to move directly to each component section on this page.</p>
            <div class="row row-cols-1 row-cols-lg-3 g-4">
                <?php foreach ($componentAnchorGroups as $anchorGroup) { ?>
                    <div class="col">
                        <?php component_list_group($anchorGroup, 'lined', 'sm'); ?>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>

    <?php include $componentIncludesDir . '/hero.php'; ?>

    <div class="container-xxl">
        <?php include $componentIncludesDir . '/utilities.php'; ?>
        <?php include $componentIncludesDir . '/block-arrow-link.php'; ?>
        <?php include $componentIncludesDir . '/buttons.php'; ?>
        <?php include $componentIncludesDir . '/title-with-ctas.php'; ?>
        <?php include $componentIncludesDir . '/card.php'; ?>
        <?php include $componentIncludesDir . '/card-as-link.php'; ?>
        <?php include $componentIncludesDir . '/contact-card.php'; ?>
        <?php include $componentIncludesDir . '/degree-certificate.php'; ?>
        <?php include $componentIncludesDir . '/program-card.php'; ?>
        <?php include $componentIncludesDir . '/support-matrix.php'; ?>
        <?php include $componentIncludesDir . '/list-group.php'; ?>
        <?php include $componentIncludesDir . '/events.php'; ?>
        <?php include $componentIncludesDir . '/badge.php'; ?>
        <?php include $componentIncludesDir . '/footer-i-heart-lb.php'; ?>
        <?php include $componentIncludesDir . '/quicklinks.php'; ?>
        <?php include $componentIncludesDir . '/testimonial-carousel.php'; ?>
        <?php include $componentIncludesDir . '/vertical-slider.php'; ?>
        <?php include $componentIncludesDir . '/fade-slider.php'; ?>
        <?php include $componentIncludesDir . '/quiet-video.php'; ?>
        <?php include $componentIncludesDir . '/ticker.php'; ?>
        <?php include $componentIncludesDir . '/spacer.php'; ?>
    </div>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
