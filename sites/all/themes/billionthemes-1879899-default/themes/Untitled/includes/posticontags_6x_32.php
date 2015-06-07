<?php
function Untitled_posticontags_6x_32() {
    global $bdnode_node;
    $terms = Untitled_get_terms($bdnode_node);
    if (!empty($terms)) :
?>
    
    <div class=" bd-posticontags-32">
        <span class=" bd-icon-31"></span>
        <?php echo render($terms); ?>
    </div>
    
<?php
    endif;
}