<?php
function Untitled_posticoncategory_7x_6() {
    global $bdnode_content;
    $links = Untitled_get_links($bdnode_content);
    if (!empty($links)) :
?>
        
        <div class=" bd-posticoncategory-6">
            <span class=" bd-icon-59"></span>
            <?php echo $links; ?>
        </div>
        
<?php
    endif;
}