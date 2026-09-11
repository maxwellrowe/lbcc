<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Get Started',
    'description' => 'Get Started landing page template.',
    'section_nav' => false,
    'section_nav_include' => '',
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
    'Get Started at Long Beach City College',
    '',
    [
        [
            'type' => 'image',
            'src' => '_resources/images/placeholders/students/student-99.jpg',
            'alt' => ''
        ]
    ],
    [
        [
            'type' => 'image',
            'src' => '_resources/images/hero-backgrounds/hero-bg-9.jpg',
            'alt' => ''
        ]
    ],
    [],
    true
);
?>

<main id="main-content">
    <section class="pb-5 bg-surface-raised">
        <div class="container-xxl">
            <div class="row gy-4">
                <div class="col-12 col-md-8 col-lg-9 pe-xl-5">
                    <h2>Welcome to LBCC!</h2>
                    <p class="lead mb-4">We’re so excited you chose LBCC as your college. Whether you’re new or coming back, you’ve got a place here.  Your steps to get started depend on who you are. Choose the student type that best matches you to see your next steps!</p>
                    <?php
                    component_list_group(
                        [
                            [
                                'link' => '#',
                                'title' => 'First Time College Student',
                                'description' => 'You’ve never attended community college or a university.'
                            ],
                            [
                                'link' => '#',
                                'title' => 'Returning Student',
                                'description' => 'You’ve attended LBCC, but have missed 2 or more semesters in a row.'
                            ],
                            [
                                'link' => '#',
                                'title' => 'Incoming Transfer',
                                'description' => 'You’ve completed courses and/or earned a degree from another college or university.'
                            ],
                            [
                                'link' => '#',
                                'title' => 'Dual Enrollment',
                                'description' => 'You’re a middle school or high school student and want to take college classes at LBCC.'
                            ],
                            [
                                'link' => '#',
                                'title' => 'Undocumented Student',
                                'description' => 'You identify as AB540 or an undocumented student.'
                            ],
                            [
                                'link' => '#',
                                'title' => 'Adult Learner',
                                'description' => 'You are interested in taking noncredit classes, including ESL, Adult Education & More.'
                            ],
                            [
                                'link' => '#',
                                'title' => 'International Student',
                                'description' => 'You are applying to LBCC with an F-1 Visa.'
                            ]
                        ],
                        'primary-outline'
                    );
                    ?>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="card bg-white border-0 rounded-4">
                        <div class="card-body p-4">
                            <h2 class="h5">Have Questions?</h2>
                            <p>We’re here to help you with the admissions process!</p>
                            <p><?php component_block_arrow_link('#', '', '', 'Visit the Welcome Center'); ?></p>
                            <p><?php component_block_arrow_link('#', '', '', 'Chat with Us'); ?></p>
                            <p><?php component_block_arrow_link('#', '', '', 'Watch Enrollment Videos & Guides'); ?></p>
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
