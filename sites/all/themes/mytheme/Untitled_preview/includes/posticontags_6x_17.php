<?php
function Untitled_preview_posticontags_6x_17() {
    global $bdnode_node;
    $terms = Untitled_preview_get_terms($bdnode_node);
    if (!empty($terms)) :
?>
    
    <div class="data-control-id-2649 bd-posticontags-17">
        <span class="data-control-id-2648 bd-icon-77"></span>
        <?php echo render($terms); ?>
    </div>
    
<?php
    endif;
}