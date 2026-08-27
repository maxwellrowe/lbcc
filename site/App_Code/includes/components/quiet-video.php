<section aria-labelledby="quiet-video-heading" class="mt-5 mb-5">
    <h2 id="quiet-video-heading">Quiet Video</h2>
    <p class="text-body-secondary mb-4">A simple autoplaying video component for ambient media moments. It uses the same rounded media shell and pause control treatment as the fade slider, but keeps the video at 100% width with natural height based on the asset.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8">
                <?php
                component_quiet_video(
                    '_resources/video/homepage/lbcc_athletics.mp4',
                    '_resources/images/hero-backgrounds/hero-bg-11.jpg',
                    true,
                    true
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
                    <td>Video</td>
                    <td>string</td>
                    <td>Required</td>
                    <td>Local video path rendered in a muted <code>video</code> element.</td>
                </tr>
                <tr>
                    <td>Poster</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional poster image shown before playback begins or if autoplay is interrupted.</td>
                </tr>
                <tr>
                    <td>Autoplay</td>
                    <td>boolean</td>
                    <td>true</td>
                    <td>Controls whether the video attempts to begin playback on load. Reduced motion users will still see it paused initially.</td>
                </tr>
                <tr>
                    <td>Loop</td>
                    <td>boolean</td>
                    <td>true</td>
                    <td>Keeps the video cycling continuously when enabled.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
