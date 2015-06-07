<?php
function Untitled_article_6x_1() {
    global $bdnode_node, $bdnode_sticky, $bdnode_status;
?>
    
    <article id="node-<?php print $bdnode_node->nid; ?>" class="node<?php if (isset($sticky) && $sticky) { print ' sticky'; } ?><?php if (isset($status) &&  !$status) { print ' node-unpublished'; } ?> clear-block  bd-article-1 clearfix">
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

?>