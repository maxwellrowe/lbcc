<section aria-labelledby="fade-slider-heading" class="mt-5 mb-5">
    <h2 id="fade-slider-heading">Fade Slider</h2>
    <p class="text-body-secondary mb-4">A simpler slideshow treatment for imagery that fades between slides and adds a subtle scale settle on the active frame. It stays intentionally restrained, with a single pause control over the media rather than a full navigation rail.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-7 col-xl-5">
                <?php
                component_fade_slider(
                    [
                        [
                            'image' => '_resources/images/hero-backgrounds/hero-bg-11.jpg',
                            'alt' => 'Student portrait outdoors'
                        ],
                        [
                            'image' => '_resources/images/hero-backgrounds/hero-bg-13.jpg',
                            'alt' => 'Student seated in a hallway'
                        ],
                        [
                            'image' => '_resources/images/hero-backgrounds/hero-bg-15.jpg',
                            'alt' => 'Student sitting in a classroom'
                        ],
                        [
                            'image' => '_resources/images/hero-backgrounds/hero-bg-17.jpg',
                            'alt' => 'Student standing in front of campus signage'
                        ]
                    ],
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
                    <td>Controls whether the slideshow rotates automatically. If only one slide is provided, autoplay is disabled automatically.</td>
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
