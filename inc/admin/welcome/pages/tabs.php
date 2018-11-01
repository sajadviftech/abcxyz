<?php

$thb_links = array(
	'vif-plugins'			  				=> 'Install Plugins',
	'vif-demo-import'						=> 'Demo Content Import',
	'vif-theme-options'     		=> 'Theme Options'
);
	
?>
<h2 class="nav-tab-wrapper wp-clearfix">
<?php
	foreach ( $thb_links as $link_id => $title ) {
		?>
		<a href="<?php echo esc_url("admin.php?page={$link_id}"); ?>" class="nav-tab<?php if ( $link_id === $_GET['page']) { echo ' nav-tab-active'; } ?>">
			<?php echo esc_attr($title); ?>
		</a>
		<?php
	}
?>
</h2>