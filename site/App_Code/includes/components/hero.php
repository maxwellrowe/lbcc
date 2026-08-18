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
                    <p class="eyebrow-sm mb-2">Split Variant</p>
                </div>
                <?php
                component_hero(
                    'split',
                    'Split Hero Placeholder',
                    $heroSupplementalContent,
                    [
                        [
                            'type' => 'image',
                            'src' => '_resources/images/lac-thumb.jpg',
                            'alt' => 'Campus placeholder image'
                        ],
                        [
                            'type' => 'image',
                            'src' => '_resources/images/lac-thumb.jpg',
                            'alt' => 'Campus placeholder image second slide'
                        ]
                    ],
                    [],
                    true
                );
                ?>
            </div>

            <div>
                <div class="container">
                    <p class="eyebrow-sm mb-2">Full Variant</p>
                </div>
                <?php
                component_hero(
                    'full',
                    'Full Hero Placeholder',
                    $heroSupplementalContent,
                    [
                        [
                            'type' => 'image',
                            'src' => '_resources/images/lac-thumb.jpg',
                            'alt' => 'Primary full hero placeholder image'
                        ]
                    ],
                    [
                    [
                            'type' => 'image',
                            'src' => '_resources/images/lac-thumb.jpg',
                            'alt' => 'Secondary full hero placeholder image'
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
                        <td>Media Slot 1</td>
                        <td>array</td>
                        <td>empty</td>
                        <td>Accepts one or more media items. Multiple items automatically output Swiper-ready markup.</td>
                    </tr>
                    <tr>
                        <td>Media Slot 2</td>
                        <td>array</td>
                        <td>empty</td>
                        <td>Optional second media/background slot intended for the <code>full</code> variant.</td>
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
                        <td>Optional trusted breadcrumb markup. If omitted, the component outputs a simple placeholder breadcrumb trail.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
