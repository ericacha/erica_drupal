<?php
function Untitled_preview_posticontags_7x_32() {
    global $bdnode_content;
    $terms = Untitled_preview_display_terms($bdnode_content);
    if (!empty($terms)) :
?>
    
    <div class="data-control-id-87189 bd-posticontags-32">
        <span class="data-control-id-87188 bd-icon-31"></span>
        <?php echo $terms; ?>
    </div>
    
<?php
    endif;
}