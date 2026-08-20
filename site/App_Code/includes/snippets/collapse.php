<p>This snippet allows a user to create a link or button that opens collapsed content. This can use button styles or just a text link.</p>

<div class="d-flex flex-column gap-3 justify-content-start align-items-start">
    <button class="btn btn-link p-0" type="button" data-bs-toggle="collapse" data-bs-target="#snippet-collapse-1" aria-expanded="false" aria-controls="snippet-collapse-1">
        Example Collapse <span class="fa-sharp fa-regular fa-plus" aria-hidden="true"></span>
    </button>
    <div class="collapse mt-2" id="snippet-collapse-1">
        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae tellus vitae leo maximus efficitur sit amet eget urna. Praesent porttitor arcu at auctor rutrum.</p>
    </div>

    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#snippet-collapse-2" aria-expanded="false" aria-controls="snippet-collapse-2">
        Example Collapse <span class="fa-sharp fa-regular fa-plus" aria-hidden="true"></span>
    </button>
    <div class="collapse mt-2" id="snippet-collapse-2">
        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae tellus vitae leo maximus efficitur sit amet eget urna. Praesent porttitor arcu at auctor rutrum.</p>
    </div>

    <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#snippet-collapse-3" aria-expanded="false" aria-controls="snippet-collapse-3">
        Example Collapse <span class="fa-sharp fa-regular fa-plus" aria-hidden="true"></span>
    </button>
    <div class="collapse mt-2" id="snippet-collapse-3">
        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae tellus vitae leo maximus efficitur sit amet eget urna. Praesent porttitor arcu at auctor rutrum.</p>
    </div>
</div>

<h3 class="h5 mb-3 mt-4">Options</h3>
<div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">Field</th>
                    <th scope="col">Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Button Type</td>
                    <td>
                        <p>Refer to the Style Guide for button types and sizes, including link styling such as <code>btn-link p-0</code>.</p>
                    </td>
                </tr>
                <tr>
                    <td>Button Text</td>
                    <td>Text field.</td>
                </tr>
                <tr>
                    <td>Content</td>
                    <td>WYSIWYG content.</td>
                </tr>
            </tbody>
        </table>
</div>
