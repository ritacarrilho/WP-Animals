<?php
/**
 * Petlife Lite Theme Customizer
 *
 * @package Petlife Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function petlife_lite_customize_register( $wp_customize ) {
	
function petlife_lite_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
	
	$wp_customize->get_setting( 'blogname' )->petlife_lite         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->petlife_lite  = 'postMessage';
		
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#f15958',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','petlife-lite'),
			'description'	=> __('Select color from here.','petlife-lite'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);

	$wp_customize->add_setting('sec_color_scheme', array(
		'default' => '#103c3b',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'sec_color_scheme',array(
			'description'	=> __('Select Second color from here.','petlife-lite'),
			'section' => 'colors',
			'settings' => 'sec_color_scheme'
		))
	);
	
	$wp_customize->add_setting('headerbg-color', array(
		'default' => '#ffffff',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'headerbg-color',array(
			'description'	=> __('Select background color for header.','petlife-lite'),
			'section' => 'colors',
			'settings' => 'headerbg-color'
		))
	);
	
	$wp_customize->add_setting('nav-color', array(
		'default' => '#2b2828',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'nav-color',array(
			'description'	=> __('Select color for navigation.','petlife-lite'),
			'section' => 'colors',
			'settings' => 'nav-color'
		))
	);
	
	$wp_customize->add_setting('footer-color', array(
		'default' => '#000000',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'footer-color',array(
			'description'	=> __('Select background color for footer.','petlife-lite'),
			'section' => 'colors',
			'settings' => 'footer-color'
		))
	);

	// Slider Section Start		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'petlife-lite'),
            'priority' => null,
			'description'	=> __('Recommended image size (1420x567). Slider will work only when you select the static front page.','petlife-lite'),	
        )
    );
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','petlife-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','petlife-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','petlife-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('slide_text',array(
		'default'	=> __('Read More','petlife-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('slide_text',array(
		'label'	=> __('Add slider link button text.','petlife-lite'),
		'section'	=> 'slider_section',
		'setting'	=> 'slide_text',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('hide_slider',array(
			'default' => true,
			'sanitize_callback' => 'petlife_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_slider', array(
		   'settings' => 'hide_slider',
    	   'section'   => 'slider_section',
    	   'label'     => __('Check this to hide slider.','petlife-lite'),
    	   'type'      => 'checkbox'
     ));	
	
	// Slider Section End

	// Contact Section Start
	$wp_customize->add_section(
        'contact_section',
        array(
            'title' => __('Header Button', 'petlife-lite'),
            'priority' => null,
			'description'	=> __('Add header button text and link below.','petlife-lite'),	
        )
    );
	
	$wp_customize->add_setting('headbtn-txt',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('headbtn-txt',array(
		'type'	=> 'text',
		'label'	=> __('Add Header button text here.','petlife-lite'),
		'section'	=> 'contact_section'
	));

	$wp_customize->add_setting('headbtn-link',array(
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('headbtn-link',array(
		'type'	=> 'url',
		'label'	=> __('Add Header button link here.','petlife-lite'),
		'section'	=> 'contact_section'
	));
	// Contact Section End

	// Top Header Start
	$wp_customize->add_section(
        'tophead_section',
        array(
            'title' => __('Top Header', 'petlife-lite'),
            'priority' => null,
			'description'	=> __('Add top header information here.','petlife-lite'),	
        )
    );

    $wp_customize->add_setting('add-txt',array(
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('add-txt',array(
			'type'	=> 'text',
			'label'	=> __('Add Address here.','petlife-lite'),
			'section'	=> 'tophead_section'
	));

	$wp_customize->add_setting('wrkhrs-txt',array(
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('wrkhrs-txt',array(
			'type'	=> 'text',
			'label'	=> __('Add Working Hours here.','petlife-lite'),
			'section'	=> 'tophead_section'
	));

	$wp_customize->add_setting('call-txt',array(
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('call-txt',array(
			'type'	=> 'text',
			'label'	=> __('Add phone number here.','petlife-lite'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('email-txt',array(
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('email-txt',array(
			'type'	=> 'text',
			'label'	=> __('Add email here.','petlife-lite'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('facebook',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('facebook',array(
			'type'	=> 'url',
			'label'	=> __('Add facebook link here.','petlife-lite'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('twitter',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitter',array(
			'type'	=> 'url',
			'label'	=> __('Add twitter link here.','petlife-lite'),
			'section'	=> 'tophead_section'
	));

	$wp_customize->add_setting('youtube',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('youtube',array(
			'type'	=> 'url',
			'label'	=> __('Add youtube channel link here.','petlife-lite'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('linkedin',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('linkedin',array(
			'type'	=> 'url',
			'label'	=> __('Add linkedin link here.','petlife-lite'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('pinterest',array(
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('pinterest',array(
			'type'	=> 'url',
			'label'	=> __('Add pinterest link here.','petlife-lite'),
			'section'	=> 'tophead_section'
	));
	
	$wp_customize->add_setting('hide_tophead',array(
			'default' => true,
			'sanitize_callback' => 'petlife_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_tophead', array(
		   'settings' => 'hide_tophead',
    	   'section'   => 'tophead_section',
    	   'label'     => __('Uncheck to display top header','petlife-lite'),
    	   'type'      => 'checkbox'
     ));
	// Top Header End

	// Homepage Introduction Section Start	
	$wp_customize->add_section(
        'homepage_introduction_section',
        array(
            'title' => __('Homepage Introduction section', 'petlife-lite'),
            'priority' => null,
			'description'	=> __('Select page for homepage introduction section. This section will be displayed only when you select the static front page.','petlife-lite'),	
        )
    );
	
	$wp_customize->add_setting('display-setting1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('display-setting1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for homepage introduction section','petlife-lite'),
			'section'	=> 'homepage_introduction_section'
	));

	$wp_customize->add_setting('welmore-txt',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('welmore-txt',array(
		'type'	=> 'text',
		'label'	=> __('Add Read More button text here.','petlife-lite'),
		'section'	=> 'homepage_introduction_section'
	));

	$wp_customize->add_setting('hide_wel_section',array(
			'default' => true,
			'sanitize_callback' => 'petlife_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_wel_section', array(
		   'settings' => 'hide_wel_section',
    	   'section'   => 'homepage_introduction_section',
    	   'label'     => __('Check this to hide section.','petlife-lite'),
    	   'type'      => 'checkbox'
     ));
	// Homepage Welcome Section End
	
	// Homepage Section Start		
	$wp_customize->add_section(
        'homepage_section',
        array(
            'title' => __('Homepage Services', 'petlife-lite'),
            'priority' => null,
			'description'	=> __('Select pages for homepage services. This section will be displayed only when you select the static front page.','petlife-lite'),	
        )
    );

    $wp_customize->add_setting('service-ttl',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('service-ttl',array(
		'type'	=> 'text',
		'label'	=> __('Add Service section titlt here.','petlife-lite'),
		'section'	=> 'homepage_section'
	));
	
	$wp_customize->add_setting('page-setting1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for first Homepage box','petlife-lite'),
			'section'	=> 'homepage_section'
	));
	
	$wp_customize->add_setting('page-setting2',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for second Homepage box','petlife-lite'),
			'section'	=> 'homepage_section'
	));
	
	$wp_customize->add_setting('page-setting3',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for third Homepage box','petlife-lite'),
			'section'	=> 'homepage_section'
	));
	
	$wp_customize->add_setting('hide_section',array(
			'default' => true,
			'sanitize_callback' => 'petlife_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_section', array(
		   'settings' => 'hide_section',
    	   'section'   => 'homepage_section',
    	   'label'     => __('Check this to hide section.','petlife-lite'),
    	   'type'      => 'checkbox'
     ));
	
}
add_action( 'customize_register', 'petlife_lite_customize_register' );	

function petlife_lite_css(){
		?>
        <style> 
				.tm_client strong,
				.postmeta a:hover,
				#sidebar ul li a:hover,
				.blog-post h3.entry-title,
				a.blog-more:hover,
				#commentform input#submit,
				input.search-submit,
				.nivo-controlNav a.active,
				.blog-date .date,
				a.read-more,
				.section-box .sec-left a,
				.sitenav ul li.current_page_item a,
				.sitenav ul li a:hover,
				.sitenav ul li.current_page_item ul li a:hover,
				#header .header-inner .logo p{
					color:<?php echo esc_attr(get_theme_mod('color_scheme','#f15958')); ?>;
				}
				h3.widget-title,
				.nav-links .current,
				.nav-links a:hover,
				p.form-submit input[type="submit"],
				.home-content a,
				#slider a.slide-button:hover,
				.top-bar{
					background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#f15958')); ?>;
				}
				#header{
					background-color:<?php echo esc_attr(get_theme_mod('headerbg-color','#ffffff')); ?>;
				}
				.sitenav ul li a{
					color:<?php echo esc_attr(get_theme_mod('nav-color','#2b2828')); ?>;
				}
				.copyright-wrapper{
					background-color:<?php echo esc_attr(get_theme_mod('footer-color','#000000')); ?>;
				}
				h2.section-title,
				.intro-content ul li::before{
					color: <?php echo esc_attr(get_theme_mod('sec_color_scheme','#103c3b')); ?>;
				}
				.header-button a,
				#slider a.slide-button,
				a.main-button,
				.serbox:after{
					background-color: <?php echo esc_attr(get_theme_mod('sec_color_scheme','#103c3b')); ?>;
				}
				.header-button a:hover,
				#slider a.slide-button:hover,
				a.main-button:hover,
				h2.section-title:after
				{
					background-color: <?php echo esc_attr(get_theme_mod('color_scheme','#f15958')); ?>;
				}
				.serbox .thumbbx:before{
					border-color: <?php echo esc_attr(get_theme_mod('color_scheme','#f15958')); ?>;
				}
				.serbox:hover .thumbbx::before{
					border-color: <?php echo esc_attr(get_theme_mod('sec_color_scheme','#103c3b')); ?>;
				}
				
		</style>
	<?php }
add_action('wp_head','petlife_lite_css');

function petlife_lite_customize_preview_js() {
	wp_enqueue_script( 'petlife-lite-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'petlife_lite_customize_preview_js' );