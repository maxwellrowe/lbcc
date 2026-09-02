<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$article = lbcc_news_featured_item();
$page = lbcc_resolve_page([
    'title' => $article['title'],
    'description' => $article['excerpt'],
    'section_nav' => true,
    'section_nav_include' => __DIR__ . '/navs/section-nav-news.php',
    'sidenav' => false,
    'sidenav_include' => '',
    'custom_hero' => true
]);

$articleUrl = lbcc_url('/App_Code/news-single.php');
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="<?php echo lbcc_escape(lbcc_body_classes($page)); ?>">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<div class="bg-water-gradient page-hero">
    <div class="container-xxl py-4">
        <nav class="breadcrumbs" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo lbcc_escape(lbcc_url('/App_Code/index.php')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo lbcc_escape(lbcc_url('/App_Code/news.php')); ?>">News</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo lbcc_escape($article['title']); ?></li>
            </ol>
        </nav>
    </div>
</div>
<main id="main-content">
    <div class="container-xxl d-grid gap-5">
        <section>
            <div class="row g-4 g-xl-5 align-items-start">
                <div class="col-12 col-xl-9">
                    <div class="mx-xl-auto" style="max-width: 760px;">
                        <div class="d-grid gap-4">
                            <?php lbcc_news_render_meta($article); ?>

                            <div class="d-grid gap-3">
                                <h1 class="mb-0 fs-5xl"><?php echo lbcc_escape($article['title']); ?></h1>
                                <p class="lead mb-0"><?php echo lbcc_escape($article['excerpt']); ?></p>
                            </div>

                            <?php lbcc_news_render_share_links($articleUrl, $article['title']); ?>

                            <figure class="figure mb-0 d-grid gap-0 bg-surface-subtle rounded-3 overflow-hidden">
                                <img
                                    src="<?php echo lbcc_escape(lbcc_url($article['image'])); ?>"
                                    alt=""
                                    class="figure-img img-fluid mb-0 w-100"
                                >
                                <?php if (!empty($article['caption'])) { ?>
                                    <figcaption class="figure-caption mb-0 p-3"><?php echo lbcc_escape($article['caption']); ?></figcaption>
                                <?php } ?>
                            </figure>

                            <div class="d-grid gap-4">
                                <?php foreach ($article['body'] as $paragraph) { ?>
                                    <p class="mb-0"><?php echo lbcc_escape($paragraph); ?></p>
                                <?php } ?>
                            </div>

                            <?php lbcc_news_render_share_links($articleUrl, $article['title']); ?>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-3">
                    <?php
                    lbcc_news_render_sidebar(
                        [
                            'text' => 'Back to News',
                            'url' => lbcc_url('/App_Code/news.php')
                        ],
                        'news-single-search'
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
