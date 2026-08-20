<section aria-labelledby="card-component-heading" class="mt-5">
    <p class="eyebrow mb-2">Component</p>
    <h2 id="card-component-heading">Card</h2>
    <p class="text-body-secondary mb-4">A flexible content card for grouped messaging, optional media, and one or more calls to action. This starter version focuses on the content model and style variations before we add any component-specific CSS.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="mb-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 gx-4 gy-5">
            <div class="col">
                <p class="eyebrow-sm mb-2">Surface Subtle / No Image</p>
                <?php
                component_card(
                    'Start Your Journey',
                    '<p>Explore LBCC pathways, support services, and next steps for applying to the college.</p>',
                    [
                        ['link' => '#', 'text' => 'Explore Admissions'],
                        ['link' => '#', 'text' => 'View Programs']
                    ],
                    '',
                    'surface-subtle',
                    'arrow-link'
                );
                ?>
            </div>
            <div class="col">
                <p class="eyebrow-sm mb-2">Surface Raised / With Image / Shadow</p>
                <?php
                component_card(
                    'Discover Campus Life',
                    '<p>Get a feel for student life, events, and places to connect across campus.</p>',
                    [
                        ['link' => '#', 'text' => 'Visit Campus'],
                        ['link' => '#', 'text' => 'Student Clubs & Activities']
                    ],
                    '_resources/images/hero-backgrounds/hero-bg-3.jpg',
                    'surface-raised',
                    'arrow-link',
                    true
                );
                ?>
            </div>
            <div class="col">
                <p class="eyebrow-sm mb-2">Surface Water / Bullets</p>
                <?php
                component_card(
                    'Student Support Resources',
                    '<ul class="mb-0"><li>Tutoring and learning support</li><li>Counseling and wellness resources</li><li>Technology and library help</li></ul>',
                    [
                        ['link' => '#', 'text' => 'Find Support Services', 'style' => 'btn-secondary'],
                        ['link' => '#', 'text' => 'Contact Student Help', 'style' => 'btn-outline-secondary', 'size' => 'btn-sm']
                    ],
                    '_resources/images/hero-backgrounds/hero-bg-14.jpg',
                    'surface-water',
                    'button'
                );
                ?>
            </div>
            <div class="col">
                <p class="eyebrow-sm mb-2">Surface Sun Haze / Multi CTA</p>
                <?php
                component_card(
                    'Financial Aid Guidance',
                    '<p>Learn how to apply for grants, scholarships, and other funding opportunities at LBCC.</p>',
                    [
                        ['link' => '#', 'text' => 'Apply for Financial Aid'],
                        ['link' => '#', 'text' => 'Scholarship Opportunities'],
                        ['link' => '#', 'text' => 'Enrollment Costs & Fees']
                    ],
                    '_resources/images/hero-backgrounds/hero-bg-9.jpg',
                    'surface-sun-haze',
                    'arrow-link'
                );
                ?>
            </div>
            <div class="col">
                <p class="eyebrow-sm mb-2">White / No Image</p>
                <?php
                component_card(
                    'Academic Planning',
                    '<p>Meet with counselors, map your schedule, and stay on track toward transfer or completion goals.</p>',
                    [
                        ['link' => '#', 'text' => 'Schedule Counseling', 'style' => 'btn-primary']
                    ],
                    '',
                    'white',
                    'button'
                );
                ?>
            </div>
            <div class="col">
                <p class="eyebrow-sm mb-2">Gray Border</p>
                <?php
                component_card(
                    'Explore Career Education',
                    '<p>Find hands-on programs that connect learning to workforce opportunities and credentials.</p>',
                    [
                        ['link' => '#', 'text' => 'Career Education Programs']
                    ],
                    '_resources/images/hero-backgrounds/hero-bg-12.jpg',
                    'gray-border',
                    'arrow-link'
                );
                ?>
            </div>
            <div class="col">
                <p class="eyebrow-sm mb-2">Red Border / Shadow</p>
                <?php
                component_card(
                    'Ready to Apply?',
                    '<p>Complete your application and review the next steps to become an LBCC student.</p>',
                    [
                        ['link' => '#', 'text' => 'Apply Now', 'style' => 'btn-primary'],
                        ['link' => '#', 'text' => 'What Happens Next', 'style' => 'btn-outline-secondary']
                    ],
                    '_resources/images/hero-backgrounds/hero-bg-15.jpg',
                    'red-border',
                    'button',
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
                    <td>Style</td>
                    <td>string</td>
                    <td>surface-subtle</td>
                    <td>Supported values are <code>surface-subtle</code>, <code>surface-raised</code>, <code>surface-water</code>, <code>surface-sun-haze</code>, <code>white</code>, <code>gray-border</code>, and <code>red-border</code>.</td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Outputs as the card’s <code>h2</code>.</td>
                </tr>
                <tr>
                    <td>Content</td>
                    <td>HTML string</td>
                    <td>empty</td>
                    <td>Trusted rich content area for paragraphs, lists, or other simple inline content.</td>
                </tr>
                <tr>
                    <td>Call to Actions</td>
                    <td>array</td>
                    <td>empty</td>
                    <td>Repeater field for CTA links. Each item accepts Link and Link Text, and can additionally pass button settings when CTA Display is set to button.</td>
                </tr>
                <tr>
                    <td>CTA Display</td>
                    <td>string</td>
                    <td>arrow-link</td>
                    <td>Supported values are <code>arrow-link</code> and <code>button</code>. This sets how the CTA repeater is rendered within the card.</td>
                </tr>
                <tr>
                    <td>Shadow</td>
                    <td>boolean</td>
                    <td>false</td>
                    <td>When set to <code>true</code>, the card adds the Bootstrap <code>shadow</code> utility class.</td>
                </tr>
                <tr>
                    <td>Link</td>
                    <td>string</td>
                    <td>#</td>
                    <td>Per-CTA destination URL.</td>
                </tr>
                <tr>
                    <td>Link Text</td>
                    <td>string</td>
                    <td>Required when CTA used</td>
                    <td>Per-CTA visible text label.</td>
                </tr>
                <tr>
                    <td>Button Style</td>
                    <td>string</td>
                    <td>btn-primary</td>
                    <td>Per-CTA button class when CTA Display is set to button, for example <code>btn-primary</code>, <code>btn-secondary</code>, or <code>btn-outline-secondary</code>.</td>
                </tr>
                <tr>
                    <td>Button Size</td>
                    <td>string</td>
                    <td>default</td>
                    <td>Optional per-CTA button size when CTA Display is set to button. Supported values are default, <code>btn-sm</code>, and <code>btn-lg</code>.</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional image path rendered at the top of the card.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
