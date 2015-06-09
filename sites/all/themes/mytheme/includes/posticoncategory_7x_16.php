<?php
function Untitled_posticoncategory_7x_16() {
    global $bdnode_content;
    $links = Untitled_get_links($bdnode_content);
    if (!empty($links)) :
?>
        
        <div class=" bd-posticoncategory-16">
            <span class=" bd-icon-76"></span>
            <?php echo $links; ?>
        </div>
        
<?php
    endif;
}