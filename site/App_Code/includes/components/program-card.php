<section aria-labelledby="program-card-heading" class="mt-5 mb-5">
    <h2 id="program-card-heading">Programs</h2>
    <p class="text-body-secondary mb-4">This component lets an editor insert a program listing filtered by Career and Academic Pathway. It can display matching Program Cards in either a responsive grid or a carousel using the Carousel Anything controls.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="mb-5">
        <p class="eyebrow-sm mb-2">Grid / Arts, Language &amp; Communication</p>
        <?php component_programs('Arts, Language & Communication', 'grid', 1, 2, 3); ?>
    </div>

    <div class="mb-5">
        <p class="eyebrow-sm mb-2">Carousel / Business, Management &amp; Entrepreneurship</p>
        <?php component_programs('Business, Management & Entrepreneurship', 'carousel', 1, 2, 3, true); ?>
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
                    <td>Filter</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional filter by Career &amp; Academic Pathway (CAP), department, or program options.</td>
                </tr>
                <tr>
                    <td>Display</td>
                    <td>string</td>
                    <td>grid</td>
                    <td>Supported values are <code>grid</code> and <code>carousel</code>.</td>
                </tr>
                <tr>
                    <td>Mobile / Tablet / Desktop Items</td>
                    <td>integer</td>
                    <td>1 / 2 / 3</td>
                    <td>Controls the number of visible cards at each breakpoint for both display modes.</td>
                </tr>
                <tr>
                    <td>Autoplay</td>
                    <td>boolean</td>
                    <td>false</td>
                    <td>Enables carousel autoplay when the display is <code>carousel</code>.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
