<?php
if (!isset($page) || !is_array($page)) {
    return;
}

$page = lbcc_resolve_page($page);

if (!$page['section_nav']) {
    return;
}

$sectionNavInclude = lbcc_page_partial_path($page['section_nav_include']);

if ($sectionNavInclude === null || !is_file($sectionNavInclude)) {
    return;
}
?>
<div class="container-xxl section-nav">
    <nav class="bg-surface-subtle rounded-bottom d-flex justify-content-between align-items-stretch" aria-label="Section Navigation">
        <?php include $sectionNavInclude; ?>
    </nav>
</div>
