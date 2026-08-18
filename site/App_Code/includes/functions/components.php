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

// Badge
// $style options: light, dark, yellow, or water
// $icon is a Font Awesome icon class
function component_badge(
    $text = '',
    $style = 'light',
    $icon = ''
) {
    if ($text === '') {
        return;
    }

    $style = in_array($style, ['light', 'dark', 'yellow', 'water'], true) ? $style : 'light';

    $badgeClasses = [
        'badge',
        'rounded-pill',
        'd-inline-flex',
        'align-items-center',
        'gap-2'
    ];

    if ($style === 'dark') {
        $badgeClasses[] = 'bg-dark';
        $badgeClasses[] = 'text-light';
    } elseif ($style === 'yellow') {
        $badgeClasses[] = 'bg-yellow-300';
        $badgeClasses[] = 'text-dark';
    } elseif ($style === 'water') {
        $badgeClasses[] = 'bg-surface-water';
        $badgeClasses[] = 'text-dark';
    } else {
        $badgeClasses[] = 'bg-white';
        $badgeClasses[] = 'text-dark';
    }
    ?>
    <span class="<?php echo lbcc_escape(implode(' ', $badgeClasses)); ?>">
        <?php if (!empty($icon)) { ?>
            <span class="fa-sharp fa-regular <?php echo lbcc_escape($icon); ?>" aria-hidden="true"></span>
        <?php } ?>
        <span><?php echo lbcc_escape($text); ?></span>
    </span>
<?php }

// Footer "I Heart LB"
// $hearts accepts an array of SVG paths or item arrays with src and alt
function component_footer_i_heart_lb($hearts = [])
{
    $defaultHearts = [
        '_resources/images/i-heart-lb/heart-1.svg',
        '_resources/images/i-heart-lb/heart-2.svg',
        '_resources/images/i-heart-lb/heart-3.svg',
        '_resources/images/i-heart-lb/heart-4.svg',
        '_resources/images/i-heart-lb/heart-5.svg',
        '_resources/images/i-heart-lb/heart-6.svg'
    ];

    $hearts = is_array($hearts) && !empty($hearts) ? array_values($hearts) : $defaultHearts;
    $iMark = '_resources/images/i-heart-lb/i.svg';
    $lbMark = '_resources/images/i-heart-lb/lb.svg';
    ?>
    <div
        class="component-footer-i-heart-lb position-relative d-inline-flex align-items-center"
        data-lbcc-i-heart-lb
        role="img"
        aria-label="I Heart LB"
    >
        <img
            class="component-footer-i-heart-lb__mark component-footer-i-heart-lb__mark--i"
            src="<?php echo lbcc_escape(lbcc_url($iMark)); ?>"
            alt=""
            aria-hidden="true"
        >

        <div class="component-footer-i-heart-lb__hearts">
            <div class="swiper component-footer-i-heart-lb__swiper" data-lbcc-i-heart-lb-swiper>
                <div class="swiper-wrapper">
                    <?php foreach ($hearts as $heart) {
                        $heartSrc = '';
                        $heartAlt = 'Heart';

                        if (is_array($heart)) {
                            $heartSrc = !empty($heart['src']) ? (string) $heart['src'] : '';
                            $heartAlt = !empty($heart['alt']) ? (string) $heart['alt'] : $heartAlt;
                        } else {
                            $heartSrc = (string) $heart;
                        }

                        if ($heartSrc === '') {
                            continue;
                        }
                        ?>
                        <div class="swiper-slide">
                            <img
                                class="component-footer-i-heart-lb__heart"
                                src="<?php echo lbcc_escape(lbcc_url($heartSrc)); ?>"
                                alt=""
                                aria-hidden="true"
                            >
                        </div>
                    <?php } ?>
                </div>
            </div>

            <button
                class="component-footer-i-heart-lb__toggle btn btn-dark btn-sm btn-circle"
                type="button"
                aria-label="Pause heart animation"
                aria-pressed="false"
                data-lbcc-i-heart-lb-toggle
            >
                <span class="fa-sharp fa-regular fa-pause" aria-hidden="true" data-lbcc-i-heart-lb-icon="pause"></span>
                <span class="fa-sharp fa-regular fa-play d-none" aria-hidden="true" data-lbcc-i-heart-lb-icon="play"></span>
            </button>
        </div>

        <img
            class="component-footer-i-heart-lb__mark component-footer-i-heart-lb__mark--lb"
            src="<?php echo lbcc_escape(lbcc_url($lbMark)); ?>"
            alt=""
            aria-hidden="true"
        >
    </div>
<?php }

// Hero
// $type options: split or full
// $mediaSlotOne and $mediaSlotTwo accept arrays of media items with:
// type (image or video), src, alt, poster
// $supplementalContent and $breadcrumbsHtml accept trusted HTML content
function component_hero(
    $type = 'split',
    $title = '',
    $supplementalContent = '',
    $mediaSlotOne = [],
    $mediaSlotTwo = [],
    $showBreadcrumbs = true,
    $breadcrumbsHtml = ''
) {
    $type = in_array($type, ['split', 'full'], true) ? $type : 'split';

    $componentClasses = [
        'component-hero',
        'component-hero--' . $type
    ];
    ?>
    <section class="<?php echo lbcc_escape(implode(' ', $componentClasses)); ?>">
        <div class="component-hero__inner">
            <div class="component-hero__content">
                <?php if ($showBreadcrumbs) { ?>
                    <div class="component-hero__breadcrumbs">
                        <?php if (!empty($breadcrumbsHtml)) { ?>
                            <?php echo $breadcrumbsHtml; ?>
                        <?php } else { ?>
                            <nav aria-label="Breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Section</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo lbcc_escape($title ?: 'Current Page'); ?></li>
                                </ol>
                            </nav>
                        <?php } ?>
                    </div>
                <?php } ?>

                <?php if (!empty($title)) { ?>
                    <h2 class="component-hero__title"><?php echo lbcc_escape($title); ?></h2>
                <?php } ?>

                <?php if (!empty($supplementalContent)) { ?>
                    <div class="component-hero__supplemental-content">
                        <?php echo $supplementalContent; ?>
                    </div>
                <?php } ?>
            </div>

            <div class="component-hero__media">
                <?php component_hero_media_slot($mediaSlotOne, '1'); ?>
                <?php if ($type === 'full') { ?>
                    <?php component_hero_media_slot($mediaSlotTwo, '2'); ?>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }

function component_hero_media_slot($mediaItems = [], $slotLabel = '1')
{
    $mediaItems = is_array($mediaItems) ? array_values($mediaItems) : [];
    $hasMultipleItems = count($mediaItems) > 1;
    ?>
    <div class="component-hero__media-slot component-hero__media-slot--<?php echo lbcc_escape((string) $slotLabel); ?>">
        <div class="component-hero__media-slot-meta d-flex align-items-center justify-content-between gap-3 mb-3">
            <p class="eyebrow-sm mb-0">Media Slot <?php echo lbcc_escape((string) $slotLabel); ?></p>
            <p class="mb-0 text-body-secondary fs-xs"><?php echo $hasMultipleItems ? 'Swiper-ready multi-item media set' : 'Single background media item'; ?></p>
        </div>

        <?php if (empty($mediaItems)) { ?>
            <div class="component-hero__media-placeholder bg-surface-subtle border rounded p-4">
                <p class="mb-0 text-body-secondary">No media selected for slot <?php echo lbcc_escape((string) $slotLabel); ?>.</p>
            </div>
        <?php } elseif ($hasMultipleItems) { ?>
            <div class="swiper component-hero__media-swiper" data-lbcc-hero-media-swiper>
                <div class="swiper-wrapper">
                    <?php foreach ($mediaItems as $mediaItem) { ?>
                        <div class="swiper-slide">
                            <?php component_hero_media_item($mediaItem); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } else { ?>
            <?php component_hero_media_item($mediaItems[0]); ?>
        <?php } ?>
    </div>
<?php }

function component_hero_media_item($mediaItem = [])
{
    if (!is_array($mediaItem) || empty($mediaItem['src'])) {
        return;
    }

    $mediaType = !empty($mediaItem['type']) && $mediaItem['type'] === 'video' ? 'video' : 'image';
    $src = (string) $mediaItem['src'];
    $alt = !empty($mediaItem['alt']) ? (string) $mediaItem['alt'] : '';
    $poster = !empty($mediaItem['poster']) ? (string) $mediaItem['poster'] : '';
    ?>
    <div class="component-hero__media-item border rounded overflow-hidden">
        <?php if ($mediaType === 'video') { ?>
            <video class="component-hero__video w-100" autoplay muted loop playsinline preload="metadata"<?php if (!empty($poster)) { ?> poster="<?php echo lbcc_escape(lbcc_url($poster)); ?>"<?php } ?>>
                <source src="<?php echo lbcc_escape(lbcc_url($src)); ?>">
            </video>
        <?php } else { ?>
            <img class="component-hero__image w-100" src="<?php echo lbcc_escape(lbcc_url($src)); ?>" alt="<?php echo lbcc_escape($alt); ?>">
        <?php } ?>
        <div class="component-hero__media-item-meta p-3 bg-white border-top">
            <p class="mb-1 fw-semibold"><?php echo $mediaType === 'video' ? 'Video Background' : 'Image Background'; ?></p>
            <p class="mb-0 text-body-secondary fs-xs"><?php echo lbcc_escape($src); ?></p>
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
