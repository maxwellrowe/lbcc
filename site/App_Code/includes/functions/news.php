<?php

function lbcc_news_items(): array
{
    static $items;

    if (is_array($items)) {
        return $items;
    }

    $items = [
        [
            'slug' => 'jenni-rivera-performing-arts-center',
            'title' => 'Long Beach City College & The Jenni Rivera Love Foundation Celebrate The Grand Opening Of The Jenni Rivera Performing Arts Center',
            'excerpt' => 'The $102 Million State-of-the-Art Complex Honors Music Icon and LBCC Alumna While Elevating Arts Education Across the Region',
            'summary' => 'The $102 Million State-of-the-Art Complex Honors Music Icon and LBCC Alumna While Elevating Arts Education Across the Region',
            'category' => 'Press Release',
            'date' => 'March 26, 2026',
            'image' => '_resources/images/placeholders/news/news-5.jpg',
            'url' => '',
            'caption' => 'The five children of the late Jenni Rivera joined LBCC leadership for a ribbon-cutting ceremony at the newly named Jenni Rivera Performing Arts Center.',
            'body' => [
                'Los Angeles, CA. (March 26, 2026) - Long Beach City College (LBCC) and the Jenni Rivera Love Foundation celebrated the ribbon cutting of the new Jenni Rivera Performing Arts Center, a transformative $102-million facility named in honor of the Latin music icon and LBCC alumna. The state-of-the-art complex now serves as the home for LBCC’s Performing Arts, Music, Dance, and Radio/TV/Broadcasting programs.',
                '“As we open the Jenni Rivera Performing Arts Center, we celebrate a remarkable new facility, and the enduring legacy of an artist whose voice resonated far beyond the stage,” said Uduak-Joe Ntuk, LBCC Board of Trustees President. “Through the support of our community and voters, we have created what is now the premier performing arts facility in the region.”',
                '“The Jenni Rivera Performing Arts Center represents possibility for every student who walks through its doors,” said Dr. Mike Muñoz, LBCC Superintendent-President. “Our students will now train and perform in spaces that reflect the modern standards of today’s creative industries.”',
                'As part of the celebration, LBCC formally dedicated the facility in honor of the Latin GRAMMY-nominated artist and LBCC alumna, whose influence continues to inspire generations of students and the broader community.'
            ]
        ],
        [
            'slug' => 'mike-munoz-aspen-fellowship',
            'title' => 'Long Beach City College Superintendent-President Dr. Mike Muñoz Selected For Aspen Fellowship',
            'excerpt' => 'Prestigious Program Focuses On Student Success And Economic Mobility',
            'summary' => 'Prestigious Program Focuses On Student Success And Economic Mobility',
            'category' => 'Press Release',
            'date' => 'March 25, 2026',
            'image' => '_resources/images/placeholders/news/news-2.jpg',
            'url' => ''
        ],
        [
            'slug' => 'new-building-mm',
            'title' => 'Long Beach City College Opens New Building MM To Help Students Build The Future',
            'excerpt' => 'Hands-on spaces expand access to modern workforce and applied learning programs.',
            'summary' => '',
            'category' => 'Press Release',
            'date' => 'February 25, 2026',
            'image' => '_resources/images/placeholders/news/news-3.jpg',
            'url' => ''
        ],
        [
            'slug' => 'i-heart-lb-sign',
            'title' => 'LBCC Trades, Technology, and Community Learning Campus Unveils New “I Love LB” Sign',
            'excerpt' => 'Thousands of People Driving on Pacific Coast Highway Will See New Iconic Sign',
            'summary' => 'Thousands of People Driving on Pacific Coast Highway Will See New Iconic Sign',
            'category' => 'Press Release',
            'date' => 'February 18, 2026',
            'image' => '_resources/images/placeholders/news/news-4.jpg',
            'url' => ''
        ],
        [
            'slug' => 'robert-garcia-funding',
            'title' => 'Long Beach City College And Congressman Robert Garcia Announce $1.5 Million Community Project Funding',
            'excerpt' => 'Federal Funding will Support New Playground at the TTC Child Development Center',
            'summary' => 'Federal Funding will Support New Playground at the TTC Child Development Center',
            'category' => 'Press Release',
            'date' => 'February 6, 2026',
            'image' => '_resources/images/placeholders/news/news-5.jpg',
            'url' => ''
        ],
        [
            'slug' => 'annual-report-2025',
            'title' => 'Long Beach City College Launches 2025 Annual Report',
            'excerpt' => 'Report Highlights Record Commencement, Equity Leadership, Campus Investment, and Community Partnerships',
            'summary' => 'Report Highlights Record Commencement, Equity Leadership, Campus Investment, and Community Partnerships',
            'category' => 'Press Release',
            'date' => 'February 2, 2026',
            'image' => '_resources/images/placeholders/news/news-6.jpg',
            'url' => ''
        ],
        [
            'slug' => 'first-bachelors-degree',
            'title' => 'Long Beach City College Approved To Offer First-Ever Bachelor’s Degree',
            'excerpt' => 'LBCC Becomes the First Community College in the Nation to Offer a Bachelor’s in Library & Information Science',
            'summary' => 'LBCC Becomes the First Community College in the Nation to Offer a Bachelor’s in Library & Information Science',
            'category' => 'Press Release',
            'date' => 'December 16, 2025',
            'image' => '_resources/images/placeholders/news/news-7.jpg',
            'url' => ''
        ],
        [
            'slug' => 'black-serving-institution',
            'title' => 'Long Beach City College Officially Designated As A California Black-Serving Institution',
            'excerpt' => 'LBCC Named Among Just 31 Institutions Statewide for Demonstrating Measurable Impact in Black Student Achievement and Belonging',
            'summary' => 'LBCC Named Among Just 31 Institutions Statewide for Demonstrating Measurable Impact in Black Student Achievement and Belonging',
            'category' => 'Press Release',
            'date' => 'December 11, 2025',
            'image' => '_resources/images/placeholders/news/news-8.jpg',
            'url' => ''
        ]
    ];

    foreach ($items as &$item) {
        if ($item['url'] === '') {
            $item['url'] = lbcc_url('/App_Code/news-single.php');
        }
    }
    unset($item);

    return $items;
}

function lbcc_news_featured_item(): array
{
    $items = lbcc_news_items();

    return $items[0] ?? [];
}

function lbcc_news_archive_items(?int $limit = null, int $offset = 0): array
{
    $items = lbcc_news_items();

    if ($offset > 0) {
        $items = array_slice($items, $offset);
    }

    if ($limit !== null) {
        $items = array_slice($items, 0, $limit);
    }

    return $items;
}

function lbcc_news_categories(): array
{
    return [
        [
            'label' => 'Latest News',
            'url' => lbcc_url('/App_Code/news.php')
        ],
        [
            'label' => 'Campus Updates',
            'url' => '#'
        ],
        [
            'label' => 'Press Releases',
            'url' => lbcc_url('/App_Code/news-archive.php#press-releases')
        ],
        [
            'label' => 'Student in the Loop',
            'url' => lbcc_url('/App_Code/student-in-the-loop.php')
        ],
        [
            'label' => 'College Announcements',
            'url' => '#'
        ]
    ];
}

function lbcc_news_media_links(): array
{
    return [
        [
            'text' => 'News Archive',
            'url' => lbcc_url('/App_Code/news-archive.php'),
            'style' => 'btn-outline-primary',
            'size' => 'btn-sm',
            'icon' => ''
        ],
        [
            'text' => 'Student in the Loop',
            'url' => lbcc_url('/App_Code/news.php#student-in-the-loop'),
            'style' => 'btn-outline-primary',
            'size' => 'btn-sm',
            'icon' => ''
        ],
        [
            'text' => 'Press Releases',
            'url' => lbcc_url('/App_Code/news-archive.php#press-releases'),
            'style' => 'btn-outline-primary',
            'size' => 'btn-sm',
            'icon' => ''
        ],
        [
            'text' => 'Media Kit',
            'url' => '#',
            'style' => 'btn-outline-primary',
            'size' => 'btn-sm',
            'icon' => ''
        ]
    ];
}

function lbcc_news_social_channels(): array
{
    return [
        [
            'label' => 'Instagram',
            'url' => 'https://www.instagram.com/lbcitycollege',
            'icon' => 'fa-instagram'
        ],
        [
            'label' => 'X',
            'url' => 'https://www.twitter.com/LBCityCollege',
            'icon' => 'fa-x-twitter'
        ],
        [
            'label' => 'Facebook',
            'url' => 'https://www.facebook.com/lbcitycollege',
            'icon' => 'fa-facebook-f'
        ],
        [
            'label' => 'YouTube',
            'url' => 'https://www.youtube.com/user/LongBeachCityCollege',
            'icon' => 'fa-youtube'
        ],
        [
            'label' => 'TikTok',
            'url' => 'https://www.tiktok.com/tag/longbeachcitycollege',
            'icon' => 'fa-tiktok'
        ]
    ];
}

function lbcc_news_student_loop_card(): array
{
    return [
        'title' => 'Student in the Loop',
        'description' => 'Subscribe for the latest LBCC stories, updates, events, deadlines, and spotlights delivered straight to your inbox.',
        'image' => '_resources/images/news/in-the-loop.jpg',
        'link' => '#',
        'button_text' => 'Subscribe'
    ];
}

function lbcc_news_render_meta(array $item, string $class = 'eyebrow-sm text-body-secondary d-inline-flex align-items-center flex-wrap gap-2'): void
{
    $category = trim((string) ($item['category'] ?? ''));
    $date = trim((string) ($item['date'] ?? ''));

    if ($category === '' && $date === '') {
        return;
    }
    ?>
    <div class="<?php echo lbcc_escape($class); ?>">
        <?php if ($category !== '') { ?>
            <span><?php echo lbcc_escape($category); ?></span>
        <?php } ?>
        <?php if ($category !== '' && $date !== '') { ?>
            <span aria-hidden="true">/</span>
        <?php } ?>
        <?php if ($date !== '') { ?>
            <span><?php echo lbcc_escape($date); ?></span>
        <?php } ?>
    </div>
    <?php
}

function lbcc_news_render_list_item(array $item, bool $showExcerpt = true, bool $compact = false, bool $showImage = true): void
{
    $title = trim((string) ($item['title'] ?? ''));
    $url = trim((string) ($item['url'] ?? '#'));
    $excerpt = trim((string) ($item['excerpt'] ?? ''));
    $image = trim((string) ($item['image'] ?? ''));
    $titleClass = $compact ? 'h5 fs-xl' : 'h4 fs-2xl';
    $imageWidth = $compact ? 128 : 186;
    $imageHeight = $compact ? 85 : 124;

    if ($title === '') {
        return;
    }
    ?>
    <article class="py-4 border-bottom">
        <div class="row g-3 align-items-start">
            <div class="col min-w-0">
                <a href="<?php echo lbcc_escape($url); ?>" class="text-decoration-none text-reset d-grid gap-3">
                    <div class="d-grid gap-2">
                        <h2 class="<?php echo lbcc_escape($titleClass); ?> mb-0"><?php echo lbcc_escape($title); ?></h2>
                        <?php if ($showExcerpt && $excerpt !== '') { ?>
                            <p class="mb-0 text-body-secondary"><?php echo lbcc_escape($excerpt); ?></p>
                        <?php } ?>
                    </div>

                    <?php lbcc_news_render_meta($item); ?>
                </a>
            </div>

            <?php if ($showImage && $image !== '') { ?>
                <div class="col-auto">
                    <a href="<?php echo lbcc_escape($url); ?>" class="d-block text-decoration-none">
                        <img
                            src="<?php echo lbcc_escape(lbcc_url($image)); ?>"
                            alt=""
                            class="rounded-3 object-fit-cover"
                            width="<?php echo lbcc_escape((string) $imageWidth); ?>"
                            height="<?php echo lbcc_escape((string) $imageHeight); ?>"
                        >
                    </a>
                </div>
            <?php } ?>
        </div>
    </article>
    <?php
}

function lbcc_news_render_sidebar(?array $topButton = null, string $archiveSelectId = 'news-archive-select'): void
{
    $categories = lbcc_news_categories();
    $archiveMonths = [
        'September 2026' => '2026-09',
        'August 2026' => '2026-08',
        'July 2026' => '2026-07',
        'June 2026' => '2026-06',
        'May 2026' => '2026-05',
        'April 2026' => '2026-04',
        'March 2026' => '2026-03',
        'February 2026' => '2026-02',
        'January 2026' => '2026-01',
        'December 2025' => '2025-12'
    ];
    ?>
    <aside class="d-grid gap-4">
        <?php if (is_array($topButton) && !empty($topButton['text'])) { ?>
            <?php component_buttons(
                [
                    [
                        'style' => 'btn-outline-primary',
                        'text' => (string) $topButton['text'],
                        'url' => (string) ($topButton['url'] ?? '#'),
                        'size' => '',
                        'icon' => 'fa-arrow-up-right',
                        'icon_position' => 'end'
                    ]
                ],
                'block',
                3
            ); ?>
        <?php } ?>

        <div class="card rounded-5 bg-white shadow-lg border-0">
            <div class="card-body">
                <div class="sidenav">
                    <span class="eyebrow-sm d-block p-3">Categories</span>
                    <ul>
                    <?php foreach ($categories as $category) { ?>
                        <li>
                            <a href="<?php echo lbcc_escape($category['url']); ?>"><?php echo lbcc_escape($category['label']); ?></a>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        <section class="card bg-white border-0 rounded-3 shadow-lg">
            <div class="card-body p-4">
                <h2 class="eyebrow-sm mb-3">Archives</h2>
                <form action="<?php echo lbcc_escape(lbcc_url('/App_Code/news-archive.php')); ?>" method="get" class="d-grid gap-3">
                    <label class="visually-hidden" for="<?php echo lbcc_escape($archiveSelectId); ?>">Select a news archive</label>
                    <select id="<?php echo lbcc_escape($archiveSelectId); ?>" class="form-select" name="archive" onchange="this.form.submit()">
                        <option value="">Select a month and year...</option>
                        <?php foreach ($archiveMonths as $label => $value) { ?>
                        <option value="<?php echo lbcc_escape($value); ?>"><?php echo lbcc_escape($label); ?></option>
                        <?php } ?>
                    </select>
                    <noscript><button class="btn btn-primary btn-sm align-self-start" type="submit">View Archive</button></noscript>
                </form>
            </div>
        </section>
    </aside>
    <?php
}

function lbcc_news_render_social_links(): void
{
    $channels = lbcc_news_social_channels();
    $socialMediaItems = array_map(static function (array $channel): array {
        return [
            'link' => $channel['url'],
            'icon' => $channel['icon'],
            'sr_label' => $channel['label']
        ];
    }, $channels);

    component_social_media($socialMediaItems, 'dark', 'l', 'gap-2');
}

function lbcc_news_render_share_links(string $url, string $title): void
{
    ?>
    <div class="d-inline-flex align-items-center flex-wrap gap-2 bg-surface-water rounded-pill px-3 py-2">
        <span class="eyebrow-sm mb-0">Share</span>
        <span aria-hidden="true">/</span>
        <?php component_social_media_sharing($url, $title, 'dark', 's'); ?>
    </div>
    <?php
}

function lbcc_news_render_stay_connected(string $sectionId = ''): void
{
    $studentLoop = lbcc_news_student_loop_card();
    $mediaButtons = lbcc_news_media_links();
    ?>
    <section<?php if ($sectionId !== '') { ?> id="<?php echo lbcc_escape($sectionId); ?>"<?php } ?> class="bg-surface-subtle rounded-4 p-4 p-xl-5">
        <div class="row g-4 g-xl-5 align-items-start">
            <div class="col-12 col-lg-4">
                <div class="d-grid gap-4">
                    <div class="d-grid gap-3">
                        <h2 class="mb-0 fs-3xl text-teal-800">Stay Connected</h2>
                        <?php lbcc_news_render_social_links(); ?>
                    </div>

                    <form class="d-grid gap-3">
                        <div>
                            <label class="form-label" for="news-subscribe-name">Full Name</label>
                            <input id="news-subscribe-name" class="form-control" type="text" placeholder="Enter your name">
                        </div>
                        <div>
                            <label class="form-label" for="news-subscribe-email">Email Address</label>
                            <input id="news-subscribe-email" class="form-control" type="email" placeholder="you@example.edu">
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Join Mailling List</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <?php
                component_card(
                    $studentLoop['title'],
                    '<p class="mb-0">' . lbcc_escape($studentLoop['description']) . '</p>',
                    [
                        [
                            'text' => 'View',
                            'link' => $studentLoop['link'],
                            'style' => 'btn-primary'
                        ]
                    ],
                    $studentLoop['image'],
                    'white',
                    'button'
                );
                ?>
            </div>

            <div class="col-12 col-lg-4">
                <div class="d-grid gap-3">
                    <p class="eyebrow-sm mb-0">More News &amp; Media from LBCC</p>
                    <?php component_buttons($mediaButtons, 'row', 2); ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}
