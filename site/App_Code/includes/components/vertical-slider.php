<section aria-labelledby="vertical-slider-heading" class="mt-5 mb-5">
    <h2 id="vertical-slider-heading">Vertical Slider</h2>
    <p class="text-body-secondary mb-4">A vertical Swiper treatment that keeps the active slide centered while the previous and next slides peek above and below. The controls stay lightweight and Bootstrap-based, with just enough custom styling to get the stacked preview effect from the design.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
                <?php
                component_vertical_slider(
                    [
                        [
                            'image' => '_resources/images/hero-backgrounds/hero-bg-2.jpg',
                            'alt' => 'Students standing outdoors'
                        ],
                        [
                            'image' => '_resources/images/hero-backgrounds/hero-bg-4.jpg',
                            'alt' => 'Student seated on campus'
                        ],
                        [
                            'image' => '_resources/images/hero-backgrounds/hero-bg-6.jpg',
                            'alt' => 'Students in a classroom'
                        ],
                        [
                            'image' => '_resources/images/hero-backgrounds/hero-bg-8.jpg',
                            'alt' => 'Student smiling outdoors'
                        ]
                    ],
                    true,
                    true
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
                    <td>Slides</td>
                    <td>array</td>
                    <td>Required</td>
                    <td>Array of slide definitions. Each item accepts Image and optional Alt text.</td>
                </tr>
                <tr>
                    <td>Autoplay</td>
                    <td>boolean</td>
                    <td>true</td>
                    <td>When enabled, the slider advances automatically until paused. If only one slide is provided, autoplay is disabled automatically.</td>
                </tr>
                <tr>
                    <td>Show Controls</td>
                    <td>boolean</td>
                    <td>true</td>
                    <td>Shows the stacked previous, pause, and next controls alongside the vertical track.</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>string</td>
                    <td>Required</td>
                    <td>Slide image path.</td>
                </tr>
                <tr>
                    <td>Alt</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional image alt text for each slide.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
