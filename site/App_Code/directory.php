<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Directory',
    'description' => 'Sample directory template with front-end search and department filtering.',
    'section_nav' => false,
    'section_nav_include' => '',
    'sidebar' => false,
    'sidebar_include' => '',
    'custom_hero' => false
]);

$dataPath = __DIR__ . '/data/directory.json';
$directoryEntries = [];

if (is_readable($dataPath)) {
    $json = file_get_contents($dataPath);
    $decoded = json_decode($json, true);

    if (is_array($decoded)) {
        $directoryEntries = $decoded;
    }
}

usort($directoryEntries, static function ($left, $right) {
    $leftName = ($left['last_name'] ?? '') . ', ' . ($left['first_name'] ?? '');
    $rightName = ($right['last_name'] ?? '') . ', ' . ($right['first_name'] ?? '');

    return strcasecmp($leftName, $rightName);
});

$groupedEntries = [];
$departments = [];

foreach ($directoryEntries as $entry) {
    $lastName = (string) ($entry['last_name'] ?? '');
    $department = (string) ($entry['department'] ?? '');
    $letter = strtoupper(substr($lastName, 0, 1));

    if ($letter === '' || !ctype_alpha($letter)) {
        $letter = '#';
    }

    if (!isset($groupedEntries[$letter])) {
        $groupedEntries[$letter] = [];
    }

    $groupedEntries[$letter][] = $entry;

    if ($department !== '') {
        $departments[$department] = $department;
    }
}

ksort($groupedEntries, SORT_NATURAL);
natcasesort($departments);

$directoryLetters = range('A', 'Z');

$buildSearchIndex = static function (array $entry): string {
    $parts = [
        $entry['first_name'] ?? '',
        $entry['last_name'] ?? '',
        $entry['title'] ?? '',
        $entry['department'] ?? '',
        $entry['phone'] ?? '',
        $entry['email'] ?? '',
        $entry['location'] ?? ''
    ];

    return implode(' ', array_filter(array_map('strval', $parts)));
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
<main id="main-content" class="directory-page py-5">
    <div class="container-xxl" data-lbcc-directory>
        <section class="directory-filters mb-5">
            <div class="row g-3">
                <div class="col-12 col-lg-6">
                    <label class="form-label fw-semibold mb-2" for="directory-search">Search</label>
                    <div class="input-group directory-filter-input">
                        <span class="input-group-text bg-white border-end-0">
                            <span class="fa-sharp fa-regular fa-magnifying-glass text-primary" aria-hidden="true"></span>
                        </span>
                        <input
                            id="directory-search"
                            class="form-control border-start-0"
                            type="search"
                            placeholder="Start typing to search..."
                            data-lbcc-directory-search
                        >
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <label class="form-label fw-semibold mb-2" for="directory-department">Department</label>
                    <select id="directory-department" class="form-select" data-lbcc-directory-department>
                        <option value="">All departments</option>
                        <?php foreach ($departments as $department) { ?>
                            <option value="<?php echo lbcc_escape($department); ?>"><?php echo lbcc_escape($department); ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </section>

        <div class="directory-results">
            <?php foreach ($groupedEntries as $letter => $entries) { ?>
                <?php $mobileGroupId = 'directory-mobile-group-' . strtolower($letter); ?>
                <section
                    id="directory-letter-<?php echo strtolower($letter); ?>"
                    class="directory-section mb-5"
                    data-lbcc-directory-section
                    data-letter="<?php echo lbcc_escape($letter); ?>"
                >
                    <div class="d-flex align-items-center gap-3 mb-3 directory-section__heading">
                        <h2 class="mb-0 fs-4xl text-teal-800"><?php echo lbcc_escape($letter); ?></h2>
                        <hr class="my-0 flex-grow-1 opacity-100">
                    </div>

                    <div class="d-none d-md-flex flex-column gap-3">
                        <?php foreach ($entries as $index => $entry) {
                            $name = trim(($entry['last_name'] ?? '') . ', ' . ($entry['first_name'] ?? ''));
                            $title = (string) ($entry['title'] ?? '');
                            $department = (string) ($entry['department'] ?? '');
                            $phone = (string) ($entry['phone'] ?? '');
                            $email = (string) ($entry['email'] ?? '');
                            $location = (string) ($entry['location'] ?? '');
                            $profileUrl = trim((string) ($entry['profile_url'] ?? ''));
                            if ($profileUrl === '' || $profileUrl === '#') {
                                $profileUrl = lbcc_url('/App_Code/directory-profile.php');
                            }
                            $searchIndex = $buildSearchIndex($entry);
                            ?>
                            <article
                                class="directory-card bg-surface-subtle rounded-3 p-4"
                                data-lbcc-directory-entry
                                data-department="<?php echo lbcc_escape($department); ?>"
                                data-search-index="<?php echo lbcc_escape(strtolower($searchIndex)); ?>"
                            >
                                <div class="d-flex flex-column flex-xl-row align-items-start align-items-xl-center justify-content-between gap-3">
                                    <div class="flex-grow-1 min-w-0">
                                        <div class="mb-3">
                                            <h3 class="h5 mb-1"><?php echo lbcc_escape($name); ?></h3>
                                            <?php if ($title !== '') { ?>
                                                <p class="mb-0 text-body-secondary fs-sm"><?php echo lbcc_escape($title); ?></p>
                                            <?php } ?>
                                        </div>

                                        <ul class="list-unstyled d-flex flex-wrap align-items-center gap-3 gap-xl-4 mb-0 directory-card__meta">
                                            <li class="d-inline-flex align-items-center gap-2">
                                                <span class="fa-sharp fa-regular fa-building-columns text-primary fs-sm" aria-hidden="true"></span>
                                                <span class="text-decoration-underline"><?php echo lbcc_escape($department); ?></span>
                                            </li>
                                            <li class="d-inline-flex align-items-center gap-2">
                                                <span class="fa-sharp fa-regular fa-phone text-primary fs-sm" aria-hidden="true"></span>
                                                <a href="tel:<?php echo lbcc_escape(preg_replace('/[^0-9]/', '', $phone)); ?>"><?php echo lbcc_escape($phone); ?></a>
                                            </li>
                                            <li class="d-inline-flex align-items-center gap-2">
                                                <span class="fa-sharp fa-regular fa-envelope text-primary fs-sm" aria-hidden="true"></span>
                                                <a href="mailto:<?php echo lbcc_escape($email); ?>"><?php echo lbcc_escape($email); ?></a>
                                            </li>
                                            <li class="d-inline-flex align-items-center gap-2">
                                                <span class="fa-sharp fa-regular fa-location-dot text-primary fs-sm" aria-hidden="true"></span>
                                                <span><?php echo lbcc_escape($location); ?></span>
                                            </li>
                                        </ul>
                                    </div>

                                    <a href="<?php echo lbcc_escape($profileUrl); ?>" class="btn btn-outline-primary btn-sm flex-shrink-0">View Profile</a>
                                </div>
                            </article>
                        <?php } ?>
                    </div>

                    <div id="<?php echo lbcc_escape($mobileGroupId); ?>" class="d-flex d-md-none flex-column gap-3">
                        <?php foreach ($entries as $index => $entry) {
                            $name = trim(($entry['last_name'] ?? '') . ', ' . ($entry['first_name'] ?? ''));
                            $title = (string) ($entry['title'] ?? '');
                            $department = (string) ($entry['department'] ?? '');
                            $phone = (string) ($entry['phone'] ?? '');
                            $email = (string) ($entry['email'] ?? '');
                            $location = (string) ($entry['location'] ?? '');
                            $profileUrl = trim((string) ($entry['profile_url'] ?? ''));
                            if ($profileUrl === '' || $profileUrl === '#') {
                                $profileUrl = lbcc_url('/App_Code/directory-profile.php');
                            }
                            $searchIndex = $buildSearchIndex($entry);
                            $collapseId = 'directory-mobile-collapse-' . strtolower($letter) . '-' . $index;
                            ?>
                            <article
                                class="directory-mobile-card bg-surface-subtle rounded-3 overflow-hidden"
                                data-lbcc-directory-entry
                                data-department="<?php echo lbcc_escape($department); ?>"
                                data-search-index="<?php echo lbcc_escape(strtolower($searchIndex)); ?>"
                            >
                                <h3 class="mb-0">
                                    <button
                                        class="directory-mobile-card__toggle btn w-100 text-start border-0 rounded-0 collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#<?php echo lbcc_escape($collapseId); ?>"
                                        aria-expanded="false"
                                        aria-controls="<?php echo lbcc_escape($collapseId); ?>"
                                    >
                                        <span class="d-flex align-items-center gap-3">
                                            <span class="flex-grow-1 min-w-0">
                                                <span class="d-block h5 mb-1"><?php echo lbcc_escape($name); ?></span>
                                                <?php if ($title !== '') { ?>
                                                    <span class="d-block text-body-secondary fs-sm"><?php echo lbcc_escape($title); ?></span>
                                                <?php } ?>
                                            </span>
                                            <span class="directory-mobile-card__icon fa-sharp fa-regular fa-plus text-primary fs-xl" aria-hidden="true"></span>
                                        </span>
                                    </button>
                                </h3>

                                <div
                                    id="<?php echo lbcc_escape($collapseId); ?>"
                                    class="collapse"
                                    data-bs-parent="#<?php echo lbcc_escape($mobileGroupId); ?>"
                                >
                                    <div class="px-3 pb-3">
                                        <ul class="list-unstyled d-flex flex-column gap-2 mb-3 directory-card__meta directory-card__meta--stacked">
                                            <li class="d-inline-flex align-items-center gap-2">
                                                <span class="fa-sharp fa-regular fa-building-columns text-primary fs-sm" aria-hidden="true"></span>
                                                <span class="text-decoration-underline"><?php echo lbcc_escape($department); ?></span>
                                            </li>
                                            <li class="d-inline-flex align-items-center gap-2">
                                                <span class="fa-sharp fa-regular fa-phone text-primary fs-sm" aria-hidden="true"></span>
                                                <a href="tel:<?php echo lbcc_escape(preg_replace('/[^0-9]/', '', $phone)); ?>"><?php echo lbcc_escape($phone); ?></a>
                                            </li>
                                            <li class="d-inline-flex align-items-center gap-2">
                                                <span class="fa-sharp fa-regular fa-envelope text-primary fs-sm" aria-hidden="true"></span>
                                                <a href="mailto:<?php echo lbcc_escape($email); ?>"><?php echo lbcc_escape($email); ?></a>
                                            </li>
                                            <li class="d-inline-flex align-items-center gap-2">
                                                <span class="fa-sharp fa-regular fa-location-dot text-primary fs-sm" aria-hidden="true"></span>
                                                <span><?php echo lbcc_escape($location); ?></span>
                                            </li>
                                        </ul>

                                        <a href="<?php echo lbcc_escape($profileUrl); ?>" class="btn btn-outline-primary btn-sm">View Profile</a>
                                    </div>
                                </div>
                            </article>
                        <?php } ?>
                    </div>
                </section>
            <?php } ?>

            <div class="directory-empty d-none bg-surface-raised rounded-4 p-4 text-center" data-lbcc-directory-empty>
                <h2 class="h4 mb-2">No Results Found</h2>
                <p class="mb-0 text-body-secondary">Try a different name or department filter.</p>
            </div>

            <nav class="directory-alpha-nav d-none d-md-flex align-items-center justify-content-center flex-wrap gap-3 pt-3" aria-label="Directory letters">
                <?php foreach ($directoryLetters as $letter) {
                    $hasSection = array_key_exists($letter, $groupedEntries);
                    ?>
                    <?php if ($hasSection) { ?>
                        <a class="directory-alpha-nav__link" href="#directory-letter-<?php echo strtolower($letter); ?>"><?php echo lbcc_escape($letter); ?></a>
                    <?php } else { ?>
                        <span class="directory-alpha-nav__link directory-alpha-nav__link--disabled" aria-disabled="true"><?php echo lbcc_escape($letter); ?></span>
                    <?php } ?>
                <?php } ?>
            </nav>
        </div>
    </div>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
