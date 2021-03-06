<div class="wrap about-wrap vif_welcome">
	<?php include 'header.php'; ?>
</div>
<div class="wrap about-wrap">
	<div class="theme-browser vif-plugins vif-content">
		<?php
			$key = Theme_Config::$vif_product_key;
			$expired = Theme_Config::$vif_product_key_expired;
			$vif_envato_hosted = Theme_Config::$vif_envato_hosted;
			
			$cond = ($key != '' && $expired != 1) || $vif_envato_hosted;
		
		
		
		?>
		<?php if (!$cond) { ?>
			<div class="vif-error">
				<p><span class="dashicons dashicons-warning"></span> To install premium plugins you must <a href="<?php echo esc_url(admin_url( 'admin.php?page=vif-product-registration' )); ?>">Activate your Theme</a>.</p>
			</div>
		<?php } ?>
		<?php
		$plugins = TGM_Plugin_Activation::$instance->plugins;
		$i = 0;
		foreach( $plugins as $plugin ):
			if (!$plugin['required']) continue;
	
			$file_path = $plugin['file_path'];
			
			$actions = Theme_Config()->vif_plugins_install( $plugin );

			if( is_plugin_active( $file_path ) ) {
				$plugin_status = 'active';
				$class = 'active';
			}
		?>
		<div class="theme <?php if (!$cond) { ?>disabled<?php } ?> <?php if (($i+1) % 3 == 0) { ?>last<?php }?>">
			<div class="theme-screenshot"><img src="<?php echo esc_attr($plugin['image_url']); ?>" /></div>
			<?php if( isset( $actions['update'] ) && $actions['update'] ): ?>
			<div class="update-message notice inline notice-warning notice-alt"><p>New version available.</p></div>
			<?php endif; ?>
			<h2 class="theme-name" id=""><?php echo esc_attr($plugin['name']); ?></h2>
			<div class="theme-actions">
				<?php foreach( $actions as $action ) { echo $action; } ?>
			</div>

			
		</div>
	
		<?php $i++; endforeach; ?>
	</div>
</div>