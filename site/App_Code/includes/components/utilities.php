<section class="mb-5" aria-labelledby="utilities-heading">
    <h2 id="utilities-heading">Utilities (AKA Component Advanced Options)</h2>
    <p>The following can be applied to most any component. For each component build, these can act as the shared <strong>Advanced Options</strong> wrapper around the core component output.</p>
    <pre class="bg-surface-raised p-3 rounded"><code>&lt;div class="[Match Height] [Custom Class] [lbcc-animate lbcc-fade-up] [lbcc-delay-100] [lbcc-duration-500]" style="padding: [Padding]; margin: [Margin];"&gt;
  &lt;p&gt;Component code here...&lt;/p&gt;
&lt;/div&gt;</code></pre>
    <p><strong>Advanced Options</strong></p>
    <ul class="mb-4">
        <li>Match Height</li>
        <li>Animation</li>
        <li>Padding</li>
        <li>Margin</li>
        <li>Custom Class</li>
    </ul>

    <h3 class="h4 mb-3">Match Height</h3>
    <p><strong>Options:</strong></p>
    <div class="table-responsive mb-4">
        <table class="table">
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Function</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>match-height-none</td>
                    <td>Default, no height matching is applied.</td>
                </tr>
                <tr>
                    <td>match-height-row</td>
                    <td>Matches the height of elements in the same visual row.</td>
                </tr>
                <tr>
                    <td>match-height-all</td>
                    <td>Matches the height of all elements on the page with this class.</td>
                </tr>
            </tbody>
        </table>
    </div>
    <p><strong>Example:</strong> Only the first item below has an explicit height set.</p>
    <div class="row mb-5 g-3">
        <div class="col-md-4">
            <div class="bg-surface-water match-height-row rounded p-4" style="height: 150px; min-height: 150px;"></div>
        </div>
        <div class="col-md-4">
            <div class="bg-surface-water match-height-row rounded p-4" style="min-height: 150px;"></div>
        </div>
        <div class="col-md-4">
            <div class="bg-surface-water match-height-row rounded p-4" style="min-height: 150px;"></div>
        </div>
    </div>

    <h3 class="h4 mb-3">Animation</h3>
    <p>We are using Motion for scroll-triggered animation, with Intersection Observer handling viewport entry behind the scenes. Classes are applied to the wrapper element rather than data attributes.</p>
    <p><strong>Animation Classes:</strong></p>
    <div class="table-responsive mb-4">
        <table class="table">
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Function</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>lbcc-animate lbcc-fade-up</td>
                    <td>Fade up animation.</td>
                </tr>
                <tr>
                    <td>lbcc-animate lbcc-fade-left</td>
                    <td>Fade in from the left.</td>
                </tr>
                <tr>
                    <td>lbcc-animate lbcc-fade-right</td>
                    <td>Fade in from the right.</td>
                </tr>
                <tr>
                    <td>lbcc-animate lbcc-scale</td>
                    <td>Subtle scale and fade animation.</td>
                </tr>
                <tr>
                    <td>lbcc-animate lbcc-stagger</td>
                    <td>Staggers direct children as they enter the viewport.</td>
                </tr>
            </tbody>
        </table>
    </div>
    <p><strong>Delay and Duration Classes:</strong></p>
    <div class="table-responsive mb-4">
        <table class="table">
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Function</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>lbcc-delay-100</td>
                    <td>100ms start delay.</td>
                </tr>
                <tr>
                    <td>lbcc-delay-200</td>
                    <td>200ms start delay.</td>
                </tr>
                <tr>
                    <td>lbcc-delay-300</td>
                    <td>300ms start delay.</td>
                </tr>
                <tr>
                    <td>lbcc-duration-300</td>
                    <td>300ms animation duration.</td>
                </tr>
                <tr>
                    <td>lbcc-duration-500</td>
                    <td>500ms animation duration.</td>
                </tr>
                <tr>
                    <td>lbcc-duration-700</td>
                    <td>700ms animation duration.</td>
                </tr>
            </tbody>
        </table>
    </div>
    <p><strong>Examples:</strong></p>
    <div class="row mb-3 g-3">
        <div class="col-md-6 col-lg-3">
            <p class="eyebrow-sm mb-2">Fade Up</p>
            <div class="bg-surface-raised rounded p-4 lbcc-animate lbcc-fade-up" style="min-height: 150px;"></div>
        </div>
        <div class="col-md-6 col-lg-3">
            <p class="eyebrow-sm mb-2">Fade Left</p>
            <div class="bg-surface-water rounded p-4 lbcc-animate lbcc-fade-left lbcc-delay-100" style="min-height: 150px;"></div>
        </div>
        <div class="col-md-6 col-lg-3">
            <p class="eyebrow-sm mb-2">Fade Right</p>
            <div class="bg-surface-sun-haze rounded p-4 lbcc-animate lbcc-fade-right lbcc-delay-200" style="min-height: 150px;"></div>
        </div>
        <div class="col-md-6 col-lg-3">
            <p class="eyebrow-sm mb-2">Scale</p>
            <div class="bg-surface-raised rounded p-4 lbcc-animate lbcc-scale lbcc-delay-300 lbcc-duration-700" style="min-height: 150px;"></div>
        </div>
    </div>
    <div class="mb-5">
        <p class="eyebrow-sm mb-2">Stagger</p>
        <div class="row g-3 lbcc-animate lbcc-stagger lbcc-duration-500">
            <div class="col-md-4">
                <div class="bg-surface-raised rounded p-4" style="min-height: 150px;"></div>
            </div>
            <div class="col-md-4">
                <div class="bg-surface-water rounded p-4" style="min-height: 150px;"></div>
            </div>
            <div class="col-md-4">
                <div class="bg-surface-sun-haze rounded p-4" style="min-height: 150px;"></div>
            </div>
        </div>
    </div>

    <h3 class="h4 mb-3">Padding, Margin And Custom Class</h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Option</th>
                    <th>Field</th>
                    <th>Function</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Padding</td>
                    <td>Text Field</td>
                    <td>Add padding to the wrapper style attribute in shorthand form, for example <code>1rem 2rem</code>.</td>
                </tr>
                <tr>
                    <td>Margin</td>
                    <td>Text Field</td>
                    <td>Add margin to the wrapper style attribute in shorthand form, for example <code>1rem 2rem</code>.</td>
                </tr>
                <tr>
                    <td>Custom Class</td>
                    <td>Text Field</td>
                    <td>Add one or more custom classes to the component wrapper, space separated.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
