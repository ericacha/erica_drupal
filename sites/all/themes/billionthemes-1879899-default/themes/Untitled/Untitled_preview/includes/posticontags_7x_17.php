<?php
function Untitled_preview_posticontags_7x_17() {
    global $bdnode_content;
    $terms = Untitled_preview_display_terms($bdnode_content);
    if (!empty($terms)) :
?>
    
    <div class="data-control-id-2649 bd-posticontags-17">
        <span class="data-control-id-2648 bd-icon-77"></span>
        <?php echo $terms; ?>
    </div>
    
<?php
    endif;
}