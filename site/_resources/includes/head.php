<?php
require_once dirname(__DIR__, 2) . '/App_Code/includes/functions/template-functions.php';

function lbcc_head(array $page = []): void
{
    $page = lbcc_resolve_page($page);
    $config = lbcc_site_config();
    $title = lbcc_page_title($page['title']);
    $description = $page['description'];
    $canonical = $page['canonical'];
    $faviconSvg = lbcc_url($config['app_icon_svg']);
    $faviconPng = lbcc_url($config['app_icon_png']);
    ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo lbcc_escape($title); ?></title>
        <meta name="description" content="<?php echo lbcc_escape($description); ?>">
        <meta name="theme-color" content="<?php echo lbcc_escape($config['theme_color']); ?>">
        <meta name="color-scheme" content="light">
        <script>
            document.documentElement.classList.remove('no-js');
            document.documentElement.classList.add('js');
        </script>
        <?php if ($canonical) { ?>
            <link rel="canonical" href="<?php echo lbcc_escape($canonical); ?>">
        <?php } ?>
        <link rel="icon" href="<?php echo lbcc_escape($faviconSvg); ?>" type="image/svg+xml">
        <link rel="icon" href="<?php echo lbcc_escape($faviconPng); ?>" sizes="500x500" type="image/png">
        <link rel="apple-touch-icon" href="<?php echo lbcc_escape($faviconPng); ?>">
        <link rel="manifest" href="<?php echo lbcc_escape(lbcc_url('manifest.json')); ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300;400;500&family=DM+Sans:wght@100;200;300;400;500;600;700;800;900&family=Instrument+Sans:wght@400;500;600;700&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300;400;500&family=DM+Sans:wght@100;200;300;400;500;600;700;800;900&family=Instrument+Sans:wght@400;500;600;700&display=swap" media="print" onload="this.media='all'">
        <noscript>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300;400;500&family=DM+Sans:wght@100;200;300;400;500;600;700;800;900&family=Instrument+Sans:wght@400;500;600;700&display=swap">
        </noscript>
        <link rel="stylesheet" href="<?php echo lbcc_escape(lbcc_url('_resources/font-awesome/css/fontawesome.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo lbcc_escape(lbcc_url('_resources/font-awesome/css/brands.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo lbcc_escape(lbcc_url('_resources/font-awesome/css/sharp-regular.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo lbcc_escape(lbcc_url('_resources/font-awesome/css/sharp-solid.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo lbcc_escape(lbcc_url('_resources/css/swiper-bundle.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo lbcc_escape(lbcc_url('_resources/css/main.css')); ?>">
    </head>
    <?php
}
