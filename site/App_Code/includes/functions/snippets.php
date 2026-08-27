<?php

function snippet_card_well(
    $content = '',
    $style = 'surface-subtle',
    $padding = 'p-4',
    $customClass = ''
) {
    if ($content === '') {
        return;
    }

    $styleMap = [
        'white' => ['bg-white', 'border-0'],
        'white-border' => ['bg-white', 'border', 'border-primary-subtle'],
        'surface-subtle' => ['bg-surface-subtle', 'border-0'],
        'surface-raised' => ['bg-surface-raised', 'border-0'],
        'surface-water' => ['bg-surface-water', 'border-0'],
        'sunhaze-gradient' => ['bg-sunhaze-gradient', 'border-0']
    ];

    $style = array_key_exists($style, $styleMap) ? $style : 'surface-subtle';
    $padding = trim((string) $padding);
    $customClass = trim((string) $customClass);

    $classes = array_merge(
        ['card', 'rounded-4', 'h-100'],
        $styleMap[$style]
    );

    if ($padding !== '') {
        $classes[] = $padding;
    }

    if ($customClass !== '') {
        $classes[] = $customClass;
    }
    ?>
    <div class="<?php echo lbcc_escape(implode(' ', $classes)); ?>">
        <?php echo $content; ?>
    </div>
<?php }
