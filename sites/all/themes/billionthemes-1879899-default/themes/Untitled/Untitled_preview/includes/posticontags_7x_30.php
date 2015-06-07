<?php
function Untitled_preview_posticontags_7x_30() {
    global $bdnode_content;
    $terms = Untitled_preview_display_terms($bdnode_content);
    if (!empty($terms)) :
?>
    
    <div class="data-control-id-1064252 bd-posticontags-30">
        <span class="data-control-id-1064251 bd-icon-45"></span>
        <?php echo $terms; ?>
    </div>
    
<?php
    endif;
}