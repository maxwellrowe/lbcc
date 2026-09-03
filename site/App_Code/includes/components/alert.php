<section aria-labelledby="alert-heading" class="mt-5 mb-5">
    <h2 id="alert-heading">Alert</h2>
    <p class="text-body-secondary mb-4">A dismissible Bootstrap alert for global or inline notices. Global alerts span the page above the header; inline alerts use rounded corners and can appear within page content.</p>

    <h3 class="h5 mb-3">Examples</h3>
    <div class="d-grid gap-4 mb-5">
        <?php component_alert(
            'Campus Update',
            '<p class="mb-0">The Liberal Arts Campus will be closed for a scheduled maintenance window this Saturday.</p>',
            'info',
            'fa-circle-info',
            ['text' => 'View Campus Updates', 'url' => '#', 'class' => 'btn btn-outline-primary btn-sm'],
            true,
            '',
            '',
            true,
            'September 2, 2026'
        ); ?>
        <?php component_alert(
            'Important Information',
            '<p class="mb-0">Registration for the upcoming term opens April 1. Review your registration appointment before enrolling.</p>',
            'info',
            'fa-circle-info',
            ['text' => 'Registration Details', 'url' => '#', 'class' => 'btn btn-outline-primary btn-sm']
        ); ?>
        <?php component_alert(
            'Action Needed',
            '<p class="mb-0">Financial aid documents are due soon. Submit any requested materials before the deadline to avoid a delay.</p>',
            'warning',
            'fa-triangle-exclamation',
            ['text' => 'Review Financial Aid', 'url' => '#', 'class' => 'btn btn-primary btn-sm']
        ); ?>
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
                <tr><td>Title</td><td>string</td><td>empty</td><td>Optional alert heading.</td></tr>
                <tr><td>Content</td><td>HTML string</td><td>empty</td><td>Alert body content. Paragraphs can use Bootstrap spacing utilities such as <code>mb-0</code>.</td></tr>
                <tr><td>Variation</td><td>string</td><td>info</td><td>Supported values: <code>emergency</code> (Bootstrap danger), <code>info</code>, and <code>warning</code>. Info alerts use the teal-100 background treatment.</td></tr>
                <tr><td>Icon</td><td>string</td><td>empty</td><td>Optional Font Awesome icon name, for example <code>fa-circle-info</code>.</td></tr>
                <tr><td>Call to Action</td><td>array</td><td>empty</td><td>Optional array with <code>text</code>, <code>url</code>, and <code>class</code>. It aligns right on desktop and below the content on tablet and mobile.</td></tr>
                <tr><td>Enabled</td><td>boolean</td><td>true</td><td>Set to <code>false</code> to prevent the alert from rendering.</td></tr>
                <tr><td>Start / End Date</td><td>string</td><td>empty</td><td>Optional <code>YYYY-MM-DD</code> or date/time values. The alert only renders within that inclusive date window.</td></tr>
                <tr><td>Global</td><td>boolean</td><td>false</td><td>Set to <code>true</code> for a full-width, square-cornered alert intended above the header.</td></tr>
                <tr><td>Date Label</td><td>string</td><td>empty</td><td>Optional visible date shown above the title for global alerts.</td></tr>
            </tbody>
        </table>
    </div>
</section>
