<?php
function Untitled_preview_posticoncomments_7x_13() {
    global $bdnode_content;
    $links = Untitled_preview_get_links($bdnode_content, true);
    if (!empty($links)) :
?>
    
    <div class="data-control-id-2352 bd-posticoncomments-13">
        <span class="data-control-id-2351 bd-icon-70"></span>
        <?php echo $links; ?>
    </div>
    
<?php
    endif;
}