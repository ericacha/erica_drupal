<?php
function Untitled_preview_posticontags_6x_30() {
    global $bdnode_node;
    $terms = Untitled_preview_get_terms($bdnode_node);
    if (!empty($terms)) :
?>
    
    <div class="data-control-id-1064252 bd-posticontags-30">
        <span class="data-control-id-1064251 bd-icon-45"></span>
        <?php echo render($terms); ?>
    </div>
    
<?php
    endif;
}