<?php

/**
  ReduxFramework Sample Config File
  For full documentation, please visit: https://docs.reduxframework.com
 * */

if (!class_exists('admin_folder_Redux_Framework_config')) {

    class admin_folder_Redux_Framework_config {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }

        }

        public function initSettings() {

            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            // If Redux is running as a plugin, this will remove the demo notice and links
            add_action( 'redux/loaded', array( $this, 'remove_demo' ) );
            
            // Function to test the compiler hook and demo CSS output.
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 2);
            
            // Change the arguments after they've been declared, but before the panel is created
            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
            
            // Change the default value of a field after it's been set, but before it's been useds
            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );
            
            // Dynamically add a section. Can be also used to modify sections/fields
            //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        /**

          This is a test function that will let you see when the compiler hook occurs.
          It only runs if a field	set with compiler=>true is changed.

         * */
        function compiler_action($options, $css) {
            
            // Demo of how to use the dynamic CSS and write your own static CSS file
            $filename_css = get_template_directory() . '/css/custom.css';
            $filename_js = get_template_directory() . '/js/custom.js';
            global $wp_filesystem;

            if( empty( $wp_filesystem ) ) {
                require_once( ABSPATH .'/wp-admin/includes/file.php' );
                WP_Filesystem();
            }

            if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename_css,
                    $options['custom_css'],
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
                $wp_filesystem->put_contents(
                    $filename_js,
                    $options['custom_js'],
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
            }
        
        }

        /**

          Custom function for filtering the sections array. Good for child themes to override or add to the sections.
          Simply include this function in the child themes functions.php file.

          NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
          so you must use get_template_directory_uri() if you want to use any of the built in icons

         * */
        function dynamic_section($sections) {
            //$sections = array();
            $sections[] = array(
                'title' => __('Section via hook', 'pc'),
                'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'pc'),
                'icon' => 'el-icon-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }

        /**

          Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.

         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }

        /**

          Filter hook for filtering the default value of any given field. Very useful in development mode.

         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
            }
        }

        public function setSections() {

            /**
              Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
            $sample_patterns_path   = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url    = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns        = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode('.', $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[]  = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct             = wp_get_theme();
            $this->theme    = $ct;
            $item_name      = $this->theme->get('Name');
            $tags           = $this->theme->Tags;
            $screenshot     = $this->theme->get_screenshot();
            $class          = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'pc'), $this->theme->display('Name'));
            
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                <?php endif; ?>

                <h4><?php echo $this->theme->display('Name'); ?></h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'pc'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'pc'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'pc') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
            <?php
            if ($this->theme->parent()) {
                printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'pc'), $this->theme->parent()->display('Name'));
            }
            ?>

                </div>
            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                /** @global WP_Filesystem_Direct $wp_filesystem  */
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    require_once(ABSPATH . '/wp-admin/includes/file.php');
                    WP_Filesystem();
                }
                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }

            $this->sections[] = array(
                'icon'      => 'el-icon-cogs',
                'title'     => __('General', 'pc'),
                'fields'    => array(
                    array(
                        'id'        => 'disable_logo',
                        'type'      => 'switch',
                        'title'     => __('Disable Logo', 'pc'),
                        'default'   => false,
                    ),

                    array(
                        'id'        => 'opt-footer-text',
                        'type'      => 'editor',
                        'title'     => __('Footer Text', 'redux_demo'),
                        'default'   => '&copy; 2014 Perfect Couple - Premium WordPress Theme by <a target="_blank" href="http://themeforest.net/user/Coffeecream/portfolio">Coffeecream Themes</a>',
                    ),

                    array(
                        'id'        => 'css3_animations',
                        'type'      => 'switch',
                        'title'     => __('CSS3 Animations', 'pc'),
                        'default'   => 1,
                    ),

                    array(
                        'id'        => 'custom_css',
                        'type'      => 'ace_editor',
                        'title'     => __('Custom CSS', 'pc'),
                        'subtitle'  => __('Quickly add some CSS to your theme by adding it to this block.', 'pc'),
                        'compiler'  => true,
                        'validate'  => 'css',
                        'default'   => ''
                    ),
                    array(
                        'id'        => 'custom_js',
                        'type'      => 'ace_editor',
                        'title'     => __('Custom JS', 'pc'),
                        'subtitle'  => __('Quickly add some JS to your theme (like Google Analytics code) by adding it to this block. Note: do not wrap your code into SCRIPT tag.', 'pc'),
                        'compiler'  => true,
                        'validate'  => 'javascript',
                        'default'   => ''
                    ),

                )
            );

            $this->sections[] = array(
                'icon'      => 'el-icon-font',
                'title'     => __('Typography', 'redux_demo'),
                'fields'    => array(
                    array(
                        'id'        => 'h1_h2_font',
                        'type'      => 'typography',
                        'output'    => array('h1,h2'),
                        'title'     => __('First Level Headings Fonts', 'pc'),
                        'google'    => true,
                        'font-size' => false,
                        'color'     => false,
                        'line-height'=> false,
                        'text-align'=> false,
                        'default'   => array(
                            'font-family'   => 'Engagement',
                            'font-weight'   => '400',
                            'google'        => 'true',
                            'subsets'       => 'latin-ext'
                        ),
                    ),
                    array(
                        'id'        => 'headings_font',
                        'type'      => 'typography',
                        'output'    => 'h3, h4, h5, h6, .btn',
                        'title'     => __('Second Level Headings Font', 'pc'),
                        'google'    => true,
                        'font-size' => false,
                        'color'     => false,
                        'line-height'=> false,
                        'text-align'=> false,
                        'default'   => array(
                            'font-family'   => 'Open Sans',
                            'font-weight'   => '800',
                            'google'        => 'true',
                            'subsets'       => 'latin-ext'
                        ),
                    ),
                    array(
                        'id'        => 'body_font',
                        'type'      => 'typography',
                        'output'    => 'body',
                        'title'     => __('Body Font', 'pc'),
                        'google'    => true,
                        'font-size' => false,
                        'color'     => false,
                        'line-height'=> false,
                        'text-align'=> false,
                        'default'   => array(
                            'font-family'   => 'PT Serif',
                            'font-weight'   => '400',
                            'google'        => 'true',
                            'subsets'       => 'latin-ext'
                        ),
                    ),
                )
            );

            $this->sections[] = array(
                'icon'      => 'el-icon-brush',
                'title'     => __('Styling Options', 'pc'),
                'fields'    => array(
                    array(
                        'id'        => 'accent_color',
                        'type'      => 'color',
                        'title'     => __('Accent Color', 'redux-framework-demo'),
                        'default'   => '#d6516d',
                        'output'    => array(
                            'background-color' => '.navbar-default, .btn-primary, .fact-item.img-circle, .hover-effect span, #rsvp, .dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus',
                            'color' => 'a, h6, .heading i, .countdown-period, .social-icons a:hover, .post-header span',
                            'border-color' => '.heading span, .social-icons a:hover',
                        )
                    ),

                    array(
                        'id'        => 'secondary_accent_color',
                        'type'      => 'color',
                        'title'     => __('Secondary Accent Color', 'redux-framework-demo'),
                        'default'   => '#ce3052',
                        'output'    => array(
                            'background-color' => '.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus, .btn-primary:hover, .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus, .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus',
                            'color' => 'a:hover',
                        )
                    ),

                    
                )
            );

            $this->sections[] = array(
                'type' => 'divide',
            );

            $this->sections[] = array(
                'title'     => __('Import / Export', 'pc'),
                'desc'      => __('Import and Export your Redux Framework settings from file, text or URL.', 'pc'),
                'icon'      => 'el-icon-refresh',
                'fields'    => array(
                    array(
                        'id'            => 'opt-import-export',
                        'type'          => 'import_export',
                        'title'         => 'Import Export',
                        'subtitle'      => 'Save and restore your Redux options',
                        'full_width'    => false,
                    ),
                ),
            );                     

        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-1',
                'title'     => __('Theme Information 1', 'pc'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'pc')
            );

            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-2',
                'title'     => __('Theme Information 2', 'pc'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'pc')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'pc');
        }

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                'opt_name' => 'theme_pc',
                'display_name' => 'Perfect Couple',
                'display_version' => '1.0',
                'page_slug' => '_options',
                'page_title' => 'Perfect Couple Options',
                'dev_mode' => '0',
                'update_notice' => '1',
                'intro_text' => '<p>Theme by <a href="http://themeforest.net/user/Coffeecream/portfolio">Coffeecream</a>. For support send us a message on our <a href="http://themeforest.net/user/Coffeecream">profile page</a> or email us: <a href="mailto: support@coffeecreamthemes.zendesk.com">support@coffeecreamthemes.zendesk.com</a>.</p>',
                'footer_text' => '<p>Theme by <a href="http://themeforest.net/user/Coffeecream/portfolio">Coffeecream</a>. For support send us a message on our <a href="http://themeforest.net/user/Coffeecream">profile page</a> or email us: <a href="mailto: support@coffeecreamthemes.zendesk.com">support@coffeecreamthemes.zendesk.com</a>.</p>',
                'admin_bar' => '1',
                'menu_type' => 'menu',
                'menu_title' => 'Perfect Couple Options',
                'page_parent_post_type' => 'your_post_type',
                'default_show' => '1',
                'default_mark' => '*',
                'hints' => 
                array(
                  'icon' => 'el-icon-question-sign',
                  'icon_position' => 'right',
                  'icon_size' => 'normal',
                  'tip_style' => 
                  array(
                    'color' => 'light',
                  ),
                  'tip_position' => 
                  array(
                    'my' => 'top left',
                    'at' => 'bottom right',
                  ),
                  'tip_effect' => 
                  array(
                    'show' => 
                    array(
                      'duration' => '500',
                      'event' => 'mouseover',
                    ),
                    'hide' => 
                    array(
                      'duration' => '500',
                      'event' => 'mouseleave unfocus',
                    ),
                  ),
                ),
                'output' => '1',
                'output_tag' => '1',
                'compiler' => '1',
                'page_icon' => 'icon-themes',
                'page_permissions' => 'manage_options',
                'save_defaults' => '1',
                'show_import_export' => '1',
                'transient_time' => '3600',
                'network_sites' => '1',
              );

            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
                'title' => 'Visit us on GitHub',
                'icon'  => 'el-icon-github'
                //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
                'title' => 'Like us on Facebook',
                'icon'  => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://twitter.com/reduxframework',
                'title' => 'Follow us on Twitter',
                'icon'  => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://www.linkedin.com/company/redux-framework',
                'title' => 'Find us on LinkedIn',
                'icon'  => 'el-icon-linkedin'
            );

        }

    }
    
    global $reduxConfig;
    $reduxConfig = new admin_folder_Redux_Framework_config();
}

/**
  Custom function for the callback referenced above
 */
if (!function_exists('admin_folder_my_custom_field')):
    function admin_folder_my_custom_field($field, $value) {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
endif;

/**
  Custom function for the callback validation referenced above
 * */
if (!function_exists('admin_folder_validate_callback_function')):
    function admin_folder_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';

        /*
          do your validation

          if(something) {
            $value = $value;
          } elseif(something else) {
            $error = true;
            $value = $existing_value;
            $field['msg'] = 'your custom error message';
          }
         */

        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }
endif;
