<?php
$infoForLinks = [
    ['label' => 'Current Students', 'href' => '/current-students.php'],
    ['label' => 'Faculty & Staff', 'href' => '#'],
    ['label' => 'Community', 'href' => '#'],
    ['label' => 'Alumni', 'href' => '#']
];

$campusLinks = [
    ['label' => 'LAC', 'href' => '/current-students.php#campus-life'],
    ['label' => 'TTC', 'href' => '/current-students.php#campus-life']
];

$utilityLinks = [
    ['label' => 'Maps', 'href' => '/current-students.php#campus-life', 'icon' => 'fa-sharp fa-regular fa-location-dot'],
    ['label' => 'Directory', 'href' => '/current-students.php#get-in-touch', 'icon' => 'fa-sharp fa-regular fa-address-book'],
    ['label' => 'Class Schedule', 'href' => '/current-students.php#plan-register', 'icon' => 'fa-sharp fa-regular fa-calendar-lines'],
    ['label' => 'Calendar', 'href' => '/current-students.php#upcoming-events', 'icon' => 'fa-sharp fa-regular fa-calendar-days']
];

$loginLinks = [
    ['label' => 'Viking Portal', 'href' => '#'],
    ['label' => 'Canvas', 'href' => '#']
];

$mobileQuickLinks = [
    ['label' => 'Student Support', 'href' => '/#support', 'icon' => 'fa-sharp fa-regular fa-heart'],
    ['label' => 'Calendars & Events', 'href' => '/current-students.php#upcoming-events', 'icon' => 'fa-sharp fa-regular fa-calendar-days'],
    ['label' => 'Class Schedule', 'href' => '/current-students.php#plan-register', 'icon' => 'fa-sharp fa-regular fa-calendar-lines'],
    ['label' => 'Directory', 'href' => '/current-students.php#get-in-touch', 'icon' => 'fa-sharp fa-regular fa-address-book'],
    ['label' => 'Campus Maps', 'href' => '/current-students.php#campus-life', 'icon' => 'fa-sharp fa-regular fa-location-dot'],
    ['label' => 'Emergency Services', 'href' => '#', 'icon' => 'fa-sharp fa-regular fa-diamond-exclamation']
];

$primaryLinks = [
    [
        'label' => 'Start at LBCC',
        'href' => '/',
        'mobile_intro' => [
            'eyebrow' => 'Become a Viking',
            'title' => 'Apply Now',
            'primary_href' => '/#get-started',
            'secondary_label' => 'How to Apply to LBCC',
            'secondary_href' => '/#get-started'
        ],
        'groups' => [
            [
                'title' => 'Special Admissions',
                'links' => [
                    ['label' => 'International Students', 'href' => '/#audiences'],
                    ['label' => 'Dual Enrollment', 'href' => '/#audiences']
                ]
            ],
            [
                'title' => 'Help Getting Started',
                'links' => [
                    ['label' => 'Welcome Center', 'href' => '/current-students.php#get-in-touch'],
                    ['label' => 'Admissions & Records Office', 'href' => '/current-students.php#get-in-touch'],
                    ['label' => 'Financial Aid Office', 'href' => '/current-students.php#pay-college']
                ]
            ]
        ],
        'children' => [
            ['label' => 'Why LBCC', 'href' => '/#audiences'],
            ['label' => 'Get Started', 'href' => '/#get-started'],
            ['label' => 'Current Students', 'href' => '/current-students.php']
        ]
    ],
    [
        'label' => 'Classes & Programs',
        'href' => '/#programs',
        'children' => [
            ['label' => 'Explore Programs', 'href' => '/#programs'],
            ['label' => 'Areas of Interest', 'href' => '/#program-categories'],
            ['label' => 'Style Guide Reference', 'href' => '/App_Code/styleguide.php']
        ]
    ],
    [
        'label' => 'Support',
        'href' => '/#support',
        'children' => [
            ['label' => 'Student Support', 'href' => '/#support'],
            ['label' => 'Academic Help', 'href' => '/current-students.php#get-support'],
            ['label' => 'Financial Resources', 'href' => '/current-students.php#pay-college']
        ]
    ],
    [
        'label' => 'Campus Life',
        'href' => '/current-students.php#campus-life',
        'children' => [
            ['label' => 'Events', 'href' => '/current-students.php#upcoming-events'],
            ['label' => 'Quick Access', 'href' => '/current-students.php#quick-access'],
            ['label' => 'Get in Touch', 'href' => '/current-students.php#get-in-touch']
        ]
    ],
    [
        'label' => 'About',
        'href' => '/App_Code/',
        'children' => [
            ['label' => 'Project Foundation', 'href' => '/App_Code/'],
            ['label' => 'Style Guide', 'href' => '/App_Code/styleguide.php']
        ]
    ]
];
