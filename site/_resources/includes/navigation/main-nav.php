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
            <div class="row g-5 mb-4 mb-xl-0 p-0 py-4">
                <div class="col-12 col-xl-4">
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
                                <?php component_block_arrow_link('#', '', '', 'How to Apply to LBCC'); ?>
                            </div>
                        </div>
                        <div class="card-footer bg-teal-200 py-4">
                            <p class="eyebrow-sm">Special Admissions</p>
                            <?php component_block_arrow_link('#', '', '', 'International Students'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="d-grid gap-3">
                        <span class="eyebrow-sm">Paying for College</span>
                        <?php component_block_arrow_link('#', '', '', 'How to Apply for Financial Aid'); ?>
                        <?php component_block_arrow_link('#', '', '', 'How to Apply for Scholarships'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Enrollment Costs & Fees'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Pay Your Fees (Cashier’s Office)'); ?>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="d-grid gap-3">
                        <span class="eyebrow-sm">Paying for College</span>
                        <?php component_block_arrow_link('#', '', '', 'Welcome Center'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Admissions & Records Office'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Financial Aid Office'); ?>
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
            <div class="py-5">Classes &amp; Programs Navigation Here...</div>
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
            <div class="py-5">Support Navigation Here...</div>
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
            <div class="py-5">Campus Life Navigation Here...</div>
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
            <div class="py-5">About Navigation Here...</div>
        </div>
    </div>
</div>
