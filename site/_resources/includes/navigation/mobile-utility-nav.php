<div class="d-grid gap-2 mobile-utilities-nav__top-ctas">
    <a 
        href="https://myapps.microsoft.com/?tenant=lbcc.edu" 
        target="_blank" 
        class="btn btn-outline-secondary d-flex justify-content-center align-items-center gap-1 w-100">
            <img src="<?php echo lbcc_escape(lbcc_url('_resources/images/viking-icon.svg')); ?>" alt="" />
            <span>Viking Portal</span>
    </a>
    <a 
        href="https://www.lbcc.edu/canvas-lms" 
        target="_blank" 
        class="btn btn-outline-secondary d-flex justify-content-center align-items-center gap-1 w-100">
            <img src="<?php echo lbcc_escape(lbcc_url('_resources/images/canvas-icon.svg')); ?>" alt="" />
            <span>Canvas</span>
    </a>
</div>

<div class="card rounded-5 border-0 bg-surface-base mt-3">
    <div class="card-body d-flex align-items-center flex-column gap-2">
        <span class="eyebrow">Info for...</span>
        <?php
            component_buttons(
                [
                    [
                        'style' => 'btn-primary btn-block',
                        'text' => 'Current Students',
                        'url' => '#',
                        'size' => '',
                        'icon' => ''
                    ],
                    [
                        'style' => 'btn-primary',
                        'text' => 'Faculty & Staff',
                        'url' => '#',
                        'size' => '',
                        'icon' => ''
                    ],
                    [
                        'style' => 'btn-primary',
                        'text' => 'Community',
                        'url' => '#',
                        'size' => '',
                        'icon' => ''
                    ],
                    [
                        'style' => 'btn-primary',
                        'text' => 'Alumni',
                        'url' => '#',
                        'size' => '',
                        'icon' => ''
                    ]
                ],
                'block',
                2
            );
        ?>
    </div>
</div>

<div class="card rounded-5 border-0 bg-surface-base mt-3">
    <div class="card-body">
        <?php
            component_quicklinks(
                [
                    [
                        'text' => 'Student Support',
                        'url' => '#',
                        'icon' => 'fa-heart'
                    ],
                    [
                        'text' => 'Calendar & Events',
                        'url' => '#',
                        'icon' => 'fa-calendars'
                    ],
                    [
                        'text' => 'Class Schedule',
                        'url' => '#',
                        'icon' => 'fa-clipboard-list'
                    ],
                    [
                        'text' => 'Directory',
                        'url' => '#',
                        'icon' => 'fa-address-book'
                    ],
                    [
                        'text' => 'Campus Maps',
                        'url' => '#',
                        'icon' => 'fa-location-dot'
                    ],
                    [
                        'text' => 'Emergency Services',
                        'url' => '#',
                        'icon' => 'fa-light-emergency-on'
                    ]
                ],
                'card',
                'sm',
                'bg-surface-subtle',
                'text-dark',
                'text-primary',
                2,
                2,
                2
            );
            ?>
    </div>
</div>

<div class="w-100 mt-3">
    <div class="d-grid">
        <a 
            href="https://www.lbccvikings.com/landing/index" 
            target="_blank"
            class="btn btn-outline-secondary border-0 w-100 d-flex align-items-center justify-content center"    
        >
            <img src="<?php echo lbcc_escape(lbcc_url('_resources/images/viking-icon.svg')); ?>" alt="" />
            <span>Viking Athletics</span>
        </a>
    </div>
</div>

<div class="card bg-transparent rounded-5 shadow-none border-0 mt-2">
    <div class="card-body d-flex align-items-center justify-content-start flex-column gap-4">
        <span class="eyebrow">Connect with LBCC</span>
        <?php component_social_media(
            [
                ['link' => 'https://www.tiktok.com/@longbeachcitycollege', 'icon' => 'fa-tiktok', 'sr_label' => 'LBCC on TikTok'],
                ['link' => 'https://www.instagram.com/lbcitycollege', 'icon' => 'fa-instagram', 'sr_label' => 'LBCC on Instagram'],
                ['link' => 'https://x.com/LBCityCollege', 'icon' => 'fa-x-twitter', 'sr_label' => 'LBCC on X'],
                ['link' => 'https://www.facebook.com/lbcitycollege', 'icon' => 'fa-facebook', 'sr_label' => 'LBCC on Facebook'],
                ['link' => 'https://www.youtube.com/user/LongBeachCityCollege', 'icon' => 'fa-youtube', 'sr_label' => 'LBCC on YouTube']
            ],
            'primary',
            'm',
            ['justify-content-center']
        ); ?>
    </div>
</div>
