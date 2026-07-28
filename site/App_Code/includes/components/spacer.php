<section aria-labelledby="spacer-heading" class="mt-5">
    <p class="eyebrow mb-2">Component</p>
    <h2 id="spacer-heading">Spacer</h2>
    <p class="text-body-secondary mb-4">A simple spacing component for inserting consistent vertical rhythm between content blocks. The spacer uses <code>cs-*</code> classes, where <code>cs-1</code> equals <code>1rem</code> of height and <code>cs-10</code> equals <code>10rem</code>.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="bg-surface-subtle rounded p-4 mb-5">
        <div class="row g-4">
            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Common Spacer Sizes</p>
                <div class="bg-white rounded border p-4">
                    <p class="mb-0 fw-semibold">Content above</p>
                    <?php component_spacer(1); ?>
                    <div class="bg-surface-water border rounded d-flex align-items-center justify-content-center small text-body-secondary">cs-1</div>

                    <?php component_spacer(2); ?>
                    <div class="bg-surface-water border rounded d-flex align-items-center justify-content-center small text-body-secondary">cs-2</div>

                    <?php component_spacer(3); ?>
                    <div class="bg-surface-water border rounded d-flex align-items-center justify-content-center small text-body-secondary">cs-3</div>

                    <?php component_spacer(5); ?>
                    <div class="bg-surface-water border rounded d-flex align-items-center justify-content-center small text-body-secondary">cs-5</div>
                </div>
            </div>
            <div class="col-lg-6">
                <p class="eyebrow-sm mb-2">Large Spacer</p>
                <div class="bg-white rounded border p-4">
                    <p class="mb-0 fw-semibold">Section intro</p>
                    <?php component_spacer(10); ?>
                    <div class="bg-surface-sun-haze border rounded d-flex align-items-center justify-content-center small text-body-secondary">cs-10</div>
                    <p class="mb-0 mt-3 fw-semibold">Content after a dramatic break</p>
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
                    <td>Size</td>
                    <td>integer</td>
                    <td>3</td>
                    <td>Supported values are <code>1</code> through <code>10</code>. The function outputs <code>cs-*</code> classes, where the numeric value maps directly to rem height.</td>
                </tr>
                <tr>
                    <td>Generated Class</td>
                    <td>string</td>
                    <td>cs-3</td>
                    <td><code>cs-1</code> equals <code>1rem</code>, <code>cs-2</code> equals <code>2rem</code>, continuing through <code>cs-10</code> at <code>10rem</code>.</td>
                </tr>
                <tr>
                    <td>Markup Output</td>
                    <td>HTML</td>
                    <td>div</td>
                    <td>The component renders a decorative spacer <code>div</code> with <code>aria-hidden="true"</code>.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
