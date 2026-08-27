<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Basic Page',
    'description' => 'Sample basic page template for reviewing typography and content flow.',
    'section_nav' => true,
    'section_nav_include' => __DIR__ . '/navs/section-nav-default.php',
    'sidebar' => false,
    'sidebar_include' => '',
    'custom_hero' => false
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
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-10 col-xxl-9">
                <div class="d-grid gap-5">
                    <section class="d-grid gap-3">
                        <p class="lead mb-0">This basic page is meant to help review how title hierarchy, body copy, quotes, and lists feel together in a longer editorial flow.</p>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer gravida, velit nec faucibus feugiat, nibh justo eleifend lectus, vitae ultrices sem mauris ut sapien. Sed porta, arcu a luctus pretium, neque libero feugiat nibh, vitae luctus augue tortor vitae nisl.</p>
                    </section>

                    <section class="d-grid gap-3">
                        <h2 class="mb-0">Section Heading Level Two</h2>
                        <p class="mb-0">Mauris blandit, lorem eget feugiat laoreet, justo ipsum sollicitudin nunc, sed gravida est lectus a nulla. Donec imperdiet risus at neque finibus, et pretium risus condimentum. Nunc id finibus mauris, in interdum est.</p>
                        <p class="mb-0">Curabitur at convallis ipsum. Quisque id dolor leo. Suspendisse potenti. Pellentesque non sem in mauris accumsan vulputate non non felis.</p>

                        <div class="ps-md-4 border-start border-4 border-primary">
                            <blockquote class="blockquote mb-2">
                                <p class="mb-0">“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras viverra eros quis velit faucibus, vitae feugiat lacus efficitur.”</p>
                            </blockquote>
                            <p class="mb-0 small text-body-secondary">Sample pull quote or testimonial attribution</p>
                        </div>
                    </section>

                    <section class="d-grid gap-3">
                        <h2 class="mb-0">Another Section Heading</h2>
                        <p class="mb-0">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum eleifend maximus tortor, a suscipit augue varius non. Duis sodales risus ut eros lobortis, eget bibendum odio ultrices.</p>

                        <h3 class="mb-0">Heading Level Three</h3>
                        <p class="mb-0">Aliquam erat volutpat. Ut dapibus ex ut dignissim aliquet. Integer tristique vulputate lectus, vel feugiat lectus feugiat sed.</p>

                        <ul class="mb-0 d-grid gap-2 ps-4">
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Donec faucibus neque eu sem gravida, quis feugiat urna pellentesque.</li>
                            <li>Vestibulum efficitur erat non lacus semper, sed finibus risus condimentum.</li>
                            <li>Morbi viverra magna vitae lectus facilisis, vitae finibus odio interdum.</li>
                        </ul>
                    </section>

                    <section class="d-grid gap-3">
                        <h2 class="mb-0">Process Example</h2>
                        <p class="mb-0">This section gives a sense of how ordered content reads when paired with explanatory copy.</p>

                        <ol class="mb-0 d-grid gap-2 ps-4">
                            <li>Start with a clear introductory statement that frames the purpose of the content.</li>
                            <li>Follow with supporting information that adds context without overwhelming the reader.</li>
                            <li>Introduce smaller subheadings only when the content genuinely needs a shift in topic.</li>
                            <li>Use lists selectively to make steps, requirements, or highlights easier to scan.</li>
                        </ol>

                        <h3 class="mb-0">Heading Level Three</h3>
                        <p class="mb-0">Nam non cursus nibh. Sed consequat pretium velit, a faucibus tortor tristique sed. Proin sed nisi at augue dictum interdum quis vitae lectus.</p>

                        <h4 class="mb-0">Heading Level Four</h4>
                        <p class="mb-0">Phasellus auctor sapien ac nisl viverra posuere. Integer sodales nibh augue, vel tincidunt lacus mattis in. Praesent quis metus ut augue lacinia viverra.</p>
                    </section>

                    <section class="d-grid gap-3">
                        <h2 class="mb-0">Closing Content Block</h2>
                        <p class="mb-0">Fusce semper justo vitae justo sollicitudin, ut posuere eros pellentesque. Praesent congue metus quis tellus bibendum, sed commodo sapien laoreet. Etiam fermentum tortor vel tempus auctor.</p>
                        <p class="mb-0">Aenean et nunc quis nibh feugiat dignissim. Integer rutrum laoreet nisi, at euismod lectus consequat nec. Quisque iaculis sem turpis, non feugiat tellus hendrerit ac. Vivamus vitae magna sit amet risus faucibus faucibus.</p>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
