<section aria-labelledby="ticker-heading" class="mt-5 mb-5">
    <h2 id="ticker-heading">Ticker</h2>
    <p class="text-body-secondary mb-4">A compact “latest” bar for linked announcements, updates, and featured actions. On mobile it shows one item at a time; from tablet up it uses an auto-width Swiper track so multiple pill links can sit visible in the row while still rotating through the set.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="mb-5">
        <?php
        component_ticker(
            [
                [
                    'text' => 'Apply For Fall Classes',
                    'url' => '#'
                ],
                [
                    'text' => 'Explore Student Support Services',
                    'url' => '#'
                ],
                [
                    'text' => 'View Upcoming Campus Events',
                    'url' => '#'
                ],
                [
                    'text' => 'See Financial Aid Deadlines',
                    'url' => '#'
                ],
                [
                    'text' => 'Read The Latest News',
                    'url' => '#'
                ],
                [
                    'text' => 'Review Registration Dates And Deadlines',
                    'url' => '#'
                ],
                [
                    'text' => 'Discover Transfer Center Workshops',
                    'url' => '#'
                ],
                [
                    'text' => 'Visit The Academic Calendar',
                    'url' => '#'
                ],
                [
                    'text' => 'Explore Career Pathways And Programs',
                    'url' => '#'
                ],
                [
                    'text' => 'Find Tutoring And Learning Support',
                    'url' => '#'
                ]
            ],
            'Latest',
            true
        );
        ?>
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
                    <td>Array of ticker link items. Each item accepts Text, URL, and optional Target.</td>
                </tr>
                <tr>
                    <td>Label</td>
                    <td>string</td>
                    <td>Latest</td>
                    <td>Short mono uppercase label shown at the start of the ticker.</td>
                </tr>
                <tr>
                    <td>Autoplay</td>
                    <td>boolean</td>
                    <td>true</td>
                    <td>Rotates through the linked items automatically when more than one item is present.</td>
                </tr>
                <tr>
                    <td>Text</td>
                    <td>string</td>
                    <td>Required</td>
                    <td>Visible text label for each ticker item.</td>
                </tr>
                <tr>
                    <td>URL</td>
                    <td>string</td>
                    <td>#</td>
                    <td>Destination URL for each ticker item.</td>
                </tr>
                <tr>
                    <td>Target</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional link target such as <code>_blank</code>. When used, the component adds a safe <code>rel</code> value automatically.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
