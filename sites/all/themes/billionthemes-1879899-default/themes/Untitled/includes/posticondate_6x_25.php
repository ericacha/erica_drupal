<?php
function Untitled_posticondate_6x_25() {
    global $bdnode_submitted, $bdnode_date;
    if ($bdnode_submitted) :
?>
    
    <div class=" bd-posticondate-25">
        <span class=" bd-icon-35"></span>
        <?php echo $bdnode_date; ?>
    </div>
    
<?php
    endif;
}