<?php
//For testing purposes
add_filter('show_admin_bar', '__return_false');

// WordPress Titles
add_theme_support( 'title-tag' );

//Post rendering
//Clear empty 'p' tags from posts
add_filter('the_content', 'remove_empty_tags_recursive', 20, 1);
function remove_empty_tags_recursive ($str, $repto = NULL) {
         $str = force_balance_tags($str);
         // Return if string not given or empty.
         if (!is_string ($str)
         || trim ($str) == '')
        return $str;
 
        // Recursive empty HTML tags.
       return preg_replace (
              '~\s?<p>(\s|&nbsp;)+</p>\s?~',
             // Replace with nothing if string empty.
             !is_string ($repto) ? '' : $repto,
           $str
);}

// Add scripts and stylesheets
function startwordpress_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7' );
	wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true );
}

add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );

// Add Google Fonts
function startwordpress_google_fonts() {
				wp_register_style('OpenSans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
				wp_enqueue_style( 'OpenSans');
				wp_register_style('Raleway', 'http://fonts.googleapis.com/css?family=Raleway:200i,400');
				wp_enqueue_style( 'Raleway');
				wp_register_style('Playfair Display', 'http://fonts.googleapis.com/css?family=Playfair+Display');
				wp_enqueue_style( 'Playfair Display');
				wp_register_style('Clicker Script', 'https://fonts.googleapis.com/css?family=Clicker+Script');
				wp_enqueue_style( 'Clicker Script');
		}

add_action('wp_print_styles', 'startwordpress_google_fonts');

// Custom settings
function custom_settings_add_menu() {
  add_menu_page( 'Social links Settings', 'Social links Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99 );
}
add_action( 'admin_menu', 'custom_settings_add_menu' );
// Create Custom Global Settings
function custom_settings_page() { ?>
  <div class="wrap">
    <h1>Social links settings</h1>
    <form method="post" action="options.php">
       <?php
           settings_fields( 'section' );
           do_settings_sections( 'theme-options' );      
           submit_button(); 
       ?>          
    </form>
  </div>
<?php }
// Facebook
function setting_facebook() { ?>
  <input type="text" name="facebook" id="facebook" value="<?php echo get_option( 'facebook' ); ?>" />
<?php }
function setting_instagram() { ?>
  <input type="text" name="instagram" id="instagram" value="<?php echo get_option('instagram'); ?>" />
<?php }
function custom_settings_page_setup() {
  add_settings_section( 'section', 'Links', null, 'theme-options' );

  add_settings_field( 'facebook', 'Facebook URL', 'setting_facebook', 'theme-options', 'section' );
  add_settings_field( 'instagram', 'Instagram URL', 'setting_instagram', 'theme-options', 'section' );

  register_setting('section', 'facebook');
  register_setting('section', 'instagram');
}
add_action( 'admin_init', 'custom_settings_page_setup' );

// Tiled Gallery without jetpack
if ( ! isset( $content_width ) ) {
    $content_width = 1000;
}