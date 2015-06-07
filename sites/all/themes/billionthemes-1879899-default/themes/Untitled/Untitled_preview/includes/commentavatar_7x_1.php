<?php
function Untitled_preview_commentavatar_7x_1() {
    global $bdcomment_picture;
?>
    <div class="data-control-id-2077 bd-commentavatar-1">
        <?php if (isset($bdcomment_picture)) : ?>
        <?php { print $bdcomment_picture; } else: ?>
            <img class="data-control-id-2069 bd-imagestyles" src="<?php echo $GLOBALS['base_url'] . path_to_theme(); ?>/images/avatar.png" style="height: 50px; width: 50px">
        <?php endif;?>
    </div>
<?php }