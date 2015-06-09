<?php

function Untitled_preview_search_7x_1() {
    global $bdpage_search_box;
    if (isset($bdpage_search_box)) :
        if (isset($bdpage_search_box['basic']['keys']['#theme_wrappers'])) {
            unset($bdpage_search_box['basic']['keys']['#theme_wrappers']);
        }
        if (isset($bdpage_search_box['basic']['#theme_wrappers'])) {
            unset($bdpage_search_box['basic']['#theme_wrappers']);
        }
        $search_box_id = $bdpage_search_box['#id'];
        $search_box_button = render($bdpage_search_box['basic']['submit']);
        $search_box_input = render($bdpage_search_box['basic']['keys']);
        $search_box_form = render($bdpage_search_box);
ob_start();        
?>
    <div class="bd-container-inner">
    <div class="bd-search-wrapper">
        
            <?php print render($search_box_input) ?>
            <a href="#" class="data-control-id-1248 bd-icon-37" link-disable="true"></a>
    </div>
</div>
<script>
    (function (jQuery, $) {
        jQuery('.bd-search-3 .bd-icon-37').bind('click', function (e) {
            e.preventDefault();
            jQuery('#<?php print $search_box_id ?>').submit();
        });
    })(window._$, window._$);
</script>
<?php
    $output = ob_get_clean();
    $pattern = '/(<form.*?>)/i';
    print preg_replace($pattern, '$1'.$output, $search_box_form);
    endif;
}