<?php
function Untitled_preview_posticontags_6x_7() {
    global $bdnode_node;
    $terms = Untitled_preview_get_terms($bdnode_node);
    if (!empty($terms)) :
?>
    
    <div class="data-control-id-2168 bd-posticontags-7">
        <span class="data-control-id-2167 bd-icon-60"></span>
        <?php echo render($terms); ?>
    </div>
    
<?php
    endif;
}