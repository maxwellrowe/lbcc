<?php

function lbcc_site_config(): array
{
    return [
        'site_name' => 'Long Beach City College',
        'short_name' => 'LBCC',
        'base_path' => '',
        'theme_color' => '#DA2919',
        'background_color' => '#FFFEFB',
        'logo_wordmark' => '_resources/images/lbcc-logo-horz.svg',
        'logo_mark' => '_resources/images/lb-logo.svg',
        'app_icon_svg' => '_resources/images/lb-icon.svg',
        'app_icon_png' => '_resources/images/lb-icon.png'
    ];
}

function lbcc_page_title(?string $title = null): string
{
    $site = lbcc_site_config();

    if ($title === null || $title === '') {
        return $site['site_name'];
    }

    return $title . ' | ' . $site['short_name'];
}

function lbcc_page_defaults(): array
{
    return [
        'title' => null,
        'description' => '',
        'canonical' => null,
        'section_nav' => false,
        'section_nav_include' => null,
        'sidenav' => false,
        'sidenav_include' => null,
        'custom_hero' => false
    ];
}

function lbcc_resolve_page(array $page = []): array
{
    return array_merge(lbcc_page_defaults(), $page);
}

function lbcc_body_classes(array $page = []): string
{
    $page = lbcc_resolve_page($page);
    $classes = ['lbcc-page'];

    if (!empty($page['section_nav'])) {
        $classes[] = 'section-nav-active';
    }

    return implode(' ', $classes);
}

function lbcc_page_partial_path(?string $includePath): ?string
{
    if ($includePath === null || $includePath === '') {
        return null;
    }

    if (str_starts_with($includePath, '/')) {
        return $includePath;
    }

    return lbcc_site_root_dir() . '/' . ltrim($includePath, '/');
}

function lbcc_site_root_dir(): string
{
    return dirname(__DIR__, 3);
}

function lbcc_runtime_base_path(): string
{
    $configuredBasePath = rtrim(lbcc_site_config()['base_path'], '/');
    $scriptName = parse_url($_SERVER['SCRIPT_NAME'] ?? '', PHP_URL_PATH) ?: '';
    $scriptFilename = $_SERVER['SCRIPT_FILENAME'] ?? '';
    $siteRoot = str_replace('\\', '/', lbcc_site_root_dir());
    $normalizedScriptFilename = str_replace('\\', '/', $scriptFilename);

    if ($scriptName === '' || $scriptFilename === '') {
        return $configuredBasePath;
    }

    if (!str_starts_with($normalizedScriptFilename, $siteRoot)) {
        return $configuredBasePath;
    }

    $relativeScript = ltrim(substr($normalizedScriptFilename, strlen($siteRoot)), '/');

    if ($relativeScript === '') {
        return $configuredBasePath;
    }

    $suffix = '/' . str_replace('\\', '/', $relativeScript);

    if (str_ends_with($scriptName, $suffix)) {
        return substr($scriptName, 0, -strlen($suffix));
    }

    return rtrim(dirname($scriptName), '/');
}

function lbcc_relative_root_prefix(): string
{
    $scriptFilename = $_SERVER['SCRIPT_FILENAME'] ?? '';
    $siteRoot = str_replace('\\', '/', lbcc_site_root_dir());
    $scriptDir = str_replace('\\', '/', dirname($scriptFilename !== '' ? $scriptFilename : $siteRoot));

    if (!str_starts_with($scriptDir, $siteRoot)) {
        return '';
    }

    $relativeDir = trim(substr($scriptDir, strlen($siteRoot)), '/');

    if ($relativeDir === '') {
        return '';
    }

    $segments = array_filter(explode('/', $relativeDir), static fn ($segment) => $segment !== '');

    return str_repeat('../', count($segments));
}

function lbcc_url(string $path = ''): string
{
    $normalized = trim($path, '/');
    $prefix = lbcc_relative_root_prefix();

    if ($normalized === '') {
        return $prefix !== '' ? $prefix : './';
    }

    if (str_starts_with($normalized, '#')) {
        return ($prefix !== '' ? $prefix : './') . $normalized;
    }

    return $prefix . $normalized;
}

function lbcc_escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function lbcc_request_path(): string
{
    $requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $basePath = lbcc_runtime_base_path();

    if ($basePath !== '' && str_starts_with($requestPath, $basePath)) {
        $requestPath = substr($requestPath, strlen($basePath)) ?: '/';
    }

    return '/' . trim($requestPath, '/');
}

function lbcc_is_current_path(string $path): bool
{
    $normalized = '/' . trim($path, '/');

    if ($normalized === '//') {
        $normalized = '/';
    }

    return lbcc_request_path() === $normalized;
}
