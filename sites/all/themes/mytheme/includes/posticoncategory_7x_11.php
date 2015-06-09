<?php
function Untitled_posticoncategory_7x_11() {
    global $bdnode_content;
    $links = Untitled_get_links($bdnode_content);
    if (!empty($links)) :
?>
        
        <div class=" bd-posticoncategory-11">
            <span class=" bd-icon-68"></span>
            <?php echo $links; ?>
        </div>
        
<?php
    endif;
}