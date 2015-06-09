<?php
function Untitled_preview_posticoncomments_7x_36() {
    global $bdnode_content;
    $links = Untitled_preview_get_links($bdnode_content, true);
    if (!empty($links)) :
?>
    
    <div class="data-control-id-639357 bd-posticoncomments-36">
        <span class="data-control-id-639356 bd-icon-81"></span>
        <?php echo $links; ?>
    </div>
    
<?php
    endif;
}