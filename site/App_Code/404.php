<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => '404: Page Not Found',
    'description' => 'Sample 404 error page template.',
    'section_nav' => false,
    'section_nav_include' => '',
    'sidenav' => false,
    'sidenav_include' => '',
    'custom_hero' => false
]);

$homeUrl = lbcc_url('/App_Code/index.php');
$azUrl = lbcc_url('/App_Code/a-z.php');
$helpTicketUrl = '#';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="<?php echo lbcc_escape(lbcc_body_classes($page)); ?>">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<main id="main-content">
    <section class="section-content-only py-5">
        <div class="container-xxl py-5">
            <p class="lead">
                The page you requested could not be found. It may have moved or may no longer exist. Use the sources below to help find what you are looking for.
            </p>

            <div class="d-flex flex-wrap align-items-center gap-3">
                <a href="<?php echo lbcc_escape($homeUrl); ?>" class="btn btn-primary">LBCC Homepage</a>
                <a href="<?php echo lbcc_escape($azUrl); ?>" class="btn btn-primary">A-Z Index</a>
                <a
                    href="#site-desktop-search"
                    class="btn btn-primary"
                    data-bs-toggle="collapse"
                    role="button"
                    aria-expanded="false"
                    aria-controls="site-desktop-search"
                >
                    Search
                </a>
            </div>

            <hr class="my-4 opacity-100">

            <p>
                If you are a current student or employee, submit a help ticket.
            </p>

            <div class="mt-3">
                <a href="<?php echo lbcc_escape($helpTicketUrl); ?>" class="btn btn-outline-secondary btn-sm">Submit a Help Ticket</a>
            </div>
        </div>
    </section>
    
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
