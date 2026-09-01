<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Accounting',
    'description' => 'Placeholder single program template.',
    'section_nav' => true,
    'section_nav_include' => __DIR__ . '/navs/section-nav-business.php',
    'sidenav' => true,
    'sidenav_include' => __DIR__ . '/navs/sidenav-accounting.php',
    'custom_hero' => true
]);
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="lbcc-page">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<div class="bg-water-gradient page-hero">
    <div class="container-xxl pt-0 pt-sm-4">
        <div class="row">
            <div class="col-12 col-sm-3 col-md-4 ps-xl-5 order-1 order-sm-2">
                <div class="h-100 d-flex justify-content-end flex-column">
                    <img src="../_resources/images/placeholders/programs/accounting.jpg" alt="" class="img-fluid rounded-top lbcc-animate lbcc-fade" />
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
                                    <span>Business, Management & Entrepreneurship</span>
                                </div>
                            </div>
                            <div class="border border-start border-secondary d-none d-md-inline-flex"></div>
                            <div>
                                <span class="eyebrow-sm d-block text-muted mb-2">Award Options</span>
                                <div class="d-flex gap-2">
                                    <span class="badge text-bg-dark bg-secondary rounded-pill px-2 py-2">AA</span>
                                    <span class="badge text-bg-dark bg-secondary rounded-pill px-2 py-2">C-ACH</span>
                                    <span class="badge text-bg-dark bg-secondary rounded-pill px-2 py-2">C-ACC</span>
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
    <div class="container-xxl">
        <div class="row">
            <div class="col-12 col-md-8 my-5">
                <section>
                    <p class="lead">Did you know that Accounting is referred to as the “language of business”? Every company in every industry uses Accounting information to make decisions, even in times of economic downturn. </p>
                    <p class="lead">By studying Accounting, you will learn to prepare and interpret the financial data needed by management to run a business. You will be exposed to the operations of every department within an organization. Whether you want to work for a corporation, go into public accounting, work for the government or start your own business, Accounting will give you the tools necessary to be successful.</p>
                    <div class="component-spacer cs-2"></div>
                    <?php
                    component_video_modal(
                        '_resources/images/placeholders/programs/accounting-video.jpg',
                        '<iframe src="https://www.youtube.com/embed/4uclCIlMAeo?si=NCLwKjp3q9GQh29U" title="Accounting at LBCC" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
                        'Accounting at LBCC'
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
                                'label' => 'Associate in Arts (AA)',
                                'title' => 'Business: Accounting',
                                'links' => [
                                    ['text' => 'Required Courses', 'url' => 'https://lbcc-public.courseleaf.com/degrees-certificates/business/business-acconting-concentration-aa/#programrequirementstext'],
                                    ['text' => 'Program Mapper', 'url' => 'https://programmap.lbcc.edu/academics/interest-clusters/40e8babd-d8af-4a5e-91ee-2b5b24544be8/programs/8b3a58b1-d34a-7c2d-05b2-fc001eadcdeb']
                                ]
                            ],
                            [
                                'label' => 'Certificate of Achievement (C-ACH)',
                                'title' => 'Business: Accounting',
                                'links' => [
                                    ['text' => 'Required Courses', 'url' => 'https://lbcc-public.courseleaf.com/degrees-certificates/business/business-accounting-certificate-achievement/#programrequirementstext'],
                                    ['text' => 'Program Mapper', 'url' => 'https://programmap.lbcc.edu/academics/interest-clusters/40e8babd-d8af-4a5e-91ee-2b5b24544be8/programs/91f07f23-0221-5b0e-9e2a-a4cb6202427a']
                                ]
                            ],
                            [
                                'label' => 'Certificate of Accomplishment (C-ACC)',
                                'title' => 'Business: Business Economics',
                                'links' => [
                                    ['text' => 'Required Courses', 'url' => 'https://lbcc-public.courseleaf.com/degrees-certificates/business/business-business-economics-certificate-accomplishment/#programrequirementstext'],
                                    ['text' => 'Program Mapper', 'url' => 'https://programmap.lbcc.edu/academics/interest-clusters/40e8babd-d8af-4a5e-91ee-2b5b24544be8/programs/7cb265d8-bb70-df4e-950a-9e3ccccaa0a2']
                                ]
                            ],
                            [
                                'label' => 'Certificate of Accomplishment (C-ACC)',
                                'title' => 'Business: Foundations of Accounting',
                                'links' => [
                                    ['text' => 'Required Courses', 'url' => 'https://lbcc-public.courseleaf.com/degrees-certificates/business/business-foundations-accounting-certificate-accomplishment/#programrequirementstext']
                                ]
                            ],
                            [
                                'label' => 'Certificate of Accomplishment (C-ACC)',
                                'title' => 'Business: Money & Banking',
                                'links' => [
                                    ['text' => 'Required Courses', 'url' => 'https://lbcc-public.courseleaf.com/degrees-certificates/business/business-money-banking-certificate-accomplishment/#programrequirementstext'],
                                    ['text' => 'Program Mapper', 'url' => 'https://programmap.lbcc.edu/academics/interest-clusters/40e8babd-d8af-4a5e-91ee-2b5b24544be8/programs/803685e5-7b35-a05e-857b-0441e2bcde26']
                                ]
                            ]
                        ],
                        'vertical',
                        1,
                        2,
                        2
                    );
                    $degreeCertificatesContent = ob_get_clean();

                    $courseRows = [
                        ['ACCTG 1A', 'Financial Accounting', [true, true, true, true]],
                        ['ACCTG 1B', 'Managerial Accounting', [true, false, true, true]],
                        ['ACCTG 200', 'Introduction to Accounting', [true, true, true, true]],
                        ['ACCTG 205', 'Fundamentals of Tax', [true, false, true, false]],
                        ['ACCTG 228', 'Computerized Gen Ledger Account Systems', [true, false, true, false]],
                        ['ACCTG 229', 'Spreadsheet Accounting', [true, false, true, false]],
                        ['ACCTG 230', 'QuickBooks Accounting', [true, false, true, false]],
                        ['ECON 1', 'Macro Economic Analysis', [true, true, true, true]],
                        ['ECON 2', 'Micro Economic Analysis', [true, true, true, true]],
                        ['GBUS 5', 'Introduction to Business', [true, true, true, true]],
                        ['LAW 18A', 'Business Law', [true, true, true, true]],
                        ['LAW 18B', 'Business Law', [true, true, true, true]]
                    ];
                    $terms = ['Fall', 'Winter', 'Spring', 'Summer'];

                    ob_start();
                    ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Course Name</th>
                                    <?php foreach ($terms as $term) { ?>
                                        <th scope="col" class="text-center"><?php echo lbcc_escape($term); ?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($courseRows as [$code, $name, $availability]) { ?>
                                    <tr>
                                        <th scope="row">
                                            <span class="d-block fw-bold"><?php echo lbcc_escape($code); ?></span>
                                            <span class="d-block fw-normal"><?php echo lbcc_escape($name); ?></span>
                                        </th>
                                        <?php foreach ($availability as $isAvailable) { ?>
                                            <td class="text-center">
                                                <?php if ($isAvailable) { ?>
                                                    <span class="fa-sharp fa-solid fa-check text-primary" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Available</span>
                                                <?php } else { ?>
                                                    <span class="visually-hidden">Not offered</span>
                                                <?php } ?>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    $coursesContent = ob_get_clean();

                    $careerInfoContent = <<<'HTML'
                        <p>Accounting has a number of fields including financial and managerial accounting, cost accounting, tax accounting, governmental accounting, not-for-profit accounting, public accounting, and auditing.</p>
                        <p>Careers in Financial Accounting, Tax Preparation, Managerial Accounting, and Auditing.</p>
                        <ul>
                            <li>Start your career in bookkeeping, Accounts Receivable, Accountants Payable, or Payroll.</li>
                            <li>Continue your education and earn the designation of Certified Public Accountant or Certified Management Accountant.</li>
                            <li>Choose to work in any industry as all companies need accounting or choose to work in public accounting and get exposed to many different industries.</li>
                            <li>Start your own business in tax preparation or bookkeeping.</li>
                        </ul>
                        <h3>Potential Jobs</h3>
                        <p><strong>Industry/Government Accounting</strong></p>
                        <ul>
                            <li>Accounts Receivable/Accounts Payable Clerk</li>
                            <li>Chief Financial Officer</li>
                            <li>Controller</li>
                            <li>Management Accountant</li>
                            <li>Staff to Senior Accountant</li>
                        </ul>
                        <p><strong>Public Accounting</strong></p>
                        <ul>
                            <li>Bookkeeping</li>
                            <li>Management</li>
                            <li>Partner</li>
                            <li>Staff to Senior Accountant</li>
                        </ul>
                        <p>To explore potential jobs in this field of study, we strongly urge you to visit <strong><a href="/career-center" target="_blank" rel="noopener noreferrer">LBCC Career Center</a></strong>. Working with a career counselor, we will assess your strengths, skills, interests, and accomplishments to help you <strong>identify internship opportunities</strong> and <strong>career goals</strong> that match your educational and professional needs.</p>
                        HTML;

                    ob_start();
                    component_accordion(
                        [
                            [
                                'title' => 'Do the Department of Business Administration & Economics faculty have real-world business experience?',
                                'content' => '<p class="mb-0">Yes, nearly every member of our faculty has a strong professional background in their concentration.</p>',
                                'open' => true
                            ],
                            [
                                'title' => 'How long does it take to complete the program?',
                                'content' => '<p>Depending on the number of units you take and whether you are a full-time or part-time student, completing a certificate program can take as little as one semester and completing an associate degree program can take about two years.</p><p class="mb-0"><a href="/counseling" target="_blank" rel="noopener noreferrer">Make a 30-minute appointment</a> with an academic counselor to receive services in educational plans, transcript evaluation, and career planning.</p>'
                            ],
                            [
                                'title' => 'How much does the program cost?',
                                'content' => '<p class="mb-0">Please visit <a href="/financial-aid" target="_blank" rel="noopener noreferrer">Financial Aid</a> for tuition cost and Federal Work Study information.</p>'
                            ],
                            [
                                'title' => 'Who are the Career & Technical Education (CTE) counselors?',
                                'content' => '<p><a href="/pod/meet-your-counselors" target="_blank" rel="noopener noreferrer">Meet LBCC Counselors</a></p><p class="mb-0">Please visit the <a href="/counseling" target="_blank" rel="noopener noreferrer">Counseling Office</a> for academic counseling, career exploration, educational planning, college transfer, student resources, and many other services to help you achieve your educational goals.</p>'
                            ],
                            [
                                'title' => 'What is the difference between a transfer degree (AA-T/AS-T) and a traditional AA/AS degree?',
                                'content' => '<ul class="mb-0"><li>The traditional AA-Business degree has been designed for those who are in pursuit of an Associate degree with a stronger and more immediate career focus, such as securing a job opportunity or a job promotion. Since most of the courses on this degree are transferable to a baccalaureate-granting institution, you will still have the opportunity to complete your bachelor\'s degree when the time is more appropriate. This degree offers five distinct career paths: accounting, general business, international business, management, and marketing.</li><li>The CSU transfer degree has been developed as a fast-track degree for transfer into the CSU system. The course requirements for the transfer degree have been developed as a collaborative effort by Community College and CSU faculty. This degree will help you create a clear path from LBCC to a CSU campus once you have met the stated requirements, which can be found in the Curriculum Guide section. We offer both an AS-T in Business Administration and an AA-T in Economics.</li></ul>'
                            ],
                            [
                                'title' => 'What is the difference between a certificate of achievement and a certificate of accomplishment?',
                                'content' => '<ul class="mb-0"><li>Completion of a Certificate of Achievement can be an end in itself or can, after completing the necessary GE requirements, lead to the attainment of one of our Associate degrees.</li><li>Certificates of Accomplishment are lower-unit certifications, usually 9–12 units, that are tied to a specific skill set and are generally used as stepping stones on the path to obtaining a Certificate of Achievement and eventually an Associate degree. They can also be instrumental in career advancement.</li></ul>'
                            ],
                            [
                                'title' => 'How do I receive my degree or certificate after I finish the coursework?',
                                'content' => '<p class="mb-0">You will need to complete an application for your degree or certificate and submit that application to the LBCC Admissions &amp; Records office. Read how to apply for graduation and <a href="/post/receiving-your-degree-or-certificate" target="_blank" rel="noopener noreferrer">receive your degree or certificate</a> for more details.</p>'
                            ],
                            [
                                'title' => 'How do I transfer and look up comparable course listings?',
                                'content' => '<p>To help determine if courses taken at other schools are comparable to Long Beach City College courses, please visit <a href="https://tes.collegesource.com/publicview/TES_publicview01.aspx?rid=e0a9315d-0404-4286-a8ad-3bdc7041c55f&amp;aid=8d9122dd-43fc-4c3f-adbc-67a1216cb228" target="_blank" rel="noopener noreferrer">LBCC Transfer Evaluation System (TES)</a>.</p><p class="mb-0">For more transfer information, please visit the <a href="/transfer-center" target="_blank" rel="noopener noreferrer">LBCC Transfer Center</a>.</p>'
                            ]
                        ],
                        'program-faq',
                        false,
                        true
                    );
                    $faqContent = ob_get_clean();

                    component_tabs(
                        [
                            [
                                'label' => 'Degrees & Certificates',
                                'content' => $degreeCertificatesContent,
                                'active' => true
                            ],
                            [
                                'label' => 'Courses',
                                'content' => $coursesContent
                            ],
                            [
                                'label' => 'Career Information',
                                'content' => $careerInfoContent
                            ],
                            [
                                'label' => 'FAQ',
                                'content' => $faqContent
                            ]
                        ],
                        'program-tabs'
                    );
                    ?>
                </section>
                <section>
                    <h2>Additional Program Resources</h2>
                </section>
            </div>
            <div class="col-12 col-md-4 ps-xl-5">
                <div class="card rounded-0 rounded-bottom-5 bg-surface-subtle shadow-lg border-0">
                    <div class="card-body p-0">
                        <div class="p-4 bg-white">
                            <h2 class="h4">Get Started in Accounting</h4>
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
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
