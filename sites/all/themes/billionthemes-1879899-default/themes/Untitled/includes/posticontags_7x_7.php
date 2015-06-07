<?php
function Untitled_posticontags_7x_7() {
    global $bdnode_content;
    $terms = Untitled_display_terms($bdnode_content);
    if (!empty($terms)) :
?>
    
    <div class=" bd-posticontags-7">
        <span class=" bd-icon-60"></span>
        <?php echo $terms; ?>
    </div>
    
<?php
    endif;
}