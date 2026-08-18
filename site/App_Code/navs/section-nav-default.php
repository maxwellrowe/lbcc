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
    <ul>
        <li><a href="#">Templates</a></li>
        <li><a href="#">Styleguide</a></li>
        <li><a href="#">Components</a></li>
        <li>
            <a href="#">Nested Menu One Level</a>
            <ul>
                <li><a href="#">Templates</a></li>
                <li><a href="#">Styleguide</a></li>
                <li><a href="#">Components</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Nested Menu Two Level</a>
            <ul>
                <li><a href="#">Templates</a></li>
                <li>
                    <a href="#">Styleguide</a>
                    <ul>
                        <li><a href="#">Tertiary Item</a></li>
                        <li><a href="#">Tertiary Item</a></li>
                        <li><a href="#">Tertiary Item</a></li>
                    </ul>
                </li>
                <li><a href="#">Components</a></li>
            </ul>
        </li>
    </ul>
</div>
