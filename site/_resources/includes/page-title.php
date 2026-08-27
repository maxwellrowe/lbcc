<?php
if (!isset($page) || !is_array($page)) {
    return;
}

$page = lbcc_resolve_page($page);
$pageTitle = $page['title'] ?? '';

if (!$page['custom_hero']) { ?>

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

<?php } ?>
