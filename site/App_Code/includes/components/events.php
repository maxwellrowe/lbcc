<section aria-labelledby="events-component-heading" class="mt-5 mb-5">
    <h2 id="events-component-heading">Events</h2>
    <p class="text-body-secondary mb-4">An event listing built around the Title with CTAs header and a raised list-group item pattern. The three variations below map to the default, mobile-vertical, and horizontal layouts shown in Figma.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="mb-5">
        <div class="row g-5">
            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Default</p>
                <?php
                component_events(
                    [
                        [
                            'title' => 'Using AI as Your Research Assistant',
                            'url' => '#',
                            'meta' => 'September 14, 2026 12:00pm - 1:00pm'
                        ],
                        [
                            'title' => 'Dual Enrollment Registration Labs - Online & In-Person',
                            'url' => '#',
                            'meta' => 'September 16, 2026 12:00pm - 1:00pm',
                            'category' => 'Early College Initiatives'
                        ],
                        [
                            'title' => 'Orientation + Next Steps for LBCC',
                            'url' => '#',
                            'meta' => 'September 21, 2026 12:00pm - 1:00pm',
                            'category' => 'Virtual Workshop'
                        ],
                        [
                            'title' => 'Flex Day - No Classes',
                            'url' => '#',
                            'meta' => 'October 2, 2026',
                            'category' => 'Academic Calendar'
                        ]
                    ],
                    'default',
                    'Events',
                    [
                        ['text' => 'Academic Calendar', 'url' => '#'],
                        ['text' => 'All Events', 'url' => '#']
                    ]
                );
                ?>
            </div>

            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Mobile Vert</p>
                <?php
                component_events(
                    [
                        [
                            'title' => 'Using AI as Your Research Assistant',
                            'url' => '#',
                            'meta' => 'September 14, 2026 12:00pm - 1:00pm'
                        ],
                        [
                            'title' => 'Dual Enrollment Registration Labs - Online & In-Person',
                            'url' => '#',
                            'meta' => 'September 16, 2026 12:00pm - 1:00pm',
                            'category' => 'Early College Initiatives'
                        ],
                        [
                            'title' => 'Orientation + Next Steps for LBCC',
                            'url' => '#',
                            'meta' => 'September 21, 2026 12:00pm - 1:00pm',
                            'category' => 'Virtual Workshop'
                        ],
                        [
                            'title' => 'Flex Day - No Classes',
                            'url' => '#',
                            'meta' => 'October 2, 2026',
                            'category' => 'Academic Calendar'
                        ]
                    ],
                    'mobile-vert',
                    'Events',
                    [
                        ['text' => 'Academic Calendar', 'url' => '#'],
                        ['text' => 'All Events', 'url' => '#']
                    ]
                );
                ?>
            </div>

            <div class="col-12">
                <p class="eyebrow-sm mb-2">Horizontal</p>
                <?php
                component_events(
                    [
                        [
                            'title' => 'Using AI as Your Research Assistant',
                            'url' => '#',
                            'meta' => 'September 14, 2026 12:00pm - 1:00pm'
                        ],
                        [
                            'title' => 'Dual Enrollment Registration Labs - Online & In-Person',
                            'url' => '#',
                            'meta' => 'September 16, 2026 12:00pm - 1:00pm',
                            'category' => 'Early College Initiatives'
                        ],
                        [
                            'title' => 'Orientation + Next Steps for LBCC',
                            'url' => '#',
                            'meta' => 'September 21, 2026 12:00pm - 1:00pm',
                            'category' => 'Virtual Workshop'
                        ],
                        [
                            'title' => 'Flex Day - No Classes',
                            'url' => '#',
                            'meta' => 'October 2, 2026',
                            'category' => 'Academic Calendar'
                        ]
                    ],
                    'horizontal',
                    'Events',
                    [
                        ['text' => 'Academic Calendar', 'url' => '#'],
                        ['text' => 'All Events', 'url' => '#']
                    ]
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
                    <td>Items</td>
                    <td>array</td>
                    <td>Required</td>
                    <td>Array of event definitions. Each item can include Title, URL, Meta, and Category.</td>
                </tr>
                <tr>
                    <td>Variation</td>
                    <td>string</td>
                    <td>default</td>
                    <td>Supported values are <code>default</code>, <code>mobile-vert</code>, and <code>horizontal</code>.</td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td>string</td>
                    <td>Events</td>
                    <td>Header title shown in the title-with-line row.</td>
                </tr>
                <tr>
                    <td>Buttons</td>
                    <td>array</td>
                    <td>empty</td>
                    <td>Small pill actions shown in the header, for example Academic Calendar and All Events.</td>
                </tr>
                <tr>
                    <td>Item Title</td>
                    <td>string</td>
                    <td>Required</td>
                    <td>Main event title for each item.</td>
                </tr>
                <tr>
                    <td>Item Meta</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Supporting date and time line shown beneath the event title.</td>
                </tr>
                <tr>
                    <td>Item Category</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional small label shown above list-based event titles.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
