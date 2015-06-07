<?php
function Untitled_preview_posticondate_6x_25() {
    global $bdnode_submitted, $bdnode_date;
    if ($bdnode_submitted) :
?>
    
    <div class="data-control-id-34302 bd-posticondate-25">
        <span class="data-control-id-34301 bd-icon-35"></span>
        <?php echo $bdnode_date; ?>
    </div>
    
<?php
    endif;
}