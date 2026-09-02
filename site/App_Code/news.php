<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'News',
    'description' => 'Latest LBCC news, press releases, student stories, and media updates.',
    'section_nav' => true,
    'section_nav_include' => __DIR__ . '/navs/section-nav-news.php',
    'sidenav' => false,
    'sidenav_include' => '',
    'custom_hero' => false
]);

$featuredItem = lbcc_news_featured_item();
$latestSecondaryItems = lbcc_news_archive_items(3, 1);
$moreNewsItems = lbcc_news_archive_items(5, 4);
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="<?php echo lbcc_escape(lbcc_body_classes($page)); ?>">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<?php if ($page['custom_hero']) { ?>
<?php // Include Custom Hero Component here... ?>
<?php } ?>
<main id="main-content">
    <div class="container-xxl d-grid gap-5">
        <section class="d-grid gap-4">
            <?php
            component_title_with_ctas(
                'Latest News',
                [
                    [
                        'text' => 'View All News',
                        'url' => lbcc_url('/App_Code/news-archive.php'),
                        'class' => 'btn btn-outline-secondary btn-sm'
                    ]
                ]
            );
            ?>

            <div class="row g-4 g-xl-5 align-items-start">
                <div class="col-12 col-lg-6">
                    <article class="d-grid gap-3">
                        <a href="<?php echo lbcc_escape($featuredItem['url']); ?>" class="d-block text-decoration-none">
                            <div class="ratio ratio-4x3 rounded-3 overflow-hidden bg-surface-subtle">
                                <img
                                    src="<?php echo lbcc_escape(lbcc_url($featuredItem['image'])); ?>"
                                    alt=""
                                    class="w-100 h-100 object-fit-cover"
                                >
                            </div>
                        </a>

                        <div class="d-grid gap-3">
                            <a href="<?php echo lbcc_escape($featuredItem['url']); ?>" class="text-decoration-none text-reset d-grid gap-2">
                                <h2 class="h2 fs-4xl mb-0"><?php echo lbcc_escape($featuredItem['title']); ?></h2>
                                <p class="mb-0 text-body-secondary"><?php echo lbcc_escape($featuredItem['excerpt']); ?></p>
                            </a>

                            <?php lbcc_news_render_meta($featuredItem); ?>
                        </div>
                    </article>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="d-grid">
                        <?php foreach ($latestSecondaryItems as $latestItem) {
                            lbcc_news_render_list_item($latestItem, $latestItem['excerpt'] !== '', true, true);
                        } ?>
                    </div>
                </div>
            </div>
        </section>

        <?php lbcc_news_render_stay_connected('student-in-the-loop'); ?>

        <section id="press-releases">
            <div class="row g-4 g-xl-5 align-items-start">
                <div class="col-12 col-xl-9">
                    <div class="d-grid gap-4">
                        <?php component_title_with_ctas('More News'); ?>

                        <div class="d-grid">
                            <?php foreach ($moreNewsItems as $moreNewsItem) {
                                lbcc_news_render_list_item($moreNewsItem, $moreNewsItem['excerpt'] !== '', false, !empty($moreNewsItem['image']));
                            } ?>
                        </div>

                        <nav aria-label="News pagination">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled"><span class="page-link">Previous</span></li>
                                <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                <li class="page-item"><a class="page-link" href="<?php echo lbcc_escape(lbcc_url('/App_Code/news-archive.php')); ?>">2</a></li>
                                <li class="page-item"><a class="page-link" href="<?php echo lbcc_escape(lbcc_url('/App_Code/news-archive.php')); ?>">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-12 col-xl-3">
                    <?php lbcc_news_render_sidebar(null, 'news-home-search'); ?>
                </div>
            </div>
        </section>
    </div>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
