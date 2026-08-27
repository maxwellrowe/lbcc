<section aria-labelledby="degree-certificate-heading" class="mt-5 mb-5">
    <h2 id="degree-certificate-heading">Degree / Certificate</h2>
    <p class="text-body-secondary mb-4">Use this component to aggregate the degrees and certificates available under a program. It supports a vertical card layout and a horizontal row layout, with Bootstrap-powered column controls for mobile, tablet, and desktop. On mobile the layout always stacks vertically.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="mb-5 d-grid gap-5">
        <div>
            <p class="eyebrow-sm mb-2">Vertical / 1-2-2 Up</p>
            <?php
            component_degree_certificates(
                [
                    [
                        'label' => 'Associate in Arts (AA)',
                        'title' => 'Business: Accounting',
                        'links' => [
                            ['text' => 'Program Map', 'url' => '#'],
                            ['text' => 'Required Courses', 'url' => '#']
                        ]
                    ],
                    [
                        'label' => 'Associate in Science for Transfer (AS-T)',
                        'title' => 'Business Administration',
                        'links' => [
                            ['text' => 'Program Map', 'url' => '#'],
                            ['text' => 'Required Courses', 'url' => '#']
                        ]
                    ],
                    [
                        'label' => 'Certificate of Achievement',
                        'title' => 'Accounting Clerk',
                        'links' => [
                            ['text' => 'Program Map', 'url' => '#'],
                            ['text' => 'Required Courses', 'url' => '#']
                        ]
                    ],
                    [
                        'label' => 'Certificate of Accomplishment',
                        'title' => 'Bookkeeping',
                        'links' => [
                            ['text' => 'Program Map', 'url' => '#'],
                            ['text' => 'Required Courses', 'url' => '#']
                        ]
                    ]
                ],
                'vertical',
                1,
                2,
                2
            );
            ?>
        </div>

        <div>
            <p class="eyebrow-sm mb-2">Horizontal / 1-1-1 Up</p>
            <?php
            component_degree_certificates(
                [
                    [
                        'label' => 'Associate in Arts (AA)',
                        'title' => 'Business: Accounting',
                        'links' => [
                            ['text' => 'Program Map', 'url' => '#'],
                            ['text' => 'Required Courses', 'url' => '#']
                        ]
                    ],
                    [
                        'label' => 'Certificate of Achievement',
                        'title' => 'Accounting Technician',
                        'links' => [
                            ['text' => 'Program Map', 'url' => '#'],
                            ['text' => 'Required Courses', 'url' => '#']
                        ]
                    ]
                ],
                'horizontal',
                1,
                1,
                1
            );
            ?>
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
                    <td>Layout</td>
                    <td>string</td>
                    <td>vertical</td>
                    <td>Supported values are <code>vertical</code> and <code>horizontal</code>. On mobile, both layouts stack vertically by design.</td>
                </tr>
                <tr>
                    <td>Mobile Columns</td>
                    <td>integer</td>
                    <td>1</td>
                    <td>Controls the number of degree/certificate items shown per row on mobile using Bootstrap <code>row-cols-*</code> utilities.</td>
                </tr>
                <tr>
                    <td>Tablet Columns</td>
                    <td>integer</td>
                    <td>2 or 1</td>
                    <td>Controls the number of items per row on tablet using <code>row-cols-md-*</code>. Horizontal layout typically uses 1; vertical layout typically uses 2.</td>
                </tr>
                <tr>
                    <td>Desktop Columns</td>
                    <td>integer</td>
                    <td>2 or 1</td>
                    <td>Controls the number of items per row on desktop using <code>row-cols-xl-*</code>. Horizontal layout typically uses 1; vertical layout typically uses 2.</td>
                </tr>
                <tr>
                    <td>Items</td>
                    <td>array</td>
                    <td>empty</td>
                    <td>Repeater of degree/certificate entries. Each item accepts a Label, Title, and one or more Links such as Program Map or Required Courses.</td>
                </tr>
                <tr>
                    <td>Item: Label</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Displays the credential type, for example Associate in Arts (AA) or Certificate of Achievement.</td>
                </tr>
                <tr>
                    <td>Item: Title</td>
                    <td>string</td>
                    <td>required</td>
                    <td>The degree or certificate name shown as the main heading.</td>
                </tr>
                <tr>
                    <td>Item: Links</td>
                    <td>array</td>
                    <td>empty</td>
                    <td>Repeater of arrow links associated with the degree/certificate, such as Program Map, Required Courses, or similar supporting destinations.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
