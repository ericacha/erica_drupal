<?php
function Untitled_posticoncomments_7x_13() {
    global $bdnode_content;
    $links = Untitled_get_links($bdnode_content, true);
    if (!empty($links)) :
?>
    
    <div class=" bd-posticoncomments-13">
        <span class=" bd-icon-70"></span>
        <?php echo $links; ?>
    </div>
    
<?php
    endif;
}