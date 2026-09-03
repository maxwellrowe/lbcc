<section aria-labelledby="homepage-announcement-heading" class="mt-5 mb-5">
    <h2 id="homepage-announcement-heading">Homepage Announcement</h2>
    <p class="text-body-secondary mb-4">A homepage-only announcement intended to sit above the custom hero. It can technically be used on another page with a custom hero, but it is designed for the homepage placement. If needed later, its options can be supplied through homepage page parameters.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="position-relative py-5 mb-5">
        <?php component_homepage_announcement([
            'background' => 'linear-gradient(90deg, #64152b, #71320d, #574900, #10532f, #104c61, #20346e, #52265e)',
            'text_color' => 'light',
            'content' => '<h2 class="h5 m-0">Happy Pride Month from LBCC!</h2>',
            'cta' => [
                'text' => 'Join Us for Events',
                'url' => '#'
            ]
        ]); ?>
    </div>

    <h3 class="h5 mb-3">Options</h3>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr><th scope="col">Field</th><th scope="col">Type</th><th scope="col">Default</th><th scope="col">Notes</th></tr>
            </thead>
            <tbody>
                <tr><td>Background</td><td>string</td><td>empty</td><td>Optional custom CSS background applied directly to the <code>.card</code>, for example a linear gradient or color.</td></tr>
                <tr><td>Text Color</td><td>string</td><td>light</td><td>Use <code>light</code> or <code>dark</code>. The selected color applies to the card content, including headings.</td></tr>
                <tr><td>Content</td><td>HTML string</td><td>Required</td><td>Flexible content area; it can contain a heading, paragraph, or other inline markup.</td></tr>
                <tr><td>Call to Action</td><td>array</td><td>empty</td><td>Optional array with <code>text</code> and <code>url</code>. It renders as a small primary button.</td></tr>
            </tbody>
        </table>
    </div>
</section>
