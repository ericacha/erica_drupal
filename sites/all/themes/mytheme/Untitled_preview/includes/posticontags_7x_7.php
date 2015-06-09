<?php
function Untitled_preview_posticontags_7x_7() {
    global $bdnode_content;
    $terms = Untitled_preview_display_terms($bdnode_content);
    if (!empty($terms)) :
?>
    
    <div class="data-control-id-2168 bd-posticontags-7">
        <span class="data-control-id-2167 bd-icon-60"></span>
        <?php echo $terms; ?>
    </div>
    
<?php
    endif;
}