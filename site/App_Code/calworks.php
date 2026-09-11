<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'CalWORKs',
    'description' => 'CalWORKs landing page template.',
    'section_nav' => true,
    'section_nav_include' => __DIR__ . '/navs/section-nav-calworks.php',
    'sidenav' => false,
    'sidenav_include' => '',
    'custom_hero' => true
]);
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="<?php echo lbcc_escape(lbcc_body_classes($page)); ?>">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>

<?php
component_hero(
    'split',
    'CALWORKs',
    '<p class="lead fw-medium mb-0 mt-3">Education and Job Support for Student Parents</p>',
    [
        [
            'type' => 'image',
            'src' => '_resources/images/calworks/calworks-hero.jpg',
            'alt' => ''
        ]
    ],
    [
        [
            'type' => 'image',
            'src' => '_resources/images/hero-backgrounds/hero-bg-6.jpg',
            'alt' => ''
        ]
    ],
    [],
    true
);
?>

<main id="main-content">
    <section class="pb-5">
        <div class="container-xxl">
            <div class="row gy-4">
                <div class="col-12 col-md-8 col-lg-9 pe-xl-5">
                    <p class="lead">CalWORKs (California Work Opportunity and Responsibility for Kids) is the state’s welfare-to-work program for families with children. The Long Beach City College CalWORKs Program works in collaboration with the Department of Public Social Services (DPSS) to assist students with education, training and job skills. </p>
                    <h2 class="mt-5">How CalWORKs Can Help You</h2>
                    <p>As a CalWORKs participant,  you will be able to access the following services:</p>
                    <div class="row row-cols-1 row-cols-md-2 gy-4 pt-2">
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'title' => 'Priority Registration',
                                        'left_icon' => 'fa-star'
                                    ],
                                    [
                                        'title' => 'Dedicated Academic, Career and Personal Counseling',
                                        'left_icon' => 'fa-comments'
                                    ],
                                    [
                                        'title' => 'School Supplies',
                                        'left_icon' => 'fa-books'
                                    ],
                                    [
                                        'title' => 'Student Advocacy',
                                        'left_icon' => 'fa-bullhorn'
                                    ],
                                    [
                                        'title' => 'Student Workshops and Seminars',
                                        'left_icon' => 'fa-screen-users'
                                    ]
                                ],
                                'surface',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'title' => 'Child Care',
                                        'left_icon' => 'fa-child'
                                    ],
                                    [
                                        'title' => 'Books and Material Request for Reimbursement as Approved by Your GAIN Worker ',
                                        'left_icon' => 'fa-dollar-sign'
                                    ],
                                    [
                                        'title' => 'Work Study',
                                        'left_icon' => 'fa-briefcase'
                                    ],
                                    [
                                        'title' => 'Referrals to On and Off-campus Resources ',
                                        'left_icon' => 'fa-hand-holding-heart'
                                    ]
                                ],
                                'surface',
                                'sm'
                            );
                            ?>
                        </div>
                    </div>
                    <hr />
                    <div class="mt-4">
                        <?php
                        component_buttons(
                            [
                                [
                                    'style' => 'btn-outline-primary',
                                    'text' => 'Learn More About Services',
                                    'url' => '#',
                                    'size' => '',
                                    'icon' => 'fa-arrow-up-right',
                                    'icon_position' => 'end'
                                ]
                            ],
                            'row',
                            3
                        );
                        ?>
                    </div>
                    <div class="card rounded-4 border-0 bg-surface-water mt-5">
                        <div class="card-body p-4">
                            <h2>Get Started</h2>
                            <p>Learn more about the eligibility requirements and steps to get started in LBCC’s CalWORKs program.</p>
                            <?php
                            component_buttons(
                                [
                                    [
                                        'style' => 'btn-primary',
                                        'text' => 'Eligibility and How to Apply',
                                        'url' => '#',
                                        'size' => ''
                                    ]
                                ],
                                'row',
                                3
                            );
                            ?>
                            <h3 class="h5 mt-5 mb-3">Looking for more information?</h3>
                            <?php component_block_arrow_link('#', '', '', 'Read Our Frequently Asked Questions'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <?php
                    component_contact_card(
                        'Contact Us',
                        '',
                        '(562) 938-3116',
                        'calworks@lbcc.edu',
                        'PCC, GG-217',
                        '',
                        '',
                        'vertical',
                        'default',
                        '#',
                        '',
                        'https://forms.office.com/pages/responsepage.aspx?id=reYxgPt7mkCSzRY2Die9ZbsaERu4t1hBgX-FK0Yl8AxUMzFaTUdOQjFJRUFFNUtHT08xQzhKNUJVSS4u&route=shorturl',
                        'Contact Form',
                        'btn-outline-secondary',
                        [
                            [
                                'link' => 'https://www.instagram.com/lbcc_calworks/',
                                'icon' => 'fa-instagram',
                                'sr_label' => 'Follow CALWORKs on Instagram'
                            ]
                        ],
                        'dark',
                        'm'
                    );
                    ?>
                    <div class="card bg-white border-primary border-1 rounded-4 mt-4">
                        <div class="card-body">
                            <h2 class="h5">Hours</h2>
                            <p>
                                Mon: 8:00 AM - 6:00 PM<br>
                                Tue: 8:00 AM - 6:00 PM<br>
                                Wed: 8:00 AM - 6:00 PM<br>
                                Thu: 8:00 AM - 6:00 PM<br>
                                Fri: 8:00 AM - 12:00 PM<br>
                                Sat: Closed<br>
                                Sun: Closed
                            </p>
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
