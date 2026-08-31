<section aria-labelledby="search-programs-heading" class="mt-5 mb-5">
    <h2 id="search-programs-heading">Search Programs</h2>
    <p class="text-body-secondary mb-4">A searchable program select field populated from the programs data source. Selecting a program opens the placeholder program detail template.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="mb-5 col-lg-8 px-0">
        <?php component_search_programs(); ?>
    </div>

    <h3 class="h5 mb-3">Options</h3>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th scope="col">Field</th><th scope="col">Type</th><th scope="col">Default</th><th scope="col">Notes</th></tr></thead>
            <tbody>
                <tr><td>Programs</td><td>array</td><td><code>programs.json</code></td><td>Optional program records with <code>title</code> and <code>url</code> values. When omitted, the component loads <code>App_Code/data/programs.json</code>.</td></tr>
                <tr><td>Label</td><td>string</td><td>Search Programs</td><td>The visible label for the field.</td></tr>
                <tr><td>Placeholder</td><td>string</td><td>Start typing to search programs...</td><td>Guides a visitor before they begin searching.</td></tr>
            </tbody>
        </table>
    </div>
</section>
