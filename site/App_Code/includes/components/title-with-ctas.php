<section aria-labelledby="title-with-ctas-heading" class="mt-5 mb-5">
    <h2 id="title-with-ctas-heading">Title with CTAs</h2>
    <p class="text-body-secondary mb-4">A title-with-line header and a set of small soft pill actions. This is the same structural pattern used above the Events component in the Figma file.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="mb-5 d-grid gap-5">
        <?php
        component_title_with_ctas(
            'Events',
            [
                [
                    'text' => 'Academic Calendar',
                    'url' => '#'
                ],
                [
                    'text' => 'All Events',
                    'url' => '#'
                ]
            ],
            ''
        );

        component_title_with_ctas(
            'News',
            [
                [
                    'text' => 'Latest Stories',
                    'url' => '#'
                ],
                [
                    'text' => 'View Archive',
                    'url' => '#'
                ]
            ],
            '',
            'border-gray-300'
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
                    <td>Title</td>
                    <td>string</td>
                    <td>Required</td>
                    <td>Main heading for the row.</td>
                </tr>
                <tr>
                    <td>Buttons</td>
                    <td>array</td>
                    <td>empty</td>
                    <td>Array of small pill actions. Each item accepts Text, URL, and an optional custom class.</td>
                </tr>
                <tr>
                    <td>Content</td>
                    <td>HTML string</td>
                    <td>empty</td>
                    <td>Optional supporting content displayed beneath the title row.</td>
                </tr>
                <tr>
                    <td>Line Class</td>
                    <td>string</td>
                    <td>border-gray-300</td>
                    <td>Divider color class for the bottom rule, typically a Bootstrap border utility.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
