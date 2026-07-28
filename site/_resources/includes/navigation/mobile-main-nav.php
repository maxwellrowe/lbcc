<?php include __DIR__ . '/main-nav.php'; ?>

<div class="card bg-surface-base rounded-5 border-0 mb-3">
    <div class="card-body">
        <h2 class="eyebrow-sm mb-4">Our Campuses</h2>
        <div class="d-flex gap-3 flex-column">
            <?php component_block_arrow_link('#', '', '_resources/images/ttc-thumb.jpg', 'Trades, Technology, and Community Learning Campus (TTC)', 'sm'); ?>
            <?php component_block_arrow_link('#', '', '_resources/images/lac-thumb.jpg', 'Liberal Arts Campus (LAC)', 'sm'); ?>
        </div>
    </div>
</div>

<div>
    <button class="btn btn-outline-primary btn-icon btn-icon-start w-100" type="button" data-bs-toggle="modal" data-bs-target="#googleTranslateModal">
        <span class="btn-icon-label w-100">Translate Site</span>
        <span class="btn-icon-addon">
            <span class="btn-icon-badge fa-sharp fa-regular fa-language" aria-hidden="true"></span>
        </span>
    </button>
</div>