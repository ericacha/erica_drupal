<?php
function Untitled_posticondate_7x_14() {
    global $bdnode_display_submitted, $bdnode_date;
    if ($bdnode_display_submitted) :
?>
    
    <div class=" bd-posticondate-14">
        <span class=" bd-icon-73"></span>
        <?php echo $bdnode_date; ?>
    </div>
    
<?php
    endif;
}