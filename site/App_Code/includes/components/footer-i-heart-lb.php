<section aria-labelledby="footer-i-heart-lb-heading" class="mt-5">
    <p class="eyebrow mb-2">Component</p>
    <h2 id="footer-i-heart-lb-heading">Footer "I Heart LB"</h2>
    <p class="text-body-secondary mb-4">Animated footer lockup that uses SVG artwork for the <strong>I</strong>, rotating heart, and <strong>LB</strong>. The default heart set comes from the project artwork folder, and the middle heart area is Swiper-ready with autoplay plus a pause/play control.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="bg-dark rounded p-4 p-lg-5 mb-5 text-white">
        <?php component_footer_i_heart_lb(); ?>
    </div>

    <p class="mb-4">Original heart artwork source: <a class="link-primary" href="<?php echo lbcc_escape(lbcc_url('_resources/images/i-heart-lb/hearts.ai')); ?>">/&#95;resources/images/i-heart-lb/hearts.ai</a></p>

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
                    <td>Hearts</td>
                    <td>array</td>
                    <td>Project default set</td>
                    <td>Accepts an array of SVG paths or item arrays with <code>src</code> and optional <code>alt</code>. When omitted, the component uses the default heart artwork from <code>/_resources/images/i-heart-lb/</code>.</td>
                </tr>
                <tr>
                    <td>Autoplay</td>
                    <td>behavior</td>
                    <td>enabled</td>
                    <td>The heart slider autoplays on page load using a fade transition. Reduced-motion users start in the paused state.</td>
                </tr>
                <tr>
                    <td>Pause / Play Control</td>
                    <td>behavior</td>
                    <td>enabled</td>
                    <td>Absolute-positioned button over the heart area that lets the user pause or resume the slider.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
