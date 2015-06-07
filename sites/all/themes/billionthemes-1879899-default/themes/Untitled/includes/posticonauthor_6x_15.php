<?php
function Untitled_posticonauthor_6x_15() {
    global $bdnode_submitted, $bdnode_name;
    if ($bdnode_submitted) :
?>
    
    <div class=" bd-posticonauthor-15">
        <span class=" bd-icon-75"></span>
        <?php echo $bdnode_name; ?>
    </div>
    
<?php
    endif;
}