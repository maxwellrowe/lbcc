<div class="offcanvas offcanvas-end bg-surface-sun-haze" tabindex="-1" id="offcanvas-utility-nav" aria-labelledby="offcanvas-utility-nav-label">
    <div class="offcanvas-header align-items-center bg-white border-bottom">
        <h2 class="eyebrow m-0 lh-1">My LBCC</h2>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <?php include __DIR__ . '/navigation/mobile-utility-nav.php'; ?>
    </div>
</div>

<div class="offcanvas offcanvas-end bg-surface-subtle" tabindex="-1" id="offcanvas-main-nav" aria-labelledby="offcanvas-main-nav-label">
    <div class="offcanvas-header align-items-center bg-white border-bottom">
        <h2 class="eyebrow m-0 lh-1">Explore LBCC</h2>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <div class="px-3 pt-3 pb-2">
            <?php include __DIR__ . '/search.php'; ?>
        </div>
        <?php include __DIR__ . '/navigation/mobile-main-nav.php'; ?>
    </div>
</div>
