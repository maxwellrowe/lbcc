<?php
$config = lbcc_site_config();
$wordmark = lbcc_url($config['logo_wordmark']);
?>
<footer class="site-footer mt-5 pt-5 text-white">
    <div class="container-xxl">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between gap-4 pb-4 border-bottom border-white border-opacity-10">
            <a class="d-inline-flex align-items-center" href="<?php echo lbcc_escape(lbcc_url('/')); ?>">
                <img class="footer-wordmark-logo img-fluid" src="<?php echo lbcc_escape($wordmark); ?>" alt="<?php echo lbcc_escape($config['site_name']); ?>">
            </a>
            <?php component_footer_i_heart_lb(); ?>
        </div>

        <div class="d-flex flex-wrap gap-3 py-4">
            <?php include __DIR__ . '/navigation/social-media.php'; ?>
        </div>

        <div class="row g-4 g-xl-5 pb-4">
            <div class="col-lg-5 col-xl-4">
                <p class="eyebrow-sm text-white-50 mb-3">Our Campuses</p>
                <div class="vstack gap-3">
                    <article>
                        <h3 class="h6 mb-2 text-white">Trades, Technology, and Community Learning Campus <span class="text-white-50">(TTC)</span></h3>
                        <p class="mb-1 text-white-50">1305 E. Pacific Coast Highway, Long Beach, CA 90806</p>
                        <p class="mb-0"><a class="link-light text-decoration-none" href="tel:5629384111">(562) 938-4111</a></p>
                    </article>
                    <article>
                        <h3 class="h6 mb-2 text-white">Liberal Arts Campus <span class="text-white-50">(LAC)</span></h3>
                        <p class="mb-1 text-white-50">4901 East Carson St., Long Beach, CA 90808</p>
                        <p class="mb-0"><a class="link-light text-decoration-none" href="tel:5629384111">(562) 938-4111</a></p>
                    </article>
                </div>
            </div>

            <div class="col-6 col-lg-2">
                <p class="eyebrow-sm text-white-50 mb-3">College</p>
                <ul class="list-unstyled vstack gap-2 mb-0">
                    <li><a class="link-light text-decoration-none" href="#">Accreditation</a></li>
                    <li><a class="link-light text-decoration-none" href="#">Office of the President</a></li>
                    <li><a class="link-light text-decoration-none" href="#">Shared Governance</a></li>
                    <li><a class="link-light text-decoration-none" href="#">Careers at LBCC</a></li>
                </ul>
            </div>

            <div class="col-6 col-lg-2">
                <p class="eyebrow-sm text-white-50 mb-3">Resources</p>
                <ul class="list-unstyled vstack gap-2 mb-0">
                    <li><a class="link-light text-decoration-none" href="<?php echo lbcc_escape(lbcc_url('/App_Code/support.php')); ?>">Student Support</a></li>
                    <li><a class="link-light text-decoration-none" href="<?php echo lbcc_escape(lbcc_url('/App_Code/news.php')); ?>">Calendars &amp; Events</a></li>
                    <li><a class="link-light text-decoration-none" href="#">Class Schedule</a></li>
                    <li><a class="link-light text-decoration-none" href="<?php echo lbcc_escape(lbcc_url('/App_Code/directory.php')); ?>">Directory</a></li>
                    <li><a class="link-light text-decoration-none" href="#">Campus Maps</a></li>
                    <li><a class="link-light text-decoration-none" href="#">Campus Safety</a></li>
                </ul>
            </div>

            <div class="col-6 col-lg-2">
                <p class="eyebrow-sm text-white-50 mb-3">Community</p>
                <ul class="list-unstyled vstack gap-2 mb-0">
                    <li><a class="link-light text-decoration-none" href="<?php echo lbcc_escape(lbcc_url('/App_Code/homepage.php')); ?>">Homepage</a></li>
                    <li><a class="link-light text-decoration-none" href="#">Faculty &amp; Staff</a></li>
                    <li><a class="link-light text-decoration-none" href="#">Community</a></li>
                    <li><a class="link-light text-decoration-none" href="#">Alumni</a></li>
                </ul>
            </div>

            <div class="col-12 col-lg-2">
                <div class="d-grid gap-2">
                    <a class="btn btn-outline-light w-100" href="#">Viking Portal</a>
                    <a class="btn btn-outline-light w-100" href="#">Canvas</a>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center gap-3 pt-4 border-top border-white border-opacity-10 small text-white-50">
            <div class="d-flex flex-wrap gap-3">
                <a class="link-light text-decoration-none" href="#">Accessibility Statement</a>
                <a class="link-light text-decoration-none" href="#">DSPS Grievance Process</a>
                <a class="link-light text-decoration-none" href="#">Student Complaints &amp; Grievances</a>
                <a class="link-light text-decoration-none" href="#">Unsubscribe/Opt-Out</a>
            </div>
            <p class="mb-0">&copy; <?php echo date('Y'); ?> Long Beach City College. All Rights Reserved.</p>
        </div>
    </div>
</footer>
