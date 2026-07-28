<?php
$lbccMainNavId = $lbccMainNavId ?? 'lbcc-main-nav';
$lbccMainNavContext = $lbccMainNavContext ?? '';
$lbccMainNavItemPrefix = $lbccMainNavItemPrefix ?? ($lbccMainNavId . '__item');

$startAtLbccId = $lbccMainNavItemPrefix . '-start-at-lbcc';
$classesProgramsId = $lbccMainNavItemPrefix . '-classes-programs';
?>
<div
    id="<?php echo lbcc_escape($lbccMainNavId); ?>"
    class="my-2 my-xl-0 d-xl-flex gap-xl-3 align-items-center justify-content-end"
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
            <div class="row">
                <div class="col-12 col-xl-4">

                </div>
                <div class="col-12 col-xl-4">
                    <div class="d-grid gap-3 py-4">
                        <span class="eyebrow-sm">Paying for College</span>
                        <?php component_block_arrow_link('#', '', '', 'How to Apply for Financial Aid'); ?>
                        <?php component_block_arrow_link('#', '', '', 'How to Apply for Scholarships'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Enrollment Costs & Fees'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Pay Your Fees (Cashier’s Office)'); ?>
                    </div>
                </div>
                <div class="col-12 col-xl-4">

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
            <div class="row">
                <div class="col-12 col-xl-4">

                </div>
                <div class="col-12 col-xl-4">
                    <div class="d-grid gap-3 py-4">
                        <span class="eyebrow-sm">Paying for College</span>
                        <?php component_block_arrow_link('#', '', '', 'How to Apply for Financial Aid'); ?>
                        <?php component_block_arrow_link('#', '', '', 'How to Apply for Scholarships'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Enrollment Costs & Fees'); ?>
                        <?php component_block_arrow_link('#', '', '', 'Pay Your Fees (Cashier’s Office)'); ?>
                    </div>
                </div>
                <div class="col-12 col-xl-4">

                </div>
            </div>
        </div>
    </div>
</div>
