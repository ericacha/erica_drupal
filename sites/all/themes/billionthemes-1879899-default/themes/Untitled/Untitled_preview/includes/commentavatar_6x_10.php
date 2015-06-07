<?php
function Untitled_preview_commentavatar_6x_10() {
    global $bdcomment_picture;
?>
    <div class="data-control-id-572123 bd-commentavatar-10">
        <?php if (isset($bdcomment_picture)) : ?>
        <?php { print $bdcomment_picture; } else: ?>
            <img class="data-control-id-572122 bd-imagestyles" src="<?php echo $GLOBALS['base_url'] . path_to_theme(); ?>/images/avatar.png" style="height: 50px; width: 50px">
        <?php endif;?>
    </div>
<?php }