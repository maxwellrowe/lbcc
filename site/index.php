<?php
require_once __DIR__ . '/_resources/php/template-helpers.php';
require_once __DIR__ . '/_resources/includes/head.php';

$page = [
    'title' => 'Home',
    'description' => 'LBCC homepage shell demo built on the shared front-end foundation.'
];

$audiences = [
    ['title' => 'New to College', 'copy' => 'Start with advising, admissions, and a clear first-semester path.', 'href' => '#get-started'],
    ['title' => 'Career Education', 'copy' => 'Build practical momentum with workforce-ready programs.', 'href' => '#programs'],
    ['title' => 'Returning Students', 'copy' => 'Pick back up with support that respects work, family, and life.', 'href' => '/current-students.php#plan-register'],
    ['title' => 'Transfer Students', 'copy' => 'Map the next step toward a university with purpose.', 'href' => '#programs'],
    ['title' => 'Dual Enrollment', 'copy' => 'Create an early college start without losing flexibility.', 'href' => '#get-started'],
    ['title' => 'Adult Learners', 'copy' => 'Find re-entry paths built for new goals and changing timelines.', 'href' => '#support'],
    ['title' => 'International Students', 'copy' => 'Navigate admissions, community, and campus life with clarity.', 'href' => '#get-started'],
    ['title' => 'Dreamer Students', 'copy' => 'See support pathways that meet you where you are.', 'href' => '#support']
];

$programCategories = [
    ['label' => 'Transfer Degrees', 'description' => 'Designed to move students confidently toward CSU and UC pathways.'],
    ['label' => 'Career & Technical Education', 'description' => 'Hands-on programs tied to real industries, equipment, and outcomes.'],
    ['label' => 'Bachelor’s Degrees', 'description' => 'Applied degree options for students ready to build further without leaving LBCC.'],
    ['label' => 'Certificates', 'description' => 'Fast-moving credentials that help students sharpen and show in-demand skills.']
];

$supportAreas = [
    ['icon' => 'fa-sharp fa-solid fa-comments', 'title' => 'Counseling', 'copy' => 'Build a plan that matches your pace, responsibilities, and goals.'],
    ['icon' => 'fa-sharp fa-solid fa-heart', 'title' => 'Basic Needs', 'copy' => 'Food, housing, and resource support are treated as part of success, not side issues.'],
    ['icon' => 'fa-sharp fa-solid fa-wallet', 'title' => 'Financial Aid', 'copy' => 'Scholarships, aid, and payment guidance are surfaced early and often.'],
    ['icon' => 'fa-sharp fa-solid fa-book-open', 'title' => 'Academic Support', 'copy' => 'Tutoring and learning support are visible, simple to reach, and easy to revisit.']
];

$stats = [
    ['value' => '38,695', 'label' => 'students served across one of California’s most diverse college communities'],
    ['value' => '70+', 'label' => 'academic and career programs built for transfer, work, and advancement'],
    ['value' => '2', 'label' => 'campuses connected by one system of support, momentum, and belonging']
];

$newsItems = [
    ['type' => 'News', 'title' => 'LBCC opens a new applied-technology space built around student futures.', 'meta' => 'February 25, 2026'],
    ['type' => 'Feature', 'title' => 'A homepage shell that keeps urgency, warmth, and clarity in balance.', 'meta' => 'Design system preview'],
    ['type' => 'Spotlight', 'title' => 'Program pathways now read as invitations instead of bureaucratic categories.', 'meta' => 'Content strategy']
];

$events = [
    ['title' => 'Using AI as Your Research Assistant', 'meta' => 'March 11, 2026 · 12:00 PM - 1:00 PM'],
    ['title' => 'Dual Enrollment Registration Lab', 'meta' => 'March 11, 2026 · Online & in person'],
    ['title' => 'Orientation and Next Steps for LBCC', 'meta' => 'March 11, 2026 · Virtual workshop']
];
?>
<!DOCTYPE html>
<html lang="en">
<?php lbcc_head($page); ?>
<body class="lbcc-page lbcc-homepage">
<?php include __DIR__ . '/_resources/includes/header.php'; ?>
<main id="main-content">
    <section class="home-hero">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-7">
                    <p class="eyebrow mb-3">We Are Long Beach City College</p>
                    <h1 class="home-hero-title">A place to start strong and go further than you thought possible.</h1>
                    <p class="home-hero-copy">Rooted in Long Beach. Built for what comes next. This homepage shell is designed to feel energetic, direct, and genuinely student-centered without losing the structure an editor-friendly CMS needs.</p>
                    <div class="d-flex flex-wrap gap-3 mt-4">
                        <a class="btn btn-primary btn-lg" href="#get-started">Get Started</a>
                        <a class="btn btn-outline-secondary btn-lg" href="<?php echo lbcc_escape(lbcc_url('/current-students.php')); ?>">Current Students</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <aside class="hero-story">
                        <p class="eyebrow mb-2">Featured Story</p>
                        <h2 class="h3 mb-3">Support isn’t extra. It’s expected.</h2>
                        <p class="mb-0 text-body-secondary">The first shell already leans into a warmer, more human tone, while keeping content blocks reusable and easy to reshape as real LBCC copy comes in.</p>
                    </aside>
                </div>
            </div>

            <div class="hero-marquee mt-5">
                <span>Latest</span>
                <a href="#news-events">Women’s History Month</a>
                <a href="#news-events">Performing Arts Center Ceremony</a>
                <a href="#programs">8-Week Classes</a>
                <a href="#get-started">Viking Preview Day</a>
            </div>
        </div>
    </section>

    <section id="audiences" class="section-shell">
        <div class="container">
            <div class="section-heading">
                <div>
                    <p class="eyebrow mb-2">You Belong Here</p>
                    <h2>You don’t have to have it all figured out. Just take the first step.</h2>
                </div>
                <p class="section-copy">No matter where a student is coming from, the shell should suggest momentum, choice, and support rather than forcing everyone through the same narrow narrative.</p>
            </div>
            <div class="row g-3">
                <?php foreach ($audiences as $audience) { ?>
                    <div class="col-sm-6 col-xl-3">
                        <a class="audience-card" href="<?php echo lbcc_escape(lbcc_url($audience['href'])); ?>">
                            <span class="audience-card-icon fa-sharp fa-regular fa-arrow-right" aria-hidden="true"></span>
                            <h3 class="h5"><?php echo lbcc_escape($audience['title']); ?></h3>
                            <p class="mb-0 text-body-secondary"><?php echo lbcc_escape($audience['copy']); ?></p>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section id="programs" class="section-shell section-shell-accent">
        <div class="container">
            <div class="row g-4 align-items-start">
                <div class="col-lg-5">
                    <p class="eyebrow mb-2">Explore Our Programs</p>
                    <h2>With more than 70 programs, this is where momentum starts.</h2>
                    <p class="section-copy mb-4">The program area combines plain-language wayfinding, category grouping, and search affordances so it can scale without feeling bureaucratic.</p>
                    <div class="program-search-card">
                        <label class="form-label" for="program-search">Search programs at LBCC</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text"><span class="fa-sharp fa-regular fa-magnifying-glass" aria-hidden="true"></span></span>
                            <input id="program-search" class="form-control" type="search" placeholder="Psychology, Welding, Nursing...">
                            <button class="btn btn-secondary" type="button">Search</button>
                        </div>
                    </div>
                </div>
                <div id="program-categories" class="col-lg-7">
                    <div class="row g-3">
                        <?php foreach ($programCategories as $category) { ?>
                            <div class="col-md-6">
                                <article class="program-card">
                                    <p class="eyebrow mb-2">Program Pathway</p>
                                    <h3 class="h4"><?php echo lbcc_escape($category['label']); ?></h3>
                                    <p class="mb-0 text-body-secondary"><?php echo lbcc_escape($category['description']); ?></p>
                                </article>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="support" class="section-shell">
        <div class="container">
            <div class="section-heading">
                <div>
                    <p class="eyebrow mb-2">We Get You. We’ve Got You.</p>
                    <h2>Support should feel visible, human, and built into the experience.</h2>
                </div>
                <p class="section-copy">These blocks can later evolve into linked modules or CMS snippets, but the shared pattern already handles icons, varied copy lengths, and multiple instances.</p>
            </div>
            <div class="row g-4">
                <?php foreach ($supportAreas as $area) { ?>
                    <div class="col-md-6 col-xl-3">
                        <article class="support-card h-100">
                            <span class="support-card-icon <?php echo lbcc_escape($area['icon']); ?>" aria-hidden="true"></span>
                            <h3 class="h5"><?php echo lbcc_escape($area['title']); ?></h3>
                            <p class="mb-0 text-body-secondary"><?php echo lbcc_escape($area['copy']); ?></p>
                        </article>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="section-shell section-shell-contrast">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-6">
                    <article class="quote-panel h-100">
                        <p class="eyebrow mb-3">Why Study at LBCC</p>
                        <blockquote class="mb-4">“As a non-English speaker, LBCC expanded my vision and helped me adapt, grow, and become a stronger student.”</blockquote>
                        <div class="d-flex flex-wrap gap-4 text-body-secondary">
                            <span>Hong Sodalis</span>
                            <span>Registered Nursing</span>
                            <span>Phnom Penh, Cambodia</span>
                        </div>
                    </article>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        <?php foreach ($stats as $stat) { ?>
                            <div class="col-md-4 col-lg-12 col-xl-4">
                                <article class="stat-card h-100">
                                    <div class="stat-value"><?php echo lbcc_escape($stat['value']); ?></div>
                                    <p class="mb-0 text-body-secondary"><?php echo lbcc_escape($stat['label']); ?></p>
                                </article>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="news-events" class="section-shell">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="section-heading mb-4">
                        <div>
                            <p class="eyebrow mb-2">News</p>
                            <h2>Stories that make the institution feel active and current.</h2>
                        </div>
                    </div>
                    <div class="vstack gap-3">
                        <?php foreach ($newsItems as $item) { ?>
                            <article class="feed-card">
                                <p class="eyebrow mb-2"><?php echo lbcc_escape($item['type']); ?></p>
                                <h3 class="h5 mb-2"><?php echo lbcc_escape($item['title']); ?></h3>
                                <p class="mb-0 text-body-secondary"><?php echo lbcc_escape($item['meta']); ?></p>
                            </article>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-heading mb-4">
                        <div>
                            <p class="eyebrow mb-2">Events</p>
                            <h2>Event cards stay compact, readable, and repeatable.</h2>
                        </div>
                    </div>
                    <div class="vstack gap-3">
                        <?php foreach ($events as $event) { ?>
                            <article class="feed-card">
                                <h3 class="h5 mb-2"><?php echo lbcc_escape($event['title']); ?></h3>
                                <p class="mb-0 text-body-secondary"><?php echo lbcc_escape($event['meta']); ?></p>
                            </article>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="get-started" class="section-shell">
        <div class="container">
            <div class="cta-band">
                <div>
                    <p class="eyebrow mb-2">Get Started at LBCC</p>
                    <h2 class="mb-2">Use this shell to prove out hierarchy, pacing, and editorial flexibility.</h2>
                    <p class="mb-0 text-body-secondary">From here, we can swap in real content modules, connect live data, and extend patterns without rebuilding the foundation.</p>
                </div>
                <div class="d-flex flex-wrap gap-3">
                    <a class="btn btn-primary btn-lg" href="<?php echo lbcc_escape(lbcc_url('/current-students.php')); ?>">Open Interior Hub</a>
                    <a class="btn btn-outline-secondary btn-lg" href="<?php echo lbcc_escape(lbcc_url('/App_Code/styleguide.php')); ?>">Review Style Guide</a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include __DIR__ . '/_resources/includes/footer.php'; ?>
<?php include __DIR__ . '/_resources/includes/footer-scripts.php'; ?>
</body>
</html>
