<?php
function Untitled_posticoncategory_7x_33() {
    global $bdnode_content;
    $links = Untitled_get_links($bdnode_content);
    if (!empty($links)) :
?>
        
        <div class=" bd-posticoncategory-33">
            <span class=" bd-icon-45"></span>
            <?php echo $links; ?>
        </div>
        
<?php
    endif;
}