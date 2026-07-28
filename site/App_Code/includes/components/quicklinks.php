<section aria-labelledby="quicklinks-heading" class="mt-5">
    <p class="eyebrow mb-2">Component</p>
    <h2 id="quicklinks-heading">Quicklinks</h2>
    <p class="text-body-secondary mb-4">A compact icon-and-text link system for navigation clusters, featured pathways, and dashboard-style entry points. The row-level settings control variation, size, color treatment, and responsive items per row, while each quicklink only needs text, link, and icon.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="bg-surface-subtle rounded p-4 mb-5">
        <div class="row g-4">
            <div class="col-12">
                <p class="eyebrow-sm mb-2">Card / Default / 2-3-4 Up</p>
                <?php
                component_quicklinks(
                    [
                        [
                            'text' => 'Apply Now',
                            'url' => '#',
                            'icon' => 'fa-pen-to-square'
                        ],
                        [
                            'text' => 'Pay For College',
                            'url' => '#',
                            'icon' => 'fa-wallet'
                        ],
                        [
                            'text' => 'Visit Campus',
                            'url' => '#',
                            'icon' => 'fa-map-location-dot'
                        ],
                        [
                            'text' => 'Meet A Counselor',
                            'url' => '#',
                            'icon' => 'fa-comments'
                        ]
                    ],
                    'card',
                    'default',
                    'bg-white',
                    'text-dark',
                    'text-primary',
                    2,
                    3,
                    4
                );
                ?>
            </div>

            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Icon / Large / 2-3-3 Up</p>
                <?php
                component_quicklinks(
                    [
                        [
                            'text' => 'Student Services',
                            'url' => '#',
                            'icon' => 'fa-user-graduate'
                        ],
                        [
                            'text' => 'Academic Calendar',
                            'url' => '#',
                            'icon' => 'fa-calendar-days'
                        ],
                        [
                            'text' => 'Career Support',
                            'url' => '#',
                            'icon' => 'fa-briefcase'
                        ]
                    ],
                    'icon',
                    'lg',
                    'bg-surface-water',
                    'text-dark',
                    'text-primary',
                    2,
                    3,
                    3
                );
                ?>
            </div>

            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Icon Circled / Small / 2-2-3 Up</p>
                <?php
                component_quicklinks(
                    [
                        [
                            'text' => 'Library',
                            'url' => '#',
                            'icon' => 'fa-books'
                        ],
                        [
                            'text' => 'Tutoring',
                            'url' => '#',
                            'icon' => 'fa-lightbulb-on'
                        ],
                        [
                            'text' => 'Canvas',
                            'url' => '#',
                            'icon' => 'fa-laptop'
                        ]
                    ],
                    'icon-circled',
                    'sm',
                    'bg-surface-sun-haze',
                    'text-dark',
                    'text-secondary',
                    2,
                    2,
                    3
                );
                ?>
            </div>

            <div class="col-12">
                <p class="eyebrow-sm mb-2">Card / XL / Light Text</p>
                <?php
                component_quicklinks(
                    [
                        [
                            'text' => 'Start Your Next Step',
                            'url' => '#',
                            'icon' => 'fa-arrow-right-to-bracket'
                        ],
                        [
                            'text' => 'Explore Programs',
                            'url' => '#',
                            'icon' => 'fa-grid-2'
                        ],
                        [
                            'text' => 'Connect With Admissions',
                            'url' => '#',
                            'icon' => 'fa-headset'
                        ]
                    ],
                    'card',
                    'xl',
                    'bg-primary',
                    'text-white',
                    'text-white',
                    1,
                    2,
                    3
                );
                ?>
            </div>
        </div>
    </div>

    <h3 class="h5 mb-3">Options</h3>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">Field</th>
                    <th scope="col">Type</th>
                    <th scope="col">Default</th>
                    <th scope="col">Notes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Quicklinks</td>
                    <td>array</td>
                    <td>Required</td>
                    <td>Array of quicklink definitions. Each item includes Text, Link, and Icon.</td>
                </tr>
                <tr>
                    <td>Variation</td>
                    <td>string</td>
                    <td>card</td>
                    <td>Supported values are <code>card</code>, <code>icon</code>, and <code>icon-circled</code>.</td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td>string</td>
                    <td>default</td>
                    <td>Supported values are <code>xl</code>, <code>lg</code>, <code>default</code>, and <code>sm</code>. Size controls both the icon scale and the text size.</td>
                </tr>
                <tr>
                    <td>Background Class</td>
                    <td>string</td>
                    <td>bg-surface-subtle</td>
                    <td>Background class for the card variation and the icon shell in the circled variation. Use any project <code>.bg-*</code> utility.</td>
                </tr>
                <tr>
                    <td>Text Color</td>
                    <td>string</td>
                    <td>text-dark</td>
                    <td>Supported values are <code>text-dark</code> and <code>text-white</code>.</td>
                </tr>
                <tr>
                    <td>Icon Color</td>
                    <td>string</td>
                    <td>text-primary</td>
                    <td>Row-level icon color class. Use any text color utility, for example <code>text-primary</code>, <code>text-secondary</code>, <code>text-dark</code>, or <code>text-white</code>.</td>
                </tr>
                <tr>
                    <td>Mobile Per Row</td>
                    <td>integer</td>
                    <td>2</td>
                    <td>Mobile columns per row. Supported values are <code>1</code> through <code>6</code>.</td>
                </tr>
                <tr>
                    <td>Tablet Per Row</td>
                    <td>integer</td>
                    <td>3</td>
                    <td>Tablet columns per row. Supported values are <code>1</code> through <code>6</code>.</td>
                </tr>
                <tr>
                    <td>Desktop Per Row</td>
                    <td>integer</td>
                    <td>4</td>
                    <td>Desktop columns per row. Supported values are <code>1</code> through <code>6</code>.</td>
                </tr>
                <tr>
                    <td>Text</td>
                    <td>string</td>
                    <td>Required</td>
                    <td>Per-link label shown to the user.</td>
                </tr>
                <tr>
                    <td>Link</td>
                    <td>string</td>
                    <td>#</td>
                    <td>Per-link destination URL.</td>
                </tr>
                <tr>
                    <td>Icon</td>
                    <td>string</td>
                    <td>Required</td>
                    <td>Per-link Font Awesome icon name, for example <code>fa-wallet</code> or <code>fa-calendar-days</code>.</td>
                </tr>
                <tr>
                    <td>Animation</td>
                    <td>behavior</td>
                    <td>enabled</td>
                    <td>The component automatically applies the shared <code>lbcc-stagger</code> animation utility to each rendered row.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
