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
	$imagepath =  trailingslashit( get_stylesheet_directory_uri() ) . 'images/';

	// Background Defaults
	$banner_background_defaults = array(
		'color' => '#222222',
		'image' => $imagepath . 'dark-noise-2.jpg',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'scroll' );
        
        // Logo Image Defaults
        $logo_image_defaults = array(
            'width' => '150',
            'height' => '80',
            'image' => $imagepath . 'inc/shutterbug/images/shutterbug_web.png'
        );

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
		'name' => esc_html__( 'Podcast1', 'bookstore' ),
		'desc' => esc_html__( 'Enter your Podcast1 RSS Feed URL.', 'bookstore' ),
		'id' => 'podcast1',
		'std' => '',
                'fawe' => 'fa-podcast',
		'type' => 'text' );
        
        $options[] = array(
		'name' => esc_html__( 'Podcast2', 'bookstore' ),
		'desc' => esc_html__( 'Enter your Podcast2 RSS Feed URL.', 'bookstore' ),
		'id' => 'podcast2',
		'std' => '',
                'fawe' => 'fa-podcast',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Advanced Settings', 'bookstore' ),
		'type' => 'heading' );

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
        
        $options[] = array(
		'name' => esc_html__( 'Banner Background Settings', 'bookstore' ),
		'desc' => esc_html__( 'The Banner Background system below is retained for historic reasons only. The Migdaloz theme does not actually include the banner section.', 'bookstore' ),
		'type' => 'info' );
        
        $options[] = array(
		'name' =>  esc_html__( 'Banner Background', 'bookstore' ),
		'desc' => esc_html__( 'Select an image and background color for the homepage banner.', 'bookstore' ),
		'id' => 'banner_background',
		'std' => $banner_background_defaults,
		'type' => 'background' );
        
        $options[] = array(
		'name' => esc_html__( 'More Basic Settings', 'bookstore' ),
		'type' => 'heading' );
        
        $options[] = array(
		'name' => esc_html__( 'Home Background Color', 'bookstore' ),
		'desc' => esc_html__( 'Select the background color for the main section.', 'bookstore' ),
		'id' => 'home_bg_color',
		'std' => '#2c2c4b',
		'type' => 'color' );
        
        $options[] = array(
		'name' => esc_html__( 'Page Content Background Color', 'bookstore' ),
		'desc' => esc_html__( 'Select the background color for the page content.', 'bookstore' ),
		'id' => 'pg_ct_bg_color',
		'std' => '#021533',
		'type' => 'color' );
        
        $options[] = array(
		'name' => esc_html__( 'Page Background Color', 'bookstore' ),
		'desc' => esc_html__( 'Select the background color for the page background.', 'bookstore' ),
		'id' => 'pg_bg_color',
		'std' => '#212121',
		'type' => 'color' );
        
        
        $options[] = array(
		'name' =>  esc_html__( 'Regular Page Header Background Image', 'bookstore' ),
		'desc' => esc_html__( 'Select a default image for the header, to be used on regular pages and posts.', 'bookstore' ),
		'id' => 'header_background_image',
		'std' => $header_defaults,
		'type' => 'upload' );
        
        $options[] = array(
		'name' =>  esc_html__( 'Home Header Background Image', 'bookstore' ),
		'desc' => esc_html__( 'Select a default image for the header, to be used just on the front oe home page.', 'bookstore' ),
		'id' => 'home_header_background_image',
		'std' => $header_defaults,
		'type' => 'upload' );
        
        $options[] = array(
		'name' =>  esc_html__( 'Default Archive Featured Image', 'bookstore' ),
		'desc' => esc_html__( 'Select a default image for archive pages, such as searches, if there is no featured image set.', 'bookstore' ),
		'id' => 'default_mini_archive_image',
		'std' => $header_defaults,
		'type' => 'upload' );
        
        $options[] = array(
		'name' => esc_html__( 'Header Verse', 'bookstore' ),
		'desc' => esc_html__( 'Type a Bible Verse to appear in the Header', 'bookstore' ),
		'id' => 'header_verse',
		'type' => 'text' );
        
        $options[] = array(
		'name' => esc_html__( 'Frontpage Settings', 'bookstore' ),
		'type' => 'heading' );
        
        $options[] = array(
		'name' => esc_html__( 'Midgaloz Theme Frontpage', 'bookstore' ),
		'desc' => esc_html__( 'The first six posts in this theme will show up in the colored panels on the front page. The background picture - made clearer on mouseover - should be the post\'s featured image. However, you can define default background images here, in case your post does not have a featured image.', 'bookstore' ),
		'type' => 'info' );
        
        $options[] = array(
		'name' =>  esc_html__( 'Article 1 Background Image', 'bookstore' ),
		'desc' => esc_html__( 'Select a default image for Article 1', 'bookstore' ),
		'id' => 'art1_background_image',
		'std' => $header_defaults,
		'type' => 'upload' );
        
        $options[] = array(
		'name' =>  esc_html__( 'Article 2 Background Image', 'bookstore' ),
		'desc' => esc_html__( 'Select a default image for Article 2', 'bookstore' ),
		'id' => 'art2_background_image',
		'std' => $header_defaults,
		'type' => 'upload' );
        
        $options[] = array(
		'name' =>  esc_html__( 'Article 3 Background Image', 'bookstore' ),
		'desc' => esc_html__( 'Select a default image for Article 3', 'bookstore' ),
		'id' => 'art3_background_image',
		'std' => $header_defaults,
		'type' => 'upload' );
        
        $options[] = array(
		'name' =>  esc_html__( 'Article 4 Background Image', 'bookstore' ),
		'desc' => esc_html__( 'Select a default image for Article 4', 'bookstore' ),
		'id' => 'art4_background_image',
		'std' => $header_defaults,
		'type' => 'upload' );
        
        $options[] = array(
		'name' =>  esc_html__( 'Article 5 Background Image', 'bookstore' ),
		'desc' => esc_html__( 'Select a default image for Article 5', 'bookstore' ),
		'id' => 'art5_background_image',
		'std' => $header_defaults,
		'type' => 'upload' );
        
        $options[] = array(
		'name' =>  esc_html__( 'Article 6 Background Image', 'bookstore' ),
		'desc' => esc_html__( 'Select a default image for Article 6', 'bookstore' ),
		'id' => 'art6_background_image',
		'std' => $header_defaults,
		'type' => 'upload' );
        
        
         
       

	if( bookstore_is_woocommerce_active() ) {
		$options[] = array(
		'name' => esc_html__( 'Webstore Settings', 'bookstore' ),
		'type' => 'heading' );
                
                $webstore_plugin = "";
                if (in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
                    $webstore_plugin = "Woocommerce";
                } else {
                    if (in_array( 'classic-commerce/classic-commerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
                        $webstore_plugin = "Classic Commerce";
                    }
                }
                
                if ($webstore_plugin == "") {
                    $webstore_plugin = "There is no webstore plugin installed.";                 
                } else {
                    $webstore_plugin = "The webstore plugin installed in this site is **".$webstore_plugin."**.";
                }
                
                $options[] = array(
		'name' => esc_html__( 'Webstore Plugin', 'bookstore' ),
		'desc' => esc_html__( $webstore_plugin, 'bookstore' ),
		'type' => 'info' );
                
                $options[] = array(
		'name' =>  esc_html__( 'Webstore Header Background Image', 'bookstore' ),
		'desc' => esc_html__( 'Select a default image for the header, to be used on webstore pages.', 'bookstore' ),
		'id' => 'webstore_background_image',
		'std' => $header_defaults,
		'type' => 'upload' );

		$options[] = array(
			'name' => esc_html__('Shop sidebar', 'bookstore'),
			'desc' => esc_html__('Display the sidebar on the WooCommerce Shop page', 'bookstore'),
			'id' => 'woocommerce_shopsidebar',
			'std' => '1',
			'type' => 'checkbox');

		$options[] = array(
			'name' => esc_html__('Products sidebar', 'bookstore'),
			'desc' => esc_html__('Display the sidebar on the WooCommerce Single Product page', 'bookstore'),
			'id' => 'woocommerce_productsidebar',
			'std' => '1',
			'type' => 'checkbox');

		$options[] = array(
			'name' => esc_html__( 'Cart, Checkout & My Account sidebars', 'bookstore' ),
			'desc' => esc_html__( 'The &lsquo;Cart&rsquo;, &lsquo;Checkout&rsquo; and &lsquo;My Account&rsquo; pages are displayed using shortcodes. To remove the sidebar from these Pages, simply edit each Page and change the Template (in the Page Attributes Panel) to the &lsquo;Full-width Page Template&rsquo;.', 'bookstore' ),
			'type' => 'info' );

		$options[] = array(
			'name' => esc_html__('Shop Breadcrumbs', 'bookstore'),
			'desc' => esc_html__('Display the breadcrumbs on the WooCommerce pages', 'bookstore'),
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

	} // end of test to see if Woocommerce or Classic Commerce is active

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
