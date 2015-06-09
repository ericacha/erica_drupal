<?php
function Untitled_posticondate_6x_4() {
    global $bdnode_submitted, $bdnode_date;
    if ($bdnode_submitted) :
?>
    
    <div class=" bd-posticondate-4">
        <span class=" bd-icon-56"></span>
        <?php echo $bdnode_date; ?>
    </div>
    
<?php
    endif;
}