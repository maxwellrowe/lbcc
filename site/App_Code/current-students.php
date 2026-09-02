<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Current Students',
    'description' => 'Current students landing page template.',
    'section_nav' => false,
    'section_nav_include' => '',
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
            'text' => 'Viking Portal',
            'url' => '#',
            'size' => '',
            'icon' => ''
        ],
        [
            'style' => 'btn-primary',
            'text' => 'Canvas',
            'url' => '#',
            'size' => '',
            'icon' => ''
        ],
        [
            'style' => 'btn-primary',
            'text' => 'Library',
            'url' => '#',
            'size' => '',
            'icon' => ''
        ],
        [
            'style' => 'btn-primary',
            'text' => 'Class Schedule',
            'url' => '#',
            'size' => '',
            'icon' => ''
        ],
        
    ],
    'row',
    2
); ?>
<?php $buttonGroupMarkup = ob_get_clean(); ?>
<?php
$heroSupplementalContent = '
    <div">
        <p class="lead mt-3">Everything you need to stay on track at LBCC.</p>
        <p class="eyebrow mt-5">Quick Access</p>
        <div>' . $buttonGroupMarkup . '</div>
    </div>
';
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="<?php echo lbcc_escape(lbcc_body_classes($page)); ?>">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>

<?php
component_hero(
    'split',
    'Current Students',
    $heroSupplementalContent,
    [
        [
            'type' => 'image',
            'src' => '_resources/images/placeholders/students/current-students.jpg',
            'alt' => ''
        ]
    ],
    [
        [
            'type' => 'video',
            'src' => '_resources/video/hero-backgrounds/hero-bg-5.mp4',
            'poster' => '_resources/images/hero-backgrounds/hero-bg-2.jpg'
        ]
    ],
    [],
    true
);
?>

<main id="main-content">
    <section>
        <div class="container-xxl">
            <div class="row">
                <div class="col-12 col-md-8 pe-xl-5">
                    <div class="mb-4 lbcc-animate lbcc-fade">
                       <?php
                            component_title_with_ctas(
                                'Upcoming Events',
                                [
                                    [
                                        'text' => 'Academic Calendar',
                                        'url' => '#'
                                    ],
                                    [
                                        'text' => 'All Events',
                                        'url' => '#'
                                    ]
                                ],
                                '',
                                'h2'
                            );
                            ?> 
                        </div>
                        <?php
                        component_events(
                            [
                                [
                                    'title' => 'Using AI as Your Research Assistant',
                                    'url' => '#',
                                    'meta' => 'September 14, 2026 12:00pm - 1:00pm'
                                ],
                                [
                                    'title' => 'Dual Enrollment Registration Labs - Online & In-Person',
                                    'url' => '#',
                                    'meta' => 'September 16, 2026 12:00pm - 1:00pm',
                                    'category' => 'Early College Initiatives'
                                ],
                                [
                                    'title' => 'Orientation + Next Steps for LBCC',
                                    'url' => '#',
                                    'meta' => 'September 21, 2026 12:00pm - 1:00pm',
                                    'category' => 'Virtual Workshop'
                                ]
                            ],
                            'horizontal'
                        );
                        ?>
                </div>
                <div class="col-12 col-md-4">
                    <?php
                    component_card_as_link(
                        '#',
                        'Student in the Loop',
                        'Long Beach City College’s Student In the Loop is a weekly email to keep LBCC students aware of upcoming events, workshops, registration dates, and other helpful information.​',
                        'primary-border-thin',
                        '_resources/images/news/in-the-loop.jpg'
                    );
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-5">
        <div class="container-xxl">
            <div class="card rounded-5 bg-surface-raised border-0 shadow-none">
                <div class="card-body p-5">
                    <?php component_icon_heading('fa-clipboard-list-check', 'Plan & Register', 'fs-3xl', 'text-primary', 'h2'); ?>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mt-4 g-3 lbcc-animate lbcc-stagger">
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Registration Dates',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Academic Calendar',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Make a Counseling Appointment',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'College Catalog',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Degree Planner',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'General Education Requirements',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Transcript Requests',
                                        'description' => '',
                                        'label' => ''
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
    </section>
    <section class="pt-5">
        <div class="container-xxl">
            <div class="card rounded-5 bg-surface-raised border-0 shadow-none">
                <div class="card-body p-5">
                    <?php component_icon_heading('fa-money-bills', 'Pay for College', 'fs-3xl', 'text-primary', 'h2'); ?>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mt-4 g-3 lbcc-animate lbcc-stagger">
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Financial Aid',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Scholarships',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Pay Your Fees at the Cashier’s Office',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Disbursements',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Refunds',
                                        'description' => '',
                                        'label' => ''
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
    </section>
    <section class="pt-5">
        <div class="container-xxl">
            <div class="card rounded-5 bg-surface-raised border-0 shadow-none">
                <div class="card-body p-5">
                    <?php component_icon_heading('fa-circle-heart', 'Get Support', 'fs-3xl', 'text-primary', 'h2'); ?>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mt-4 g-3 lbcc-animate lbcc-stagger">
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Join the Line for Student Services',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Counseling',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Tutoring & Academic Support',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Basic Needs',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Wellness',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'View All Support Available',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'primary-outline',
                                'sm'
                            );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-5">
        <div class="container-xxl">
            <div class="card rounded-5 bg-surface-raised border-0 shadow-none">
                <div class="card-body p-5">
                    <?php component_icon_heading('fa-party-horn', 'Campus Life', 'fs-3xl', 'text-primary', 'h2'); ?>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mt-4 g-3 lbcc-animate lbcc-stagger">
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Parking',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Maps',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Food on Campus',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Clubs',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Athletics',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Events',
                                        'description' => '',
                                        'label' => ''
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
    </section>
    <section class="pt-5">
        <div class="container-xxl">
            <div class="card rounded-5 bg-surface-raised border-0 shadow-none">
                <div class="card-body p-5">
                    <?php component_icon_heading('fa-comments', 'Get in Touch', 'fs-3xl', 'text-primary', 'h2'); ?>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mt-4 g-3 lbcc-animate lbcc-stagger">
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'LBCC Chat Hub',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Directory',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Campus Safety',
                                        'description' => '',
                                        'label' => ''
                                    ]
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Student Tech Helpdesk',
                                        'description' => '',
                                        'label' => ''
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
    </section>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
