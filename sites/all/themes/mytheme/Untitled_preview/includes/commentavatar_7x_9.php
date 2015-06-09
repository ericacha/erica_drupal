<?php
function Untitled_preview_commentavatar_7x_9() {
    global $bdcomment_picture;
?>
    <div class="data-control-id-40191 bd-commentavatar-9">
        <?php if (isset($bdcomment_picture)) : ?>
        <?php { print $bdcomment_picture; } else: ?>
            <img class="data-control-id-40190 bd-imagestyles" src="<?php echo $GLOBALS['base_url'] . path_to_theme(); ?>/images/avatar.png" style="height: 50px; width: 50px">
        <?php endif;?>
    </div>
<?php }