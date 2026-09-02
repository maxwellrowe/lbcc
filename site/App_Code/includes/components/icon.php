<section aria-labelledby="icon-heading" class="mt-5 mb-5">
    <h2 id="icon-heading">Icon</h2>
    <p class="text-body-secondary mb-4">A decorative Font Awesome icon that uses the existing font-size and text-color utility classes.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="bg-surface-subtle rounded p-4 mb-5">
        <div class="d-flex flex-wrap align-items-center gap-4">
            <?php component_icon('fa-graduation-cap'); ?>
            <?php component_icon('fa-book-open-cover', 'fs-3xl', 'text-dark'); ?>
            <?php component_icon('fa-heart', 'fs-5xl', 'text-danger'); ?>
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
                    <td>Icon</td>
                    <td>string</td>
                    <td>Required</td>
                    <td>Font Awesome icon name, for example <code>fa-graduation-cap</code>. The component supplies <code>fa-sharp fa-regular</code>.</td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td>string</td>
                    <td>fs-xl</td>
                    <td>Font-size utility class, such as <code>fs-lg</code>, <code>fs-3xl</code>, or <code>fs-5xl</code>.</td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>string</td>
                    <td>text-primary</td>
                    <td>Text-color utility class, such as <code>text-primary</code>, <code>text-danger</code>, or <code>text-dark</code>.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
