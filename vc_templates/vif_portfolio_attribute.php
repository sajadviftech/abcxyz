<?php function vif_portfolio_attribute( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'vif_portfolio_attribute', $atts );
  extract( $atts );
    
 	$out ='';
	ob_start();

	do_action( 'vif_portfolio_attributes', false, $vif_columns, $animation); 

	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_portfolio_attribute', 'vif_portfolio_attribute');