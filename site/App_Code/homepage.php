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
    <p class="lead fw-medium">A place to start strong—and go further than you thought possible.</p>
    <p class="lead fw-medium">Rooted in Long Beach. Build for what’s next.</p>
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
            <div class="row justify-content-xl-between align-items-xl-center gy-5">
                <div class="col-12 col-md-8 col-xl-6">
                    <img src="../_resources/images/homepage/you-belong-here.svg" alt="You BELong Here" class="img-fluid mb-3" />
                    <p class="lead">You don't have to have it all figured out. Just take your first step.</p>
                    <p class="lead">No matter where you're coming from — or where you're headed — <span class="text-primary fw-bold">we're holding your place</span>.</p>

                    <div class="row mt-4 gy-3">
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
                    <div class="text-center ps-5">
                        <?php component_footer_i_heart_lb([], 'dark', true); ?>
                    </div>
                </div>
            </div>
            <?php component_spacer(4); ?>
        </div>
    </section>

    <section class="py-5">
        <div class="container-xxl">
            <div class="row align-items-md-center mb-4 mb-md-0 gy-5">
                <div class="col-12 col-md-6 col-xl-6 pe-xl-5">
                    <h2 class="lbcc-animate lbcc-fade lbcc-duration-500"2>Explore Our Programs</h2>
                    <p class="lead">With more than 70 academic and career programs, LBCC helps students move forward with purpose.</p>
                    <p class="lead">Whether you’re transferring, building a career, or earning a bachelor’s degree, this is where momentum begins.</p>
                    <p class="lead"><span class="text-primary fw-bold">See how far you can go.</span></p>
                    <div class="mb-3 mt-4">
                        <?php component_search_programs($searchProgramsEntries); ?>
                    </div>
                    <a href="../App_Code/programs.php" class="btn btn-primary btn-sm">View All Programs</a>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row row-cols-1 row-cols-sm-2 gx-4 gy-4 lbcc-animate lbcc-stagger lbcc-duration-500">
                        <div class="col">
                            <?php
                            component_card_as_link(
                                '#',
                                'Transfer Degrees (ADT)',
                                '',
                                'image-bg',
                                '_resources/images/homepage/transfer.jpg',
                                ''
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_card_as_link(
                                '#',
                                'Career & Technical Education (CTE)',
                                '',
                                'image-bg',
                                '_resources/images/homepage/cte.jpg',
                                ''
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_card_as_link(
                                '#',
                                'Bachelor’s Degrees',
                                '',
                                'image-bg',
                                '_resources/images/homepage/bachelors.jpg',
                                ''
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_card_as_link(
                                '#',
                                'Certificates',
                                '',
                                'image-bg',
                                '_resources/images/homepage/certificates.jpg',
                                ''
                            );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-teal-800">
        <div class="container-xxl">
            <div class="row gy-4 gy-md-0 align-items-center">
                <div class="col-12 col-md-6 col-xl-5 order-2 order-md-2">
                    <?php
                    component_vertical_slider(
                        [
                            [
                                'image' => '_resources/images/homepage/vert-slider-1.jpg',
                                'alt' => 'Students standing outdoors'
                            ],
                            [
                                'image' => '_resources/images/homepage/vert-slider-2.jpg',
                                'alt' => 'Student seated on campus'
                            ],
                            [
                                'image' => '_resources/images/homepage/vert-slider-3.jpg',
                                'alt' => 'Students in a classroom'
                            ]
                        ],
                        true,
                        true
                    );
                    ?>
                </div>
                <div class="col-12 col-md-6 col-xl-7 order-2 order-md-1 pe-xl-5">
                    <div class="card rounded-4 p-5 bg-white">
                        <div class="mb-2">
                            <img src="../_resources/images/homepage/we-get-you-got-you-mobile.svg" alt="We Get You. We've Got You" class="img-fluid d-block d-xl-none" />
                            <img src="../_resources/images/homepage/we-get-you-got-you.svg" alt="We Get You. We've Got You" class="img-fluid d-none d-xl-block" />
                        </div>

                        <p class="lead">Here, support is personal. Opportunity is shared. And students are supported as whole people, not just applicants or ID numbers.</p>
                        <p class="lead fw-medium">Support isn’t extra—<span class="text-primary">it’s expected.</span>

                        <div class="row row-cols-1 row-cols-md-2 g-4 mt-2">
                            <div class="col">
                                <?php
                                component_list_group(
                                    [
                                        [
                                            'link' => '#',
                                            'title' => 'Counseling',
                                            'left_icon' => 'fa-messages'
                                        ],
                                        [
                                            'link' => '#',
                                            'title' => 'Financial Aid & Scholarships',
                                            'left_icon' => 'fa-dollar-sign'
                                        ],
                                        [
                                            'link' => '#',
                                            'title' => 'Wellness',
                                            'left_icon' => 'fa-leaf'
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
                                            'link' => '#',
                                            'title' => 'Basic Needs',
                                            'left_icon' => 'fa-heart'
                                        ],
                                        [
                                            'link' => '#',
                                            'title' => 'Tutoring & Academic Support',
                                            'left_icon' => 'fa-apple-whole'
                                        ]
                                    ],
                                    'surface',
                                    'sm'
                                );
                                ?>
                                <div class="mt-3">
                                    <?php
                                    component_list_group(
                                        [
                                            [
                                                'link' => '#',
                                                'title' => 'View All Support',
                                            ]
                                        ],
                                        'surface-haze',
                                        'sm'
                                    );
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-n5 bg-teal-200 py-5 rounded-top-5 position-relative z-3">
        <div class="container-xxl">
            <div class="row row-cols-1 row-cols-md-2 align-items-center">
                <div class="col">
                    <h2 class="lbcc-animate lbcc-fade">Be Who You Are</h2>
                    <p class="lead lbcc-animate lbcc-fade">LBCC is filled with opportunities to show up as yourself, build meaningful connections, and find your people.</p>
                    <p class="lead fw-bold lbcc-animate lbcc-fade">Your community is waiting for you.</p>
                    <div
                        class="component-carousel-anything my-5"
                        data-lbcc-carousel-anything
                        data-mobile-items="1"
                        data-tablet-items="2"
                        data-desktop-items="3"
                        data-autoplay="true"
                    >
                        <div class="swiper" data-lbcc-carousel-swiper>
                            <div class="swiper-wrapper align-items-stretch">
                                <div class="swiper-slide h-auto">
                                    <div class="swiper-slide-content h-100">
                                        <?php
                                        component_card_as_link(
                                            '#',
                                            'eSports',
                                            '',
                                            'teal-border-thin',
                                            '_resources/images/homepage/club-esports.jpg',
                                            '',
                                            'h6'
                                        );
                                        ?>
                                    </div>
                                </div>
                                <div class="swiper-slide h-auto">
                                    <div class="swiper-slide-content h-100">
                                        <?php
                                        component_card_as_link(
                                            '#',
                                            'LBCC Bistro',
                                            '',
                                            'teal-border-thin',
                                            '_resources/images/homepage/bistro.jpg',
                                            '',
                                            'h6'
                                        );
                                        ?>
                                    </div>
                                </div>
                                <div class="swiper-slide h-auto">
                                    <div class="swiper-slide-content h-100">
                                        <?php
                                        component_card_as_link(
                                            '#',
                                            'Art Galleries',
                                            '',
                                            'teal-border-thin',
                                            '_resources/images/homepage/art.jpg',
                                            '',
                                            'h6'
                                        );
                                        ?>
                                    </div>
                                </div>
                                <div class="swiper-slide h-auto">
                                    <div class="swiper-slide-content h-100">
                                        <?php
                                        component_card_as_link(
                                            '#',
                                            'LGBTQIA+ Resources',
                                            '',
                                            'teal-border-thin',
                                            '_resources/images/homepage/lgbtq.jpg',
                                            '',
                                            'h6'
                                        );
                                        ?>
                                    </div>
                                </div>
                                 <div class="swiper-slide h-auto">
                                    <div class="swiper-slide-content h-100">
                                        <?php
                                        component_card_as_link(
                                            '#',
                                            'LBCC Bakery',
                                            '',
                                            'teal-border-thin',
                                            '_resources/images/homepage/bakery.jpg',
                                            '',
                                            'h6'
                                        );
                                        ?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="component-carousel-anything__controls d-flex align-items-center flex-nowrap gap-2 mt-4">
                            <div class="swiper-scrollbar component-carousel-anything__scrollbar flex-grow-1" data-lbcc-carousel-scrollbar></div>

                            <div class="component-carousel-anything__buttons d-flex align-items-center gap-2 flex-shrink-0">
                                <button class="btn btn-primary btn-circle btn-sm" type="button" data-lbcc-carousel-prev aria-label="Previous slide">
                                    <span class="fa-sharp fa-regular fa-arrow-left" aria-hidden="true"></span>
                                </button>

                                <button class="btn btn-primary btn-circle btn-sm" type="button" data-lbcc-carousel-next aria-label="Next slide">
                                    <span class="fa-sharp fa-regular fa-arrow-right" aria-hidden="true"></span>
                                </button>

                                <button class="btn btn-primary btn-circle btn-sm" type="button" data-lbcc-carousel-toggle aria-label="Pause carousel autoplay" aria-pressed="false">
                                    <span class="fa-sharp fa-solid fa-pause" aria-hidden="true" data-lbcc-carousel-icon="pause"></span>
                                    <span class="fa-sharp fa-solid fa-play d-none" aria-hidden="true" data-lbcc-carousel-icon="play"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary">View Campus Life at LBCC</a>
                </div>
                <div class="col ps-lg-5">
                    <div class="row row-cols-1 row-cols-md-2 g-4 align-items-center">
                        <div class="col lbcc-animate lbcc-stagger ">
                            <div class="mb-4">
                                <?php
                                component_card_as_link(
                                    '#',
                                    'Athletics',
                                    '',
                                    'image-bg',
                                    '_resources/images/homepage/athletics.jpg',
                                    '',
                                    'h5'
                                );
                                ?>
                            </div>
                            <div class="mb-4 ms-md-5">
                                <?php
                                component_card_as_link(
                                    '#',
                                    'Student Clubs',
                                    '',
                                    'image-bg',
                                    '_resources/images/homepage/student-clubs.jpg',
                                    '',
                                    'h5'
                                );
                                ?>
                            </div>  
                        </div>
                        <div class="col lbcc-animate lbcc-stagger">
                            <div class="mb-4 me-md-5">
                                <?php
                                component_card_as_link(
                                    '#',
                                    'Associated Students',
                                    '',
                                    'image-bg',
                                    '_resources/images/homepage/associated-students.jpg',
                                    '',
                                    'h5'
                                );
                                ?>
                            </div>
                            <div class="mb-4">
                                <?php
                                component_card_as_link(
                                    '#',
                                    'Cultural & Diversity Communities',
                                    '',
                                    'image-bg',
                                    '_resources/images/homepage/cultural-diversity.jpg',
                                    '',
                                    'h5'
                                );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="snippet-section-background-video bg-surface-subtle py-5">
        <div class="snippet-section-background-video__media" aria-hidden="true">
            <video autoplay muted loop playsinline poster="<?php echo lbcc_escape(lbcc_url('_resources/images/hero-backgrounds/hero-bg-3.jpg')); ?>">
                <source src="<?php echo lbcc_escape(lbcc_url('_resources/video/hero-backgrounds/hero-bg-4.mp4')); ?>" type="video/mp4">
            </video>
        </div>
        <div class="snippet-section-background-video__overlay" aria-hidden="true"></div>

        <div class="container-xxl snippet-section-background-video__content pe-lg-5">
            <div class="row">
                <div class="col-12 col-md-6 col-xl-5">
                    <h2>Why Study at LBCC</h2>
                </div>
                <div class="col-12 col-md-6 col-xl-7">
                    <p class="lead">Our students transfer to universities, launch careers, and strengthen their communities—often while balancing work, family, and life. As one of California’s largest community colleges, we serve the most diverse communities in California—and we show up for it every day.</p>
                    <p class="lead fw-bold">There’s no single path forward. <span class="text-primary">That’s the power of LBCC.</span></p>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 align-items-center">
                <div class="col">
                    <div class="row align-items-end mb-4 g-4 lbcc-animate lbcc-stagger">
                        <div class="col-4">
                            <img src="../_resources/images/homepage/peace.jpg" class="rounded-5 img-fluid" alt="LBCC Student" />
                        </div>
                        <div class="col-8">
                            <?php
                            component_quiet_video(
                                '_resources/video/homepage/lbcc_athletics.mp4',
                                '_resources/images/hero-backgrounds/hero-bg-11.jpg',
                                true,
                                true
                            );
                            ?>
                        </div>
                    </div>
                    <div class="px-5 lbcc-animate lbcc-stagger">
                        <img src="../_resources/images/homepage/why-study-dr-munoz-students.jpg" class="rounded-5 img-fluid" alt="LBCC Student" />
                    </div>
                </div>
                <div class="col">
                    <?php
                    component_testimonial_carousel(
                        [
                            [
                                'quote' => 'You witness different cultures, but it still has that sense of a community. LBCC has been somewhere I was able to pursue my goals and test my abilities.',
                                'name' => 'Sarah Hawbaker',
                                'program' => 'Film',
                                'location' => 'Paris, France',
                                'image' => '_resources/images/homepage/testimonials/sarah-hawbaker.jpg'
                            ],
                            [
                                'quote' => 'I still needed to figure out where I wanted to go as far as my degree and my future. So this (LBCC) was a perfect fit....was kind of the foundation for me.',
                                'name' => 'Kristopher Johnson',
                                'program' => '',
                                'location' => 'Long Beach, California',
                                'image' => '_resources/images/homepage/testimonials/kristopher-johnson.jpg'
                            ],
                            [
                                'quote' => 'I’d been wanting to complete my degree for 45 years...From my professors to my advisor to my fellow students, I have felt welcomed, challenged, and supported.',
                                'name' => 'Antonio Ruiz',
                                'program' => 'Journalism',
                                'location' => 'Bronx, New York',
                                'image' => '_resources/images/homepage/testimonials/antonio-ruiz.jpg'
                            ],
                            [
                                'quote' => 'LBCC is the first stepping stone on the path to go after my long-term goals.',
                                'name' => 'Takato Watabe',
                                'program' => 'Business Administration',
                                'location' => 'Yokohama, Japan',
                                'image' => '_resources/images/homepage/testimonials/takato-watabe.jpg'
                            ],
                            [
                                'quote' => 'LBCC has shown me that it’s worth it to go to college. College degree opens up so many opportunities… LBCC has built a firm foundation in my life.',
                                'name' => 'Hong Sodalis',
                                'program' => 'Registered Nursing',
                                'location' => 'Phnom Penh, Cambodia',
                                'image' => '_resources/images/homepage/testimonials/hong-sodalis.jpg'
                            ]
                        ],
                        true
                    );
                    ?>
                </div>
            </div>
            <div
                class="component-carousel-anything my-5 py-5"
                data-lbcc-carousel-anything
                data-mobile-items="1"
                data-tablet-items="3"
                data-desktop-items="4"
                data-autoplay="true"
            >
                <div class="swiper" data-lbcc-carousel-swiper>
                    <div class="swiper-wrapper align-items-stretch">
                        <div class="swiper-slide h-auto">
                            <div class="swiper-slide-content h-100">
                                <div class="card rounded-4 h-100 border-0 bg-white p-4 text-center justify-content-center">
                                    <h3 class="h1 mb-2">38,695</h3>
                                    <span class="h5 text-dark">Students</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide h-auto">
                            <div class="swiper-slide-content h-100">
                                <?php
                                component_card(
                                    '1st Community College in the nation to offer Bachelor’s in Library & Information Science',
                                    '',
                                    [],
                                    '_resources/images/placeholders/students/students-3-square.jpg',
                                    'image-bg',
                                    'arrow-link',
                                    false,
                                    '',
                                    'h5'
                                );
                                ?>
                            </div>
                        </div>
                        <div class="swiper-slide h-auto">
                            <div class="swiper-slide-content h-100">
                                <div class="card rounded-4 h-100 border-0 bg-white p-4 text-center justify-content-center">
                                    <h3>Designated Black Serving Institution</h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide h-auto">
                            <div class="swiper-slide-content h-100">
                                <div class="card rounded-4 h-100 border-0 bg-white p-4 text-center justify-content-center">
                                    <img src="../_resources/images/homepage/icons/award.svg" alt="Award Icon" class="w-25 mx-auto mb-4" />
                                    <h3 class="h4 text-dark">AACC 2025 Award of Excellence</h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide h-auto">
                            <div class="swiper-slide-content h-100">
                                <?php
                                component_card(
                                    '2,400 Dual Enrollment Students',
                                    '',
                                    [],
                                    '_resources/images/placeholders/students/students-4.jpg',
                                    'image-bg',
                                    'arrow-link',
                                    false,
                                    '',
                                    'h5'
                                );
                                ?>
                            </div>
                        </div>
                        <div class="swiper-slide h-auto">
                            <div class="swiper-slide-content h-100">
                                <div class="card rounded-4 h-100 border-0 bg-white p-4 text-center justify-content-center">
                                    <span class="h1 text-secondary"><span class="fa-regular fa-user-graduate"></span></span>
                                    <h3 class="my-2">1,000+</h3>
                                    <span class="h5 text-dark">Scholarships in the Past Year</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="component-carousel-anything__controls d-flex align-items-center flex-nowrap gap-2 mt-4">
                    <div class="swiper-scrollbar component-carousel-anything__scrollbar flex-grow-1" data-lbcc-carousel-scrollbar></div>

                    <div class="component-carousel-anything__buttons d-flex align-items-center gap-2 flex-shrink-0">
                        <button class="btn btn-primary btn-circle btn-sm" type="button" data-lbcc-carousel-prev aria-label="Previous slide">
                            <span class="fa-sharp fa-regular fa-arrow-left" aria-hidden="true"></span>
                        </button>

                        <button class="btn btn-primary btn-circle btn-sm" type="button" data-lbcc-carousel-next aria-label="Next slide">
                            <span class="fa-sharp fa-regular fa-arrow-right" aria-hidden="true"></span>
                        </button>

                        <button class="btn btn-primary btn-circle btn-sm" type="button" data-lbcc-carousel-toggle aria-label="Pause carousel autoplay" aria-pressed="false">
                            <span class="fa-sharp fa-solid fa-pause" aria-hidden="true" data-lbcc-carousel-icon="pause"></span>
                            <span class="fa-sharp fa-solid fa-play d-none" aria-hidden="true" data-lbcc-carousel-icon="play"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container-xxl">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col">
                    <div class="mb-4 lbcc-animate lbcc-fade">
                        <?php 
                        component_title_with_ctas(
                            'News',
                            [
                                [
                                    'text' => 'All News',
                                    'url' => '#'
                                ]
                            ],
                            '',
                            'border-gray-300'
                        );
                        ?>
                    </div>
                    <div
                        class="component-news-slider component-carousel-anything mb-5"
                        data-lbcc-carousel-anything
                        data-mobile-items="1"
                        data-tablet-items="2"
                        data-desktop-items="2"
                        data-autoplay="true"
                    >
                        <div class="swiper" data-lbcc-carousel-swiper>
                            <div class="swiper-wrapper align-items-stretch">
                                <div class="swiper-slide h-auto">
                                    <div class="swiper-slide-content h-100">
                                        <a href="#" class="card component-card-as-link h-100 overflow-hidden position-relative rounded-4 border-0 text-decoration-none bg-surface-raised">
                                            <img class="card-img-top component-card-as-link__image-top" src="../_resources/images/placeholders/news/slider/news-1.jpg" alt="">

                                        <div class="card-body component-card-as-link__body p-3">
                                            <span class="badge rounded-pill d-inline-flex align-items-center gap-2 bg-white text-dark text-uppercase">
                                                <span>Press Release</span>
                                            </span>
                                            <h2 class="h5 mt-3">Long Beach City College To Break Ground On New Student Housing At Liberal Arts Campus</h2>
                                        </div>

                                        <div class="card-footer component-card-as-link__footer bg-transparent border-0 pt-0 px-3 pb-3">
                                            <span class="font-label fs-8">August 12, 2026</span>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide h-auto">
                                    <div class="swiper-slide-content h-100">
                                        <a href="#" class="card component-card-as-link h-100 overflow-hidden position-relative rounded-4 border-0 text-decoration-none bg-surface-raised">
                                            <img class="card-img-top component-card-as-link__image-top" src="../_resources/images/placeholders/news/slider/news-2.jpg" alt="">

                                        <div class="card-body component-card-as-link__body p-3">
                                            <span class="badge rounded-pill d-inline-flex align-items-center gap-2 bg-white text-dark text-uppercase">
                                                <span>Press Release</span>
                                            </span>
                                            <h2 class="h5 mt-3">LBCC Invites Community to Celebrate the Legacy of Veterans Memorial Stadium</h2>
                                        </div>

                                        <div class="card-footer component-card-as-link__footer bg-transparent border-0 pt-0 px-3 pb-3">
                                            <span class="font-label fs-8">August 29, 2026</span>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide h-auto">
                                    <div class="swiper-slide-content h-100">
                                        <a href="#" class="card component-card-as-link h-100 overflow-hidden position-relative rounded-4 border-0 text-decoration-none bg-surface-raised">
                                            <img class="card-img-top component-card-as-link__image-top" src="../_resources/images/placeholders/news/slider/news-3.jpg" alt="">

                                        <div class="card-body component-card-as-link__body p-3">
                                            <span class="badge rounded-pill d-inline-flex align-items-center gap-2 bg-white text-dark text-uppercase">
                                                <span>Press Release</span>
                                            </span>
                                            <h2 class="h5 mt-3">Long Beach City College Announces Strategic Reinvestment Plan For Baseball Program And Future Athletics Complex</h2>
                                        </div>

                                        <div class="card-footer component-card-as-link__footer bg-transparent border-0 pt-0 px-3 pb-3">
                                            <span class="font-label fs-8">July 1, 2026</span>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide h-auto">
                                    <div class="swiper-slide-content h-100">
                                        <a href="#" class="card component-card-as-link h-100 overflow-hidden position-relative rounded-4 border-0 text-decoration-none bg-surface-raised">
                                            <img class="card-img-top component-card-as-link__image-top" src="../_resources/images/placeholders/news/slider/news-4.jpg" alt="">

                                        <div class="card-body component-card-as-link__body p-3">
                                            <span class="badge rounded-pill d-inline-flex align-items-center gap-2 bg-white text-dark text-uppercase">
                                                <span>Press Release</span>
                                            </span>
                                            <h2 class="h5 mt-3">Tiffany Min of Long Beach City College Named a World Impact Scholar</h2>
                                        </div>

                                        <div class="card-footer component-card-as-link__footer bg-transparent border-0 pt-0 px-3 pb-3">
                                            <span class="font-label fs-8">April 30, 2026</span>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide h-auto">
                                    <div class="swiper-slide-content h-100">
                                        <a href="#" class="card component-card-as-link h-100 overflow-hidden position-relative rounded-4 border-0 text-decoration-none bg-surface-raised">
                                            <img class="card-img-top component-card-as-link__image-top" src="../_resources/images/placeholders/news/slider/news-5.jpg" alt="">

                                        <div class="card-body component-card-as-link__body p-3">
                                            <span class="badge rounded-pill d-inline-flex align-items-center gap-2 bg-white text-dark text-uppercase">
                                                <span>Press Release</span>
                                            </span>
                                            <h2 class="h5 mt-3">ASU Local – Long Beach Celebrates First Graduating Cohort at End-of-Year Event</h2>
                                        </div>

                                        <div class="card-footer component-card-as-link__footer bg-transparent border-0 pt-0 px-3 pb-3">
                                            <span class="font-label fs-8">April 27, 2026</span>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="component-carousel-anything__controls d-flex align-items-center flex-nowrap gap-2 mt-4">
                            <div class="swiper-scrollbar component-carousel-anything__scrollbar flex-grow-1" data-lbcc-carousel-scrollbar></div>

                            <div class="component-carousel-anything__buttons d-flex align-items-center gap-2 flex-shrink-0">
                                <button class="btn btn-primary btn-circle btn-sm" type="button" data-lbcc-carousel-prev aria-label="Previous slide">
                                    <span class="fa-sharp fa-regular fa-arrow-left" aria-hidden="true"></span>
                                </button>
                                <button class="btn btn-primary btn-circle btn-sm" type="button" data-lbcc-carousel-next aria-label="Next slide">
                                    <span class="fa-sharp fa-regular fa-arrow-right" aria-hidden="true"></span>
                                </button>
                                <button class="btn btn-primary btn-circle btn-sm" type="button" data-lbcc-carousel-toggle aria-label="Pause carousel autoplay" aria-pressed="false">
                                    <span class="fa-sharp fa-solid fa-pause" aria-hidden="true" data-lbcc-carousel-icon="pause"></span>
                                    <span class="fa-sharp fa-solid fa-play d-none" aria-hidden="true" data-lbcc-carousel-icon="play"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col ps-lg-5">
                    <div class="mb-4 lbcc-animate lbcc-fade">
                       <?php
                        component_title_with_ctas(
                            'Events',
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
                            ''
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
                            ],
                            [
                                'title' => 'Flex Day - No Classes',
                                'url' => '#',
                                'meta' => 'October 2, 2026',
                                'category' => 'Academic Calendar'
                            ]
                        ],
                        'default'
                    );
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface-raised py-5 rounded-top-5 position-relative z-3">
        <div class="container-xxl">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col">
                    <div class="card match-height-row rounded-5 border-0 bg-teal-800 text-light">
                        <div class="card-body p-5">
                            <div class="d-flex flex-column align-items-start justify-content-between h-100">
                                <div class="mb-5 lbcc-animate lbcc-stagger">
                                    <h2 class="h1 text-white mb-3">Get Started at LBCC</h2>
                                    <?php
                                    component_buttons(
                                        [
                                            [
                                                'style' => 'btn-primary',
                                                'text' => 'Enroll Today',
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
                                <div>
                                    <?php
                                    component_buttons(
                                        [
                                            [
                                                'style' => 'btn-outline-light',
                                                'text' => 'Schedule a Visit',
                                                'url' => '#',
                                                'size' => 'btn-sm',
                                                'icon' => '',
                                                'icon_position' => 'end'
                                            ],
                                            [
                                                'style' => 'btn-outline-light',
                                                'text' => 'Class Schedule',
                                                'url' => '#',
                                                'size' => 'btn-sm',
                                                'icon' => '',
                                                'icon_position' => 'end'
                                            ]
                                        ],
                                        'row',
                                        3
                                    );
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card match-height-row rounded-5 border-0 bg-surface text-light shadow-none">
                        <div class="card-body p-5">
                            <div class="d-flex flex-column align-items-start justify-content-between h-100">
                                <div class="lbcc-animate lbcc-stagger lbcc-delay-300">
                                    <h2>Stay Connected</h2>

                                    <p class="fw-bold mb-0 mt-4">Join Our Mailing List</p>
                                    <form class="d-grid gap-3 w-100 mb-5" action="#" method="post">
                                        <div class="row g-3">
                                            <div class="col-12 col-sm-6">
                                                <label class="visually-hidden" for="mailing-list-name">Your Full Name</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white border-end-0 text-primary" aria-hidden="true">
                                                        <span class="fa-sharp fa-regular fa-user"></span>
                                                    </span>
                                                    <input id="mailing-list-name" class="form-control border-start-0" type="text" name="full_name" placeholder="Your Full Name" autocomplete="name" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <label class="visually-hidden" for="mailing-list-email">Your Email Address</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-white border-end-0 text-primary" aria-hidden="true">
                                                        <span class="fa-sharp fa-regular fa-envelope"></span>
                                                    </span>
                                                    <input id="mailing-list-email" class="form-control border-start-0" type="email" name="email" placeholder="Your Email Address" autocomplete="email" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary" type="submit">Join Mailing List</button>
                                        </div>
                                    </form>
                                </div>
                                <div>
                                    <?php component_social_media(
                                        [
                                            ['link' => 'https://www.instagram.com/lbcitycollege', 'icon' => 'fa-instagram', 'sr_label' => 'LBCC on Instagram'],
                                            ['link' => 'https://www.facebook.com/lbcitycollege', 'icon' => 'fa-facebook', 'sr_label' => 'LBCC on Facebook'],
                                            ['link' => 'https://x.com/LBCityCollege', 'icon' => 'fa-x-twitter', 'sr_label' => 'LBCC on X'],
                                            ['link' => 'https://www.youtube.com/user/LongBeachCityCollege', 'icon' => 'fa-youtube', 'sr_label' => 'LBCC on YouTube'],
                                            ['link' => 'https://www.tiktok.com/@longbeachcitycollege', 'icon' => 'fa-tiktok', 'sr_label' => 'LBCC on TikTok'],
                                            ['link' => 'https://www.linkedin.com', 'icon' => 'fa-linkedin', 'sr_label' => 'LBCC on LinkedIn']
                                        ],
                                        'dark',
                                        'l'
                                    ); ?>
                                </div>
                            </div>
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
