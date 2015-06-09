<?php
function Untitled_preview_posticondate_7x_9() {
    global $bdnode_display_submitted, $bdnode_date;
    if ($bdnode_display_submitted) :
?>
    
    <div class="data-control-id-2277 bd-posticondate-9">
        <span class="data-control-id-2276 bd-icon-65"></span>
        <?php echo $bdnode_date; ?>
    </div>
    
<?php
    endif;
}