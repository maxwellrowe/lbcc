<?php

$config = lbcc_site_config();
$wordmark = lbcc_url($config['logo_wordmark']);
$logoMark = lbcc_url($config['logo_mark']);
?>
<a class="visually-hidden-focusable skip-link" href="#main-content">Skip to main content</a>
<header class="site-header bg-white">
    <div class="container-xxl">
        <div class="site-header-top d-flex align-items-center justify-content-between gap-4">
            <a class="site-brand py-2 py-md-3" href="<?php echo lbcc_escape(lbcc_url('/')); ?>">
                <img class="site-brand-mark d-md-none" src="<?php echo lbcc_escape($logoMark); ?>" alt="" aria-hidden="true">
                <img class="site-brand-logo d-none d-md-block" src="<?php echo lbcc_escape($wordmark); ?>" alt="<?php echo lbcc_escape($config['site_name']); ?>">
            </a> 
            <nav class="navbar navbar-expand-lg site-header-main px-0 py-3 py-lg-4 py-xl-0 w-100 justify-content-end flex-wrap" aria-label="Primary">
                <div class="site-mobile-actions d-flex align-items-center gap-4 d-xl-none">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block">Apply Now</a>
                    <button 
                        type="button" 
                        class="site-mobile-utility-button d-flex align-items-center justify-content-start gap-2 btn btn-link ms-0 ms-md-4" 
                        aria-label="Toggle Utility Navigation"
                        data-bs-toggle="offcanvas" 
                        data-bs-target="#offcanvas-utility-nav" 
                        aria-controls="offcanvas-utility-nav"
                    >
                        <span class="fa-sharp fa-regular fa-user" aria-hidden="true"></span>
                        <span class="site-mobile-utility-label">MyLBCC</span>
                        <span class="fa-sharp fa-regular fa-angle-down" aria-hidden="true"></span>
                    </button>
                    <button 
                        type="button" 
                        class="site-mobile-utility-button d-flex align-items-center justify-content-start text-start gap-0 btn btn-link ms-0 ms-md-4" 
                        aria-label="Toggle Main Navigation"
                        data-bs-toggle="offcanvas" 
                        data-bs-target="#offcanvas-main-nav" 
                        aria-controls="offcanvas-main-nav"
                    >
                        <span class="site-mobile-utility-label me-2">Explore <br>LBCC</span>
                        <span class="menu-bars" aria-hidden="true">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </span>
                        <span class="fa-sharp fa-regular fa-search" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="site-desktop-utility-nav d-none d-xl-block w-100">    
                    <?php include __DIR__ . '/navigation/utility-nav.php'; ?>
                </div>
                <div class="site-desktop-actions d-none d-xl-flex align-items-center gap-4">
                    <?php
                    $lbccMainNavId = 'lbcc-main-nav-desktop';
                    $lbccMainNavContext = 'desktop';
                    $lbccMainNavItemPrefix = 'lbcc-main-nav-desktop-item';
                    ?>
                    <?php include __DIR__ . '/navigation/main-nav.php'; ?>
                    <?php
                    unset($lbccMainNavId, $lbccMainNavContext, $lbccMainNavItemPrefix);
                    ?>
                    <button 
                        class="lbcc-main-nav__btn site-search-button" 
                        aria-label="Search"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#site-desktop-search"
                        aria-expanded="false"
                        aria-controls="site-desktop-search"
                    >
                        <span class="fa-sharp fa-regular fa-magnifying-glass" aria-hidden="true"></span>
                    </button>
                    <div class="lbcc-main-nav__item collapse bg-surface-sun-haze" id="site-desktop-search">
                        <div class="container-xxl">
                            <div class="row">
                                <div class="col-12">
                                    <?php include __DIR__ . '/search.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary" href="<?php echo lbcc_escape(lbcc_url('/')); ?>">Apply Now</a>
                </div>
            </nav>
        </div>
    </div>
</header>

<?php // Section Nav Include
    include __DIR__ . '/navigation/section-nav.php'; 
?>

<?php // Hero Include
    include __DIR__ . '/hero.php'; 
?>