<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Basic Page',
    'description' => 'Sample basic page template for reviewing typography and content flow.',
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
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<?php if ($page['custom_hero']) { ?>
<?php // Include Custom Hero Component here... ?>
<?php } ?>
<main id="main-content">
    <section class="section-content-only">
        <div class="container-xxl">
            <h2>Heading 2</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet nunc ac orci scelerisque vulputate. Aliquam erat volutpat. In sit amet magna eu sapien dapibus feugiat. Sed lacinia malesuada felis, id tincidunt nisl facilisis ut.</p>
            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque eu risus nec urna tristique porttitor. Duis non risus a lorem porta accumsan. Vivamus ac pulvinar leo. Sed tincidunt, lorem sed laoreet tristique, ligula libero condimentum justo, vitae luctus diam lacus non leo.</p>
            <h3>Heading 3</h3>
            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque eu risus nec urna tristique porttitor. Duis non risus a lorem porta accumsan. Vivamus ac pulvinar leo. Sed tincidunt, lorem sed laoreet tristique, ligula libero condimentum justo, vitae luctus diam lacus non leo.</p>
            <blockquote>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque eu risus nec urna tristique porttitor.</blockquote>
            <h3>Heading 3</h3>
            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque eu risus nec urna tristique porttitor. Duis non risus a lorem porta accumsan. Vivamus ac pulvinar leo. Sed tincidunt, lorem sed laoreet tristique, ligula libero condimentum justo, vitae luctus diam lacus non leo.</p>
            <h4>Heading 4</h4>
            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque eu risus nec urna tristique porttitor. Duis non risus a lorem porta accumsan. Vivamus ac pulvinar leo. Sed tincidunt, lorem sed laoreet tristique, ligula libero condimentum justo, vitae luctus diam lacus non leo.</p>
            <ul>
                <li>Duis non risus a lorem porta accumsan.</li>
                <li>Duis non risus a lorem porta accumsan.</li>
                <li>Duis non risus a lorem porta accumsan.</li>
            </ul>
            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque eu risus nec urna tristique porttitor. Duis non risus a lorem porta accumsan. Vivamus ac pulvinar leo. Sed tincidunt, lorem sed laoreet tristique, ligula libero condimentum justo, vitae luctus diam lacus non leo.</p>
            <h2>Heading 2</h2>
            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque eu risus nec urna tristique porttitor. Duis non risus a lorem porta accumsan. Vivamus ac pulvinar leo. Sed tincidunt, lorem sed laoreet tristique, ligula libero condimentum justo, vitae luctus diam lacus non leo.</p>
        </div>
    </section>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
