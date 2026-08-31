<section aria-labelledby="video-modal-heading" class="mt-5 mb-5">
    <h2 id="video-modal-heading">Video Modal</h2>
    <p class="text-body-secondary mb-4">An image-led video trigger that opens a YouTube embed in a Bootstrap modal.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="mb-5" style="max-width: 843px;">
        <?php
        component_video_modal(
            '_resources/images/hero-backgrounds/hero-bg-3.jpg',
            '<iframe src="https://www.youtube.com/embed/ScMzIvxBSi4" title="Accounting at LBCC" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
            'Accounting at LBCC'
        );
        ?>
    </div>

    <h3 class="h5 mb-3">Options</h3>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">Field</th>
                    <th scope="col">Type</th>
                    <th scope="col">Required</th>
                    <th scope="col">Notes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Image</td>
                    <td>string</td>
                    <td>Yes</td>
                    <td>Image path used for the trigger. Any image dimensions are supported; it fills the trigger with <code>object-fit: cover</code>.</td>
                </tr>
                <tr>
                    <td>YouTube Video Embed Code</td>
                    <td>HTML string</td>
                    <td>Yes</td>
                    <td>Trusted YouTube <code>&lt;iframe&gt;</code> embed markup placed inside the Bootstrap modal.</td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td>string</td>
                    <td>No</td>
                    <td>Displays as the image label and names the modal for assistive technology.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
