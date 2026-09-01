<?php
if (!isset($page) || !is_array($page)) {
    return;
}

$page = lbcc_resolve_page($page);

if (!$page['sidenav']) {
    return;
}

$sidenavInclude = lbcc_page_partial_path($page['sidenav_include']);

if ($sidenavInclude === null || !is_file($sidenavInclude)) {
    return;
}

?>
<div class="sidenav">
    <?php include $sidenavInclude; ?>
</div>
