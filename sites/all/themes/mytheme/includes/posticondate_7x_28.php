<?php
function Untitled_posticondate_7x_28() {
    global $bdnode_display_submitted, $bdnode_date;
    if ($bdnode_display_submitted) :
?>
    
    <div class=" bd-posticondate-28">
        <span class=" bd-icon-43"></span>
        <?php echo $bdnode_date; ?>
    </div>
    
<?php
    endif;
}