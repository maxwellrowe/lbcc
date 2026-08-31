<section class="mb-5" id="section-background-video">
    <div class="container-xxl">
        <h2>Section with Background Video</h2>
    </div>
</section>

<section class="snippet-section-background-video bg-surface-subtle py-5">
    <div class="snippet-section-background-video__media" aria-hidden="true">
        <video autoplay muted loop playsinline poster="<?php echo lbcc_escape(lbcc_url('_resources/images/hero-backgrounds/hero-bg-3.jpg')); ?>">
            <source src="<?php echo lbcc_escape(lbcc_url('_resources/video/hero-backgrounds/hero-bg-3.mp4')); ?>" type="video/mp4">
        </video>
    </div>
    <div class="snippet-section-background-video__overlay" aria-hidden="true"></div>

    <div class="container-xxl snippet-section-background-video__content">
        <div class="row">
            <div class="col-12">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae sem sed justo tincidunt imperdiet. Donec vel luctus dolor, sit amet pretium neque.</p>
                <p>Integer eget sapien sed augue sagittis dictum. Nulla facilisi. Curabitur porttitor, urna vitae placerat tincidunt, mauris mi tristique lorem, at finibus erat risus sed nunc.</p>
                <p class="mb-0">Vivamus consequat, lectus sed varius tristique, magna purus feugiat massa, sed venenatis velit neque at mauris. Aliquam erat volutpat.</p>
            </div>
        </div>
    </div>
</section>

<section class="mb-5">
    <div class="container-xxl">
        <h3 class="h5 mb-3 mt-4">Options</h3>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">Field</th>
                        <th scope="col">Values</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Background Class</td>
                        <td><p class="mb-0">Use the same section backgrounds: <code>bg-surface-subtle</code>, <code>bg-surface-raised</code>, <code>bg-surface-water</code>, <code>bg-surface-sun-haze</code>, <code>bg-teal-200</code>, <code>bg-teal-800</code>, or <code>bg-water-gradient</code>.</p></td>
                    </tr>
                    <tr>
                        <td>Content</td>
                        <td><p class="mb-0">Place any content inside the <code>container-xxl</code> and keep it within the left <code>col-lg-6</code>.</p></td>
                    </tr>
                    <tr>
                        <td>Video</td>
                        <td><p class="mb-0">Use any video from <code>_resources/video/hero-backgrounds/</code>, with a matching image from <code>_resources/images/hero-backgrounds/</code> as its poster. The teal overlay is included in the snippet styling.</p></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
