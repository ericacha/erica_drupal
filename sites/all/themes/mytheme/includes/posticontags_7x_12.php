<?php
function Untitled_posticontags_7x_12() {
    global $bdnode_content;
    $terms = Untitled_display_terms($bdnode_content);
    if (!empty($terms)) :
?>
    
    <div class=" bd-posticontags-12">
        <span class=" bd-icon-69"></span>
        <?php echo $terms; ?>
    </div>
    
<?php
    endif;
}