<?php
$supportMatrixData = lbcc_support_matrix_load_data(dirname(dirname(__DIR__)) . '/data/support-matrix.json');
$supportMatrixItems = $supportMatrixData['items'];
$supportMatrixNeeds = $supportMatrixData['needs'];
$supportMatrixAudiences = $supportMatrixData['audiences'];
?>
<section aria-labelledby="support-matrix-heading" class="mt-5 mb-5">
    <h2 id="support-matrix-heading">Support Matrix</h2>
    <p class="text-body-secondary mb-4">A responsive card grid for student support services with optional filtering by audience and support need. This implementation uses Bootstrap cards, badges, form controls, and tooltips as the foundation, with only a light component layer on top.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="mb-5 d-grid gap-5">
        <div>
            <p class="eyebrow-sm mb-2">Default / Filters On</p>
            <?php
            component_support_matrix(
                $supportMatrixItems,
                'Explore Support Services',
                true,
                $supportMatrixNeeds,
                $supportMatrixAudiences,
                [],
                [],
                1,
                2,
                3
            );
            ?>
        </div>

        <div>
            <p class="eyebrow-sm mb-2">Prefiltered / Student Parent + Financial Assistance</p>
            <?php
            component_support_matrix(
                $supportMatrixItems,
                'Support For Student Parents',
                false,
                $supportMatrixNeeds,
                $supportMatrixAudiences,
                ['Financial Assistance'],
                ['Student Parent'],
                1,
                2,
                2
            );
            ?>
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
                    <td>Items</td>
                    <td>array</td>
                    <td>Required</td>
                    <td>Array of support resource definitions. Each item accepts Title, Description, URL, Needs, and Audiences.</td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td>string</td>
                    <td>Support Matrix</td>
                    <td>Optional heading shown above the filters and card grid.</td>
                </tr>
                <tr>
                    <td>Show Filtering</td>
                    <td>boolean</td>
                    <td>true</td>
                    <td>Turns the filter shell on or off.</td>
                </tr>
                <tr>
                    <td>Need Options</td>
                    <td>array</td>
                    <td>derived from Items</td>
                    <td>Optional ordered list of available What You Need filter labels. Icons for these values are mapped centrally in the component function.</td>
                </tr>
                <tr>
                    <td>Audience Options</td>
                    <td>array</td>
                    <td>derived from Items</td>
                    <td>Optional ordered list of available Who You Are filter labels.</td>
                </tr>
                <tr>
                    <td>Prefilter Needs</td>
                    <td>array</td>
                    <td>empty</td>
                    <td>Optional array of What You Need labels used to limit the items shown by default.</td>
                </tr>
                <tr>
                    <td>Prefilter Audiences</td>
                    <td>array</td>
                    <td>empty</td>
                    <td>Optional array of Who You Are labels used to limit the items shown by default.</td>
                </tr>
                <tr>
                    <td>Mobile Per Row</td>
                    <td>integer</td>
                    <td>1</td>
                    <td>Uses Bootstrap <code>row-cols-*</code> utilities. Supported values are 1 through 6.</td>
                </tr>
                <tr>
                    <td>Tablet Per Row</td>
                    <td>integer</td>
                    <td>2</td>
                    <td>Uses Bootstrap <code>row-cols-md-*</code> utilities. Supported values are 1 through 6.</td>
                </tr>
                <tr>
                    <td>Desktop Per Row</td>
                    <td>integer</td>
                    <td>3</td>
                    <td>Uses Bootstrap <code>row-cols-xl-*</code> utilities. Supported values are 1 through 6.</td>
                </tr>
                <tr>
                    <td>Item Title</td>
                    <td>string</td>
                    <td>Required</td>
                    <td>Primary support resource title shown at the top of each card.</td>
                </tr>
                <tr>
                    <td>Item Description</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Supporting summary text for the resource.</td>
                </tr>
                <tr>
                    <td>Item URL</td>
                    <td>string</td>
                    <td>empty</td>
                    <td>Optional destination URL for the title link.</td>
                </tr>
                <tr>
                    <td>Item Needs</td>
                    <td>array</td>
                    <td>empty</td>
                    <td>List of What You Need labels. Each value renders as a tooltip icon on the card and can be used for filtering.</td>
                </tr>
                <tr>
                    <td>Item Audiences</td>
                    <td>array</td>
                    <td>empty</td>
                    <td>List of Who You Are labels. Each value renders as a badge and can be used for filtering.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
