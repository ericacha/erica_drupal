<?php
function Untitled_posticontags_7x_30() {
    global $bdnode_content;
    $terms = Untitled_display_terms($bdnode_content);
    if (!empty($terms)) :
?>
    
    <div class=" bd-posticontags-30">
        <span class=" bd-icon-45"></span>
        <?php echo $terms; ?>
    </div>
    
<?php
    endif;
}