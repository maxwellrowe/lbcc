<section aria-labelledby="hero-heading" class="mt-5">
    <div class="container">
        <p class="eyebrow mb-2">Component</p>
        <h2 id="hero-heading">Hero</h2>
        <p class="text-body-secondary mb-4">Backbone-only implementation for the shared custom hero component. This establishes the content model, media slot handling, breadcrumb toggle, and Swiper-ready markup without introducing the final visual layout yet.</p>
    </div>

    <div class="bg-surface-subtle py-4 py-lg-5">
        <div class="container">
            <h3 class="h5 mb-3">Example</h3>
        </div>

        <?php ob_start(); ?>
        <?php component_buttons(
            [
                [
                    'style' => 'btn-primary',
                    'text' => 'Apply Now',
                    'url' => '#',
                    'size' => '',
                    'icon' => ''
                ],
                [
                    'style' => 'btn-outline-secondary',
                    'text' => 'View Programs',
                    'url' => '#',
                    'size' => '',
                    'icon' => 'fa-arrow-right',
                    'icon_position' => 'end'
                ]
            ],
            'row',
            2
        ); ?>
        <?php $buttonGroupMarkup = ob_get_clean(); ?>
        <?php
        $heroSupplementalContent = '
            <div class="d-grid gap-3">
                <p class="lead mb-0">Supplemental content is passed through as trusted HTML so this can later support editor-authored paragraphs, buttons, badges, and other components.</p>
                <div>' . $buttonGroupMarkup . '</div>
            </div>
        ';
        ?>

        <div class="container-fluid px-0">
            <div class="mb-5">
                <div class="container">
                    <p class="eyebrow-sm mb-2">Split Variant / Right Background Video / Breadcrumbs On</p>
                </div>
                <?php
                component_hero(
                    'split',
                    'Split Hero Placeholder',
                    $heroSupplementalContent,
                    [
                        [
                            'type' => 'image',
                            'src' => '_resources/images/hero-backgrounds/hero-bg-4.jpg',
                            'alt' => 'Split hero main image one'
                        ],
                        [
                            'type' => 'image',
                            'src' => '_resources/images/hero-backgrounds/hero-bg-11.jpg',
                            'alt' => 'Split hero main image two'
                        ]
                    ],
                    [
                        [
                            'type' => 'video',
                            'src' => '_resources/video/hero-backgrounds/optimized/hero-bg-1.mp4',
                            'poster' => '_resources/images/hero-backgrounds/hero-bg-2.jpg'
                        ]
                    ],
                    [],
                    true
                );
                ?>
            </div>

            <div class="mb-5">
                <div class="container">
                    <p class="eyebrow-sm mb-2">Split Variant / Breadcrumbs Off</p>
                </div>
                <?php
                component_hero(
                    'split',
                    'Split Hero Without Breadcrumbs',
                    $heroSupplementalContent,
                    [
                        [
                            'type' => 'image',
                            'src' => '_resources/images/hero-backgrounds/hero-bg-9.jpg',
                            'alt' => 'Split hero without breadcrumbs main image'
                        ]
                    ],
                    [
                        [
                            'type' => 'image',
                            'src' => '_resources/images/hero-backgrounds/hero-bg-1.jpg',
                            'alt' => 'Split hero without breadcrumbs right background image'
                        ]
                    ],
                    [],
                    false
                );
                ?>
            </div>

            <div>
                <div class="container">
                    <p class="eyebrow-sm mb-2">Full Variant / Left + Right Background Video / Breadcrumbs On</p>
                </div>
                <?php
                component_hero(
                    'full',
                    'Full Hero Placeholder',
                    $heroSupplementalContent,
                    [
                        [
                            'type' => 'image',
                            'src' => '_resources/images/hero-backgrounds/hero-bg-15.jpg',
                            'alt' => 'Full hero main image'
                        ]
                    ],
                    [
                        [
                            'type' => 'video',
                            'src' => '_resources/video/hero-backgrounds/optimized/hero-bg-1.mp4',
                            'poster' => '_resources/images/hero-backgrounds/hero-bg-7.jpg'
                        ]
                    ],
                    [
                        [
                            'type' => 'video',
                            'src' => '_resources/video/hero-backgrounds/optimized/hero-bg-2.mp4',
                            'poster' => '_resources/images/hero-backgrounds/hero-bg-13.jpg'
                        ]
                    ],
                    true
                );
                ?>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h3 class="h5 mb-3">Options</h3>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">Field</th>
                        <th scope="col">Type</th>
                        <th scope="col">Default</th>
                        <th scope="col">Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Type</td>
                        <td>string</td>
                        <td>split</td>
                        <td>Supported values are <code>split</code> and <code>full</code>. This controls which structural variant is being rendered.</td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>string</td>
                        <td>empty</td>
                        <td>Main hero heading.</td>
                    </tr>
                    <tr>
                        <td>Supplemental Content</td>
                        <td>HTML string</td>
                        <td>empty</td>
                        <td>Trusted rich content area for editor-authored text and nested components such as buttons.</td>
                    </tr>
                    <tr>
                        <td>Main Content Media</td>
                        <td>array</td>
                        <td>empty</td>
                        <td>Accepts one or more media items for the main hero content area. Multiple items automatically output Swiper-ready markup.</td>
                    </tr>
                    <tr>
                        <td>Background Media Right</td>
                        <td>array</td>
                        <td>empty</td>
                        <td>Background image or video slot on the right side. Used by both variants, and especially the single background slot for <code>split</code>.</td>
                    </tr>
                    <tr>
                        <td>Background Media Left</td>
                        <td>array</td>
                        <td>empty</td>
                        <td>Optional second background image or video slot on the left side for the <code>full</code> variant.</td>
                    </tr>
                    <tr>
                        <td>Media Item</td>
                        <td>array</td>
                        <td>Required when used</td>
                        <td>Each media item can include <code>type</code> (<code>image</code> or <code>video</code>), <code>src</code>, <code>alt</code>, and <code>poster</code>.</td>
                    </tr>
                    <tr>
                        <td>Breadcrumbs</td>
                        <td>boolean</td>
                        <td>true</td>
                        <td>Toggles breadcrumb output on or off.</td>
                    </tr>
                    <tr>
                        <td>Breadcrumb HTML</td>
                        <td>HTML string</td>
                        <td>empty</td>
                        <td>Optional trusted breadcrumb markup. If omitted and Breadcrumbs is enabled, the component falls back to the shared <code>/_resources/includes/breadcrumbs.php</code> include.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
