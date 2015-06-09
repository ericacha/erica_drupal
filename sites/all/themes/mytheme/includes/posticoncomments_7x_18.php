<?php
function Untitled_posticoncomments_7x_18() {
    global $bdnode_content;
    $links = Untitled_get_links($bdnode_content, true);
    if (!empty($links)) :
?>
    
    <div class=" bd-posticoncomments-18">
        <span class=" bd-icon-78"></span>
        <?php echo $links; ?>
    </div>
    
<?php
    endif;
}