<?php
function Untitled_posticondate_7x_9() {
    global $bdnode_display_submitted, $bdnode_date;
    if ($bdnode_display_submitted) :
?>
    
    <div class=" bd-posticondate-9">
        <span class=" bd-icon-65"></span>
        <?php echo $bdnode_date; ?>
    </div>
    
<?php
    endif;
}