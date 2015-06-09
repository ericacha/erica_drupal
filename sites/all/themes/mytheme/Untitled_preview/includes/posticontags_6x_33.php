<?php
function Untitled_preview_posticontags_6x_33() {
    global $bdnode_node;
    $terms = Untitled_preview_get_terms($bdnode_node);
    if (!empty($terms)) :
?>
    
    <div class="data-control-id-1064286 bd-posticontags-33">
        <span class="data-control-id-1064285 bd-icon-57"></span>
        <?php echo render($terms); ?>
    </div>
    
<?php
    endif;
}