<?php

// Block Arrow Link
// $icon is a Font Awesome icon class
// $size options: default, sm, lg
// $style options: dark or light
function component_block_arrow_link(
    $link = '#',
    $icon = '',
    $image = '',
    $text = '',
    $size = 'default',
    $style = 'dark'
) { ?>
    <a href="<?php echo lbcc_escape($link); ?>" class="arrow-link component-block-arrow-link component-block-arrow-link__size-<?php echo lbcc_escape($size); ?> component-block-arrow-link__style-<?php echo lbcc_escape($style); ?>">
        <?php if(!empty($icon)) { ?>
            <span class="fa-sharp fa-regular <?php echo lbcc_escape($icon); ?>"></span>
        <?php } else if(!empty($image)) { ?>
            <span class="component-block-arrow-link__image" style="background-image: url('<?php echo lbcc_escape(lbcc_url($image)); ?>');"></span>
        <?php } ?>
        <span class="component-block-arrow-link__text">
            <?php echo lbcc_escape($text); ?>
        </span>
    </a>
<?php }

// Buttons
// $display options: row, column, or block
// $gap options: 1 through 5
// $buttons is an array of button arrays with:
// style, text, url, size, icon, icon_position
function component_buttons(
    $buttons = [],
    $display = 'row',
    $gap = 3
) {
    if (empty($buttons) || !is_array($buttons)) {
        return;
    }

    $display = in_array($display, ['row', 'column', 'block'], true) ? $display : 'row';
    $gap = (int) $gap;

    if ($gap < 1 || $gap > 5) {
        $gap = 3;
    }

    if ($display === 'block') {
        $wrapperClasses = [
            'd-grid',
            'gap-' . $gap,
            'w-100'
        ];
    } else {
        $wrapperClasses = [
            'd-flex',
            'gap-' . $gap
        ];
    }

    if ($display === 'column') {
        $wrapperClasses[] = 'flex-column';
        $wrapperClasses[] = 'align-items-start';
    } elseif ($display === 'row') {
        $wrapperClasses[] = 'flex-row';
        $wrapperClasses[] = 'flex-wrap';
    }
    $outerWrapperClasses = [];

    if ($display === 'block') {
        $outerWrapperClasses[] = 'w-100';
    }
    ?>
    <div class="<?php echo lbcc_escape(implode(' ', $outerWrapperClasses)); ?>">
        <div class="<?php echo lbcc_escape(implode(' ', $wrapperClasses)); ?>">
        <?php foreach ($buttons as $button) {
            if (!is_array($button) || empty($button['text'])) {
                continue;
            }

            $style = !empty($button['style']) ? trim((string) $button['style']) : 'btn-primary';
            $text = (string) $button['text'];
            $url = !empty($button['url']) ? (string) $button['url'] : '#';
            $size = !empty($button['size']) ? trim((string) $button['size']) : '';
            $icon = !empty($button['icon']) ? trim((string) $button['icon']) : '';
            $iconPosition = !empty($button['icon_position']) ? trim((string) $button['icon_position']) : 'end';

            $buttonClasses = [
                'btn',
                $style
            ];

            if (in_array($size, ['btn-sm', 'btn-lg'], true)) {
                $buttonClasses[] = $size;
            }

            if (!empty($icon)) {
                $buttonClasses[] = 'btn-icon';
                $buttonClasses[] = $iconPosition === 'start' ? 'btn-icon-start' : 'btn-icon-end';
            }

            if ($display === 'block') {
                $buttonClasses[] = 'w-100';
            }

            $labelClasses = ['btn-icon-label'];

            if ($display === 'block') {
                $labelClasses[] = 'w-100';
            }
            ?>
            <a href="<?php echo lbcc_escape($url); ?>" class="<?php echo lbcc_escape(implode(' ', $buttonClasses)); ?>">
                <?php if (!empty($icon)) { ?>
                    <span class="<?php echo lbcc_escape(implode(' ', $labelClasses)); ?>"><?php echo lbcc_escape($text); ?></span>
                    <span class="btn-icon-addon">
                        <span class="btn-icon-badge fa-sharp fa-regular <?php echo lbcc_escape($icon); ?>" aria-hidden="true"></span>
                    </span>
                <?php } else { ?>
                    <?php echo lbcc_escape($text); ?>
                <?php } ?>
            </a>
        <?php } ?>
        </div>
    </div>
<?php }

// Quicklinks
// $variation options: card, icon, or icon-circled
// $size options: xl, lg, default, or sm
// $textClass options: text-dark or text-white
// $iconColorClass options: any text utility class, for example text-primary
// $quicklinks is an array of quick link arrays with:
// text, url, icon
function component_quicklinks(
    $quicklinks = [],
    $variation = 'card',
    $size = 'default',
    $backgroundClass = 'bg-surface-subtle',
    $textClass = 'text-dark',
    $iconColorClass = 'text-primary',
    $mobilePerRow = 2,
    $tabletPerRow = 3,
    $desktopPerRow = 4
) {
    if (empty($quicklinks) || !is_array($quicklinks)) {
        return;
    }

    $variation = in_array($variation, ['card', 'icon', 'icon-circled'], true) ? $variation : 'card';
    $size = in_array($size, ['xl', 'lg', 'default', 'sm'], true) ? $size : 'default';
    $textClass = $textClass === 'text-white' ? 'text-white' : 'text-dark';
    $backgroundClass = !empty($backgroundClass) ? trim((string) $backgroundClass) : 'bg-surface-subtle';
    $iconColorClass = !empty($iconColorClass) ? trim((string) $iconColorClass) : 'text-primary';

    $sanitizePerRow = static function ($value, $default) {
        $value = (int) $value;

        if ($value < 1 || $value > 6) {
            return $default;
        }

        return $value;
    };

    $mobilePerRow = $sanitizePerRow($mobilePerRow, 2);
    $tabletPerRow = $sanitizePerRow($tabletPerRow, 3);
    $desktopPerRow = $sanitizePerRow($desktopPerRow, 4);

    $componentClasses = [
        'component-quicklinks',
        'component-quicklinks__variation-' . $variation,
        'component-quicklinks__size-' . $size
    ];

    $rowClasses = [
        'row',
        'g-3',
        'row-cols-' . $mobilePerRow,
        'row-cols-md-' . $tabletPerRow,
        'row-cols-lg-' . $desktopPerRow,
        'lbcc-animate',
        'lbcc-stagger'
    ];
    ?>
    <div class="<?php echo lbcc_escape(implode(' ', $componentClasses)); ?>">
        <div class="<?php echo lbcc_escape(implode(' ', $rowClasses)); ?>">
            <?php foreach ($quicklinks as $quicklink) {
                if (!is_array($quicklink) || empty($quicklink['text']) || empty($quicklink['icon'])) {
                    continue;
                }

                $text = (string) $quicklink['text'];
                $url = !empty($quicklink['url']) ? (string) $quicklink['url'] : '#';
                $icon = trim((string) $quicklink['icon']);

                $linkClasses = [
                    'component-quicklink',
                    'd-flex',
                    'flex-column',
                    'align-items-center',
                    'gap-3',
                    'h-100',
                    'text-decoration-none',
                    'position-relative',
                    $textClass
                ];

                if ($variation === 'card') {
                    $linkClasses[] = $backgroundClass;
                    $linkClasses[] = 'border';
                    $linkClasses[] = 'rounded-3';
                    $linkClasses[] = 'p-4';
                }
                ?>
                <div class="col">
                    <a href="<?php echo lbcc_escape($url); ?>" class="<?php echo lbcc_escape(implode(' ', $linkClasses)); ?>">
                        <?php if ($variation === 'icon-circled') { ?>
                            <span class="component-quicklink__icon-shell d-inline-flex align-items-center justify-content-center rounded-circle <?php echo lbcc_escape($backgroundClass); ?>">
                                <span class="component-quicklink__icon fa-sharp fa-regular <?php echo lbcc_escape($icon); ?> <?php echo lbcc_escape($iconColorClass); ?>" aria-hidden="true"></span>
                            </span>
                        <?php } else { ?>
                            <span class="component-quicklink__icon fa-sharp fa-regular <?php echo lbcc_escape($icon); ?> <?php echo lbcc_escape($iconColorClass); ?>" aria-hidden="true"></span>
                        <?php } ?>

                        <span class="component-quicklink__text"><?php echo lbcc_escape($text); ?></span>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
<?php }

// Spacer
// $size options: 1 through 10
function component_spacer($size = 3) {
    $size = (int) $size;

    if ($size < 1 || $size > 10) {
        $size = 3;
    }
    ?>
    <div class="component-spacer cs-<?php echo lbcc_escape((string) $size); ?>" aria-hidden="true"></div>
<?php } ?>
