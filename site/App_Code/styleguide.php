<?php
require_once dirname(__DIR__) . '/_resources/php/template-helpers.php';
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
?>
<!DOCTYPE html>
<html lang="en">
<?php lbcc_head($page); ?>
<body class="lbcc-page">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<main id="main-content" class="py-5">
    <div class="container">
        <header class="mb-5">
            <p class="eyebrow">Foundation</p>
            <h1>LBCC Style Guide</h1>
            <p class="lead text-body-secondary container-reading mb-0">This starter shell focuses on design tokens, Bootstrap mappings, and accessible baseline patterns we can build on during the next implementation passes.</p>
        </header>

        <section class="section-spacing" aria-labelledby="color-heading">
            <div class="d-flex flex-wrap justify-content-between gap-3 align-items-end mb-4">
                <div>
                    <p class="eyebrow mb-2">Color</p>
                    <h2 id="color-heading" class="mb-0">Raw palette and semantic surfaces</h2>
                </div>
                <p class="mb-0 text-body-secondary fs-7">This section now lists every raw palette token and every semantic color alias currently defined in Sass.</p>
            </div>

            <div class="mb-5">
                <p class="eyebrow mb-2">Raw Palette</p>
                <p class="text-body-secondary container-reading">Foundational color values from <code>_palette.scss</code>. These are the direct source tokens the semantic system maps to.</p>

                <?php foreach ($rawPaletteGroups as $groupName => $swatches) { ?>
                    <div class="mt-4">
                        <h3 class="h5 mb-3"><?php echo lbcc_escape($groupName); ?></h3>
                        <div class="row g-3">
                            <?php foreach ($swatches as $swatch) { ?>
                                <div class="col-sm-6 col-lg-4 col-xl-3">
                                    <article class="swatch-card">
                                        <div class="swatch" style="background-color: <?php echo lbcc_escape($swatch['hex']); ?>"></div>
                                        <h4 class="h6 mb-1"><?php echo lbcc_escape($swatch['name']); ?></h4>
                                        <p class="mb-1"><code><?php echo lbcc_escape($swatch['sass']); ?></code></p>
                                        <p class="mb-0 text-body-secondary fs-7"><?php echo lbcc_escape($swatch['hex']); ?></p>
                                    </article>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div>
                <p class="eyebrow mb-2">Semantic Color Tokens</p>
                <p class="text-body-secondary container-reading">Implementation-facing aliases from <code>_semantic-colors.scss</code>. These are the variables we should usually reference in components.</p>

                <?php foreach ($semanticColorGroups as $groupName => $swatches) { ?>
                    <div class="mt-4">
                        <h3 class="h5 mb-3"><?php echo lbcc_escape($groupName); ?></h3>
                        <div class="row g-3">
                            <?php foreach ($swatches as $swatch) { ?>
                                <div class="col-sm-6 col-lg-4 col-xl-3">
                                    <article class="swatch-card">
                                        <div class="swatch" style="background-color: <?php echo lbcc_escape($swatch['hex']); ?>"></div>
                                        <h4 class="h6 mb-1"><?php echo lbcc_escape($swatch['name']); ?></h4>
                                        <p class="mb-1"><code><?php echo lbcc_escape($swatch['sass']); ?></code></p>
                                        <p class="mb-1 text-body-secondary fs-7">Maps to <code><?php echo lbcc_escape($swatch['maps_to']); ?></code></p>
                                        <p class="mb-0 text-body-secondary fs-7"><?php echo lbcc_escape($swatch['hex']); ?></p>
                                    </article>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>

        <section class="section-spacing" aria-labelledby="type-heading">
            <p class="eyebrow mb-2">Typography</p>
            <h2 id="type-heading">Responsive type scale</h2>
            <div class="surface-card p-4 p-lg-5">
                <h1>Heading 1 pairs structure with warmth.</h1>
                <h2>Heading 2 establishes hierarchy quickly.</h2>
                <h3>Heading 3 supports modular sections.</h3>
                <h4>Heading 4 keeps supporting content legible.</h4>
                <h5>Heading 5 works well in cards and utility blocks.</h5>
                <h6>Heading 6 supports dense metadata.</h6>
                <p class="mb-3">Body copy uses a slightly roomier mobile baseline to support readability while preserving the overall design direction from the handoff.</p>
                <p class="fs-7 text-body-secondary mb-2">Utility `fs-7` supports compact helper content.</p>
                <p class="fs-8 text-body-secondary mb-2">Utility `fs-8` supports dense secondary metadata.</p>
                <p class="fs-9 text-body-secondary mb-0">Utility `fs-9` is reserved for careful, limited use.</p>
            </div>
        </section>

        <section class="section-spacing" aria-labelledby="actions-heading">
            <p class="eyebrow mb-2">Actions</p>
            <h2 id="actions-heading">Buttons, badges, and alerts</h2>
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="surface-card p-4 h-100">
                        <div class="d-flex flex-wrap gap-3 mb-4">
                            <button class="btn btn-primary" type="button">Primary CTA</button>
                            <button class="btn btn-secondary" type="button">Standard action</button>
                            <button class="btn btn-outline-secondary" type="button">Standard outline</button>
                            <button class="btn btn-dark" type="button">Inverse action</button>
                        </div>
                        <div class="d-flex flex-wrap gap-2 mb-4">
                            <span class="badge text-bg-primary rounded-pill px-3 py-2">Featured</span>
                            <span class="badge text-bg-warning rounded-pill px-3 py-2">Deadline</span>
                            <span class="badge text-bg-light rounded-pill px-3 py-2">New</span>
                        </div>
                        <div class="alert alert-warning d-flex gap-3 align-items-start mb-0" role="alert">
                            <span class="fa-sharp fa-regular fa-circle-info mt-1" aria-hidden="true"></span>
                            <div>
                                <strong>Alert tones now live in the yellow family.</strong>
                                <div class="text-body-secondary">Focus rings, contrast, and keyboard access are part of the shared foundation rather than per-component cleanup.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="surface-card p-4 h-100">
                        <h3 class="h5">Brand icon sample</h3>
                        <p class="text-body-secondary">Local Font Awesome assets are wired for Brands and Sharp usage.</p>
                        <div class="d-flex align-items-center gap-3 fs-3">
                            <span class="fa-brands fa-instagram" aria-hidden="true"></span>
                            <span class="fa-brands fa-linkedin-in" aria-hidden="true"></span>
                            <span class="fa-sharp fa-solid fa-arrow-right" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-spacing" aria-labelledby="forms-heading">
            <p class="eyebrow mb-2">Forms</p>
            <h2 id="forms-heading">Accessible control states</h2>
            <div class="surface-card p-4 p-lg-5">
                <form class="row g-4" novalidate>
                    <div class="col-md-6">
                        <label class="form-label" for="sg-name">Full name</label>
                        <input id="sg-name" class="form-control" type="text" placeholder="Jordan Lee">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="sg-email">Email</label>
                        <input id="sg-email" class="form-control is-valid" type="email" value="jordan@example.edu">
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
        </section>

        <section class="section-spacing" aria-labelledby="components-heading">
            <p class="eyebrow mb-2">Components</p>
            <h2 id="components-heading">Cards, breadcrumbs, pagination, and accordion</h2>
            <div class="row g-4">
                <div class="col-xl-6">
                    <div class="surface-card p-4 h-100">
                        <nav aria-label="Breadcrumb">
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Programs</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Design Systems</li>
                            </ol>
                        </nav>
                        <article class="card shadow-sm border-0">
                            <div class="card-body p-4">
                                <p class="eyebrow mb-2">Feature card</p>
                                <h3 class="card-title h4">Reusable shells come before page-specific solutions.</h3>
                                <p class="card-text text-body-secondary">The starter card styling leans on Bootstrap variables, shared radius tokens, and semantic surfaces instead of one-off overrides.</p>
                                <a class="btn btn-outline-secondary" href="#">Explore documentation</a>
                            </div>
                        </article>
                        <nav class="mt-4" aria-label="Pagination">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled"><span class="page-link">Previous</span></li>
                                <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="surface-card p-4 h-100">
                        <div class="accordion" id="styleguide-accordion">
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-one" aria-expanded="true" aria-controls="collapse-one">
                                        Why start with a style guide shell?
                                    </button>
                                </h3>
                                <div id="collapse-one" class="accordion-collapse collapse show" data-bs-parent="#styleguide-accordion">
                                    <div class="accordion-body">It lets us validate the token system, Bootstrap configuration, and accessibility baseline before component complexity multiplies.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-two" aria-expanded="false" aria-controls="collapse-two">
                                        What is intentionally missing?
                                    </button>
                                </h3>
                                <div id="collapse-two" class="accordion-collapse collapse" data-bs-parent="#styleguide-accordion">
                                    <div class="accordion-body">Detailed templates, production content modules, and final icon/image assets are still intentionally deferred.</div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#styleguideModal">Open modal</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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
</body>
</html>
