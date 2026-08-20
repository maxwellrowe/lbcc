<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'App Code',
    'description' => 'LBCC development and documentation area.'
]);
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="lbcc-page">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<?php if ($page['custom_hero']) { ?>
<?php // Include Custom Hero Component here... ?>
<?php } ?>
<main id="main-content" class="py-5">
    <div class="container">
        <p class="eyebrow">Development Area</p>
        <h1>App_Code</h1>
        <p class="lead text-body-secondary">Use this area for component documentation, test fixtures, and Omni-oriented implementation notes.</p>
        <div class="card bg-surface-raised p-4 mt-4">
            <h2 class="h4">Available pages</h2>
            <ul class="mb-0">
                <li><a href="<?php echo lbcc_escape(lbcc_url('/')); ?>">Homepage shell</a></li>
                <li><a href="<?php echo lbcc_escape(lbcc_url('/current-students.php')); ?>">Current students shell</a></li>
                <li><a href="<?php echo lbcc_escape(lbcc_url('/App_Code/components.php')); ?>">Components</a></li>
                <li><a href="<?php echo lbcc_escape(lbcc_url('/App_Code/snippets.php')); ?>">Snippets</a></li>
                <li><a href="<?php echo lbcc_escape(lbcc_url('/App_Code/styleguide.php')); ?>">Style guide</a></li>
            </ul>
        </div>
    </div>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
