<?php
function Untitled_preview_posticoncomments_7x_8() {
    global $bdnode_content;
    $links = Untitled_preview_get_links($bdnode_content, true);
    if (!empty($links)) :
?>
    
    <div class="data-control-id-2177 bd-posticoncomments-8">
        <span class="data-control-id-2176 bd-icon-61"></span>
        <?php echo $links; ?>
    </div>
    
<?php
    endif;
}