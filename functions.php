<?php 
	function bookstore_style_js(){
		wp_register_style('link',get_template_directory_uri().'/css/bootstrap.min.css');
		wp_register_style('themestyle',get_template_directory_uri(),array('link'));
		wp_register_style('social',get_template_directory_uri().'/css/bootstrap-social.css');
		wp_register_style('font',get_template_directory_uri().'/font-awesome/css/font-awesome.min.css');

		wp_enqueue_style('themestyle');
		wp_enqueue_style('font');
		wp_enqueue_style('social');
	}
	add_action('wp_enqueue_scripts','bookstore_style_js');

	function bookstore_default_function(){
		add_theme_support('custom-header');
		add_theme_support('custom-background');
		add_theme_support('post-thumbnails');

		load_theme_textdomain('bookstore',get_template_directory_uri().'/languages');

		register_nav_menus(array(
			'top_menu'=>__('Top Menu','bookstore'),
			'main_menu'=>__('Main Menu','bookstore')
			));
	}
	add_action('after_setup_theme','bookstore_default_function');

	
	require_once('navwalker.php');

	function details($v){
		$cont = explode(" ", get_the_content());
		$less_content = array_slice($cont,0,$v);
		echo implode(" ", $less_content);
	}

	function bookstore_sidebars(){

		register_sidebar(array(
			'name'=>'Left Sidebar',
			'id'=>'left_sidebar',
			'description'=>'This the left Sidebar area of the theme',
			'before_widget'=>'',
			'after_widget'=>'',
			'before_title'=>'<h3 class="contitle">',
			'after_title'=>'</h3>'

		));
		register_sidebar(array(
			'name'=>'Footer widget one',
			'id'=>'footer_one',
			'before_widget'=>'',
			'after_widget'=>'',
			'before_title'=>'<h3>',
			'after_title'=>'</h3>'
			));
		register_sidebar(array(
			'name'=>'Footer widget two',
			'id'=>'footer_two',
			'before_widget'=>'',
			'after_widget'=>'',
			'before_title'=>'<h3>',
			'after_title'=>'</h3>'
			));
		register_sidebar(array(
			'name'=>'Footer widget three',
			'id'=>'footer_three',
			'before_widget'=>'',
			'after_widget'=>'',
			'before_title'=>'<h3>',
			'after_title'=>'</h3>'
			));
		register_sidebar(array(
			'name'=>'Footer widget four',
			'id'=>'footer_four',
			'before_widget'=>'',
			'after_widget'=>'',
			'before_title'=>'<h3>',
			'after_title'=>'</h3>'
			));
	}
	add_action('widgets_init','bookstore_sidebars');
	
	function custom_pagination() {
	    global $wp_query;
	    $big = 999999999;
	    $pages = paginate_links(array(
	        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
	        'format' => '?page=%#%',
	        'current' => max(1, get_query_var('paged')),
	        'total' => $wp_query->max_num_pages,
	        'type' => 'array',
	        'prev_next' => TRUE,
	        'prev_text' => 'PREV',
	        'next_text' => 'NEXT',
	            ));
	    if (is_array($pages)) {
	        $current_page = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	        echo '<nav><ul class="pagination">';
	        foreach ($pages as $i => $page) {
	            if ($current_page == 1 && $i == 0) {
	                echo "<li class='active'>$page</li>";
	            } else {
	                if ($current_page != 1 && $current_page == $i) {
	                    echo "<li class='active'>$page</li>";
	                } else {
	                    echo "<li>$page</li>";
	                }
	            }
	        }
	        echo '</ul></nav>';
	    }
	}

	function bookstore_post_types(){

		register_post_type('feature',array(
			'public'=>true,
			'label'=>'feature',
			'labels'=>array(
				'name' => 'Featured Books',
				'singuler_name' => 'Featured Book',
				'add_new' => 'Add New Featured Book',
				),
			'supports'=>array('title','thumbnail')
			));

		register_post_type('populer',array(
			'public'=>true,
			'label'=>'populer',
			'labels'=>array(
				'name' => 'Populer Books',
				'singuler_name' => 'Populer Book',
				'add_new' => 'Add New Populer Book',
				),
			'supports'=>array('title','thumbnail')
			));

	}
	add_action('init','bookstore_post_types');

	function social_array(){
		$social_sites = array('facebook','twitter','google-plus');
		return $social_sites;
	}

	function customizer_options($customizevar){

		$customizevar->add_section('customize_opt',array(
			'title'=>'General Options',
			'priority'=>'10'
			));


		$customizevar->add_setting('copyright_text',array(
			'default'=>'Copyright Text',
			'transport'=>'postMessage'
			));


		$customizevar->add_control('copyright_text',array(
			'label'=>'Copyright Text',
			'section'=>'customize_opt',
			'type'=>'text'
			));


		$customizevar->add_setting('logo_uploader',array(
			'default'=>'',
			'transport'=>'refresh'
			));

		$customizevar->add_control(
			new WP_Customize_image_control($customizevar,'logo_uploader',array(
				'section'=>'customize_opt',
				'label'=>'Logo Upload',
				'setting'=>'logo_uploader'
				))
			);

		$customizevar->add_setting('copyright_color',array(
			'default'=>'',
			'transport'=>'refresh'
			));

		$customizevar->add_control(
			new WP_Customize_color_control($customizevar,'copyright_color',array(
				'section'=>'customize_opt',
				'label'=>'Copyright Color',
				'setting'=>'copyright_color'
				))
			);

		$customizevar->add_section('slider_opt',array(
			'title'=>'Slider Options',
			'priority'=>20,
			));

		$customizevar->add_setting('first_slide',array(
			'default'=>get_template_directory_uri().'/img/book_1.jpg',
			'transport'=>'refresh'
			));


		$customizevar->add_control(
			new WP_Customize_image_control($customizevar,'first_slide',array(
				'label'=>'Enter First Slide',
				'section'=>'slider_opt',
				'setting'=>'first_slide'
				))
			);

		$customizevar->add_setting('second_slide',array(
			'default'=>get_template_directory_uri().'/img/book_2.jpeg',
			'transport'=>'refresh'
			));


		$customizevar->add_control(
			new WP_Customize_image_control($customizevar,'second_slide',array(
				'label'=>'Enter Second Slide',
				'section'=>'slider_opt',
				'setting'=>'second_slide'
				))
			);

		$customizevar->add_setting('third_slide',array(
			'default'=>get_template_directory_uri().'/img/book_3.jpg',
			'transport'=>'refresh'
			));


		$customizevar->add_control(
			new WP_Customize_image_control($customizevar,'third_slide',array(
				'label'=>'Enter Third Slide',
				'section'=>'slider_opt',
				'setting'=>'third_slide'
				))
			);

		$customizevar->add_section('socialicon',array(
				'title'=>'Social Icons',
				'priority'=>35
			));

		$social_sites = social_array();
		$priority = 5;
		foreach ($social_sites as $social_site) {

			$customizevar->add_setting($social_site,array(
					'type'=>'theme_mod',
					'capability'=>'edit_theme_options',
					'sanitize_callback'=>'esc_url_raw'
				));
			$customizevar->add_control($social_site,array(
					'label'=>"$social_site url:",
					'section'=>'socialicon',
					'type'=>'text',
					'priority'=>$priority
				));

			$priority = $priority + 5;
		}
		


	}
	add_action('customize_register','customizer_options');

	require_once('inc/social-icon.php');

	function customize_script(){

		wp_enqueue_script('customizer-scripts',get_template_directory_uri().'/js/scripts.js',array(
			'jquery','customize-preview'));
	}
	add_action('customize_preview_init','customize_script');


	add_filter( 'comment_form_default_fields', 'bootstrap3_comment_form_fields' );
	function bootstrap3_comment_form_fields( $fields ) {
	    $commenter = wp_get_current_commenter();
	    
	    $req      = get_option( 'require_name_email' );
	    $aria_req = ( $req ? " aria-required='true'" : '' );
	    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
	    
	    $fields   =  array(
	        'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
	                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
	        'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
	                    '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
	        'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
	                    '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'        
	    );
	    
	    return $fields;
	}

	add_filter( 'comment_form_defaults', 'bootstrap3_comment_form' );
	function bootstrap3_comment_form( $args ) {
	    $args['comment_field'] = '<div class="form-group comment-form-comment">
	            <label for="comment">' . _x( 'Comment', 'noun' ) . '</label> 
	            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
	        </div>';
	    $args['class_submit'] = 'btn btn-info'; // since WP 4.1
	    
	    return $args;
	}
 ?>