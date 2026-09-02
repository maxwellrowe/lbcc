<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Academics',
    'description' => 'Academics landing page template.',
    'section_nav' => true,
    'section_nav_include' => __DIR__ . '/navs/section-nav-programs.php',
    'sidenav' => false,
    'sidenav_include' => '',
    'custom_hero' => true
]);

$academicsHeroContent = <<<HTML
<div>
    <p class="lead fw-medium">With more than 70 academic and career programs, LBCC gives you real options to build towards what’s next. From transfer to the workforce, it starts here.</p>
    <a href="/App_Code/programs.php" class="btn btn-primary btn-icon btn-icon-end">
        <span class="btn-icon-label">View All Programs</span>
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
<body class="<?php echo lbcc_escape(lbcc_body_classes($page)); ?>">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>

<?php
    component_hero(
        'full',
        'Find your program & see what’s possible.',
        $academicsHeroContent,
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
                'src' => '_resources/images/academics/academics-hero-right.jpg',
                'alt' => ''
            ]
        ],
        [
            [
                'type' => 'image',
                'src' => '_resources/images/academics/academics-hero-left.jpg',
                'alt' => ''
            ]
        ],
        false
    );
    ?>
</div>

<main id="main-content">
    <section>
        <div class="container-xxl py-5">
            <?php
            component_title_with_ctas(
                'Explore Our Programs',
                [],
                '',
                '',
                'h2'
            );
            ?>
            <div class="row mt-5">
                <div class="col-12 col-lg-7 pe-xl-5 col-xl-8">
                    <h3 class="text-dark">What interests you?</h3>
                    <p>LBCC’s Career and Academic Pathways (CAP) group related majors into broad career areas to help you explore your options and figure out what fits your interests.</p>

                    <p class="eyebrow text-uppercase">Career and Academic Pathways (CAP)</p>

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 lbcc-animate lbcc-stagger">
                        <div class="col">
                            <a href="#" class="card snippet-card-well-as-link rounded-4 h-100 border-0 bg-surface-sun-haze text-decoration-none">
                                <div class="card-body d-flex align-items-center justify-content-center flex-column p-4">
                                    <div class="text-center">
                                        <img src="../_resources/images/cap/red/arts-language-communication.png" alt="" />
                                        <h2 class="h6 text-dark mt-3">Arts, Language & Communication</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="card snippet-card-well-as-link rounded-4 h-100 border-0 bg-surface-sun-haze text-decoration-none">
                                <div class="card-body d-flex align-items-center justify-content-center flex-column p-4">
                                    <div class="text-center">
                                        <img src="../_resources/images/cap/red/business-management-entr.png" alt="" />
                                        <h2 class="h6 text-dark mt-3">Business, Management & Entrepreneurship</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="card snippet-card-well-as-link rounded-4 h-100 border-0 bg-surface-sun-haze text-decoration-none">
                                <div class="card-body d-flex align-items-center justify-content-center flex-column p-4">
                                    <div class="text-center">
                                        <img src="../_resources/images/cap/red/health-science-technology.png" alt="" />
                                        <h2 class="h6 text-dark mt-3">Health, Science & Technology</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="card snippet-card-well-as-link rounded-4 h-100 border-0 bg-surface-sun-haze text-decoration-none">
                                <div class="card-body d-flex align-items-center justify-content-center flex-column p-4">
                                    <div class="text-center">
                                        <img src="../_resources/images/cap/red/society-education.png" alt="" />
                                        <h2 class="h6 text-dark mt-3">Society & Education</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="#" class="card snippet-card-well-as-link rounded-4 h-100 border-0 bg-surface-sun-haze text-decoration-none">
                                <div class="card-body d-flex align-items-center justify-content-center flex-column p-4">
                                    <div class="text-center">
                                        <img src="../_resources/images/cap/red/trades-service-industry.png" alt="" />
                                        <h2 class="h6 text-dark mt-3">Trades & Service Industry</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <?php
                            component_card_as_link(
                                '/App_Code/programs.php',
                                'View All Programs',
                                '',
                                'primary-border-thick',
                                '',
                                '',
                                'h5'
                            );
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 col-xl-4 ps-xl-5">
                    <?php
                    component_card(
                        'Career & Technical Education (CTE) Programs',
                        '<p>Explore career-focused programs built around real-world skills, so you’re ready to start working after graduation.</p>',
                        [
                            ['link' => '#', 'text' => 'CTE Programs', 'style' => 'btn-primary']
                        ],
                        '_resources/images/academics/card.jpg',
                        'surface-subtle',
                        'button',
                        false,
                        '',
                        'h4'
                        
                    );
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-surface-subtle py-5">
        <div class="container-xxl">
            <h2>More Ways to Learn</h2>
            <p>College doesn’t look the same for everyone. LBCC offers multiple ways to learn, each designed to meet you where you are and help you move forward.</p>

            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 mt-3 g-4 lbcc-animate lbcc-stagger">
                <div class="col">
                    <?php
                    component_card(
                        'Adult Education',
                        '<p>Explore short-term personal and professional development courses available year-round to community members.</p>',
                        [
                            ['link' => '#', 'text' => 'Adult Education', 'style' => 'btn-primary']
                        ],
                        '_resources/images/academics/card-3.jpg',
                        'white',
                        'button',
                        false,
                        '',
                        'h4'
                        
                    );
                    ?>
                </div>
                <div class="col">
                    <?php
                    component_card(
                        'Online Learning',
                        '<p>Learn from anywhere with fully online and hybrid course options.</p>',
                        [
                            ['link' => '#', 'text' => 'Online Learning', 'style' => 'btn-primary']
                        ],
                        '_resources/images/academics/card-5.jpg',
                        'white',
                        'button',
                        false,
                        '',
                        'h4'
                        
                    );
                    ?>
                </div>
                <div class="col">
                    <?php
                    component_card(
                        'Early College (High School Students)',
                        '<p>Get a head start on college while you’re still in high school.</p>',
                        [
                            ['link' => '#', 'text' => 'Early College', 'style' => 'btn-primary']
                        ],
                        '_resources/images/academics/card-2.jpg',
                        'white',
                        'button',
                        false,
                        '',
                        'h4'
                        
                    );
                    ?>
                </div>
                <div class="col">
                    <?php
                    component_card(
                        'It Takes Two',
                        '<p>Take classes in half the time with our  8-Week Accelerated Courses.</p>',
                        [
                            ['link' => '#', 'text' => '8-Week Courses', 'style' => 'btn-primary']
                        ],
                        '_resources/images/academics/card-4.jpg',
                        'white',
                        'button',
                        false,
                        '',
                        'h4'
                        
                    );
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container-xxl">
            <div class="card rounded-5 border-0 bg-teal-800">
                <div class="card-body p-5">
                    <div class="row align-items-center g-5">
                        <div class="col-12 col-md-7 col-lg-8">
                            <h2 class="text-white">Give Your Learning a Boost</h2>
                            <p class="lead text-white">At LBCC, your learning experience is supported in many ways. You’ll find resources that strengthen your classes and opportunities that help you go deeper.</p>
                            <div class="mt-4">
                                <?php
                                component_list_group(
                                    [
                                        [
                                            'link' => '#',
                                            'title' => 'Learning Communities & Academic Programs',
                                            'description' => 'Connect with peers, faculty, and support networks built around shared experiences and goals.',
                                            'label' => ''
                                        ],
                                        [
                                            'link' => '#',
                                            'title' => 'Library',
                                            'description' => 'Access research support, study spaces, technology, and learning tools.',
                                            'label' => ''
                                        ],
                                        [
                                            'link' => '#',
                                            'title' => 'Tutoring & Academic Resources',
                                            'description' => 'Get help when you need it in writing, math, science, and more.',
                                            'label' => ''
                                        ],
                                        [
                                            'link' => '#',
                                            'title' => 'Study Abroad',
                                            'description' => 'Earn credit while gaining a global perspective and life-changing experiences.',
                                            'label' => ''
                                        ],
                                        [
                                            'link' => '#',
                                            'title' => 'Credit for Prior Learning',
                                            'description' => 'Turn your work, military, or life experience into college credit.',
                                            'label' => ''
                                        ]
                                    ],
                                    'surface',
                                    'sm'
                                );
                                ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-5 col-lg-4">
                            <img src="../_resources/images/academics/learning-boost.jpg" alt="" class="rounded-5 lbcc-animate lbcc-fade-up" />
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </section>
    <section class="py-5">
        <div class="container-xxl">
            <?php
            component_title_with_ctas(
                'Make a Plan',
                [],
                '',
                '',
                'h2'
            );
            ?>
            <p class="lead mt-4">These tools help you stay on track, make informed choices, and plan your classes with confidence.</p>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 lbcc-animate lbcc-stagger mt-4">
                <div class="col">
                    <?php
                    component_card_as_link(
                        '#',
                        'Educational Plan',
                        'Your educational plan is your roadmap for which classes to take each term. Don’t have one yet? Meet with a counselor to create it.',
                        'primary-border-thin',
                        ''
                    );
                    ?>
                </div>
                <div class="col">
                    <?php
                    component_card_as_link(
                        '#',
                        'Schedule of Classes',
                        'View current and upcoming course offerings.',
                        'primary-border-thin',
                        ''
                    );
                    ?>
                </div>
                <div class="col">
                    <?php
                    component_card_as_link(
                        '#',
                        'College Catalog',
                        'Review detailed information about programs, degrees, certificates, and courses.',
                        'primary-border-thin',
                        ''
                    );
                    ?>
                </div>
                <div class="col">
                    <?php
                    component_card_as_link(
                        '#',
                        'Academic Calendar',
                        'Check important dates for the semester, including start and end dates and holidays.',
                        'primary-border-thin',
                        ''
                    );
                    ?>
                </div>
                <div class="col">
                    <?php
                    component_card_as_link(
                        '#',
                        'Registration Dates & Deadlines',
                        'Know when to register and stay on track with key deadlines each term.',
                        'primary-border-thin',
                        ''
                    );
                    ?>
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
