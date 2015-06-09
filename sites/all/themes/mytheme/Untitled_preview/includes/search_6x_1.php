<?php

function Untitled_preview_search_6x_1() {
    global $bdpage_search_box;
    if (isset($bdpage_search_box)) :
        $search_box_id = 'search-theme-form';
        $search_box_button = variable_get('search_theme_form_submit', null);
        $search_box_input = variable_get('search_theme_form_input', null);
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
    <?php print variable_get('search_theme_form_hidden', null); ?>
<?php
        $output = ob_get_clean();
        $pattern = '/<form(.*?>)(.*?)(<\/form>)/si';
        print preg_replace($pattern, '<form class="data-control-id-1249 bd-search-3 form-inline"$1'.$output.'$3', $search_box_form);
    endif;
}