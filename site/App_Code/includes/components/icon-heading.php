<section aria-labelledby="icon-heading-component-heading" class="mt-5 mb-5">
    <h2 id="icon-heading-component-heading">Icon Plus Heading</h2>
    <p class="text-body-secondary mb-4">A Font Awesome icon paired with a heading. It uses Bootstrap flex utilities to align the group to the start and center the icon and heading vertically.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="bg-surface-subtle rounded p-4 mb-5 d-grid gap-4">
        <?php component_icon_heading('fa-compass', 'Find Your Path'); ?>
        <?php component_icon_heading('fa-hand-holding-heart', 'Student Support', 'fs-3xl', 'text-dark', 'h4'); ?>
        <?php component_icon_heading('fa-graduation-cap', 'Plan for Graduation', 'fs-4xl', 'text-danger', 'h2'); ?>
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
                    <td>Icon</td>
                    <td>string</td>
                    <td>Optional</td>
                    <td>Font Awesome icon name, for example <code>fa-compass</code>.</td>
                </tr>
                <tr>
                    <td>Heading</td>
                    <td>string</td>
                    <td>Required</td>
                    <td>Heading text. The component does not render when empty.</td>
                </tr>
                <tr>
                    <td>Icon Size</td>
                    <td>string</td>
                    <td>fs-xl</td>
                    <td>Font-size utility class passed to the Icon component.</td>
                </tr>
                <tr>
                    <td>Icon Color</td>
                    <td>string</td>
                    <td>text-primary</td>
                    <td>Text-color utility class passed to the Icon component.</td>
                </tr>
                <tr>
                    <td>Heading Size</td>
                    <td>string</td>
                    <td>h3</td>
                    <td>Bootstrap heading class. Supported values are <code>h1</code> through <code>h6</code>.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
