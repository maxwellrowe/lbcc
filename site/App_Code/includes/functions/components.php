<?php

function lbcc_slugify($value)
{
    $value = strtolower(trim((string) $value));
    $value = preg_replace('/[^a-z0-9]+/', '-', $value);

    return trim((string) $value, '-');
}

function lbcc_support_matrix_slug($value)
{
    return lbcc_slugify($value);
}

function lbcc_support_matrix_normalize_values($values = [])
{
    if (!is_array($values)) {
        return [];
    }

    $normalized = [];

    foreach ($values as $value) {
        if (!is_string($value)) {
            continue;
        }

        $trimmedValue = trim($value);

        if ($trimmedValue === '' || in_array($trimmedValue, $normalized, true)) {
            continue;
        }

        $normalized[] = $trimmedValue;
    }

    return $normalized;
}

function lbcc_support_matrix_collect_values($items = [], $key = '')
{
    if (!is_array($items) || $key === '') {
        return [];
    }

    $collectedValues = [];

    foreach ($items as $item) {
        if (!is_array($item) || empty($item[$key]) || !is_array($item[$key])) {
            continue;
        }

        foreach (lbcc_support_matrix_normalize_values($item[$key]) as $value) {
            if (in_array($value, $collectedValues, true)) {
                continue;
            }

            $collectedValues[] = $value;
        }
    }

    return $collectedValues;
}

function lbcc_support_matrix_load_data($path = '')
{
    $defaultData = [
        'items' => [],
        'needs' => [],
        'audiences' => []
    ];

    if ($path === '' || !is_readable($path)) {
        return $defaultData;
    }

    $json = file_get_contents($path);

    if ($json === false) {
        return $defaultData;
    }

    $decoded = json_decode($json, true);

    if (!is_array($decoded)) {
        return $defaultData;
    }

    $items = !empty($decoded['items']) && is_array($decoded['items']) ? array_values($decoded['items']) : [];
    $needs = !empty($decoded['needs']) && is_array($decoded['needs']) ? array_values($decoded['needs']) : [];
    $audiences = !empty($decoded['audiences']) && is_array($decoded['audiences']) ? array_values($decoded['audiences']) : [];

    if (empty($needs)) {
        $needs = lbcc_support_matrix_collect_values($items, 'needs');
    }

    if (empty($audiences)) {
        $audiences = lbcc_support_matrix_collect_values($items, 'audiences');
    }

    return [
        'items' => $items,
        'needs' => lbcc_support_matrix_normalize_values($needs),
        'audiences' => lbcc_support_matrix_normalize_values($audiences)
    ];
}

function lbcc_support_matrix_need_icons()
{
    return [
        'Getting Started at LBCC' => 'fa-compass',
        'Counseling & Academic Advising' => 'fa-comments',
        'Planning for Transfer & Careers' => 'fa-briefcase',
        'Financial Assistance' => 'fa-hand-holding-dollar',
        'Health, Well-being & Safety' => 'fa-heart-pulse',
        'Help with Classes & Academics' => 'fa-book-open-cover',
        'Identity-based support & communities' => 'fa-people-group',
        'Graduate from LBCC' => 'fa-graduation-cap'
    ];
}

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

function lbcc_component_attributes($attributes = [])
{
    if (!is_array($attributes) || empty($attributes)) {
        return '';
    }

    $compiledAttributes = [];

    foreach ($attributes as $attribute => $value) {
        if (!is_string($attribute) || trim($attribute) === '' || $value === false || $value === null) {
            continue;
        }

        if ($value === true) {
            $compiledAttributes[] = lbcc_escape($attribute);
            continue;
        }

        $compiledAttributes[] = lbcc_escape($attribute) . '="' . lbcc_escape((string) $value) . '"';
    }

    return empty($compiledAttributes) ? '' : ' ' . implode(' ', $compiledAttributes);
}

function lbcc_component_card_image_bg_shell(
    $tag = 'a',
    $title = '',
    $content = '',
    $image = '',
    $label = '',
    $rootClasses = [],
    $attributes = [],
    $contentIsHtml = false,
    $showTopIcon = true,
    $titleSize = 'h4'
) {
    $tag = in_array($tag, ['a', 'article', 'div'], true) ? $tag : 'div';
    $rootClasses = is_array($rootClasses) ? $rootClasses : [$rootClasses];
    $attributes = is_array($attributes) ? $attributes : [];

    $componentClasses = [
        'card',
        'component-card-as-link',
        'component-card-as-link__style-image-bg',
        'h-100',
        'overflow-hidden',
        'position-relative',
        'rounded-4',
        'border-0',
        'text-white'
    ];

    if ($tag !== 'a') {
        $componentClasses[] = 'component-card--static';
    }

    if ($image === '') {
        $componentClasses[] = 'bg-teal-800';
    }

    if (!empty($attributes['class']) && is_string($attributes['class'])) {
        $rootClasses[] = trim($attributes['class']);
    }

    unset($attributes['class']);

    foreach ($rootClasses as $rootClass) {
        if (!is_string($rootClass) || trim($rootClass) === '') {
            continue;
        }

        $componentClasses[] = trim($rootClass);
    }

    $attributes = array_merge(
        [
            'class' => implode(' ', $componentClasses)
        ],
        $attributes
    );
    $showTopIcon = (bool) $showTopIcon;
    $titleSize = in_array($titleSize, ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'], true) ? $titleSize : 'h4';
    ?>
    <<?php echo $tag; ?><?php echo lbcc_component_attributes($attributes); ?>>
        <?php if ($image !== '') { ?>
            <img
                class="card-img component-card-as-link__image-bg"
                src="<?php echo lbcc_escape(lbcc_url($image)); ?>"
                alt=""
            >
        <?php } ?>
        <div class="card-img-overlay component-card-as-link__overlay d-flex flex-column justify-content-between p-3">
            <?php if ($label !== '' || $showTopIcon) { ?>
                <div class="component-card-as-link__top d-flex align-items-start justify-content-between gap-3 position-relative w-100">
                    <?php if ($label !== '') { ?>
                        <span class="component-card-as-link__label d-inline-flex align-items-center justify-content-center"><?php echo lbcc_escape($label); ?></span>
                    <?php } else { ?>
                        <span></span>
                    <?php } ?>

                    <?php if ($showTopIcon) { ?>
                        <span class="component-card-as-link__icon-shell d-inline-flex align-items-center justify-content-center flex-shrink-0" aria-hidden="true">
                            <span class="fa-sharp fa-regular fa-arrow-up-right"></span>
                        </span>
                    <?php } ?>
                </div>
            <?php } ?>

            <div class="component-card-as-link__body component-card-as-link__body--image-bg position-relative d-flex flex-column gap-2 w-100">
                <?php if ($title !== '') { ?>
                    <h2 class="<?php echo lbcc_escape($titleSize); ?> text-white mb-0"><?php echo lbcc_escape($title); ?></h2>
                <?php } ?>

                <?php if ($content !== '') { ?>
                    <div class="component-card-as-link__description"><?php echo $contentIsHtml ? $content : lbcc_escape($content); ?></div>
                <?php } ?>
            </div>
        </div>
    </<?php echo $tag; ?>>
<?php }

// Card
// $style options: image-bg, surface-subtle, surface-raised, surface-water, surface-sun-haze, white, gray-border, red-border
// $content accepts trusted HTML
// $ctas accepts an array of arrays with: link, text
function component_card(
    $title = '',
    $content = '',
    $ctas = [],
    $image = '',
    $style = 'surface-subtle',
    $ctaDisplay = 'arrow-link',
    $shadow = false,
    $label = '',
    $titleSize = 'h3'
) {
    $style = in_array($style, ['image-bg', 'surface-subtle', 'surface-raised', 'surface-water', 'surface-sun-haze', 'white', 'gray-border', 'red-border'], true) ? $style : 'surface-subtle';
    $ctaDisplay = $ctaDisplay === 'button' ? 'button' : 'arrow-link';
    $shadow = (bool) $shadow;
    $ctas = is_array($ctas) ? array_values($ctas) : [];
    $titleSize = in_array($titleSize, ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'], true) ? $titleSize : 'h3';

    if ($style === 'image-bg') {
        $componentClasses = [
            'component-card',
            'component-card__style-image-bg'
        ];

        if ($shadow) {
            $componentClasses[] = 'shadow';
        }

        lbcc_component_card_image_bg_shell(
            'div',
            $title,
            $content,
            $image,
            $label,
            $componentClasses,
            [],
            true,
            false,
            $titleSize
        );

        return;
    }

    $cardClasses = [
        'card',
        'component-card',
        'h-100',
        'rounded-4',
        'overflow-hidden',
        'component-card__style-' . $style
    ];

    if ($shadow) {
        $cardClasses[] = 'shadow';
    }

    $cardStyle = '';

    if ($style === 'surface-raised') {
        $cardClasses[] = 'bg-surface-raised';
        $cardClasses[] = 'border-0';
    } elseif ($style === 'surface-water') {
        $cardClasses[] = 'bg-surface-water';
        $cardClasses[] = 'border-0';
    } elseif ($style === 'surface-sun-haze') {
        $cardClasses[] = 'bg-surface-sun-haze';
        $cardClasses[] = 'border-0';
    } elseif ($style === 'white') {
        $cardClasses[] = 'bg-white';
        $cardClasses[] = 'border-0';
    } elseif ($style === 'gray-border') {
        $cardClasses[] = 'bg-white';
        $cardClasses[] = 'border';
        $cardStyle = 'border-color: var(--color-gray-300); border-width: 1px;';
    } elseif ($style === 'red-border') {
        $cardClasses[] = 'bg-white';
        $cardClasses[] = 'border';
        $cardClasses[] = 'border-primary';
        $cardStyle = 'border-width: 1px;';
    } else {
        $cardClasses[] = 'bg-surface-subtle';
        $cardClasses[] = 'border-0';
    }
    ?>
    <article class="<?php echo lbcc_escape(implode(' ', $cardClasses)); ?>"<?php if ($cardStyle !== '') { ?> style="<?php echo lbcc_escape($cardStyle); ?>"<?php } ?>>
        <?php if (!empty($image)) { ?>
            <img
                class="card-img-top component-card__image"
                src="<?php echo lbcc_escape(lbcc_url($image)); ?>"
                alt=""
            >
        <?php } ?>

        <div class="card-body d-flex flex-column gap-3 p-4">
            <?php if ($title !== '') { ?>
                <h2 class="<?php echo lbcc_escape($titleSize); ?> mb-0 component-card__title"><?php echo lbcc_escape($title); ?></h2>
            <?php } ?>

            <?php if ($content !== '') { ?>
                <div class="component-card__content">
                    <?php echo $content; ?>
                </div>
            <?php } ?>

            <?php if (!empty($ctas)) { ?>
                <div class="component-card__actions d-flex flex-column gap-3 align-items-start justify-content-start mt-auto pt-2">
                    <?php foreach ($ctas as $cta) {
                        if (!is_array($cta) || empty($cta['text'])) {
                            continue;
                        }

                        $ctaLink = !empty($cta['link']) ? (string) $cta['link'] : '#';
                        $ctaText = (string) $cta['text'];
                        $buttonStyle = !empty($cta['style']) ? trim((string) $cta['style']) : 'btn-primary';
                        $buttonSize = !empty($cta['size']) ? trim((string) $cta['size']) : '';
                        ?>
                        <?php if ($ctaDisplay === 'button') { ?>
                            <?php
                            $buttonClasses = [
                                'btn',
                                $buttonStyle
                            ];

                            if (in_array($buttonSize, ['btn-sm', 'btn-lg'], true)) {
                                $buttonClasses[] = $buttonSize;
                            }
                            ?>
                            <a href="<?php echo lbcc_escape($ctaLink); ?>" class="<?php echo lbcc_escape(implode(' ', $buttonClasses)); ?>">
                                <?php echo lbcc_escape($ctaText); ?>
                            </a>
                        <?php } else { ?>
                            <a href="<?php echo lbcc_escape($ctaLink); ?>" class="arrow-link"><?php echo lbcc_escape($ctaText); ?></a>
                        <?php } ?>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </article>
<?php }

// Contact Card
function component_contact_card(
    $name = '',
    $title = '',
    $phone = '',
    $email = '',
    $location = '',
    $fax = '',
    $image = '',
    $layout = 'vertical',
    $style = 'default',
    $profileUrl = '#',
    $profileLinkText = 'View Profile',
    $buttonLink = '',
    $buttonText = 'View Profile',
    $buttonStyle = 'btn-outline-secondary'
) {
    $name = trim((string) $name);

    if ($name === '') {
        return;
    }

    $title = trim((string) $title);
    $phone = trim((string) $phone);
    $email = trim((string) $email);
    $location = trim((string) $location);
    $fax = trim((string) $fax);
    $image = trim((string) $image);
    $layout = $layout === 'horizontal' ? 'horizontal' : 'vertical';
    $style = $style === 'surface' ? 'surface' : 'default';
    $profileUrl = trim((string) $profileUrl) !== '' ? trim((string) $profileUrl) : '#';
    $profileLinkText = trim((string) $profileLinkText);
    $buttonLink = trim((string) $buttonLink);
    $buttonText = trim((string) $buttonText);
    $buttonStyle = trim((string) $buttonStyle) !== '' ? trim((string) $buttonStyle) : 'btn-outline-secondary';
    $imageSrc = $image !== '' && preg_match('#^https?://#i', $image) ? $image : lbcc_url($image);

    if ($buttonText !== '' && $buttonLink === '') {
        $buttonLink = $profileUrl;
    }

    $outerClasses = [
        'card',
        'component-contact-card',
        'component-contact-card__layout-' . $layout,
        'component-contact-card__style-' . $style,
        'h-100',
        'rounded-4'
    ];
    $outerStyle = '';

    if ($style === 'surface') {
        $outerClasses[] = 'bg-surface-subtle';
        $outerClasses[] = 'border-0';
    } else {
        $outerClasses[] = 'bg-white';
        $outerStyle = 'border-color: var(--color-gray-300); border-width: 1px;';
    }

    $identityClasses = [
        'component-contact-card__identity',
        'card',
        'border-0',
        'rounded-3',
        'overflow-hidden',
        'h-100'
    ];

    if ($style === 'surface') {
        $identityClasses[] = 'bg-white';
    } else {
        $identityClasses[] = 'bg-surface-subtle';
    }

    $detailItems = [
        [
            'icon' => 'fa-phone',
            'text' => $phone,
            'href' => $phone !== '' ? 'tel:' . preg_replace('/[^0-9+]/', '', $phone) : ''
        ],
        [
            'icon' => 'fa-envelope',
            'text' => $email,
            'href' => $email !== '' ? 'mailto:' . $email : ''
        ],
        [
            'icon' => 'fa-location-dot',
            'text' => $location,
            'href' => ''
        ],
        [
            'icon' => 'fa-fax',
            'text' => $fax,
            'href' => ''
        ]
    ];

    $details = array_values(array_filter($detailItems, static function ($item) {
        return !empty($item['text']);
    }));

    $detailListClasses = [
        'list-unstyled',
        'mb-0',
        'd-flex'
    ];

    if ($layout === 'horizontal') {
        $detailListClasses[] = 'flex-column';
        $detailListClasses[] = 'flex-xl-row';
        $detailListClasses[] = 'flex-wrap';
        $detailListClasses[] = 'align-items-start';
        $detailListClasses[] = 'gap-3';
        $detailListClasses[] = 'gap-xl-4';
    } else {
        $detailListClasses[] = 'flex-column';
        $detailListClasses[] = 'gap-3';
    }
    ?>
    <article class="<?php echo lbcc_escape(implode(' ', $outerClasses)); ?>"<?php if ($outerStyle !== '') { ?> style="<?php echo lbcc_escape($outerStyle); ?>"<?php } ?>>
        <div class="card-body p-4 d-flex flex-column gap-4">
            <?php if ($layout === 'horizontal') { ?>
                <div class="d-flex flex-column flex-md-row align-items-start gap-3 gap-lg-4 justify-content-between">
                    <div class="<?php echo lbcc_escape(implode(' ', $identityClasses)); ?> flex-grow-1">
                        <div class="d-flex h-100">
                            <?php if ($image !== '') { ?>
                                <div class="component-contact-card__image-shell component-contact-card__image-shell--horizontal flex-shrink-0">
                                    <img
                                        class="component-contact-card__image component-contact-card__image--horizontal"
                                        src="<?php echo lbcc_escape($imageSrc); ?>"
                                        alt=""
                                    >
                                </div>
                            <?php } ?>

                            <div class="card-body p-3 p-lg-4 d-flex flex-column justify-content-center gap-2 min-w-0">
                                <h3 class="h4 fs-2xl mb-0"><?php echo lbcc_escape($name); ?></h3>

                                <?php if ($title !== '') { ?>
                                    <p class="mb-0 text-body-secondary"><?php echo lbcc_escape($title); ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <?php if ($profileLinkText !== '' || $buttonText !== '') { ?>
                        <div class="component-contact-card__actions d-flex flex-column align-items-start gap-3 flex-shrink-0">
                            <?php if ($profileLinkText !== '') { ?>
                                <a href="<?php echo lbcc_escape($profileUrl); ?>" class="arrow-link text-nowrap">
                                    <?php echo lbcc_escape($profileLinkText); ?>
                                </a>
                            <?php } ?>

                            <?php if ($buttonText !== '') { ?>
                                <a href="<?php echo lbcc_escape($buttonLink !== '' ? $buttonLink : '#'); ?>" class="btn btn-sm <?php echo lbcc_escape($buttonStyle); ?>">
                                    <?php echo lbcc_escape($buttonText); ?>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="<?php echo lbcc_escape(implode(' ', $identityClasses)); ?>">
                    <?php if ($image !== '') { ?>
                        <img
                            class="card-img-top component-contact-card__image"
                            src="<?php echo lbcc_escape($imageSrc); ?>"
                            alt=""
                        >
                    <?php } ?>

                    <div class="card-body p-3 p-lg-4 d-flex flex-column gap-2">
                        <h3 class="h4 fs-2xl mb-0"><?php echo lbcc_escape($name); ?></h3>

                        <?php if ($title !== '') { ?>
                            <p class="mb-0 text-body-secondary"><?php echo lbcc_escape($title); ?></p>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>

            <?php if (!empty($details)) { ?>
                <ul class="<?php echo lbcc_escape(implode(' ', $detailListClasses)); ?>">
                    <?php foreach ($details as $detail) { ?>
                        <li class="component-contact-card__detail d-inline-flex align-items-start gap-2 min-w-0">
                            <span class="component-contact-card__detail-icon fa-sharp fa-regular <?php echo lbcc_escape($detail['icon']); ?> text-primary flex-shrink-0" aria-hidden="true"></span>

                            <?php if (!empty($detail['href'])) { ?>
                                <a href="<?php echo lbcc_escape($detail['href']); ?>" class="text-decoration-none">
                                    <?php echo lbcc_escape($detail['text']); ?>
                                </a>
                            <?php } else { ?>
                                <span><?php echo lbcc_escape($detail['text']); ?></span>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>

            <?php if ($layout !== 'horizontal' && ($profileLinkText !== '' || $buttonText !== '')) { ?>
                <div class="component-contact-card__actions d-flex flex-column align-items-start gap-3">
                    <?php if ($profileLinkText !== '') { ?>
                        <a href="<?php echo lbcc_escape($profileUrl); ?>" class="arrow-link text-nowrap">
                            <?php echo lbcc_escape($profileLinkText); ?>
                        </a>
                    <?php } ?>

                    <?php if ($buttonText !== '') { ?>
                        <a href="<?php echo lbcc_escape($buttonLink !== '' ? $buttonLink : '#'); ?>" class="btn btn-sm <?php echo lbcc_escape($buttonStyle); ?>">
                            <?php echo lbcc_escape($buttonText); ?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </article>
<?php }

// Degree / Certificate
// $items is an array of arrays with:
// label, title, links (array of arrays with text and url)
// $layout options: vertical or horizontal
function component_degree_certificates(
    $items = [],
    $layout = 'vertical',
    $mobilePerRow = 1,
    $tabletPerRow = 2,
    $desktopPerRow = 2
) {
    if (empty($items) || !is_array($items)) {
        return;
    }

    $layout = $layout === 'horizontal' ? 'horizontal' : 'vertical';

    $normalizePerRow = static function ($value, $fallback) {
        $value = (int) $value;

        if ($value < 1 || $value > 6) {
            return $fallback;
        }

        return $value;
    };

    $defaultTabletPerRow = $layout === 'horizontal' ? 1 : 2;
    $defaultDesktopPerRow = $layout === 'horizontal' ? 1 : 2;

    $mobilePerRow = $normalizePerRow($mobilePerRow, 1);
    $tabletPerRow = $normalizePerRow($tabletPerRow, $defaultTabletPerRow);
    $desktopPerRow = $normalizePerRow($desktopPerRow, $defaultDesktopPerRow);

    $rowClasses = [
        'row',
        'row-cols-' . $mobilePerRow,
        'row-cols-md-' . $tabletPerRow,
        'row-cols-xl-' . $desktopPerRow,
        'g-4'
    ];
    ?>
    <div class="deg-cert-component">
        <div class="<?php echo lbcc_escape(implode(' ', $rowClasses)); ?>">
        <?php foreach ($items as $item) {
            if (!is_array($item) || empty($item['title'])) {
                continue;
            }

            $label = trim((string) ($item['label'] ?? ''));
            $title = trim((string) ($item['title'] ?? ''));
            $links = !empty($item['links']) && is_array($item['links']) ? array_values($item['links']) : [];

            $cardClasses = [
                'border',
                'border-2',
                'border-primary',
                'rounded-3',
                'bg-white',
                'p-4',
                'h-100',
                'd-flex',
                'flex-column',
                'gap-4'
            ];

            if ($layout === 'horizontal') {
                $cardClasses[] = 'flex-md-row';
                $cardClasses[] = 'align-items-md-center';
                $cardClasses[] = 'justify-content-md-between';
            } else {
                $cardClasses[] = 'justify-content-between';
            }
            ?>
            <div class="col">
                <article class="<?php echo lbcc_escape(implode(' ', $cardClasses)); ?>">
                    <div class="d-flex flex-column gap-2 min-w-0">
                        <?php if ($label !== '') { ?>
                            <span class="eyebrow-sm lh-1 d-inline-flex align-self-start bg-surface-water rounded-2 px-2 py-1 mb-0">
                                <?php echo lbcc_escape($label); ?>
                            </span>
                        <?php } ?>

                        <h3 class="h5 fs-xl mb-0"><?php echo lbcc_escape($title); ?></h3>
                    </div>

                    <?php if (!empty($links)) { ?>
                        <div class="d-flex flex-column flex-sm-row flex-wrap gap-3 align-items-start<?php if ($layout === 'horizontal') { ?> flex-md-column justify-content-md-center<?php } ?>">
                            <?php foreach ($links as $link) {
                                if (!is_array($link) || empty($link['text'])) {
                                    continue;
                                }

                                $linkText = trim((string) $link['text']);
                                $linkUrl = !empty($link['url']) ? (string) $link['url'] : '#';
                                ?>
                                <a href="<?php echo lbcc_escape($linkUrl); ?>" class="arrow-link text-nowrap">
                                    <?php echo lbcc_escape($linkText); ?>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </article>
            </div>
        <?php } ?>
        </div>
    </div>
<?php }

// Program Card
// $programOptions accepts an array of short labels such as AS-T, C-ACH, or C-ACC
function component_program_card(
    $link = '#',
    $title = '',
    $image = '',
    $programOptions = [],
    $pathway = '',
    $department = '',
    $icon = 'fa-award-simple',
    $additionalAttributes = []
) {
    if ($title === '') {
        return;
    }

    $programOptions = is_array($programOptions) ? array_values(array_filter(array_map('trim', $programOptions))) : [];
    $pathway = trim((string) $pathway);
    $department = trim((string) $department);
    $icon = trim((string) $icon) !== '' ? trim((string) $icon) : 'fa-award-simple';
    $image = trim((string) $image);
    $imageSrc = $image !== '' && preg_match('#^https?://#i', $image)
        ? $image
        : lbcc_url($image);

    $programOptionSlugs = array_map('lbcc_slugify', $programOptions);
    $pathwaySlugs = array_map(
        'lbcc_slugify',
        array_values(array_filter(array_map('trim', preg_split('/\\s*;\\s*/', $pathway) ?: [])))
    );
    $dataAttributes = [
        'data-lbcc-program-card' => true,
        'data-pathway' => !empty($pathwaySlugs) ? implode('|', $pathwaySlugs) : false,
        'data-program-options' => !empty($programOptionSlugs) ? implode('|', $programOptionSlugs) : false,
        'data-department' => $department !== '' ? lbcc_slugify($department) : false
    ];
    $attributes = array_merge($dataAttributes, is_array($additionalAttributes) ? $additionalAttributes : []);
    ?>
    <a
        href="<?php echo lbcc_escape($link); ?>"
        class="card component-program-card h-100 position-relative overflow-hidden rounded-4 border-0 bg-surface-subtle text-decoration-none"
        <?php echo trim(lbcc_component_attributes($attributes)); ?>
    >
        <?php if ($image !== '') { ?>
            <img
                class="card-img-top component-program-card__image"
                src="<?php echo lbcc_escape($imageSrc); ?>"
                alt=""
            >
        <?php } else { ?>
            <div class="card-img-top component-program-card__image-placeholder bg-teal-800"></div>
        <?php } ?>

        <span class="component-program-card__action btn btn-primary btn-sm rounded-pill d-inline-flex align-items-center justify-content-center" aria-hidden="true">
            <span class="fa-sharp fa-regular fa-arrow-up-right"></span>
        </span>

        <div class="card-body component-program-card__body d-flex flex-column gap-3 p-4">
            <h2 class="component-program-card__title h5 fs-xl text-teal-800 mb-0"><?php echo lbcc_escape($title); ?></h2>

            <?php if (!empty($programOptions)) { ?>
                <div class="component-program-card__meta d-flex align-items-start gap-2 w-100">
                    <span class="component-program-card__meta-icon fa-sharp fa-regular <?php echo lbcc_escape($icon); ?> flex-shrink-0" aria-hidden="true"></span>

                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <?php foreach ($programOptions as $programOption) { ?>
                            <span class="badge component-program-card__option text-dark rounded-3"><?php echo lbcc_escape($programOption); ?></span>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </a>
<?php }

// Programs
// $careerAndAcademicPathway optionally filters the programs data by a CAP name.
// $display supports grid and carousel.
function component_programs(
    $careerAndAcademicPathway = '',
    $display = 'grid',
    $mobileItems = 1,
    $tabletItems = 2,
    $desktopItems = 3,
    $autoplay = false
) {
    $dataPath = dirname(__DIR__, 2) . '/data/programs.json';
    $decoded = is_readable($dataPath) ? json_decode((string) file_get_contents($dataPath), true) : [];
    $programEntries = is_array($decoded) ? $decoded : [];
    $pathwayFilter = lbcc_slugify(trim((string) $careerAndAcademicPathway));
    $display = $display === 'carousel' ? 'carousel' : 'grid';
    $mobileItems = max(1, min(6, (int) $mobileItems));
    $tabletItems = max(1, min(6, (int) $tabletItems));
    $desktopItems = max(1, min(6, (int) $desktopItems));

    $programEntries = array_values(array_filter($programEntries, static function ($entry) use ($pathwayFilter) {
        if (!is_array($entry) || empty($entry['title'])) {
            return false;
        }

        if ($pathwayFilter === '') {
            return true;
        }

        $pathways = array_values(array_filter(array_map(
            'lbcc_slugify',
            array_map('trim', preg_split('/\\s*;\\s*/', (string) ($entry['pathway'] ?? '')) ?: [])
        )));

        return in_array($pathwayFilter, $pathways, true);
    }));

    if (empty($programEntries)) {
        return;
    }

    $renderCard = static function (array $entry) {
        component_program_card(
            $entry['url'] ?? '#',
            $entry['title'] ?? '',
            $entry['image'] ?? '',
            is_array($entry['program_options'] ?? null) ? $entry['program_options'] : [],
            $entry['pathway'] ?? '',
            $entry['department'] ?? ''
        );
    };

    if ($display === 'grid') { ?>
        <div class="row row-cols-<?php echo lbcc_escape((string) $mobileItems); ?> row-cols-md-<?php echo lbcc_escape((string) $tabletItems); ?> row-cols-xl-<?php echo lbcc_escape((string) $desktopItems); ?> g-4">
            <?php foreach ($programEntries as $entry) { ?>
                <div class="col">
                    <?php $renderCard($entry); ?>
                </div>
            <?php } ?>
        </div>
        <?php return;
    } ?>

    <div
        class="component-carousel-anything component-programs-carousel"
        data-lbcc-carousel-anything
        data-mobile-items="<?php echo lbcc_escape((string) $mobileItems); ?>"
        data-tablet-items="<?php echo lbcc_escape((string) $tabletItems); ?>"
        data-desktop-items="<?php echo lbcc_escape((string) $desktopItems); ?>"
        data-autoplay="<?php echo $autoplay ? 'true' : 'false'; ?>"
    >
        <div class="swiper" data-lbcc-carousel-swiper>
            <div class="swiper-wrapper align-items-stretch">
                <?php foreach ($programEntries as $entry) { ?>
                    <div class="swiper-slide h-auto">
                        <div class="swiper-slide-content h-100">
                            <?php $renderCard($entry); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="component-carousel-anything__controls d-flex align-items-center flex-nowrap gap-2 mt-4">
            <div class="swiper-scrollbar component-carousel-anything__scrollbar flex-grow-1" data-lbcc-carousel-scrollbar></div>
            <div class="component-carousel-anything__buttons d-flex align-items-center gap-2 flex-shrink-0">
                <button class="btn btn-primary btn-circle btn-sm" type="button" data-lbcc-carousel-prev aria-label="Previous program">
                    <span class="fa-sharp fa-regular fa-arrow-left" aria-hidden="true"></span>
                </button>
                <button class="btn btn-primary btn-circle btn-sm" type="button" data-lbcc-carousel-next aria-label="Next program">
                    <span class="fa-sharp fa-regular fa-arrow-right" aria-hidden="true"></span>
                </button>
                <button class="btn btn-primary btn-circle btn-sm" type="button" data-lbcc-carousel-toggle aria-label="Pause carousel autoplay" aria-pressed="false">
                    <span class="fa-sharp fa-solid fa-pause" aria-hidden="true" data-lbcc-carousel-icon="pause"></span>
                    <span class="fa-sharp fa-solid fa-play d-none" aria-hidden="true" data-lbcc-carousel-icon="play"></span>
                </button>
            </div>
        </div>
    </div>
<?php }

// Search Programs
// $programs optionally accepts program records with title and url keys.
// When omitted, the component loads App_Code/data/programs.json.
function component_search_programs(
    $programs = null,
    $label = 'Search Programs',
    $placeholder = 'Search programs at LBCC...',
    $additionalAttributes = []
) {
    static $searchProgramsInstance = 0;
    $searchProgramsInstance += 1;

    if (!is_array($programs)) {
        $dataPath = dirname(__DIR__, 2) . '/data/programs.json';
        $decoded = is_readable($dataPath) ? json_decode((string) file_get_contents($dataPath), true) : [];
        $programs = is_array($decoded) ? $decoded : [];
    }
    $label = trim((string) $label) ?: 'Search Programs';
    $placeholder = trim((string) $placeholder) ?: 'Start typing to search programs...';
    $inputId = 'search-programs-' . $searchProgramsInstance;
    $menuId = $inputId . '-menu';
    $attributes = is_array($additionalAttributes) ? $additionalAttributes : [];
    ?>
    <div class="search-programs position-relative" data-lbcc-search-programs<?php echo lbcc_component_attributes($attributes); ?>>
        <label class="form-label fw-semibold mb-2 visually-hidden" for="<?php echo lbcc_escape($inputId); ?>"><?php echo lbcc_escape($label); ?></label>
        <div class="input-group">
            <span class="input-group-text bg-white border-end-0" aria-hidden="true">
                <span class="fa-sharp fa-regular fa-magnifying-glass text-primary"></span>
            </span>
            <input
                id="<?php echo lbcc_escape($inputId); ?>"
                class="form-control border-start-0"
                type="search"
                placeholder="<?php echo lbcc_escape($placeholder); ?>"
                role="combobox"
                aria-autocomplete="list"
                aria-expanded="false"
                aria-controls="<?php echo lbcc_escape($menuId); ?>"
                autocomplete="off"
                data-lbcc-search-programs-input
            >
        </div>
        <div id="<?php echo lbcc_escape($menuId); ?>" class="dropdown-menu w-100 mt-1 shadow" role="listbox" data-lbcc-search-programs-menu>
            <?php foreach ($programs as $program) {
                if (!is_array($program)) {
                    continue;
                }

                $title = trim((string) ($program['title'] ?? ''));
                $url = lbcc_url('App_Code/program-single.php');

                if ($title === '') {
                    continue;
                }
                ?>
                <button
                    class="dropdown-item search-programs__option"
                    type="button"
                    role="option"
                    data-lbcc-search-programs-option
                    data-title="<?php echo lbcc_escape(strtolower($title)); ?>"
                    data-url="<?php echo lbcc_escape($url); ?>"
                ><?php echo lbcc_escape($title); ?></button>
            <?php } ?>
            <p class="search-programs__empty dropdown-item-text mb-0 d-none" data-lbcc-search-programs-empty>No programs found.</p>
        </div>
    </div>
<?php }

// Support Matrix
// $items is an array of support resource arrays with:
// title, description, url, needs, audiences
function component_support_matrix(
    $items = [],
    $title = 'Support Matrix',
    $showFiltering = true,
    $availableNeeds = [],
    $availableAudiences = [],
    $prefilterNeeds = [],
    $prefilterAudiences = [],
    $mobilePerRow = 1,
    $tabletPerRow = 2,
    $desktopPerRow = 3
) {
    if (empty($items) || !is_array($items)) {
        return;
    }

    static $supportMatrixInstance = 0;
    $supportMatrixInstance += 1;

    $showFiltering = (bool) $showFiltering;
    $availableNeeds = lbcc_support_matrix_normalize_values($availableNeeds);
    $availableAudiences = lbcc_support_matrix_normalize_values($availableAudiences);
    $prefilterNeeds = lbcc_support_matrix_normalize_values($prefilterNeeds);
    $prefilterAudiences = lbcc_support_matrix_normalize_values($prefilterAudiences);
    $needIconMap = lbcc_support_matrix_need_icons();

    $normalizePerRow = static function ($value, $fallback) {
        $value = (int) $value;

        if ($value < 1 || $value > 6) {
            return $fallback;
        }

        return $value;
    };

    $mobilePerRow = $normalizePerRow($mobilePerRow, 1);
    $tabletPerRow = $normalizePerRow($tabletPerRow, 2);
    $desktopPerRow = $normalizePerRow($desktopPerRow, 3);

    $normalizedItems = [];

    foreach ($items as $item) {
        if (!is_array($item) || empty($item['title'])) {
            continue;
        }

        $titleValue = trim((string) $item['title']);
        $needs = lbcc_support_matrix_normalize_values($item['needs'] ?? []);
        $audiences = lbcc_support_matrix_normalize_values($item['audiences'] ?? []);

        $matchesNeedPrefilter = empty($prefilterNeeds) || !empty(array_intersect($needs, $prefilterNeeds));
        $matchesAudiencePrefilter = empty($prefilterAudiences) || !empty(array_intersect($audiences, $prefilterAudiences));

        if (!$matchesNeedPrefilter || !$matchesAudiencePrefilter) {
            continue;
        }

        $normalizedItems[] = [
            'title' => $titleValue,
            'description' => trim((string) ($item['description'] ?? '')),
            'url' => trim((string) ($item['url'] ?? '')),
            'needs' => $needs,
            'audiences' => $audiences
        ];
    }

    if (empty($normalizedItems)) {
        return;
    }

    if (empty($availableNeeds)) {
        $availableNeeds = lbcc_support_matrix_collect_values($normalizedItems, 'needs');
    }

    if (empty($availableAudiences)) {
        $availableAudiences = lbcc_support_matrix_collect_values($normalizedItems, 'audiences');
    }

    $initialNeedValue = count($prefilterNeeds) === 1 ? lbcc_support_matrix_slug($prefilterNeeds[0]) : '';
    $initialNeedLabel = count($prefilterNeeds) === 1 ? $prefilterNeeds[0] : '';
    $initialAudienceValue = count($prefilterAudiences) === 1 ? lbcc_support_matrix_slug($prefilterAudiences[0]) : '';
    $resultsCount = count($normalizedItems);
    $instanceId = 'support-matrix-' . $supportMatrixInstance;
    $audienceFieldId = $instanceId . '-audience';
    $needFieldId = $instanceId . '-need';
    $needPlaceholder = 'Choose types of services...';
    $rowClasses = [
        'row',
        'row-cols-' . $mobilePerRow,
        'row-cols-md-' . $tabletPerRow,
        'row-cols-xl-' . $desktopPerRow
    ];
    ?>
    <section class="component-support-matrix d-grid gap-4" data-lbcc-support-matrix>
        <?php if ($title !== '') { ?>
            <div class="d-grid gap-2">
                <h2 class="mb-0"><?php echo lbcc_escape($title); ?></h2>
                <p class="mb-0 text-body-secondary">Find the LBCC services that best match what you need and who you are.</p>
            </div>
        <?php } ?>

        <?php if ($showFiltering) { ?>
            <div class="component-support-matrix__filters bg-surface-subtle p-4 p-xl-5">
                <div class="row component-support-matrix__filter-row g-4 g-xl-5 align-items-start">
                    <div class="col-12 col-xl-auto component-support-matrix__filter-copy">
                        <p class="mb-0 fs-xl text-teal-800">Start by choosing who you are, what you need, or both.</p>
                    </div>

                    <div class="col-12 col-xl">
                        <div class="row g-3 align-items-start">
                            <div class="col-12 col-lg">
                                <label class="form-label fw-semibold mb-2" for="<?php echo lbcc_escape($audienceFieldId); ?>">Who are you?</label>
                                <select
                                    id="<?php echo lbcc_escape($audienceFieldId); ?>"
                                    class="form-select component-support-matrix__select"
                                    data-lbcc-support-audience
                                >
                                    <option value="">Select who you are...</option>
                                    <?php foreach ($availableAudiences as $audience) {
                                        $audienceSlug = lbcc_support_matrix_slug($audience);
                                        ?>
                                        <option value="<?php echo lbcc_escape($audienceSlug); ?>"<?php if ($initialAudienceValue === $audienceSlug) { ?> selected<?php } ?>>
                                            <?php echo lbcc_escape($audience); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12 col-lg-auto d-flex align-items-center justify-content-start justify-content-lg-center pt-lg-5">
                                <span class="component-support-matrix__and-or text-uppercase text-body-secondary">&amp; / or</span>
                            </div>

                            <div class="col-12 col-lg">
                                <label class="form-label fw-semibold mb-2" for="<?php echo lbcc_escape($needFieldId); ?>">What do you need?</label>
                                <div class="dropdown component-support-matrix__dropdown">
                                    <button
                                        id="<?php echo lbcc_escape($needFieldId); ?>"
                                        class="btn component-support-matrix__filter-toggle dropdown-toggle w-100"
                                        type="button"
                                        data-bs-toggle="dropdown"
                                        data-bs-auto-close="true"
                                        data-lbcc-support-need
                                        data-selected-value="<?php echo lbcc_escape($initialNeedValue); ?>"
                                        data-placeholder="<?php echo lbcc_escape($needPlaceholder); ?>"
                                        aria-expanded="false"
                                    >
                                        <span data-lbcc-support-need-label><?php echo lbcc_escape($initialNeedLabel !== '' ? $initialNeedLabel : $needPlaceholder); ?></span>
                                    </button>

                                    <div class="dropdown-menu component-support-matrix__menu w-100 p-0 border-0 overflow-hidden">
                                        <?php foreach ($availableNeeds as $need) {
                                            $needSlug = lbcc_support_matrix_slug($need);
                                            $iconClass = !empty($needIconMap[$need]) ? $needIconMap[$need] : 'fa-circle-info';
                                            $isSelected = $initialNeedValue === $needSlug;
                                            ?>
                                            <button
                                                type="button"
                                                class="dropdown-item component-support-matrix__menu-item d-flex align-items-center gap-2<?php if ($isSelected) { ?> is-active<?php } ?>"
                                                data-lbcc-support-need-option
                                                data-value="<?php echo lbcc_escape($needSlug); ?>"
                                                data-label="<?php echo lbcc_escape($need); ?>"
                                                aria-pressed="<?php echo $isSelected ? 'true' : 'false'; ?>"
                                            >
                                                <span class="component-support-matrix__menu-icon fa-sharp fa-regular <?php echo lbcc_escape($iconClass); ?>" aria-hidden="true"></span>
                                                <span class="flex-grow-1"><?php echo lbcc_escape($need); ?></span>
                                            </button>
                                        <?php } ?>
                                    </div>
                                </div>

                                <input
                                    type="hidden"
                                    value="<?php echo lbcc_escape($initialNeedValue); ?>"
                                    data-lbcc-support-need-value
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="component-support-matrix__results d-grid gap-4">
            <p class="mb-0 text-body-secondary fs-sm" data-lbcc-support-count>
                Showing <?php echo lbcc_escape((string) $resultsCount); ?> resource<?php if ($resultsCount !== 1) { ?>s<?php } ?>
            </p>

            <div class="component-support-matrix__grid <?php echo lbcc_escape(implode(' ', $rowClasses)); ?>">
                <?php foreach ($normalizedItems as $item) {
                    $itemNeeds = $item['needs'];
                    $itemAudiences = $item['audiences'];
                    $needsData = implode('|', array_map('lbcc_support_matrix_slug', $itemNeeds));
                    $audiencesData = implode('|', array_map('lbcc_support_matrix_slug', $itemAudiences));
                    ?>
                    <div
                        class="col"
                        data-lbcc-support-card
                        data-needs="<?php echo lbcc_escape($needsData); ?>"
                        data-audiences="<?php echo lbcc_escape($audiencesData); ?>"
                    >
                        <article class="card component-support-matrix__card h-100 bg-white">
                            <div class="card-body d-flex flex-column justify-content-between gap-4 p-4">
                                <div class="d-grid gap-3">
                                    <h3 class="component-support-matrix__title mb-0">
                                        <?php if ($item['url'] !== '') { ?>
                                            <a href="<?php echo lbcc_escape($item['url']); ?>" class="component-support-matrix__title-link d-flex align-items-start justify-content-between gap-3 w-100 text-decoration-none">
                                                <span><?php echo lbcc_escape($item['title']); ?></span>
                                                <span class="component-support-matrix__title-icon fa-sharp fa-regular fa-arrow-up-right flex-shrink-0" aria-hidden="true"></span>
                                            </a>
                                        <?php } else { ?>
                                            <span class="component-support-matrix__title-link d-flex align-items-start justify-content-between gap-3 w-100 text-decoration-none">
                                                <span><?php echo lbcc_escape($item['title']); ?></span>
                                            </span>
                                        <?php } ?>
                                    </h3>

                                    <?php if ($item['description'] !== '') { ?>
                                        <p class="component-support-matrix__description mb-0"><?php echo lbcc_escape($item['description']); ?></p>
                                    <?php } ?>

                                    <?php if (!empty($itemAudiences)) { ?>
                                        <div class="d-flex flex-wrap gap-2">
                                            <?php foreach ($itemAudiences as $audience) { ?>
                                                <span class="component-support-matrix__badge d-inline-flex align-items-center justify-content-center">
                                                    <?php echo lbcc_escape($audience); ?>
                                                </span>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>

                                <?php if (!empty($itemNeeds)) { ?>
                                    <div class="component-support-matrix__icons d-flex flex-wrap align-items-end gap-3 row-gap-2">
                                        <?php foreach ($itemNeeds as $need) {
                                            $iconClass = !empty($needIconMap[$need]) ? $needIconMap[$need] : 'fa-circle-info';
                                            ?>
                                            <button
                                                type="button"
                                                class="component-support-matrix__need-icon btn p-0 border-0 bg-transparent"
                                                data-bs-toggle="tooltip"
                                                data-bs-title="<?php echo lbcc_escape($need); ?>"
                                                aria-label="<?php echo lbcc_escape($need); ?>"
                                            >
                                                <span class="fa-sharp fa-regular <?php echo lbcc_escape($iconClass); ?>" aria-hidden="true"></span>
                                            </button>
                                        <?php } ?>
                                    </div>
                                <?php } else { ?>
                                    <div></div>
                                <?php } ?>
                            </div>
                        </article>
                    </div>
                <?php } ?>
            </div>

            <div class="component-support-matrix__empty d-none bg-surface-raised rounded-4 p-4 text-center" data-lbcc-support-empty>
                <h3 class="h4 mb-2">No Results Found</h3>
                <p class="mb-0 text-body-secondary">Try a different audience or support need.</p>
            </div>
        </div>
    </section>
<?php }

// Card as Link
// $style options: image-bg, primary-border-thin, primary-border-thick, teal-border-thin, teal-border-thick
// $label is primarily intended for the image background variant
function component_card_as_link(
    $link = '#',
    $title = '',
    $description = '',
    $style = 'image-bg',
    $image = '',
    $label = '',
    $titleSize = 'h4'
) {
    $style = in_array($style, ['image-bg', 'primary-border-thin', 'primary-border-thick', 'teal-border-thin', 'teal-border-thick'], true) ? $style : 'image-bg';
    $titleSize = in_array($titleSize, ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'], true) ? $titleSize : 'h4';

    $componentClasses = [
        'card',
        'component-card-as-link',
        'component-card-as-link__style-' . $style,
        'h-100',
        'overflow-hidden',
        'position-relative',
        'rounded-4',
        'text-decoration-none'
    ];

    if ($style === 'image-bg') {
        $componentClasses[] = 'border-0';
        $componentClasses[] = 'text-white';
    } else {
        $componentClasses[] = 'bg-white';
    }

    if ($style === 'image-bg' && $image === '') {
        $componentClasses[] = 'bg-teal-800';
    }
    ?>
    <?php if ($style === 'image-bg') {
        lbcc_component_card_image_bg_shell(
            'a',
            $title,
            $description,
            $image,
            $label,
            $componentClasses,
            [
                'href' => $link
            ],
            true,
            true,
            $titleSize
        );
    } else { ?>
        <a href="<?php echo lbcc_escape($link); ?>" class="<?php echo lbcc_escape(implode(' ', $componentClasses)); ?>">
            <?php if ($image !== '') { ?>
                <img
                    class="card-img-top component-card-as-link__image-top"
                    src="<?php echo lbcc_escape(lbcc_url($image)); ?>"
                    alt=""
                >
            <?php } ?>

            <div class="card-body component-card-as-link__body d-flex flex-column gap-3 p-3">
                <?php if ($title !== '') { ?>
                    <h2 class="<?php echo lbcc_escape($titleSize); ?> mb-0"><?php echo lbcc_escape($title); ?></h2>
                <?php } ?>

                <?php if ($description !== '') { ?>
                    <p class="component-card-as-link__description mb-0"><?php echo lbcc_escape($description); ?></p>
                <?php } ?>
            </div>

            <div class="card-footer component-card-as-link__footer bg-transparent border-0 pt-0 px-3 pb-3">
                <span class="component-card-as-link__arrow fa-sharp fa-regular fa-arrow-right" aria-hidden="true"></span>
            </div>
        </a>
    <?php } ?>
<?php }

// List Group
// $style options: surface, surface-haze, white, or lined
// $size options: default, sm, or lg
// $items is an array of arrays with:
// link, title, description, label, left_icon, image, class
function component_list_group(
    $items = [],
    $style = 'surface',
    $size = 'default',
    $additionalWrapperClasses = []
) {
    if (empty($items) || !is_array($items)) {
        return;
    }

    $style = in_array($style, ['surface', 'surface-haze', 'white', 'lined'], true) ? $style : 'surface';
    $size = in_array($size, ['default', 'sm', 'lg'], true) ? $size : 'default';

    $wrapperClasses = [
        'list-group',
        'component-list-group',
        'bg-transparent',
        'component-list-group__style-' . $style,
        'component-list-group__size-' . $size
    ];

    if ($style === 'lined') {
        $wrapperClasses[] = 'gap-0';
    } else {
        $wrapperClasses[] = 'gap-3';
    }

    if (is_string($additionalWrapperClasses) && trim($additionalWrapperClasses) !== '') {
        $wrapperClasses[] = trim($additionalWrapperClasses);
    } elseif (is_array($additionalWrapperClasses)) {
        foreach ($additionalWrapperClasses as $wrapperClass) {
            if (!is_string($wrapperClass) || trim($wrapperClass) === '') {
                continue;
            }

            $wrapperClasses[] = trim($wrapperClass);
        }
    }
    ?>
    <div class="<?php echo lbcc_escape(implode(' ', $wrapperClasses)); ?>">
        <?php foreach ($items as $item) {
            if (!is_array($item) || empty($item['title'])) {
                continue;
            }

            $link = !empty($item['link']) ? (string) $item['link'] : '#';
            $title = (string) $item['title'];
            $description = !empty($item['description']) ? (string) $item['description'] : '';
            $label = !empty($item['label']) ? (string) $item['label'] : '';
            $leftIcon = !empty($item['left_icon']) ? trim((string) $item['left_icon']) : '';
            $image = !empty($item['image']) ? (string) $item['image'] : '';
            $itemClass = !empty($item['class']) ? trim((string) $item['class']) : '';

            $itemClasses = [
                'list-group-item',
                'list-group-item-action',
                'component-list-group__item',
                'd-flex',
                'align-items-center',
                'gap-3'
            ];

            if ($itemClass !== '') {
                $itemClasses[] = $itemClass;
            }

            $titleClasses = ['component-list-group__title', 'mb-0'];

            if ($style === 'lined') {
                $titleClasses[] = 'component-list-group__title--lined';
            } else {
                $titleClasses[] = 'component-list-group__title--surface';
            }

            if ($size === 'lg') {
                $titleClasses[] = 'fs-2xl';
            } elseif ($size === 'sm') {
                $titleClasses[] = 'fs-md';
            } else {
                $titleClasses[] = 'fs-xl';
            }
            ?>
            <a href="<?php echo lbcc_escape($link); ?>" class="<?php echo lbcc_escape(implode(' ', $itemClasses)); ?>">
                <div class="component-list-group__content d-flex flex-column gap-2 flex-grow-1 min-w-0">
                    <?php if ($label !== '') { ?>
                        <span class="component-list-group__label d-inline-flex align-items-center justify-content-center"><?php echo lbcc_escape($label); ?></span>
                    <?php } ?>

                    <div class="component-list-group__title-row d-flex align-items-center gap-3 w-100 min-w-0">
                        <?php if ($leftIcon !== '') { ?>
                            <span class="component-list-group__left-icon fa-sharp fa-regular flex-shrink-0 <?php echo lbcc_escape($leftIcon); ?>" aria-hidden="true"></span>
                        <?php } ?>

                        <div class="component-list-group__copy d-flex flex-column gap-1 min-w-0 flex-grow-1">
                            <h3 class="<?php echo lbcc_escape(implode(' ', $titleClasses)); ?>"><?php echo lbcc_escape($title); ?></h3>

                            <?php if ($description !== '') { ?>
                                <p class="component-list-group__description mb-0"><?php echo lbcc_escape($description); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <?php if ($image !== '') { ?>
                    <img
                        class="component-list-group__image d-block flex-shrink-0"
                        src="<?php echo lbcc_escape(lbcc_url($image)); ?>"
                        alt=""
                    >
                <?php } else { ?>
                    <span class="component-list-group__icon-shell d-inline-flex align-items-center justify-content-center flex-shrink-0" aria-hidden="true">
                        <span class="fa-sharp fa-regular fa-arrow-up-right"></span>
                    </span>
                <?php } ?>
            </a>
        <?php } ?>
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
// $variant options: light, dark
// $fillWidth options: true, false
function component_footer_i_heart_lb($hearts = [], $variant = 'light', $fillWidth = false)
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
    $variant = in_array($variant, ['light', 'dark'], true) ? $variant : 'light';
    $iMark = $variant === 'dark'
        ? '_resources/images/i-heart-lb/i-dark.svg'
        : '_resources/images/i-heart-lb/i.svg';
    $lbMark = $variant === 'dark'
        ? '_resources/images/i-heart-lb/lb-dark.svg'
        : '_resources/images/i-heart-lb/lb.svg';
    $toggleButtonClass = $variant === 'dark' ? 'btn-secondary' : 'btn-dark';
    $fillWidth = (bool) $fillWidth;
    $componentClasses = [
        'component-footer-i-heart-lb',
        'component-footer-i-heart-lb--' . $variant,
        'position-relative'
    ];

    if ($fillWidth) {
        $componentClasses[] = 'component-footer-i-heart-lb--full-width';
    }
    ?>
    <div
        class="<?php echo lbcc_escape(implode(' ', $componentClasses)); ?>"
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
                        <div class="swiper-slide d-flex align-items-center justify-content-center">
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
                class="component-footer-i-heart-lb__toggle btn <?php echo lbcc_escape($toggleButtonClass); ?> btn-sm btn-circle"
                type="button"
                aria-label="Pause heart animation"
                aria-pressed="false"
                data-lbcc-i-heart-lb-toggle
            >
                <span class="fa-sharp fa-solid fa-pause" aria-hidden="true" data-lbcc-i-heart-lb-icon="pause"></span>
                <span class="fa-sharp fa-solid fa-play d-none" aria-hidden="true" data-lbcc-i-heart-lb-icon="play"></span>
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

function component_hero(
    $type = 'split',
    $title = '',
    $supplementalContent = '',
    $contentMedia = [],
    $backgroundMediaRight = [],
    $backgroundMediaLeft = [],
    $showBreadcrumbs = true,
    $breadcrumbsHtml = ''
) {
    $type = in_array($type, ['split', 'full'], true) ? $type : 'split';
    $showMediaControl = component_hero_has_pausable_media(
        $contentMedia,
        $backgroundMediaRight,
        $backgroundMediaLeft
    );

    $componentClasses = [
        'component-hero',
        'component-hero--' . $type
    ];
    ?>
    <section class="<?php echo lbcc_escape(implode(' ', $componentClasses)); ?>">
        <?php if ($type === 'full') { ?>
            <div class="component-hero__media">
                <?php component_hero_media_slot($backgroundMediaLeft, 'Background Media Left'); ?>
                <?php component_hero_media_slot($contentMedia, 'Main Content Media'); ?>
                <?php component_hero_media_slot($backgroundMediaRight, 'Background Media Right'); ?>
                <?php component_hero_render_content($title, $supplementalContent, $showBreadcrumbs, $breadcrumbsHtml, 'd-none d-xl-block'); ?>
                <?php if ($showMediaControl) { ?>
                    <?php component_hero_render_media_control(); ?>
                <?php } ?>
            </div>
            <?php component_hero_render_mobile_supplemental($supplementalContent); ?>
        <?php } else { ?>
            <div class="component-hero__inner">
                <?php component_hero_render_content($title, $supplementalContent, $showBreadcrumbs, $breadcrumbsHtml); ?>
            </div>
            <div class="component-hero__media">
                <?php component_hero_media_slot($contentMedia, 'Main Content Media'); ?>
                <?php component_hero_media_slot($backgroundMediaRight, 'Background Media Right'); ?>
                <?php if ($showMediaControl) { ?>
                    <?php component_hero_render_media_control(); ?>
                <?php } ?>
            </div>
        <?php } ?>
    </section>
<?php }

function component_hero_has_pausable_media(...$mediaGroups)
{
    foreach ($mediaGroups as $mediaItems) {
        if (!is_array($mediaItems) || empty($mediaItems)) {
            continue;
        }

        if (count($mediaItems) > 1) {
            return true;
        }

        foreach ($mediaItems as $mediaItem) {
            if (is_array($mediaItem) && !empty($mediaItem['type']) && $mediaItem['type'] === 'video') {
                return true;
            }
        }
    }

    return false;
}

function component_hero_media_slot($mediaItems = [], $slotLabel = 'Media Slot')
{
    $mediaItems = is_array($mediaItems) ? array_values($mediaItems) : [];
    $hasMultipleItems = count($mediaItems) > 1;
    $slotSlug = strtolower((string) $slotLabel);
    $slotSlug = preg_replace('/[^a-z0-9]+/', '-', $slotSlug);
    $slotSlug = trim((string) $slotSlug, '-');
    ?>
    <div class="component-hero__media-slot component-hero__media-slot--<?php echo lbcc_escape($slotSlug); ?>">
        <?php if (empty($mediaItems)) { ?>
            <div class="component-hero__media-placeholder"></div>
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

function component_hero_render_content(
    $title = '',
    $supplementalContent = '',
    $showBreadcrumbs = true,
    $breadcrumbsHtml = '',
    $supplementalClasses = ''
) {
    $supplementalClasses = trim((string) $supplementalClasses);
    ?>
    <div class="component-hero__content">
        <?php if ($showBreadcrumbs) { ?>
            <div class="component-hero__breadcrumbs">
                <?php if (!empty($breadcrumbsHtml)) { ?>
                    <?php echo $breadcrumbsHtml; ?>
                <?php } else { ?>
                    <?php
                    $page = [
                        'title' => $title ?: 'Current Page'
                    ];
                    include dirname(__DIR__, 3) . '/_resources/includes/breadcrumbs.php';
                    ?>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="component-hero__message">
            <?php if (!empty($title)) { ?>
                <h1 class="component-hero__title lbcc-animate lbcc-fade lbcc-duration-700"><?php echo lbcc_escape($title); ?></h1>
            <?php } ?>

            <?php if (!empty($supplementalContent)) { ?>
                <div class="component-hero__supplemental-content lbcc-animate lbcc-fade lbcc-delay-100 lbcc-duration-700<?php if ($supplementalClasses !== '') { ?> <?php echo lbcc_escape($supplementalClasses); ?><?php } ?>">
                    <?php echo $supplementalContent; ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php }

function component_hero_render_mobile_supplemental($supplementalContent = '')
{
    if (empty($supplementalContent)) {
        return;
    }
    ?>
    <div class="component-hero__mobile-supplemental d-xl-none lbcc-animate lbcc-fade lbcc-delay-100 lbcc-duration-700">
        <div class="component-hero__mobile-supplemental-inner">
            <?php echo $supplementalContent; ?>
        </div>
    </div>
<?php }

function component_hero_render_media_control()
{
    ?>
    <button
        class="component-hero__media-toggle btn btn-outline-secondary btn-circle"
        type="button"
        aria-label="Pause hero media"
        aria-pressed="false"
        data-lbcc-hero-media-control
    >
        <span class="fa-sharp fa-solid fa-pause" aria-hidden="true" data-lbcc-hero-media-icon="pause"></span>
        <span class="fa-sharp fa-solid fa-play d-none" aria-hidden="true" data-lbcc-hero-media-icon="play"></span>
    </button>
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
    <div class="component-hero__media-item">
        <?php if ($mediaType === 'video') { ?>
            <video class="component-hero__video" autoplay muted loop playsinline preload="metadata"<?php if (!empty($poster)) { ?> poster="<?php echo lbcc_escape(lbcc_url($poster)); ?>"<?php } ?>>
                <source src="<?php echo lbcc_escape(lbcc_url($src)); ?>">
            </video>
        <?php } else { ?>
            <div
                class="component-hero__image"
                style="background-image: url('<?php echo lbcc_escape(lbcc_url($src)); ?>');"
            ></div>
        <?php } ?>
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
<?php }

// Testimonial Carousel
// $testimonials is an array of arrays with:
// quote, name, program, location, image, thumb
function component_testimonial_carousel(
    $testimonials = [],
    $autoplay = true
) {
    if (empty($testimonials) || !is_array($testimonials)) {
        return;
    }

    $autoplay = $autoplay ? 'true' : 'false';
    ?>
    <div
        class="component-testimonial-carousel w-100 d-grid gap-3"
        data-lbcc-testimonial-carousel
        data-autoplay="<?php echo lbcc_escape($autoplay); ?>"
    >
        <div class="swiper component-testimonial-carousel__swiper" data-lbcc-testimonial-swiper>
            <div class="swiper-wrapper align-items-stretch">
                <?php foreach ($testimonials as $index => $testimonial) {
                    if (!is_array($testimonial) || empty($testimonial['quote'])) {
                        continue;
                    }

                    $quote = (string) $testimonial['quote'];
                    $name = !empty($testimonial['name']) ? (string) $testimonial['name'] : '';
                    $program = !empty($testimonial['program']) ? (string) $testimonial['program'] : '';
                    $location = !empty($testimonial['location']) ? (string) $testimonial['location'] : '';
                    $image = !empty($testimonial['image']) ? (string) $testimonial['image'] : '';
                    $thumb = !empty($testimonial['thumb']) ? (string) $testimonial['thumb'] : $image;
                    ?>
                    <div class="swiper-slide h-auto">
                        <article class="swiper-slide-content component-testimonial-carousel__slide d-grid gap-2 h-100">
                            <div class="component-testimonial-carousel__quote-card">
                                <div class="d-flex align-items-start gap-2">
                                    <span class="component-testimonial-carousel__mark" aria-hidden="true">&ldquo;</span>
                                    <div class="component-testimonial-carousel__quote mb-0">
                                        <?php echo lbcc_escape($quote); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="component-testimonial-carousel__person d-flex align-items-stretch gap-2">
                                <?php if ($image !== '') { ?>
                                    <img
                                        class="component-testimonial-carousel__image"
                                        src="<?php echo lbcc_escape(lbcc_url($image)); ?>"
                                        alt=""
                                    >
                                <?php } ?>

                                <div class="component-testimonial-carousel__bio d-grid gap-2">
                                    <?php if ($name !== '') { ?>
                                        <h3 class="component-testimonial-carousel__name text-white mb-0"><?php echo lbcc_escape($name); ?></h3>
                                    <?php } ?>

                                    <?php if ($program !== '') { ?>
                                        <div class="component-testimonial-carousel__detail d-flex align-items-center gap-2">
                                            <span class="fa-sharp fa-regular fa-graduation-cap" aria-hidden="true"></span>
                                            <span><?php echo lbcc_escape($program); ?></span>
                                        </div>
                                    <?php } ?>

                                    <?php if ($location !== '') { ?>
                                        <div class="component-testimonial-carousel__detail d-flex align-items-center gap-2">
                                            <span class="fa-sharp fa-regular fa-location-dot" aria-hidden="true"></span>
                                            <span><?php echo lbcc_escape($location); ?></span>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="component-testimonial-carousel__controls d-flex align-items-center gap-3 w-100 min-w-0">
            <div class="component-testimonial-carousel__thumbs d-flex align-items-center flex-wrap gap-2 min-w-0" role="tablist" aria-label="Testimonials">
                <?php foreach ($testimonials as $index => $testimonial) {
                    if (!is_array($testimonial) || empty($testimonial['quote'])) {
                        continue;
                    }

                    $thumb = !empty($testimonial['thumb']) ? (string) $testimonial['thumb'] : (!empty($testimonial['image']) ? (string) $testimonial['image'] : '');
                    $name = !empty($testimonial['name']) ? (string) $testimonial['name'] : 'Testimonial';
                    ?>
                    <button
                        class="component-testimonial-carousel__thumb<?php echo $index === 0 ? ' is-active' : ''; ?>"
                        type="button"
                        data-lbcc-testimonial-thumb
                        data-slide-index="<?php echo lbcc_escape((string) $index); ?>"
                        aria-label="Show testimonial from <?php echo lbcc_escape($name); ?>"
                        aria-pressed="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                    >
                        <?php if ($thumb !== '') { ?>
                            <img src="<?php echo lbcc_escape(lbcc_url($thumb)); ?>" alt="" aria-hidden="true">
                        <?php } ?>
                    </button>
                <?php } ?>
            </div>

            <div class="component-testimonial-carousel__rule" aria-hidden="true"></div>

            <button
                class="component-testimonial-carousel__toggle btn btn-outline-secondary btn-circle btn-sm"
                type="button"
                aria-label="Pause testimonial autoplay"
                aria-pressed="false"
                data-lbcc-testimonial-toggle
            >
                <span class="fa-sharp fa-solid fa-pause" aria-hidden="true" data-lbcc-testimonial-icon="pause"></span>
                <span class="fa-sharp fa-solid fa-play d-none" aria-hidden="true" data-lbcc-testimonial-icon="play"></span>
            </button>
        </div>
    </div>
<?php }

// Vertical Slider
// $slides is an array of arrays with:
// image, alt
function component_vertical_slider(
    $slides = [],
    $autoplay = true,
    $showControls = true
) {
    if (empty($slides) || !is_array($slides)) {
        return;
    }

    $validSlides = array_values(array_filter($slides, static function ($slide) {
        return is_array($slide) && !empty($slide['image']);
    }));

    if (empty($validSlides)) {
        return;
    }

    $canRotate = count($validSlides) > 1;
    $displaySlides = $validSlides;

    // Centered vertical loop mode needs five rendered slides to keep both preview
    // positions populated. Repeat short sets internally; a one-slide set remains static.
    if ($canRotate && count($displaySlides) < 5) {
        $sourceSlides = $displaySlides;
        $sourceSlideCount = count($sourceSlides);
        $sourceSlideIndex = 0;

        while (count($displaySlides) < 5) {
            $displaySlides[] = $sourceSlides[$sourceSlideIndex % $sourceSlideCount];
            $sourceSlideIndex += 1;
        }
    }

    $autoplay = $autoplay && $canRotate ? 'true' : 'false';
    $showControls = (bool) $showControls;
    ?>
    <div
        class="component-vertical-slider position-relative"
        data-lbcc-vertical-slider
        data-autoplay="<?php echo lbcc_escape($autoplay); ?>"
    >
        <div class="component-vertical-slider__layout d-flex align-items-stretch gap-0 gap-lg-3">
            <div class="component-vertical-slider__frame flex-grow-1 min-w-0">
                <div class="swiper component-vertical-slider__swiper" data-lbcc-vertical-slider-swiper>
                    <div class="swiper-wrapper">
                        <?php foreach ($displaySlides as $slide) {
                            $image = (string) $slide['image'];
                            $alt = !empty($slide['alt']) ? (string) $slide['alt'] : '';
                            ?>
                            <div class="swiper-slide">
                                <div class="component-vertical-slider__slide rounded-4 overflow-hidden">
                                    <img
                                        class="component-vertical-slider__image"
                                        src="<?php echo lbcc_escape(lbcc_url($image)); ?>"
                                        alt="<?php echo lbcc_escape($alt); ?>"
                                    >
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <?php if ($showControls) { ?>
                <div class="component-vertical-slider__controls d-flex flex-column align-items-center justify-content-center gap-3 flex-shrink-0">
                    <button
                        class="component-vertical-slider__control btn btn-secondary btn-circle btn-sm"
                        type="button"
                        data-lbcc-vertical-slider-prev
                        aria-label="Previous slide"
                    >
                        <span class="fa-sharp fa-regular fa-arrow-up" aria-hidden="true"></span>
                    </button>

                    <button
                        class="component-vertical-slider__control component-vertical-slider__toggle btn btn-secondary btn-circle btn-sm<?php echo $canRotate ? '' : ' d-none'; ?>"
                        type="button"
                        data-lbcc-vertical-slider-toggle
                        aria-label="Pause vertical slider autoplay"
                        aria-pressed="false"
                    >
                        <span class="fa-sharp fa-solid fa-pause" aria-hidden="true" data-lbcc-vertical-slider-icon="pause"></span>
                        <span class="fa-sharp fa-solid fa-play d-none" aria-hidden="true" data-lbcc-vertical-slider-icon="play"></span>
                    </button>

                    <button
                        class="component-vertical-slider__control btn btn-secondary btn-circle btn-sm"
                        type="button"
                        data-lbcc-vertical-slider-next
                        aria-label="Next slide"
                    >
                        <span class="fa-sharp fa-regular fa-arrow-down" aria-hidden="true"></span>
                    </button>
                </div>
            <?php } ?>
        </div>
    </div>
<?php }

// Fade Slider
// $slides is an array of arrays with:
// image, alt
function component_fade_slider(
    $slides = [],
    $autoplay = true
) {
    if (empty($slides) || !is_array($slides)) {
        return;
    }

    $validSlides = array_values(array_filter($slides, static function ($slide) {
        return is_array($slide) && !empty($slide['image']);
    }));

    if (empty($validSlides)) {
        return;
    }

    $canRotate = count($validSlides) > 1;
    $autoplay = $autoplay && $canRotate ? 'true' : 'false';
    ?>
    <div
        class="component-fade-slider position-relative"
        data-lbcc-fade-slider
        data-autoplay="<?php echo lbcc_escape($autoplay); ?>"
    >
        <div class="swiper component-fade-slider__swiper" data-lbcc-fade-slider-swiper>
            <div class="swiper-wrapper">
                <?php foreach ($validSlides as $slide) {
                    $image = (string) $slide['image'];
                    $alt = !empty($slide['alt']) ? (string) $slide['alt'] : '';
                    ?>
                    <div class="swiper-slide">
                        <div class="component-fade-slider__media position-relative rounded-4 overflow-hidden">
                            <img
                                class="component-fade-slider__image"
                                src="<?php echo lbcc_escape(lbcc_url($image)); ?>"
                                alt="<?php echo lbcc_escape($alt); ?>"
                            >
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <?php if ($canRotate) { ?>
            <button
                class="component-fade-slider__toggle btn btn-primary btn-circle btn-sm position-absolute"
                type="button"
                data-lbcc-fade-slider-toggle
                aria-label="Pause slideshow autoplay"
                aria-pressed="false"
            >
                <span class="fa-sharp fa-solid fa-pause" aria-hidden="true" data-lbcc-fade-slider-icon="pause"></span>
                <span class="fa-sharp fa-solid fa-play d-none" aria-hidden="true" data-lbcc-fade-slider-icon="play"></span>
            </button>
        <?php } ?>
    </div>
<?php }

// Quiet Video
function component_quiet_video(
    $video = '',
    $poster = '',
    $autoplay = true,
    $loop = true
) {
    $video = trim((string) $video);

    if ($video === '') {
        return;
    }

    $poster = trim((string) $poster);
    $autoplay = (bool) $autoplay;
    $loop = (bool) $loop;
    ?>
    <div
        class="component-quiet-video position-relative"
        data-lbcc-quiet-video
        data-autoplay="<?php echo $autoplay ? 'true' : 'false'; ?>"
    >
        <div class="component-quiet-video__media position-relative rounded-4 overflow-hidden">
            <video
                class="component-quiet-video__video"
                muted
                playsinline
                preload="metadata"
                <?php if ($autoplay) { ?>autoplay<?php } ?>
                <?php if ($loop) { ?>loop<?php } ?>
                <?php if ($poster !== '') { ?>poster="<?php echo lbcc_escape(lbcc_url($poster)); ?>"<?php } ?>
                data-lbcc-quiet-video-element
            >
                <source src="<?php echo lbcc_escape(lbcc_url($video)); ?>">
            </video>
        </div>

        <button
            class="component-quiet-video__toggle btn btn-primary btn-circle btn-sm position-absolute"
            type="button"
            data-lbcc-quiet-video-toggle
            aria-label="<?php echo $autoplay ? 'Pause video playback' : 'Play video playback'; ?>"
            aria-pressed="<?php echo $autoplay ? 'false' : 'true'; ?>"
        >
            <span class="fa-sharp fa-solid fa-pause<?php echo $autoplay ? '' : ' d-none'; ?>" aria-hidden="true" data-lbcc-quiet-video-icon="pause"></span>
            <span class="fa-sharp fa-solid fa-play<?php echo $autoplay ? ' d-none' : ''; ?>" aria-hidden="true" data-lbcc-quiet-video-icon="play"></span>
        </button>
    </div>
<?php }

// Video Modal
// $youtubeEmbedCode accepts trusted YouTube iframe embed markup.
function component_video_modal(
    $image = '',
    $youtubeEmbedCode = '',
    $title = ''
) {
    static $videoModalCount = 0;

    $image = trim((string) $image);
    $youtubeEmbedCode = trim((string) $youtubeEmbedCode);
    $title = trim((string) $title);

    if ($image === '' || $youtubeEmbedCode === '') {
        return;
    }

    $videoModalCount++;
    $modalId = 'video-modal-' . $videoModalCount;
    $modalLabelId = $modalId . '-title';
    ?>
    <div class="component-video-modal">
        <button
            class="component-video-modal__trigger position-relative d-flex align-items-end justify-content-between overflow-hidden w-100 border-0 p-3 text-start"
            type="button"
            data-bs-toggle="modal"
            data-bs-target="#<?php echo lbcc_escape($modalId); ?>"
            aria-label="Play<?php if ($title !== '') { ?> <?php echo lbcc_escape($title); ?><?php } ?>"
        >
            <img class="component-video-modal__image position-absolute top-0 start-0 w-100 h-100" src="<?php echo lbcc_escape(lbcc_url($image)); ?>" alt="">
            <span class="btn btn-primary btn-circle component-video-modal__play position-relative" aria-hidden="true">
                <span class="fa-sharp fa-solid fa-play"></span>
            </span>
            <?php if ($title !== '') { ?>
                <span class="component-video-modal__label position-relative"><?php echo lbcc_escape($title); ?></span>
            <?php } ?>
        </button>

        <div class="modal fade" id="<?php echo lbcc_escape($modalId); ?>" tabindex="-1" aria-labelledby="<?php echo lbcc_escape($modalLabelId); ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content overflow-hidden border-0 rounded-4">
                    <div class="modal-body position-relative p-0">
                        <h2 id="<?php echo lbcc_escape($modalLabelId); ?>" class="visually-hidden"><?php echo lbcc_escape($title !== '' ? $title : 'Video'); ?></h2>
                        <button class="btn-close btn-close-white position-absolute top-0 end-0 m-3 z-1" type="button" data-bs-dismiss="modal" aria-label="Close video"></button>
                        <div class="ratio ratio-16x9 component-video-modal__embed">
                            <?php echo $youtubeEmbedCode; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }

// Ticker
// $items is an array of arrays with:
// text, url, target
function component_ticker(
    $items = [],
    $label = 'Latest',
    $autoplay = true
) {
    if (empty($items) || !is_array($items)) {
        return;
    }

    $validItems = array_values(array_filter($items, static function ($item) {
        return is_array($item) && !empty($item['text']);
    }));

    if (empty($validItems)) {
        return;
    }

    $label = trim((string) $label) !== '' ? trim((string) $label) : 'Latest';
    $canRotate = count($validItems) > 1;
    $autoplay = $autoplay && $canRotate ? 'true' : 'false';
    ?>
    <div
        class="component-ticker rounded-bottom-4 px-3 py-3 px-md-4"
        data-lbcc-ticker
        data-autoplay="<?php echo lbcc_escape($autoplay); ?>"
    >
        <div class="d-flex flex-column gap-3 flex-md-row align-items-md-center">
            <div class="component-ticker__header d-flex align-items-center justify-content-between gap-3 flex-shrink-0">
                <span class="component-ticker__label"><?php echo lbcc_escape($label); ?></span>

                <?php if ($canRotate) { ?>
                    <button
                        class="component-ticker__toggle btn btn-link text-decoration-none p-0 d-inline-flex d-md-none"
                        type="button"
                        data-lbcc-ticker-toggle
                        aria-label="Pause ticker autoplay"
                        aria-pressed="false"
                    >
                        <span class="fa-sharp fa-solid fa-pause" aria-hidden="true" data-lbcc-ticker-icon="pause"></span>
                        <span class="fa-sharp fa-solid fa-play d-none" aria-hidden="true" data-lbcc-ticker-icon="play"></span>
                    </button>
                <?php } ?>
            </div>

            <div class="component-ticker__body d-flex align-items-center gap-3 flex-grow-1 min-w-0">
                <div class="swiper component-ticker__swiper flex-grow-1 min-w-0" data-lbcc-ticker-swiper>
                    <div class="swiper-wrapper align-items-stretch">
                        <?php foreach ($validItems as $item) {
                            $text = trim((string) $item['text']);
                            $url = !empty($item['url']) ? (string) $item['url'] : '#';
                            $target = !empty($item['target']) ? trim((string) $item['target']) : '';
                            $rel = $target === '_blank' ? 'noopener noreferrer' : '';
                            ?>
                            <div class="swiper-slide h-auto">
                                <a
                                    class="pill pill-sm component-ticker__item"
                                    href="<?php echo lbcc_escape($url); ?>"
                                    <?php if ($target !== '') { ?>target="<?php echo lbcc_escape($target); ?>"<?php } ?>
                                    <?php if ($rel !== '') { ?>rel="<?php echo lbcc_escape($rel); ?>"<?php } ?>
                                >
                                    <span class="component-ticker__item-text"><?php echo lbcc_escape($text); ?></span>
                                    <span class="pill-icon fa-sharp fa-regular fa-arrow-up-right" aria-hidden="true"></span>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <?php if ($canRotate) { ?>
                    <button
                        class="component-ticker__toggle btn btn-link text-decoration-none p-0 d-none d-md-inline-flex flex-shrink-0"
                        type="button"
                        data-lbcc-ticker-toggle
                        aria-label="Pause ticker autoplay"
                        aria-pressed="false"
                    >
                        <span class="fa-sharp fa-solid fa-pause" aria-hidden="true" data-lbcc-ticker-icon="pause"></span>
                        <span class="fa-sharp fa-solid fa-play d-none" aria-hidden="true" data-lbcc-ticker-icon="play"></span>
                    </button>
                <?php } ?>
            </div>
        </div>
    </div>
<?php }

// Social Media
// $items accepts arrays with: link, icon, sr_label, target (optional; defaults to true)
// $style options: light (white), dark (gray-900), or primary
// $size options: s, m, or l
function component_social_media(
    $items = [],
    $style = 'light',
    $size = 'm',
    $additionalWrapperClasses = []
) {
    if (empty($items) || !is_array($items)) {
        return;
    }

    $style = in_array($style, ['light', 'dark', 'primary'], true) ? $style : 'light';
    $size = in_array($size, ['s', 'm', 'l'], true) ? $size : 'm';
    $sizeClasses = [
        's' => 'fs-6',
        'm' => 'fs-4',
        'l' => 'fs-2'
    ];
    $wrapperClasses = [
        'component-social-media',
        'component-social-media--' . $style,
        'd-flex',
        'flex-wrap',
        'align-items-center',
        'gap-3',
        $style === 'light' ? 'text-white' : ($style === 'primary' ? 'text-primary' : 'text-dark'),
        $sizeClasses[$size]
    ];

    if (is_string($additionalWrapperClasses) && trim($additionalWrapperClasses) !== '') {
        $wrapperClasses[] = trim($additionalWrapperClasses);
    } elseif (is_array($additionalWrapperClasses)) {
        foreach ($additionalWrapperClasses as $wrapperClass) {
            if (is_string($wrapperClass) && trim($wrapperClass) !== '') {
                $wrapperClasses[] = trim($wrapperClass);
            }
        }
    }
    ?>
    <div class="<?php echo lbcc_escape(implode(' ', $wrapperClasses)); ?>">
        <?php foreach ($items as $item) {
            if (!is_array($item)) {
                continue;
            }

            $link = trim((string) ($item['link'] ?? ''));
            $icon = trim((string) ($item['icon'] ?? ''));
            $srLabel = trim((string) ($item['sr_label'] ?? ''));
            $openInNewTab = !array_key_exists('target', $item) || (bool) $item['target'];

            if ($link === '' || $icon === '' || $srLabel === '') {
                continue;
            }
            ?>
            <a
                href="<?php echo lbcc_escape($link); ?>"
                class="component-social-media__link d-inline-flex align-items-center justify-content-center text-reset text-decoration-none no-target-blank-icon"
                <?php if ($openInNewTab) { ?>target="_blank" rel="noopener noreferrer"<?php } ?>
            >
                <span class="fa-brands <?php echo lbcc_escape($icon); ?>" aria-hidden="true"></span>
                <span class="visually-hidden"><?php echo lbcc_escape($srLabel); ?></span>
            </a>
        <?php } ?>
    </div>
<?php }

// Events
// $variation options: default, mobile-vert, or horizontal
// $items is an array of arrays with:
// title, url, meta, category
function component_events(
    $items = [],
    $variation = 'default'
) {
    if (empty($items) || !is_array($items)) {
        return;
    }

    $variation = in_array($variation, ['default', 'mobile-vert', 'horizontal'], true) ? $variation : 'default';
    $mappedItems = [];

    foreach ($items as $item) {
        if (!is_array($item) || empty($item['title'])) {
            continue;
        }

        $mappedItems[] = [
            'link' => !empty($item['url']) ? (string) $item['url'] : '#',
            'title' => (string) $item['title'],
            'description' => !empty($item['meta']) ? (string) $item['meta'] : '',
            'label' => !empty($item['category']) ? (string) $item['category'] : '',
            'left_icon' => !empty($item['left_icon']) ? trim((string) $item['left_icon']) : ''
        ];
    }

    if (empty($mappedItems)) {
        return;
    }
    ?>
    <div class="component-events component-events--<?php echo lbcc_escape($variation); ?> d-grid gap-4">
        <?php if ($variation === 'horizontal') { ?>
            <div class="row row-cols-1 row-cols-xl-4 g-3">
                <?php foreach ($mappedItems as $mappedItem) {
                    $mappedItem['class'] = 'h-100';
                    ?>
                    <div class="col">
                        <?php component_list_group([$mappedItem], 'surface', '', ['component-events-list', 'component-events-list--horizontal']); ?>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <?php component_list_group($mappedItems, 'surface', '', ['component-events-list', 'component-events-list--' . $variation]); ?>
        <?php } ?>
    </div>
<?php }

// Title with CTAs
// $buttons accepts an array of arrays with:
// text, url, class
function component_title_with_ctas(
    $title = '',
    $buttons = [],
    $content = '',
    $lineClass = 'border-gray-300'
) {
    if ($title === '') {
        return;
    }

    $lineClass = !empty($lineClass) ? trim((string) $lineClass) : 'border-gray-300';
    ?>
    <section class="component-title-with-ctas d-grid gap-3">
        <div class="component-title-with-ctas__header d-flex flex-column align-items-stretch gap-3 flex-lg-row align-items-lg-center">
            <div class="component-title-with-ctas__title-line d-flex align-items-center gap-2 w-100 min-w-0">
                <h2 class="component-title-with-ctas__title mb-0"><?php echo lbcc_escape($title); ?></h2>
                <div class="component-title-with-ctas__line border-top flex-grow-1 min-w-0 <?php echo lbcc_escape($lineClass); ?>"></div>
            </div>

            <?php if (!empty($buttons) && is_array($buttons)) { ?>
                <div class="component-title-with-ctas__actions d-flex flex-wrap gap-2 flex-lg-nowrap justify-content-lg-end">
                    <?php foreach ($buttons as $button) {
                        if (!is_array($button) || empty($button['text'])) {
                            continue;
                        }

                        $text = (string) $button['text'];
                        $url = !empty($button['url']) ? (string) $button['url'] : '#';
                        $class = !empty($button['class']) ? trim((string) $button['class']) : 'btn btn-secondary btn-sm rounded-pill';

                        if ($class !== '' && strpos(' ' . $class . ' ', ' text-nowrap ') === false) {
                            $class .= ' text-nowrap';
                        }
                        ?>
                        <a href="<?php echo lbcc_escape($url); ?>" class="<?php echo lbcc_escape($class); ?>">
                            <?php echo lbcc_escape($text); ?>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

        <?php if ($content !== '') { ?>
            <div class="component-title-with-ctas__content text-body-secondary">
                <?php echo $content; ?>
            </div>
        <?php } ?>
    </section>
<?php }

// Accordion
// $items is an array of arrays with:
// title, content, icon, open
function component_accordion(
    $items = [],
    $id = '',
    $showIcons = true,
    $allowMultiple = true,
    $style = 'default'
) {
    if (empty($items) || !is_array($items)) {
        return;
    }

    static $accordionCount = 0;
    $accordionCount++;

    $id = trim((string) $id);

    if ($id === '') {
        $id = 'component-accordion-' . $accordionCount;
    }

    $style = in_array($style, ['default', 'surface-raised'], true) ? $style : 'default';
    ?>
    <div class="accordion component-accordion component-accordion--<?php echo lbcc_escape($style); ?> d-grid gap-3" id="<?php echo lbcc_escape($id); ?>">
        <?php foreach (array_values($items) as $index => $item) {
            if (!is_array($item) || empty($item['title'])) {
                continue;
            }

            $title = (string) $item['title'];
            $content = !empty($item['content']) ? (string) $item['content'] : '';
            $icon = !empty($item['icon']) ? trim((string) $item['icon']) : '';
            $isOpen = !empty($item['open']);
            $itemId = $id . '-item-' . ($index + 1);
            $headingId = $itemId . '-heading';
            $collapseId = $itemId . '-collapse';
            ?>
            <div class="accordion-item component-accordion__item border overflow-hidden rounded-4">
                <h3 class="accordion-header" id="<?php echo lbcc_escape($headingId); ?>">
                    <button
                        class="accordion-button component-accordion__button<?php echo $isOpen ? '' : ' collapsed'; ?> px-4 py-3"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#<?php echo lbcc_escape($collapseId); ?>"
                        aria-expanded="<?php echo $isOpen ? 'true' : 'false'; ?>"
                        aria-controls="<?php echo lbcc_escape($collapseId); ?>"
                    >
                        <span class="component-accordion__button-inner d-flex align-items-center gap-2 w-100 min-w-0 pe-4">
                            <?php if ($showIcons && $icon !== '') { ?>
                                <span class="component-accordion__icon fa-sharp fa-regular <?php echo lbcc_escape($icon); ?> flex-shrink-0" aria-hidden="true"></span>
                            <?php } ?>
                            <span class="component-accordion__title min-w-0"><?php echo lbcc_escape($title); ?></span>
                        </span>
                    </button>
                </h3>
                <div
                    id="<?php echo lbcc_escape($collapseId); ?>"
                    class="accordion-collapse collapse<?php echo $isOpen ? ' show' : ''; ?>"
                    aria-labelledby="<?php echo lbcc_escape($headingId); ?>"
                    <?php if (!$allowMultiple) { ?>data-bs-parent="#<?php echo lbcc_escape($id); ?>"<?php } ?>
                >
                    <div class="accordion-body component-accordion__body px-4 pt-0 pb-4">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php }

// Tabs
// $items is an array of arrays with:
// label, content, active
function component_tabs(
    $items = [],
    $id = ''
) {
    if (empty($items) || !is_array($items)) {
        return;
    }

    static $tabsCount = 0;
    $tabsCount++;

    $id = trim((string) $id);

    if ($id === '') {
        $id = 'component-tabs-' . $tabsCount;
    }

    $hasActiveTab = false;

    foreach ($items as $item) {
        if (is_array($item) && !empty($item['active'])) {
            $hasActiveTab = true;
            break;
        }
    }
    ?>
    <div class="component-tabs border rounded-5 overflow-hidden bg-white">
        <ul class="nav nav-tabs component-tabs__nav align-items-stretch gap-2 border-0 bg-surface-subtle p-3" id="<?php echo lbcc_escape($id); ?>" role="tablist">
            <?php foreach (array_values($items) as $index => $item) {
                if (!is_array($item) || empty($item['label'])) {
                    continue;
                }

                $label = (string) $item['label'];
                $isActive = !empty($item['active']) || (!$hasActiveTab && $index === 0);
                $tabId = $id . '-tab-' . ($index + 1);
                $paneId = $id . '-pane-' . ($index + 1);
                ?>
                <li class="nav-item component-tabs__nav-item" role="presentation">
                    <button
                        class="nav-link component-tabs__link rounded-4 border-0 px-4 py-3 fw-bold text-nowrap w-100<?php echo $isActive ? ' active' : ''; ?>"
                        id="<?php echo lbcc_escape($tabId); ?>"
                        data-bs-toggle="tab"
                        data-bs-target="#<?php echo lbcc_escape($paneId); ?>"
                        type="button"
                        role="tab"
                        aria-controls="<?php echo lbcc_escape($paneId); ?>"
                        aria-selected="<?php echo $isActive ? 'true' : 'false'; ?>"
                    >
                        <?php echo lbcc_escape($label); ?>
                    </button>
                </li>
            <?php } ?>
        </ul>

        <div class="tab-content component-tabs__content p-4">
            <?php foreach (array_values($items) as $index => $item) {
                if (!is_array($item) || empty($item['label'])) {
                    continue;
                }

                $content = !empty($item['content']) ? (string) $item['content'] : '';
                $isActive = !empty($item['active']) || (!$hasActiveTab && $index === 0);
                $tabId = $id . '-tab-' . ($index + 1);
                $paneId = $id . '-pane-' . ($index + 1);
                ?>
                <div
                    class="tab-pane fade<?php echo $isActive ? ' show active' : ''; ?>"
                    id="<?php echo lbcc_escape($paneId); ?>"
                    role="tabpanel"
                    aria-labelledby="<?php echo lbcc_escape($tabId); ?>"
                    tabindex="0"
                >
                    <?php echo $content; ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
