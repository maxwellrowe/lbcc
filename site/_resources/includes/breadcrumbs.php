<?php
if (!isset($page) || !is_array($page)) {
    return;
}

$page = lbcc_resolve_page($page);
$pageTitle = $page['title'] ?? '';
?>
<nav class="breadcrumbs" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Section</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo lbcc_escape($pageTitle); ?></li>
    </ol>
</nav>
