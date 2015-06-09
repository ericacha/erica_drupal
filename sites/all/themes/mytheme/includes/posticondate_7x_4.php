<?php
function Untitled_posticondate_7x_4() {
    global $bdnode_display_submitted, $bdnode_date;
    if ($bdnode_display_submitted) :
?>
    
    <div class=" bd-posticondate-4">
        <span class=" bd-icon-56"></span>
        <?php echo $bdnode_date; ?>
    </div>
    
<?php
    endif;
}