<?php
function Untitled_postreadmore_7x_1() {
    global $bdnode_content;
    $class = 'bd-postreadmore-1 bd-button ';
    $readmore = Untitled_get_links($bdnode_content, false, true, $class);
    if (!empty($readmore)) :
?>
    
        <?php echo $readmore; ?>
    
<?php
    endif;
}