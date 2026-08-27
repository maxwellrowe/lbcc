<section aria-labelledby="program-card-heading" class="mt-5 mb-5">
    <h2 id="program-card-heading">Programs</h2>
    <p class="text-body-secondary mb-4">This component will allow an editor to insert a program listing filtered by Department, Career and Academic Pathway, and Program Options. Under the hood it uses the Program Card pattern based on the Figma “Program Card Alt” component, but the editor-facing implementation is the broader Programs listing rather than a single stand-alone card.</p>

    <h3 class="h5 mb-3">Example</h3>
    <div class="mb-5">

        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
            <div class="col">
                <?php
                component_program_card(
                    'https://lbcc-public.courseleaf.com/degrees-certificates/american-sign-language-deaf-studies/',
                    'American Sign Language and Deaf Studies',
                    '_resources/images/hero-backgrounds/hero-bg-8.jpg',
                    ['AA', 'C-ACH'],
                    'Language & Communication',
                    'Language Arts'
                );
                ?>
            </div>

            <div class="col">
                <?php
                component_program_card(
                    'https://lbcc-public.courseleaf.com/degrees-certificates/english/',
                    'English',
                    '_resources/images/hero-backgrounds/hero-bg-11.jpg',
                    ['AA', 'AA-T'],
                    'Language & Communication',
                    'Language Arts'
                );
                ?>
            </div>

            <div class="col">
                <?php
                component_program_card(
                    'https://lbcc-public.courseleaf.com/degrees-certificates/film-television-electronic-media/',
                    'Film, Television & Electronic Media',
                    '_resources/images/hero-backgrounds/hero-bg-12.jpg',
                    ['AA', 'C-ACH'],
                    'Language & Communication',
                    'Language Arts'
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
                    <td>Mobile Columns</td>
                    <td>integer</td>
                    <td>1</td>
                    <td>Controls the number of program cards shown per row on mobile using Bootstrap <code>row-cols-*</code> utilities.</td>
                </tr>
                <tr>
                    <td>Tablet Columns</td>
                    <td>integer</td>
                    <td>2</td>
                    <td>Controls the number of program cards shown per row on tablet using Bootstrap <code>row-cols-md-*</code> utilities.</td>
                </tr>
                <tr>
                    <td>Desktop Columns</td>
                    <td>integer</td>
                    <td>3</td>
                    <td>Controls the number of program cards shown per row on desktop using Bootstrap <code>row-cols-xl-*</code> or <code>row-cols-xxl-*</code> utilities, depending on the page implementation.</td>
                </tr>
                <tr>
                    <td>Filter by Department</td>
                    <td>array</td>
                    <td>empty</td>
                    <td>Optional list of Department values used to prefilter the available programs.</td>
                </tr>
                <tr>
                    <td>Filter by Career and Academic Pathway</td>
                    <td>array</td>
                    <td>empty</td>
                    <td>Optional list of Career and Academic Pathway values used to prefilter the available programs.</td>
                </tr>
                <tr>
                    <td>Filter by Program Options</td>
                    <td>array</td>
                    <td>empty</td>
                    <td>Optional list of Program Option values such as <code>AS-T</code>, <code>C-ACH</code>, or <code>C-ACC</code> used to prefilter the available programs.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
