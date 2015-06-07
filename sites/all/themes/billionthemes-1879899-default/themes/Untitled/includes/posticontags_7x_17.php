<?php
function Untitled_posticontags_7x_17() {
    global $bdnode_content;
    $terms = Untitled_display_terms($bdnode_content);
    if (!empty($terms)) :
?>
    
    <div class=" bd-posticontags-17">
        <span class=" bd-icon-77"></span>
        <?php echo $terms; ?>
    </div>
    
<?php
    endif;
}