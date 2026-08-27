<?php
$wellExamples = [];

ob_start();
?>
<div class="d-grid gap-3">
    <div>
        <h3 class="h4 mb-2">General Information</h3>
        <p class="mb-0">Use this snippet as a flexible content well for mixed editorial content, supporting components, or small layout groupings inside a styled container.</p>
    </div>
    <?php
    component_buttons(
        [
            ['text' => 'Primary Action', 'url' => '#', 'style' => 'btn-primary'],
            ['text' => 'Secondary Action', 'url' => '#', 'style' => 'btn-outline-secondary']
        ],
        'row',
        2
    );
    ?>
</div>
<?php
$wellExamples[] = [
    'label' => 'Surface Subtle / Default Padding',
    'style' => 'surface-subtle',
    'padding' => 'p-4',
    'custom_class' => '',
    'content' => ob_get_clean()
];

ob_start();
?>
<div class="d-grid gap-3">
    <div class="d-flex flex-wrap gap-2">
        <?php component_badge('Important', 'yellow', 'fa-circle-exclamation'); ?>
        <?php component_badge('Student Support', 'water', 'fa-hand-holding-heart'); ?>
    </div>
    <div>
        <h3 class="h4 mb-2">Flexible Mixed Content</h3>
        <p class="mb-3">Because everything lives directly inside the <code>.card</code> wrapper, this works well for notices, grouped utility content, nested components, or custom layouts.</p>
        <ul class="mb-0">
            <li>Short editorial copy</li>
            <li>Lists, buttons, or badges</li>
            <li>Any snippet-specific HTML you need</li>
        </ul>
    </div>
</div>
<?php
$wellExamples[] = [
    'label' => 'White Border / Compact Padding',
    'style' => 'white-border',
    'padding' => 'p-3',
    'custom_class' => 'shadow-sm',
    'content' => ob_get_clean()
];

ob_start();
?>
<div class="row g-3 align-items-center">
    <div class="col-md-7">
        <h3 class="h4 mb-2">Component Grouping</h3>
        <p class="mb-0">This variation shows the well acting as a wrapper for richer content patterns and media, without forcing a separate card content model.</p>
    </div>
    <div class="col-md-5">
        <img src="<?php echo lbcc_escape(lbcc_url('/_resources/images/lac-thumb.jpg')); ?>" alt="Students" class="rounded-3 img-fluid w-100">
    </div>
</div>
<?php
$wellExamples[] = [
    'label' => 'Sunhaze Gradient / Spacious Padding',
    'style' => 'sunhaze-gradient',
    'padding' => 'p-5',
    'custom_class' => '',
    'content' => ob_get_clean()
];
?>

<p>This snippet is intended to function more like a flexible well than a structured card component. Place any trusted content directly inside the <code>.card</code> wrapper and control the presentation with a small set of wrapper options.</p>

<div class="row row-cols-1 row-cols-lg-3 g-4">
    <?php foreach ($wellExamples as $example) { ?>
        <div class="col">
            <p class="eyebrow-sm mb-2"><?php echo lbcc_escape($example['label']); ?></p>
            <?php
            snippet_card_well(
                $example['content'],
                $example['style'],
                $example['padding'],
                $example['custom_class']
            );
            ?>
        </div>
    <?php } ?>
</div>

<h3 class="h5 mb-3 mt-4">Options</h3>
<div class="table-responsive">
    <table class="table align-middle">
        <thead>
            <tr>
                <th scope="col">Field</th>
                <th scope="col">Type</th>
                <th scope="col">Notes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Style</td>
                <td>string</td>
                <td>Supported values are <code>white</code>, <code>white-border</code>, <code>surface-subtle</code>, <code>surface-raised</code>, <code>surface-water</code>, and <code>sunhaze-gradient</code>.</td>
            </tr>
            <tr>
                <td>Padding</td>
                <td>string</td>
                <td>Pass Bootstrap spacing utility classes such as <code>p-2</code>, <code>p-4</code>, <code>px-5 py-4</code>, or leave blank if you want to handle spacing inside the content.</td>
            </tr>
            <tr>
                <td>Custom Class</td>
                <td>string</td>
                <td>Optional additional classes for one-off presentation adjustments, for example <code>shadow-sm</code> or <code>match-height-row</code>.</td>
            </tr>
            <tr>
                <td>Content</td>
                <td>HTML string</td>
                <td>Trusted freeform content placed directly inside the wrapper, including components, media, lists, buttons, or editorial HTML.</td>
            </tr>
        </tbody>
    </table>
</div>
