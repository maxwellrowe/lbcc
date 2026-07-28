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

function lbcc_url(string $path = ''): string
{
    $basePath = rtrim(lbcc_site_config()['base_path'], '/');
    $normalized = trim($path, '/');

    if ($normalized === '') {
        return $basePath !== '' ? $basePath . '/' : '/';
    }

    return ($basePath !== '' ? $basePath : '') . '/' . $normalized;
}

function lbcc_escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function lbcc_request_path(): string
{
    $requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $basePath = rtrim(lbcc_site_config()['base_path'], '/');

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
