<p>With Carousel Anything, any type of content, snippet, or component can be added and displayed as a grouped carousel. This starter page uses a static mixed-content layout as the baseline before we wire the reusable carousel behavior.</p>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
    <div class="col">
        <div class="card h-100 border-primary-subtle">
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
        <div class="list-group h-100">
            <a href="#" class="list-group-item list-group-item-action">
                <strong class="d-block">List Group Title</strong>
                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam condimentum ornare eros.</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action">Sign Up for a Zoom Session</a>
            <a href="#" class="list-group-item list-group-item-action">Submit the Financial Aid Contact Form</a>
            <a href="#" class="list-group-item list-group-item-action">Schedule a Virtual Appointment</a>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 bg-surface-subtle border-0">
            <div class="card-body">
                <h3 class="h4">Mixed Content Example</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam condimentum ornare eros, sit amet volutpat elit congue id.</p>
                <ul class="mb-4">
                    <li><a href="#">Lorem Ipsum</a></li>
                    <li><a href="#">Lorem Ipsum</a></li>
                    <li><a href="#">Lorem Ipsum</a></li>
                </ul>
                <img src="<?php echo lbcc_escape(lbcc_url('/_resources/images/lac-thumb.jpg')); ?>" alt="" class="img-fluid rounded-2">
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
                    <td>Mobile # of Items</td>
                    <td><p>Numeral, usually 1 for mobile.</p></td>
                </tr>
                <tr>
                    <td>Tablet # of Items</td>
                    <td><p>Numeral.</p></td>
                </tr>
                <tr>
                    <td>Desktop # of Items</td>
                    <td><p>Numeral. Default is typically 3.</p></td>
                </tr>
                <tr>
                    <td>Autoplay?</td>
                    <td><p><code>true</code> or <code>false</code>.</p></td>
                </tr>
            </tbody>
        </table>
</div>
