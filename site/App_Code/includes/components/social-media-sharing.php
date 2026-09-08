<section aria-labelledby="social-media-sharing-heading" class="mt-5 mb-5">
    <h2 id="social-media-sharing-heading">Social Media Sharing</h2>
    <p class="text-body-secondary mb-4">A platform-specific sharing component that reuses the Social Media component styling and builds each share link from a page URL and title.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="bg-surface-water rounded-4 p-4 mb-5">
        <div class="d-inline-flex align-items-center flex-wrap gap-2 rounded-pill px-3 py-2 bg-white">
            <span class="eyebrow-sm mb-0">Share</span>
            <span aria-hidden="true">/</span>
            <?php component_social_media_sharing(
                'https://www.lbcc.edu/news/example-story',
                'Example LBCC News Story',
                'dark',
                's'
            ); ?>
        </div>
    </div>

    <h3 class="h5 mb-3">Options</h3>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th scope="col">Field</th><th scope="col">Type</th><th scope="col">Default</th><th scope="col">Notes</th></tr></thead>
            <tbody>
                <tr><td>Page URL</td><td>string</td><td>Required</td><td>The complete URL that Facebook, X, LinkedIn, and Reddit will share.</td></tr>
                <tr><td>Page Title</td><td>string</td><td>empty</td><td>Added to the X and Reddit sharing links.</td></tr>
                <tr><td>Style</td><td>string</td><td>dark</td><td>Uses the Social Media options: <code>light</code>, <code>dark</code>, or <code>primary</code>.</td></tr>
                <tr><td>Size</td><td>string</td><td>s</td><td>Uses the Social Media options: <code>s</code>, <code>m</code>, or <code>l</code>.</td></tr>
                <tr><td>Additional wrapper classes</td><td>string or array</td><td>empty</td><td>Optional classes applied to the Social Media Sharing wrapper.</td></tr>
            </tbody>
        </table>
    </div>
</section>
