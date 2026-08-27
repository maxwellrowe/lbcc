<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Long Beach City College',
    'description' => 'LBCC meta description here.',
    'section_nav' => false,
    'section_nav_include' => '',
    'sidebar' => false,
    'sidebar_include' => '',
    'custom_hero' => true
]);

$homepageHeroContent = <<<HTML
<div>
    <p class="lead text-white fw-medium">A place to start strong—and go further than you thought possible.</p>
    <p class="lead text-white fw-medium">Rooted in Long Beach. Build for what’s next.</p>
    <a href="#" class="btn btn-primary btn-icon btn-icon-end">
        <span class="btn-icon-label">Get Started</span>
        <span class="btn-icon-addon">
            <span class="btn-icon-badge fa-sharp fa-regular fa-arrow-up-right" aria-hidden="true"></span>
        </span>
    </a>
</div>
HTML;
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="lbcc-page">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>

<?php
component_hero(
    'full',
    'We Are Long Beach City College',
    $homepageHeroContent,
    [
        [
            'type' => 'video',
            'src' => '_resources/video/homepage/homepage-placeholder.mp4'
        ]
    ],
    [
        [
            'type' => 'video',
            'src' => '_resources/video/homepage/skating-long.mp4'
        ]
    ],
    [
        [
            'type' => 'video',
            'src' => '_resources/video/hero-backgrounds/hero-bg-2.mp4'
        ]
    ],
    false
);
?>

<main id="main-content">
    <section class="bg-surface-subtle">
        <div class="container-xxl">
            <?php
            component_ticker(
                [
                    [
                        'text' => 'Apply For Fall Classes',
                        'url' => '#'
                    ],
                    [
                        'text' => 'Explore Student Support Services',
                        'url' => '#'
                    ],
                    [
                        'text' => 'View Upcoming Campus Events',
                        'url' => '#'
                    ],
                    [
                        'text' => 'See Financial Aid Deadlines',
                        'url' => '#'
                    ],
                    [
                        'text' => 'Read The Latest News',
                        'url' => '#'
                    ],
                    [
                        'text' => 'Review Registration Dates And Deadlines',
                        'url' => '#'
                    ],
                    [
                        'text' => 'Discover Transfer Center Workshops',
                        'url' => '#'
                    ],
                    [
                        'text' => 'Visit The Academic Calendar',
                        'url' => '#'
                    ],
                    [
                        'text' => 'Explore Career Pathways And Programs',
                        'url' => '#'
                    ],
                    [
                        'text' => 'Find Tutoring And Learning Support',
                        'url' => '#'
                    ]
                ],
                'Latest',
                true
            );
            ?>
            <?php component_spacer(4); ?>
            <div class="row justify-content-xl-between align-items-xl-center">
                <div class="col-12 col-md-8 col-xl-6">
                    <img src="../_resources/images/homepage/you-belong-here.svg" alt="You BELong Here" class="img-fluid mb-3" />
                    <p class="lead">You don't have to have it all figured out. Just take your first step.</p>
                    <p class="lead">No matter where you're coming from — or where you're headed — <span class="text-primary fw-bold">we're holding your place</span>.</p>

                    <div class="row mt-4">
                        <div class="col-12 col-md-6">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'New to College',
                                        'image' => '_resources/images/homepage/icons/new-to-college.svg'
                                    ],
                                    [
                                        'link' => '#',
                                        'title' => 'Returning Student',
                                        'image' => '_resources/images/homepage/icons/returning-student.svg'
                                    ],
                                    [
                                        'link' => '#',
                                        'title' => 'Dual Enrollment',
                                        'image' => '_resources/images/homepage/icons/dual-enrollment.svg'
                                    ],
                                    [
                                        'link' => '#',
                                        'title' => 'Adult Learner',
                                        'image' => '_resources/images/homepage/icons/adult-learner.svg'
                                    ],
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                        <div class="col-12 col-md-6">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'Career Technical Education',
                                        'image' => '_resources/images/homepage/icons/career-tech-edu.svg'
                                    ],
                                    [
                                        'link' => '#',
                                        'title' => 'Transfer',
                                        'image' => '_resources/images/homepage/icons/transfer.svg'
                                    ],
                                    [
                                        'link' => '#',
                                        'title' => 'Online Education',
                                        'image' => '_resources/images/homepage/icons/online-education.svg'
                                    ],
                                    [
                                        'link' => '#',
                                        'title' => 'International Student',
                                        'image' => '_resources/images/homepage/icons/international.svg'
                                    ],
                                ],
                                'white',
                                'sm'
                            );
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-xl-5">
                    <div class="mb-5">
                        <?php
                        component_fade_slider(
                            [
                                [
                                    'image' => '_resources/images/placeholders/students/student-3-square.jpg',
                                    'alt' => 'Student smiling outdoors'
                                ],
                                [
                                    'image' => '_resources/images/placeholders/students/student-5-square.jpg',
                                    'alt' => 'Student portrait on campus'
                                ],
                                [
                                    'image' => '_resources/images/placeholders/students/students-6-square.jpg',
                                    'alt' => 'Students in conversation'
                                ],
                                [
                                    'image' => '_resources/images/placeholders/students/student-11-square.jpg',
                                    'alt' => 'Student sitting outdoors'
                                ]
                            ],
                            true
                        );
                        ?>
                    </div>
                    <div class="text-center px-5">
                        <?php component_footer_i_heart_lb([], 'dark', true); ?>
                    </div>
                </div>
            </div>
            <?php component_spacer(4); ?>
        </div>
    </div>
</main>

<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
