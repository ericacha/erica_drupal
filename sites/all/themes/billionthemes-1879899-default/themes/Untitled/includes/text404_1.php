<?php

function Untitled_text404_1() {
    global $bdpage_content, $bdpage_title, $bdpage_search_box;
?>
    <div class=" bd-text404-51 bd-tagstyles">
    <?php 
        if ($bdpage_title) print '<h1>' . render($bdpage_title) . '</h1>';
        print render($bdpage_content);
    ?>
    <br/><br/>
    <?php
        if (Untitled_EXPORT_VERSION > 6) {
            $block = module_invoke('search', 'block_view', 'search');
            print render($block);
        } else {
            $block = module_invoke('search', 'block', 'view');
            print render($block['content']);
        }        
    ?>
</div>
<?php
}