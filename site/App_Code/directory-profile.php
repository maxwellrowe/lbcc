<?php
require_once dirname(__DIR__) . '/_resources/includes/head.php';

$page = lbcc_resolve_page([
    'title' => 'Dr. Jane Doe',
    'description' => 'Sample directory profile template for staff and faculty directory entries.',
    'section_nav' => false,
    'section_nav_include' => '',
    'sidenav' => false,
    'sidenav_include' => '',
    'custom_hero' => true
]);

$profile = [
    'name' => 'Dr. Jane Doe',
    'title' => 'Dean of All Things',
    'department' => 'All Things',
    'email' => 'jane.doe@lbcc.edu',
    'phone' => '(562) 938-4000',
    'location' => 'LAC, T-2366',
    'fax' => '(562) 938-5555',
    'directory_url' => lbcc_url('/App_Code/directory.php'),
    'resume_url' => '#',
    'image' => '_resources/images/hero-backgrounds/hero-bg-11.jpg',
    'office_hours' => [
        'Monday: 10 AM to 12 PM',
        'Thursday: 11 AM to 1 PM'
    ],
    'biography' => [
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in hendrerit enim, ut cursus felis. Cras tincidunt neque lorem, malesuada tincidunt tellus fermentum at. Proin hendrerit velit in felis mattis dictum. Integer eget eleifend risus. Suspendisse potenti. In eget tortor interdum, egestas felis eu, pharetra neque. Sed at arcu est. Phasellus elementum dolor ut purus pretium bibendum. Sed non arcu at quam sodales dictum.',
        'Sed vel nibh luctus, pellentesque nibh id, dignissim nisi. Nullam eget erat non enim feugiat vestibulum. Ut luctus purus quam, ac volutpat felis convallis vitae. Suspendisse potenti. Sed rhoncus ultricies ex imperdiet suscipit. Morbi scelerisque convallis mi ac vehicula. Duis sed orci quis turpis feugiat varius. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed condimentum cursus nulla.',
        'Mauris aliquam diam ut congue vulputate. Nulla mollis enim ut ligula faucibus rutrum. Nunc volutpat vel dui eu condimentum. Proin lectus diam, facilisis in vulputate et, finibus ut eros. Fusce tristique lectus sed hendrerit congue. Nulla eros elit, vulputate non elit eget, pulvinar pellentesque velit. Donec accumsan eros et tellus aliquet condimentum. Sed elementum efficitur magna sit amet finibus. Mauris mattis libero sit amet dolor consequat rutrum.'
    ]
];

$contactItems = [
    [
        'title' => $profile['email'],
        'link' => 'mailto:' . $profile['email'],
        'left_icon' => 'fa-envelope'
    ],
    [
        'title' => $profile['phone'],
        'link' => 'tel:' . preg_replace('/[^0-9]/', '', $profile['phone']),
        'left_icon' => 'fa-phone'
    ],
    [
        'title' => $profile['location'],
        'link' => '#',
        'left_icon' => 'fa-location-dot'
    ],
    [
        'title' => 'Department: ' . $profile['department'],
        'link' => $profile['directory_url'],
        'left_icon' => 'fa-building-columns'
    ],
    [
        'title' => $profile['fax'],
        'link' => 'tel:' . preg_replace('/[^0-9]/', '', $profile['fax']),
        'left_icon' => 'fa-fax'
    ]
];
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php lbcc_head($page); ?>
<body class="lbcc-page">
<?php include dirname(__DIR__) . '/_resources/includes/header.php'; ?>
<div class="bg-water-gradient page-hero">
    <div class="container-xxl py-4">
        <nav class="breadcrumbs" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo lbcc_escape(lbcc_url('/App_Code/index.php')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo lbcc_escape($profile['directory_url']); ?>">Staff &amp; Faculty Directory</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo lbcc_escape($profile['name']); ?></li>
            </ol>
        </nav>

        <div class="d-flex flex-column flex-xl-row align-items-start align-items-xl-end justify-content-between gap-4 mt-5">
            <div class="flex-grow-1 min-w-0">
                <h1 class="mb-2 fs-6xl"><?php echo lbcc_escape($profile['name']); ?></h1>
                <p class="mb-0 fs-xl text-body-secondary"><?php echo lbcc_escape($profile['title']); ?></p>
            </div>

            <a href="<?php echo lbcc_escape($profile['directory_url']); ?>" class="btn btn-outline-secondary btn-sm flex-shrink-0">
                View Full Directory
            </a>
        </div>
    </div>

    <div class="rounded-top-5 page-cap"></div>
</div>
<main id="main-content" class="py-5">
    <div class="container-xxl">
        <div class="row g-4 g-xl-5 align-items-start">
            <div class="col-12 col-xl-7">
                <div class="d-grid gap-5">
                    <section aria-labelledby="directory-profile-contact-heading">
                        <h2 id="directory-profile-contact-heading" class="visually-hidden">Contact Information</h2>
                        <?php component_list_group($contactItems, 'lined', 'sm', ['w-100']); ?>
                    </section>

                    <div>
                        <a href="<?php echo lbcc_escape($profile['resume_url']); ?>" class="btn btn-primary">
                            Download Resume
                        </a>
                    </div>

                    <section aria-labelledby="directory-profile-hours-heading">
                        <h2 id="directory-profile-hours-heading" class="mb-3 fs-3xl text-teal-800">Office Hours</h2>
                        <ul class="mb-0 ps-4 d-grid gap-2">
                            <?php foreach ($profile['office_hours'] as $officeHour) { ?>
                                <li><?php echo lbcc_escape($officeHour); ?></li>
                            <?php } ?>
                        </ul>
                    </section>

                    <section aria-labelledby="directory-profile-biography-heading">
                        <h2 id="directory-profile-biography-heading" class="mb-3 fs-3xl text-teal-800">Biography</h2>
                        <div class="d-grid gap-3">
                            <?php foreach ($profile['biography'] as $paragraph) { ?>
                                <p class="mb-0"><?php echo lbcc_escape($paragraph); ?></p>
                            <?php } ?>
                        </div>
                    </section>

                    <div class="border-top pt-5">
                        <a href="<?php echo lbcc_escape($profile['directory_url']); ?>" class="btn btn-outline-secondary">
                            View Full Directory
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-4 offset-xl-1">
                <aside class="sticky-top">
                    <div class="card border-0 bg-surface-subtle rounded-3 overflow-hidden shadow-sm">
                        <div class="ratio ratio-1x1">
                            <img
                                src="<?php echo lbcc_escape(lbcc_url($profile['image'])); ?>"
                                alt=""
                                class="w-100 h-100 object-fit-cover"
                            >
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</main>
<?php include dirname(__DIR__) . '/_resources/includes/footer.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/footer-scripts.php'; ?>
<?php include dirname(__DIR__) . '/_resources/includes/offcanvas.php'; ?>
</body>
</html>
