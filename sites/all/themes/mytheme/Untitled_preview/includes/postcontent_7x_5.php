<?php
function Untitled_preview_postcontent_7x_5() {
    global $bdnode_content, $bdnode_content_attributes;
?>
    
    <div class="data-control-id-2326 bd-postcontent-5 bd-tagstyles content"<?php print $bdnode_content_attributes; ?>>
        <div class="bd-container-inner">
        <?php
            // We hide the comments and links now so that we can render them later.
            hide($bdnode_content['comments']);
            hide($bdnode_content['links']);
            $bdnode_terms = Untitled_preview_get_terms($bdnode_content);
            foreach ($bdnode_terms as $term) {
                hide($bdnode_content[$term['#field_name']]);
            }
            print render($bdnode_content);
        ?>
        </div>
    </div>
    
<?php
}