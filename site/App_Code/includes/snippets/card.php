<p>A Card Well is a flexible <code>.card</code> wrapper for trusted editorial content, supporting components, or small layout groups. Build it directly with markup and apply the background, padding, and other Bootstrap utilities needed for that use.</p>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-3">
    <div class="col">
        <div class="card rounded-4 h-100 border-0 bg-surface-subtle p-4">
            <h3 class="h4 mb-2">bg-surface-subtle</h3>
            <p class="mb-0">Use this well for mixed editorial content, supporting components, or small layout groupings.</p>
        </div>
    </div>

    <div class="col">
        <div class="card rounded-4 h-100 border-0 bg-surface-raised p-4">
            <h3 class="h4 mb-2">bg-surface-raised</h3>
            <p class="mb-0">Place text, lists, badges, buttons, or another component directly inside the well.</p>
        </div>
    </div>

    <div class="col">
        <div class="card rounded-4 h-100 border-0 bg-surface-water p-4">
            <h3 class="h4 mb-2">bg-surface-water</h3>
            <p class="mb-0">A soft background option for related information or a compact callout.</p>
        </div>
    </div>

    <div class="col">
        <div class="card rounded-4 h-100 border-0 bg-surface-sun-haze p-4">
            <h3 class="h4 mb-2">bg-surface-sun-haze</h3>
            <p class="mb-0">Use a Card Well to visually group richer content without imposing a card component structure.</p>
        </div>
    </div>

    <div class="col">
        <div class="card rounded-4 h-100 border-0 bg-water-gradient p-4">
            <h3 class="h4 mb-2">bg-water-gradient</h3>
            <p class="mb-0">The gradient option works well when a section needs a little more visual emphasis.</p>
        </div>
    </div>
</div>

<h3 class="h5 mb-3 mt-4">Options</h3>
<div class="table-responsive">
    <table class="table align-middle">
        <thead>
            <tr>
                <th scope="col">Field</th>
                <th scope="col">Notes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Custom Classes</td>
                <td>Apply Bootstrap or project classes directly to the <code>.card</code> wrapper, such as <code>rounded-4</code>, <code>shadow-sm</code>, or <code>h-100</code>.</td>
            </tr>
            <tr>
                <td>Background Color</td>
                <td>
                    <ul class="mb-0">
                        <li><code>bg-surface-subtle</code></li>
                        <li><code>bg-surface-raised</code></li>
                        <li><code>bg-surface-water</code></li>
                        <li><code>bg-surface-sun-haze</code></li>
                        <li><code>bg-water-gradient</code></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Background CSS</td>
                <td>Optional shorthand background CSS for a one-off treatment. This overrides the selected background class.</td>
            </tr>
            <tr>
                <td>Padding</td>
                <td>Apply Bootstrap padding utilities such as <code>p-3</code>, <code>p-4</code>, or <code>px-5 py-4</code>.</td>
            </tr>
            <tr>
                <td>Content</td>
                <td>Any trusted HTML, snippet, or component placed directly inside the Card Well.</td>
            </tr>
        </tbody>
    </table>
</div>
