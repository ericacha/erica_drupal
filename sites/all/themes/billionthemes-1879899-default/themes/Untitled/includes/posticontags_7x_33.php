<?php
function Untitled_posticontags_7x_33() {
    global $bdnode_content;
    $terms = Untitled_display_terms($bdnode_content);
    if (!empty($terms)) :
?>
    
    <div class=" bd-posticontags-33">
        <span class=" bd-icon-57"></span>
        <?php echo $terms; ?>
    </div>
    
<?php
    endif;
}