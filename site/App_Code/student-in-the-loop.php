<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Student  in the Loop',
    'description' => '',
    'section_nav' => false,
    'section_nav_include' => '',
    'sidenav' => false,
    'sidenav_include' => '',
    'custom_hero' => true
]);
?>

<?php
ob_start();
component_badge('Week of August 31', 'light');
$admissionsBadge = ob_get_clean();

$heroSupplementalContent = '
    <div>
        <p class="lead mt-3">Long Beach City College’s Student In the Loop is a weekly email to keep LBCC students aware of upcoming events, workshops, registration dates, and other helpful information.​</p>
        ' . $admissionsBadge . '
    </div>
';

$studentLoopNewsItems = [
    ['title' => 'Fall 2026 Extended Student Service Hours', 'date' => 'August 31, 2026'],
    ['title' => 'Fall 2026 Parking Information', 'date' => 'September 2, 2026'],
    ['title' => 'ACCESS Shuttle Service – New Designated Drop-Off Locations', 'date' => 'August 27, 2026'],
    ['title' => 'Mobile Food Pantry at TTC', 'date' => 'September 22, 2026'],
    ['title' => 'Viking Vault Community Guidelines for LBCC Students', 'date' => 'August 24, 2026'],
    ['title' => 'Jacqueline S. S. Ward Math and Science Endowed Scholarship', 'date' => 'September 8, 2026'],
    ['title' => 'Looking for Dining Options at LBCC? New Website to Help You Out!', 'date' => 'August 19, 2026'],
    ['title' => 'LBCC Student Named World Impact Scholar', 'date' => 'September 15, 2026'],
    ['title' => 'Long Beach City College Exclusive LAFC Ticket Offer', 'date' => 'August 12, 2026'],
    ['title' => 'Important LBCC Spring 2026 Parking Information', 'date' => 'September 10, 2026'],
    ['title' => 'AI in Logistics Career Training Program – Starting March 2, 2026', 'date' => 'August 6, 2026'],
    ['title' => 'Looking for a Flexible Way to Earn that Degree or Certificate?', 'date' => 'September 4, 2026'],
    ['title' => 'Join the Pride Scholars Learning Community', 'date' => 'August 30, 2026']
];
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="<?php echo lbcc_escape(lbcc_body_classes($page)); ?>">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>

<?php
component_hero(
    'split',
    'Student in the Loop',
    $heroSupplementalContent,
    [
        [
            'type' => 'image',
            'src' => '_resources/images/student-in-the-loop/student-in-loop.jpg',
            'alt' => ''
        ]
    ],
    [
        [
            'type' => 'video',
            'src' => '_resources/video/hero-backgrounds/hero-bg-3.mp4',
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
                <div class="col-12">
                    <div class="mb-4">
                        <?php 
                        component_title_with_ctas(
                            'Information',
                            [
                                [
                                    'text' => 'Archives',
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
                        data-tablet-items="3"
                        data-desktop-items="4"
                        data-autoplay="true"
                    >
                        <div class="swiper" data-lbcc-carousel-swiper>
                            <div class="swiper-wrapper align-items-stretch">
                                <?php foreach ($studentLoopNewsItems as $item) { ?>
                                <div class="swiper-slide h-auto">
                                    <div class="swiper-slide-content h-100">
                                        <a href="#" class="card component-card-as-link h-100 overflow-hidden position-relative rounded-4 border-0 text-decoration-none bg-surface-raised">
                                            <div class="card-body component-card-as-link__body p-3">
                                                <?php component_badge('Student in the Loop', 'light'); ?>
                                                <h2 class="h5 mt-3"><?php echo lbcc_escape($item['title']); ?></h2>
                                            </div>

                                            <div class="card-footer component-card-as-link__footer bg-transparent border-0 pt-0 px-3 pb-3">
                                                <span class="font-label fs-8"><?php echo lbcc_escape($item['date']); ?></span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <?php } ?>
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
            </div>
        </div>
    </section>
    <section class="pt-4 pb-5">
        <div class="container-xxl">
            <div class="row row-cols-1 row-cols-lg-2 g-5">
                <div class="col">
                    <h2 class="h4 mb-4">Reminders</h2>
                    <?php
                    component_accordion(
                        [
                            [
                                'title' => 'Campus Safety Escort Program Reminder',
                                'content' => '<p class="mb-0">The Campus Safety Escort Program is available to the campus community during the winter term, Monday through Friday, from 6 pm to 11 pm to provide a safe, reliable, and time-efficient way to get around campus during the evening. To request an escort, please call (562) 938-4100.</p>',
                                'icon' => 'fa-diamond-exclamation',
                                'open' => true
                            ],
                            [
                                'title' => 'It Takes Two – 8-Week Course Accelerated Program',
                                'content' => '<p>Long Beach City College has expanded its accelerated 8-week-course offerings.</p><p class="mb-0">The 8-week-course accelerated program format is part of an effort to help students balance college with work and family obligations.</p>',
                                'icon' => 'fa-laptop'
                            ],
                            [
                                'title' => '¡Manténgase saludable con TimelyCare!',
                                'content' => '<p class="mb-0">De parte del departamento Student Health Services: Acceda a citas virtuales con proveedores de salud mental en cualquier momento y en cualquier lugar, ¡GRATIS! Regístrese utilizando el correo electrónico de su universidad estudiantil.</p>',
                                'icon' => 'fa-carrot'
                            ],
                            [
                                'title' => 'Stay Healthy with TimelyCare!',
                                'content' => '<p class="mb-0">A message from Student Health Services: Access virtual appointments with mental health providers anytime, anywhere, for FREE! Register using your student college email.</p>',
                                'icon' => 'fa-carrot'
                            ]
                        ],
                        'student-loop-reminders',
                        true,
                        true,
                        'surface-raised'
                    );
                    ?>
                </div>
                <div class="col">
                    <div class="card bg-teal-200 border-0 rounded-5">
                        <div class="card-body">
                            <div class="mb-4 lbcc-animate lbcc-fade">
                                <?php
                                component_title_with_ctas(
                                    'Events',
                                    [
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
            </div>
        </div>
    </section>
    
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
