<?php
function Untitled_posticoncomments_7x_8() {
    global $bdnode_content;
    $links = Untitled_get_links($bdnode_content, true);
    if (!empty($links)) :
?>
    
    <div class=" bd-posticoncomments-8">
        <span class=" bd-icon-61"></span>
        <?php echo $links; ?>
    </div>
    
<?php
    endif;
}