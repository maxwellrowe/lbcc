<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'All Programs',
    'description' => 'Sample all programs template with search, filtering, and reusable program cards.',
    'section_nav' => true,
    'section_nav_include' => __DIR__ . '/navs/section-nav-programs.php',
    'sidenav' => false,
    'sidenav_include' => '',
    'custom_hero' => false
]);

$dataPath = __DIR__ . '/data/programs.json';
$programEntries = [];

if (is_readable($dataPath)) {
    $json = file_get_contents($dataPath);
    $decoded = json_decode($json, true);

    if (is_array($decoded)) {
        $programEntries = $decoded;
    }
}

$pathwayIcons = [
    'Arts, Language & Communication' => '_resources/images/cap/arts-languages-communication.png',
    'Business, Management & Entrepreneurship' => '_resources/images/cap/business-management-ent.png',
    'Health, Science & Technology' => '_resources/images/cap/health-science-technology.png',
    'Society & Education' => '_resources/images/cap/society-education.png',
    'Trades & Service Industry' => '_resources/images/cap/trades-service-industry.png'
];

$pathways = [];
$programOptions = [];
$departments = [];

foreach ($programEntries as $entry) {
    $entryPathways = array_values(array_filter(array_map(
        'trim',
        preg_split('/\\s*;\\s*/', (string) ($entry['pathway'] ?? '')) ?: []
    )));
    $department = trim((string) ($entry['department'] ?? ''));
    $entryProgramOptions = !empty($entry['program_options']) && is_array($entry['program_options'])
        ? array_values(array_filter(array_map('trim', $entry['program_options'])))
        : [];

    foreach ($entryPathways as $pathway) {
        $pathways[$pathway] = $pathway;
    }

    if ($department !== '') {
        $departments[$department] = $department;
    }

    foreach ($entryProgramOptions as $programOption) {
        $programOptions[$programOption] = $programOption;
    }
}

natcasesort($pathways);
natcasesort($programOptions);
natcasesort($departments);

$buildProgramSearchIndex = static function (array $entry): string {
    $parts = [
        $entry['title'] ?? '',
        $entry['pathway'] ?? '',
        $entry['department'] ?? '',
        implode(' ', is_array($entry['program_options'] ?? null) ? $entry['program_options'] : [])
    ];

    return strtolower(trim(implode(' ', array_filter(array_map('strval', $parts)))));
};
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="lbcc-page">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<?php if ($page['custom_hero']) { ?>
<?php // Include Custom Hero Component here... ?>
<?php } ?>
<main id="main-content" class="programs-page py-5">
    <div class="container-xxl" data-lbcc-programs>
        <div class="w-100 mb-5">
            <p class="lead text-body-secondary mb-0">Explore LBCC&apos;s 70+ programs. Use the filters below to narrow your options and find the program that best fits you.</p>
        </div>

        <div class="row g-4 g-xl-5 align-items-start">
            <div class="col-12 col-xl-9 order-2 order-xl-1">
                <section class="programs-toolbar mb-4" aria-labelledby="programs-search-heading">
                    <div class="row g-3 align-items-end">
                        <div class="col-12 col-lg-8">
                            <?php component_search_programs(
                                $programEntries,
                                'Search Programs',
                                'Start typing to search programs...',
                                ['data-lbcc-programs-search' => true]
                            ); ?>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label class="form-label fw-semibold mb-2" for="programs-sort">Sort</label>
                            <select id="programs-sort" class="form-select" data-lbcc-programs-sort>
                                <option value="az">Program Title A-Z</option>
                                <option value="za">Program Title Z-A</option>
                            </select>
                        </div>
                    </div>
                </section>

                <div class="programs-active-filters d-none flex-wrap align-items-center gap-2 mb-3" data-lbcc-programs-active-filters></div>

                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
                    <p id="programs-search-heading" class="programs-results__count mb-0 text-body-secondary" data-lbcc-programs-count>
                        Showing <?php echo lbcc_escape((string) count($programEntries)); ?> programs
                    </p>

                    <button
                        class="btn btn-outline-secondary btn-sm d-xl-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#programs-filters-panel"
                        aria-expanded="false"
                        aria-controls="programs-filters-panel"
                    >
                        Filters
                        <span class="badge bg-surface-water text-dark ms-2" data-lbcc-programs-filter-count>0</span>
                    </button>
                </div>

                <section aria-labelledby="programs-results-heading">
                    <h2 id="programs-results-heading" class="visually-hidden">Programs</h2>

                    <div class="row row-cols-1 row-cols-md-2 row-cols-xxl-3 g-4 programs-results__grid" data-lbcc-programs-grid>
                        <?php foreach ($programEntries as $entry) {
                            $title = trim((string) ($entry['title'] ?? ''));
                            $link = trim((string) ($entry['url'] ?? '#'));
                            $image = trim((string) ($entry['image'] ?? ''));
                            $pathway = trim((string) ($entry['pathway'] ?? ''));
                            $department = trim((string) ($entry['department'] ?? ''));
                            $entryProgramOptions = !empty($entry['program_options']) && is_array($entry['program_options'])
                                ? array_values(array_filter(array_map('trim', $entry['program_options'])))
                                : [];

                            if ($title === '') {
                                continue;
                            }
                            ?>
                            <div class="col">
                                <?php
                                component_program_card(
                                    $link,
                                    $title,
                                    $image,
                                    $entryProgramOptions,
                                    $pathway,
                                    $department,
                                    'fa-award-simple',
                                    [
                                        'data-search-index' => $buildProgramSearchIndex($entry),
                                        'data-title' => strtolower($title),
                                        'data-department-label' => strtolower($department)
                                    ]
                                );
                                ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="programs-empty d-none bg-surface-raised rounded-4 p-4 text-center mt-4" data-lbcc-programs-empty>
                        <h2 class="h4 mb-2">No Results Found</h2>
                        <p class="mb-0 text-body-secondary">Try a different search term or adjust your filters.</p>
                    </div>
                </section>
            </div>

            <aside class="col-12 col-xl-3 order-1 order-xl-2">
                <div class="programs-page__sidebar">
                    <div class="programs-filter-card bg-surface-subtle rounded-4 p-3 p-xl-4">
                        <div class="d-none d-xl-flex align-items-center justify-content-between gap-3 mb-4">
                            <h2 id="programs-sidebar-heading" class="h5 mb-0">Filters</h2>
                            <span class="badge bg-surface-water text-dark" data-lbcc-programs-filter-count>0</span>
                        </div>

                        <button
                            class="programs-filter-card__toggle btn btn-link d-flex d-xl-none align-items-center justify-content-between w-100 px-0 py-0 mb-0 collapsed"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#programs-filters-panel"
                            aria-expanded="false"
                            aria-controls="programs-filters-panel"
                        >
                            <span class="d-inline-flex align-items-center gap-2">
                                <span class="fa-sharp fa-regular fa-sliders" aria-hidden="true"></span>
                                <span class="eyebrow-sm mb-0">Filter</span>
                            </span>
                            <span class="d-inline-flex align-items-center gap-2">
                                <span class="badge bg-surface-water text-dark" data-lbcc-programs-filter-count>0</span>
                                <span class="programs-filter-card__toggle-indicator fa-sharp fa-regular fa-plus" aria-hidden="true"></span>
                            </span>
                        </button>

                        <div id="programs-filters-panel" class="collapse d-xl-block">
                            <div class="d-grid gap-4">
                                <section class="programs-filter-group" aria-labelledby="programs-filters-pathways">
                                    <div class="d-flex align-items-center justify-content-between gap-3 mb-3">
                                        <h3 id="programs-filters-pathways" class="h6 mb-0">Career and Academic Pathways</h3>
                                        <span class="fa-sharp fa-regular fa-circle-info text-body-secondary" aria-hidden="true"></span>
                                    </div>

                                    <div class="d-grid gap-3">
                                        <?php foreach ($pathways as $pathway) {
                                            $pathwaySlug = lbcc_slugify($pathway);
                                            $pathwayIcon = $pathwayIcons[$pathway] ?? '';
                                            $pathwayInputId = 'programs-pathway-' . $pathwaySlug;
                                            ?>
                                            <label class="programs-filter-option d-flex align-items-center gap-3" for="<?php echo lbcc_escape($pathwayInputId); ?>">
                                                <input
                                                    id="<?php echo lbcc_escape($pathwayInputId); ?>"
                                                    class="form-check-input mt-0 flex-shrink-0"
                                                    type="checkbox"
                                                    value="<?php echo lbcc_escape($pathwaySlug); ?>"
                                                    data-lbcc-programs-pathway
                                                >
                                                <span class="programs-filter-option__visual d-inline-flex align-items-center justify-content-center rounded-circle flex-shrink-0">
                                                    <?php if ($pathwayIcon !== '') { ?>
                                                        <img src="<?php echo lbcc_escape(lbcc_url($pathwayIcon)); ?>" width="20" height="20" alt="">
                                                    <?php } ?>
                                                </span>
                                                <span class="programs-filter-option__label"><?php echo lbcc_escape($pathway); ?></span>
                                            </label>
                                        <?php } ?>
                                    </div>
                                </section>

                                <section class="programs-filter-group" aria-labelledby="programs-filters-options">
                                    <h3 id="programs-filters-options" class="h6 mb-3">Program Options</h3>

                                    <div class="d-grid gap-3">
                                        <?php foreach ($programOptions as $programOption) {
                                            $programOptionSlug = lbcc_slugify($programOption);
                                            $programOptionInputId = 'programs-option-' . $programOptionSlug;
                                            ?>
                                            <label class="programs-filter-check d-flex align-items-center gap-3" for="<?php echo lbcc_escape($programOptionInputId); ?>">
                                                <input
                                                    id="<?php echo lbcc_escape($programOptionInputId); ?>"
                                                    class="form-check-input mt-0 flex-shrink-0"
                                                    type="checkbox"
                                                    value="<?php echo lbcc_escape($programOptionSlug); ?>"
                                                    data-lbcc-programs-option
                                                >
                                                <span class="programs-filter-check__label"><?php echo lbcc_escape($programOption); ?></span>
                                            </label>
                                        <?php } ?>
                                    </div>
                                </section>

                                <section class="programs-filter-group" aria-labelledby="programs-filters-departments">
                                    <h3 id="programs-filters-departments" class="h6 mb-3">Department</h3>

                                    <div class="dropdown programs-filter-dropdown">
                                        <button
                                            class="btn component-support-matrix__filter-toggle w-100 programs-filter-dropdown__toggle"
                                            type="button"
                                            data-bs-toggle="dropdown"
                                            data-bs-auto-close="outside"
                                            data-lbcc-programs-department-toggle
                                            data-placeholder="Select departments..."
                                            aria-expanded="false"
                                        >
                                            <span data-lbcc-programs-department-label data-lbcc-support-need-label>Select departments...</span>
                                        </button>

                                        <div class="dropdown-menu component-support-matrix__menu w-100 p-0 border-0 overflow-hidden programs-filter-dropdown__menu">
                                            <?php foreach ($departments as $department) {
                                                $departmentSlug = lbcc_slugify($department);
                                                ?>
                                                <button
                                                    type="button"
                                                    class="dropdown-item component-support-matrix__menu-item d-flex align-items-center gap-2"
                                                    data-lbcc-programs-department-option
                                                    data-value="<?php echo lbcc_escape($departmentSlug); ?>"
                                                    data-label="<?php echo lbcc_escape($department); ?>"
                                                    aria-pressed="false"
                                                >
                                                    <span class="programs-filter-dropdown__check flex-shrink-0" aria-hidden="true"></span>
                                                    <span class="flex-grow-1"><?php echo lbcc_escape($department); ?></span>
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
