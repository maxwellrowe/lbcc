<section aria-labelledby="card-as-link-heading" class="mt-5 mb-5">
    <h2 id="card-as-link-heading">Card as Link</h2>
    <p class="text-body-secondary mb-4">A fully clickable card pattern that uses Bootstrap card markup as the baseline, then layers in the image-overlay and bordered CTA variants from the design system. This keeps the structure familiar for implementation while still supporting the custom visual treatments.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="mb-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 gx-4 gy-5">
            <div class="col">
                <p class="eyebrow-sm mb-2">Image Background</p>
                <?php
                component_card_as_link(
                    '#',
                    'Costs of LBCC',
                    'Learn about what you need to pay for as an LBCC student.',
                    'image-bg',
                    '_resources/images/hero-backgrounds/hero-bg-7.jpg',
                    'Here Is A Label'
                );
                ?>
            </div>
            <div class="col">
                <p class="eyebrow-sm mb-2">Image Background / No Image</p>
                <?php
                component_card_as_link(
                    '#',
                    'Start your application journey',
                    'Get the overview of what to do first, what to prepare, and where to go next.',
                    'image-bg',
                    '',
                    'Admissions'
                );
                ?>
            </div>
            <div class="col">
                <p class="eyebrow-sm mb-2">Primary Border / Thin</p>
                <?php
                component_card_as_link(
                    '#',
                    'View the college\'s resident and non-resident cost estimates',
                    '',
                    'primary-border-thin',
                    '_resources/images/hero-backgrounds/hero-bg-4.jpg'
                );
                ?>
            </div>
            <div class="col">
                <p class="eyebrow-sm mb-2">Primary Border / Thick</p>
                <?php
                component_card_as_link(
                    '#',
                    'Explore tuition, fees, and related enrollment costs',
                    '',
                    'primary-border-thick',
                    '_resources/images/hero-backgrounds/hero-bg-10.jpg'
                );
                ?>
            </div>
            <div class="col">
                <p class="eyebrow-sm mb-2">Teal Border / Thin</p>
                <?php
                component_card_as_link(
                    '#',
                    'Review available student support resources and next steps',
                    '',
                    'teal-border-thin',
                    '_resources/images/hero-backgrounds/hero-bg-13.jpg'
                );
                ?>
            </div>
            <div class="col">
                <p class="eyebrow-sm mb-2">Teal Border / Thick</p>
                <?php
                component_card_as_link(
                    '#',
                    'Connect with services that can help you get started',
                    '',
                    'teal-border-thick',
                    '_resources/images/hero-backgrounds/hero-bg-16.jpg'
                );
                ?>
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
                    <td>The component is always wrapped in an anchor, so this is the destination URL for the full card.</td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Main card heading output as an <code>h2</code>.</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional supporting copy. Most relevant for the image background variant.</td>
                </tr>
                <tr>
                    <td>Style</td>
                    <td>string</td>
                    <td>image-bg</td>
                    <td>Supported values are <code>image-bg</code>, <code>primary-border-thin</code>, <code>primary-border-thick</code>, <code>teal-border-thin</code>, and <code>teal-border-thick</code>.</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional image path. For <code>image-bg</code>, this becomes the card background image. For bordered variants, it renders as a top image similar to <code>card-img-top</code>. If the <code>image-bg</code> style has no image, it falls back to a teal 800 background.</td>
                </tr>
                <tr>
                    <td>Label</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional small label displayed in the upper-left area of the <code>image-bg</code> style.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
