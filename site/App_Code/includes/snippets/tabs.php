<section aria-labelledby="tabs-snippet-heading" class="mt-5 mb-5" id="tabs">
    <div class="container-xxl">
        <h2 id="tabs-snippet-heading">Tabs</h2>
        <p class="text-body-secondary mb-4">A Bootstrap tabs component restyled to match the Figma default and mobile tab treatments. The underlying structure stays native to Bootstrap, with responsive styling layered onto the nav and content shell.</p>

        <h3 class="h5 mb-3">Example</h3>
        <div class="mb-5 d-grid gap-5">
            <div>
                <p class="eyebrow-sm mb-2">Default</p>
                <?php
                component_tabs(
                    [
                        [
                            'label' => 'Tab',
                            'content' => '<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec arcu aliquam, ullamcorper ex id, tempor leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam erat volutpat. Nulla tincidunt sollicitudin neque vitae sagittis.</p>',
                            'active' => true
                        ],
                        [
                            'label' => 'Tab',
                            'content' => '<p class="mb-0">Curabitur convallis ac purus at malesuada. In hac habitasse platea dictumst. Aliquam erat odio, tempor eget purus sed, suscipit vehicula mi. Suspendisse id rutrum ex. Integer aliquet quis risus at efficitur.</p>'
                        ]
                    ],
                    'snippet-tabs-example'
                );
                ?>
            </div>

            <div>
                <p class="eyebrow-sm mb-2">Three Tabs</p>
                <?php
                component_tabs(
                    [
                        [
                            'label' => 'Overview',
                            'content' => '<p class="mb-0">Get a quick summary of program details, timelines, and next steps.</p>',
                            'active' => true
                        ],
                        [
                            'label' => 'Requirements',
                            'content' => '<p class="mb-0">Review major requirements, recommended preparation, and supporting coursework expectations.</p>'
                        ],
                        [
                            'label' => 'Apply',
                            'content' => '<p class="mb-0">Follow the application checklist, gather your materials, and prepare for submission.</p>'
                        ]
                    ],
                    'snippet-tabs-three-up'
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
                        <td>Items</td>
                        <td>array</td>
                        <td>Required</td>
                        <td>Array of tab definitions. Each item can include Label, Content, and Active.</td>
                    </tr>
                    <tr>
                        <td>ID</td>
                        <td>string</td>
                        <td>auto-generated</td>
                        <td>Used to scope the Bootstrap tab targets and ARIA relationships.</td>
                    </tr>
                    <tr>
                        <td>Label</td>
                        <td>string</td>
                        <td>Required</td>
                        <td>Tab button text.</td>
                    </tr>
                    <tr>
                        <td>Content</td>
                        <td>HTML string</td>
                        <td>empty</td>
                        <td>Tab panel content.</td>
                    </tr>
                    <tr>
                        <td>Active</td>
                        <td>boolean</td>
                        <td>first item if none are flagged</td>
                        <td>Controls the initial active tab and visible panel.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
