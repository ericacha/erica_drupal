<?php
function Untitled_preview_commentavatar_6x_5() {
    global $bdcomment_picture;
?>
    <div class="data-control-id-2677 bd-commentavatar-5">
        <?php if (isset($bdcomment_picture)) : ?>
        <?php { print $bdcomment_picture; } else: ?>
            <img class="data-control-id-2669 bd-imagestyles" src="<?php echo $GLOBALS['base_url'] . path_to_theme(); ?>/images/avatar.png" style="height: 50px; width: 50px">
        <?php endif;?>
    </div>
<?php }