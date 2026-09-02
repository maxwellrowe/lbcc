<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Financial Aid',
    'description' => 'Financial Aid page template.',
    'section_nav' => true,
    'section_nav_include' => __DIR__ . '/navs/section-nav-financial-aid.php',
    'sidenav' => false,
    'sidenav_include' => '',
    'custom_hero' => true
]);
?>

<?php ob_start(); ?>
<?php component_buttons(
    [
        [
            'style' => 'btn-primary',
            'text' => 'Applying',
            'url' => '#',
            'size' => '',
            'icon' => ''
        ],
        [
            'style' => 'btn-primary',
            'text' => 'Costs',
            'url' => '#',
            'size' => '',
            'icon' => ''
        ],
        [
            'style' => 'btn-primary',
            'text' => 'Financial Help',
            'url' => '#',
            'size' => '',
            'icon' => ''
        ]
        
    ],
    'row',
    2
); ?>
<?php $buttonGroupMarkup = ob_get_clean(); ?>
<?php
$heroSupplementalContent = '
    <div>
        <p class="lead mt-3">Find everything you need to know about paying for college and all the options to help you afford it. </p>
        <div>' . $buttonGroupMarkup . '</div>
    </div>
';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="<?php echo lbcc_escape(lbcc_body_classes($page)); ?>">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<?php if ($page['custom_hero']) { ?>
<?php
component_hero(
    'split',
    'Financial Aid',
    $heroSupplementalContent,
    [
        [
            'type' => 'image',
            'src' => '_resources/images/placeholders/students/student-8-square.jpg',
            'alt' => ''
        ]
    ],
    [
        [
            'type' => 'image',
            'src' => '_resources/images/hero-backgrounds/hero-bg-12.jpg'
        ]
    ],
    [],
    true
);
?>
<?php } ?>
<main id="main-content">
    <section class="pb-5">
        <div class="container-xxl">
            <h2>Applying for Financial Aid</h2>
            <p class="lead mb-4">Complete the FAFSA or CA Dream Act to find out how much free money for college you qualify for.</p>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 lbcc-animate lbcc-stagger">
                <div class="col">
                    <?php
                    component_card_as_link(
                        '#',
                        'How to Apply for Financial Aid',
                        '',
                        'primary-border-thick',
                        '',
                        '',
                        'h4'
                    );
                    ?>
                </div>
                <div class="col">
                    <?php
                    component_card_as_link(
                        '#',
                        'Check your Financial Aid status',
                        '',
                        'primary-border-thick',
                        '',
                        '',
                        'h4'
                    );
                    ?>
                </div>
                <div class="col">
                    <?php
                    component_card_as_link(
                        '#',
                        'BankMobile Disbursements',
                        '(Receiving Your Aid)',
                        'primary-border-thick',
                        '',
                        '',
                        'h4'
                    );
                    ?>
                </div>
                <div class="col">
                    <?php
                    component_card(
                        'Have Questions?',
                        '',
                        [
                            ['link' => '#', 'text' => 'Get Help', 'style' => 'btn-primary']
                        ],
                        '',
                        'surface-sun-haze',
                        'button',
                        true
                    );
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-surface-subtle py-5">
        <div class="container-xxl">
            <div class="row lbcc-animate lbcc-stagger">
                <div class="col-12 col-md-12 col-xl-3">
                    <p class="eyebrow">Understanding Your Costs</p>
                    <p class="h3">Understanding the cost of college is the first step toward figuring out how to pay for it.</p>
                </div>
                <div class="col-12 col-md-4 col-xl-3">
                    <?php
                    component_card_as_link(
                        '#',
                        'Costs of LBCC',
                        'Learn about what you need to pay for as an LBCC student.',
                        'image-bg',
                        '_resources/images/financial-aid/dollars.jpg',
                        '',
                        ''
                    );
                    ?>
                </div>
                <div class="col-12 col-md-4 col-xl-3">
                    <?php
                    component_card_as_link(
                        '#',
                        'Net Price Calculator',
                        'Use the Net Price Calculator to estimate the cost of your education.',
                        'primary-border-thin',
                        '',
                        '',
                        ''
                    );
                    ?>
                </div>
                <div class="col-12 col-md-4 col-xl-3">
                    <?php
                    component_card_as_link(
                        '#',
                        'View the college’s resident & non-resident cost estimates',
                        '',
                        'image-bg',
                        '_resources/images/financial-aid/computer.jpg',
                        '',
                        'h5'
                    );
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container-xxl">
            <div class="row g-5">
                <div class="col-12 col-md-6 col-lg-7">
                    <div class="card border-0 bg-surface-sun-haze rounded-5">
                        <div class="card-body p-xl-5">
                            <h2 class="mb-4">
                                <span class="text-dark d-block">Need more financial aid help?</span>
                                We got you!
                            </h2>
                            <p class="lead mb-4">In addition to Financial Aid, LBCC offers plenty of resources to help you cover your costs and make college more affordable.</p>
                            <div class="row lbcc-animate lbcc-stagger">
                                <div class="col-12 col-md-6">
                                    <?php
                                    component_card_as_link(
                                        '#',
                                        'LBCC Promise',
                                        'Get the first two years free with the LBCC Promise.',
                                        'image-bg',
                                        '_resources/images/financial-aid/peace.jpg',
                                        '',
                                        'h5'
                                    );
                                    ?>
                                </div>
                                <div class="col-12 col-md-6">
                                    <?php
                                    component_list_group(
                                        [
                                            [
                                                'link' => '#',
                                                'title' => 'Apply for Scholarships',
                                                'description' => 'One Application for Several Opportunities'
                                            ],
                                            [
                                                'link' => '#',
                                                'title' => 'Additional Resources',
                                                'description' => 'Explore Additional Resources to help you with fees and other college costs.'
                                            ]
                                        ],
                                        'white',
                                        'sm'
                                    );
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <img src="../_resources/images/financial-aid/students.jpg" alt="" class="rounded-5 lbcc-animate lbcc-fade-up" />
                </div>
            </div>
        </div>
    </section>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
