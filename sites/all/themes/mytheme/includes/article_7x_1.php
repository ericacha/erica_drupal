<?php
function Untitled_article_7x_1() {
    global $bdnode_node, $bdnode_classes, $bdnode_attributes;
?>
    
    <article id="node-<?php print $bdnode_node->nid; ?>" class="<?php print $bdnode_classes; ?>  bd-article-1 clearfix"<?php print $bdnode_attributes; ?>>
        <?php 
    $method = 'postheader_'.Untitled_EXPORT_VERSION.'x_1';
    Untitled_render_template_from_includes($method);
?>
	
		<?php 
    $method = 'postcontent_'.Untitled_EXPORT_VERSION.'x_1';
    Untitled_render_template_from_includes($method);
?>
	
		<ul class=" bd-pagination-14 pagination">
    <li class=" bd-paginationitem-14 disabled"><a href="#">«</a></li>
<li class=" bd-paginationitem-14 active"><a href="#">1</a></li>
<li class=" bd-paginationitem-14"><a href="#">2</a></li>
<li class=" bd-paginationitem-14"><a href="#">3</a></li>
<li class=" bd-paginationitem-14"><a href="#">4</a></li>
<li class=" bd-paginationitem-14"><a href="#">5</a></li>
<li class=" bd-paginationitem-14"><a href="#">»</a></li>
</ul>
    </article>
    
<?php
}