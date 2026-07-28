<?php
$googleTranslateModalId = $googleTranslateModalId ?? 'googleTranslateModal';
$googleTranslateModalLabelId = $googleTranslateModalId . 'Label';
$googleTranslateWrapperId = $googleTranslateModalId . 'Wrapper';
?>
<div class="modal fade" id="<?php echo lbcc_escape($googleTranslateModalId); ?>" tabindex="-1" aria-labelledby="<?php echo lbcc_escape($googleTranslateModalLabelId); ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="<?php echo lbcc_escape($googleTranslateModalLabelId); ?>" class="modal-title fs-5">Translate this page</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-body-secondary mb-3">Choose a language to translate this page.</p>
                <div id="<?php echo lbcc_escape($googleTranslateWrapperId); ?>" class="gtranslate_wrapper notranslate"></div>
            </div>
        </div>
    </div>
</div>

<div id="gtranslate-return-og" class="position-fixed bottom-0 start-0 p-3 d-none" data-lbcc-translate-toast-container>
    <div class="border-0 shadow p-2 rounded bg-white d-flex align-items-center justify-content-start gap-2">
        <span class="fa-sharp fa-regular fa-language"></span>
        <div class="fs-8 fw-bold">Site Translated</div>
        <button type="button" class="btn btn-link btn-sm p-0 text-decoration-none" data-lbcc-translate-reset>View Original</button>
    </div>
</div>

<?php if (!defined('LBCC_GOOGLE_TRANSLATE_WIDGET_LOADED')) {
    define('LBCC_GOOGLE_TRANSLATE_WIDGET_LOADED', true);
    ?>
    <script>
        window.gtranslateSettings = {
            default_language: "en",
            native_language_names: true,
            languages: ["en", "ko", "es", "zh-CN", "vi", "tl"],
            wrapper_selector: "#<?php echo lbcc_escape($googleTranslateWrapperId); ?>"
        };
    </script>
    <script src="https://cdn.gtranslate.net/widgets/latest/dropdown.js" defer></script>
<?php } ?>
