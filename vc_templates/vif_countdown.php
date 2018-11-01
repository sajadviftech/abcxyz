<?php function vif_countdown( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'vif_countdown', $atts );
	extract( $atts );
	
	$el_class[] = 'vif-countdown';

	$out ='';
	ob_start();
	
	
	?>
	<div class="vif-countdown" data-offset="<?php echo esc_attr($offset); ?>" data-date="<?php echo esc_attr($date); ?>">
    <ul class="vif-countdown-ul">
      <li>
        <span class="days timestamp">00</span>
        <span class="timelabel"><?php esc_html_e( 'days', 'viftech' ); ?></span>
      </li>
      <li>
        <span class="hours timestamp">00</span>
        <span class="timelabel"><?php esc_html_e( 'hours', 'viftech' ); ?></span>
      </li>
      <li>
        <span class="minutes timestamp">00</span>
        <span class="timelabel"><?php esc_html_e( 'minutes', 'viftech' ); ?></span>
      </li>
      <li>
        <span class="seconds timestamp">00</span>
        <span class="timelabel"><?php esc_html_e( 'seconds', 'viftech' ); ?></span>
      </li>
    </ul>
	</div>
	<?php
	$out = ob_get_clean();
	return $out;
}
vif_add_short('vif_countdown', 'vif_countdown');