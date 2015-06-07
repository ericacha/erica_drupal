<?php
function Untitled_preview_posticontags_7x_12() {
    global $bdnode_content;
    $terms = Untitled_preview_display_terms($bdnode_content);
    if (!empty($terms)) :
?>
    
    <div class="data-control-id-2343 bd-posticontags-12">
        <span class="data-control-id-2342 bd-icon-69"></span>
        <?php echo $terms; ?>
    </div>
    
<?php
    endif;
}