<?php
function Untitled_posticontags_6x_30() {
    global $bdnode_node;
    $terms = Untitled_get_terms($bdnode_node);
    if (!empty($terms)) :
?>
    
    <div class=" bd-posticontags-30">
        <span class=" bd-icon-45"></span>
        <?php echo render($terms); ?>
    </div>
    
<?php
    endif;
}