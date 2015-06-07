<?php
function Untitled_posticondate_6x_22() {
    global $bdnode_submitted, $bdnode_date;
    if ($bdnode_submitted) :
?>
    
    <div class=" bd-posticondate-22">
        <span class=" bd-icon-4"></span>
        <?php echo $bdnode_date; ?>
    </div>
    
<?php
    endif;
}