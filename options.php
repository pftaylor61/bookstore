<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace( "/\W/", "_", strtolower( $themename ) );
	return $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'bookstore'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// If using image radio buttons, define a directory path
	$imagepath =  trailingslashit( get_template_directory_uri() ) . 'images/';

	// Background Defaults
	$background_defaults = array(
		'color' => '#222222',
		'image' => $imagepath . 'dark-noise-2.jpg',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'scroll' );

	// Editor settings
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	// Footer Position settings
	$footer_position_settings = array(
		'left' => esc_html__( 'Left aligned', 'bookstore' ),
		'center' => esc_html__( 'Center aligned', 'bookstore' ),
		'right' => esc_html__( 'Right aligned', 'bookstore' )
	);

	// Number of shop products
	$shop_products_settings = array(
		'4' => esc_html__( '4 Products', 'bookstore' ),
		'8' => esc_html__( '8 Products', 'bookstore' ),
		'12' => esc_html__( '12 Products', 'bookstore' ),
		'16' => esc_html__( '16 Products', 'bookstore' ),
		'20' => esc_html__( '20 Products', 'bookstore' ),
		'24' => esc_html__( '24 Products', 'bookstore' ),
		'28' => esc_html__( '28 Products', 'bookstore' )
	);

	$options = array();

	$options[] = array(
		'name' => esc_html__( 'Basic Settings', 'bookstore' ),
		'type' => 'heading' );

	$options[] = array(
		'name' => esc_html__( 'Background', 'bookstore' ),
		'desc' => sprintf( wp_kses( __( 'If you&rsquo;d like to replace or remove the default background image, use the <a href="%1$s" title="Custom background">Appearance &gt; Background</a> menu option.', 'bookstore' ), array( 
			'a' => array( 
				'href' => array(),
				'title' => array() )
			) ), admin_url( 'themes.php?page=custom-background' ) ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__( 'Logo', 'bookstore' ),
		'desc' => sprintf( wp_kses( __( 'If you&rsquo;d like to replace or remove the default logo, use the <a href="%1$s" title="Custom header">Appearance &gt; Header</a> menu option.', 'bookstore' ), array( 
			'a' => array( 
				'href' => array(),
				'title' => array() )
			) ), admin_url( 'themes.php?page=custom-header' ) ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__( 'Social Media Settings', 'bookstore' ),
		'desc' => esc_html__( 'Enter the URLs for your Social Media platforms. You can also optionally specify whether you want these links opened in a new browser tab/window.', 'bookstore' ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__('Open links in new Window/Tab', 'bookstore'),
		'desc' => esc_html__('Open the social media links in a new browser tab/window', 'bookstore'),
		'id' => 'social_newtab',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => esc_html__( 'Twitter', 'bookstore' ),
		'desc' => esc_html__( 'Enter your Twitter URL.', 'bookstore' ),
		'id' => 'social_twitter',
		'std' => '',
                'fawe' => 'fa-twitter',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Facebook', 'bookstore' ),
		'desc' => esc_html__( 'Enter your Facebook URL.', 'bookstore' ),
		'id' => 'social_facebook',
		'std' => '',
                'fawe' => 'fa-facebook',
		'type' => 'text' );
		
	$options[] = array(
		'name' => esc_html__( 'MeWe', 'bookstore' ),
		'desc' => esc_html__( 'Enter your MeWe URL.', 'bookstore' ),
		'id' => 'social_mewe',
		'std' => '',
                'fawe' => 'fa-mewe',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'TripAdvisor', 'bookstore' ),
		'desc' => esc_html__( 'Enter your TripAdvisor URL.', 'bookstore' ),
		'id' => 'social_tripadvisor',
		'std' => '',
                'fawe' => 'fa-tripadvisor',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'LinkedIn', 'bookstore' ),
		'desc' => esc_html__( 'Enter your LinkedIn URL.', 'bookstore' ),
		'id' => 'social_linkedin',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'SlideShare', 'bookstore' ),
		'desc' => esc_html__( 'Enter your SlideShare URL.', 'bookstore' ),
		'id' => 'social_slideshare',
		'std' => '',
		'type' => 'text' );

	
	$options[] = array(
		'name' => esc_html__( 'Tumblr', 'bookstore' ),
		'desc' => esc_html__( 'Enter your Tumblr URL.', 'bookstore' ),
		'id' => 'social_tumblr',
		'std' => '',
                'fawe' => 'fa-tumblr',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'GitHub', 'bookstore' ),
		'desc' => esc_html__( 'Enter your GitHub URL.', 'bookstore' ),
		'id' => 'social_github',
		'std' => '',
                'fawe' => 'fa-github',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Bitbucket', 'bookstore' ),
		'desc' => esc_html__( 'Enter your Bitbucket URL.', 'bookstore' ),
		'id' => 'social_bitbucket',
		'std' => '',
                'fawe' => 'fa-bitbucket',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'YouTube', 'bookstore' ),
		'desc' => esc_html__( 'Enter your YouTube URL.', 'bookstore' ),
		'id' => 'social_youtube',
		'std' => '',
                'fawe' => 'fa-youtube',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Instagram', 'bookstore' ),
		'desc' => esc_html__( 'Enter your Instagram URL.', 'bookstore' ),
		'id' => 'social_instagram',
		'std' => '',
                'fawe' => 'fa-instagram',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Flickr', 'bookstore' ),
		'desc' => esc_html__( 'Enter your Flickr URL.', 'bookstore' ),
		'id' => 'social_flickr',
		'std' => '',
                'fawe' => 'fa-flickr',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Pinterest', 'bookstore' ),
		'desc' => esc_html__( 'Enter your Pinterest URL.', 'bookstore' ),
		'id' => 'social_pinterest',
		'std' => '',
                'fawe' => 'fa-pinterest',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'RSS', 'bookstore' ),
		'desc' => esc_html__( 'Enter your RSS Feed URL.', 'bookstore' ),
		'id' => 'social_rss',
		'std' => '',
                'fawe' => 'fa-rss',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Advanced settings', 'bookstore' ),
		'type' => 'heading' );

	$options[] = array(
		'name' =>  esc_html__( 'Banner Background', 'bookstore' ),
		'desc' => esc_html__( 'Select an image and background color for the homepage banner.', 'bookstore' ),
		'id' => 'banner_background',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => esc_html__( 'Footer Background Color', 'bookstore' ),
		'desc' => esc_html__( 'Select the background color for the footer.', 'bookstore' ),
		'id' => 'footer_color',
		'std' => '#222222',
		'type' => 'color' );

	$options[] = array(
		'name' => esc_html__( 'Footer Content', 'bookstore' ),
		'desc' => esc_html__( 'Enter the text you&lsquo;d like to display in the footer. This content will be displayed just below the footer widgets. It&lsquo;s ideal for displaying your copyright message or credits.', 'bookstore' ),
		'id' => 'footer_content',
		'std' => bookstore_get_credits(),
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => esc_html__( 'Footer Content Position', 'bookstore' ),
		'desc' => esc_html__( 'Select what position you would like the footer content aligned to.', 'bookstore' ),
		'id' => 'footer_position',
		'std' => 'center',
		'type' => 'select',
		'class' => 'mini',
		'options' => $footer_position_settings );

	 if( bookstore_is_commerce_active() ) {
		$options[] = array(
		'name' => esc_html__( 'Commerce settings', 'bookstore' ),
		'type' => 'heading' );

		$options[] = array(
			'name' => esc_html__('Shop sidebar', 'bookstore'),
			'desc' => esc_html__('Display the sidebar on the Commerce Shop page', 'bookstore'),
			'id' => 'woocommerce_shopsidebar',
			'std' => '1',
			'type' => 'checkbox');

		$options[] = array(
			'name' => esc_html__('Products sidebar', 'bookstore'),
			'desc' => esc_html__('Display the sidebar on the Commerce Single Product page', 'bookstore'),
			'id' => 'woocommerce_productsidebar',
			'std' => '1',
			'type' => 'checkbox');

		$options[] = array(
			'name' => esc_html__( 'Cart, Checkout & My Account sidebars', 'bookstore' ),
			'desc' => esc_html__( 'The &lsquo;Cart&rsquo;, &lsquo;Checkout&rsquo; and &lsquo;My Account&rsquo; pages are displayed using shortcodes. To remove the sidebar from these Pages, simply edit each Page and change the Template (in the Page Attributes Panel) to the &lsquo;Full-width Page Template&rsquo;.', 'bookstore' ),
			'type' => 'info' );

		$options[] = array(
			'name' => esc_html__('Shop Breadcrumbs', 'bookstore'),
			'desc' => esc_html__('Display the breadcrumbs on the Commerce pages', 'bookstore'),
			'id' => 'woocommerce_breadcrumbs',
			'std' => '1',
			'type' => 'checkbox');

		$options[] = array(
			'name' => esc_html__( 'Shop Products', 'bookstore' ),
			'desc' => esc_html__( 'Select the number of products to display on the shop page.', 'bookstore' ),
			'id' => 'shop_products',
			'std' => '12',
			'type' => 'select',
			'class' => 'mini',
			'options' => $shop_products_settings );

	 }

	return $options;
}

add_action( 'optionsframework_after','bookstore_options_display_sidebar' );

/**
 * dewi admin sidebar
 */
function bookstore_options_display_sidebar() { 
        // replaceable variables
        $ocws_theme_screenshot_thumb = "screenshot400.png";
        $mycurtheme = wp_get_theme();
        $ocws_theme_op_text = $mycurtheme->get('Description');
        
        $ocws_theme_op_header = "About ".$mycurtheme->get('Name');
        
	 ?>
        <div id="optionsframework-sidebar">
		<div class="metabox-holder">
	    	<div class="ocws_postbox">
	    		<h3><?php esc_attr_e( $ocws_theme_op_header, 'bookstore' ); ?></h3>
                        <img src="<?php echo get_stylesheet_directory_uri().'/assets/'.$ocws_theme_screenshot_thumb; ?>" style="margin-right:auto; margin-left:auto; width:300px;" />
      			<div class="ocws_inside_box"> 
                            <?php echo $ocws_theme_op_text; ?>
	      			
      			</div><!-- ocws_inside_box -->
	    	</div><!-- .ocws_postbox -->
	  	</div><!-- .metabox-holder -->
	</div><!-- #optionsframework-sidebar -->
        
        
<?php
}
?>
