<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'News Archive',
    'description' => 'Archive of LBCC press releases, student stories, and campus updates.',
    'section_nav' => true,
    'section_nav_include' => __DIR__ . '/navs/section-nav-news.php',
    'sidenav' => false,
    'sidenav_include' => '',
    'custom_hero' => false
]);

$archiveItems = lbcc_news_archive_items();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="lbcc-page">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<?php if ($page['custom_hero']) { ?>
<?php // Include Custom Hero Component here... ?>
<?php } ?>
<main id="main-content" class="py-5">
    <div class="container-xxl d-grid gap-5">
        <section id="news-list">
            <div class="row g-4 g-xl-5 align-items-start">
                <div class="col-12 col-xl-9">
                    <div class="d-grid">
                        <?php foreach ($archiveItems as $archiveItem) {
                            lbcc_news_render_list_item($archiveItem, $archiveItem['excerpt'] !== '', false, !empty($archiveItem['image']));
                        } ?>
                    </div>

                    <nav class="pt-4" aria-label="Archive pagination">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled"><span class="page-link">Previous</span></li>
                            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-12 col-xl-3">
                    <?php
                    lbcc_news_render_sidebar(
                        [
                            'text' => 'View Latest News',
                            'url' => lbcc_url('/App_Code/news.php')
                        ],
                        'news-archive-search'
                    );
                    ?>
                </div>
            </div>
        </section>

        <?php lbcc_news_render_stay_connected('student-in-the-loop'); ?>
    </div>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
