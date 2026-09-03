<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Search LBCC',
    'description' => 'Search the Long Beach City College website.',
    'section_nav' => false,
    'section_nav_include' => '',
    'sidenav' => false,
    'sidenav_include' => '',
    'custom_hero' => false
]);

$searchResults = array_fill(0, 8, [
    'title' => 'Page Title - Lorem ipsum dolor sit amet, consectetur adipiscing elit',
    'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam velit dui, dignissim eu elementum dapibus, iaculis et orci. Sed eget viverra tellus. Curabitur ut nunc velit. Aliquam eget felis rutrum nisi feugiat convallis vel malesuada risus.',
    'url' => 'https://lbcc.edu/page-url'
]);
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
    <div class="container-xxl d-grid gap-5 mb-5">
        <section aria-label="Site search">
            <form action="#" method="get">
                <div class="row g-3 align-items-end">
                    <div class="col">
                        <label for="site-search" class="form-label fw-semibold">Search the LBCC Site</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-transparent border-end-0 text-primary" aria-hidden="true">
                                <span class="fa-sharp fa-regular fa-magnifying-glass"></span>
                            </span>
                            <input id="site-search" class="form-control border-start-0 ps-0" type="search" name="q" value="admissions" aria-label="Search the LBCC Site">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary btn-lg" type="submit">Search</button>
                    </div>
                </div>

                <button class="btn btn-secondary btn-sm rounded-2 font-label text-uppercase mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#advanced-search" aria-expanded="false" aria-controls="advanced-search">
                    <span class="fa-sharp fa-regular fa-plus me-2" aria-hidden="true"></span>Advanced Search
                </button>

                <div id="advanced-search" class="collapse mt-3">
                    <div class="card card-body rounded-3">
                        Advanced Search Fields Here...
                    </div>
                </div>
            </form>
        </section>

        <section class="bg-surface-subtle rounded-5 p-4 p-lg-5" aria-labelledby="search-results-heading">
            <header class="d-grid gap-2 mb-4">
                <h2 id="search-results-heading" class="h5 mb-0">Search Results for “admissions”</h2>
                <p class="font-label fs-sm text-body-secondary text-uppercase mb-0">Total Results: 999</p>
            </header>

            <div class="d-grid gap-4 gap-lg-5">
                <?php foreach ($searchResults as $result) { ?>
                <article class="d-grid gap-2">
                    <h3 class="h5 mb-0">
                        <a class="text-dark link-underline link-underline-opacity-100 link-underline-primary" href="#"><?php echo lbcc_escape($result['title']); ?></a>
                    </h3>
                    <p class="small text-body-secondary mb-0"><?php echo lbcc_escape($result['excerpt']); ?></p>
                    <a class="small fw-bold link-underline link-underline-opacity-100 link-underline-primary" href="#"><?php echo lbcc_escape($result['url']); ?></a>
                </article>
                <?php } ?>
            </div>

            <nav class="pt-4 pt-lg-5" aria-label="Search results pagination">
                <ul class="pagination mb-0">
                    <li class="page-item disabled"><span class="page-link" aria-hidden="true"><span class="fa-sharp fa-solid fa-arrow-left"></span></span></li>
                    <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#" aria-label="Next page"><span class="fa-sharp fa-solid fa-arrow-right" aria-hidden="true"></span></a></li>
                </ul>
            </nav>
        </section>
    </div>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
