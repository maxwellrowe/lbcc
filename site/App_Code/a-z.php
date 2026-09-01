<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'A-Z Index',
    'description' => 'Sample A-Z index page for LBCC departments, services, and resources.',
    'section_nav' => false,
    'section_nav_include' => '',
    'sidenav' => false,
    'sidenav_include' => '',
    'custom_hero' => false
]);

$azSections = [
    'A' => [
        'Academic Calendar',
        'Academic Senate',
        'Admissions & Records',
        'Adult Education',
        'Assessment Center'
    ],
    'B' => [
        'Basic Needs Program',
        'Bookstore',
        'Business, CIS & Economics'
    ],
    'C' => [
        'CalWORKs',
        'Campus Safety',
        'Career Center',
        'Cashier\'s Office',
        'Counseling Services'
    ],
    'E' => [
        'EOPS',
        'ESL, American Sign Language & Linguistics'
    ],
    'F' => [
        'Family & Consumer Studies',
        'Faculty Directory',
        'Financial Aid',
        'Foster Youth Support Services'
    ]
];

$allLetters = range('A', 'Z');
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="lbcc-page">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<?php if ($page['custom_hero']) { ?>
<?php // Include Custom Hero Component here... ?>
<?php } ?>
<main id="main-content" class="az-index-page">
    <div class="container-xxl">
        <div class="row g-5 align-items-start">
            <div class="col-12 col-xl-8 order-2 order-xl-1">
                <section class="az-index" data-lbcc-az-index>
                    <?php foreach ($azSections as $letter => $items) { ?>
                        <section id="az-letter-<?php echo strtolower($letter); ?>" class="az-index__section mb-5">
                            <div class="d-flex align-items-center gap-3 mb-4 az-index__section-heading">
                                <h2 class="mb-0 fs-4xl text-teal-800"><?php echo lbcc_escape($letter); ?></h2>
                                <hr class="my-0 flex-grow-1 opacity-100">
                            </div>

                            <div class="d-flex flex-column gap-3">
                                <?php foreach ($items as $item) { ?>
                                    <a href="#" class="arrow-link fs-xl"><?php echo lbcc_escape($item); ?></a>
                                <?php } ?>
                            </div>
                        </section>
                    <?php } ?>
                </section>
            </div>

            <aside class="col-12 col-xl-4 order-1 order-xl-2 sticky-xl-top pt-xl-3">
                <div class="az-index__nav-wrap">
                    <nav class="az-index__nav" aria-label="A to Z jump links">
                        <div class="az-index__letters">
                            <?php foreach ($allLetters as $letter) {
                                $hasSection = array_key_exists($letter, $azSections);
                                ?>
                                <?php if ($hasSection) { ?>
                                    <a
                                        class="az-index__letter-link"
                                        href="#az-letter-<?php echo strtolower($letter); ?>"
                                        data-lbcc-az-link
                                    >
                                        <?php echo lbcc_escape($letter); ?>
                                    </a>
                                <?php } else { ?>
                                    <span class="az-index__letter-link az-index__letter-link--disabled" aria-disabled="true">
                                        <?php echo lbcc_escape($letter); ?>
                                    </span>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </nav>
                </div>
            </aside>
        </div>
    </div>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
