<?php
function Untitled_posticontags_6x_17() {
    global $bdnode_node;
    $terms = Untitled_get_terms($bdnode_node);
    if (!empty($terms)) :
?>
    
    <div class=" bd-posticontags-17">
        <span class=" bd-icon-77"></span>
        <?php echo render($terms); ?>
    </div>
    
<?php
    endif;
}