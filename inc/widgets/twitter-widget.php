<?php
// Twitter Widget
class widget_vif_twitterwidget extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'widget_vif_twitterwidget',
			'description' => __('Display your Tweets','viftech')
		);
		
		parent::__construct(
			'vif_vif_twitterwidget_widget',
			__( 'Viftech Themes - Twitter' , 'viftech' ),
			$widget_ops
		);
				
		$this->defaults = array( 'title' => 'Twitter', 'show' => '3' );
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$show = $instance['show'];
		
		$tweets = vif_gettweets($show);
		echo $before_widget;
		echo ($title ? $before_title . $title . $after_title : '');
		
		if (is_array($tweets)) {
			?>
			<ul>
			<?php
			foreach ($tweets as $tweet) {
				?>
				<li class="vif_tweet">
					<p><?php echo wp_kses_post($tweet['tweet']); ?></p>
					<a href="<?php echo esc_url($tweet['url']); ?>" class="vif_tweet_time" target="_blank"><?php echo wp_kses_post($tweet['time']); ?></a>
				</li>
				<?php
			}
			?>
			</ul>
			<?php
		} else {
			var_dump($tweets);
		}
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['show'] = strip_tags( $new_instance['show'] );
		
		return $instance;
	}
	function form($instance) {
		$defaults = $this->defaults;
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Widget Title:', 'viftech'); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="widefat" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'name' )); ?>"><?php esc_html_e('Number of Tweets:', 'viftech'); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'name' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show' )); ?>" value="<?php echo esc_attr($instance['show']); ?>" class="widefat" />
		</p>
	<?php
	}
}
function widget_vif_twitterwidget_init() {
	register_widget('widget_vif_twitterwidget');
}
add_action('widgets_init', 'widget_vif_twitterwidget_init');