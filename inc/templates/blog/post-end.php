<?php do_action( 'vif_post_nav' ); ?>
<?php if (ot_get_option('article_related', 'on') == 'on') { ?> 
<?php do_action('vif_related'); ?>
<?php } ?>