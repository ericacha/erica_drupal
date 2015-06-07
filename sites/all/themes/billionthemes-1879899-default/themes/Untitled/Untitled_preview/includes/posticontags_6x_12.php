<?php
function Untitled_preview_posticontags_6x_12() {
    global $bdnode_node;
    $terms = Untitled_preview_get_terms($bdnode_node);
    if (!empty($terms)) :
?>
    
    <div class="data-control-id-2343 bd-posticontags-12">
        <span class="data-control-id-2342 bd-icon-69"></span>
        <?php echo render($terms); ?>
    </div>
    
<?php
    endif;
}