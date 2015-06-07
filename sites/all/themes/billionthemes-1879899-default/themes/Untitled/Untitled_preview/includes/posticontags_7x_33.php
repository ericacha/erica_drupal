<?php
function Untitled_preview_posticontags_7x_33() {
    global $bdnode_content;
    $terms = Untitled_preview_display_terms($bdnode_content);
    if (!empty($terms)) :
?>
    
    <div class="data-control-id-1064286 bd-posticontags-33">
        <span class="data-control-id-1064285 bd-icon-57"></span>
        <?php echo $terms; ?>
    </div>
    
<?php
    endif;
}