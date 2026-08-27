<section aria-labelledby="contact-card-heading" class="mt-5 mb-5">
    <h2 id="contact-card-heading">Contact Card</h2>
    <p class="text-body-secondary mb-4">A reusable faculty, staff, office, or department contact pattern with two layout modes. The component keeps the structure close to Bootstrap card markup, then layers only the extra styling needed for the identity panel and responsive horizontal treatment.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="mb-5">
        <div class="row row-cols-1 row-cols-xl-2 gx-4 gy-5 mb-5">
            <div class="col">
                <p class="eyebrow-sm mb-2">Vertical / Default</p>
                <?php
                component_contact_card(
                    'Dr. Maya Thompson',
                    'Dean, Student Success & Enrollment Services',
                    '(562) 938-4012',
                    'maya.thompson@lbcc.edu',
                    'LAC, T-1100',
                    '(562) 938-4013',
                    '_resources/images/hero-backgrounds/hero-bg-5.jpg',
                    'vertical',
                    'default',
                    '/App_Code/directory-profile.php',
                    'View Profile',
                    '/App_Code/directory-profile.php',
                    'View Profile'
                );
                ?>
            </div>

            <div class="col">
                <p class="eyebrow-sm mb-2">Vertical / Surface</p>
                <?php
                component_contact_card(
                    'Jordan Lee',
                    'Transfer Center Coordinator',
                    '(562) 938-4820',
                    'jordan.lee@lbcc.edu',
                    'PCC, EE-205',
                    '',
                    '_resources/images/hero-backgrounds/hero-bg-10.jpg',
                    'vertical',
                    'surface',
                    '#',
                    'Email Jordan',
                    'mailto:jordan.lee@lbcc.edu',
                    'Contact'
                );
                ?>
            </div>
        </div>

        <div class="row row-cols-1 gy-5">
            <div class="col">
                <p class="eyebrow-sm mb-2">Horizontal / Default</p>
                <?php
                component_contact_card(
                    'Elena Ramirez',
                    'Director, Career Pathways',
                    '(562) 938-5174',
                    'elena.ramirez@lbcc.edu',
                    'LAC, B-320',
                    '(562) 938-5175',
                    '_resources/images/hero-backgrounds/hero-bg-12.jpg',
                    'horizontal',
                    'default',
                    '/App_Code/directory-profile.php',
                    'View Profile',
                    '/App_Code/directory-profile.php',
                    'Schedule Meeting'
                );
                ?>
            </div>

            <div class="col">
                <p class="eyebrow-sm mb-2">Horizontal / Surface</p>
                <?php
                component_contact_card(
                    'Veterans Resource Center',
                    'Student Support Office',
                    '(562) 938-4550',
                    'veterans@lbcc.edu',
                    'PCC, GG-101',
                    '',
                    '',
                    'horizontal',
                    'surface',
                    '#',
                    'Learn More',
                    'mailto:veterans@lbcc.edu',
                    'Email Office'
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
                    <td>Name</td>
                    <td>string</td>
                    <td>Required</td>
                    <td>Primary contact name or office name. The component does not render when Name is empty.</td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional supporting role, department, or office descriptor shown directly below the Name.</td>
                </tr>
                <tr>
                    <td>Layout</td>
                    <td>string</td>
                    <td>vertical</td>
                    <td>Supported values are <code>vertical</code> and <code>horizontal</code>. The horizontal version still stacks naturally on smaller screens using Bootstrap flex utilities.</td>
                </tr>
                <tr>
                    <td>Style</td>
                    <td>string</td>
                    <td>default</td>
                    <td>Supported values are <code>default</code> and <code>surface</code>. Default uses a white outer card with a light border, while Surface uses <code>.bg-surface-subtle</code> outside and a white identity panel inside.</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional phone value shown with the phone icon and linked with <code>tel:</code>.</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional email value shown with the envelope icon and linked with <code>mailto:</code>.</td>
                </tr>
                <tr>
                    <td>Location</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional campus and room label shown with the location icon.</td>
                </tr>
                <tr>
                    <td>Fax</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional fax value shown as supporting contact information.</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional image path. When omitted, the component keeps the identity area text-only.</td>
                </tr>
                <tr>
                    <td>Profile Link</td>
                    <td>string</td>
                    <td>#</td>
                    <td>Destination URL for the arrow-link action.</td>
                </tr>
                <tr>
                    <td>Profile Link Text</td>
                    <td>string</td>
                    <td>View Profile</td>
                    <td>Visible text for the arrow-link action. Leave empty to hide that action.</td>
                </tr>
                <tr>
                    <td>Button Link</td>
                    <td>string</td>
                    <td>Profile Link</td>
                    <td>Destination URL for the button action. When Button Text is present and Button Link is empty, it falls back to Profile Link.</td>
                </tr>
                <tr>
                    <td>Button Text</td>
                    <td>string</td>
                    <td>View Profile</td>
                    <td>Visible text for the secondary button action. Leave empty to hide the button.</td>
                </tr>
                <tr>
                    <td>Button Style</td>
                    <td>string</td>
                    <td>btn-outline-secondary</td>
                    <td>Optional button class string, for example <code>btn-outline-secondary</code> or <code>btn-primary</code>.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
