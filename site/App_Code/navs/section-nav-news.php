<a href="/App_Code/news.php" class="section-nav__title arrow-link rounded-bottom">
    News &amp; Media
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
        <li><a href="/App_Code/news.php">Latest News</a></li>
        <li><a href="/App_Code/news-archive.php">News Archive</a></li>
        <li><a href="/App_Code/news-archive.php#press-releases">Press Releases</a></li>
        <li><a href="/App_Code/news.php#student-in-the-loop">Student in the Loop</a></li>
    </ul>
</div>
