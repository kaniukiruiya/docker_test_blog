<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "grassywp_option";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'grassywp_option/opt_name', $opt_name );
    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */
    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();
        global $wp_filesystem;
        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'RS Options', 'grassywp' ),
        'page_title'           => __( 'RS Options', 'grassywp' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        'forced_dev_mode_off' => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        'compiler' => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
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

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        'force_output' => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Grassy Theme</p>', 'grassywp' ), $v );
    } else {
        $args['intro_text'] = __( '<p>Grassy Theme</p>', 'grassywp' );
    }

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


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */
     
   // -> START General Settings
   Redux::setSection( $opt_name, array(
        'title'            => __( 'General Sections', 'grassywp' ),
        'id'               => 'basic-checkbox',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'grassywplogo',
                'type'     => 'media',
                'title'    => __( 'Upload Logo', 'grassywp' ),
                'subtitle' => __( 'Upload your logo', 'grassywp' ),
                'url'=>true
                
            ),
            
            array(
            'id'       => 'grassy_favicon',
            'type'     => 'media',
            'title'    => __( 'Upload Favicon', 'grassywp' ),
            'subtitle' => __( 'Upload your faviocn here', 'grassywp' ),
            'url'=>true
            
            ),
            
            array(
                'id'       => 'off_sticky',
                'type'     => 'switch', 
                'title'    => __('Sticky Menu', 'grassywp'),
                'subtitle' => __('You can show or hide sticky menu here', 'grassywp'),
                'default'  => false,
            ),

            array(
                'id'       => 'off_search',
                'type'     => 'switch', 
                'title'    => __('Show Searh Icon at Menu Area', 'grassywp'),
                'subtitle' => __('You can show or hide search here', 'grassywp'),
                'default'  => false,
            ),
            
            array(
                'id'       => 'off_canvas',
                'type'     => 'switch', 
                'title'    => __('Show off Canvas', 'grassywp'),
                'subtitle' => __('You can show or hide off canvas here', 'grassywp'),
                'default'  => false,
            ),
            
            array(
                'id'       => 'show_preloader',
                'type'     => 'switch', 
                'title'    => __('Show Preloader', 'grassywp'),
                'subtitle' => __('You can show or hide preloader', 'grassywp'),
                'default'  => true,
            ),  
                
            array(
                'id'       => 'show_top_bottom',
                'type'     => 'switch', 
                'title'    => __('Go to Top', 'grassywp'),
                'subtitle' => __('You can show or hide here', 'grassywp'),
                'default'  => true,
            ),              
            
        )
    ) );
    
    
    // -> START Header Section
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header', 'grassywp' ),
        'id'               => 'header',
        'customizer_width' => '450px',
        'icon' => 'el el-certificate',
        ));
    
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header Top Bar', 'grassywp' ),
        'id'               => 'header-top',
        'customizer_width' => '450px',
        'subsection' =>'true',      
        'fields'           => array(
        
        array(
                'id'       => 'show-top',
                'type'     => 'switch', 
                'title'    => __('Show top bar', 'grassywp'),
                'subtitle' => __('You can select top bar show or hide', 'grassywp'),
                'default'  => true,
            ),

        array(
                'id'       => 'mobile-top',
                'type'     => 'switch', 
                'title'    => __('Hide Top Bar For Mobile', 'grassywp'),
                'subtitle' => __('You can hide top bar for mobile only', 'grassywp'),
                'default'  => true,
            ),

        array(
                'id'       => 'show-social',
                'type'     => 'switch', 
                'title'    => __('Show Social Icons at Header', 'grassywp'),
                'subtitle' => __('You can select Social Icons show or hide', 'grassywp'),
                'default'  => true,
            ),  
                    
        
        
         array(
                    'id'       => 'phone',                               
                    'title'    => __( 'Top Bar Phone Number', 'grassywp' ),
                    'subtitle' => __( 'Enter Phone Number', 'grassywp' ),
                    'type'     => 'text',
                    
            ),
        array(
                    'id'       => 'phone-pretext',                               
                    'title'    => __( 'Top Bar Phone Number Pre Text', 'grassywp' ),
                    'subtitle' => __( 'Enter Phone Number Pre Text', 'grassywp' ),
                    'type'     => 'text',
                    
            ),
        array(
                    'id'       => 'top-email',                               
                    'title'    => __( 'Top Bar Email Address', 'grassywp' ),
                    'subtitle' => __( 'Enter Email Address', 'grassywp' ),
                    'type'     => 'text',
                    'validate' => 'email',
                    'msg'      => 'Email Address Not Valid',
                    
            ),  
            
        array(
                'id'       => 'quote',                               
                'title'    => __( 'Quote Button Text', 'grassywp' ),                    
                'type'     => 'text',
                
        ),  
        
        array(
                'id'       => 'quote_link',                               
                'title'    => __( 'Quote Button Link', 'grassywp' ),
                'subtitle' => __( 'Enter Quote Button Link Here', 'grassywp' ),
                'type'     => 'text',
                
            ),      
        )
    ) 

);

        Redux::setSection( $opt_name, array(
        'title'            => __( 'Header Style', 'grassywp' ),
        'id'               => 'header-style',
        'customizer_width' => '450px',
        'subsection' =>'true',      
        'fields'           => array(    
                            
                            array(
                                'id'       => 'header_layout',
                                'type'     => 'image_select',
                                'title'    => __('Header Layout', 'grassywp'), 
                                'subtitle' => __('Select header layout. Choose between 1, 2 ,3 or 4 layout.', 'grassywp'),
                                'options'  => array(
                                    'style1'      => array(
                                        'alt'   => 'Header Style 1', 
                                        'img'   => get_template_directory_uri().'/libs/img/style_1.png'
                                        
                                    ),
                                    'style2'      => array(
                                        'alt'   => 'Header Style 2', 
                                        'img'   => get_template_directory_uri().'/libs/img/style_2.png'
                                    ),
                                    'style3'      => array(
                                        'alt'   => 'Header Style 3', 
                                        'img'  => get_template_directory_uri().'/libs/img/style_3.png'
                                    ),
                                    'style4'      => array(
                                        'alt'   => 'Header Style 4', 
                                        'img'   => get_template_directory_uri().'/libs/img/style_4.png'
                                    ),
                                    'style5'      => array(
                                        'alt'   => 'Header Style 5', 
                                        'img'   => get_template_directory_uri().'/libs/img/style_5.png'
                                    ),
                                    
                                ),
                                'default' => 'style1'
                            ),                           
                            
                    )
                ) 

        );
                 
                        

    // -> START Style Section
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Style', 'grassywp' ),
        'id'               => 'stle',
        'customizer_width' => '450px',
        'icon' => 'el el-brush',
        ));
    
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Global Style', 'grassywp' ),
        'desc'   => __( 'Style your theme', 'grassywp' ),        
        'subsection' =>'true',  
        'fields' => array( 
                        
                        array(
                            'id'        => 'body_bg_color',
                            'type'      => 'color',                   
                            
                            'title'     => __('Body Backgroud Color','grassywp'),
                            'subtitle'  => __('Pick body background color', 'grassywp'),
                            'default'   => '#fff',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'body_text_color',
                            'type'      => 'color',            
                            'title'     => __('Text Color','grassywp'),
                            'subtitle'  => __('Pick text color', 'grassywp'),
                            'default'   => '#666666',
                            'validate'  => 'color',                        
                        ),     
        
                        array(
                        'id'        => 'primary_color',
                        'type'      => 'color', 
                        'title'     => __('Primary Color','grassywp'),
                        'subtitle'  => __('Unimited color option.', 'grassywp'),
                        'default'   => '#4caf50',
                        'validate'  => 'color',                        
                        ),  
                        
                        array(
                            'id'        => 'link_text_color',
                            'type'      => 'color',                       
                            'title'     => __('Link Color','grassywp'),
                            'subtitle'  => __('Pick Link color', 'grassywp'),
                            'default'   => '#4caf50',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'link_hover_text_color',
                            'type'      => 'color',                 
                            'title'     => __('Link Hover Color','grassywp'),
                            'subtitle'  => __('Pick link hover color', 'grassywp'),
                            'default'   => '#000',
                            'validate'  => 'color',                        
                        ),     
                            
                        array(
                            'id'        => 'footer_bg_color',
                            'type'      => 'color',
                            'title'     => __('Footer Bg Color','grassywp'),
                            'subtitle'  => __('Pick color.', 'grassywp'),
                            'default'   => '#2f2f2f',
                            'validate'  => 'color',                        
                        ),  
                          
                       
                 ) 
            ) 
    ); 
    
    //Menu settings
     Redux::setSection( $opt_name, array(
        'title'  => __( 'Header Top Style', 'grassywp' ),
        'desc'   => __( 'Header top bar styling', 'grassywp' ),        
        'subsection' =>'true',  
        'fields' => array( 
                        
                        array(
                            'id'        => 'top_icon_color',
                            'type'      => 'color',                       
                            'title'     => __('Tob Bar Icon Color','grassywp'),
                            'subtitle'  => __('Pick color', 'grassywp'),
                            'default'   => '#fff',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'top_icon_hover_color',
                            'type'      => 'color',                       
                            'title'     => __('Tob Bar Icon Hover Color','grassywp'),
                            'subtitle'  => __('Pick color', 'grassywp'),
                            'default'   => '#ebebeb',
                            'validate'  => 'color',                        
                        ), 
                        array(
                            'id'        => 'top_text_color',
                            'type'      => 'color',                       
                            'title'     => __('Top Bar Text Color','grassywp'),
                            'subtitle'  => __('Pick color', 'grassywp'),
                            'default'   => '#fff',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'top_link_hover_color',
                            'type'      => 'color',                       
                            'title'     => __('Text Link Hover Color','grassywp'),
                            'subtitle'  => __('Pick color', 'grassywp'),
                            'default'   => '#ebebeb',
                            'validate'  => 'color',                        
                        ), 
                            
                        
                        array(
                            'id'        => 'top_btn_color',
                            'type'      => 'color',                     
                            'title'     => __('Quote Button Text Color','grassywp'),
                            'subtitle'  => __('Pick Color', 'grassywp'),
                            'default'   => '#666',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'btn_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => __('Quote Button Hover Color','grassywp'),
                            'subtitle'  => __('Pick color', 'grassywp'),
                            'default'   => '#000',
                            'validate'  => 'color',                        
                        ),     
                        
                        
                        array(
                            'id'        => 'top_btn_bg_color',
                            'type'      => 'color',                       
                            'title'     => __('Quote Button Background Color','grassywp'),
                            'subtitle'  => __('Pick color', 'grassywp'),
                            'default'   => '#fff',
                            'validate'  => 'color',                        
                        ),

                         array(
                            'id'        => 'top_btn_bg_hover_color',
                            'type'      => 'color',                       
                            'title'     => __('Quote Button Hover Background Color','grassywp'),
                            'subtitle'  => __('Pick color', 'grassywp'),
                            'default'   => '#fff',
                            'validate'  => 'color',                        
                        ), 
                
                ) 
            
            )
        );

    //Menu settings
     Redux::setSection( $opt_name, array(
        'title'  => __( 'Main Menu', 'grassywp' ),
        'desc'   => __( 'Main Menu Style Here', 'grassywp' ),        
        'subsection' =>'true',  
        'fields' => array( 
                        
                        array(
                            'id'        => 'menu_text_color',
                            'type'      => 'color',                       
                            'title'     => __('Main Menu Text Color','grassywp'),
                            'subtitle'  => __('Pick color', 'grassywp'),
                            'default'   => '#444',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'menu_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => __('Main Menu Text Hover Color','grassywp'),
                            'subtitle'  => __('Pick color', 'grassywp'),
                            'default'   => '#4caf50',
                            'validate'  => 'color',                        
                        ), 
                        array(
                            'id'        => 'menu_text_active_color',
                            'type'      => 'color',                       
                            'title'     => __('Main Menu Text Active Color','grassywp'),
                            'subtitle'  => __('Pick color', 'grassywp'),
                            'default'   => '#4caf50',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'drop_down_bg_color',
                            'type'      => 'color',                       
                            'title'     => __('Dropdown Menu Background Color','grassywp'),
                            'subtitle'  => __('Pick bg color', 'grassywp'),
                            'default'   => '#4caf50',
                            'validate'  => 'color',                        
                        ), 
                            
                        
                        array(
                            'id'        => 'drop_text_color',
                            'type'      => 'color',                     
                            'title'     => __('Dropdown Menu Text Color','grassywp'),
                            'subtitle'  => __('Pick text color', 'grassywp'),
                            'default'   => '#fff',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'drop_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => __('Dropdown Menu Hover Text Color','grassywp'),
                            'subtitle'  => __('Pick text color', 'grassywp'),
                            'default'   => '#fff',
                            'validate'  => 'color',                        
                        ),     
                        
                        
                        array(
                            'id'        => 'drop_text_hoverbg_color',
                            'type'      => 'color',                       
                            'title'     => __('Dropdown Menu item Hover Background Color','grassywp'),
                            'subtitle'  => __('Pick text color', 'grassywp'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'drop_text_border_color',
                            'type'      => 'color',                       
                            'title'     => __('Dropdown Menu item Seperate Border Color','grassywp'),
                            'subtitle'  => __('Pick a color', 'grassywp'),
                            'default'   => '#fff',
                            'validate'  => 'color',                        
                        ),              
                        
                        
                )
            )
        );
    
    
    
    //-> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Typography', 'grassywp' ),
        'id'     => 'typography',
        'desc'   => __( 'You can specify your body and heading font here','grassywp'),
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'opt-typography-body',
                'type'     => 'typography',
                'title'    => __( 'Body Font', 'grassywp' ),
                'subtitle' => __( 'Specify the body font properties.', 'grassywp' ),
                'google'   => true, 
                'font-style' =>false,           
                'default'  => array(                    
                    'font-size'   => '15px',
                    'font-family' => 'Open Sans',
                    'font-weight' => 'Normal',
                    'line-height' => '26px',
                ),
            ),
             array(
                'id'       => 'opt-typography-menu',
                'type'     => 'typography',
                'title'    => __( 'Navigation Font', 'grassywp' ),
                'subtitle' => __( 'Specify the menu font properties.', 'grassywp' ),
                'google'   => true,
                'font-backup' => true,                
                'all_styles'  => true,              
                'default'  => array(
                    'color'       => '#444444',                    
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '15px',                    
                    'font-weight' => 'Normal',                    
                ),
            ),
            array(
                'id'          => 'opt-typography-h1',
                'type'        => 'typography',
                'title'       => __( 'Heading H1', 'grassywp' ),
                //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                //'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,                
                'all_styles'  => true,
                                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => __( 'Typography option with each property can be called individually.', 'grassywp' ),
                'default'     => array(
                    'color'       => '#212121',
                    'font-style'  => '700',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '32px',
                    
                    ),
                ),
            array(
                'id'          => 'opt-typography-h2',
                'type'        => 'typography',
                'title'       => __( 'Heading H2', 'grassywp' ),
                //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                //'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,                
                'all_styles'  => true,                 
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => __( 'Typography option with each property can be called individually.', 'grassywp' ),
                'default'     => array(
                    'color'       => '#212121',
                    'font-style'  => '700',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '28px',
                    
                ),
                ),
            array(
                'id'          => 'opt-typography-h3',
                'type'        => 'typography',
                'title'       => __( 'Heading H3', 'grassywp' ),
                //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                //'google'      => false,              
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => __( 'Typography option with each property can be called individually.', 'grassywp' ),
                'default'     => array(
                    'color'       => '#212121',
                    'font-style'  => '700',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '24px',
                    
                    ),
                ),
            array(
                'id'          => 'opt-typography-h4',
                'type'        => 'typography',
                'title'       => __( 'Heading H4', 'grassywp' ),
                //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                //'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,                
                'all_styles'  => true,               
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => __( 'Typography option with each property can be called individually.', 'grassywp' ),
                'default'     => array(
                    'color'       => '#212121',
                    'font-style'  => '700',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '20px',
                    'line-height' => '30px'
                    ),
                ),
            array(
                'id'          => 'opt-typography-h5',
                'type'        => 'typography',
                'title'       => __( 'Heading H5', 'grassywp' ),
                //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                //'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,                
                'all_styles'  => true,                
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => __( 'Typography option with each property can be called individually.', 'grassywp' ),
                'default'     => array(
                    'color'       => '#212121',
                    'font-style'  => '700',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '18px',
                    'line-height' => '25px'
                    ),
                ),
            array(
                'id'          => 'opt-typography-6',
                'type'        => 'typography',
                'title'       => __( 'Heading H6', 'grassywp' ),
             
                'font-backup' => false,                
                'all_styles'  => true,                
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => __( 'Typography option with each property can be called individually.', 'grassywp' ),
                'default'     => array(
                    'color'       => '#212121',
                    'font-style'  => '700',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '15px',
                    'line-height' => '20px'
                ),
                ),
                
                )
            )
                    
   
    );

    /*Blog Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Blog', 'grassywp' ),
        'id'               => 'blog',
        'customizer_width' => '450px',
        'icon' => 'el el-comment',
        )
        );
        
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Blog Settings', 'grassywp' ),
        'id'               => 'blog-settings',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array(
        
                            array(
                                    'id'       => 'blog_banner_main', 
                                    'url'      => true,     
                                    'title'    => __( 'Blog Page Banner', 'grassywp' ),                 
                                    'type'     => 'media',                                  
                            ),  
                            
                            array(
                                    'id'       => 'blog__title',                               
                                    'title'    => __( 'Blog  Title', 'grassywp' ),
                                    'subtitle' => __( 'Enter Blog  Title Here', 'grassywp' ),
                                    'type'     => 'text',                                   
                            ),
                            
                            array(
                                'id'       => 'blog-layout',
                                'type'     => 'image_select',
                                'title'    => __('Select Blog Layout', 'grassywp'), 
                                'subtitle' => __('Select your blog layout', 'grassywp'),
                                'options'  => array(
                                    'full'      => array(
                                        'alt'   => 'Blog Style 1', 
                                        'img'   => get_template_directory_uri().'/libs/img/1c.png'                                      
                                    ),
                                    '2right'      => array(
                                        'alt'   => 'Blog Style 2', 
                                        'img'   => get_template_directory_uri().'/libs/img/2cr.png'
                                    ),
                                    '2left'      => array(
                                        'alt'   => 'Blog Style 3', 
                                        'img'  => get_template_directory_uri().'/libs/img/2cl.png'
                                    ),                                  
                                ),
                                'default' => '2right'
                            ),                      
                        
                            array(
                                'id'       => 'blog-grid',
                                'type'     => 'select',
                                'title'    => __('Select Blog Gird', 'grassywp'),                   
                                'desc'     => __('Select your blog gird layout', 'grassywp'),
                                 //Must provide key => value pairs for select options
                                'options'  => array(
                                        '12'=>'1 Column',                                   
                                        '6' => '2 Column',                                          
                                        '4' => '3 Column',
                                        '3' => '4 Column'
                                        ),
                                    'default'  => '12',                                  
                            ),  
                                    
                            array(
                                'id'       => 'blog-author-post',
                                'type'     => 'select',
                                'title'    => __('Show Author Info', 'grassywp'),                   
                                'desc'     => __('Select author info show or hide', 'grassywp'),
                                 //Must provide key => value pairs for select options
                                'options'  => array(                                            
                                        'show' => 'Show',
                                        'hide' => 'Hide'
                                        ),
                                    'default'  => 'show',
                                
                            ),                  
                            
                        )
                    ) 
    
            );
    
    
    /*Single Post Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Single Post', 'grassywp' ),
        'id'               => 'spost',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array(                            
        
                            array(
                                    'id'       => 'blog_banner', 
                                    'url'      => true,     
                                    'title'    => __( 'Blog Single page banner', 'grassywp' ),                  
                                    'type'     => 'media',
                                    
                            ),  
                           
                            array(
                                    'id'       => 'blog-comments',
                                    'type'     => 'select',
                                    'title'    => __('Show Comment', 'grassywp'),                   
                                    'desc'     => __('Select comments show or hide', 'grassywp'),
                                     //Must provide key => value pairs for select options
                                    'options'  => array(                                            
                                            'show' => 'Show',
                                            'hide' => 'Hide'
                                            ),
                                        'default'  => 'show',
                                        
                            ),  
                            
                            array(
                                    'id'       => 'blog-author',
                                    'type'     => 'select',
                                    'title'    => __('Show Ahthor Info', 'grassywp'),                   
                                    'desc'     => __('Select author info show or hide', 'grassywp'),
                                     //Must provide key => value pairs for select options
                                    'options'  => array(                                            
                                            'show' => 'Show',
                                            'hide' => 'Hide'
                                            ),
                                        'default'  => 'show',
                                        
                            ),  
                            
                            array(
                                    'id'       => 'blog-post',
                                    'type'     => 'select',
                                    'title'    => __('Show Related Post', 'grassywp'),                  
                                    'desc'     => __('Choose related product show or hide', 'grassywp'),
                                     //Must provide key => value pairs for select options
                                    'options'  => array(                                            
                                            'show' => 'Show',
                                            'hide' => 'Hide'
                                            ),
                                        'default'  => 'show',
                                        
                            ),  
                        )
                ) 
    
    
    );

    
    /*Portfolio Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Portfolio Section', 'grassywp' ),
        'id'               => 'portfolio',
        'customizer_width' => '450px',
        'icon' => 'el el-camera',
        'fields'           => array(
        
            array(
                    'id'       => 'portfolio_single_image', 
                    'url'      => true,     
                    'title'    => __( 'Portfolio Single page banner image', 'grassywp' ),                   
                    'type'     => 'media',
                    
            ),  
            
                
             )
         ) 
    );


        /*Portfolio Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Team Section', 'grassywp' ),
        'id'               => 'team',
        'customizer_width' => '450px',
        'icon' => 'el el-user',
        'fields'           => array(
        
            array(
                    'id'       => 'team_single_image', 
                    'url'      => true,     
                    'title'    => __( 'Team Single page banner image', 'grassywp' ),                    
                    'type'     => 'media',
                    
            ),  
                
             )
         ) 
    );

    



    Redux::setSection( $opt_name, array(
        'title'  => __( 'Social Icons', 'grassywp' ),
        'desc'   => __( 'Add your social icon here', 'grassywp' ),
        'icon'   => 'el el-share',
         'submenu' => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
        'fields' => array(
                    array(
                        'id'       => 'facebook',                               
                        'title'    => __( 'Facebook Link', 'grassywp' ),
                        'subtitle' => __( 'Enter Facebook Link', 'grassywp' ),
                        'type'     => 'text',                     
                    ),
                        
                     array(
                        'id'       => 'twitter',                               
                        'title'    => __( 'Twitter Link', 'grassywp' ),
                        'subtitle' => __( 'Enter Twitter Link', 'grassywp' ),
                        'type'     => 'text'
                    ),
                    
                        array(
                        'id'       => 'rss',                               
                        'title'    => __( 'Rss Link', 'grassywp' ),
                        'subtitle' => __( 'Enter Rss Link', 'grassywp' ),
                        'type'     => 'text'
                    ),
                    
                     array(
                        'id'       => 'pinterest',                               
                        'title'    => __( 'Pinterest Link', 'grassywp' ),
                        'subtitle' => __( 'Enter Pinterest Link', 'grassywp' ),
                        'type'     => 'text'
                    ),
                     array(
                        'id'       => 'linkedin',                               
                        'title'    => __( 'Linkedin Link', 'grassywp' ),
                        'subtitle' => __( 'Enter Linkedin Link', 'grassywp' ),
                        'type'     => 'text',
                        
                    ),
                     array(
                        'id'       => 'google',                               
                        'title'    => __( 'Google Plus Link', 'grassywp' ),
                        'subtitle' => __( 'Enter Google Plus  Link', 'grassywp' ),
                        'type'     => 'text',                       
                    ),

                    array(
                        'id'       => 'instagram',                               
                        'title'    => __( 'Instagram Link', 'grassywp' ),
                        'subtitle' => __( 'Enter Instagram Link', 'grassywp' ),
                        'type'     => 'text',                       
                    ),

                     array(
                        'id'       => 'youtube',                               
                        'title'    => __( 'Youtube Link', 'grassywp' ),
                        'subtitle' => __( 'Enter Youtube Link', 'grassywp' ),
                        'type'     => 'text',                       
                    ),

                    array(
                        'id'       => 'tumblr',                               
                        'title'    => __( 'Tumblr Link', 'grassywp' ),
                        'subtitle' => __( 'Enter Tumblr Link', 'grassywp' ),
                        'type'     => 'text',                       
                    ),

                    array(
                        'id'       => 'vimeo',                               
                        'title'    => __( 'Vimeo Link', 'grassywp' ),
                        'subtitle' => __( 'Enter Vimeo Link', 'grassywp' ),
                        'type'     => 'text',                       
                    ),         
            ) 
        ) 
    );
    
    
   
    Redux::setSection( $opt_name, array(
    'title'  => __( 'Footer Option', 'grassywp' ),
    'desc'   => __( 'Footer style here', 'grassywp' ),
    'icon'   => 'el el-th-large',
    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
    'fields' => array(

                array(
                        'id'       => 'footer_logo',
                        'type'     => 'media',
                        'title'    => __( 'Footer Logo', 'grassywp' ),
                        'subtitle' => __( 'Upload your footer logo', 'grassywp' ),                  
                    ),  
                
                array(
                        'id'       => 'show-social2',
                        'type'     => 'switch', 
                        'title'    => __('Show Social Icons at Footer', 'grassywp'),
                        'subtitle' => __('You can select Social Icons show or hide', 'grassywp'),
                        'default'  => true,
                    ),                      
                       
                
                array(
                    'id'       => 'copyright',
                    'type'     => 'textarea',
                    'title'    => __( 'Footer CopyRight', 'grassywp' ),
                    'subtitle' => __( 'Change your footer copyright text ?', 'grassywp' ),
                    'default'  => '&copy; 2018 All Rights Reserved. Designed by <a target="_blank" href="#">RS Theme</a>'
                ), 
                
                array(
                    'id'       => 'footer_layout',
                    'type'     => 'select',
                    'title'    => __('Select Footer Style', 'grassywp'),                    
                    'desc'     => __('Select your footer layout', 'grassywp'),
                     //Must provide key => value pairs for select options
                    'options'  => array(
                            'style1'=>'Footer Style 1',                                 
                            'style2' => 'Footer Style 2',                                           
                            'style3' => 'Footer Style 3',
                            'style4' => 'Footer Style 4',
                            'style5' => 'Footer Style 5'
                            ),
                        'default'  => 'style1',
                        
                ), 

              
            ) 
        ) 
    ); 
    
    
    Redux::setSection( $opt_name, array(
    'title'  => __( '404 Error Page', 'grassywp' ),
    'desc'   => __( '404 details  here', 'grassywp' ),
    'icon'   => 'el el-error-alt',
    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
    'fields' => array(

                array(
                        'id'       => 'title_404',
                        'type'     => 'text',
                        'title'    => __( 'Title', 'grassywp' ),
                        'subtitle' => __( 'Enter title for 404 page', 'grassywp' ), 
                        'default'  => '404',                
                    ),  
                
                array(
                        'id'       => 'text_404',
                        'type'     => 'text',
                        'title'    => __( 'Text', 'grassywp' ),
                        'subtitle' => __( 'Enter text for 404 page', 'grassywp' ),  
                        'default'  => 'Page Not Found',             
                    ),                      
                       
                
                array(
                        'id'       => 'back_home',
                        'type'     => 'text',
                        'title'    => __( 'Back to Home Button Label', 'grassywp' ),
                        'subtitle' => __( 'Enter label for "Back to Home" button', 'grassywp' ),
                        'default'  => 'Back to Homepage',   
                                    
                    ), 
                    
                array(
                        'id'       => 'grassy_error',
                        'type'     => 'media',
                        'title'    => __( 'Upload your 404 page image', 'grassywp' ),
                        'subtitle' => __( 'Upload your image here', 'grassywp' ),
                        
                    ),
                                  
            ) 
        ) 
    ); 
    

    
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );
    
    //add_filter('redux/options/' . $this->args['opt_name'] . '/compiler', array( $this, 'compiler_action' ), 10, 3);

    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri()() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'grassywp' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'grassywp' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_action( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

