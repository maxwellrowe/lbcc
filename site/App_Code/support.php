<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Support',
    'description' => 'Sample support matrix page with filtering by audience and student support need.',
    'section_nav' => false,
    'section_nav_include' => '',
    'sidenav' => false,
    'sidenav_include' => '',
    'custom_hero' => false
]);

$supportMatrixData = lbcc_support_matrix_load_data(__DIR__ . '/data/support-matrix.json');
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="<?php echo lbcc_escape(lbcc_body_classes($page)); ?>">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<?php if ($page['custom_hero']) { ?>
<?php // Include Custom Hero Component here... ?>
<?php } ?>
<main id="main-content" class="support-page">
    <div class="container-xxl d-grid gap-4">
        <div class="w-100">
            <p class="mb-0 text-body-secondary">Browse support resources and narrow the list by who you are, what you need, or both.</p>
        </div>

        <?php
        component_support_matrix(
            $supportMatrixData['items'],
            '',
            true,
            $supportMatrixData['needs'],
            $supportMatrixData['audiences'],
            [],
            [],
            1,
            2,
            3
        );
        ?>
    </div>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
