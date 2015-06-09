<?php
function Untitled_preview_posticondate_6x_2() {
    global $bdnode_submitted, $bdnode_date;
    if ($bdnode_submitted) :
?>
    
    <div class="data-control-id-1987 bd-posticondate-2">
        <span class="data-control-id-1986 bd-icon-51"></span>
        <?php echo $bdnode_date; ?>
    </div>
    
<?php
    endif;
}