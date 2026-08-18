<section aria-labelledby="badge-heading" class="mt-5">
    <p class="eyebrow mb-2">Component</p>
    <h2 id="badge-heading">Badge</h2>
    <p class="text-body-secondary mb-4">A compact label component for statuses, filters, categories, and supporting metadata. The component uses Bootstrap badge markup, offers four preset style treatments, and can optionally prefix a Font Awesome icon.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="bg-surface-subtle rounded p-4 mb-5">
        <div class="row g-4">
            <div class="col-lg-4">
                <p class="eyebrow-sm mb-2">Light</p>
                <?php component_badge('Admissions', 'light'); ?>
            </div>
            <div class="col-lg-4">
                <p class="eyebrow-sm mb-2">Dark</p>
                <?php component_badge('Featured Program', 'dark'); ?>
            </div>
            <div class="col-lg-4">
                <p class="eyebrow-sm mb-2">Yellow</p>
                <?php component_badge('Scholarship Deadline', 'yellow'); ?>
            </div>
            <div class="col-lg-4">
                <p class="eyebrow-sm mb-2">Water</p>
                <?php component_badge('Student Resource', 'water'); ?>
            </div>
            <div class="col-lg-4">
                <p class="eyebrow-sm mb-2">Light / Icon</p>
                <?php component_badge('New Student', 'light', 'fa-user'); ?>
            </div>
            <div class="col-lg-4">
                <p class="eyebrow-sm mb-2">Dark / Icon</p>
                <?php component_badge('Campus Alert', 'dark', 'fa-bell'); ?>
            </div>
            <div class="col-lg-4">
                <p class="eyebrow-sm mb-2">Yellow / Icon</p>
                <?php component_badge('Apply Soon', 'yellow', 'fa-star'); ?>
            </div>
            <div class="col-lg-4">
                <p class="eyebrow-sm mb-2">Water / Icon</p>
                <?php component_badge('Campus Support', 'water', 'fa-life-ring'); ?>
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
                    <td>Text</td>
                    <td>string</td>
                    <td>Required</td>
                    <td>Visible badge label. The component does not render when Text is empty.</td>
                </tr>
                <tr>
                    <td>Style</td>
                    <td>string</td>
                    <td>light</td>
                    <td>Supported values are <code>light</code>, <code>dark</code>, <code>yellow</code>, and <code>water</code>. These map to <code>.bg-white .text-dark</code>, <code>.bg-dark .text-light</code>, <code>.bg-yellow-300 .text-dark</code>, and <code>.bg-surface-water .text-dark</code>.</td>
                </tr>
                <tr>
                    <td>Icon</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional Font Awesome icon name only, for example <code>fa-user</code> or <code>fa-star</code>. The component automatically prefixes it with <code>fa-sharp fa-regular</code>.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
