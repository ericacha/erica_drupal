<?php
function Untitled_posticontags_7x_32() {
    global $bdnode_content;
    $terms = Untitled_display_terms($bdnode_content);
    if (!empty($terms)) :
?>
    
    <div class=" bd-posticontags-32">
        <span class=" bd-icon-31"></span>
        <?php echo $terms; ?>
    </div>
    
<?php
    endif;
}