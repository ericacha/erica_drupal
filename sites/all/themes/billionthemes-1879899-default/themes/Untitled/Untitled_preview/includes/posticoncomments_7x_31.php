<?php
function Untitled_preview_posticoncomments_7x_31() {
    global $bdnode_content;
    $links = Untitled_preview_get_links($bdnode_content, true);
    if (!empty($links)) :
?>
    
    <div class="data-control-id-77824 bd-posticoncomments-31">
        <span class="data-control-id-77823 bd-icon-15"></span>
        <?php echo $links; ?>
    </div>
    
<?php
    endif;
}