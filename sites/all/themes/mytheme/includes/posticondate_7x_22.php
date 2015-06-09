<?php
function Untitled_posticondate_7x_22() {
    global $bdnode_display_submitted, $bdnode_date;
    if ($bdnode_display_submitted) :
?>
    
    <div class=" bd-posticondate-22">
        <span class=" bd-icon-4"></span>
        <?php echo $bdnode_date; ?>
    </div>
    
<?php
    endif;
}