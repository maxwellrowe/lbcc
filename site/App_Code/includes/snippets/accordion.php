<section aria-labelledby="accordion-snippet-heading" class="mt-5 mb-5" id="accordion">
    <div class="container-xxl">
        <h2 id="accordion-snippet-heading">Accordion</h2>
        <p class="text-body-secondary mb-4">A Bootstrap accordion restyled to align with the Figma accordion item states. The default build stays close to Bootstrap markup and behavior, with custom styling layered on for the surface, icon, and plus-to-close treatment.</p>

        <h3 class="h5 mb-3">Example</h3>
        <div class="mb-5 d-grid gap-5">
            <div>
                <p class="eyebrow-sm mb-2">Default</p>
                <?php
                component_accordion(
                    [
                        [
                            'title' => 'Accordion Item',
                            'content' => '<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis magna eu convallis imperdiet. In consectetur posuere ex, id dapibus neque maximus at.</p>',
                            'icon' => 'fa-unicorn',
                            'open' => true
                        ],
                        [
                            'title' => 'Accordion Item',
                            'content' => '<p class="mb-0">Proin sagittis elit et sem vulputate viverra. Vestibulum eu facilisis magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
                            'icon' => 'fa-unicorn'
                        ],
                        [
                            'title' => 'Accordion Item',
                            'content' => '<p class="mb-0">In venenatis, arcu a laoreet varius, lacus diam vulputate ligula, at ultricies purus orci nec nibh. Aenean commodo justo a neque pulvinar facilisis.</p>',
                            'icon' => 'fa-unicorn'
                        ]
                    ],
                    'snippet-accordion-example'
                );
                ?>
            </div>

            <div>
                <p class="eyebrow-sm mb-2">Without Leading Icons</p>
                <?php
                component_accordion(
                    [
                        [
                            'title' => 'Admissions & Records',
                            'content' => '<p class="mb-0">Find deadlines, forms, transcript guidance, and help with enrollment-related questions.</p>',
                            'open' => true
                        ],
                        [
                            'title' => 'Financial Aid',
                            'content' => '<p class="mb-0">Learn more about grants, fee waivers, scholarships, and steps for submitting your financial aid materials.</p>'
                        ]
                    ],
                    'snippet-accordion-no-icons',
                    false,
                    true
                );
                ?>
            </div>

            <div>
                <p class="eyebrow-sm mb-2">Steps / Default</p>
                <?php
                component_accordion(
                    [
                        [
                            'title' => 'Choose a Program',
                            'content' => '<p class="mb-0">Explore programs that align with your academic and career goals.</p>',
                            'step' => '1',
                            'open' => true
                        ],
                        [
                            'title' => 'Submit Your Application',
                            'content' => '<p class="mb-0">Complete the application and submit any required documents.</p>',
                            'step' => '2'
                        ],
                        [
                            'title' => 'Register for Classes',
                            'content' => '<p class="mb-0">Meet with a counselor and register for your first semester.</p>',
                            'step' => '3'
                        ]
                    ],
                    'snippet-accordion-steps',
                    false,
                    true,
                    'default',
                    true
                );
                ?>
            </div>

            <div>
                <p class="eyebrow-sm mb-2">Steps / Surface Raised</p>
                <?php
                component_accordion(
                    [
                        [
                            'title' => 'Plan Your Courses',
                            'content' => '<p class="mb-0">Review degree requirements and create an educational plan.</p>',
                            'step' => 'A',
                            'open' => true
                        ],
                        [
                            'title' => 'Meet With a Counselor',
                            'content' => '<p class="mb-0">Connect with a counselor for guidance specific to your goals.</p>',
                            'step' => 'B'
                        ],
                        [
                            'title' => 'Enroll',
                            'content' => '<p class="mb-0">Register for classes and prepare for the start of the term.</p>',
                            'step' => 'C'
                        ]
                    ],
                    'snippet-accordion-steps-surface-raised',
                    false,
                    true,
                    'surface-raised',
                    true
                );
                ?>
            </div>

            <div>
                <p class="eyebrow-sm mb-2">Surface Raised</p>
                <?php
                component_accordion(
                    [
                        [
                            'title' => 'Accordion Item',
                            'content' => '<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis magna eu convallis imperdiet. In consectetur posuere ex, id dapibus neque maximus at.</p>',
                            'icon' => 'fa-unicorn',
                            'open' => true
                        ],
                        [
                            'title' => 'Accordion Item',
                            'content' => '<p class="mb-0">Proin sagittis elit et sem vulputate viverra. Vestibulum eu facilisis magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
                            'icon' => 'fa-unicorn'
                        ]
                    ],
                    'snippet-accordion-surface-raised',
                    true,
                    true,
                    'surface-raised'
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
                        <td>Array of accordion item definitions. Each item can include Title, Content, Icon, Step, and Open.</td>
                    </tr>
                    <tr>
                        <td>ID</td>
                        <td>string</td>
                        <td>auto-generated</td>
                        <td>Used to scope the Bootstrap collapse targets and ARIA relationships.</td>
                    </tr>
                    <tr>
                        <td>Show Icons</td>
                        <td>boolean</td>
                        <td>true</td>
                        <td>Controls whether a leading Font Awesome icon slot is rendered for each item.</td>
                    </tr>
                    <tr>
                        <td>Show Steps</td>
                        <td>boolean</td>
                        <td>false</td>
                        <td>Displays a leading circular step marker before the optional icon. When enabled, it uses each item’s Step value or falls back to its sequence number.</td>
                    </tr>
                    <tr>
                        <td>Allow Multiple</td>
                        <td>boolean</td>
                        <td>true</td>
                        <td>When true, multiple accordion items can remain open at the same time. Set to <code>false</code> to restore classic one-open-at-a-time behavior using <code>data-bs-parent</code>.</td>
                    </tr>
                    <tr>
                        <td>Style</td>
                        <td>string</td>
                        <td>default</td>
                        <td>Supported values are <code>default</code> and <code>surface-raised</code>.</td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>string</td>
                        <td>Required</td>
                        <td>Accordion trigger label.</td>
                    </tr>
                    <tr>
                        <td>Content</td>
                        <td>HTML string</td>
                        <td>empty</td>
                        <td>Accordion panel content.</td>
                    </tr>
                    <tr>
                        <td>Icon</td>
                        <td>string</td>
                        <td>empty</td>
                        <td>Optional Font Awesome icon class, for example <code>fa-unicorn</code>.</td>
                    </tr>
                    <tr>
                        <td>Step</td>
                        <td>string</td>
                        <td>item sequence</td>
                        <td>Optional step marker, such as <code>1</code> or <code>A</code>. Used when Show Steps is enabled.</td>
                    </tr>
                    <tr>
                        <td>Open</td>
                        <td>boolean</td>
                        <td>false</td>
                        <td>Sets the item to its initial expanded state.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
