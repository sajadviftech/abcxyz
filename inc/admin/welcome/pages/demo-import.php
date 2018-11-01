<div class="wrap about-wrap vif_welcome vif_product_registration">
	<?php include 'header.php'; ?>
</div>
<div class="wrap about-wrap">

<?php
	$key = Theme_Config::$vif_product_key;
	$expired = Theme_Config::$vif_product_key_expired;
	$vif_envato_hosted = Theme_Config::$vif_envato_hosted;
	
	$cond = ($key != '' && $expired != 1) || $vif_envato_hosted;
	
?>
<div class="theme-browser vif-demo-import vif-content">
<?php if (!$cond) { ?>
	<div class="vif-error">
		<p><span class="dashicons dashicons-warning"></span> To install any of the demo content sites below you must <a href="<?php echo esc_url(admin_url( 'admin.php?page=vif-product-registration' )); ?>">Activate your Theme</a>.</p>
	</div>
<?php 
	} else if ( !$vif_envato_hosted ) {
		include 'requirements.php'; 
 	}
?>
<?php 
	$demos = Theme_Config()->thbDemos();
	$i = 0;
 	foreach ($demos as $demo) {
 		?>
 		<div class="theme <?php if (!$cond) { ?>disabled<?php } ?> <?php if (($i+1) % 3 == 0) { ?>last<?php }?>">
 			<div class="theme-screenshot"><div class="loading">Page will refresh after import is done.</div><img src="<?php echo esc_attr($demo['import_image']); ?>" /></div>
 			<h2 class="theme-name" id=""><?php echo esc_attr($demo['import_file_name']); ?></h2>
 			<div class="theme-actions">
 					<a class="button button-primary vif-load-demo <?php if (!$cond) { ?>disabled<?php } ?>" data-demo="<?php echo esc_attr($i++); ?>" href="">Import</a>
 					<a class="button" href="<?php echo esc_attr($demo['import_demo_url']); ?>" target="_blank"><i class="dashicons-before dashicons-share-alt2"></i></a>
 			</div>
 		</div>
 		<?php
 	}
?>
</div>