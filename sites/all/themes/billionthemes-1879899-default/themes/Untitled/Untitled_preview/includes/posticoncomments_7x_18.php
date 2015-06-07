<?php
function Untitled_preview_posticoncomments_7x_18() {
    global $bdnode_content;
    $links = Untitled_preview_get_links($bdnode_content, true);
    if (!empty($links)) :
?>
    
    <div class="data-control-id-2658 bd-posticoncomments-18">
        <span class="data-control-id-2657 bd-icon-78"></span>
        <?php echo $links; ?>
    </div>
    
<?php
    endif;
}