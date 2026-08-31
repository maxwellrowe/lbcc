<section aria-labelledby="social-media-heading" class="mt-5 mb-5">
    <h2 id="social-media-heading">Social Media</h2>
    <p class="text-body-secondary mb-4">A flexible, wrapping row of accessible social-media links using Font Awesome Brands icons.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="row g-4 mb-5">
        <div class="col-lg-6">
            <div class="bg-teal-800 rounded-4 p-4">
                <p class="eyebrow-sm text-white mb-3">Light / Medium</p>
                <?php component_social_media(
                    [
                        ['link' => 'https://www.instagram.com/lbcitycollege', 'icon' => 'fa-instagram', 'sr_label' => 'LBCC on Instagram'],
                        ['link' => 'https://www.facebook.com/lbcitycollege', 'icon' => 'fa-facebook', 'sr_label' => 'LBCC on Facebook'],
                        ['link' => 'https://x.com/LBCityCollege', 'icon' => 'fa-x-twitter', 'sr_label' => 'LBCC on X'],
                        ['link' => 'https://www.youtube.com/user/LongBeachCityCollege', 'icon' => 'fa-youtube', 'sr_label' => 'LBCC on YouTube']
                    ],
                    'light',
                    'm'
                ); ?>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="bg-surface-subtle rounded-4 p-4">
                <p class="eyebrow-sm mb-3">Dark / Large</p>
                <?php component_social_media(
                    [
                        ['link' => 'https://www.tiktok.com/@longbeachcitycollege', 'icon' => 'fa-tiktok', 'sr_label' => 'LBCC on TikTok'],
                        ['link' => 'https://www.linkedin.com', 'icon' => 'fa-linkedin', 'sr_label' => 'LBCC on LinkedIn']
                    ],
                    'dark',
                    'l'
                ); ?>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="bg-surface-subtle rounded-4 p-4">
                <p class="eyebrow-sm mb-3">Primary / Small</p>
                <?php component_social_media(
                    [
                        ['link' => 'https://www.instagram.com/lbcitycollege', 'icon' => 'fa-instagram', 'sr_label' => 'LBCC on Instagram'],
                        ['link' => 'https://www.facebook.com/lbcitycollege', 'icon' => 'fa-facebook', 'sr_label' => 'LBCC on Facebook'],
                        ['link' => 'https://x.com/LBCityCollege', 'icon' => 'fa-x-twitter', 'sr_label' => 'LBCC on X']
                    ],
                    'primary',
                    's'
                ); ?>
            </div>
        </div>
    </div>

    <h3 class="h5 mb-3">Options</h3>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th scope="col">Field</th><th scope="col">Type</th><th scope="col">Default</th><th scope="col">Notes</th></tr></thead>
            <tbody>
                <tr><td>Items</td><td>array</td><td>Required</td><td>Each item requires <code>link</code>, <code>icon</code>, and <code>sr_label</code>. Optional <code>target</code> controls whether the link opens in a new tab.</td></tr>
                <tr><td>Style</td><td>string</td><td>light</td><td><code>light</code> displays white icons; <code>dark</code> displays gray-900 icons; <code>primary</code> displays primary icons and changes to secondary on hover.</td></tr>
                <tr><td>Size</td><td>string</td><td>m</td><td>Supported values are <code>s</code>, <code>m</code>, and <code>l</code>.</td></tr>
                <tr><td>Icon</td><td>string</td><td>Required</td><td>Font Awesome Brands class, such as <code>fa-instagram</code> or <code>fa-youtube</code>.</td></tr>
                <tr><td>SR Label</td><td>string</td><td>Required</td><td>Accessible label announced to screen-reader users.</td></tr>
            </tbody>
        </table>
    </div>
</section>
