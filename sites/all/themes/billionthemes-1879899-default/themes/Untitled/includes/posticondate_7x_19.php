<?php
function Untitled_posticondate_7x_19() {
    global $bdnode_display_submitted, $bdnode_date;
    if ($bdnode_display_submitted) :
?>
    
    <div class=" bd-posticondate-19">
        <span class=" bd-icon-5"></span>
        <?php echo $bdnode_date; ?>
    </div>
    
<?php
    endif;
}