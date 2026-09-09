<?php
require_once __DIR__ . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'LBCC',
    'description' => 'LBCC template and resource library.'
]);
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="lbcc-page">
<?php include __DIR__ . '/_resources/includes/header.php'; ?>
<main id="main-content">
    <div class="container-xxl py-4">
        <a class="btn btn-primary" href="<?php echo lbcc_escape(lbcc_url('/App_Code/index.php')); ?>">Templates &amp; Resources</a>
    </div>
</main>
<?php include __DIR__ . '/_resources/includes/footer.php'; ?>
<?php include __DIR__ . '/_resources/includes/footer-scripts.php'; ?>
<?php include __DIR__ . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
