<?php
function Untitled_posticondate_6x_2() {
    global $bdnode_submitted, $bdnode_date;
    if ($bdnode_submitted) :
?>
    
    <div class=" bd-posticondate-2">
        <span class=" bd-icon-51"></span>
        <?php echo $bdnode_date; ?>
    </div>
    
<?php
    endif;
}