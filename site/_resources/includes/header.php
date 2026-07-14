<?php
require __DIR__ . '/main-navigation.php';

$config = lbcc_site_config();
$wordmark = lbcc_url($config['logo_wordmark']);
$logoMark = lbcc_url($config['logo_mark']);
?>
<a class="visually-hidden-focusable skip-link" href="#main-content">Skip to main content</a>
<header class="site-header">
    <div class="container">
        <div class="site-header-top d-none d-xl-flex align-items-center justify-content-between gap-4 py-3">
            <a class="site-brand site-brand-desktop" href="<?php echo lbcc_escape(lbcc_url('/')); ?>">
                <img class="site-brand-mark" src="<?php echo lbcc_escape($logoMark); ?>" alt="" aria-hidden="true">
                <img class="site-brand-logo" src="<?php echo lbcc_escape($wordmark); ?>" alt="<?php echo lbcc_escape($config['site_name']); ?>">
            </a>

            <div class="site-utility-pill">
                <div class="dropdown">
                    <button class="utility-pill-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="fa-sharp fa-regular fa-user" aria-hidden="true"></span>
                        Info For...
                    </button>
                    <ul class="dropdown-menu">
                        <?php foreach ($infoForLinks as $link) { ?>
                            <li><a class="dropdown-item" href="<?php echo lbcc_escape(lbcc_url($link['href'])); ?>"><?php echo lbcc_escape($link['label']); ?></a></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="dropdown">
                    <button class="utility-pill-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="fa-sharp fa-regular fa-language" aria-hidden="true"></span>
                        EN
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Translate Site</a></li>
                    </ul>
                </div>

                <?php foreach ($campusLinks as $campus) { ?>
                    <a class="utility-pill-chip" href="<?php echo lbcc_escape(lbcc_url($campus['href'])); ?>"><?php echo lbcc_escape($campus['label']); ?></a>
                <?php } ?>

                <?php foreach ($utilityLinks as $link) { ?>
                    <a class="utility-pill-link" href="<?php echo lbcc_escape(lbcc_url($link['href'])); ?>">
                        <span class="<?php echo lbcc_escape($link['icon']); ?>" aria-hidden="true"></span>
                        <?php echo lbcc_escape($link['label']); ?>
                    </a>
                <?php } ?>

                <div class="dropdown">
                    <button class="utility-pill-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Log In
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <?php foreach ($loginLinks as $link) { ?>
                            <li><a class="dropdown-item" href="<?php echo lbcc_escape(lbcc_url($link['href'])); ?>"><?php echo lbcc_escape($link['label']); ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-xl site-header-main px-0 py-3 py-xl-2" aria-label="Primary">
            <a class="site-brand site-brand-mobile d-xl-none" href="<?php echo lbcc_escape(lbcc_url('/')); ?>">
                <img class="site-brand-mark" src="<?php echo lbcc_escape($logoMark); ?>" alt="" aria-hidden="true">
                <span class="site-brand-mobile-text">
                    <img class="site-brand-logo" src="<?php echo lbcc_escape($wordmark); ?>" alt="<?php echo lbcc_escape($config['site_name']); ?>">
                </span>
            </a>

            <div class="site-mobile-actions d-xl-none ms-auto">
                <div class="dropdown">
                    <button class="site-mobile-action dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Log In
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <?php foreach ($loginLinks as $link) { ?>
                            <li><a class="dropdown-item" href="<?php echo lbcc_escape(lbcc_url($link['href'])); ?>"><?php echo lbcc_escape($link['label']); ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <span class="site-mobile-label">Explore LBCC</span>
                <button class="navbar-toggler site-nav-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#lbcc-primary-nav" aria-controls="lbcc-primary-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa-sharp fa-regular fa-bars" aria-hidden="true"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="lbcc-primary-nav">
                <div class="site-mobile-panel d-xl-none">
                    <form class="site-mobile-search" role="search">
                        <label class="visually-hidden" for="site-mobile-search-input">Ask a question or search</label>
                        <div class="input-group">
                            <span class="input-group-text"><span class="fa-sharp fa-regular fa-magnifying-glass" aria-hidden="true"></span></span>
                            <input id="site-mobile-search-input" class="form-control" type="search" placeholder="Ask a question/ search">
                            <button class="btn btn-outline-secondary" type="button" aria-label="Open search filters">
                                <span class="fa-sharp fa-regular fa-chevron-down" aria-hidden="true"></span>
                            </button>
                        </div>
                    </form>

                    <div class="site-mobile-portal-links">
                        <?php foreach ($loginLinks as $link) { ?>
                            <a class="site-mobile-portal-link" href="<?php echo lbcc_escape(lbcc_url($link['href'])); ?>"><?php echo lbcc_escape($link['label']); ?></a>
                        <?php } ?>
                    </div>

                    <div class="site-mobile-infofor">
                        <p class="eyebrow mb-2">Info For...</p>
                        <?php foreach ($infoForLinks as $link) { ?>
                            <a class="site-mobile-infofor-link" href="<?php echo lbcc_escape(lbcc_url($link['href'])); ?>"><?php echo lbcc_escape($link['label']); ?></a>
                        <?php } ?>
                    </div>
                </div>

                <ul class="navbar-nav site-nav-list mx-xl-auto align-items-xl-center">
                    <?php foreach ($primaryLinks as $index => $item) {
                        $hasChildren = !empty($item['children']);
                        $isCurrent = lbcc_is_current_path($item['href']);
                        $collapseId = 'site-nav-panel-' . $index;
                        ?>
                        <li class="nav-item site-nav-item <?php echo $hasChildren ? 'dropdown' : ''; ?>">
                            <a
                                class="nav-link site-nav-link d-none d-xl-inline-flex <?php echo $hasChildren ? 'dropdown-toggle' : ''; ?> <?php echo $isCurrent ? 'active' : ''; ?>"
                                href="<?php echo lbcc_escape(lbcc_url($item['href'])); ?>"
                                <?php if ($hasChildren) { ?>
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                <?php } ?>
                            >
                                <?php echo lbcc_escape($item['label']); ?>
                            </a>

                            <button
                                class="site-mobile-section-toggle d-xl-none"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#<?php echo lbcc_escape($collapseId); ?>"
                                aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                                aria-controls="<?php echo lbcc_escape($collapseId); ?>"
                            >
                                <span><?php echo lbcc_escape($item['label']); ?></span>
                                <span class="fa-sharp fa-regular <?php echo $index === 0 ? 'fa-xmark' : 'fa-plus'; ?>" aria-hidden="true"></span>
                            </button>

                            <?php if ($hasChildren) { ?>
                                <ul class="dropdown-menu">
                                    <?php foreach ($item['children'] as $child) { ?>
                                        <li><a class="dropdown-item" href="<?php echo lbcc_escape(lbcc_url($child['href'])); ?>"><?php echo lbcc_escape($child['label']); ?></a></li>
                                    <?php } ?>
                                </ul>

                                <div id="<?php echo lbcc_escape($collapseId); ?>" class="collapse site-mobile-section-body <?php echo $index === 0 ? 'show' : ''; ?>">
                                    <?php if (!empty($item['mobile_intro'])) { ?>
                                        <article class="site-mobile-feature">
                                            <p class="eyebrow mb-2"><?php echo lbcc_escape($item['mobile_intro']['eyebrow']); ?></p>
                                            <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                                                <a class="btn btn-secondary" href="<?php echo lbcc_escape(lbcc_url($item['mobile_intro']['primary_href'])); ?>">
                                                    <?php echo lbcc_escape($item['mobile_intro']['title']); ?>
                                                </a>
                                                <a class="site-mobile-feature-arrow" href="<?php echo lbcc_escape(lbcc_url($item['mobile_intro']['primary_href'])); ?>" aria-label="<?php echo lbcc_escape($item['mobile_intro']['title']); ?>">
                                                    <span class="fa-sharp fa-regular fa-arrow-right" aria-hidden="true"></span>
                                                </a>
                                            </div>
                                            <a class="site-mobile-inline-link" href="<?php echo lbcc_escape(lbcc_url($item['mobile_intro']['secondary_href'])); ?>">
                                                <?php echo lbcc_escape($item['mobile_intro']['secondary_label']); ?>
                                            </a>
                                        </article>
                                    <?php } ?>

                                    <?php if (!empty($item['groups'])) { ?>
                                        <?php foreach ($item['groups'] as $group) { ?>
                                            <div class="site-mobile-link-group">
                                                <p class="eyebrow mb-2"><?php echo lbcc_escape($group['title']); ?></p>
                                                <ul class="list-unstyled mb-0">
                                                    <?php foreach ($group['links'] as $child) { ?>
                                                        <li><a class="site-mobile-inline-link" href="<?php echo lbcc_escape(lbcc_url($child['href'])); ?>"><?php echo lbcc_escape($child['label']); ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <ul class="list-unstyled site-mobile-plain-links mb-0">
                                            <?php foreach ($item['children'] as $child) { ?>
                                                <li><a class="site-mobile-inline-link" href="<?php echo lbcc_escape(lbcc_url($child['href'])); ?>"><?php echo lbcc_escape($child['label']); ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ul>

                <div class="site-desktop-actions d-none d-xl-flex align-items-center">
                    <a class="site-search-button" href="#" aria-label="Search">
                        <span class="fa-sharp fa-regular fa-magnifying-glass" aria-hidden="true"></span>
                    </a>
                    <a class="btn btn-primary" href="<?php echo lbcc_escape(lbcc_url('/#get-started')); ?>">Apply Now</a>
                </div>

                <div class="site-mobile-panel d-xl-none">
                    <div class="site-mobile-campus-card">
                        <p class="eyebrow mb-2">Our Campuses</p>
                        <?php foreach ($campusLinks as $campus) { ?>
                            <a class="site-mobile-campus-link" href="<?php echo lbcc_escape(lbcc_url($campus['href'])); ?>">
                                <span><?php echo lbcc_escape($campus['label']); ?></span>
                                <span class="fa-sharp fa-regular fa-arrow-right" aria-hidden="true"></span>
                            </a>
                        <?php } ?>
                    </div>

                    <div class="site-mobile-utility-grid">
                        <?php foreach ($mobileQuickLinks as $link) { ?>
                            <a class="site-mobile-utility-card" href="<?php echo lbcc_escape(lbcc_url($link['href'])); ?>">
                                <span class="<?php echo lbcc_escape($link['icon']); ?>" aria-hidden="true"></span>
                                <span><?php echo lbcc_escape($link['label']); ?></span>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
