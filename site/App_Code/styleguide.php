<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = [
    'title' => 'Style Guide',
    'description' => 'Starter LBCC style guide for the front-end foundation pass.',
    'section' => 'App Code'
];

$rawPaletteGroups = [
    'Base' => [
        ['name' => 'Surface', 'sass' => '$color-surface', 'hex' => '#FFFEFB'],
        ['name' => 'White', 'sass' => '$color-white', 'hex' => '#FFFFFF']
    ],
    'Reds' => [
        ['name' => 'Red', 'sass' => '$color-red', 'hex' => '#DA2919'],
        ['name' => 'Red 700', 'sass' => '$color-red-700', 'hex' => '#A21F13'],
        ['name' => 'Red 100', 'sass' => '$color-red-100', 'hex' => '#FBE9E8']
    ],
    'Grays' => [
        ['name' => 'Gray 900', 'sass' => '$color-gray-900', 'hex' => '#1E1E1E'],
        ['name' => 'Gray 800', 'sass' => '$color-gray-800', 'hex' => '#302E2D'],
        ['name' => 'Gray 700', 'sass' => '$color-gray-700', 'hex' => '#625E5B'],
        ['name' => 'Gray 600', 'sass' => '$color-gray-600', 'hex' => '#716F6C'],
        ['name' => 'Gray 500', 'sass' => '$color-gray-500', 'hex' => '#898683'],
        ['name' => 'Gray 400', 'sass' => '$color-gray-400', 'hex' => '#A5A19D'],
        ['name' => 'Gray 300', 'sass' => '$color-gray-300', 'hex' => '#C1BCB7'],
        ['name' => 'Gray 200', 'sass' => '$color-gray-200', 'hex' => '#E4E0DA'],
        ['name' => 'Gray 100', 'sass' => '$color-gray-100', 'hex' => '#F1F0ED'],
        ['name' => 'Gray 50', 'sass' => '$color-gray-50', 'hex' => '#F6F5F3']
    ],
    'Teals' => [
        ['name' => 'Teal 800', 'sass' => '$color-teal-800', 'hex' => '#004E54'],
        ['name' => 'Teal 600', 'sass' => '$color-teal-600', 'hex' => '#008A94'],
        ['name' => 'Teal 400', 'sass' => '$color-teal-400', 'hex' => '#00CDDB'],
        ['name' => 'Teal 200', 'sass' => '$color-teal-200', 'hex' => '#AEEAF0'],
        ['name' => 'Teal 100', 'sass' => '$color-teal-100', 'hex' => '#E6FAFC'],
        ['name' => 'Teal 50', 'sass' => '$color-teal-50', 'hex' => '#F1FBFC']
    ],
    'Yellows' => [
        ['name' => 'Yellow 800', 'sass' => '$color-yellow-800', 'hex' => '#8A6A00'],
        ['name' => 'Yellow 600', 'sass' => '$color-yellow-600', 'hex' => '#E6B800'],
        ['name' => 'Yellow 400', 'sass' => '$color-yellow-400', 'hex' => '#FFDE75'],
        ['name' => 'Yellow 300', 'sass' => '$color-yellow-300', 'hex' => '#FFE9A8'],
        ['name' => 'Yellow 200', 'sass' => '$color-yellow-200', 'hex' => '#FFF7DB']
    ],
    'Support & neutrals' => [
        ['name' => 'Green', 'sass' => '$color-green', 'hex' => '#2E7D5B'],
        ['name' => 'Sand', 'sass' => '$color-sand', 'hex' => '#F4F0EC'],
        ['name' => 'Sand Wet', 'sass' => '$color-sand-wet', 'hex' => '#EFE9E3'],
        ['name' => 'Sun Soft', 'sass' => '$color-sun-soft', 'hex' => '#FFE9C7'],
        ['name' => 'Sun Haze', 'sass' => '$color-sun-haze', 'hex' => '#E6F3F2']
    ]
];

$semanticColorGroups = [
    'Brand & text' => [
        ['name' => 'Primary', 'sass' => '$color-primary', 'maps_to' => '$color-red', 'hex' => '#DA2919'],
        ['name' => 'Primary Hover', 'sass' => '$color-primary-hover', 'maps_to' => '$color-red-700', 'hex' => '#A21F13'],
        ['name' => 'Primary Soft', 'sass' => '$color-primary-soft', 'maps_to' => '$color-red-100', 'hex' => '#FBE9E8'],
        ['name' => 'Text', 'sass' => '$color-text', 'maps_to' => '$color-gray-900', 'hex' => '#1E1E1E'],
        ['name' => 'Text Secondary', 'sass' => '$color-text-secondary', 'maps_to' => '$color-gray-700', 'hex' => '#625E5B'],
        ['name' => 'Text Muted', 'sass' => '$color-text-muted', 'maps_to' => '$color-gray-500', 'hex' => '#898683']
    ],
    'Border & interactive' => [
        ['name' => 'Border', 'sass' => '$color-border', 'maps_to' => '$color-gray-300', 'hex' => '#C1BCB7'],
        ['name' => 'Border Subtle', 'sass' => '$color-border-subtle', 'maps_to' => '$color-gray-200', 'hex' => '#E4E0DA'],
        ['name' => 'Interactive', 'sass' => '$color-interactive', 'maps_to' => '$color-teal-600', 'hex' => '#008A94'],
        ['name' => 'Interactive Hover', 'sass' => '$color-interactive-hover', 'maps_to' => '$color-teal-800', 'hex' => '#004E54'],
        ['name' => 'Interactive Bright', 'sass' => '$color-interactive-bright', 'maps_to' => '$color-teal-400', 'hex' => '#00CDDB'],
        ['name' => 'Interactive Light', 'sass' => '$color-interactive-light', 'maps_to' => '$color-teal-200', 'hex' => '#AEEAF0'],
        ['name' => 'Interactive Subtle', 'sass' => '$color-interactive-subtle', 'maps_to' => '$color-teal-100', 'hex' => '#E6FAFC'],
        ['name' => 'Focus', 'sass' => '$color-focus', 'maps_to' => '$color-teal-400', 'hex' => '#00CDDB']
    ],
    'Surfaces' => [
        ['name' => 'Surface Base', 'sass' => '$color-surface-base', 'maps_to' => '$color-surface', 'hex' => '#FFFEFB'],
        ['name' => 'Surface Subtle', 'sass' => '$color-surface-subtle', 'maps_to' => '$color-gray-50', 'hex' => '#F6F5F3'],
        ['name' => 'Surface Raised', 'sass' => '$color-surface-raised', 'maps_to' => '$color-sand', 'hex' => '#F4F0EC'],
        ['name' => 'Surface Water', 'sass' => '$color-surface-water', 'maps_to' => '$color-teal-50', 'hex' => '#F1FBFC'],
        ['name' => 'Surface Sun Haze', 'sass' => '$color-surface-sun-haze', 'maps_to' => '$color-sun-haze', 'hex' => '#E6F3F2'],
        ['name' => 'Surface Inverse', 'sass' => '$color-surface-inverse', 'maps_to' => '$color-gray-900', 'hex' => '#1E1E1E']
    ],
    'Status & inverse' => [
        ['name' => 'Success', 'sass' => '$color-success', 'maps_to' => '$color-green', 'hex' => '#2E7D5B'],
        ['name' => 'Info', 'sass' => '$color-info', 'maps_to' => '$color-teal-600', 'hex' => '#008A94'],
        ['name' => 'Warning', 'sass' => '$color-warning', 'maps_to' => '$color-yellow-600', 'hex' => '#E6B800'],
        ['name' => 'Danger', 'sass' => '$color-danger', 'maps_to' => '$color-red', 'hex' => '#DA2919'],
        ['name' => 'Inverse Text', 'sass' => '$color-inverse-text', 'maps_to' => '$color-gray-50', 'hex' => '#F6F5F3'],
        ['name' => 'Inverse Muted', 'sass' => '$color-inverse-muted', 'maps_to' => '$color-gray-300', 'hex' => '#C1BCB7'],
        ['name' => 'Inverse Border', 'sass' => '$color-inverse-border', 'maps_to' => '$color-gray-500', 'hex' => '#898683'],
        ['name' => 'Inverse Hover', 'sass' => '$color-inverse-hover', 'maps_to' => '$color-gray-800', 'hex' => '#302E2D'],
        ['name' => 'Inverse Link', 'sass' => '$color-inverse-link', 'maps_to' => '$color-teal-100', 'hex' => '#E6FAFC']
    ]
];

$surfaceUtilityClasses = [
    ['class' => '.bg-surface-base', 'sass' => '$color-surface-base', 'hex' => '#FFFEFB', 'border' => true],
    ['class' => '.bg-surface-subtle', 'sass' => '$color-surface-subtle', 'hex' => '#F6F5F3', 'border' => true],
    ['class' => '.bg-surface-raised', 'sass' => '$color-surface-raised', 'hex' => '#F4F0EC', 'border' => true],
    ['class' => '.bg-surface-water', 'sass' => '$color-surface-water', 'hex' => '#F1FBFC', 'border' => true],
    ['class' => '.bg-surface-sun-haze', 'sass' => '$color-surface-sun-haze', 'hex' => '#E6F3F2', 'border' => true],
    ['class' => '.bg-surface-inverse', 'sass' => '$color-surface-inverse', 'hex' => '#1E1E1E', 'text' => 'text-white']
];
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="lbcc-page">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<main id="main-content" class="flex-grow-1 py-5">
    <div class="container">
        <header id="page-header" class="mb-5">
            <nav aria-label="Breadcrumb" class="mb-3">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?php echo lbcc_escape(lbcc_url('/')); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo lbcc_escape(lbcc_url('/App_Code/')); ?>">App Code</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Style Guide</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-start justify-content-lg-between align-items-start align-items-lg-end flex-column flex-lg-row gap-3">
                <div>
                    <p class="eyebrow mb-2">Foundation</p>
                    <h1 class="mb-0">LBCC Style Guide</h1>
                </div>
                <div class="col-xl-6 px-0">
                    <p class="lead text-body-secondary mb-0">This starter shell focuses on design tokens, Bootstrap mappings, and accessible baseline patterns we can build on during the next implementation passes.</p>
                </div>
            </div>
        </header>
    </div>

    <section class="mb-5" aria-labelledby="color-heading">
        <div class="container">
            <h2 id="color-heading">Color</h2>
            <p class="text-body-secondary">This section lists every raw palette token and every semantic color alias currently defined in Sass, but in a simpler reference layout.</p>

            <div class="mt-4">
                <h3 class="h4 mb-3">Raw Palette</h3>
                <p class="text-body-secondary">Foundational color values from <code>_palette.scss</code>. These are the direct source tokens the semantic system maps to.</p>

                <?php foreach ($rawPaletteGroups as $groupName => $swatches) { ?>
                    <div class="mt-4">
                        <h4 class="h5 mb-3"><?php echo lbcc_escape($groupName); ?></h4>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4">
                            <?php foreach ($swatches as $swatch) { ?>
                                <div class="col">
                                    <div class="rounded border mb-2" style="height: 10rem; background-color: <?php echo lbcc_escape($swatch['hex']); ?>"></div>
                                    <p class="mb-1 fw-semibold"><?php echo lbcc_escape($swatch['name']); ?></p>
                                    <p class="mb-1"><code><?php echo lbcc_escape($swatch['sass']); ?></code></p>
                                    <p class="mb-0 text-body-secondary fs-7"><?php echo lbcc_escape($swatch['hex']); ?></p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="mt-5">
                <h3 class="h4 mb-3">Semantic Color Tokens</h3>
                <p class="text-body-secondary">Implementation-facing aliases from <code>_semantic-colors.scss</code>. These are the variables we should usually reference in components.</p>

                <?php foreach ($semanticColorGroups as $groupName => $swatches) { ?>
                    <div class="mt-4">
                        <h4 class="h5 mb-3"><?php echo lbcc_escape($groupName); ?></h4>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4">
                            <?php foreach ($swatches as $swatch) { ?>
                                <div class="col">
                                    <div class="rounded border mb-2" style="height: 10rem; background-color: <?php echo lbcc_escape($swatch['hex']); ?>"></div>
                                    <p class="mb-1 fw-semibold"><?php echo lbcc_escape($swatch['name']); ?></p>
                                    <p class="mb-1"><code><?php echo lbcc_escape($swatch['sass']); ?></code></p>
                                    <p class="mb-1 text-body-secondary fs-7">Maps to <code><?php echo lbcc_escape($swatch['maps_to']); ?></code></p>
                                    <p class="mb-0 text-body-secondary fs-7"><?php echo lbcc_escape($swatch['hex']); ?></p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="mb-5" aria-labelledby="type-heading">
        <div class="container">
            <h2 id="type-heading">Typography</h2>
            <p class="text-body-secondary">A cleaner reference for reading flow, heading hierarchy, utility sizes, and supporting text styles.</p>

            <div class="bg-surface-subtle rounded p-4 p-lg-5">
                <h3 class="h4 mb-3">Flow</h3>
                <h2>Heading 2</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet nunc ac orci scelerisque vulputate. Aliquam erat volutpat. In sit amet magna eu sapien dapibus feugiat.</p>
                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque eu risus nec urna tristique porttitor. Duis non risus a lorem porta accumsan. Vivamus ac pulvinar leo. Sed tincidunt, lorem sed laoreet tristique, ligula libero condimentum justo, vitae luctus diam lacus non leo.</p>
                <h3>Heading 3</h3>
                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque eu risus nec urna tristique porttitor. Duis non risus a lorem porta accumsan. Vivamus ac pulvinar leo.</p>
                <blockquote>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque eu risus nec urna tristique porttitor.</blockquote>
                <h3>Heading 3</h3>
                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque eu risus nec urna tristique porttitor. Duis non risus a lorem porta accumsan. Vivamus ac pulvinar leo.</p>
                <h4>Heading 4</h4>
                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque eu risus nec urna tristique porttitor. Duis non risus a lorem porta accumsan.</p>
                <ul>
                    <li>Duis non risus a lorem porta accumsan.</li>
                    <li>Duis non risus a lorem porta accumsan.</li>
                    <li>Duis non risus a lorem porta accumsan.</li>
                </ul>
                <p class="mb-0">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque eu risus nec urna tristique porttitor. Duis non risus a lorem porta accumsan.</p>

                <hr class="my-5">

                <h3 class="h4 mb-3">Heading Scale</h3>
                <div class="row row-cols-1 row-cols-lg-2 g-4 mb-4">
                    <div class="col">
                        <h1>Heading 1</h1>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sodales neque lobortis est aliquet, at varius lacus iaculis.</p>
                    </div>
                    <div class="col">
                        <h2>Heading 2</h2>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sodales neque lobortis est aliquet, at varius lacus iaculis.</p>
                    </div>
                    <div class="col">
                        <h3>Heading 3</h3>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sodales neque lobortis est aliquet, at varius lacus iaculis.</p>
                    </div>
                    <div class="col">
                        <h4>Heading 4</h4>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sodales neque lobortis est aliquet, at varius lacus iaculis.</p>
                    </div>
                    <div class="col">
                        <h5>Heading 5</h5>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sodales neque lobortis est aliquet, at varius lacus iaculis.</p>
                    </div>
                    <div class="col">
                        <h6>Heading 6</h6>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sodales neque lobortis est aliquet, at varius lacus iaculis.</p>
                    </div>
                </div>

                <h3 class="h4 mb-3">Special Font Size Classes</h3>
                <p class="mb-3">These classes can be added to any element. They range from <code>fs-1</code> to <code>fs-9</code>, with the higher number being the smaller size.</p>
                <p class="fs-1 mb-1">Font Size 1</p>
                <p class="fs-2 mb-1">Font Size 2</p>
                <p class="fs-3 mb-1">Font Size 3</p>
                <p class="fs-4 mb-1">Font Size 4</p>
                <p class="fs-5 mb-1">Font Size 5</p>
                <p class="fs-6 mb-1">Font Size 6</p>
                <p class="fs-7 mb-1">Font Size 7</p>
                <p class="fs-8 mb-1">Font Size 8</p>
                <p class="fs-9 mb-0">Font Size 9</p>

                <hr class="my-5">

                <h3 class="h4 mb-3">Pre-Headings</h3>
                <p class="mb-3">Use the eyebrow classes on a span, paragraph, or heading when a supporting label is needed above main content.</p>
                <div class="d-grid gap-2 mb-4">
                    <p class="eyebrow-lg mb-0">Pre-heading / Label Large — 20px</p>
                    <p class="eyebrow mb-0">Pre-heading / Label Default — 14px</p>
                    <p class="eyebrow-sm mb-0">Pre-heading / Label Small — 12px</p>
                </div>

                <h3 class="h4 mb-3">Paragraph</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                <h3 class="h4 mb-3">Lead Paragraph</h3>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                <h3 class="h4 mb-3">Blockquote</h3>
                <blockquote class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</blockquote>
            </div>
        </div>
    </section>

    <section class="mb-5" aria-labelledby="utility-heading">
        <div class="container">
            <h2 id="utility-heading">Utilities</h2>
            <p class="text-body-secondary">Backgrounds, overlays, pills, and action helpers should read like a toolkit, not separate mini-pages.</p>

            <div class="mt-4">
                <h3 class="h4 mb-3">Background Utilities</h3>
                <div class="row g-4">
                    <?php foreach ($surfaceUtilityClasses as $utility) { ?>
                        <div class="col-sm-6 col-xl-4">
                            <div class="rounded p-4 <?php echo lbcc_escape(ltrim($utility['class'], '.')); ?> <?php echo !empty($utility['border']) ? 'border' : ''; ?> <?php echo !empty($utility['text']) ? lbcc_escape($utility['text']) : ''; ?>">
                                <p class="mb-1 fw-semibold"><?php echo lbcc_escape($utility['class']); ?></p>
                                <p class="mb-0"><code><?php echo lbcc_escape($utility['sass']); ?></code></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="mt-5">
                <h3 class="h4 mb-3">Overlay And Accent Utilities</h3>
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                        <div class="rounded p-4 bg-trans-teal border">
                            <p class="mb-1 fw-semibold">.bg-trans-teal</p>
                            <p class="mb-0"><code>rgba(#00CDDB, .48)</code></p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="rounded p-4 bg-trans-dark-100 text-white">
                            <p class="mb-1 fw-semibold">.bg-trans-dark-100</p>
                            <p class="mb-0"><code>rgba(#1E1E1E, .24)</code></p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="rounded p-4 bg-trans-dark-400 text-white">
                            <p class="mb-1 fw-semibold">.bg-trans-dark-400</p>
                            <p class="mb-0"><code>rgba(#1E1E1E, .48)</code></p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="rounded p-4 bg-trans-dark-900 text-white">
                            <p class="mb-1 fw-semibold">.bg-trans-dark-900</p>
                            <p class="mb-0"><code>rgba(#1E1E1E, .62)</code></p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="rounded p-4 bg-water border">
                            <p class="mb-1 fw-semibold">.bg-water</p>
                            <p class="mb-0"><code>$color-teal-50</code></p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="rounded p-4 bg-gradient-sunhaze border">
                            <p class="mb-1 fw-semibold">.bg-gradient-sunhaze</p>
                            <p class="mb-0"><code>#E6F3F2 → #FFE9C7</code></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h3 class="h4 mb-3">Pills And Links</h3>
                <div class="bg-surface-subtle rounded p-4">
                    <div class="d-flex flex-column align-items-start gap-3 mb-4">
                        <a class="pill" href="#">
                            <span>Text Link</span>
                            <span class="pill-icon fa-sharp fa-regular fa-arrow-up-right" aria-hidden="true"></span>
                        </a>
                        <a class="pill pill-light-red" href="#">
                            <span>Text Link</span>
                            <span class="pill-icon fa-sharp fa-regular fa-arrow-right" aria-hidden="true"></span>
                        </a>
                        <a class="pill pill-light-gray" href="#">
                            <span>Text Link</span>
                            <span class="pill-icon fa-sharp fa-regular fa-arrow-right" aria-hidden="true"></span>
                        </a>
                        <a class="pill pill-surface-raised" href="#">
                            <span>Text Link</span>
                            <span class="pill-icon fa-sharp fa-regular fa-arrow-right" aria-hidden="true"></span>
                        </a>
                        <a class="pill pill-sm" href="#">
                            <span>Text Link</span>
                            <span class="pill-icon fa-sharp fa-regular fa-arrow-up-right" aria-hidden="true"></span>
                        </a>
                    </div>
                    <a class="arrow-link" href="#">Arrow Link utility</a>
                </div>
            </div>

            <div class="mt-5">
                <h3 class="h4 mb-3">Target Blank Icon</h3>
                <p class="text-body-secondary">Any anchor with <code>target="_blank"</code> automatically gets a Font Awesome external-link icon appended with CSS. This helps communicate that the destination opens in a new tab.</p>
                <div class="table-responsive mb-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Pattern</th>
                                <th scope="col">Use</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>target="_blank"</code></td>
                                <td>Adds the external-link icon automatically to standard anchors.</td>
                            </tr>
                            <tr>
                                <td><code>.no-target-blank-icon</code></td>
                                <td>Opt out when the icon would be redundant or conflict with a component’s own icon treatment.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="bg-surface-subtle rounded p-4">
                    <div class="d-flex flex-column align-items-start gap-3">
                        <a href="https://www.lbcc.edu" target="_blank" rel="noopener noreferrer">Standard target blank link</a>
                        <a href="https://www.lbcc.edu" target="_blank" rel="noopener noreferrer" class="no-target-blank-icon">Target blank link with icon hidden</a>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h3 class="h4 mb-3">Spacing Utility Classes</h3>
                <p class="text-body-secondary">Bootstrap spacing utilities are available throughout the project. Common combinations are shown below for quick reference.</p>
                <div class="table-responsive mb-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Utility</th>
                                <th scope="col">Use</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>p-1</code> to <code>p-5</code></td>
                                <td>Padding on all sides</td>
                            </tr>
                            <tr>
                                <td><code>px-1</code> to <code>px-5</code></td>
                                <td>Horizontal padding</td>
                            </tr>
                            <tr>
                                <td><code>py-1</code> to <code>py-5</code></td>
                                <td>Vertical padding</td>
                            </tr>
                            <tr>
                                <td><code>m-1</code> to <code>m-5</code></td>
                                <td>Margin on all sides</td>
                            </tr>
                            <tr>
                                <td><code>mx-1</code> to <code>mx-5</code></td>
                                <td>Horizontal margin</td>
                            </tr>
                            <tr>
                                <td><code>my-1</code> to <code>my-5</code></td>
                                <td>Vertical margin</td>
                            </tr>
                            <tr>
                                <td><code>mt-*</code>, <code>me-*</code>, <code>mb-*</code>, <code>ms-*</code></td>
                                <td>Directional margin utilities</td>
                            </tr>
                            <tr>
                                <td><code>pt-*</code>, <code>pe-*</code>, <code>pb-*</code>, <code>ps-*</code></td>
                                <td>Directional padding utilities</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="bg-surface-subtle border rounded p-5">
                            <p class="mb-0 fw-semibold"><code>.p-5</code></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-surface-water border rounded px-5 py-3">
                            <p class="mb-0 fw-semibold"><code>.px-5 .py-3</code></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-surface-subtle border rounded">
                            <div class="bg-white border rounded m-4 p-3">
                                <p class="mb-0 fw-semibold"><code>.m-4</code> applied to inner element</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-surface-sun-haze border rounded pt-5 pb-2 px-4">
                            <p class="mb-0 fw-semibold"><code>.pt-5 .pb-2 .px-4</code></p>
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <h3 class="h4 mb-3">Border Radius Utilities</h3>
                    <p class="text-body-secondary">Bootstrap border-radius helpers are available for default rounding as well as stepped radius values.</p>
                    <div class="table-responsive mb-4">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Utility</th>
                                    <th scope="col">Use</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>.rounded</code></td>
                                    <td>Default Bootstrap border radius</td>
                                </tr>
                                <tr>
                                    <td><code>.rounded-1</code></td>
                                    <td>Extra small radius</td>
                                </tr>
                                <tr>
                                    <td><code>.rounded-2</code></td>
                                    <td>Small radius</td>
                                </tr>
                                <tr>
                                    <td><code>.rounded-3</code></td>
                                    <td>Medium radius</td>
                                </tr>
                                <tr>
                                    <td><code>.rounded-4</code></td>
                                    <td>Large radius</td>
                                </tr>
                                <tr>
                                    <td><code>.rounded-5</code></td>
                                    <td>Largest preset radius</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row g-4">
                        <div class="col-sm-6 col-lg-4">
                            <div class="bg-surface-subtle border rounded p-4">
                                <p class="mb-0 fw-semibold"><code>.rounded</code></p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="bg-surface-water border rounded-1 p-4">
                                <p class="mb-0 fw-semibold"><code>.rounded-1</code></p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="bg-surface-sun-haze border rounded-2 p-4">
                                <p class="mb-0 fw-semibold"><code>.rounded-2</code></p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="bg-surface-subtle border rounded-3 p-4">
                                <p class="mb-0 fw-semibold"><code>.rounded-3</code></p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="bg-surface-water border rounded-4 p-4">
                                <p class="mb-0 fw-semibold"><code>.rounded-4</code></p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="bg-surface-sun-haze border rounded-5 p-4">
                                <p class="mb-0 fw-semibold"><code>.rounded-5</code></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5" aria-labelledby="actions-heading">
        <div class="container">
            <h2 id="actions-heading">Actions</h2>
            <p class="text-body-secondary">Buttons, badges, alerts, and icon treatments should feel grouped and comparable rather than stacked in competing cards.</p>

            <div class="bg-surface-subtle rounded p-4 p-lg-5">
                <h3 class="h4 mb-3">Buttons</h3>
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <button class="btn btn-primary" type="button">Primary CTA</button>
                    <button class="btn btn-secondary" type="button">Standard action</button>
                    <button class="btn btn-outline-secondary" type="button">Standard outline</button>
                    <button class="btn btn-dark" type="button">Inverse action</button>
                </div>
                <div class="d-flex flex-wrap gap-3 mb-5">
                    <button class="btn btn-primary btn-circle" type="button" aria-label="Primary circle action">
                        <span class="fa-sharp fa-regular fa-arrow-right" aria-hidden="true"></span>
                    </button>
                    <button class="btn btn-outline-secondary btn-circle" type="button" aria-label="Outline circle action">
                        <span class="fa-sharp fa-regular fa-plus" aria-hidden="true"></span>
                    </button>
                    <button class="btn btn-primary btn-icon btn-icon-start" type="button">
                        <span class="btn-icon-label">Icon Button Start</span>
                        <span class="btn-icon-addon">
                            <span class="btn-icon-badge fa-sharp fa-regular fa-arrow-up-right" aria-hidden="true"></span>
                        </span>
                    </button>
                    <button class="btn btn-primary btn-icon btn-icon-end" type="button">
                        <span class="btn-icon-label">Icon Button End</span>
                        <span class="btn-icon-addon">
                            <span class="btn-icon-badge fa-sharp fa-regular fa-arrow-up-right" aria-hidden="true"></span>
                        </span>
                    </button>
                </div>

                <h3 class="h4 mb-3">Badges</h3>
                <div class="d-flex flex-wrap gap-2 mb-5">
                    <span class="badge text-bg-primary rounded-pill px-3 py-2">Featured</span>
                    <span class="badge text-bg-warning rounded-pill px-3 py-2">Deadline</span>
                    <span class="badge text-bg-light rounded-pill px-3 py-2">New</span>
                </div>

                <h3 class="h4 mb-3">Alert</h3>
                <div class="alert alert-warning d-flex gap-3 align-items-start mb-5" role="alert">
                    <span class="fa-sharp fa-regular fa-circle-info mt-1" aria-hidden="true"></span>
                    <div>
                        <strong>Alert tones now live in the yellow family.</strong>
                        <div class="text-body-secondary">Focus rings, contrast, and keyboard access are part of the shared foundation rather than per-component cleanup.</div>
                    </div>
                </div>

                <h3 class="h4 mb-3">Brand Icon Sample</h3>
                <p class="text-body-secondary">Local Font Awesome assets are wired for Brands and Sharp usage.</p>
                <div class="d-flex align-items-center gap-3 fs-3">
                    <span class="fa-brands fa-instagram" aria-hidden="true"></span>
                    <span class="fa-brands fa-linkedin-in" aria-hidden="true"></span>
                    <span class="fa-sharp fa-solid fa-arrow-right" aria-hidden="true"></span>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5" aria-labelledby="forms-heading">
        <div class="container">
            <h2 id="forms-heading">Forms</h2>
            <p class="text-body-secondary">This keeps the same accessible control states, just in a more readable single-flow section.</p>

            <div class="bg-surface-subtle rounded p-4 p-lg-5">
                <form class="row g-4" novalidate>
                    <div class="col-md-6">
                        <label class="form-label" for="sg-name">Full name</label>
                        <input id="sg-name" class="form-control" type="text" placeholder="Jordan Lee">
                        <div class="form-text">Text input help text.</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="sg-email">Email</label>
                        <input id="sg-email" class="form-control is-valid" type="email" value="jordan@example.edu">
                    </div>
                    <div class="col-12 col-lg-7">
                        <label class="form-label" for="sg-search">Search-style input</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 rounded-start px-4 text-primary">
                                <span class="fa-sharp fa-regular fa-magnifying-glass" aria-hidden="true"></span>
                            </span>
                            <input id="sg-search" class="form-control border-start-0 border-end-0 px-0" type="search" placeholder="Ask a question / search">
                            <button class="btn bg-white border border-start-0 rounded-end px-4 text-body" type="button" aria-label="Open search options">
                                <span class="fa-sharp fa-regular fa-chevron-down" aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="form-text">Optional icon and dropdown affordance follow the same shell.</div>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="sg-topic">Topic</label>
                        <select id="sg-topic" class="form-select">
                            <option selected>Choose a topic</option>
                            <option>Admissions</option>
                            <option>Programs</option>
                            <option>Student support</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="sg-message">Message</label>
                        <textarea id="sg-message" class="form-control is-invalid" rows="4" aria-describedby="sg-message-note"></textarea>
                        <div id="sg-message-note" class="invalid-feedback">Validation feedback should remain clear in color and text.</div>
                    </div>
                    <div class="col-12 d-flex flex-wrap gap-3">
                        <div class="form-check">
                            <input id="sg-updates" class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label" for="sg-updates">Send program updates</label>
                        </div>
                        <div class="form-check">
                            <input id="sg-privacy" class="form-check-input" type="checkbox">
                            <label class="form-check-label" for="sg-privacy">Accept privacy notice</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="mb-5" aria-labelledby="tables-heading">
        <div class="container">
            <h2 id="tables-heading">Tables</h2>
            <p class="text-body-secondary">Bootstrap table patterns are available for content-heavy views, comparison grids, and structured data.</p>

            <div class="bg-surface-subtle rounded p-4 p-lg-5">
                <h3 class="h4 mb-3">Default Table</h3>
                <div class="table-responsive mb-5">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Program</th>
                                <th scope="col">Award</th>
                                <th scope="col">Units</th>
                                <th scope="col">Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Graphic Design</td>
                                <td>Associate Degree</td>
                                <td>60</td>
                                <td>LAC</td>
                            </tr>
                            <tr>
                                <td>Nursing</td>
                                <td>Associate Degree</td>
                                <td>72</td>
                                <td>PCC</td>
                            </tr>
                            <tr>
                                <td>Welding</td>
                                <td>Certificate</td>
                                <td>36</td>
                                <td>LAC</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3 class="h4 mb-3">Striped Table</h3>
                <div class="table-responsive">
                    <table class="table table-striped align-middle mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Event</th>
                                <th scope="col">Format</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>August 12</td>
                                <td>Student Orientation</td>
                                <td>Virtual</td>
                                <td><span class="badge text-bg-primary rounded-pill">Open</span></td>
                            </tr>
                            <tr>
                                <td>August 18</td>
                                <td>Financial Aid Lab</td>
                                <td>In Person</td>
                                <td><span class="badge text-bg-warning rounded-pill">Soon</span></td>
                            </tr>
                            <tr>
                                <td>August 24</td>
                                <td>First Day of Classes</td>
                                <td>Campuswide</td>
                                <td><span class="badge text-bg-light rounded-pill">Upcoming</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5" aria-labelledby="components-heading">
        <div class="container">
            <h2 id="components-heading">Components</h2>
            <p class="text-body-secondary">Cards, navigation helpers, accordion behavior, and modal styling still live here, but in clearer groups.</p>

            <div class="row g-4">
                <div class="col-xl-6">
                    <div class="bg-surface-subtle rounded p-4 h-100">
                        <h3 class="h4 mb-3">Navigation Patterns</h3>
                        <nav aria-label="Breadcrumb">
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Programs</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Design Systems</li>
                            </ol>
                        </nav>
                        <nav aria-label="Pagination">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <span class="page-link" aria-label="Previous page">
                                        <span class="fa-sharp fa-solid fa-arrow-left" aria-hidden="true"></span>
                                    </span>
                                </li>
                                <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next page">
                                        <span class="fa-sharp fa-solid fa-arrow-right" aria-hidden="true"></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="bg-surface-subtle rounded p-4 h-100">
                        <h3 class="h4 mb-3">Card</h3>
                        <article class="card shadow-sm border-0">
                            <div class="card-body p-4">
                                <p class="eyebrow mb-2">Feature card</p>
                                <h4 class="card-title h4">Reusable shells come before page-specific solutions.</h4>
                                <p class="card-text text-body-secondary">The starter card styling leans on Bootstrap variables, shared radius tokens, and semantic surfaces instead of one-off overrides.</p>
                                <a class="btn btn-outline-secondary" href="#">Explore documentation</a>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="bg-surface-subtle rounded p-4 h-100">
                        <h3 class="h4 mb-3">Accordion</h3>
                        <div class="accordion" id="styleguide-accordion">
                            <div class="accordion-item">
                                <h4 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-one" aria-expanded="true" aria-controls="collapse-one">
                                        Why start with a style guide shell?
                                    </button>
                                </h4>
                                <div id="collapse-one" class="accordion-collapse collapse show" data-bs-parent="#styleguide-accordion">
                                    <div class="accordion-body">It lets us validate the token system, Bootstrap configuration, and accessibility baseline before component complexity multiplies.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h4 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-two" aria-expanded="false" aria-controls="collapse-two">
                                        What is intentionally missing?
                                    </button>
                                </h4>
                                <div id="collapse-two" class="accordion-collapse collapse" data-bs-parent="#styleguide-accordion">
                                    <div class="accordion-body">Detailed templates, production content modules, and final icon/image assets are still intentionally deferred.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="bg-surface-subtle rounded p-4 h-100">
                        <h3 class="h4 mb-3">Modal</h3>
                        <p class="text-body-secondary">Modal styling inherits the shared radius, shadow, and typography tokens instead of creating a separate visual system.</p>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#styleguideModal">Open modal</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<div class="modal fade" id="styleguideModal" tabindex="-1" aria-labelledby="styleguideModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="styleguideModalLabel" class="modal-title fs-5">Starter modal</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Modal styling inherits the shared radius, shadow, and typography tokens instead of creating a separate visual system.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Primary action</button>
            </div>
        </div>
    </div>
</div>

<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
