<?php
$lbccMainNavId = $lbccMainNavId ?? 'lbcc-main-nav';
$lbccMainNavContext = $lbccMainNavContext ?? '';
$lbccMainNavItemPrefix = $lbccMainNavItemPrefix ?? ($lbccMainNavId . '__item');

$startAtLbccId = $lbccMainNavItemPrefix . '-start-at-lbcc';
$classesProgramsId = $lbccMainNavItemPrefix . '-classes-programs';
$supportId = $lbccMainNavItemPrefix . '-support';
$campusLifeId = $lbccMainNavItemPrefix . '-campus-life';
$aboutId = $lbccMainNavItemPrefix . '-about';
?>
<div
    id="<?php echo lbcc_escape($lbccMainNavId); ?>"
    class="lbcc-main-nav my-2 my-xl-0 d-xl-flex gap-xl-3 align-items-center justify-content-end"
    <?php if ($lbccMainNavContext !== '') { ?>data-lbcc-nav-context="<?php echo lbcc_escape($lbccMainNavContext); ?>"<?php } ?>
>
    <button 
        class="lbcc-main-nav__btn btn btn-link"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#<?php echo lbcc_escape($startAtLbccId); ?>"
        aria-expanded="false"
        aria-controls="<?php echo lbcc_escape($startAtLbccId); ?>"
    >
        Start at LBCC
    </button>
    <div class="lbcc-main-nav__item collapse bg-surface-sun-haze" id="<?php echo lbcc_escape($startAtLbccId); ?>">
        <div class="container-xxl">
            <div class="row row-cols-1 row-cols-xl-3 g-5 mb-4 mb-xl-0 p-0 py-4">
                <div class="col">
                    <div class="card rounded-5 border-0">
                        <div class="card-body">
                            <p class="h5 mb-3">Become a Viking</p>
                            <?php
                            component_buttons(
                                [
                                    [
                                        'style' => 'btn-primary',
                                        'text' => 'Apply Now',
                                        'url' => '#',
                                        'size' => '',
                                        'icon' => 'fa-arrow-up-right',
                                        'icon_position' => 'end'
                                    ]
                                ],
                                'row',
                                1
                            );
                            ?>
                            <div class="mt-3">
                                <?php component_block_arrow_link('#', '', '', 'How to Apply to LBCC', 'sm'); ?>
                            </div>
                        </div>
                        <div class="card-footer bg-teal-200 py-4">
                            <p class="eyebrow-sm">Special Admissions</p>
                            <?php component_block_arrow_link('#', '', '', 'International Students', 'sm'); ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="d-grid gap-4">
                        <span class="eyebrow-sm">Paying for College</span>
                        <?php component_block_arrow_link('#', '', '', 'How to Apply for Financial Aid', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'How to Apply for Scholarships', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Enrollment Costs & Fees', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Pay Your Fees (Cashier’s Office)', 'sm'); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="d-grid gap-4">
                        <span class="eyebrow-sm">Paying for College</span>
                        <?php component_block_arrow_link('#', '', '', 'Welcome Center', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Admissions & Records Office', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Financial Aid Office', 'sm'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button 
        class="lbcc-main-nav__btn btn btn-link"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#<?php echo lbcc_escape($classesProgramsId); ?>"
        aria-expanded="false"
        aria-controls="<?php echo lbcc_escape($classesProgramsId); ?>"
    >
        Classes &amp; Programs
    </button>
    <div class="lbcc-main-nav__item collapse bg-surface-sun-haze" id="<?php echo lbcc_escape($classesProgramsId); ?>">
        <div class="container-xxl">
            <div class="row row-cols-1 row-cols-xl-4 g-5 mb-4 mb-xl-0 p-0 py-4">

                <div class="col">
                    
                    <div class="card rounded-5 border-0">
                        <div class="card-body">
                            <div class="d-grid gap-4">
                                <span class="eyebrow-sm">Explore Our Programs</span>
                                <?php component_block_arrow_link('#', '', '', 'Find a Program based on your interests', 'sm'); ?>
                                <?php component_block_arrow_link('#', '', '', 'Explore Career Training Programs (CTE)', 'sm'); ?>
                            </div>
                        </div>
                        <div class="card-footer bg-teal-200 py-4">
                            <?php component_block_arrow_link('#', '', '', 'View All Degree & Certificate Programs', 'sm'); ?>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="d-grid gap-4">
                        <span class="eyebrow-sm">More Ways to Learn</span>
                        <?php component_block_arrow_link('#', '', '', 'Adult Education', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Online Learning', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Early College (High School Students)', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', '8-Week Accelerated', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'MyPath2ASU Program', 'sm'); ?>
                    </div>
                </div>

                <div class="col">
                    <div class="d-grid gap-4">
                        <span class="eyebrow-sm">Resources &amp; Opportunities</span>
                        <?php component_block_arrow_link('#', '', '', 'Learning Communities', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Library', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Honors Program', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Study Abroad', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Credit for Prior Learning', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Tutoring & Academic Resources', 'sm'); ?>
                    </div>
                </div>

                <div class="col">
                    <div class="d-grid gap-4">
                        <span class="eyebrow-sm">Planning Your Academics</span>
                        <?php component_block_arrow_link('#', '', '', 'Schedule of Classes', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Course Catalog', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Your Educational Plan', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Academic Calendar', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Registration Dates & Deadlines', 'sm'); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <button
        class="lbcc-main-nav__btn btn btn-link"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#<?php echo lbcc_escape($supportId); ?>"
        aria-expanded="false"
        aria-controls="<?php echo lbcc_escape($supportId); ?>"
    >
        Support
    </button>
    <div class="lbcc-main-nav__item collapse bg-surface-sun-haze" id="<?php echo lbcc_escape($supportId); ?>">
        <div class="container-xxl">
            <div class="row row-cols-1 row-cols-xl-4 g-5 mb-4 mb-xl-0 p-0 py-4">
                <div class="col">
                    <div class="d-grid gap-4">
                        <span class="eyebrow-sm">Student Services</span>
                        <?php component_block_arrow_link('#', '', '', 'Counseling', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Admission & Records', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Financial Aid', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Career Center', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Transfer Center', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Health & Wellness Services', 'sm'); ?>
                    </div>
                </div>

                <div class="col">
                    <div class="d-grid gap-4">
                        <span class="eyebrow-sm">Support for Your Needs</span>
                        <?php component_block_arrow_link('#', '', '', 'Explore all specialized support', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Basic Needs Programs', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Disabled Students Program & Services (DSPS)', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Extended Opportunities & Services (EOPS)', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Veterans Services', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'International Student Services', 'sm'); ?>
                    </div>
                </div>

                <div class="col">
                    <div class="d-grid gap-4">
                        <span class="eyebrow-sm">Help for Your Learning</span>
                        <?php component_block_arrow_link('#', '', '', 'Tutoring & Academic Resources', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Learning Communities', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Student Technology Help Desk', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Computer labs and printing services', 'sm'); ?>
                    </div>
                </div>

                <div class="col">
                    <div class="card rounded-5 border-0">
                        <div class="card-body">
                            <p class="h5 mb-3">Not sure where to start?</p>
                             <?php component_block_arrow_link('#', '', '', 'Explore All Support Services & Programs at LBCC'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button
        class="lbcc-main-nav__btn btn btn-link"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#<?php echo lbcc_escape($campusLifeId); ?>"
        aria-expanded="false"
        aria-controls="<?php echo lbcc_escape($campusLifeId); ?>"
    >
        Campus Life
    </button>
    <div class="lbcc-main-nav__item collapse bg-surface-sun-haze" id="<?php echo lbcc_escape($campusLifeId); ?>">
        <div class="container-xxl">
            <div class="row row-cols-1 row-cols-xl-4 g-5 mb-4 mb-xl-0 p-0 py-4">
                <div class="col">
                    <div class="d-grid gap-4">
                        <span class="eyebrow-sm">Around Campus</span>
                        <?php component_block_arrow_link('#', '', '', 'Bookstore', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Library', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Bakery and Bistro', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Art Gallery', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Social Justice Intercultural Center', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Child Development Center', 'sm'); ?>
                    </div>
                </div>

                <div class="col">
                    <div class="d-grid gap-4">
                        <span class="eyebrow-sm">Get Involved</span>
                        <?php component_block_arrow_link('#', '', '', 'Athletics', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'eSports', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Student Clubs', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Associated Student Body', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Cultural & Diversity Communities', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'The Arts', 'sm'); ?>
                    </div>
                </div>

                <div class="col">
                    <div class="d-grid gap-4">
                        <span class="eyebrow-sm">Happening at LBCC</span>
                        <?php component_block_arrow_link('#', '', '', 'News & Media', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Events & Calendars', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Commencement', 'sm'); ?>
                    </div>
                </div>

                <div class="col">
                    <div class="d-grid gap-4">
                        <span class="eyebrow-sm">Campus Resources</span>
                        <?php component_block_arrow_link('#', '', '', 'Office of Student Affairs', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Campus Safety', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Campus Parking', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Maps', 'sm'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button
        class="lbcc-main-nav__btn btn btn-link"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#<?php echo lbcc_escape($aboutId); ?>"
        aria-expanded="false"
        aria-controls="<?php echo lbcc_escape($aboutId); ?>"
    >
        About
    </button>
    <div class="lbcc-main-nav__item collapse bg-surface-sun-haze" id="<?php echo lbcc_escape($aboutId); ?>">
        <div class="container-xxl">
            <div class="row row-cols-1 row-cols-xl-4 g-5 mb-4 mb-xl-0 p-0 py-4">
                <div class="col-12 col-xl-3">
                    <div class="d-grid gap-4">
                        <span class="eyebrow-sm">Learn More About LBCC</span>
                        <?php component_block_arrow_link('#', '', '', 'Overview & History', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Mission & Values', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Facts & Figures', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Accreditation', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Strategic Plan', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Foundation', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Employee Recognition', 'sm'); ?>
                    </div>
                </div>

                <div class="col-12 col-xl-3">
                    <div class="d-grid gap-4">
                        <span class="eyebrow-sm">Leadership</span>
                        <?php component_block_arrow_link('#', '', '', 'Board of Trustees', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Office of the President', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Participatory Governance', 'sm'); ?>
                    </div>
                    <div class="d-grid gap-4 mt-5">
                        <span class="eyebrow-sm">Explore our Campuses</span>
                        <?php component_block_arrow_link('#', '', '', 'Campus Maps', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Liberal Arts Campus', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Trades, Technology, and Community Learning Campus', 'sm'); ?>
                        <?php component_block_arrow_link('#', '', '', 'North Long Beach Center', 'sm'); ?>
                    </div>
                </div>

                <div class="col-12 col-xl-6">
                    <span class="eyebrow-sm mb-4 d-block">Campus Offices</span>
                    <div class="row row-cols-1 row-cols-xl-2">
                        <div class="col">
                            <div class="d-grid gap-4">
                                <?php component_block_arrow_link('#', '', '', 'Academic Services', 'sm'); ?>
                                <?php component_block_arrow_link('#', '', '', 'Administrative & Business Services', 'sm'); ?>
                                <?php component_block_arrow_link('#', '', '', 'Event & Filming Services', 'sm'); ?>
                                <?php component_block_arrow_link('#', '', '', 'Human Resources', 'sm'); ?>
                                <?php component_block_arrow_link('#', '', '', 'Office of Innovation', 'sm'); ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-grid gap-4">
                                <?php component_block_arrow_link('#', '', '', 'Information Technology Services', 'sm'); ?>
                                <?php component_block_arrow_link('#', '', '', 'Institutional Effectiveness', 'sm'); ?>
                                <?php component_block_arrow_link('#', '', '', 'Public Affairs & Marketing', 'sm'); ?>
                                <?php component_block_arrow_link('#', '', '', 'Student Services', 'sm'); ?>
                                <?php component_block_arrow_link('#', '', '', 'Workforce & Economic Development', 'sm'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
