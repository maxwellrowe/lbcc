<section aria-labelledby="buttons-heading" class="mt-5 mb-5">
    <h2 id="buttons-heading">Buttons</h2>
    <p class="text-body-secondary mb-4">A grouped button component for primary actions, secondary actions, and icon-button variants. The function accepts row-level layout settings plus an array of individual button definitions.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="bg-surface-subtle rounded p-4 mb-5">
        <div class="row g-4">
            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Row / Mixed Styles</p>
                <?php
                component_buttons(
                    [
                        [
                            'style' => 'btn-primary',
                            'text' => 'Apply Now',
                            'url' => '#',
                            'size' => '',
                            'icon' => ''
                        ],
                        [
                            'style' => 'btn-secondary',
                            'text' => 'Visit Campus',
                            'url' => '#',
                            'size' => '',
                            'icon' => ''
                        ],
                        [
                            'style' => 'btn-outline-secondary',
                            'text' => 'Request Info',
                            'url' => '#',
                            'size' => '',
                            'icon' => ''
                        ]
                    ],
                    'row',
                    3
                );
                ?>
            </div>
            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Row / Icon Buttons</p>
                <?php
                component_buttons(
                    [
                        [
                            'style' => 'btn-primary',
                            'text' => 'Start Application',
                            'url' => '#',
                            'size' => '',
                            'icon' => 'fa-arrow-up-right',
                            'icon_position' => 'end'
                        ],
                        [
                            'style' => 'btn-outline-secondary',
                            'text' => 'Explore Programs',
                            'url' => '#',
                            'size' => '',
                            'icon' => 'fa-unicorn',
                            'icon_position' => 'start'
                        ]
                    ],
                    'row',
                    3
                );
                ?>
            </div>
            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Column / Large</p>
                <?php
                component_buttons(
                    [
                        [
                            'style' => 'btn-primary',
                            'text' => 'Get Started',
                            'url' => '#',
                            'size' => 'btn-lg',
                            'icon' => ''
                        ],
                        [
                            'style' => 'btn-outline-secondary',
                            'text' => 'Talk With Admissions',
                            'url' => '#',
                            'size' => 'btn-lg',
                            'icon' => ''
                        ]
                    ],
                    'column',
                    2
                );
                ?>
            </div>
            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Column / Small / Icon</p>
                <?php
                component_buttons(
                    [
                        [
                            'style' => 'btn-secondary',
                            'text' => 'Open Guide',
                            'url' => '#',
                            'size' => 'btn-sm',
                            'icon' => 'fa-file-lines',
                            'icon_position' => 'start'
                        ],
                        [
                            'style' => 'btn-dark',
                            'text' => 'Student Login',
                            'url' => '#',
                            'size' => 'btn-sm',
                            'icon' => 'fa-arrow-right',
                            'icon_position' => 'end'
                        ]
                    ],
                    'column',
                    2
                );
                ?>
            </div>
            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Block / Full Width</p>
                <?php
                component_buttons(
                    [
                        [
                            'style' => 'btn-primary',
                            'text' => 'Apply to LBCC',
                            'url' => '#',
                            'size' => '',
                            'icon' => ''
                        ],
                        [
                            'style' => 'btn-outline-secondary',
                            'text' => 'Schedule a Tour',
                            'url' => '#',
                            'size' => '',
                            'icon' => ''
                        ],
                        [
                            'style' => 'btn-secondary',
                            'text' => 'Explore Programs',
                            'url' => '#',
                            'size' => '',
                            'icon' => 'fa-arrow-right',
                            'icon_position' => 'end'
                        ]
                    ],
                    'block',
                    2
                );
                ?>
            </div>
            <div class="col-lg-6">
                <div class="bg-dark rounded p-4 h-100">
                    <p class="eyebrow-sm text-white mb-2">Row / Light on Dark</p>
                    <?php
                    component_buttons(
                        [
                            [
                                'style' => 'btn-outline-light',
                                'text' => 'Explore LBCC',
                                'url' => '#',
                                'size' => '',
                                'icon' => ''
                            ],
                            [
                                'style' => 'btn-outline-light',
                                'text' => 'Request Information',
                                'url' => '#',
                                'size' => '',
                                'icon' => 'fa-arrow-right',
                                'icon_position' => 'end'
                            ]
                        ],
                        'row',
                        3
                    );
                    ?>
                </div>
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
                    <td>Display</td>
                    <td>string</td>
                    <td>row</td>
                    <td>Row-level layout setting. Supported values are <code>row</code>, <code>column</code>, and <code>block</code>. Block uses a Bootstrap <code>d-grid</code> wrapper with full-width children.</td>
                </tr>
                <tr>
                    <td>Gap</td>
                    <td>integer</td>
                    <td>3</td>
                    <td>Row-level spacing setting. Supported values are <code>1</code> through <code>5</code>, output as Bootstrap <code>gap-*</code> utilities.</td>
                </tr>
                <tr>
                    <td>Buttons</td>
                    <td>array</td>
                    <td>Required</td>
                    <td>Array of button definitions. Each item can include Style, Link Text, Link URL, Size, Icon, and Icon Position.</td>
                </tr>
                <tr>
                    <td>Style</td>
                    <td>string</td>
                    <td>btn-primary</td>
                    <td>Per-button style class, for example <code>btn-primary</code>, <code>btn-secondary</code>, <code>btn-outline-secondary</code>, <code>btn-dark</code>, or <code>btn-outline-light</code>.</td>
                </tr>
                <tr>
                    <td>Link Text</td>
                    <td>string</td>
                    <td>Required</td>
                    <td>Per-button visible text label.</td>
                </tr>
                <tr>
                    <td>Link URL</td>
                    <td>string</td>
                    <td>#</td>
                    <td>Per-button destination URL.</td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td>string</td>
                    <td>default</td>
                    <td>Per-button size modifier. Supported values are default, <code>btn-sm</code>, and <code>btn-lg</code>.</td>
                </tr>
                <tr>
                    <td>Icon</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Per-button icon name only, for example <code>fa-unicorn</code>. When present, the component outputs the project’s icon-button markup and adds the related button classes automatically.</td>
                </tr>
                <tr>
                    <td>Icon Position</td>
                    <td>string</td>
                    <td>end</td>
                    <td>Per-button icon alignment for icon-button output. Supported values are <code>start</code> and <code>end</code>.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
