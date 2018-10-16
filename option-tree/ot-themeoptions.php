<?php
/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', 'viftech_custom_theme_options', 1 );

/**
 * Theme Mode demo code of all the available option types.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function viftech_custom_theme_options() {
  
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Create a custom settings array that we pass to 
   * the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'sections'        => array(
      array(
        'title'       => esc_html__('Header & Menu', 'viftech'),
        'id'          => 'header'
      ),
      array(
        'title'       => esc_html__('Blog', 'viftech'),
        'id'          => 'blog'
      ),
      array(
        'title'       => esc_html__('Portfolio', 'viftech'),
        'id'          => 'portfolio'
      ),
      array(
        'title'       => esc_html__('Footer', 'viftech'),
        'id'          => 'footer'
      ),
      array(
        'title'       => esc_html__('Typography', 'viftech'),
        'id'          => 'typography'
      ),
      array(
        'title'       => esc_html__('Customization', 'viftech'),
        'id'          => 'customization'
      ),
      array(
        'title'       => esc_html__('Misc', 'viftech'),
        'id'          => 'misc'
      )
    ),
    'settings'        => array(
    	array(
    	  'id'          => 'blog_tab0',
    	  'label'       => esc_html__('Blog Listing', 'viftech'),
    	  'type'        => 'tab',
    	  'section'     => 'blog'
    	),
    	array(
    	  'label'       => esc_html__('Blog Header Style', 'viftech'),
    	  'id'          => 'blog_header',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('You can choose different blog header styles here', 'viftech'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Title & Categories', 'viftech'),
    	      'value'       => 'style1'
    	    ),
    	    array(
    	      'label'       => esc_html__('Page Content', 'viftech'),
    	      'value'       => 'style2'
    	    ),
    	  ),
    	  'std'         => 'style1',
    	  'section'     => 'blog'
    	),
    	array(
    	  'label'       => esc_html__('Blog Top Content', 'viftech'),
    	  'id'          => 'blog_top_content',
    	  'type'        => 'page-select',
    	  'desc'        => esc_html__('This allows you to add contents of a page above the blog.', 'viftech'),
    	  'section'     => 'blog',
    	  'condition'   => 'blog_header:is(style2)'
    	),
    	array(
    	  'label'       => esc_html__('Blog Header Categories', 'viftech'),
    	  'id'          => 'blog_header_categories',
    	  'type'        => 'category-checkbox',
    	  'desc'        => esc_html__('You can choose which categories to display under the blog title', 'viftech'),
    	  'section'     => 'blog',
    	  'condition'   => 'blog_header:is(style1)'
    	),
    	array(
    	  'label'       => esc_html__('Blog Style', 'viftech'),
    	  'id'          => 'blog_style',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('You can choose different blog styles here', 'viftech'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Style 1 - Grid', 'viftech'),
    	      'value'       => 'style1'
    	    ),
    	    array(
    	      'label'       => esc_html__('Style 2 - Vertical', 'viftech'),
    	      'value'       => 'style2'
    	    ),
    	    array(
    	      'label'       => esc_html__('Style 3 - Left Thumbnail', 'viftech'),
    	      'value'       => 'style3'
    	    ),
    	    array(
    	      'label'       => esc_html__('Style 4 - Masonry', 'viftech'),
    	      'value'       => 'style4'
    	    ),
    	    array(
    	      'label'       => esc_html__('Style 5 - Image Overlay', 'viftech'),
    	      'value'       => 'style5'
    	    ),
    	    array(
    	      'label'       => esc_html__('Style 6 - Grid with Border', 'viftech'),
    	      'value'       => 'style6'
    	    ),
    	    
    	  ),
    	  'std'         => 'style1',
    	  'section'     => 'blog'
    	),
    	array(
    	  'label'       => esc_html__('Blog Sidebar', 'viftech'),
    	  'id'          => 'blog_sidebar',
    	  'type'        => 'on_off',
    	  'desc'        => esc_html__('Do you want to display the sidebar for the blog?', 'viftech'),
    	  'std'         => 'on',
    	  'section'     => 'blog',
    	  'operator' 		=> 'or',
    	  'condition'   => 'blog_style:is(style1),blog_style:is(style3),blog_style:is(style4),blog_style:is(style5),blog_style:is(style6)'
    	),
    	array(
    		'label'       => esc_html__('Number of Columns', 'viftech' ),
    	  'id'          => 'viftech_blog_columns',
    	  'std'         => '4',
    	  'type'        => 'numeric-slider',
    	  'section'     => 'blog',
    	  'min_max_step'=> '3,6,1',
    	  'operator' 		=> 'or',
    	  'condition'   => 'blog_style:is(style1),blog_style:is(style4),blog_style:is(style6)'
    	),
    	array(
    	  'label'       => esc_html__('Blog Animation', 'viftech'),
    	  'id'          => 'blog_animation',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('You can choose different blog animation styles here', 'viftech'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('None', 'viftech'),
    	      'value'       => ''
    	    ),
    	    array(
    	      'label'       => esc_html__('Right to Left', 'viftech'),
    	      'value'       => 'animation right-to-left'
    	    ),
    	    array(
    	      'label'       => esc_html__('Left to Right', 'viftech'),
    	      'value'       => 'animation left-to-right'
    	    ),
    	    array(
    	      'label'       => esc_html__('Right to Left - 3D', 'viftech'),
    	      'value'       => 'animation right-to-left-3d'
    	    ),
    	    array(
    	      'label'       => esc_html__('Left to Right - 3D', 'viftech'),
    	      'value'       => 'animation left-to-right-3d'
    	    ),
    	    array(
    	      'label'       => esc_html__('Bottom to Top', 'viftech'),
    	      'value'       => 'animation bottom-to-top'
    	    ),
    	    array(
    	      'label'       => esc_html__('Top to Bottom', 'viftech'),
    	      'value'       => 'animation top-to-bottom'
    	    ),
    	    array(
    	      'label'       => esc_html__('Bottom to Top - 3D', 'viftech'),
    	      'value'       => 'animation bottom-to-top-3d'
    	    ),
    	    array(
    	      'label'       => esc_html__('Top to Bottom - 3D', 'viftech'),
    	      'value'       => 'animation top-to-bottom-3d'
    	    ),
    	    array(
    	      'label'       => esc_html__('Scale', 'viftech'),
    	      'value'       => 'animation scale'
    	    ),
    	    array(
    	      'label'       => esc_html__('Fade', 'viftech'),
    	      'value'       => 'animation fade'
    	    ),
    	  ),
    	  'std'         => '',
    	  'section'     => 'blog'
    	),
    	array(
    	  'label'       => esc_html__('Blog Pagination Style', 'viftech'),
    	  'id'          => 'blog_pagination_style',
    	  'type'        => 'radio',
    	  'desc'        => esc_html__('You can choose different blog pagination styles here. The regular pagination will be used for archive pages.', 'viftech'),
    	  'choices'     => array(
    	    array(
    	      'label'       => esc_html__('Regular Pagination', 'viftech'),
    	      'value'       => 'style1'
    	    ),
    	    array(
    	      'label'       => esc_html__('Load More Button', 'viftech'),
    	      'value'       => 'style2'
    	    ),
    	    array(
    	      'label'       => esc_html__('Infinite Scroll', 'viftech'),
    	      'value'       => 'style3'
    	    )
    	  ),
    	  'std'         => 'style1',
    	  'section'     => 'blog'
    	),
      array(
        'id'          => 'blog_tab1',
        'label'       => esc_html__('Article Settings', 'viftech'),
        'type'        => 'tab',
        'section'     => 'blog'
      ),
      array(
        'label'       => esc_html__('Article Sidebar', 'viftech'),
        'id'          => 'article_sidebar',
        'type'        => 'on_off',
        'desc'        => esc_html__('Do you want to display the sidebar inside article pages?', 'viftech'),
        'std'         => 'on',
        'section'     => 'blog'
      ),
      array(
        'label'       => esc_html__('Display Tags?', 'viftech'),
        'id'          => 'article_tags',
        'type'        => 'on_off',
        'desc'        => esc_html__('Displays article tags at the bottom', 'viftech'),
        'std'         => 'on',
        'section'     => 'blog'
      ),
      array(
        'label'       => esc_html__('Display Author Info?', 'viftech'),
        'id'          => 'article_author',
        'type'        => 'on_off',
        'desc'        => esc_html__('Displays author information at the bottom. Will only be displayed if the author description is filled.', 'viftech'),
        'std'         => 'on',
        'section'     => 'blog'
      ),
      array(
        'label'       => esc_html__('Display Related Posts?', 'viftech'),
        'id'          => 'article_related',
        'type'        => 'on_off',
        'desc'        => esc_html__('Displays related posts at the bottom.', 'viftech'),
        'std'         => 'on',
        'section'     => 'blog'
      ),
      array(
        'label'       => esc_html__('Display Article Navigation?', 'viftech'),
        'id'          => 'blog_nav',
        'type'        => 'on_off',
        'desc'        => esc_html__('Displays article navigation at the bottom', 'viftech'),
        'std'         => 'on',
        'section'     => 'blog'
      ),
      array(
        'label'       => esc_html__('Article Navigation Style', 'viftech'),
        'id'          => 'blog_nav_style',
        'type'        => 'radio',
        'desc'        => esc_html__('You can choose your article navigation style here', 'viftech'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Style 1 (Fixed)', 'viftech'),
            'value'       => 'style1'
          ),
          array(
            'label'       => esc_html__('Style 2 (With Images)', 'viftech'),
            'value'       => 'style2'
          )
        ),
        'std'         => 'style1',
        'section'     => 'blog'
      ),
      array(
        'label'       => esc_html__('Display Footer on Article Pages?', 'viftech'),
        'id'          => 'footer_article',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can toggle footer inside article pages.', 'viftech'),
        'std'         => 'on',
        'section'     => 'blog'
      ),
      array(
        'id'          => 'blog_tab2',
        'label'       => esc_html__('Sharing Settings', 'viftech'),
        'type'        => 'tab',
        'section'     => 'blog'
      ),
      array(
        'label'       => 'Sharing buttons',
        'id'          => 'sharing_buttons',
        'type'        => 'checkbox',
        'desc'        => 'You can choose which social networks to display and get counts from. Please visit <strong>Theme Options > Misc</strong> to fill out application details for the social media sites you choose. This also affects the Portfolio Pages.',
        'choices'     => array(
          array(
            'label'       => 'Facebook',
            'value'       => 'facebook'
          ),
          array(
            'label'       => 'Twitter',
            'value'       => 'twitter'
          ),
          array(
            'label'       => 'Pinterest',
            'value'       => 'pinterest'
          ),
          array(
            'label'       => 'Google Plus',
            'value'       => 'google-plus'
          ),
          array(
            'label'       => 'Linkedin',
            'value'       => 'linkedin'
          ),
          array(
            'label'       => 'Vkontakte',
            'value'       => 'vkontakte'
          ),
          array(
            'label'       => 'WhatsApp',
            'value'       => 'whatsapp'
          ),
          array(
            'label'       => 'Facebook Messenger',
            'value'       => 'facebook-messenger'
          ),
          array(
            'label'       => 'E-Mail',
            'value'       => 'email'
          )
        ),
        'section'     => 'blog'
      ),
      array(
        'label'       => esc_html__('Facebook App ID', 'viftech'),
        'id'          => 'facebook_app_id',
        'type'        => 'text',
        'desc'        => esc_html__('Facebook Application ID for Facebook Messenger, available <a href="https://developers.facebook.com/apps/" target="_blank">here</a>', 'viftech'),
        'section'     => 'blog'
      ),
      array(
        'id'          => 'portfolio_tab0',
        'label'       => esc_html__('General', 'viftech'),
        'type'        => 'tab',
        'section'     => 'portfolio'
      ),
      array(
        'label'       => esc_html__('Portfolio Slug', 'viftech'),
        'id'          => 'portfolio_slug',
        'type'        => 'text',
        'desc'        => esc_html__('The portfolio slug used for the portfolio permalinks', 'viftech'),
        'section'     => 'portfolio'
      ),
      array(
        'label'       => esc_html__('Portfolio Navigation', 'viftech'),
        'id'          => 'portfolio_nav',
        'type'        => 'on_off',
        'desc'        => esc_html__('This displays a navigation above the footer for next/previous portfolios', 'viftech'),
        'std'         => 'on',
        'section'     => 'portfolio'
      ),
      array(
        'label'       => esc_html__('Portfolio Navigation Style', 'viftech'),
        'id'          => 'portfolio_nav_style',
        'type'        => 'radio',
        'desc'        => esc_html__('Choose the navigation style below.', 'viftech'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Just Next Item', 'viftech'),
            'value'       => 'style1'
          ),
          array(
            'label'       => esc_html__('Previous & Next Items', 'viftech'),
            'value'       => 'style2'
          ),
          array(
            'label'       => esc_html__('Multiple Items', 'viftech'),
            'value'       => 'style3'
          ),
          array(
            'label'       => esc_html__('Just Text', 'viftech'),
            'value'       => 'style4'
          )
        ),
        'std'         => 'style3',
        'section'     => 'portfolio',
        'condition'   => 'portfolio_nav:is(on)'
      ),
      array(
        'label'       => esc_html__('Number of Portfolios to show', 'viftech'),
        'id'          => 'portfolio_nav_count',
        'type'        => 'text',
        'desc'        => esc_html__('Number of portfolios you want to show inside the navigation', 'viftech'),
        'section'     => 'portfolio',
        'std'					=> '10',
        'operator' 		=> 'and',
        'condition'   => 'portfolio_nav:is(on),portfolio_nav_style:is(style3)'
      ),
      array(
        'label'       => esc_html__('Display Footer on Portfolio Pages?', 'viftech'),
        'id'          => 'footer_portfolio',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can toggle footer inside portfolio pages.', 'viftech'),
        'std'         => 'off',
        'section'     => 'portfolio'
      ),
      
      array(
        'id'          => 'header_tab0',
        'label'       => esc_html__('General Header Settings', 'viftech'),
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Header Style', 'viftech'),
        'id'          => 'header_style',
        'type'        => 'radio-image',
        'std'         => 'style1',
        'section'	  	=> 'header'
      ),
      array(
        'label'       => esc_html__('Header Border', 'viftech'),
        'id'          => 'header_border',
        'type'        => 'border',
        'desc'        => esc_html__('Display the fixed header?', 'viftech'),
        'class'				=> 'ot-colorpicker-opacity',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Header Full Width', 'viftech'),
        'id'          => 'viftech_header_full_width',
        'type'        => 'on_off',
        'desc'        => esc_html__('By default, the header on viftech is limited to the grid, you can make it full width here.', 'viftech'),
        'std'         => 'off',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Fixed Header', 'viftech'),
        'id'          => 'fixed_header',
        'type'        => 'on_off',
        'desc'        => esc_html__('Display the fixed header?', 'viftech'),
        'std'         => 'on',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Fixed Header Color', 'viftech'),
        'id'          => 'fixed_header_color',
        'type'        => 'radio',
        'desc'        => esc_html__('Color of the fixed header', 'viftech'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Light', 'viftech'),
            'value'       => 'light-header'
          ),
          array(
            'label'       => esc_html__('Dark', 'viftech'),
            'value'       => 'dark-header'
          )
        ),
        'std'         => 'dark-header',
        'section'     => 'header',
        'condition'   => 'fixed_header:is(on)'
      ),
      array(
        'label'       => esc_html__('Auto-Hide Fixed Header on Scroll', 'viftech'),
        'id'          => 'fixed_header_scroll',
        'type'        => 'on_off',
        'desc'        => esc_html__('Fixed header is hidden when you scroll down and only shown when you scroll up.', 'viftech'),
        'std'         => 'on',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Fixed Header Shadow', 'viftech'),
        'id'          => 'fixed_header_shadow',
        'type'        => 'select',
        'desc'        => esc_html__('You can set your fixed header shadow here.', 'viftech'),
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('None', 'viftech'),
        	  'value'       => ''
        	),
          array(
            'label'       => esc_html__('Small', 'viftech'),
            'value'       => 'thb-fixed-shadow-style1'
          ),
          array(
            'label'       => esc_html__('Medium', 'viftech'),
            'value'       => 'thb-fixed-shadow-style2'
          ),
          array(
            'label'       => esc_html__('Large', 'viftech'),
            'value'       => 'thb-fixed-shadow-style3'
          )
        ),
        'std'         => '',
        'section'     => 'header'
      ),
      array(
        'id'          => 'header_tab1',
        'label'       => esc_html__('Full Menu Settings', 'viftech'),
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Full Menu Hover Style', 'viftech'),
        'id'          => 'full_menu_hover_style',
        'type'        => 'radio',
        'desc'        => esc_html__('Which hover style would you like to use?', 'viftech'),
        'choices'     => array(
      		array(
      			'label'       => esc_html__('Standard', 'viftech'),
      			'value'       => 'thb-standard'
      		),
      		array(
      			'label'       => esc_html__('Underline', 'viftech'),
      			'value'       => 'thb-underline'
      		),
      		array(
      			'label'       => esc_html__('Line Through', 'viftech'),
      			'value'       => 'thb-line-through'
      		),
      		array(
      			'label'       => esc_html__('Line Marker', 'viftech'),
      			'value'       => 'thb-line-marker'
      		)
        ),
        'std'         => 'thb-standard',
        'section'	  => 'header'
      ),
      array(
        'id'          => 'menu_margin',
        'label'       => esc_html__('Top Level Item Margin', 'viftech'),
        'desc'        => esc_html__('If you want to fit more menu items to the given space, you can decrease the margin between them here. The default margin is 30px', 'viftech'),
        'type'        => 'measurement',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Full Menu Social Links', 'viftech' ),
        'id'          => 'fullmenu_social_link',
        'type'        => 'social-links',
        'desc'        => esc_html__('Add your desired Social Links next to the full menu here', 'viftech' ),
        'section'     => 'header'
      ),
      array(
        'id'          => 'header_tab2',
        'label'       => esc_html__('Secondary Area Settings', 'viftech'),
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Display Secondary Menu', 'viftech'),
        'id'          => 'header_secondary',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can display another menu inside secondary area.', 'viftech'),
        'std'         => 'off',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Language Switcher', 'viftech'),
        'id'          => 'viftech_ls',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can toggle the language switcher here. Requires that you have WPML or PolyLang installed.', 'viftech'),
        'std'         => 'off',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Secondary Menu', 'viftech'),
        'id'          => 'header_secondary_menu',
        'type'        => 'menu_select',
        'desc'        => esc_html__('Select menu to be displayed inside secondary area.', 'viftech' ),
        'section'     => 'header',
        'condition'   => 'header_secondary:is(on)'
      ),
      array(
        'label'       => esc_html__('Header Search', 'viftech'),
        'id'          => 'header_search',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can toggle the search icon here.', 'viftech'),
        'std'         => 'on',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Header Cart', 'viftech'),
        'id'          => 'header_cart',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can toggle the cart icon here.', 'viftech'),
        'std'         => 'on',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Icon Style', 'viftech' ),
        'id'          => 'mobile_menu_icon_style',
        'type'        => 'radio',
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('Style 1', 'viftech'),
        	  'value'       => 'style1'
        	),
          array(
            'label'       => esc_html__('Style 2', 'viftech'),
            'value'       => 'style2'
          ),
          array(
            'label'       => esc_html__('Style 3', 'viftech'),
            'value'       => 'style3'
          ),
        ),
        'std'         => 'style1',
        'desc'        => esc_html__('You can select a different icon for your mobile menu here.', 'viftech' ),
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Icon "MENU" label', 'viftech'),
        'id'          => 'mobile_menu_text',
        'type'        => 'on_off',
        'desc'        => esc_html__('Would you like to display "Menu" Text next to mobile menu icon?', 'viftech'),
        'std'         => 'off',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Header Button', 'viftech'),
        'id'          => 'header_button',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can add a Call to Action button to your header.', 'viftech'),
        'std'         => 'off',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Button Text', 'viftech' ),
        'id'          => 'header_button_text',
        'type'        => 'text',
        'desc'        => esc_html__('Call-to-Action Button Text', 'viftech' ),
        'section'     => 'header',
        'std' 				=> esc_html__('Get the App', 'viftech'),
        'condition'   => 'header_button:is(on)'
      ),
      array(
        'label'       => esc_html__('Button Link', 'viftech' ),
        'id'          => 'header_action_button_link',
        'type'        => 'text',
        'desc'        => esc_html__('Call-to-Action Button link', 'viftech' ),
        'section'     => 'header',
        'std' 				=> esc_html__('Viftech url', 'viftech'),
        'condition'   => 'header_button:is(on)'
      ),
      array(
        'label'       => esc_html__('Button Style', 'viftech' ),
        'id'          => 'header_button_style',
        'type'        => 'radio',
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('Style - 1', 'viftech'),
        	  'value'       => 'style1'
        	),
          array(
            'label'       => esc_html__('Style - 2', 'viftech'),
            'value'       => 'style2'
          ),
          array(
            'label'       => esc_html__('Style - 3', 'viftech'),
            'value'       => 'style3'
          )
        ),
        'std'         => 'style1',
        'desc'        => esc_html__('Call-to-Action Button Style', 'viftech' ),
        'section'     => 'header',
        'condition'   => 'header_button:is(on)'
      ),
      array(
        'label'       => esc_html__('Button Border Radius', 'viftech' ),
        'id'          => 'header_button_radius',
        'type'        => 'radio',
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('No Radius', 'viftech'),
        	  'value'       => 'no-radius'
        	),
          array(
            'label'       => esc_html__('Small Radius', 'viftech'),
            'value'       => 'small-radius'
          ),
          array(
            'label'       => esc_html__('Pill Radius', 'viftech'),
            'value'       => 'pill-radius'
          )
        ),
        'std'         => 'no-radius',
        'desc'        => esc_html__('Call-to-Action Button Border Radius', 'viftech' ),
        'section'     => 'header',
        'condition'   => 'header_button:is(on)'
      ),
      array(
        'label'       => esc_html__('Button Color', 'viftech' ),
        'id'          => 'header_button_color',
        'type'        => 'radio',
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('Black', 'viftech'),
        	  'value'       => ''
        	),
          array(
            'label'       => esc_html__('White', 'viftech'),
            'value'       => 'white'
          ),
          array(
            'label'       => esc_html__('Accent', 'viftech'),
            'value'       => 'accent'
          )
        ),
        'std'         => 'white',
        'desc'        => esc_html__('Call-to-Action Button Color', 'viftech' ),
        'section'     => 'header',
        'condition'   => 'header_button:is(on)'
      ),
      array(
        'label'       => esc_html__('Secondary Menu Social Links', 'viftech' ),
        'id'          => 'secondarymenu_social_link',
        'type'        => 'social-links',
        'desc'        => esc_html__('Add your desired Social Links inside secondary area here.', 'viftech' ),
        'section'     => 'header'
      ),
      array(
        'id'          => 'header_tab3',
        'label'       => esc_html__('Mobile Menu Settings', 'viftech'),
        'type'        => 'tab',
        'section'     => 'header'
      ),
      
      array(
        'label'       => esc_html__('Mobile Menu Style', 'viftech'),
        'id'          => 'mobile_menu_style',
        'type'        => 'radio',
        'desc'        => esc_html__('You can choose your mobile menu style here', 'viftech'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Style 1 (Half-page)', 'viftech'),
            'value'       => 'style1'
          ),
          array(
            'label'       => esc_html__('Style 2 (Full Screen)', 'viftech'),
            'value'       => 'style2'
          )
        ),
        'std'         => 'style1',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Mobile Submenu Behaviour', 'viftech'),
        'id'          => 'submenu_behaviour',
        'type'        => 'radio',
        'desc'        => esc_html__('You can choose how your arrows signs work', 'viftech'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Default - Clickable parent links', 'viftech'),
            'value'       => 'thb-default'
          ),
          array(
            'label'       => esc_html__('Open Submenu - Parent links open submenus', 'viftech'),
            'value'       => 'thb-submenu'
          )
        ),
        'std'         => 'thb-submenu',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Color', 'viftech'),
        'id'          => 'mobile_menu_color',
        'type'        => 'radio',
        'desc'        => esc_html__('You can choose your mobile menu color here.', 'viftech'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Light', 'viftech'),
            'value'       => 'light'
          ),
          array(
            'label'       => esc_html__('Dark', 'viftech'),
            'value'       => 'dark'
          )
        ),
        'std'         => 'light',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Footer', 'viftech'),
        'id'          => 'mobile_menu_footer',
        'type'        => 'textarea',
        'desc'        => esc_html__('This content appears at the bottom of the menu. You can use your shortcodes here.', 'viftech'),
        'rows'        => '4',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Social Links', 'viftech' ),
        'id'          => 'mobile_menu_social_link',
        'type'        => 'social-links',
        'desc'        => esc_html__('Add your desired Social Links next to the mobile menu here', 'viftech' ),
        'section'     => 'header'
      ),
      array(
        'id'          => 'header_tab4',
        'label'       => esc_html__('Logo Settings', 'viftech'),
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Logo Height', 'viftech'),
        'id'          => 'logo_height',
        'type'        => 'measurement',
        'desc'        => esc_html__('You can modify the logo height from here. This is maximum height, so your logo may get smaller depending on spacing inside header', 'viftech'),
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Mobile Logo Height', 'viftech'),
        'id'          => 'logo_height_mobile',
        'type'        => 'measurement',
        'desc'        => esc_html__('You can modify the logo height for the mobile screens.', 'viftech'),
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Dark Logo Upload (black)', 'viftech'),
        'id'          => 'logo',
        'type'        => 'upload',
        'desc'        => esc_html__('You can upload your own logo here. Since this theme is retina-ready, <strong>please upload a double the size you set above.</strong>', 'viftech'),
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Light Logo Upload (white)', 'viftech'),
        'id'          => 'logo_light',
        'type'        => 'upload',
        'desc'        => esc_html__('You can upload your own logo here. Since this theme is retina-ready, <strong>please upload a double the size you set above.</strong>', 'viftech'),
        'section'     => 'header'
      ),
      array(
        'id'          => 'header_tab5',
        'label'       => esc_html__('Measurements', 'viftech'),
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Header Padding', 'viftech'),
        'id'          => 'header_padding',
        'type'        => 'spacing',
        'desc'        => esc_html__('This affects header on large screens. The values are in px.', 'viftech'),
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Fixed Header Padding', 'viftech'),
        'id'          => 'header_padding_fixed',
        'type'        => 'spacing',
        'desc'        => esc_html__('This affects the fixed header on large screens. The values are in px.', 'viftech'),
        'section'     => 'header'
      ),
      array(
        'label'       => esc_html__('Mobile Header Padding', 'viftech'),
        'id'          => 'header_padding_mobile',
        'type'        => 'spacing',
        'desc'        => esc_html__('This affects header on mobile screens for both regular and fixed versions.', 'viftech'),
        'section'     => 'header'
      ),
      array(
        'id'          => 'footer_tab0',
        'label'       => esc_html__('Footer Settings', 'viftech'),
        'type'        => 'tab',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Display Footer', 'viftech'),
        'id'          => 'footer',
        'type'        => 'on_off',
        'desc'        => esc_html__('Would you like to display the Footer?', 'viftech'),
        'std'         => 'on',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Footer Effect', 'viftech'),
        'id'          => 'footer_effect',
        'type'        => 'on_off',
        'desc'        => esc_html__('Would you like to use the fold effect? This also affects the sub-footer', 'viftech'),
        'std'         => 'off',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Footer Shadow', 'viftech'),
        'id'          => 'footer_shadow',
        'type'        => 'radio',
        'desc'        => esc_html__('You can change the footer shadow here', 'viftech'),
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('None', 'viftech'),
        	  'value'       => 'none'
        	),
          array(
            'label'       => esc_html__('Light', 'viftech'),
            'value'       => 'light'
          ),
          array(
            'label'       => esc_html__('Heavy', 'viftech'),
            'value'       => 'heavy'
          )
        ),
        'std'         => 'heavy',
        'section'     => 'footer',
        'condition'   => 'footer_effect:is(on)'
      ),
      array(
        'label'       => esc_html__('Display Footer Logo?', 'viftech'),
        'id'          => 'footer_logo',
        'type'        => 'on_off',
        'desc'        => esc_html__('Would you like to display the Footer Logo on top of widgets?', 'viftech'),
        'std'         => 'off',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Footer Logo Upload', 'viftech'),
        'id'          => 'footer_logo_upload',
        'type'        => 'upload',
        'desc'        => esc_html__('You can upload your own footer logo here. Since this theme is retina-ready, <strong>please upload a double the size you set below.</strong>', 'viftech'),
        'section'     => 'footer',
        'condition'		=> 'footer_logo:is(on)'
      ),
      array(
        'label'       => esc_html__('Footer Logo Height', 'viftech'),
        'id'          => 'footer_logo_height',
        'type'        => 'measurement',
        'desc'        => esc_html__('You can modify the footer logo height from here. This is maximum height, so your logo may get smaller depending on spacing inside footer', 'viftech'),
        'section'     => 'footer',
        'condition'		=> 'footer_logo:is(on)'
      ),
      array(
        'label'       => esc_html__('Footer Top Content', 'viftech'),
        'id'          => 'footer_top_content',
        'type'        => 'page-select',
        'desc'        => esc_html__('This allows you to add contents of a page inside the footer.', 'viftech'),
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Footer Columns', 'viftech'),
        'id'          => 'footer_columns',
        'type'        => 'radio-image',
        'desc'        => esc_html__('You can change the layout of footer columns here', 'viftech'),
        'std'         => 'threecolumns',
        'section'     => 'footer',
      ),
      array(
        'label'       => esc_html__('Footer Color', 'viftech'),
        'id'          => 'footer_color',
        'type'        => 'radio',
        'desc'        => esc_html__('You can choose your footer color here. You can also change your footer background from "Customization"', 'viftech'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Light', 'viftech'),
            'value'       => 'light'
          ),
          array(
            'label'       => esc_html__('Dark', 'viftech'),
            'value'       => 'dark'
          )
        ),
        'std'         => 'light',
        'section'     => 'footer',
      ),
      array(
        'id'          => 'footer_tab2',
        'label'       => esc_html__('Sub-Footer Settings', 'viftech'),
        'type'        => 'tab',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Display Sub-Footer', 'viftech'),
        'id'          => 'subfooter',
        'type'        => 'on_off',
        'desc'        => esc_html__('Would you like to display the Sub-Footer?', 'viftech'),
        'std'         => 'off',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Sub-Footer Style', 'viftech'),
        'id'          => 'subfooter_style',
        'type'        => 'radio-image',
        'desc'        => esc_html__('Which subfooter style would you like to use?', 'viftech'),
        'std'         => 'style1',
        'section'	  	=> 'footer'
      ),
      array(
        'label'       => esc_html__('Display Sub-Footer Logo?', 'viftech'),
        'id'          => 'subfooter_logo',
        'type'        => 'on_off',
        'desc'        => esc_html__('Would you like to display the Subfooter Logo?', 'viftech'),
        'std'         => 'off',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Sub-Footer Logo', 'viftech'),
        'id'          => 'subfooter_logo_upload',
        'type'        => 'upload',
        'desc'        => esc_html__('You can upload your own subfooter logo here. Since this theme is retina-ready, <strong>please upload a double size image.</strong>', 'viftech'),
        'section'     => 'footer',
        'condition'		=> 'subfooter_logo:is(on)'
      ),
      array(
        'label'       => esc_html__('Sub-Footer Logo Height', 'viftech'),
        'id'          => 'subfooter_logo_height',
        'type'        => 'measurement',
        'desc'        => esc_html__('You can modify the subfooter logo height from here. This is maximum height, so your logo may get smaller depending on screen size', 'viftech'),
        'section'     => 'footer',
        'condition'		=> 'subfooter_logo:is(on)'
      ),
      array(
        'label'       => esc_html__('Sub-Footer Menu', 'viftech'),
        'id'          => 'subfooter_menu',
        'type'        => 'menu_select',
        'desc'        => esc_html__('Menu to be displayed on the subfooter', 'viftech' ),
        'section'     => 'footer',
        'operator' 		=> 'or',
        'condition'		=> 'subfooter_style:is(style2),subfooter_style:is(style3)'
        
      ),
      array(
        'label'       => esc_html__('Sub-Footer Text', 'viftech' ),
        'id'          => 'subfooter_text',
        'type'        => 'textarea',
        'desc'        => esc_html__('Text Content to be displayed on the subfooter', 'viftech' ),
        'section'     => 'footer',
        'std' 				=> esc_html__('&copy; 2018 viftech', 'viftech'),
        'operator' 		=> 'or',
        'condition'		=> 'subfooter_style:is(style1),subfooter_style:is(style3)'
      ),
      array(
        'label'       => esc_html__('Sub-Footer Social Links', 'viftech' ),
        'id'          => 'subfooter_social_link',
        'type'        => 'social-links',
        'desc'        => esc_html__('Add your desired Social Links for the subfooter here', 'viftech' ),
        'section'     => 'footer',
        'operator' 		=> 'or',
        'condition'		=> 'subfooter_style:is(style1),subfooter_style:is(style2)'
      ),
      array(
        'label'       => esc_html__('Payment Icons to display', 'viftech'),
        'id'          => 'footer_payment_icons',
        'type'        => 'list-item',
        'desc'        => esc_html__('Add your desired Payment Icons for the footer here', 'viftech'),
        'settings'    => array(
          array(
            'label'       => esc_html__('Payment Type', 'viftech'),
            'id'          => 'payment_type',
            'type'        => 'select',
            'choices'     => array(
          		array(
          			'label'       => 'Visa',
          			'value'       => 'payment_visa'
          		),
          		array(
          			'label'       => 'MasterCard',
          			'value'       => 'payment_mc'
          		),
          		array(
          			'label'       => 'PayPal',
          			'value'       => 'payment_pp'
          		),
          		array(
          			'label'       => 'Discover',
          			'value'       => 'payment_discover'
          		),
          		array(
          			'label'       => 'Amazon Payments',
          			'value'       => 'payment_amazon'
          		),
          		array(
          			'label'       => 'Stripe',
          			'value'       => 'payment_stripe'
          		),
          		array(
          			'label'       => 'American Express',
          			'value'       => 'payment_amex'
          		),
          		array(
          			'label'       => 'Diners Club',
          			'value'       => 'payment_diners'
          		),
          		array(
          			'label'       => 'Google Wallet',
          			'value'       => 'payment_wallet'
          		)
            )
          )
        ),
        'section'     => 'footer'
      ),
      array(
        'id'          => 'footer_tab3',
        'label'       => esc_html__('Footer Bar', 'viftech'),
        'type'        => 'tab',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Display Footer Bar', 'viftech'),
        'id'          => 'footer_bar',
        'type'        => 'on_off',
        'desc'        => esc_html__('Would you like to display the Footer Bar?', 'viftech'),
        'std'         => 'off',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Footer Bar Style', 'viftech'),
        'id'          => 'footer_bar_style',
        'type'        => 'radio-image',
        'desc'        => esc_html__('Which footer bar style would you like to use?', 'viftech'),
        'std'         => 'style1',
        'section'	  	=> 'footer'
      ),
      array(
        'label'       => esc_html__('Footer Bar Menu', 'viftech'),
        'id'          => 'footer_bar_menu',
        'type'        => 'menu_select',
        'desc'        => esc_html__('Select menu to be displayed inside the footer bar.', 'viftech' ),
        'section'     => 'footer',
      ),
      array(
        'label'       => esc_html__('Footer Bar Social Links', 'viftech' ),
        'id'          => 'footer_bar_social_link',
        'type'        => 'social-links',
        'desc'        => esc_html__('Add your desired Social Links next to the footer bar here', 'viftech' ),
        'section'     => 'footer',
        'cond'				=> 'footer_bar_style:is(style1)'
      ),
      array(
        'label'       => esc_html__('Footer Bar Text Content','viftech'),
        'id'          => 'footer_bar_content',
        'type'        => 'textarea',
        'desc'        => esc_html__('This content appears on the left side of footer bar.','viftech'),
        'rows'        => '4',
        'section'     => 'footer',
        'cond'				=> 'footer_bar_style:is(style2)'
      ),
      array(
        'id'          => 'footer_tab4',
        'label'       => esc_html__('Measurements', 'viftech'),
        'type'        => 'tab',
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Footer Padding', 'viftech'),
        'id'          => 'footer_padding',
        'type'        => 'spacing',
        'desc'        => esc_html__('You can modify the footer padding here', 'viftech'),
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Sub-Footer Padding', 'viftech'),
        'id'          => 'subfooter_padding',
        'type'        => 'spacing',
        'desc'        => esc_html__('You can modify the subfooter padding here', 'viftech'),
        'section'     => 'footer'
      ),
      array(
        'label'       => esc_html__('Footer Bar Padding', 'viftech'),
        'id'          => 'footerbar_padding',
        'type'        => 'spacing',
        'desc'        => esc_html__('You can modify the footer bar padding here', 'viftech'),
        'section'     => 'footer'
      ),
      array(
        'id'          => 'misc_tab0',
        'label'       => esc_html__('General', 'viftech'),
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Google Maps API Key', 'viftech'),
        'id'          => 'map_api_key',
        'type'        => 'text',
        'desc'        => esc_html__('Please enter the Google Maps Api Key. <small>You need to create a browser API key. For more information, please visit: <a href="https://developers.google.com/maps/documentation/javascript/get-api-key">https://developers.google.com/maps/documentation/javascript/get-api-key</a></small>', 'viftech'),
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Scroll To Top?', 'viftech'),
        'id'          => 'scroll_to_top',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can enable the Scroll To Top button here', 'viftech'),
        'std'         => 'on',
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Extra CSS', 'viftech'),
        'id'          => 'extra_css',
        'type'        => 'css',
        'desc'        => esc_html__('Any CSS that you would like to add to the theme.', 'viftech'),
        'section'     => 'misc'
      ),
      array(
        'id'          => 'misc_tab1',
        'label'       => esc_html__('Instagram Settings', 'viftech'),
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Instagram ID', 'viftech' ),
        'id'          => 'instagram_id',
        'type'        => 'text',
        'desc'        => sprintf(esc_html__('Your Instagram ID, you can find your ID from here: %1$shttp://www.otzberg.net/iguserid/%2$s', 'viftech' ),
        	'<a href="http://www.otzberg.net/iguserid/">',
        	'</a>'
        	),
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Instagram Username', 'viftech' ),
        'id'          => 'instagram_username',
        'type'        => 'text',
        'desc'        => esc_html__('Your Instagram Username', 'viftech' ),
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Access Token', 'viftech' ),
        'id'          => 'instagram_accesstoken',
        'type'        => 'text',
        'desc'        => sprintf(esc_html__('Visit %1$sthis link%2$s in a new tab, sign in with your Instagram account, click on Create a new application and create your own keys in case you dont have already. After that, you can get your Access Token using %3$shttp://instagram.pixelunion.net/%4$s', 'viftech' ),
        	'<a href="http://instagr.am/developer/register/" target="_blank">',
        	'</a>',
        	'<a href="http://instagram.pixelunion.net/" target="_blank">',
        	'</a>'
        	),
        'section'     => 'misc'
      ),
      array(
        'id'          => 'misc_tab2',
        'label'       => esc_html__('Twitter Settings', 'viftech' ),
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'twitter_text',
        'label'       => esc_html__('About the Twitter Settings', 'viftech' ),
        'desc'        => esc_html__('You should fill out these settings if you want to use the Twitter related widgets or Visual Composer Elements', 'viftech' ),
        'type'        => 'textblock',
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Twitter Sharing Cache', 'viftech'),
        'id'          => 'twitter_cache',
        'type'        => 'select',
        'desc'        => esc_html__('Amount of time before the new tweets are fetched.', 'viftech'),
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('1 Hour', 'viftech'),
        	  'value'       => '1h'
        	),
          array(
            'label'       => esc_html__('1 Day', 'viftech'),
            'value'       => '1'
          ),
          array(
            'label'       => esc_html__('7 Days', 'viftech'),
            'value'       => '7'
          ),
          array(
            'label'       => esc_html__('30 Days', 'viftech'),
            'value'       => '30'
          )
        ),
        'std'         => '1',
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Twitter Username', 'viftech' ),
        'id'          => 'twitter_bar_username',
        'type'        => 'text',
        'desc'        => esc_html__('Username to pull tweets for', 'viftech' ),
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Consumer Key', 'viftech' ),
        'id'          => 'twitter_bar_consumerkey',
        'type'        => 'text',
        'desc'        => esc_html__('Visit <a href="https://dev.twitter.com/apps" target="_blank">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already', 'viftech' ),
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Consumer Secret', 'viftech' ),
        'id'          => 'twitter_bar_consumersecret',
        'type'        => 'text',
        'desc'        => esc_html__('Visit <a href="https://dev.twitter.com/apps" target="_blank">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already', 'viftech' ),
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Access Token', 'viftech' ),
        'id'          => 'twitter_bar_accesstoken',
        'type'        => 'text',
        'desc'        => esc_html__('Visit <a href="https://dev.twitter.com/apps" target="_blank">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already', 'viftech' ),
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Access Token Secret', 'viftech' ),
        'id'          => 'twitter_bar_accesstokensecret',
        'type'        => 'text',
        'desc'        => esc_html__('Visit <a href="https://dev.twitter.com/apps" target="_blank">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already', 'viftech' ),
        'section'     => 'misc'
      ),
      array(
        'id'          => 'misc_tab4',
        'label'       => esc_html__('Create Additional Sidebars', 'viftech'),
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'sidebars_text',
        'label'       => esc_html__('About the sidebars', 'viftech'),
        'desc'        => esc_html__('All sidebars that you create here will appear both in the Widgets Page(Appearance > Widgets), from where you will have to configure them, and in the pages, where you will be able to choose a sidebar for each page', 'viftech'),
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'misc'
      ),
      array(
        'label'       => esc_html__('Create Sidebars', 'viftech'),
        'id'          => 'sidebars',
        'type'        => 'list-item',
        'desc'        => esc_html__('Please choose a unique title for each sidebar!', 'viftech'),
        'section'     => 'misc',
        'settings'    => array(
          array(
            'label'       => esc_html__('ID', 'viftech'),
            'id'          => 'id',
            'type'        => 'text',
            'desc'        => esc_html__('Please write a lowercase id, with <strong>no spaces</strong>', 'viftech')
          )
        )
      ),
      array(
        'id'          => 'typography_tab1',
        'label'       => esc_html__('Font Families', 'viftech'),
        'type'        => 'tab',
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Primary Font', 'viftech'),
        'id'          => 'primary_font',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Family Setting for the primary font. Affects all headings.', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Secondary Font', 'viftech'),
        'id'          => 'secondary_font',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Family Setting for the secondary font', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('<EM> Font', 'viftech'),
        'id'          => 'em_font',
        'type'        => 'typography',
        'desc'        => esc_html__('This adds a separate font for styling of EM tags so you can add stylish typographic elements.', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Button Font', 'viftech'),
        'id'          => 'button_font',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Family Setting for the button. Uses the Secondary Font by default.', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Full Menu Font', 'viftech'),
        'id'          => 'fullmenu_font',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Family Setting for the full menu. Uses the Secondary Font by default.', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Font', 'viftech'),
        'id'          => 'mobilemenu_font',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Family Setting for the mobile menu. Uses the Secondary Font by default.', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'id'          => 'typography_tab2',
        'label'       => esc_html__('Typography', 'viftech'),
        'type'        => 'tab',
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Body Font', 'viftech'),
        'id'          => 'body_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Typography Setting for the body.', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Full Menu Font', 'viftech'),
        'id'          => 'fullmenu_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Typography Setting for the full menu', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Full Menu Sub-Menu Font', 'viftech'),
        'id'          => 'fullmenu_sub_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Typography Setting for the sub-menus inside full menu', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Full Menu Social Icons Font-size ', 'viftech'),
        'id'          => 'fullmenu_social_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Typography Setting specifically for the social icons.', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Font', 'viftech'),
        'id'          => 'mobilemenu_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Typography Setting for the mobile menu', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Sub-Menu Font', 'viftech'),
        'id'          => 'mobilemenu_sub_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Typography Setting for the sub-menus inside mobile menu', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Secondary Mobile Menu Font', 'viftech'),
        'id'          => 'mobilemenu_secondary_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Typography Setting for the secondary mobile menu', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Footer Font', 'viftech'),
        'id'          => 'mobilemenu_footer_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Typography Setting for the mobile menu footer', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Widget Title Font', 'viftech'),
        'id'          => 'widget_title_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Typography Setting for the footer widget titles', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'id'          => 'typography_tab3',
        'label'       => esc_html__('Heading Typography', 'viftech'),
        'type'        => 'tab',
        'section'     => 'typography'
      ),
      array(
        'id'          => 'heading_text',
        'label'       => esc_html__('About Heading Typography', 'viftech'),
        'desc'        => esc_html__('These affect all h* tags inside the theme, so use wisely. Some particular headings may need additional css to target.', 'viftech'),
        'type'        => 'textblock',
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Heading 1', 'viftech'),
        'id'          => 'h1_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the H1 tag', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Heading 2', 'viftech'),
        'id'          => 'h2_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the H2 tag', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Heading 3', 'viftech'),
        'id'          => 'h3_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the H3 tag', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Heading 4', 'viftech'),
        'id'          => 'h4_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the H4 tag', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Heading 5', 'viftech'),
        'id'          => 'h5_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the H5 tag', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Heading 6', 'viftech'),
        'id'          => 'h6_type',
        'type'        => 'typography',
        'desc'        => esc_html__('Font Settings for the H6 tag', 'viftech'),
        'section'     => 'typography'
      ),
      array(
        'id'          => 'typography_tab4',
        'label'       => esc_html__('Font Support', 'viftech'),
        'type'        => 'tab',
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Google Font Subsets', 'viftech'),
        'id'          => 'font_subsets',
        'type'        => 'radio',
        'desc'        => esc_html__('You can add additional character subset specific to your language.', 'viftech'),
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('No Subset', 'viftech'),
        	  'value'       => 'no-subset'
        	),
        	array(
        	  'label'       => esc_html__('Latin Extended', 'viftech'),
        	  'value'       => 'latin-ext'
        	),
          array(
            'label'       => esc_html__('Greek', 'viftech'),
            'value'       => 'greek'
          ),
          array(
            'label'       => esc_html__('Cyrillic', 'viftech'),
            'value'       => 'cyrillic'
          ),
          array(
            'label'       => esc_html__('Vietnamese', 'viftech'),
            'value'       => 'vietnamese'
          )
        ),
        'std'         => 'no-subset',
        'section'     => 'typography'
      ),
      array(
        'id'          => 'typekit_text',
        'label'       => esc_html__('About Typekit Support', 'viftech'),
        'desc'        => esc_html__('Please make sure that you enter your Typekit ID or the fonts wont work. After adding Typekit Font Names, these names will appear on the font selection dropdown on the Font Families tab.', 'viftech'),
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'typography'
      ),
      array(
        'label'       => esc_html__('Typekit Kit ID', 'viftech'),
        'id'          => 'typekit_id',
        'type'        => 'text',
        'desc'        => esc_html__('Paste the provided Typekit Kit ID. <small>Usually 6-7 random letters</small>', 'viftech'),
        'section'     => 'typography',
      ),
      array(
        'label'       => esc_html__('Typekit Font Names', 'viftech'),
        'id'          => 'typekit_fonts',
        'type'        => 'text',
        'desc'        => esc_html__('Enter your Typekit Font Name, seperated by comma. For example: futura-pt,aktiv-grotesk <strong>Do not leave spaces between commas</strong>', 'viftech'),
        'section'     => 'typography',
      ),
      array(
        'label'       => esc_html__('Self Hosted Fonts', 'viftech'),
        'id'          => 'self_hosted_fonts',
        'type'        => 'list-item',
        'settings'    => array(
        	array(
        	  'label'       => esc_html__('Font Stylesheet URL', 'viftech'),
        	  'id'          => 'font_url',
        	  'type'        => 'text',
        	  'desc'        => esc_html__('URL of the font stylesheet (.css file) you want to use.', 'viftech'),
        	  'section'     => 'typography',
        	),
        	array(
        	  'label'       => esc_html__('Font Family Names', 'viftech'),
        	  'id'          => 'font_name',
        	  'type'        => 'text',
        	  'desc'        => esc_html__('Enter your Font Family Name, use the name that will be used in css. For example: futura-pt, aktiv-grotesk. After saving, you will be able to use this name in the typography settings.', 'viftech'),
        	  'section'     => 'typography',
        	),
        ),
        'section'     => 'typography'
      ),
      array(
        'id'          => 'customization_tab1',
        'label'       => esc_html__('Backgrounds', 'viftech'),
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Header Background', 'viftech'),
        'id'          => 'header_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the header.', 'viftech'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Fixed Header Background', 'viftech'),
        'id'          => 'fixed_header_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the fixed header.', 'viftech'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Header - Style 1 Open Background', 'viftech'),
        'id'          => 'header_style1_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the header - style1 when it is open.', 'viftech'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Search Background', 'viftech'),
        'id'          => 'search_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the search form.', 'viftech'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Footer Background', 'viftech'),
        'id'          => 'footer_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the footer', 'viftech'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Sub - Footer Background', 'viftech'),
        'id'          => 'subfooter_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the subfooter', 'viftech'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Footer Bar Background', 'viftech'),
        'id'          => 'footerbar_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the footer bar', 'viftech'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Background', 'viftech'),
        'id'          => 'mobilemenu_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the Mobile Menu', 'viftech'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('404 Page Background', 'viftech'),
        'id'          => 'notfound_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the 404 Page', 'viftech'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Preloader Background', 'viftech'),
        'id'          => 'preloader_bg',
        'type'        => 'background',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('Background settings for the Preloader', 'viftech'),
        'section'     => 'customization'
      ),
      array(
        'id'          => 'customization_tab2',
        'label'       => esc_html__('Colors', 'viftech'),
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Accent Color', 'viftech'),
        'id'          => 'accent_color',
        'type'        => 'colorpicker',
        'desc'        => esc_html__('You can modify the accent color here, default red you see in some areas.', 'viftech'),
        'class'				=> 'ot-colorpicker-opacity',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Icon Color', 'viftech'),
        'id'          => 'mobile_menu_icon_color',
        'type'        => 'colorpicker',
        'desc'        => esc_html__('You can modify the hamburger menu icon color here.', 'viftech'),
        'class'				=> 'ot-colorpicker-opacity',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Post Category Color', 'viftech'),
        'id'          => 'post_category_color',
        'type'        => 'colorpicker',
        'desc'        => esc_html__('Changes the color of the post category links.', 'viftech'),
        'class'				=> 'ot-colorpicker-opacity',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Footer Widget Title Color', 'viftech'),
        'id'          => 'footer_widget_title_color',
        'type'        => 'colorpicker',
        'desc'        => esc_html__('You can modify the footer widget title color here', 'viftech'),
        'class'				=> 'ot-colorpicker-opacity',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Footer Text Color', 'viftech'),
        'id'          => 'footer_text_color',
        'type'        => 'colorpicker',
        'desc'        => esc_html__('You can modify the footer text color here', 'viftech'),
        'class'				=> 'ot-colorpicker-opacity',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Sub - Footer Text Color', 'viftech'),
        'id'          => 'subfooter_text_color',
        'type'        => 'colorpicker',
        'desc'        => esc_html__('You can modify the subfooter text color here', 'viftech'),
        'class'				=> 'ot-colorpicker-opacity',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Preloader Icon Color', 'viftech'),
        'id'          => 'preloader_color',
        'type'        => 'colorpicker',
        'desc'        => esc_html__('This will change the color of the preloader icon.', 'viftech'),
        'class'				=> 'ot-colorpicker-opacity',
        'section'     => 'customization'
      ),
      array(
        'id'          => 'customization_tab3',
        'label'       => esc_html__('Link Colors', 'viftech'),
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('General Link Color', 'viftech'),
        'id'          => 'general_link_color',
        'type'        => 'link_color',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('You can modify the general link color here', 'viftech'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Full Menu Link Color', 'viftech'),
        'id'          => 'fullmenu_link_color_dark',
        'type'        => 'link_color',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('You can modify the link color of the full menu.', 'viftech'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Link Color', 'viftech'),
        'id'          => 'mobilemenu_link_color',
        'type'        => 'link_color',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('You can modify the link color of the mobile menu.', 'viftech'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Mobile Menu Secondary Link Color', 'viftech'),
        'id'          => 'mobilemenu_secondary_link_color',
        'type'        => 'link_color',
        'desc'        => esc_html__('You can modify the link color of the secondary mobile menu.', 'viftech'),
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Footer Link Color', 'viftech'),
        'id'          => 'footer_link_color',
        'type'        => 'link_color',
        'class'				=> 'ot-colorpicker-opacity',
        'desc'        => esc_html__('You can modify the footer link color here', 'viftech'),
        'section'     => 'customization'
      ),
      array(
        'id'          => 'customization_tab4',
        'label'       => esc_html__('Page Transition', 'viftech'),
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Page Transition', 'viftech'),
        'id'          => 'page_transition',
        'type'        => 'on_off',
        'desc'        => esc_html__('This will enable an animation between loading your pages.', 'viftech'),
        'std'         => 'on',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Page Transition Style', 'viftech'),
        'id'          => 'page_transition_style',
        'type'        => 'select',
        'desc'        => esc_html__('Select the effect you want to use for page transition', 'viftech'),
        'choices'     => array(
        	array(
        	  'label'       => esc_html__('Fade', 'viftech'),
        	  'value'       => 'thb-fade'
        	),
          array(
            'label'       => esc_html__('Fade Up', 'viftech'),
            'value'       => 'thb-fade-up'
          ),
          array(
            'label'       => esc_html__('Fade Down', 'viftech'),
            'value'       => 'thb-fade-down'
          )
        ),
        'std'         => 'thb-fade',
        'section'     => 'customization'
      ),
      array(
      	'label'       => esc_html__('Fade In Speed', 'viftech' ),
        'id'          => 'page_transition_in_speed',
        'std'         => '1000',
        'type'        => 'numeric-slider',
        'section'     => 'customization',
        'min_max_step'=> '100,3000,50',
        'desc'        => esc_html__('The speed of the animation in milisecconds.', 'viftech'),
      ),
      array(
      	'label'       => esc_html__('Fade Out Speed', 'viftech' ),
        'id'          => 'page_transition_out_speed',
        'std'         => '500',
        'type'        => 'numeric-slider',
        'section'     => 'customization',
        'min_max_step'=> '100,3000,50',
        'desc'        => esc_html__('The speed of the animation in milisecconds.', 'viftech'),
      ),
      array(
        'id'          => 'customization_tab5',
        'label'       => esc_html__('Preloader / Lazy Load', 'viftech'),
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Preloading Type', 'viftech' ),
        'id'          => 'viftech_preload_type',
        'type'        => 'radio',
        'desc'        => esc_html__('This is the hexagon preloader you see on some areas.', 'viftech'),
        'choices'     => array(
          array(
            'label'       => esc_html__('Full-Screen Preloader', 'viftech'),
            'value'       => 'preloader'
          ),
          array(
            'label'       => esc_html__('Lazy Load Images', 'viftech'),
            'value'       => 'lazyload'
          ),
          array(
            'label'       => esc_html__('No Preloader', 'viftech'),
            'value'       => 'none'
          )
        ),
        'std'         => 'preloader',
        'section'     => 'customization'
      ),
      array(
        'id'          => 'customization_tab6',
        'label'       => esc_html__('Other', 'viftech'),
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => esc_html__('Right Click Protection','viftech'),
        'id'          => 'right_click',
        'type'        => 'on_off',
        'desc'        => esc_html__('You can disable right click here.','viftech'),
        'section'     => 'customization',
        'std'         => 'on'
      ),
      array(
        'label'       => esc_html__('Right Click Text Content','viftech'),
        'id'          => 'right_click_content',
        'type'        => 'textarea',
        'desc'        => esc_html__('This content appears inside the right click protection overlay.','viftech'),
        'rows'        => '4',
        'section'     => 'customization',
        'cond'				=> 'right_click:is(on)'
      ),
      array(
        'label'       => esc_html__('Google Theme Color', 'viftech'),
        'id'          => 'viftech_google_theme_color',
        'type'        => 'colorpicker',
        'desc'        => esc_html__('Applied only on Android mobile devices, click <a href="https://developers.google.com/web/updates/2014/11/Support-for-theme-color-in-Chrome-39-for-Android" target="_blank">here</a> to learn more about this', 'viftech'),
        'section'     => 'customization'
      )
    )
  );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
}

/**
 * Gradient option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 * @updated   2.2.0
 */
if ( ! function_exists( 'ot_type_gradient' ) ) {
  
  function ot_type_gradient( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
    
    /* verify a description */
    $has_desc = $field_desc ? true : false;
    
    /* format setting outer wrapper */
    echo '<div class="format-setting type-colorpicker ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';
      
      /* description */
      echo $has_desc ? '<div class="description">' . wp_specialchars_decode( $field_desc ) . '</div>' : '';
      
      /* format setting inner wrapper */
      echo '<div class="format-setting-inner">'; 

        /* build colorpicker */  
        echo '<div class="option-tree-ui-colorpicker-input-wrap">';
          $field_id_1 = $field_id.'_1';
          $field_name_1 = $field_name.'[0]';
          $field_value_1 = isset($field_value[0]) ? $field_value[0] : '';
          /* colorpicker JS */      
          echo '<script>jQuery(document).ready(function($) { OT_UI.bind_colorpicker("' . esc_attr( $field_id_1 ) . '"); });</script>';
          
          /* input */
          echo '<input type="text" name="'.esc_attr($field_name_1).'" id="' . esc_attr( $field_id_1 ) . '" value="' . esc_attr( $field_value_1 ) . '" class="hide-color-picker ot-colorpicker-opacity ' . esc_attr( $field_class ) . '" />';
        
        echo '</div>';
        
        /* build colorpicker 2 */  
        echo '<div class="option-tree-ui-colorpicker-input-wrap">';
          
          $field_id_2 = $field_id.'_2';
          $field_name_2 = $field_name.'[1]';
          $field_value_2 = isset($field_value[1]) ? $field_value[1] : '';
          /* colorpicker JS */      
          echo '<script>jQuery(document).ready(function($) { OT_UI.bind_colorpicker("' . esc_attr( $field_id_2 ) . '"); });</script>';
          
          /* input */
          echo '<input type="text" name="'.esc_attr($field_name_2).'" id="' . esc_attr( $field_id_2 ) . '" value="' . esc_attr( $field_value_2 ) . '" class="hide-color-picker ot-colorpicker-opacity ' . esc_attr( $field_class ) . '" />';
        
        echo '</div>';
      
      echo '</div>';

    echo '</div>';
    
  }
  
}

/**
 * Menu Select option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_menu_select' ) ) {
  
  function ot_type_menu_select( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
    
    /* verify a description */
    $has_desc = $field_desc ? true : false;
    
    /* format setting outer wrapper */
    echo '<div class="format-setting type-category-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';
      
      /* description */
      echo $has_desc ? '<div class="description">' . wp_specialchars_decode( $field_desc ) . '</div>' : '';
      
      /* format setting inner wrapper */
      echo '<div class="format-setting-inner">';
      
        /* build category */
        echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="option-tree-ui-select ' . $field_class . '">';
        
        /* get category array */
        $menus = get_terms( 'nav_menu');
        
        /* has cats */
        if ( ! empty( $menus ) ) {
          echo '<option value="">-- ' . esc_html__( 'Choose One', 'viftech' ) . ' --</option>';
          foreach ( $menus as $menu ) {
            echo '<option value="' . esc_attr( $menu->slug ) . '"' . selected( $field_value, $menu->slug, false ) . '>' . esc_attr( $menu->name ) . '</option>';
          }
        } else {
          echo '<option value="">' . esc_html__( 'No Menus Found', 'viftech' ) . '</option>';
        }
        
        echo '</select>';
      
      echo '</div>';
    
    echo '</div>';
    
  }
  
}