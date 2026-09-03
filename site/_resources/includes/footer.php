<?php
$config = lbcc_site_config();
$wordmark = lbcc_url($config['logo_wordmark']);
?>
<footer class="site-footer pt-5 text-white">
    <div class="container-xxl">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between gap-4 mb-5 lbcc-animate lbcc-stagger">
            <a class="d-none d-md-inline-flex align-items-center flex-shrink-0" href="<?php echo lbcc_escape(lbcc_url('/')); ?>">
                <img class="footer-wordmark-logo img-fluid" src="<?php echo lbcc_escape($wordmark); ?>" alt="<?php echo lbcc_escape($config['site_name']); ?>">
            </a>
            <div class="border-bottom border-white border-opacity-25 flex-grow-1 d-none d-md-block"></div>
            <div class="flex-shrink-0">
                <?php component_footer_i_heart_lb(); ?>
            </div>
        </div>

        <div class="row g-5 justify-content-start justify-content-lg-between">
            <div class="col-12 col-md-4 col-lg-4">
                <div class="mb-5 lbcc-animate lbcc-fade-up lbcc-delay-300">
                    <?php component_social_media(
                        [
                            ['link' => 'https://www.tiktok.com/@longbeachcitycollege', 'icon' => 'fa-tiktok', 'sr_label' => 'LBCC on TikTok'],
                            ['link' => 'https://www.instagram.com/lbcitycollege', 'icon' => 'fa-instagram', 'sr_label' => 'LBCC on Instagram'],
                            ['link' => 'https://x.com/LBCityCollege', 'icon' => 'fa-x-twitter', 'sr_label' => 'LBCC on X'],
                            ['link' => 'https://www.facebook.com/lbcitycollege', 'icon' => 'fa-facebook', 'sr_label' => 'LBCC on Facebook'],
                            ['link' => 'https://www.youtube.com/user/LongBeachCityCollege', 'icon' => 'fa-youtube', 'sr_label' => 'LBCC on YouTube']
                        ],
                        'light',
                        'm'
                    ); ?>
                </div>

                <p class="eyebrow text-white mb-4">Our Campuses</p>
                <div class="d-flex gap-3 lbcc-animate lbcc-stagger">
                    <div>
                        <img src="../_resources/images/ttc-thumb.jpg" alt="Image of Trades, Technology and Community Learning Campus" class="rounded-circle flex-shrink-0" style="width: 4rem;" />
                    </div>
                    <div>
                        <h2 class="fs-7 text-white">Trades, Technology, and Community Learning Campus (TTC)</h2>
                        <p class="text-white fs-8">1305 E. Pacific Coast Highway<br /> Long Beach, CA 90806</p>
                        <p class="mb-0">
                            <a class="link-light fs-8" href="tel:5629384111">(562) 938-4111</a>
                        </p>
                    </div>
                </div>
                <div class="d-flex gap-3 mt-4 lbcc-animate lbcc-stagger">
                    <div>
                        <img src="../_resources/images/lac-thumb.jpg" alt="Image of Trades, Technology and Community Learning Campus" class="rounded-circle flex-shrink-0" style="width: 4rem;" />
                    </div>
                    <div>
                        <h2 class="fs-7 text-white">Liberal Arts Campus (LAC)</h2>
                        <p class="text-white fs-8">4901 East Carson St.<br /> Long Beach, CA 90808</p>
                        <p class="mb-0">
                            <a class="link-light fs-8" href="tel:5629384111">(562) 938-4111</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8 col-lg-6">
                <div class="row row-cols-1 row-cols-md-3 g-5 lbcc-animate lbcc-stagger">
                    <div class="col">
                        <ul class="list-unstyled vstack gap-2 mb-0 fs-8">
                            <li><a class="link-light" href="#">Accreditation</a></li>
                            <li><a class="link-light" href="#">Office of the President</a></li>
                            <li><a class="link-light" href="#">Shared Governance</a></li>
                            <li><a class="link-light" href="#">Careers at LBCC</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="list-unstyled vstack gap-2 mb-0 fs-8">
                            <li><a class="link-light" href="#">Student Support</a></li>
                            <li><a class="link-light" href="#">Calendars &amp; Events</a></li>
                            <li><a class="link-light" href="#">Class Schedule</a></li>
                            <li><a class="link-light" href="#">Directory</a></li>
                            <li><a class="link-light" href="#">Campus Maps</a></li>
                            <li><a class="link-light" href="#">Campus Safety</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="list-unstyled vstack gap-2 mb-0 fs-8">
                            <li><a class="btn btn-sm btn-outline-light" href="#">Viking Portal</a></li>
                            <li><a class="btn btn-sm btn-outline-light" href="#">Canvas</a></li>
                            <li><a class="link-light" href="#">Current Students</a></li>
                            <li><a class="link-light" href="#">Faculty &amp; Staff</a></li>
                            <li><a class="link-light" href="#">Community</a></li>
                            <li><a class="link-light" href="#">Alumni</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-top border-white border-opacity-25 mt-5 py-4">
            <div class="row g-5">
                <div class="col-12 order-md-2 col-md-8">
                    <ul class="list-unstyled gap-2 mb-0 fs-8 d-lg-flex justify-content-lg-end flex-lg-row flex-column">
                        <li><a class="link-light" href="#">Accessibilty Statement</a></li>
                        <li><a class="link-light" href="#">DSPS Grievance Process</a></li>
                        <li><a class="link-light" href="#">Student Complaints &amp; Grievances</a></li>
                        <li><a class="link-light" href="#">Unsubscribe/ Opt-Out</a></li>
                    </ul>
                </div>
                <div class="col-12 order-md-1 col-md-4">
                    <p class="text-white fs-9 m-0"><a href="" class="link-light">&copy;</a> Long Beach City College, All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>
