<?php
function Untitled_posticonauthor_6x_3() {
    global $bdnode_submitted, $bdnode_name;
    if ($bdnode_submitted) :
?>
    
    <div class=" bd-posticonauthor-3">
        <span class=" bd-icon-53"></span>
        <?php echo $bdnode_name; ?>
    </div>
    
<?php
    endif;
}