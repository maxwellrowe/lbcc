<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Support',
    'description' => 'Sample support matrix page with filtering by audience and student support need.',
    'section_nav' => false,
    'section_nav_include' => '',
    'sidenav' => false,
    'sidenav_include' => '',
    'custom_hero' => true
]);

$supportMatrixData = lbcc_support_matrix_load_data(__DIR__ . '/data/support-matrix.json');
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="<?php echo lbcc_escape(lbcc_body_classes($page)); ?>">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<?php if ($page['custom_hero']) { ?>
<?php
    component_hero(
        'full',
        'Support at LBCC',
        '',
        [
            [
                'type' => 'image',
                'src' => '_resources/images/academics/academics-hero.jpg',
                'alt' => ''
            ],
            [
                'type' => 'image',
                'src' => '_resources/images/academics/academics-hero-2.jpg',
                'alt' => ''
            ],
            [
                'type' => 'image',
                'src' => '_resources/images/academics/academics-hero-3.jpg',
                'alt' => ''
            ],
            [
                'type' => 'image',
                'src' => '_resources/images/academics/academics-hero-4.jpg',
                'alt' => ''
            ],
            [
                'type' => 'image',
                'src' => '_resources/images/academics/academics-hero-5.jpg',
                'alt' => ''
            ],
            [
                'type' => 'image',
                'src' => '_resources/images/academics/academics-hero-6.jpg',
                'alt' => ''
            ]
        ],
        [
            [
                'type' => 'image',
                'src' => '_resources/images/hero-backgrounds/hero-bg-1.jpg',
                'alt' => ''
            ]
        ],
        [
            [
                'type' => 'image',
                'src' => '_resources/images/hero-backgrounds/hero-bg-13.jpg',
                'alt' => ''
            ]
        ],
        false
    );
    ?>
</div>
<?php } ?>
<main id="main-content" class="support-page">
    <section class="py-5">
        <div class="container-xxl">
            <div class="row align-items-center g-5">
                <div class="col-12 col-lg-9 pe-xl-5">
                    <h2>Open Doors with a Community That Has Your Back</h2>
                    <p class="lead">Support at LBCC meets you where you are and helps you keep moving toward what’s next. From academic help to basic needs and identity-based support, this is your place to explore what’s available, connect with real people, and feel supported every step of the way.</p>
                </div>
                <div class="col-12 col-lg-3">
                    <?php
                    component_card_as_link(
                        '#',
                        'Not sure what you need?',
                        'Visit the Welcome Center, and we will connect you!',
                        'primary-border-thin',
                        ''
                    );
                    ?>
                </div>
            </div>
        </div>
    </section>
    <div class="container-xxl d-grid gap-4">
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
