<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Alerts',
    'description' => 'Examples of global and inline alerts.',
    'section_nav' => true,
    'section_nav_include' => __DIR__ . '/navs/section-nav-default.php',
    'sidenav' => false,
    'sidenav_include' => __DIR__ . '/navs/section-nav-default.php',
    'custom_hero' => false
]);
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="<?php echo lbcc_escape(lbcc_body_classes($page)); ?>">
<?php component_alert(
    'Emergency Alert',
    '<p class="mb-0">The Liberal Arts Campus is temporarily closed due to an emergency. Please check campus updates before traveling to campus.</p>',
    'emergency',
    'fa-triangle-exclamation',
    ['text' => 'View Emergency Updates', 'url' => '#', 'class' => 'btn btn-outline-dark btn-sm'],
    true,
    '',
    '',
    true,
    'September 2, 2026'
); ?>
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<?php if ($page['custom_hero']) { ?>
<?php // Include Custom Hero Component here... ?>
<?php } ?>
<main id="main-content">
    <section class="section-content-only">
        <div class="container-xxl">
            <h2>Inline Alerts</h2>
            <p class="lead">Use inline alerts to share contextual information and time-sensitive notices within page content.</p>

            <?php component_alert(
                'Important Information',
                '<p class="mb-0">Registration for the upcoming term opens April 1. Review your registration appointment before enrolling.</p>',
                'info',
                'fa-circle-info',
                ['text' => 'Registration Details', 'url' => '#', 'class' => 'btn btn-outline-primary btn-sm']
            ); ?>

            <?php component_alert(
                'Action Needed',
                '<p class="mb-0">Financial aid documents are due soon. Submit any requested materials before the deadline to avoid a delay.</p>',
                'warning',
                'fa-triangle-exclamation',
                ['text' => 'Review Financial Aid', 'url' => '#', 'class' => 'btn btn-outline-dark btn-sm']
            ); ?>
        </div>
    </section>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
