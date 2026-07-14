<?php
require_once __DIR__ . '/_resources/php/template-helpers.php';
require_once __DIR__ . '/_resources/includes/head.php';

$page = [
    'title' => 'Current Students',
    'description' => 'LBCC interior hub shell demo for current students.'
];

$quickAccess = [
    ['label' => 'Viking Portal', 'icon' => 'fa-sharp fa-solid fa-compass', 'href' => '#plan-register'],
    ['label' => 'Canvas', 'icon' => 'fa-sharp fa-solid fa-desktop', 'href' => '#plan-register'],
    ['label' => 'Library', 'icon' => 'fa-sharp fa-solid fa-book-open', 'href' => '#get-support'],
    ['label' => 'Class Schedule', 'icon' => 'fa-sharp fa-solid fa-calendar-days', 'href' => '#upcoming-events']
];

$events = [
    ['category' => 'Workshop', 'title' => 'Using AI as Your Research Assistant', 'meta' => 'March 11, 2026 · 12:00 PM - 1:00 PM'],
    ['category' => 'Registration', 'title' => 'Dual Enrollment Registration Labs', 'meta' => 'March 11, 2026 · Online and in person'],
    ['category' => 'Orientation', 'title' => 'Next Steps for LBCC', 'meta' => 'March 11, 2026 · Virtual'],
    ['category' => 'Academic Calendar', 'title' => 'Flex Day - No Classes', 'meta' => 'March 12, 2026']
];

$resourceGroups = [
    [
        'id' => 'plan-register',
        'icon' => 'fa-sharp fa-solid fa-compass',
        'title' => 'Plan and Register',
        'links' => ['Registration Dates', 'Academic Calendar', 'Make a Counseling Appointment', 'Degree Planner', 'College Catalog']
    ],
    [
        'id' => 'pay-college',
        'icon' => 'fa-sharp fa-solid fa-wallet',
        'title' => 'Pay for College',
        'links' => ['Financial Aid', 'Scholarships', 'Pay Your Fees', 'Refunds', 'Disbursements']
    ],
    [
        'id' => 'get-support',
        'icon' => 'fa-sharp fa-solid fa-circle-info',
        'title' => 'Get Support',
        'links' => ['Join the Line for Student Services', 'Counseling', 'Tutoring and Academic Support', 'Basic Needs', 'Wellness']
    ],
    [
        'id' => 'campus-life',
        'icon' => 'fa-sharp fa-solid fa-location-dot',
        'title' => 'Campus Life',
        'links' => ['Parking', 'Maps', 'Food on Campus', 'Clubs', 'Athletics', 'Events']
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<?php lbcc_head($page); ?>
<body class="lbcc-page lbcc-interior-page">
<?php include __DIR__ . '/_resources/includes/header.php'; ?>
<main id="main-content">
    <section class="page-hero">
        <div class="container">
            <nav aria-label="Breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo lbcc_escape(lbcc_url('/')); ?>">LBCC</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo lbcc_escape(lbcc_url('/#support')); ?>">Support</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Current Students</li>
                </ol>
            </nav>
            <div class="row g-4 align-items-end">
                <div class="col-lg-7">
                    <p class="eyebrow mb-2">Current Students</p>
                    <h1>Everything you need to stay on track at LBCC.</h1>
                    <p class="lead text-body-secondary mb-0">This interior shell focuses on quick access, grouped student tasks, and compact event content so the layout stays useful before we wire in deeper content modules.</p>
                </div>
                <div class="col-lg-5">
                    <div class="page-hero-panel">
                        <p class="eyebrow mb-2">Student in the Loop</p>
                        <h2 class="h4 mb-3">Keep students aware of deadlines, workshops, and support opportunities.</h2>
                        <p class="mb-0 text-body-secondary">The right-rail content can later become a reusable announcement, newsletter, or signup snippet.</p>
                    </div>
                </div>
            </div>

            <div class="page-tab-strip mt-4">
                <a href="#quick-access">Quick Access</a>
                <a href="#upcoming-events">Upcoming Events</a>
                <a href="#plan-register">Plan & Register</a>
                <a href="#pay-college">Pay for College</a>
                <a href="#get-support">Get Support</a>
                <a href="#campus-life">Campus Life</a>
            </div>
        </div>
    </section>

    <section id="quick-access" class="section-shell">
        <div class="container">
            <div class="section-heading">
                <div>
                    <p class="eyebrow mb-2">Quick Access</p>
                    <h2>Fast-entry actions should be easy to scan and hard to miss.</h2>
                </div>
                <p class="section-copy">The card layout gives us a simple, repeatable way to surface daily student actions without forcing everything into one sidebar.</p>
            </div>
            <div class="row g-3">
                <?php foreach ($quickAccess as $item) { ?>
                    <div class="col-sm-6 col-xl-3">
                        <a class="quick-access-card" href="<?php echo lbcc_escape(lbcc_url($item['href'])); ?>">
                            <span class="quick-access-icon <?php echo lbcc_escape($item['icon']); ?>" aria-hidden="true"></span>
                            <span class="quick-access-label"><?php echo lbcc_escape($item['label']); ?></span>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section id="upcoming-events" class="section-shell section-shell-accent">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="section-heading mb-4">
                        <div>
                            <p class="eyebrow mb-2">Upcoming Events</p>
                            <h2>Event content stays readable even when details vary in length.</h2>
                        </div>
                    </div>
                    <div class="vstack gap-3">
                        <?php foreach ($events as $event) { ?>
                            <article class="feed-card">
                                <p class="eyebrow mb-2"><?php echo lbcc_escape($event['category']); ?></p>
                                <h3 class="h5 mb-2"><?php echo lbcc_escape($event['title']); ?></h3>
                                <p class="mb-0 text-body-secondary"><?php echo lbcc_escape($event['meta']); ?></p>
                            </article>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <aside class="surface-card p-4 h-100">
                        <p class="eyebrow mb-2">Need Help Getting Started?</p>
                        <h2 class="h4 mb-3">Keep support pathways next to the timeline, not buried under it.</h2>
                        <ul class="list-unstyled resource-mini-list mb-4">
                            <li><a href="#plan-register">Make a counseling appointment</a></li>
                            <li><a href="#pay-college">Check your financial aid options</a></li>
                            <li><a href="#get-support">Find tutoring and academic support</a></li>
                        </ul>
                        <a class="btn btn-secondary w-100" href="#get-in-touch">Get In Touch</a>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    <section class="section-shell">
        <div class="container">
            <div class="row g-4">
                <?php foreach ($resourceGroups as $group) { ?>
                    <div id="<?php echo lbcc_escape($group['id']); ?>" class="col-lg-6">
                        <article class="resource-group-card h-100">
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <span class="resource-group-icon <?php echo lbcc_escape($group['icon']); ?>" aria-hidden="true"></span>
                                <div>
                                    <p class="eyebrow mb-2">Student Hub</p>
                                    <h2 class="h4 mb-0"><?php echo lbcc_escape($group['title']); ?></h2>
                                </div>
                            </div>
                            <ul class="resource-link-list list-unstyled mb-0">
                                <?php foreach ($group['links'] as $link) { ?>
                                    <li>
                                        <a href="#">
                                            <span><?php echo lbcc_escape($link); ?></span>
                                            <span class="fa-sharp fa-regular fa-arrow-right" aria-hidden="true"></span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </article>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section id="get-in-touch" class="section-shell">
        <div class="container">
            <div class="cta-band">
                <div>
                    <p class="eyebrow mb-2">Get in Touch</p>
                    <h2 class="mb-2">Interior hubs can stay task-focused without feeling dry.</h2>
                    <p class="mb-0 text-body-secondary">This page demonstrates breadcrumbs, quick-access cards, event feeds, grouped resource lists, and a lighter right-rail pattern we can reuse elsewhere.</p>
                </div>
                <div class="d-flex flex-wrap gap-3">
                    <a class="btn btn-primary btn-lg" href="<?php echo lbcc_escape(lbcc_url('/')); ?>">Back to Homepage</a>
                    <a class="btn btn-outline-secondary btn-lg" href="<?php echo lbcc_escape(lbcc_url('/App_Code/styleguide.php')); ?>">Review Foundation</a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include __DIR__ . '/_resources/includes/footer.php'; ?>
<?php include __DIR__ . '/_resources/includes/footer-scripts.php'; ?>
</body>
</html>
