<?php
function Untitled_posticoncomments_7x_36() {
    global $bdnode_content;
    $links = Untitled_get_links($bdnode_content, true);
    if (!empty($links)) :
?>
    
    <div class=" bd-posticoncomments-36">
        <span class=" bd-icon-81"></span>
        <?php echo $links; ?>
    </div>
    
<?php
    endif;
}