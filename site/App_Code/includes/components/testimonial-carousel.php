<section aria-labelledby="testimonial-carousel-heading" class="mt-5 mb-5">
    <h2 id="testimonial-carousel-heading">Testimonial Carousel</h2>
    <p class="text-body-secondary mb-4">A testimonial pattern with a quote panel, supporting student card, avatar rail, and a simple pause control. This version follows the Figma structure more closely than the generic carousel treatment.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="mb-5">
        <?php
        component_testimonial_carousel(
            [
                [
                    'quote' => 'As a non-English speaker, LBCC has expanded my vision and developed my mindset to adapt to American culture and become an effective student.',
                    'name' => 'Hong Sodalis',
                    'program' => 'Registered Nursing',
                    'location' => 'Phnom Penh, Cambodia',
                    'image' => '_resources/images/hero-backgrounds/hero-bg-4.jpg'
                ],
                [
                    'quote' => 'The faculty here encouraged me to stay ambitious while also giving me the support to feel grounded and ready for what comes next.',
                    'name' => 'Elena Ruiz',
                    'program' => 'Transfer Studies',
                    'location' => 'Long Beach, California',
                    'image' => '_resources/images/hero-backgrounds/hero-bg-10.jpg'
                ],
                [
                    'quote' => 'I found a community here that helped me believe I could lead, contribute, and build a future that fits who I am.',
                    'name' => 'Mateo Santos',
                    'program' => 'Computer Science',
                    'location' => 'Lakewood, California',
                    'image' => '_resources/images/hero-backgrounds/hero-bg-16.jpg'
                ]
            ],
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
                    <td>Testimonials</td>
                    <td>array</td>
                    <td>Required</td>
                    <td>Array of slide definitions. Each item can include Quote, Name, Program, Location, Image, and Thumb.</td>
                </tr>
                <tr>
                    <td>Autoplay</td>
                    <td>boolean</td>
                    <td>true</td>
                    <td>Controls whether the testimonial swiper rotates automatically.</td>
                </tr>
                <tr>
                    <td>Quote</td>
                    <td>string</td>
                    <td>Required</td>
                    <td>Main testimonial copy for the slide.</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional attribution name shown below the quote.</td>
                </tr>
                <tr>
                    <td>Program</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional program or role line shown in the teal bio card.</td>
                </tr>
                <tr>
                    <td>Location</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional location line shown beneath the program detail.</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Portrait image used in the supporting bio card.</td>
                </tr>
                <tr>
                    <td>Thumb</td>
                    <td>string</td>
                    <td>falls back to Image</td>
                    <td>Optional avatar image used in the lower selection rail.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
