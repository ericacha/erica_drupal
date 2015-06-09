<?php
function Untitled_posticontags_6x_12() {
    global $bdnode_node;
    $terms = Untitled_get_terms($bdnode_node);
    if (!empty($terms)) :
?>
    
    <div class=" bd-posticontags-12">
        <span class=" bd-icon-69"></span>
        <?php echo render($terms); ?>
    </div>
    
<?php
    endif;
}