<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "GrassyOption";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
         // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        'disable_tracking'     => true,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'grassywp' ),
        'page_title'           => __( 'Theme Options', 'grassywp' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'     => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority' => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
       
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.
    );

 
    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '', 'grassywp' ), $v );
    } else {
        $args['intro_text'] = __( '', 'grassywp' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '', 'grassywp' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'grassywp' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'grassywp' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'grassywp' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'grassywp' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'grassywp' );
    Redux::setHelpSidebar( $opt_name, $content );



    // -> START Basic Fields

    Redux::setSection( $opt_name, array(
		'title'  => __( 'Basic Settings', 'grassywp' ),
		'desc'   => __( '', 'grassywp' ),
		'icon'   => 'el el-cog',
		'fields' => array(  
                    array (
                        'subtitle' => __('Upload your standard size logo.', 'grassywp'),
                        'id' => 'grassylogo',
                        'type' => 'media',
                        'title' => __('Custom Logo', 'grassywp'),
                        'url' => true,
                    ),
					array (
                        'subtitle' => __('Upload your standard size logo.', 'grassywp'),
                        'id' => 'grassylogofooter',
                        'type' => 'media',
                        'title' => __('Custom Footer Logo', 'grassywp'),
                        'url' => true,
                    ), 					
                    array (
                        'subtitle' => __('Upload a 16px x 16px Png/Gif image that will represent your website\'s favicon.', 'grassywp'),
                        'id' => 'grassy_favicon',
                        'type' => 'media',
                        'title' => __('Custom Favicon', 'grassywp'),
                        'url' => true,
                    ),       
                   
                    array(
                        'id'        => 'primary_bg_color',
                        'type'      => 'color',
                        'output'    => array('.top_header, #footer'),
                        'title'     => __('Primary background Color','grassywp'),
                        'subtitle'  => __('Pick a primary background color (blue).', 'grassywp'),
                        'default'   => '#6d429d',
                        'mode'      => 'background',
                        'validate'  => 'color',                        
                    ),
                    array(
                        'id'        => 'primary_txt_color',
                        'type'      => 'color',
						'output'    => array('.top_header, .telephone, .secondary_menu'),
                        'title'     => __('Primary Text Color', 'grassywp'),
                        'subtitle'  => __('Pick a primary Text color (blue).', 'grassywp'),
                        'default'   => '#ffffff',                       
                        'validate'  => 'color',
                    ),

					array(
                        'id'        => 'secondary_bg_color',
                        'type'      => 'color',
                        'output'    => array('.header'),
                        'title'     => __('Secondary background Color','grassywp'),
                        'subtitle'  => __('Pick a Secondary background color (blue).', 'grassywp'),
                        'default'   => '#5ec042',
                        'mode'      => 'background',
                        'validate'  => 'color',                        
                    ),
                    array(
                        'id'        => 'secondary_text_color',
                        'type'      => 'color',
                        'title'     => __('Secondary Text Color', 'grassywp'),
                        'subtitle'  => __('Pick a secondary Text color (default: dark-blue).', 'grassywp'),
                        'default'   => '#ffffff',
                        'output'    => array('.blue'),
                        'validate'  => 'color',
                    ),

					array(
                        'id'        => 'button_bg_color',
                        'type'      => 'color',
                        'output'    => array('.btn_all'),
                        'title'     => __('Button background Color','grassywp'),
                        'subtitle'  => __('Pick a Button background color (blue).', 'grassywp'),
                        'default'   => '#dec600',
                        'mode'      => 'background',
                        'validate'  => 'color',                        
                    ),
                    array(
                        'id'        => 'button_text_color',
                        'type'      => 'color',
                        'title'     => __('Button Text Color', 'grassywp'),
                        'subtitle'  => __('Pick a Button Text color (default: dark-blue).', 'grassywp'),
                        'default'   => '#ffffff',
                        'output'    => array('.blue'),
                        'validate'  => 'color',
                    ),

                     array(
                        'id'=>'google-analytics',
                        'type' => 'textarea',
                        'title' => __('Google Analytics code', 'grassywp'), 
                        'validate' => 'html_custom',
                        'rows'=> '4',
                        'default' => '',
                        'allowed_html' => array(
                            'a' => array(
                                'href' => array(),
                                'title' => array()
                            ),
                            'br' => array(),
                            'em' => array(),
                            'strong' => array()
                            )
                        ),  
                        array(
                            'id'       => 'opt-textarea',
                            'type'     => 'textarea',
                            'required' => array( 'layout', 'equals', '1' ),
                            'title'    => __( 'Tracking Code', 'grassywp' ),
                            'subtitle' => __( 'Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'grassywp' ),
                            'validate' => 'js',
                            'desc'     => 'Validate that it\'s javascript!',
                        ),  

		      )
    ) ); 
	
			Redux::setSection( $opt_name, array(
				'title'  => __( 'Header', 'grassywp'),
				'desc'   => __( '', 'grassywp' ),
				'icon'   => 'el el-wrench',
						// 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
							'fields' => array(
							   
								array(
									'id'       => 'header_phone',
									'type'     => 'text',
									'title'    => __( 'Telephone No', 'grassywp' ),
									'subtitle' => __( 'If you change Telephone', 'grassywp' ),
									'default'  => '(516) 922-9200',
								),
			
			
							) 
					   ) 
					);  

	

	Redux::setSection( $opt_name, array(
		'title'  => __( 'Social Icons', 'grassywp' ),
		'desc'   => __( ' ','grassywp'),
		'icon'   => 'el el-wrench',
		// 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
		'fields' => array(	                

                        array(
                            'id'       => 'facebook',                               
                            'title'    => __( 'Facebook Link', 'grassywp' ),
                            'subtitle' => __( 'Enter Facebook Link', 'grassywp' ),
                            'type'     => 'text',
                            'default'  => '',
                        ),  
						//tripadvisor 
                        array(
                            'id'       => 'instagram',                               
                            'title'    => __( 'Instagram Link', 'grassywp' ),
                            'subtitle' => __( 'Enter Instagram Link', 'grassywp' ),
                            'type'     => 'text',
                            'default'  => '',
                        ),    						
                       
                        array(
                            'id'       => 'tripadvisor',                               
                            'title'    => __( 'Tripadvisor Link', 'grassywp' ),
                            'subtitle' => __( 'Enter Tripadvisor Link', 'grassywp' ),
                            'type'     => 'text',
                            'default'  => '',
                        ),

						array(
                            'id'       => 'twitte',                               
                            'title'    => __( 'Twitter Link', 'grassywp' ),
                            'subtitle' => __( 'Enter Twitte Link', 'grassywp' ),
                            'type'     => 'text',
                            'default'  => '',
                        ), 

                  
			) 
    	) 
	);  

	 

	Redux::setSection( $opt_name, array(
		'title'  => __( 'Import / Export', 'grassywp'),
		'desc'   => __( '', 'grassywp' ),
		'icon'   => 'el el-wrench',
		// 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
		'fields' => array(				
			 array(
                    'id'         => 'opt-import-export',
                    'type'       => 'import_export',
                    'title'      => 'Import Export',
                    'subtitle'   => 'Save and restore your Redux options',
                    'full_width' => false,
                ),
        ) 
    	) 
	);  
	
	


    /*
     * <--- END SECTIONS
     */