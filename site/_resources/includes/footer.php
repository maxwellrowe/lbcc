<?php
require __DIR__ . '/footer-navigation.php';

$config = lbcc_site_config();
$wordmark = lbcc_url($config['logo_wordmark']);
?>
<footer class="site-footer mt-5">
    <div class="container">
        <div class="site-footer-top">
            <a class="footer-wordmark" href="<?php echo lbcc_escape(lbcc_url('/')); ?>">
                <img class="footer-wordmark-logo" src="<?php echo lbcc_escape($wordmark); ?>" alt="<?php echo lbcc_escape($config['site_name']); ?>">
            </a>
            <div class="footer-love-lockup" aria-label="I love LB">
                <span>I</span>
                <span class="footer-love-heart">&hearts;</span>
                <span>LB</span>
            </div>
        </div>

        <div class="footer-social-row">
            <?php foreach ($socialLinks as $link) { ?>
                <a class="footer-social-link" href="<?php echo lbcc_escape($link['href']); ?>" aria-label="<?php echo lbcc_escape($link['label']); ?>">
                    <span class="<?php echo lbcc_escape($link['icon']); ?>" aria-hidden="true"></span>
                </a>
            <?php } ?>
        </div>

        <div class="row g-4 g-xl-5 footer-main-grid">
            <div class="col-lg-5 col-xl-4">
                <p class="footer-kicker">Our Campuses</p>
                <div class="vstack gap-3">
                    <?php foreach ($campuses as $campus) { ?>
                        <article class="footer-campus">
                            <h3 class="h6 mb-2"><?php echo lbcc_escape($campus['name']); ?> <span>(<?php echo lbcc_escape($campus['short_name']); ?>)</span></h3>
                            <p class="mb-1"><?php echo lbcc_escape($campus['address']); ?></p>
                            <p class="mb-0"><a href="tel:<?php echo lbcc_escape(preg_replace('/[^0-9]/', '', $campus['phone'])); ?>"><?php echo lbcc_escape($campus['phone']); ?></a></p>
                        </article>
                    <?php } ?>
                </div>
            </div>

            <?php foreach ($footerGroups as $group) { ?>
                <div class="col-6 col-lg-2">
                    <p class="footer-kicker"><?php echo lbcc_escape($group['title']); ?></p>
                    <ul class="list-unstyled footer-link-list mb-0">
                        <?php foreach ($group['links'] as $link) { ?>
                            <li><a href="<?php echo lbcc_escape(lbcc_url($link['href'])); ?>"><?php echo lbcc_escape($link['label']); ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <div class="col-12 col-lg-2">
                <div class="footer-action-pills">
                    <?php foreach ($footerActionLinks as $link) { ?>
                        <a class="btn btn-outline-light footer-action-link" href="<?php echo lbcc_escape(lbcc_url($link['href'])); ?>"><?php echo lbcc_escape($link['label']); ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="site-footer-meta">
            <div class="footer-legal-links">
                <?php foreach ($footerLegalLinks as $link) { ?>
                    <a href="<?php echo lbcc_escape(lbcc_url($link['href'])); ?>"><?php echo lbcc_escape($link['label']); ?></a>
                <?php } ?>
            </div>
            <p class="mb-0">&copy; <?php echo date('Y'); ?> Long Beach City College. All Rights Reserved.</p>
        </div>
    </div>
</footer>
