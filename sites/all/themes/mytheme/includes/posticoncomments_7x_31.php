<?php
function Untitled_posticoncomments_7x_31() {
    global $bdnode_content;
    $links = Untitled_get_links($bdnode_content, true);
    if (!empty($links)) :
?>
    
    <div class=" bd-posticoncomments-31">
        <span class=" bd-icon-15"></span>
        <?php echo $links; ?>
    </div>
    
<?php
    endif;
}