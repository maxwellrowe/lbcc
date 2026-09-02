<a href="/App_Code/programs.php" class="section-nav__title arrow-link rounded-bottom">
    Nursing
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
        <li>
            <a href="#">Programs</a>
            <ul>
                <li><a href="/App_Code/program-single-nursing.php">Registered Nursing</a></li>
                <li><a href="#">Certified Nursing Assistant (CNA)</a></li>
                <li><a href="#">LVN to RN Career Ladder</a></li>
                <li><a href="#">Vocational Nursing</a></li>
            </ul>
        </li>
        <li><a href="#">Learning & Academic Resources</a></li>
        <li><a href="#">About Us</a></li>
    </ul>
</div>