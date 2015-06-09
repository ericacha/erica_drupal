<?php
function Untitled_preview_posticontags_6x_32() {
    global $bdnode_node;
    $terms = Untitled_preview_get_terms($bdnode_node);
    if (!empty($terms)) :
?>
    
    <div class="data-control-id-87189 bd-posticontags-32">
        <span class="data-control-id-87188 bd-icon-31"></span>
        <?php echo render($terms); ?>
    </div>
    
<?php
    endif;
}