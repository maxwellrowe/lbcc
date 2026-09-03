<a href="index.php" class="section-nav__title arrow-link rounded-bottom">
    Templates &amp; Resources
</a>

<button 
    class="btn btn-link d-flex align-items-center justify-content-start gap-2 collapse-menu-trigger d-xl-none" 
    type="button" 
    data-bs-toggle="collapse" 
    data-bs-target="#section-nav__menu" 
    aria-expanded="false" 
    aria-controls="section-nav__menu"
>
    <span class="eyebrow-sm lh-1">Menu</span>
    <span class="menu-bars" aria-hidden="true">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </span>   
</button>
<div class="collapse" id="section-nav__menu">
    <div class="d-xl-none">
        <?php include dirname(__DIR__, 2) . '/_resources/includes/navigation/sidenav.php'; ?>
    </div>
    <ul>
        <li><a href="../App_Code/">Templates</a></li>
        <li><a href="../App_Code/styleguide.php">Styleguide</a></li>
        <li><a href="../App_Code/components.php">Components</a></li>
        <li><a href="../App_Code/snippets.php">Snippets</a></li>
    </ul>
</div>
