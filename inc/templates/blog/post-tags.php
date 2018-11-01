<?php if (ot_get_option('article_tags', 'on') == 'on') { ?> 
<footer class="article-tags entry-footer">
	<?php
	if ($posttags = get_the_tags()) {
		$return = '';
		foreach($posttags as $tag) {
			$return .= '<a href="'. get_tag_link($tag->term_id).'" title="'. get_tag_link($tag->name).'" class="tag-cloud-link">' . $tag->name . '</a> ';
		}
		echo substr($return, 0, -1);
	} ?>
</footer>
<?php } ?>
<?php if (ot_get_option('article_author', 'on') == 'on') { ?> 
	<?php do_action('vif_author'); ?>
<?php } ?>