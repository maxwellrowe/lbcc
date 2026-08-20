<p>This snippet is in addition to the Card component. This version is more freeform and allows for mixed content rather than a structured content model.</p>

<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
    <div class="col">
        <div class="card h-100 border-primary-subtle bg-white">
            <img src="<?php echo lbcc_escape(lbcc_url('/_resources/images/lac-thumb.jpg')); ?>" alt="" class="card-img-top">
            <div class="card-body">
                <h3 class="h4">My Heading 2 Title</h3>
                <div class="bg-yellow-300 rounded-2 p-3 mb-3">
                    <h4 class="fs-6 my-0">Notification Title</h4>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam condimentum ornare eros, sit amet volutpat elit congue id.</p>
                <a href="#" class="btn btn-primary">Do Something</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 bg-surface-subtle border-0">
            <div class="card-body">
                <h3 class="h4">My Heading 2 Title</h3>
                <div class="bg-yellow-300 rounded-2 p-3 mb-3">
                    <h4 class="fs-6 my-0">Notification Title</h4>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam condimentum ornare eros, sit amet volutpat elit congue id.</p>
                <a href="#" class="btn btn-primary">Do Something</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 bg-sunhaze-gradient border-0">
            <div class="card-body p-5">
                <h3 class="h4">My Heading 2 Title</h3>
                <a href="#" class="btn btn-primary mb-3">Do Something</a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam condimentum ornare eros, sit amet volutpat elit congue id.</p>
                <img src="<?php echo lbcc_escape(lbcc_url('/_resources/images/lac-thumb.jpg')); ?>" alt="Students" class="rounded-2 img-fluid" />
            </div>
        </div>
    </div>
</div>

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
                    <td>Style</td>
                    <td>
                        <p>Baseline starter options:</p>
                        <ul class="mb-0">
                            <li>white</li>
                            <li>white with subtle border</li>
                            <li>surface subtle</li>
                            <li>sunhaze gradient</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>Orientation</td>
                    <td>
                        <p>Choose from vertical or horizontal layout patterns.</p>
                    </td>
                </tr>
                <tr>
                    <td>Match Height</td>
                    <td>
                        <p>Choose from <code>false</code> or <code>true</code>.</p>
                    </td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>
                        <p>Optional image path.</p>
                    </td>
                </tr>
                <tr>
                    <td>Padding</td>
                    <td>
                        <p>Enter shorthand CSS padding as an optional override.</p>
                    </td>
                </tr>
                <tr>
                    <td>Content</td>
                    <td>
                        <p class="mb-0">Visual editor content including HTML, snippets, or components.</p>
                    </td>
                </tr>
            </tbody>
        </table>
</div>
