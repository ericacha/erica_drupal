<?php
function Untitled_posticontags_6x_7() {
    global $bdnode_node;
    $terms = Untitled_get_terms($bdnode_node);
    if (!empty($terms)) :
?>
    
    <div class=" bd-posticontags-7">
        <span class=" bd-icon-60"></span>
        <?php echo render($terms); ?>
    </div>
    
<?php
    endif;
}