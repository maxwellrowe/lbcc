<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Registered Nursing',
    'description' => 'Placeholder single program template.',
    'section_nav' => true,
    'section_nav_include' => __DIR__ . '/navs/section-nav-nursing.php',
    'sidenav' => true,
    'sidenav_include' => __DIR__ . '/navs/sidenav-nursing.php',
    'custom_hero' => true
]);
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="<?php echo lbcc_escape(lbcc_body_classes($page)); ?>">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<div class="bg-water-gradient page-hero">
    <div class="container-xxl pt-0 pt-sm-4">
        <div class="row">
            <div class="col-12 col-sm-3 col-md-4 ps-xl-5 order-1 order-sm-2">
                <div class="h-100 d-flex justify-content-end flex-column">
                    <img src="../_resources/images/placeholders/programs/nursing.jpg" alt="" class="img-fluid rounded-top lbcc-animate lbcc-fade" />
                </div>
            </div>
            <div class="col-12 col-sm-9 col-md-8 order-2 order-sm-1">
                <div class="py-4 pt-md-0 h-100 d-flex flex-column justify-content-between">
                    <?php // Breadcrumbs Include
                        include dirname(__DIR__) . '/_resources/includes/breadcrumbs.php';
                    ?> 
                    <div>
                        <?php if ($pageTitle !== '') { ?>
                            <h1 class="page-title-default mb-0 mt-5 fs-6xl lbcc-animate lbcc-fade lbcc-duration-700"><?php echo lbcc_escape($pageTitle); ?></h1>
                        <?php } ?>
                        <div class="d-flex flex-column flex-md-row mt-3 gap-4">
                            <div>
                                <span class="eyebrow-sm d-block text-muted mb-2">Career &amp; Academic Pathway (CAP)</span>
                                <div class="d-flex gap-2">
                                    <img src="../_resources/images/cap/business-management-ent.png" alt="" />
                                    <span>Health, Science & Technology</span>
                                </div>
                            </div>
                            <div class="border border-start border-secondary d-none d-md-inline-flex"></div>
                            <div>
                                <span class="eyebrow-sm d-block text-muted mb-2">Award Options</span>
                                <div class="d-flex gap-2">
                                    <span class="badge text-bg-dark bg-secondary rounded-pill px-2 py-2">AS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>
<main id="main-content">
    <div class="container-xxl pt-0">
        <div class="row">
            <div class="col-12 col-md-8 my-5">
                <section>
                    <p class="lead">The Associate Degree Nursing (ADN) program at Long Beach City College is committed to providing high-quality nursing education to a diverse and talented student population. Our goal is to prepare safe, compassionate, and practice-ready entry-level nurses who can meet the evolving healthcare needs of our community. Our faculty foster a supportive, student-centered environment rooted in collaboration, communication, excellence, and patient-centered care.</p>
                    <div class="component-spacer cs-2"></div>
                    <?php
                    component_video_modal(
                        '_resources/images/academics/academics-hero.jpg',
                        '<iframe src="https://www.youtube.com/embed/D6WRcl3x0uE?si=yLAPXJZMqEOjPeoS" title="Accounting at LBCC" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                        'Registered Nursing at LBCC'
                    );
                    ?>
                    <div class="component-spacer cs-2"></div>
                </section>
                <section>
                    <?php
                    ob_start();
                    component_degree_certificates(
                        [
                            [
                                'label' => 'Associate in Science (AS)',
                                'title' => 'Registered Nursing',
                                'links' => [
                                    ['text' => 'Required Courses', 'url' => '#'],
                                    ['text' => 'Program Mapper', 'url' => '#']
                                ]
                            ]
                        ],
                        'vertical',
                        1,
                        1,
                        1
                    );
                    $degreeCertificatesContent = ob_get_clean();

                    $careerInfoContent = <<<'HTML'
                        <p>
                        The program is designed to be completed in two years (after completion of pre-requisites) and qualifies the student to take the NCLEX-RN licensing examination given by the State of California Board of Registered Nursing. The program satisfies the requirements for an Associate degree and/or a Career Certificate. The graduate is qualified for immediate employment in acute care hospitals and many other healthcare facilities.
                        </p>

                        <p>
                        This Associate Degree and Certificate of Achievement prepare students for an entry-level position in a variety of healthcare settings following successful completion of the NCLEX-RN. The RN also serves as a foundation for specialization.
                        </p>

                        <p>
                        Graduates of the Associate Degree Registered Nursing program are also eligible to transfer into the upper-division nursing courses in RN to bachelor’s degree nursing programs and RN to master’s degree nursing programs.
                        </p>

                        <p>
                        To explore potential jobs in this field of study, we strongly urge you to visit
                        <a href="https://www.lbcc.edu/career-center"><strong>LBCC Career Center</strong></a>.
                        </p>

                        <p>
                        Working with a career counselor, we will assess your strengths, skills, interests, and accomplishments to help you <strong>identify internship opportunities</strong> and <strong>career goals</strong> that match your educational and professional needs.
                        </p>
                        HTML;

                    

                    component_tabs(
                        [
                            [
                                'label' => 'Degrees & Certificates',
                                'content' => $degreeCertificatesContent,
                                'active' => true
                            ],
                            [
                                'label' => 'Career Information',
                                'content' => $careerInfoContent
                            ]
                        ],
                        'program-tabs'
                    );
                    ?>
                </section>
                <section>
                    <h2 class="mb-4">Additional Program Resources</h2>
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col">
                            <?php
                            component_list_group(
                                [
                                    [
                                        'link' => '#',
                                        'title' => 'ADN Student Handbook',
                                        'description' => ''
                                    ],
                                    [
                                        'link' => '#',
                                        'title' => 'NCLEX Pass Rates',
                                        'description' => ''
                                    ],
                                    [
                                        'link' => '#',
                                        'title' => 'College Catalog',
                                        'description' => ''
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
                                        'title' => 'ADN Program Attrition',
                                        'description' => '',
                                    ],
                                    [
                                        'link' => '#',
                                        'title' => 'Policy to Award Credit for Military Personnel',
                                        'description' => '',
                                    ]
                                ],
                                'surface',
                                'sm'
                            );
                            ?>
                        </div>
                    
                </section>
                <section class="pt-5">
                    <div class="card border-0 rounded-5 bg-surface-water shadow-none">
                        <div class="card-body p-4">
                            <h2>Accreditation Statement & Contact Information</h2>
                            <p>The Associate Degree Nursing program and the LVN-to-RN Career Ladder program at Long Beach City College, LAC Campus, Long Beach, California, are accredited by the Accreditation Commission for Education in Nursing (ACEN), 3390 Peachtree Road NE, Suite 1400, Atlanta, Georgia 30326, 404-975-5000. The program is also approved by the California Board of Registered Nursing (BRN).</p>
                            <p><a href="#">View the public information disclosed by the ACEN regarding this program.</a></p>
                        </div>
                    </div>
                </section>
                <section>
                    <h2 class="mb-4">Contact Us</h2>
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col">
                            <?php
                            component_contact_card(
                                'Jamie Lopez DNP, RN',
                                'Professor and Program Director/Department Head',
                                '(562) 938-4074',
                                'j2lopez@lbcc.edu',
                                'LAC, C-119',
                                '',
                                '',
                                'vertical',
                                'default',
                                '#',
                                '',
                                '',
                                ''
                            );
                            ?>
                        </div>
                        <div class="col">
                            <?php
                            component_contact_card(
                                'Nicole Evans DNP, RN',
                                'Professor and Co Program Director/Department Head',
                                '(562) 938-4177',
                                'Nevans@lbcc.edu',
                                '',
                                '',
                                '',
                                'vertical',
                                'default',
                                '#',
                                '',
                                '',
                                ''
                            );
                            ?>
                        </div>
                    </div>
                </section>
                <section class="pb-5">
                    <h2 class="mb-4">Other Nursing Pathways</h2>
                    <?php component_programs('', 'grid', 1, 2, 3, false, ['Certified Nursing Assistant (CNA)', 'LVN to RN Career Ladder', 'Vocational Nursing']); ?>
                </section>
            </div>
            <div class="col-12 col-md-4 ps-xl-5">
                <div class="card rounded-0 rounded-bottom-5 bg-surface-subtle shadow-lg border-0">
                    <div class="card-body p-0">
                        <div class="p-4 bg-white">
                            <h2 class="h4 mb-4">Get Started in <?php echo $pageTitle; ?></h4>
                            <?php
                            component_buttons(
                                [
                                    [
                                        'style' => 'btn-outline-primary',
                                        'text' => 'Program Brochure',
                                        'url' => '#',
                                        'size' => 'btn-sm',
                                        'icon' => ''
                                    ],
                                    [
                                        'style' => 'btn-outline-primary',
                                        'text' => 'Speak with a Counselor',
                                        'url' => '#',
                                        'size' => 'btn-sm',
                                        'icon' => ''
                                    ],
                                    [
                                        'style' => 'btn-outline-primary',
                                        'text' => 'Browse Classes',
                                        'url' => '#',
                                        'size' => 'btn-sm',
                                        'icon' => ''
                                    ],
                                    [
                                        'style' => 'btn-primary',
                                        'text' => 'Apply Now',
                                        'url' => '#',
                                        'size' => 'btn',
                                        'icon' => 'fa-arrow-up-right',
                                        'icon_position' => 'end'
                                    ]
                                ],
                                'column',
                                2
                            );
                            ?>
                        </div>
                        <div class="p-3 d-none d-xl-block">
                            <?php include dirname(__DIR__) . '/_resources/includes/navigation/sidenav.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-sand-water-gradient py-5 rounded-top-5">
        <div class="container-xxl">
            <h2 class="mb-5 text-center">Explore Similar Programs</h2>
            <?php component_programs('Health, Science & Technology', 'carousel', 1, 2, 4, true); ?>
        </div>
    </div>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
