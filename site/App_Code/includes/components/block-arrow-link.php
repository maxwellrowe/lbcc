<section aria-labelledby="block-arrow-link-heading">
    <p class="eyebrow mb-2">Component</p>
    <h2 id="block-arrow-link-heading">Block Arrow Link</h2>
    <p class="text-body-secondary mb-4">A directional link pattern for content blocks, cards, and utility callouts. This page shows the current markup function in a few practical configurations before we layer in the component-specific CSS.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="bg-surface-subtle rounded p-4 mb-5">
        <div class="row g-4">
            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Default / Dark</p>
                <?php component_block_arrow_link('#', 'fa-unicorn', '', 'Explore Admissions'); ?>
            </div>
            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Small / Dark</p>
                <?php component_block_arrow_link('#', 'fa-unicorn', '', 'Review Financial Aid', 'sm'); ?>
            </div>
            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Large / Dark</p>
                <?php component_block_arrow_link('#', 'fa-unicorn', '', 'Connect With Student Support', 'lg'); ?>
            </div>
            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Large / Light</p>
                <div class="bg-surface-inverse rounded p-4">
                    <?php component_block_arrow_link('#', 'fa-unicorn', '', 'Visit Campus Resources', 'lg', 'light'); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Default / Image</p>
                <?php component_block_arrow_link('#', '', '_resources/images/lac-thumb.jpg', 'Explore Long Beach City College'); ?>
            </div>
            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Small / Image</p>
                <?php component_block_arrow_link('#', '', '_resources/images/lac-thumb.jpg', 'Read The Latest Update', 'sm'); ?>
            </div>
            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Large / Image</p>
                <?php component_block_arrow_link('#', '', '_resources/images/lac-thumb.jpg', 'Discover Featured Campus Stories', 'lg'); ?>
            </div>
            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Large / Light / Image</p>
                <div class="bg-surface-inverse rounded p-4">
                    <?php component_block_arrow_link('#', '', '_resources/images/lac-thumb.jpg', 'See The Highlighted Feature', 'lg', 'light'); ?>
                </div>
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
                    <td>Link</td>
                    <td>string</td>
                    <td>#</td>
                    <td>Destination URL for the anchor output.</td>
                </tr>
                <tr>
                    <td>Icon</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional Font Awesome icon class. Use instead of Image when the component should lead with an icon.</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional image path used for image-based variants.</td>
                </tr>
                <tr>
                    <td>Text</td>
                    <td>string</td>
                    <td>Required</td>
                    <td>Required link label and the primary content value for the component.</td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td>string</td>
                    <td>default</td>
                    <td>Size modifier. Supported values are default, sm, and lg.</td>
                </tr>
                <tr>
                    <td>Style</td>
                    <td>string</td>
                    <td>dark</td>
                    <td>Style modifier. Supported values are dark and light.</td>
                </tr>
                <tr>
                    <td>Variation Notes</td>
                    <td colspan="3">Use either Icon or Image at the leading edge. If both are supplied, the current function prioritizes Icon.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
