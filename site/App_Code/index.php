<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Templates & Resources',
    'description' => 'LBCC development and documentation area.',
    'section_nav' => true,
    'section_nav_include' => __DIR__ . '/navs/section-nav-default.php',
    'sidenav' => false,
    'sidenav_include' => '',
    'custom_hero' => true
]);


$templateItems = [
    [
        'link' => lbcc_url('/App_Code/academics.php'),
        'title' => 'Academics'
    ],
    [
        'link' => lbcc_url('/App_Code/alerts.php'),
        'title' => 'Alerts'
    ],
    [
        'link' => lbcc_url('/App_Code/homepage.php'),
        'title' => 'Homepage'
    ],
    [
        'link' => lbcc_url('/App_Code/programs.php'),
        'title' => 'Programs'
    ],
    [
        'link' => lbcc_url('/App_Code/search.php'),
        'title' => 'Search LBCC'
    ],
    [
        'link' => lbcc_url('/App_Code/support.php'),
        'title' => 'Support'
    ],
    [
        'link' => lbcc_url('/App_Code/student-in-the-loop.php'),
        'title' => 'Student in the Loop'
    ],
    [
        'link' => lbcc_url('/App_Code/news.php'),
        'title' => 'News'
    ],
    [
        'link' => lbcc_url('/App_Code/directory.php'),
        'title' => 'Directory'
    ],
    [
        'link' => lbcc_url('/App_Code/a-z.php'),
        'title' => 'A-Z Index'
    ],
    [
        'link' => lbcc_url('/App_Code/basic-page.php'),
        'title' => 'Basic Page'
    ],
    [
        'link' => lbcc_url('/App_Code/basic-page-sidenav.php'),
        'title' => 'Basic Page Sidenav'
    ],
    [
        'link' => lbcc_url('/App_Code/current-students.php'),
        'title' => 'Current Students'
    ],
    [
        'link' => lbcc_url('/App_Code/directory-profile.php'),
        'title' => 'Directory Profile'
    ],
    [
        'link' => lbcc_url('/App_Code/financial-aid.php'),
        'title' => 'Financial Aid'
    ],
    [
        'link' => lbcc_url('/App_Code/news-archive.php'),
        'title' => 'News Archive'
    ],
    [
        'link' => lbcc_url('/App_Code/news-single.php'),
        'title' => 'News Single'
    ],
    [
        'link' => lbcc_url('/App_Code/program-single.php'),
        'title' => 'Program Single (Accounting)'
    ],
    [
        'link' => lbcc_url('/App_Code/program-single-nursing.php'),
        'title' => 'Program (Registered Nursing)'
    ],
    [
        'link' => lbcc_url('/App_Code/404.php'),
        'title' => '404 Page'
    ]
];

usort($templateItems, static function (array $left, array $right): int {
    return strcasecmp((string) $left['title'], (string) $right['title']);
});

$resourceItems = [
    [
        'link' => lbcc_url('/App_Code/components.php'),
        'title' => 'Components'
    ],
    [
        'link' => lbcc_url('/App_Code/snippets.php'),
        'title' => 'Snippets'
    ],
    [
        'link' => lbcc_url('/App_Code/styleguide.php'),
        'title' => 'Styleguide'
    ]
];
?>

<?php ob_start(); ?>
<?php component_buttons(
    [
        [
            'style' => 'btn-primary',
            'text' => 'Templates',
            'url' => '#templates-heading',
            'size' => '',
            'icon' => ''
        ],
        [
            'style' => 'btn-primary',
            'text' => 'Components',
            'url' => '../App_Code/components.php',
            'size' => '',
            'icon' => ''
        ],
        [
            'style' => 'btn-primary',
            'text' => 'Snippets',
            'url' => '../App_Code/snippets.php',
            'size' => '',
            'icon' => ''
        ],
        [
            'style' => 'btn-primary',
            'text' => 'Styleguide',
            'url' => '../App_Code/styleguide.php',
            'size' => '',
            'icon' => ''
        ],
        
    ],
    'row',
    2
); ?>
<?php $buttonGroupMarkup = ob_get_clean(); ?>
<?php
$heroSupplementalContent = '
    <div class="mt-4">' . $buttonGroupMarkup . '</div>
';
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="<?php echo lbcc_escape(lbcc_body_classes($page)); ?>">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<?php if ($page['custom_hero']) { ?>
    <?php
    component_hero(
        'split',
        'Templates & Resources',
        $heroSupplementalContent,
        [
            [
                'type' => 'video',
                'src' => '_resources/video/homepage/skating.mp4',
                'alt' => ''
            ]
        ],
        [
            [
                'type' => 'video',
                'src' => '_resources/video/hero-backgrounds/hero-bg-6.mp4',
                'poster' => '_resources/images/hero-backgrounds/hero-bg-2.jpg'
            ]
        ],
        [],
        true
    );
    ?>
<?php } ?>
<main id="main-content">
    <div class="container-xxl">
        <section class="mb-5">
            <div class="d-grid gap-3">
                <p class="mb-0"><strong>Note:</strong> The page templates below, for the most part, utilize the components and snippets available for use.</p>
                <p class="mb-0"><strong>Structure:</strong> There are a couple of snippets that provide structure, especially Section and Columns. By default, <code>#main-content</code> does not include its own container, so layout structure is typically introduced by the snippet or component being used.</p>
                <ul class="mb-0 ps-3">
                    <li>Create a page parameter to set the main content as contained vs. full width. If full width, the editor would use Section snippets to provide base structure.</li>
                    <li>Breadcrumbs should remain optional and able to be turned on or off per page.</li>
                </ul>
            </div>
        </section>

        <section class="mb-5" aria-labelledby="templates-heading">
            <div class="d-grid gap-3">
                <h2 id="templates-heading" class="mb-0">Templates</h2>
                <p class="mb-0 text-body-secondary">Page templates available for iterative front-end and CMS handoff work.</p>
                <?php component_list_group($templateItems, 'surface', 'default'); ?>
            </div>

            <div class="mt-3">
                <button
                    class="btn btn-link p-0 d-inline-flex align-items-center gap-2"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#homepage-notes"
                    aria-expanded="false"
                    aria-controls="homepage-notes"
                >
                    <span>Homepage Notes</span>
                    <span class="fa-sharp fa-regular fa-plus" aria-hidden="true"></span>
                </button>
                <div class="collapse mt-3" id="homepage-notes">
                    <div class="bg-surface-subtle rounded-3 p-4">
                        <p class="mb-3">The homepage should stay modular like the other pages, preferably using components and snippets so it can evolve over time without needing a separate pattern system.</p>
                        <h3 class="h5 mb-2">Hero</h3>
                        <a class="arrow-link" href="<?php echo lbcc_escape(lbcc_url('/App_Code/components.php#hero-heading')); ?>">View Homepage Hero component</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5" aria-labelledby="resources-heading">
            <div class="d-grid gap-3">
                <h2 id="resources-heading" class="mb-0">Resources</h2>
                <p class="mb-0 text-body-secondary">Shared design-system references and implementation examples used throughout the templates.</p>
                <?php component_list_group($resourceItems, 'surface', 'default'); ?>
            </div>
        </section>
    </div>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
