<?php
function Untitled_posticontags_6x_33() {
    global $bdnode_node;
    $terms = Untitled_get_terms($bdnode_node);
    if (!empty($terms)) :
?>
    
    <div class=" bd-posticontags-33">
        <span class=" bd-icon-57"></span>
        <?php echo render($terms); ?>
    </div>
    
<?php
    endif;
}