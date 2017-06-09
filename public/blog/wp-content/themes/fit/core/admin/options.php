<?php

$gt3_tabs_admin_theme = new Tabs_admin_theme();

$gt3_tabs_admin_theme->add(new Tab_admin_theme(array(
    'name' => 'General',
    'desc' => '',
    'icon' => 'general.png',
    'icon_active' => 'general_active.png',
    'icon_hover' => 'general_hover.png'
), array(
    new UploadOption_admin_theme(array(
        'name' => 'Header logo',
        'id' => 'logo',
        'desc' => 'Default: 60px x 40px',
        'default' => THEMEROOTURL . '/img/logo.png'
    )),
    new UploadOption_admin_theme(array(
        'name' => 'Logo (Retina)',
        'id' => 'logo_retina',
        'desc' => 'Default: 120px x 80px',
        'default' => THEMEROOTURL . '/img/retina/logo.png'
    )),
    new textOption_admin_theme(array(
        'name' => 'Header logo width',
        'id' => 'header_logo_standart_width',
        'not_empty' => true,
        'width' => '100px',
        'textalign' => 'center',
        'default' => '60'
    )),
    new textOption_admin_theme(array(
        'name' => 'Header logo height',
        'id' => 'header_logo_standart_height',
        'not_empty' => true,
        'width' => '100px',
        'textalign' => 'center',
        'default' => '40'
    )),
    new UploadOption_admin_theme(array(
        'type' => 'upload',
        'name' => 'Favicon',
        'id' => 'favicon',
        'desc' => 'Icon must be 16x16px or 32x32px',
        'default' => THEMEROOTURL . '/img/favicon.ico'
    )),
    new UploadOption_admin_theme(array(
        'type' => 'upload',
        'name' => 'Apple touch icon (57px)',
        'id' => 'apple_touch_57',
        'desc' => 'Icon must be 57x57px',
        'default' => THEMEROOTURL . '/img/apple_icons_57x57.png'
    )),
    new UploadOption_admin_theme(array(
        'type' => 'upload',
        'name' => 'Apple touch icon (72px)',
        'id' => 'apple_touch_72',
        'desc' => 'Icon must be 72x72px',
        'default' => THEMEROOTURL . '/img/apple_icons_72x72.png'
    )),
    new UploadOption_admin_theme(array(
        'type' => 'upload',
        'name' => 'Apple touch icon (114px)',
        'id' => 'apple_touch_114',
        'desc' => 'Icon must be 114x114px',
        'default' => THEMEROOTURL . '/img/apple_icons_114x114.png'
    )),
    new TextareaOption_admin_theme(array(
        'name' => 'Google analytics or any other code<br>(before &lt;/head&gt;)',
        'id' => 'code_before_head',
        'default' => ''
    )),
    new TextareaOption_admin_theme(array(
        'name' => 'Any code <br>(before &lt;/body&gt;)',
        'id' => 'code_before_body',
        'default' => ''
    )),
    new TextareaOption_admin_theme(array(
        'name' => 'Copyright',
        'id' => 'copyright',
        'default' => '&copy; 2020 Fit+ WordPress Theme. All Rights Reserved.'
    )),
    new TextareaOption_admin_theme(array(
        'name' => 'Call Us Number',
        'id' => 'callus',
        'default' => '+1 800 517 53 14'
    )),
    new AjaxButtonOption_admin_theme(array(
        'title' => 'Import Sample Data',
        'id' => 'action_import',
        'name' => 'Import demo content',
        'confirm' => TRUE,
        'data' => array(
            'action' => 'ajax_import_dump'
        )
    ))
)));


$gt3_tabs_admin_theme->add(new Tab_admin_theme(array(
    'name' => 'Sidebars',
    'desc' => '',
    'icon' => 'sidebars.png',
    'icon_active' => 'sidebars_active.png',
    'icon_hover' => 'sidebars_hover.png'
), array(
    new SelectOption_admin_theme(array(
        'name' => 'Default sidebar layout',
        'id' => 'default_sidebar_layout',
        'desc' => '',
        'default' => 'right-sidebar',
        'options' => array(
            'left-sidebar' => 'Left sidebar',
            'right-sidebar' => 'Right sidebar',
            'no-sidebar' => 'Without sidebar'
        )
    )),
    new SidebarManager_admin_theme(array(
        'name' => 'Sidebar manager',
        'id' => 'sidebar_manager',
        'desc' => ''
    ))
)));


$gt3_tabs_admin_theme->add(new Tab_admin_theme(array(
    'name' => 'Fonts',
    'desc' => '',
    'icon' => 'fonts.png',
    'icon_active' => 'fonts_active.png',
    'icon_hover' => 'fonts_hover.png'
), array(
    new FontSelector_admin_theme(array(
        'name' => 'Main font',
        'id' => 'main_font',
        'desc' => '',
        'default' => 'Roboto',
        'options' => get_fonts_array_only_key_name()
    )),
    new textOption_admin_theme(array(
        'name' => 'Main font parameters',
        'id' => 'google_font_parameters_main_font',
        'not_empty' => true,
        'default' => ':100,700,900',
        'width' => '100%',
        'textalign' => 'left',
        'desc' => 'Google font. Click <a href="https://developers.google.com/webfonts/docs/getting_started" target="_blank">here</a> for help.'
    )),
    new FontSelector_admin_theme(array(
        'name' => 'Headers',
        'id' => 'text_headers_font',
        'desc' => '',
        'default' => 'Roboto',
        'options' => get_fonts_array_only_key_name()
    )),
    new textOption_admin_theme(array(
        'name' => 'Headers font parameters',
        'id' => 'google_font_parameters_headers_font',
        'not_empty' => true,
        'default' => ':900',
        'width' => '100%',
        'textalign' => 'left',
        'desc' => 'Google font. Click <a href="https://developers.google.com/webfonts/docs/getting_started" target="_blank">here</a> for help.'
    )),
    new FontSelector_admin_theme(array(
        'name' => 'Content',
        'id' => 'main_content_font',
        'desc' => '',
        'default' => 'Roboto',
        'options' => get_fonts_array_only_key_name()
    )),
    new textOption_admin_theme(array(
        'name' => 'Content font parameters',
        'id' => 'google_font_parameters_main_content_font',
        'not_empty' => true,
        'default' => ':300',
        'width' => '100%',
        'textalign' => 'left',
        'desc' => 'Google font. Click <a href="https://developers.google.com/webfonts/docs/getting_started" target="_blank">here</a> for help.'
    )),
    new textOption_admin_theme(array(
        'name' => 'Content font weight',
        'id' => 'content_weight',
        'not_empty' => true,
        'default' => '300',
        'width' => '100px',
        'textalign' => 'center',
        'desc' => ''
    )),
    new textOption_admin_theme(array(
        'name' => 'Headings font weight',
        'id' => 'headings_weight',
        'not_empty' => true,
        'default' => '900',
        'width' => '100px',
        'textalign' => 'center',
        'desc' => ''
    )),
    new textOption_admin_theme(array(
        'name' => 'H1 font size',
        'id' => 'h1_font_size',
        'not_empty' => true,
        'default' => '32px',
        'width' => '100px',
        'textalign' => 'center',
        'desc' => ''
    )),
    new textOption_admin_theme(array(
        'name' => 'H2 font size',
        'id' => 'h2_font_size',
        'not_empty' => true,
        'default' => '26px',
        'width' => '100px',
        'textalign' => 'center',
        'desc' => ''
    )),
    new textOption_admin_theme(array(
        'name' => 'H3 font size',
        'id' => 'h3_font_size',
        'not_empty' => true,
        'default' => '22px',
        'width' => '100px',
        'textalign' => 'center',
        'desc' => ''
    )),
    new textOption_admin_theme(array(
        'name' => 'H4 font size',
        'id' => 'h4_font_size',
        'not_empty' => true,
        'default' => '18px',
        'width' => '100px',
        'textalign' => 'center',
        'desc' => ''
    )),
    new textOption_admin_theme(array(
        'name' => 'H5 font size',
        'id' => 'h5_font_size',
        'not_empty' => true,
        'default' => '15px',
        'width' => '100px',
        'textalign' => 'center',
        'desc' => ''
    )),
    new textOption_admin_theme(array(
        'name' => 'H6 font size',
        'id' => 'h6_font_size',
        'not_empty' => true,
        'default' => '13px',
        'width' => '100px',
        'textalign' => 'center',
        'desc' => ''
    )),
    new textOption_admin_theme(array(
        'name' => 'Content font size',
        'id' => 'main_content_font_size',
        'not_empty' => true,
        'default' => '15px',
        'width' => '100px',
        'textalign' => 'center',
        'desc' => ''
    )),
    new textOption_admin_theme(array(
        'name' => 'Content line height',
        'id' => 'main_content_line_height',
        'not_empty' => true,
        'default' => '22px',
        'width' => '100px',
        'textalign' => 'center',
        'desc' => ''
    )),
)));


$gt3_tabs_admin_theme->add(new Tab_admin_theme(array(
    'name' => 'Socials',
    'icon' => 'social.png',
    'icon_active' => 'social_active.png',
    'icon_hover' => 'social_hover.png'
), array(
    new TextOption_admin_theme(array(
        'name' => 'Facebook',
        'id' => 'social_facebook',
        'default' => 'http://facebook.com',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'Flickr',
        'id' => 'social_flickr',
        'default' => 'http://flickr.com',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'Tumblr',
        'id' => 'social_tumblr',
        'default' => 'http://tumblr.com',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'Instagram',
        'id' => 'social_instagram',
        'default' => 'http://instagram.com',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'Twitter',
        'id' => 'social_twitter',
        'default' => 'http://twitter.com',
        'desc' => 'Please specify http:// to the URL'
    )),

    new TextOption_admin_theme(array(
        'name' => 'Youtube',
        'id' => 'social_youtube',
        'default' => 'https://www.youtube.com/',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'Dribbble',
        'id' => 'social_dribbble',
        'default' => 'http://dribbble.com/',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'Google+',
        'id' => 'social_gplus',
        'default' => 'https://plus.google.com/',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'Vimeo',
        'id' => 'social_vimeo',
        'default' => 'https://vimeo.com/',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'Delicious',
        'id' => 'social_delicious',
        'default' => 'https://delicious.com/',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'Linked In',
        'id' => 'social_linked',
        'default' => 'https://www.linkedin.com/',
        'desc' => 'Please specify http:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'Pinterest',
        'id' => 'social_pinterest',
        'default' => 'http://pinterest.com',
        'desc' => 'Please specify http:// to the URL'
    )),
)));


$gt3_tabs_admin_theme->add(new Tab_admin_theme(array(
    'name' => 'Contacts',
    'icon' => 'contacts.png',
    'icon_active' => 'contacts_active.png',
    'icon_hover' => 'contacts_hover.png'
), array(
    new TextOption_admin_theme(array(
        'name' => 'Send mails to',
        'id' => 'contacts_to',
        'default' => get_option("admin_email")
    )),
    new TextOption_admin_theme(array(
        'name' => 'Phone number',
        'id' => 'phone',
        'default' => '+1 800 789 50 12'
    )),
)));


$gt3_tabs_admin_theme->add(new Tab_admin_theme(array(
    'name' => 'View Options',
    'icon' => 'layout.png',
    'icon_active' => 'layout_active.png',
    'icon_hover' => 'layout_hover.png'
), array(
    new SelectOption_admin_theme(array(
        'name' => 'Responsive',
        'id' => 'responsive',
        'desc' => '',
        'default' => 'on',
        'options' => array(
            'on' => 'On',
            'off' => 'Off'
        )
    )),
    new SelectOption_admin_theme(array(
        'name' => 'Default layout',
        'id' => 'default_layout',
        'desc' => '',
        'default' => 'clean',
        'options' => array(
            'clean' => 'Clean',
			'boxed' => 'Pattern or color',
            'bgimage' => 'Background image'
        )
    )),	
    new UploadOption_admin_theme(array(
        'type' => 'upload',
        'name' => 'Default background image',
        'id' => 'bg_img',
        'desc' => '',
        'default' => THEMEROOTURL . '/img/def_bg.jpg'
    )),
    new UploadOption_admin_theme(array(
        'type' => 'upload',
        'name' => 'Default background pattern',
        'id' => 'bg_pattern',
        'desc' => '',
        'default' => THEMEROOTURL . '/img/def_pattern.png'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Default background color',
        'id' => 'default_bg_color',
        'desc' => '',
        'not_empty' => 'true',
        'default' => 'ffffff'
    )),

    new SelectOption_admin_theme(array(
        'name' => 'Related Posts',
        'id' => 'related_posts',
        'desc' => '',
        'default' => 'on',
        'options' => array(
            'on' => 'On',
            'off' => 'Off'
        )
    )),
    new SelectOption_admin_theme(array(
        'name' => 'Default blog post style',
        'id' => 'default_blogpost_style',
        'desc' => '',
        'default' => 'simple-blogpost',
        'options' => array(
            'simple-blogpost' => 'Simple',
            'fw-blogpost' => 'Fullscreen'
        )
    )),
    new SelectOption_admin_theme(array(
        'name' => 'Default portfolio style',
        'id' => 'default_portfolio_style',
        'desc' => '',
        'default' => 'simple-portfolio-post',
        'options' => array(
            'simple-portfolio-post' => 'Simple',
            'fw-portfolio-post' => 'Fullscreen'
        )
    )),	
    new SelectOption_admin_theme(array(
        'name' => 'Portfolio comments',
        'id' => 'portfolio_comments',
        'desc' => '',
        'default' => 'disabled',
        'options' => array(
            'disabled' => 'Disabled',
            'enabled' => 'Enabled'
        )
    )),
    new SelectOption_admin_theme(array(
        'name' => 'Page comments',
        'id' => 'page_comments',
        'desc' => '',
        'default' => 'disabled',
        'options' => array(
            'disabled' => 'Disabled',
            'enabled' => 'Enabled'
        )
    )),
    new TextareaOption_admin_theme(array(
        'name' => 'Custom CSS',
        'id' => 'custom_css',
        'default' => ''
    )),
)));


$gt3_tabs_admin_theme->add(new Tab_admin_theme(array(
    'name' => 'Color Options',
    'icon' => 'colors.png',
    'icon_active' => 'colors_active.png',
    'icon_hover' => 'colors_hover.png'
), array(
    new ColorOption_admin_theme(array(
        'name' => 'Theme color',
        'id' => 'theme_color1',
        'desc' => '',
        'not_empty' => 'true',
        'default' => 'd44b3f'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Main text color',
        'id' => 'main_text_color',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '696b6e'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Heading color',
        'id' => 'header_text_color',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '2b333c'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Page title heading color',
        'id' => 'pagetitle_header_text_color',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '2b333c'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Main menu text color',
        'id' => 'main_menu_text_color',
        'desc' => '',
        'not_empty' => 'true',
        'default' => 'ffffff'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Sub-menu text color',
        'id' => 'submenu_text_color',
        'desc' => '',
        'not_empty' => 'true',
        'default' => 'e9ece6'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Sub-menu hovered text color',
        'id' => 'submenu_hover_color',
        'desc' => '',
        'not_empty' => 'true',
        'default' => 'ffffff'
    )),
    new ColorOption_admin_theme(array(
        'name' => '2nd level background odd',
        'id' => 'main_menu_2nd_bg_color_odd',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '46515e'
    )),
    new ColorOption_admin_theme(array(
        'name' => '2nd level background even',
        'id' => 'main_menu_2nd_bg_color_even',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '353e48'
    )),
    new ColorOption_admin_theme(array(
        'name' => '3rd level background odd',
        'id' => 'main_menu_3rd_bg_color_odd',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '2a3139'
    )),
    new ColorOption_admin_theme(array(
        'name' => '3rd level background even',
        'id' => 'main_menu_3rd_bg_color_even',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '3d4752'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Sidebar background color',
        'id' => 'sidebar_bg_color',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '46515e'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Footer background',
        'id' => 'footer_bg',
        'desc' => '',
        'not_empty' => 'true',
        'default' => 'dbdfd8'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Footer text',
        'id' => 'footer_text',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '696b6e'
    )),

    new ColorOption_admin_theme(array(
        'name' => 'Menu Background 1',
        'id' => 'menu_color1',
        'desc' => '',
        'not_empty' => 'true',
        'default' => 'afb5ab'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Menu Background 2',
        'id' => 'menu_color2',
        'desc' => '',
        'not_empty' => 'true',
        'default' => 'd1d27b'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Menu Background 3',
        'id' => 'menu_color3',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '567d81'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Menu Background 4',
        'id' => 'menu_color4',
        'desc' => '',
        'not_empty' => 'true',
        'default' => 'e6b08c'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Menu Background 5',
        'id' => 'menu_color5',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '788c68'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Menu Background 6',
        'id' => 'menu_color6',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '46515e'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Menu Background 7',
        'id' => 'menu_color7',
        'desc' => '',
        'not_empty' => 'true',
        'default' => 'afb5ab'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Menu Background 8',
        'id' => 'menu_color8',
        'desc' => '',
        'not_empty' => 'true',
        'default' => 'd1d27b'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Menu Background 9',
        'id' => 'menu_color9',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '567d81'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Menu Background 10',
        'id' => 'menu_color10',
        'desc' => '',
        'not_empty' => 'true',
        'default' => 'e6b08c'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Menu Background 11',
        'id' => 'menu_color11',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '788c68'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Menu Background 12',
        'id' => 'menu_color12',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '46515e'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Menu Background 13',
        'id' => 'menu_color13',
        'desc' => '',
        'not_empty' => 'true',
        'default' => 'afb5ab'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Menu Background 14',
        'id' => 'menu_color14',
        'desc' => '',
        'not_empty' => 'true',
        'default' => 'd1d27b'
    )),
    new ColorOption_admin_theme(array(
        'name' => 'Menu Background 15',
        'id' => 'menu_color15',
        'desc' => '',
        'not_empty' => 'true',
        'default' => '567d81'
    )),
	
)));

?>