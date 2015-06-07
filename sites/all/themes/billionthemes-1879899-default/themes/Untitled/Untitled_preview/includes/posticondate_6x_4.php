<?php
function Untitled_preview_posticondate_6x_4() {
    global $bdnode_submitted, $bdnode_date;
    if ($bdnode_submitted) :
?>
    
    <div class="data-control-id-2100 bd-posticondate-4">
        <span class="data-control-id-2099 bd-icon-56"></span>
        <?php echo $bdnode_date; ?>
    </div>
    
<?php
    endif;
}