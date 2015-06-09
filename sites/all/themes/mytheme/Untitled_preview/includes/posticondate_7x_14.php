<?php
function Untitled_preview_posticondate_7x_14() {
    global $bdnode_display_submitted, $bdnode_date;
    if ($bdnode_display_submitted) :
?>
    
    <div class="data-control-id-2552 bd-posticondate-14">
        <span class="data-control-id-2551 bd-icon-73"></span>
        <?php echo $bdnode_date; ?>
    </div>
    
<?php
    endif;
}