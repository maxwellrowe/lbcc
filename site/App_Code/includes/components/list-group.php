<section aria-labelledby="list-group-heading" class="mt-5 mb-5">
    <h2 id="list-group-heading">List Group</h2>
    <p class="text-body-secondary mb-4">A Bootstrap list group adapted to the LBCC design system for linked content rows. This baseline combines the “List Group Item” and “List Group Item with Image” patterns from Figma into one component with style, size, and per-item media options.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="mb-5">
        <div class="row row-cols-1 row-cols-xl-2 gx-4 gy-5">
            <div class="col">
                <p class="eyebrow-sm mb-2">Surface / Default</p>
                <?php
                component_list_group(
                    [
                        [
                            'link' => '#',
                            'title' => 'Heading',
                            'description' => 'Lorem ipsum dolor sit amet',
                            'label' => 'Here Is A Label'
                        ],
                        [
                            'link' => '#',
                            'title' => 'Heading',
                            'description' => 'Learn more about student support',
                            'label' => 'Here Is A Label',
                            'left_icon' => 'fa-building-columns'
                        ],
                        [
                            'link' => '#',
                            'title' => 'Heading',
                            'description' => 'Explore academic pathways and options',
                            'label' => 'Here Is A Label'
                        ]
                    ],
                    'surface',
                    'default'
                );
                ?>
            </div>
            <div class="col">
                <p class="eyebrow-sm mb-2">Surface / With Image</p>
                <?php
                component_list_group(
                    [
                        [
                            'link' => '#',
                            'title' => 'Heading',
                            'description' => 'Lorem ipsum dolor sit amet',
                            'label' => 'Here Is A Label',
                            'image' => '_resources/images/lb-icon.png'
                        ],
                        [
                            'link' => '#',
                            'title' => 'Heading',
                            'description' => 'Learn more about student support',
                            'label' => 'Here Is A Label',
                            'image' => '_resources/images/canvas-icon.svg'
                        ],
                        [
                            'link' => '#',
                            'title' => 'Heading',
                            'description' => 'Explore academic pathways and options',
                            'label' => 'Here Is A Label',
                            'image' => '_resources/images/viking-icon.svg'
                        ]
                    ],
                    'surface',
                    'default'
                );
                ?>
            </div>
            <div class="col">
                <p class="eyebrow-sm mb-2">White / Default</p>
                <?php
                component_list_group(
                    [
                        [
                            'link' => '#',
                            'title' => 'Heading',
                            'description' => 'Lorem ipsum dolor sit amet',
                            'label' => 'Here Is A Label'
                        ],
                        [
                            'link' => '#',
                            'title' => 'Heading',
                            'description' => 'Learn more about student support',
                            'label' => 'Here Is A Label',
                            'left_icon' => 'fa-building-columns'
                        ],
                        [
                            'link' => '#',
                            'title' => 'Heading',
                            'description' => 'Explore academic pathways and options',
                            'label' => 'Here Is A Label'
                        ]
                    ],
                    'white',
                    'default'
                );
                ?>
            </div>
            <div class="col">
                <p class="eyebrow-sm mb-2">Lined / Default</p>
                <?php
                component_list_group(
                    [
                        [
                            'link' => '#',
                            'title' => 'Heading',
                            'description' => 'Lorem ipsum dolor sit amet',
                            'label' => 'Here Is A Label'
                        ],
                        [
                            'link' => '#',
                            'title' => 'Heading',
                            'description' => 'Learn more about student support',
                            'label' => 'Here Is A Label',
                            'left_icon' => 'fa-building-columns'
                        ],
                        [
                            'link' => '#',
                            'title' => 'Heading',
                            'description' => 'Explore academic pathways and options',
                            'label' => 'Here Is A Label'
                        ]
                    ],
                    'lined',
                    'default'
                );
                ?>
            </div>
            <div class="col">
                <p class="eyebrow-sm mb-2">Surface / Large</p>
                <?php
                component_list_group(
                    [
                        [
                            'link' => '#',
                            'title' => 'Heading',
                            'description' => 'Lorem ipsum dolor sit amet',
                            'label' => 'Here Is A Label'
                        ],
                        [
                            'link' => '#',
                            'title' => 'Heading',
                            'description' => 'Explore services that support your goals',
                            'label' => 'Here Is A Label',
                            'left_icon' => 'fa-building-columns'
                        ]
                    ],
                    'surface',
                    'lg'
                );
                ?>
            </div>
            <div class="col">
                <p class="eyebrow-sm mb-2">Surface / Small</p>
                <?php
                component_list_group(
                    [
                        [
                            'link' => '#',
                            'title' => 'Heading',
                            'description' => 'Lorem ipsum dolor sit amet',
                            'label' => 'Here Is A Label'
                        ],
                        [
                            'link' => '#',
                            'title' => 'Heading',
                            'description' => 'Quick utility link',
                            'label' => 'Here Is A Label'
                        ]
                    ],
                    'surface',
                    'sm'
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
                    <td>Array of list group item definitions. Each item can include Link, Title, Description, Label, Left Icon, and Image.</td>
                </tr>
                <tr>
                    <td>Style</td>
                    <td>string</td>
                    <td>surface</td>
                    <td>Supported values are <code>surface</code>, <code>white</code>, and <code>lined</code>.</td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td>string</td>
                    <td>default</td>
                    <td>Supported values are <code>default</code>, <code>sm</code>, and <code>lg</code>.</td>
                </tr>
                <tr>
                    <td>Link</td>
                    <td>string</td>
                    <td>#</td>
                    <td>Destination URL for the linked list-group item.</td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td>string</td>
                    <td>Required</td>
                    <td>Main linked heading for the row.</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional supporting text below the title.</td>
                </tr>
                <tr>
                    <td>Label</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional small label shown above the title area.</td>
                </tr>
                <tr>
                    <td>Left Icon</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional Font Awesome icon name, for example <code>fa-building-columns</code>.</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional image shown on the right side of the row. When omitted, the component falls back to the circular arrow treatment.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
