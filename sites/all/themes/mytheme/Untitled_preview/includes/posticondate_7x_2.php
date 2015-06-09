<?php
function Untitled_preview_posticondate_7x_2() {
    global $bdnode_display_submitted, $bdnode_date;
    if ($bdnode_display_submitted) :
?>
    
    <div class="data-control-id-1987 bd-posticondate-2">
        <span class="data-control-id-1986 bd-icon-51"></span>
        <?php echo $bdnode_date; ?>
    </div>
    
<?php
    endif;
}