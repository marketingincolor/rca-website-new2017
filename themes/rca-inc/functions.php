<?php
/**
 * RCA Inc. functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RCA_Inc.
 */

if ( ! function_exists( 'rca_inc_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function rca_inc_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on RCA Inc., use a find and replace
     * to change 'rca-inc' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'rca-inc', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
      'menu-1' => esc_html__( 'Primary', 'rca-inc' ),
      'secondary' => esc_html__( 'Secondary Menu Desktop', 'rca-inc' )
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'rca_inc_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support( 'custom-logo', array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    ) );
  }
endif;
add_action( 'after_setup_theme', 'rca_inc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rca_inc_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'rca_inc_content_width', 640 );
}
add_action( 'after_setup_theme', 'rca_inc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rca_inc_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'rca-inc' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'rca-inc' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'rca_inc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rca_inc_scripts() {

  wp_register_script('afp_script', get_template_directory_uri() . '/js/rca-filter-news.js', false, null, true);
  wp_enqueue_script('afp_script');
 
  wp_localize_script( 'afp_script', 'afp_vars', array(
        'afp_nonce' => wp_create_nonce( 'afp_nonce' ), // Create nonce which we later will use to verify AJAX request
        'afp_ajax_url' => admin_url( 'admin-ajax.php' ),
        'templateURL' => get_stylesheet_directory_uri()
      )
  );
  wp_enqueue_script( 'rca-cat-sorting', get_template_directory_uri() . '/js/selected-category.js');
  wp_enqueue_style( 'rca-inc-style', get_stylesheet_uri() );
  // wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/foundation.css');
//  wp_enqueue_script( 'top-slider', get_stylesheet_directory_uri() . '/js/top-slider.js' );
  wp_enqueue_script( 'rca-inc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
  wp_enqueue_script( 'header-scroll-js', get_template_directory_uri() . '/js/header-scroll.js' );
  wp_enqueue_script( 'rca-inc-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );


  $translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
  //after wp_enqueue_script
  wp_localize_script( 'rca-filter-news', 'object_name', $translation_array );
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'rca_inc_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
  require get_template_directory() . '/inc/jetpack.php';
}


/* ------------------------------------------------------------------------ *
 * Theme Options - Add Menu
 * ------------------------------------------------------------------------ */
function rca_theme_menu()
{
  //add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function );
  add_theme_page( 'Theme Option', 'Theme Options', 'manage_options', 'rca-theme-options', 'rca_theme_page');  
}
add_action('admin_menu', 'rca_theme_menu');

/* ------------------------------------------------------------------------ *
 * Theme Options - Add Content to Theme Options Page
 * ------------------------------------------------------------------------ */
function rca_theme_page()
{

echo '<div class="wrap">
    <div id="icon-options-general" class="icon32"></div>
      <h1>RCA: Theme Options</h1>
      <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-1">
        <div id="post-body-content">
          <div class="meta-box-sortables ui-sortable">
            <div class="postbox">
              <div class="inside">
                <div class="section-panel">
                  <h1></h1>
                  <form method="post" enctype="multipart/form-data" action="options.php">';
                  settings_fields('rca_theme_options'); 
                  do_settings_sections('rca_theme_options.php');
                  echo '<p class="submit">
                  <input type="submit" class="button-primary" value="Save Changes" />
                  </p>
                  </form>
                </div>
                <p></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> ';

}
       
/* ------------------------------------------------------------------------ *
 * Theme Options - Register Settings
 * ------------------------------------------------------------------------ */

function rca_register_settings()
{
    // Register the settings with Validation callback
    register_setting( 'rca_theme_options', 'rca_theme_options', 'rca_validate_settings' );

    // Add settings section
    add_settings_section( 'rca_text_section', '', 'rca_display_section', 'rca_theme_options.php' );

    //Facebook Link Args
    $fb_args = array(
      'type'      => 'text',
      'id'        => 'rca_fb_textbox',
      'name'      => 'rca_fb_textbox',
      'desc'      => '',
      'std'       => '',
      'label_for' => 'rca_fb_textbox',
      'class'     => 'css_class'
    );

    $twitter_args = array(
      'type'      => 'text',
      'id'        => 'rca_twitter_textbox',
      'name'      => 'rca_twitter_textbox',
      'desc'      => '',
      'std'       => '',
      'label_for' => 'rca_twitter_textbox',
      'class'     => 'css_class'
    );

    $youtube_args = array(
      'type'      => 'text',
      'id'        => 'rca_youtube_textbox',
      'name'      => 'rca_youtube_textbox',
      'desc'      => '',
      'std'       => '',
      'label_for' => 'rca_youtube_textbox',
      'class'     => 'css_class'
    );

    $linkedin_args = array(
      'type'      => 'text',
      'id'        => 'rca_linkedin_textbox',
      'name'      => 'rca_linkedin_textbox',
      'desc'      => '',
      'std'       => '',
      'label_for' => 'rca_linkedin_textbox',
      'class'     => 'css_class'
    );

    //Facebook Link Args
    $phone_args = array(
      'type'      => 'text',
      'id'        => 'rca_phone_number',
      'name'      => 'rca_phone_number',
      'desc'      => '',
      'std'       => '',
      'label_for' => 'rca_phone_number',
      'class'     => 'css_class'
    );

    $bio_page_slider_title = array(
      'type'      => 'text',
      'id'        => 'bio_page_slider_title',
      'name'      => 'bio_page_slider_title',
      'desc'      => 'Slider used on single-staff.php.',
      'std'       => '',
      'label_for' => 'bio_page_slider_title',
      'class'     => 'css_class'
    );

    add_settings_field( 'rca_fb_link', 'Facebook Link:', 'rca_display_setting', 'rca_theme_options.php', 'rca_text_section', $fb_args );
    add_settings_field( 'rca_twitter_link', 'Twitter Link:', 'rca_display_setting', 'rca_theme_options.php', 'rca_text_section', $twitter_args );
    add_settings_field( 'rca_youtube_link', 'YouTube Link:', 'rca_display_setting', 'rca_theme_options.php', 'rca_text_section', $youtube_args );
    add_settings_field( 'rca_linkedin_link', 'LinkedIn Link:', 'rca_display_setting', 'rca_theme_options.php', 'rca_text_section', $linkedin_args );
    add_settings_field( 'rca_phone_number', 'Phone Number:', 'rca_display_setting', 'rca_theme_options.php', 'rca_text_section', $phone_args );
    add_settings_field( 'bio_page_slider_title', 'Staff Bio Slider Title:', 'rca_display_setting', 'rca_theme_options.php', 'rca_text_section', $bio_page_slider_title );

}
add_action( 'admin_init', 'rca_register_settings' );

/* ------------------------------------------------------------------------ *
 * Theme Options - Image Sizes
 * ------------------------------------------------------------------------ */
add_theme_support( 'post-thumbnails' );

function rca_theme_img_sizes() {
  add_image_size('banner-img', 1430, 175 );
  add_image_size('staff_profile_picture', 360, 380 );
}

add_action( 'after_setup_theme', 'rca_theme_img_sizes' );

/* ------------------------------------------------------------------------ *
 * Theme Options - Displays Theme Sections
 * ------------------------------------------------------------------------ */
function rca_display_section($section){ 

}

/* ------------------------------------------------------------------------ *
 * Theme Options - Display Settings
 * ------------------------------------------------------------------------ */
function rca_display_setting($args)
{
    extract( $args );

    $option_name = 'rca_theme_options';

    $options = get_option( $option_name );

    switch ( $type ) {  
          case 'text':  
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
              echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
          break;  
    }
}

/* ------------------------------------------------------------------------ *
 * Theme Options - Validate Settings
 * ------------------------------------------------------------------------ */
function rca_validate_settings($input)
{
  foreach($input as $k => $v)
  {
    $newinput[$k] = trim($v);
    
    // Check the input is a letter or a number
    // if(!preg_match('/^[A-Z0-9 _]*$/i', $v)) {
    //   $newinput[$k] = '';
    // }
  }

  return $newinput;
}

/* ------------------------------------------------------------------------ *
 * Menus - Footer Menu
 * ------------------------------------------------------------------------ */
register_nav_menus( array(
  'rca_mobile_footer_menu_left' => 'Mobile Footer Menu Left',
  'rca_mobile_footer_menu_right' => 'Mobile Footer Menu Right',
  'rca_desktop_footer_menu' => 'Desktop Footer Menu',
  'new_desktop_menu' => 'New Desktop Menu'
) );


/* ------------------------------------------------------------------------ *
* Carousel - Top
* ------------------------------------------------------------------------ */
/**
 * Slider on top of home page
 * @param  [type] $atts    [description]
 * @param  [type] $content [description]
 * @return [type]          [description]
 */

function rca_top_slider($atts, $content = null) {
    extract(shortcode_atts(array(
        'category' => 'Uncategorized',
                    ), $atts));

    $data_attr = "";
    foreach ($atts as $key => $value) {
        if ($key != "category") {
            $data_attr .= ' data-' . $key . '="' . $value . '" ';
        }
    }

    $lazyLoad = array_key_exists("lazyload", $atts) && $atts["lazyload"] == true;

    $args = array(
        'post_type' => 'owl-carousel',
        'orderby' => get_option('owl_carousel_orderby', 'post_date'),
        'order' => 'asc',
        'tax_query' => array(
            array(
                'taxonomy' => 'Carousel',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        ),
        'nopaging' => true
    );

  $result = '<div id="owl-carousel-top-slider" class="owl-carousel owl-carousel-' . sanitize_title($atts['category']) . '" ' . $data_attr . '>';

    $loop = new WP_Query($args);
    while ($loop->have_posts()) {
        $loop->the_post();

        $call_to_action_links = get_field('call_to_action_links');

        if($call_to_action_links == FALSE) {
          $call_to_action_links = '#!';
        }
        //var_dump($call_to_action_links);
        $call_to_action_title = get_field('call_to_action_title');
        if($call_to_action_title == FALSE) {
          $call_to_action_title = 'Read More';
        }

        $img_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), get_post_type());
        $meta_link = get_post_meta(get_post_thumbnail_id(get_the_ID()), '_owlurl', true);

        if ($img_src[0]) {
          $result .= '<div class="item" style="background-image: url('.$img_src[0].')">';
          $result .= '<div class="row">';
            if (!empty($meta_link)) {
                $result .= '<a href="' . $meta_link . '">';
            }
            if (!empty($meta_link)) {
                $result .= '</a>';
            }

            // Add image overlay with hook
            $slide_title = get_the_title();
            $slide_content = get_the_content();
            $img_overlay = '<div class="small-10 small-offset-1 medium-5 medium-offset-0 large-4 columns">';
            $img_overlay .= '<div class="slide-meta"><p>'.$slide_content.'</p><p class="text-center linkp"><a href="' .  $call_to_action_links  . '">'. $call_to_action_title . '</a></p></div>';
            $result .= apply_filters('owlcarousel_img_overlay', $img_overlay, $slide_title, $slide_content, $meta_link);
            $result .= '</div></div>';
        } else {
            $result .= '<div class="owl-carousel-item-text">' . get_the_content() . '</div>';
        }
        $result .= '</div>';
    }
    $result .= '</div>';
    
    /* Restore original Post Data */
    wp_reset_postdata();

    return $result;
}
add_shortcode('rca-top-slider', 'rca_top_slider');

/* ------------------------------------------------------------------------ *
* Carousel 2 - Top
* ------------------------------------------------------------------------ */


function rca_top_slider_2($atts, $content = null) {
    extract(shortcode_atts(array(
        'category' => 'Uncategorized'
                    ), $atts));

    $data_attr = "";
    foreach ($atts as $key => $value) {
        if ($key != "category") {
            $data_attr .= ' data-' . $key . '="' . $value . '" ';
        }
    }

    $lazyLoad = array_key_exists("lazyload", $atts) && $atts["lazyload"] == true;

    $args = array(
        'post_type' => 'owl-carousel',
        'orderby' => get_option('owl_carousel_orderby', 'post_date'),
        'order' => 'asc',
        'tax_query' => array(
            array(
                'taxonomy' => 'Carousel',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        ),
        'nopaging' => true
    );

  $result = '<div id="owl-carousel-top-slider-2" class="owl-carousel owl-carousel-' . sanitize_title($atts['category']) . '" ' . $data_attr . '>';

    $loop = new WP_Query($args);
    while ($loop->have_posts()) {
        $loop->the_post();

        $result .= '<div class="item">';
        $result .= '<div class="owl-carousel-item-text">' . get_the_content() . '</div>';
        $result .= '</div>';
    }
    $result .= '</div>';
    
    /* Restore original Post Data */
    wp_reset_postdata();

    return $result;
}
add_shortcode('rca-top-slider-2', 'rca_top_slider_2');


/* ------------------------------------------------------------------------ *
* Carousel - News
* ------------------------------------------------------------------------ */
function rca_news_slider($atts, $content = null) {
    extract(shortcode_atts(array(
        'category' => 'Uncategoryzed'
                    ), $atts));

    $data_attr = "";
    foreach ($atts as $key => $value) {
        if ($key != "category") {
            $data_attr .= ' data-' . $key . '="' . $value . '" ';
        }
    }

    $lazyLoad = array_key_exists("lazyload", $atts) && $atts["lazyload"] == true;

    $args = array(
        'post_type' => 'owl-carousel',
        'orderby' => get_option('owl_carousel_orderby', 'post_date'),
        'order' => 'asc',
        'tax_query' => array(
            array(
                'taxonomy' => 'Carousel',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        ),
        'nopaging' => true
    );

  $result = '<div id="owl-carousel-news" class="owl-carousel owl-carousel-' . sanitize_title($atts['category']) . '" ' . $data_attr . '>';

    $loop = new WP_Query($args);
    while ($loop->have_posts()) {
        $loop->the_post();

        $img_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), get_post_type());
        $meta_link = get_post_meta(get_post_thumbnail_id(get_the_ID()), '_owlurl', true);

        $result .= '<div class="item">';
        if ($img_src[0]) {
            $result .= '<div>';
            if (!empty($meta_link)) {
                $result .= '<a href="' . $meta_link . '">';
            }
            if ($lazyLoad) {
                $result .= '<img class="lazyOwl" title="' . get_the_title() . '" data-src="' . $img_src[0] . '" alt="' . get_the_title() . '"/>';
            } else {
                $result .= '<img title="' . get_the_title() . '" src="' . $img_src[0] . '" alt="' . get_the_title() . '"/>';
            }
            if (!empty($meta_link)) {
                $result .= '</a>';
            }

            // Add image overlay with hook
            $slide_title = get_the_title();
            $slide_content = get_the_content();
            $img_overlay = '<div class="owl-carousel-item-imgoverlay">';
            $img_overlay .= '<div class="owl-carousel-item-imgtitle">' . $slide_title . '</div>';
            $img_overlay .= '<div class="owl-carousel-item-imgcontent">' . wpautop($slide_content) . '</div>';
            $img_overlay .= '</div>';
            $result .= apply_filters('owlcarousel_img_overlay', $img_overlay, $slide_title, $slide_content, $meta_link);

            $result .= '</div>';
        } else {
            $result .= '<div class="owl-carousel-item-text">' . get_the_content() . '</div>';
        }
        $result .= '</div>';
    }
    $result .= '</div>';
    
    /* Restore original Post Data */
    wp_reset_postdata();

    return $result;
}
add_shortcode('rca-news-slider', 'rca_news_slider');


/* ------------------------------------------------------------------------ *
* Navigation - Mobile
* ------------------------------------------------------------------------ */
class RCA_ACCORDIAN_MENU_WALKER extends Walker_Nav_Menu {


  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat( "\t", $depth );
    $output .= "\n$indent<ul class=\"menu vertical nested\">\n";
  }
}

function rca_accordian_menu_fallback( $args ) {

  $walker_page = new Walker_Page();
  $fallback    = $walker_page->walk( get_pages(), 0 );
  $fallback    = str_replace( "children", "children vertical menu nested", $fallback );
  echo '<ul class="menu accordian-menu vertical large-horizontal" data-responsive-menu="medium-dropdown" data-hide-for="large" style="width: 100%;" data-accordion-menu>' . $fallback . '</ul>';
}

// mega menu walker
class megaMenuWalker extends Walker_Nav_Menu {
    private $column_limit = 3;
    private $show_widget = false;
    private $column_count = 0;
    static $li_count = 0;
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $item_id = $item->ID;
        if ($depth == 0) {
            self::$li_count = 0;
        }
        if ($depth == 0 && in_array("widget", $classes)) {
            $this->show_widget = true;
            $this->column_count++;
        }
        if ($depth == 1 && self::$li_count == 1) {
            $this->column_count++;
        }
        if ($depth == 1 && in_array("break", $classes) && self::$li_count != 1 && $this->column_count < $this->column_limit) {
            $output .= "</ul><ul class=\"sub-menu\">";
            $this->column_count++;
        }
        $class_names = join(" ", apply_filters("nav_menu_css_class", array_filter($classes), $item)); // set up the classes array to be added as classes to each li
        $class_names = " class=\"" . esc_attr($class_names) . "\"";
        $output .= sprintf(
            "<li id=\"menu-item-%s\"%s><a href=\"%s\">%s</a>",
            $item_id,
            $class_names,
            $item->url,
            $item->title
        );
        self::$li_count++;
    }
    function start_lvl(&$output, $depth = 0, $args = array()) {
        if ($depth == 0) {
            $output .= "<section>";
        }
        $output .= "<ul class=\"sub-menu\">";
    }
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "</ul>";
        if ($depth == 0) {
            if ($this->show_widget) {
                ob_start();
                dynamic_sidebar("Navigation Callout");
                $widget = ob_get_contents();
                ob_end_clean();
                $output .= $widget;
                $this->show_widget = false;
            }
            $output .= "</section>";
        }
    }
    function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        if ($depth == 0 && $this->column_count > 0) {
            $this->column_count = 0;
        }
        $output .= "</li>";
    }
}

// add mega-menu-columns-# classes
function add_column_number($items) {
    static $column_limit = 3;
    static $post_id = 0;
    static $x_key = 0;
    static $column_count = 0;
    static $li_count = 0;
    $tmp = array();
    foreach($items as $key => $item) {
        if (0 == $item->menu_item_parent) {
            $x_key = $key;
            $post_id = $item->ID;
            $column_count = 0;
            $li_count = 0;
            if (in_array("widget", $item->classes, 1)) {
                $column_count++;
            }
        }
        if ($post_id == $item->menu_item_parent) {
            $li_count++;
            if ($column_count < $column_limit && $li_count == 1) {
                $column_count++;
            }
            if (in_array("break", $item->classes, 1) && $li_count > 1 && $column_count < $column_limit) {
                $column_count++;
            }
            $tmp[$x_key] = $column_count;
        }
    }
    foreach($tmp as $key => $value) {
        $items[$key]->classes[] = sprintf("mega-menu-columns-%d", $value);
    }
    unset($tmp);
    return $items;
};

// add the column classes
add_filter("wp_nav_menu_args", function($args) {
    if ($args["walker"] instanceof megaMenuWalker) {
        add_filter("wp_nav_menu_objects", "add_column_number");
    }
    return $args;
});

// stop the column classes function
add_filter("wp_nav_menu", function( $nav_menu ) {
    remove_filter("wp_nav_menu_objects", "add_column_number");
    return $nav_menu;
});

/* ------------------------------------------------------------------------ *
* Page - About > Our People
* ------------------------------------------------------------------------ */

/**
 * Author : Doe
 * Retrievs Team Members on About > Our People Page
 * @param  string $role_type used for gettings users under each category
 */

/**
 * Author : Doe
 * Retrievs Team Members on About > Our People Page
 * @param  string $role_type used for gettings users under each category
 */
function get_team_members($department) {

  $args = array(
    'post_type' => 'staff',
    'order' => 'menu_order',
    'tax_query' => array(
      array(
        'taxonomy' => 'department',
        'field'    => 'slug',
        'terms'    => $department
      ),
    ),
    'posts_per_page' => -1
  );

  $team_query = new WP_Query( $args );
  $team_members = $team_query->posts;
  if ( !empty($team_members)) {
    $last = count($team_members);
    $end = '';
    // If we have team members count and loop through them...
    for ( $count = 0; $count < $last; $count++ ) {
    // foreach($team_members as $team_member) {
      $additionalClass = '';
      $staff_meta = get_post_meta( $team_members[$count]->ID );
      $position = $staff_meta["position"][0];
      $member_info = get_userdata($team_members[$count]);

      $name = get_the_title( $team_members[$count]->ID );
      $photo = get_the_post_thumbnail($team_members[$count]->ID);

      // COLUMN HELPER
      if ( $count == 0 || ($count + 1)%3 == 1 ){
        $additionalClass = 'large-offset-3';
      }
      if ( $count == ($last - 1)) {
        $end = 'end';
      }

      // CHECK FOR MISSING THUMBNAIL AND ADD CLASS
      if(empty($avatar)):
        $missing_avatar = 'missing-avatar';
      else:
        $missing_avatar = '';
      endif;

      echo '<div class="small-10 small-offset-1 staff-column ' . $additionalClass . ' ' . $missing_avatar .' large-2 large-offset-0 columns relative ' . $end .'" data-equalizer-watch>';

      // DISPLAY THE AVATAR INSIDE DIV. 
      if( !empty($photo)) : 
        echo $photo;
      endif;

      // DISPLAY THE NAME
      echo '<div class="staff-wrapper">';
      if ( !empty($name) ) {
        echo '<div class="staff-name">' . $name . '</div>';
      }

      // DISPLAY THE POSITION
      if ( !empty($position) ) {
        echo '<div class="staff-position">' . $position .  '</div>';
      }

      if($department == 'operations' || $department == 'sales-operations' || $department == 'finance' || $department == 'directors') {
        $bio_link = $department . '#' . preg_replace('/[\s_]/', '-', get_the_title($team_members[$count]->ID));
      }
      else{
        $bio_link = get_the_permalink(get_post($team_members[$count]->ID));
      }

      echo '</div>';
      echo '<a href="' . $bio_link .'"><button class="staff-btn">Bio</button></a>';      echo '</div>';
    }
  wp_reset_postdata();
  }
  
  else { echo 'No Team Members Found'; }
}
class RCA_SECONDARY_WALKER extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '<ul>';
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '</ul>';
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $classes = array();
        if( !empty( $item->classes ) ) {
            $classes = (array) $item->classes;
        }

        $active_class = '';
        if( in_array('current-menu-item', $classes) ) {
            $active_class = ' class="active"';
        } else if( in_array('current-menu-parent', $classes) ) {
            $active_class = ' class="active-parent"';
        } else if( in_array('current-menu-ancestor', $classes) ) {
            $active_class = ' class="active-ancestor"';
        }

        $url = '';
        if( !empty( $item->url ) ) {
            $url = $item->url;
        }

        // $terms = get_the_terms( get_the_ID(), 'category');
        // var_dump($terms);
        $image = get_field('taxonomy_image', 'case-studies');

        //$image = get_field( 'taxonomy_image', $item->title);
        //var_dump($image);

        $output .= '<a href="' . $url . '"><div class="secondary-menu-item-wrapper"><span class="cat-image">' . get_cat_image($item->title) . '</span><li'. $active_class . '>' . $item->title . '</li></div></a>';
    }


    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= '</li>';
    }
}

function get_cat_image($title) {
  $title = $title;
  //var_dump($title);
  // $term_obj = get_term_by( 'name', $title, 'expertise' );
  // $term_id = $term_obj->term_taxonomy_id;
  // $icon_img = get_field('taxonomy_image',  'expertise_' . $term_id);
  // 
  $template = get_stylesheet_directory_uri();
  switch($title) {
    case('Case Studies'):
      $svg = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17px"
   viewBox="0 0 200 285" style="enable-background:new 0 0 200 285;" xml:space="preserve">
<style type="text/css">
  .st0{fill:#FFFFFF;}
</style>
<path id="Case_Studies_Icon" class="st0" d="M150,71.2h50L135.7-0.1v55.4C135.5,64,141.9,71,150,71.2z M135.7,87H200v182.1
  c0.1,8.6-6.2,15.7-14.3,15.8H14.3c-8-0.2-14.4-7.2-14.3-15.8V15.8C-0.1,7.2,6.2,0.1,14.3-0.1h107.1v71.3
  C121.3,79.8,127.7,86.9,135.7,87z M122.3,189.7c-2.5,2.8-2.5,7.3,0,10.1l22.7,25.2c2.4,2.7,6.3,2.8,8.8,0.3c0.1-0.1,0.2-0.2,0.3-0.3
  l4.5-5c2.5-2.8,2.5-7.3,0-10.1l-22.7-25.2c-2.4-2.7-6.4-2.8-8.9-0.2c-0.1,0.1-0.1,0.2-0.2,0.2L122.3,189.7z M49.6,142.5
  c0.8,24.7,20.2,44,43.3,43.1s41.1-21.6,40.3-46.3c-0.8-24-19.3-43.1-41.8-43.1C67.9,96.6,49.3,117.4,49.6,142.5z M59.3,140
  c0.6-19,15.6-33.8,33.3-33.1c17.8,0.7,31.6,16.6,31,35.6c-0.6,18.5-14.8,33.1-32.1,33.1C73.4,175.2,59,159.3,59.3,140z"/>
</svg>';

    break;
    case('White Papers'):
      $svg = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 200 285" height:"30px" width="17px" style="enable-background:new 0 0 200 285;" xml:space="preserve">
      <style type="text/css">
        .st0{fill:#FFFFFF;}
      </style>
      <path id="White_Papers_Icon" class="st0" d="M121.4,66.6V0H14.3C6.2,0.2-0.1,6.8,0,14.8v254.9c-0.1,8,6.2,14.7,14.3,14.8h171.3
        c8-0.2,14.4-6.8,14.3-14.8V81.4h-64.2C127.6,81.3,121.2,74.7,121.4,66.6z M21.4,22.2h78.5v66.6H21.4V22.2z M21.4,151.2h107.1v14.8
        H21.4V151.2z M21.4,210.5h107.1v14.8H21.4V210.5z M178.5,254.9h-157v-14.8h157V254.9z M178.5,195.7h-157v-14.8h157V195.7z
         M178.5,136.4h-157v-14.8h157V136.4z M149.9,66.6h50L135.6,0v51.8C135.5,59.8,141.9,66.5,149.9,66.6z"/>
      </svg>';
    break;
    case('Visual Resources'):
      $svg = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="22px"
   viewBox="0 0 200 215" style="enable-background:new 0 0 200 215;" xml:space="preserve">
<style type="text/css">
  .st0{fill:#FFFFFF;}
</style>
<g>
  <path id="Posters_Icon" class="st0" d="M4.7,215h190.6c2.5,0.1,4.6-1.9,4.7-4.5V60.1c-0.1-2.6-2.2-4.6-4.7-4.5H4.7
    c-2.5-0.1-4.6,1.9-4.7,4.5v150.4C0.1,213.1,2.2,215.1,4.7,215z M179.1,80v110.8c-0.1,2.6-2.2,4.5-4.7,4.5H25.6
    c-2.5,0.1-4.6-1.9-4.7-4.5V80c0.1-2.6,2.2-4.6,4.7-4.5h148.8C176.9,75.5,179,77.5,179.1,80L179.1,80z M32.7,54.2h-7.4L95.8,7.4h7.4
    L32.7,54.2z M95.8,7.4h7.4l70.4,46.8h-7.4L95.8,7.4z M154.4,117.2H81.9c-1.7-2.4-1.3-5.8,0.9-7.7c2-1.7,4.7-2.4,7.3-1.9
    c-2.2-2.1-2.8-5.5-1.4-8.3c1.7-2.5,4.4-4,7.4-4.2c1.8-0.3,3.6,0,5.2,0.8c-0.5-3.6,1.5-7,4.8-8.3c4.9-2.3,10.6-2,15.2,0.9
    c3.4,2.2,5.3,6.2,4.7,10.2c2-0.5,4.2-0.2,5.9,1c1.6,1.3,2.3,3.4,1.8,5.5c1.8-1.3,4.1-1.7,6.2-1.2c2.9,0,5.4,2.1,5.8,5.1
    c2.2-1,4.7-0.9,6.9,0.2C154.6,111.4,155.3,114.4,154.4,117.2L154.4,117.2z M169.1,185.3L31.3,185l56.9-45l41.6,31.7l-15.1-22.6
    l25.3-23.9l29,13.6L169.1,185.3z M63.8,113.9c0.5,7-4.7,13-11.6,13.5c-6.9,0.5-12.8-4.8-13.3-11.8c-0.5-7,4.7-13,11.6-13.5
    c0.3,0,0.6,0,0.8,0C58,101.9,63.5,107.1,63.8,113.9L63.8,113.9z M105.6,7.2c0,3.5-2.9,6.4-6.4,6.4c-3.5,0-6.4-2.9-6.4-6.4
    s2.9-6.4,6.4-6.4C102.7,0.8,105.6,3.6,105.6,7.2z"/>
</g>
</svg>';

    break;
    case('Published Articles'):
      $svg = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="21px"
   viewBox="0 0 200 190" style="enable-background:new 0 0 200 190;" xml:space="preserve">
<style type="text/css">
  .st0{fill:#FFFFFF;}
</style>
<path id="Published_Articles_Icon" class="st0" d="M138.5,157.7H80.8v-14.5h57.7V157.7z M170.7,130.3H80.8v-14.5h89.9L170.7,130.3
  L170.7,130.3z M170.7,102.9H80.8V88.5h89.9L170.7,102.9L170.7,102.9z M170.7,75.6H80.8V61.1h89.9L170.7,75.6L170.7,75.6z
   M170.7,103.1H80.9V88.6h89.9L170.7,103.1L170.7,103.1z M170.7,75.6H80.9V61.1h89.9L170.7,75.6L170.7,75.6z M170.7,48.3H80.9V33.8
  h89.9L170.7,48.3L170.7,48.3z M39.5,44.4c0,5.4-4.3,9.8-9.7,9.8H9.5C4.1,54.1-0.2,49.5,0,44.1c0.2-5.2,4.3-9.4,9.5-9.5h20.3
  C35.3,34.6,39.6,39,39.5,44.4 M39.5,145.6c0,5.4-4.3,9.8-9.7,9.8H9.5c-5.4-0.2-9.7-4.7-9.5-10.2c0.2-5.2,4.3-9.4,9.5-9.5h20.3
  C35.3,135.8,39.6,140.2,39.5,145.6 M168.8,17.8c8.2,0.2,14.7,7,14.5,15.2v124.1c0.2,8.2-6.3,15-14.5,15.2H67.3V17.9L168.8,17.8
  L168.8,17.8z M19.2,28.2h10.6c8.9,0.2,16,7.7,15.8,16.6c-0.2,8.6-7.1,15.5-15.8,15.8h-11v68.9h11c8.9,0.2,16,7.7,15.8,16.6
  c-0.2,8.6-7.1,15.5-15.8,15.8H19.2c1.9,15.9,15.2,27.9,31.1,28.2h118.4c17.8-0.4,31.8-15.1,31.4-32.9v-124
  c0.4-17.7-13.7-32.5-31.4-32.9H50.3C34.4,0.5,21.2,12.5,19.2,28.2"/>
</svg>';
    break;
    case('Webinars'):
      $svg = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="22px"
   viewBox="0 0 200 200" style="enable-background:new 0 0 200 200;" xml:space="preserve">
<style type="text/css">
  .st0{fill:#FFFFFF;}
</style>
<g>
  <path id="webinar_icon" class="st0" d="M171.9,128.7H28.1c-4.6,0-6,4.5-8.5,8.4L0.8,188.8c-2.4,3.9,1,11.2,5.6,11.2h187c4.6,0,8.1-7.3,5.6-11.2
    l-18.8-51.7C177.9,133.1,176.5,128.7,171.9,128.7L171.9,128.7L171.9,128.7z M176.9,187H168c-3.2,0-6.1-1.8-6.7-4.1l-1.4-6.1
    c-0.5-2.1,1.5-3.8,4.5-3.8h8.4c3,0,5.9,1.7,6.6,3.8l1.9,6.1C182,185.1,180,187,176.9,187z M171,166.7h-8.2c-2.9,0-5.6-1.6-6.1-3.5
    l-1.2-5.2c-0.4-1.8,1.5-3.2,4.2-3.2h7.8c2.8,0,5.4,1.4,6,3.2l1.6,5.2C175.7,165.1,173.9,166.7,171,166.7z M165.9,149.4h-7.6
    c-2.7,0-5.2-1.3-5.6-3l-1.1-4.5c-0.4-1.5,1.4-2.8,4-2.8h7.3c2.6,0,5,1.2,5.5,2.8l1.4,4.5C170.4,148,168.6,149.4,165.9,149.4z
     M144.7,166.7h-8.2c-2.9,0-5.5-1.6-5.7-3.5l-0.7-5.2c-0.2-1.8,1.8-3.2,4.6-3.2h7.8c2.8,0,5.3,1.4,5.7,3.2l1.1,5.2
    C149.7,165.1,147.6,166.7,144.7,166.7z M141.6,149.4H134c-2.7,0-5-1.3-5.3-3l-0.6-4.5c-0.2-1.5,1.7-2.8,4.3-2.8h7.3
    c2.6,0,4.9,1.2,5.2,2.8l0.9,4.5C146.2,148,144.3,149.4,141.6,149.4L141.6,149.4z M120,187h-8.9c-3.2,0-5.7-1.8-5.8-4.1l-0.1-6.1
    c0-2.1,2.4-3.8,5.3-3.8h8.4c3,0,5.6,1.7,5.8,3.8l0.6,6.1C125.5,185.1,123.1,187,120,187L120,187z M118.5,166.7h-8.2
    c-2.9,0-5.3-1.6-5.3-3.5l-0.1-5.2c0-1.8,2.2-3.2,4.9-3.2h7.8c2.8,0,5.1,1.4,5.3,3.2l0.5,5.2C123.6,165.1,121.4,166.7,118.5,166.7z
     M117.2,149.4h-7.6c-2.7,0-4.9-1.3-4.9-3l-0.1-4.5c0-1.5,2-2.8,4.6-2.8h7.3c2.6,0,4.8,1.2,4.9,2.8l0.4,4.5
    C122,148,119.9,149.4,117.2,149.4L117.2,149.4z M92.9,149.4h-7.6c-2.7,0-4.8-1.3-4.6-3l0.4-4.5c0.1-1.5,2.3-2.8,4.9-2.8h7.3
    c2.6,0,4.6,1.2,4.6,2.8l-0.1,4.5C97.8,148,95.6,149.4,92.9,149.4L92.9,149.4z M84.9,154.8h7.8c2.8,0,5,1.4,5,3.2l-0.1,5.2
    c0,1.9-2.4,3.5-5.3,3.5h-8.2c-2.9,0-5.1-1.6-4.9-3.5l0.5-5.2C79.8,156.3,82.1,154.8,84.9,154.8L84.9,154.8z M83.6,173.1H92
    c3,0,5.4,1.7,5.3,3.8l-0.1,6.1c0,2.2-2.6,4.1-5.8,4.1h-8.9c-3.2,0-5.5-1.8-5.3-4.1l0.6-6.1C78,174.7,80.6,173.1,83.6,173.1z
     M68.4,149.4h-7.6c-2.7,0-4.6-1.3-4.3-3l0.9-4.5c0.3-1.5,2.7-2.8,5.2-2.8H70c2.6,0,4.5,1.2,4.3,2.8l-0.6,4.5
    C73.5,148,71.1,149.4,68.4,149.4z M59.8,154.8h7.8c2.8,0,4.8,1.4,4.6,3.2l-0.7,5.2c-0.2,1.9-2.8,3.5-5.7,3.5h-8.2
    c-2.9,0-4.9-1.6-4.6-3.5l1.1-5.2C54.5,156.3,57.1,154.8,59.8,154.8L59.8,154.8z M44.1,149.4h-7.6c-2.7,0-4.5-1.3-3.9-3l1.4-4.5
    c0.5-1.5,3-2.8,5.5-2.8h7.3c2.6,0,4.4,1.2,4,2.8l-1.1,4.5C49.3,148,46.8,149.4,44.1,149.4L44.1,149.4z M34.9,154.8h7.8
    c2.8,0,4.7,1.4,4.2,3.2l-1.2,5.2c-0.4,1.9-3.2,3.5-6.1,3.5h-8.2c-2.9,0-4.8-1.6-4.2-3.5l1.6-5.2C29.5,156.3,32.1,154.8,34.9,154.8z
     M29.6,173.1H38c3,0,5,1.7,4.5,3.8l-1.4,6.1c-0.5,2.2-3.5,4.1-6.7,4.1h-8.9c-3.2,0-5.1-1.8-4.4-4.1l1.9-6.1
    C23.7,174.7,26.6,173.1,29.6,173.1L29.6,173.1z M56.5,173.1h8.4c3,0,5.2,1.7,4.9,3.8l-0.8,6.1c-0.3,2.2-3.1,4.1-6.2,4.1H54
    c-3.2,0-5.3-1.8-4.9-4.1l1.2-6.1C50.8,174.7,53.5,173.1,56.5,173.1L56.5,173.1z M137.5,173.1h8.4c3,0,5.7,1.7,6.2,3.8l1.2,6.1
    c0.5,2.2-1.7,4.1-4.9,4.1h-8.9c-3.2,0-5.9-1.8-6.2-4.1l-0.8-6.1C132.3,174.7,134.5,173.1,137.5,173.1L137.5,173.1z"/>
  <g>
    <path id="webinar_icon" class="st0" d="M139.7,105.9H60.3c0,0-0.1-7.3,4.3-11.8c4.2-4.3,20.4-10.3,23.1-10.5s4.6,10.2,12.3,10.2s10-9.2,12-10.1
      s18.2,5.4,23.2,10.1C140.3,98.6,139.7,105.9,139.7,105.9z"/>
    <path id="webinar_icon" class="st0" d="M100,29.7c10.2,0,19,6.9,19,21.2s-8.8,28.5-19,28.5S81,65.1,81,50.9S89.8,29.7,100,29.7
      C100,29.7,100,29.7,100,29.7z"/>
    <path id="webinar_icon" class="st0" d="M159.8,0H40.2l-0.5,0l0,0l-0.5,0l0,0l-0.5,0h0l-0.5,0h0l-0.5,0c-8.6,0.9-14.7,6.7-16,15l0,0l-0.1,0.5l0,0
      l-0.1,0.5l0,0l0,0.5l0,0l0,0.5c0,0.3,0,0.7,0,1l0,0v0.5l0,0v83.8c0,0.5,0,1,0,1.5l0,0.5l0,0l0,0.5l0,0l0.1,0.5l0,0l0.1,0.5l0,0
      c1.3,8.3,7.4,14.1,16,15l0.5,0h0l0.5,0h0l0.5,0l0,0l0.5,0l0,0h0.5h55.1c3.3,0.2,6.6,0.2,9.8,0h54.7h0.5l0,0l0.5,0l0,0
      c0.2,0,0.3,0,0.5,0l0,0l0.5,0l0,0l0.5,0c9.3-1,15.6-7.6,16.2-17c0-0.3,0-0.7,0-1V18.6v-0.5l0-1c-0.6-9.4-6.9-16-16.2-17l-0.5,0
      l0,0l-0.5,0l0,0c-0.2,0-0.3,0-0.5,0l0,0l-0.5,0l0,0L159.8,0L159.8,0L159.8,0z M150.7,105.9H49.3c-6.6,0-12-5.4-12-12V27.4
      c0-6.6,5.4-12,12-12h101.4c6.6,0,12,5.4,12,12v66.6C162.7,100.5,157.3,105.9,150.7,105.9z"/>
  </g>
</g>
</svg>';
    break;
    case('View All'):
      $svg = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="23px"
   viewBox="0 0 200 165" style="enable-background:new 0 0 200 165;" xml:space="preserve">
<style type="text/css">
  .st0{enable-background:new    ;}
  .st1{fill:#FFFFFF;}
</style>
<g class="st0">
  <path id="view_all_icon" class="st1" d="M61.6,21.6v19.2c0,2.7-0.9,4.9-2.8,6.8c-1.9,1.9-4.1,2.8-6.8,2.8h-32c-2.7,0-4.9-0.9-6.8-2.8
    c-1.9-1.9-2.8-4.1-2.8-6.8V21.6c0-2.7,0.9-4.9,2.8-6.8c1.9-1.9,4.1-2.8,6.8-2.8h32c2.7,0,4.9,0.9,6.8,2.8
    C60.6,16.7,61.6,18.9,61.6,21.6z M61.6,72.9v19.2c0,2.7-0.9,4.9-2.8,6.8c-1.9,1.9-4.1,2.8-6.8,2.8h-32c-2.7,0-4.9-0.9-6.8-2.8
    c-1.9-1.9-2.8-4.1-2.8-6.8V72.9c0-2.7,0.9-4.9,2.8-6.8c1.9-1.9,4.1-2.8,6.8-2.8h32c2.7,0,4.9,0.9,6.8,2.8
    C60.6,67.9,61.6,70.2,61.6,72.9z M61.6,124.2v19.2c0,2.7-0.9,4.9-2.8,6.8c-1.9,1.9-4.1,2.8-6.8,2.8h-32c-2.7,0-4.9-0.9-6.8-2.8
    c-1.9-1.9-2.8-4.1-2.8-6.8v-19.2c0-2.7,0.9-4.9,2.8-6.8c1.9-1.9,4.1-2.8,6.8-2.8h32c2.7,0,4.9,0.9,6.8,2.8
    C60.6,119.2,61.6,121.5,61.6,124.2z M125.6,21.6v19.2c0,2.7-0.9,4.9-2.8,6.8c-1.9,1.9-4.1,2.8-6.8,2.8H84c-2.7,0-4.9-0.9-6.8-2.8
    c-1.9-1.9-2.8-4.1-2.8-6.8V21.6c0-2.7,0.9-4.9,2.8-6.8C79,12.9,81.3,12,84,12h32c2.7,0,4.9,0.9,6.8,2.8
    C124.7,16.7,125.6,18.9,125.6,21.6z M125.6,72.9v19.2c0,2.7-0.9,4.9-2.8,6.8c-1.9,1.9-4.1,2.8-6.8,2.8H84c-2.7,0-4.9-0.9-6.8-2.8
    c-1.9-1.9-2.8-4.1-2.8-6.8V72.9c0-2.7,0.9-4.9,2.8-6.8c1.9-1.9,4.1-2.8,6.8-2.8h32c2.7,0,4.9,0.9,6.8,2.8
    C124.7,67.9,125.6,70.2,125.6,72.9z M125.6,124.2v19.2c0,2.7-0.9,4.9-2.8,6.8c-1.9,1.9-4.1,2.8-6.8,2.8H84c-2.7,0-4.9-0.9-6.8-2.8
    c-1.9-1.9-2.8-4.1-2.8-6.8v-19.2c0-2.7,0.9-4.9,2.8-6.8c1.9-1.9,4.1-2.8,6.8-2.8h32c2.7,0,4.9,0.9,6.8,2.8
    C124.7,119.2,125.6,121.5,125.6,124.2z M189.7,21.6v19.2c0,2.7-0.9,4.9-2.8,6.8c-1.9,1.9-4.1,2.8-6.8,2.8h-32
    c-2.7,0-4.9-0.9-6.8-2.8c-1.9-1.9-2.8-4.1-2.8-6.8V21.6c0-2.7,0.9-4.9,2.8-6.8c1.9-1.9,4.1-2.8,6.8-2.8h32c2.7,0,4.9,0.9,6.8,2.8
    C188.8,16.7,189.7,18.9,189.7,21.6z M189.7,72.9v19.2c0,2.7-0.9,4.9-2.8,6.8c-1.9,1.9-4.1,2.8-6.8,2.8h-32c-2.7,0-4.9-0.9-6.8-2.8
    c-1.9-1.9-2.8-4.1-2.8-6.8V72.9c0-2.7,0.9-4.9,2.8-6.8c1.9-1.9,4.1-2.8,6.8-2.8h32c2.7,0,4.9,0.9,6.8,2.8
    C188.8,67.9,189.7,70.2,189.7,72.9z M189.7,124.2v19.2c0,2.7-0.9,4.9-2.8,6.8c-1.9,1.9-4.1,2.8-6.8,2.8h-32c-2.7,0-4.9-0.9-6.8-2.8
    c-1.9-1.9-2.8-4.1-2.8-6.8v-19.2c0-2.7,0.9-4.9,2.8-6.8c1.9-1.9,4.1-2.8,6.8-2.8h32c2.7,0,4.9,0.9,6.8,2.8
    C188.8,119.2,189.7,121.5,189.7,124.2z"/>
</g>
</svg>';
    break;
    default:
      $url = '';
    break;
  }
  return $svg;
}

function get_service_image($title) { 

  $template_path = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/';
  switch($title) {
    case('Regulatory Affairs'):
      $url = $template_path . 'regulatory-affairs-icon.jpg';
    break;
    case('Compliance Assurance'):
      $url = $template_path . 'compliance-assurance-icon.jpg';
    break;
    case('Strategic Consulting'):
      $url = $template_path . 'strategic-consulting-icon.jpg';
    break;
    case('Remediation Strategy and Support'):
      $url = $template_path . 'remediation-strategy-icon.jpg';
    break;
    case('Quality Assurance'):
      $url = $template_path . 'quality-services-icon.jpg';
    break;
    case('Biologics'):
      $url = $template_path . 'Biologics-01.svg';
    break;
    case('Combination Products'):
      $url = $template_path . 'Combination-Products-01.svg';
    break;
    case('Compounding Pharmacies'):
      $url = $template_path . 'Compounding-Pharmacies-Icon-01.svg';
    break;
    case('White Papers'):
      $url = $template_path . 'white-papers.png';
    break;
    case('Visual Resources'):
      $url = $template_path . 'visual-resources.png';
    break;
    case('Published Articles'):
      $url = $template_path . 'published-articles.png';
    break;
    case('Webinars'):
      $url = $template_path . 'webinars.png';
    break;
    case('View All'):
      $url = $template_path . 'view-all.png';
    break;
    default:
      $url = '';
    break;
  }
  return $url;
  return $icon_img['url'];
}

function get_tax_img($taxonomy, $term_id) {
  $icon_img = get_field('icon', 'expertise_' . $term_id);
  return $icon_img['url'];
}

function get_related_img($taxonomy, $term_id) {
  $icon_img = get_field('related_content_icon', 'expertise_' . $term_id);
  return $icon_img['url'];
}

class RCA_REMOVE_MENU_LINKS extends Walker_Nav_Menu {

    /**
     * Building the List Item element
     * @param Referenced string $output
     * @param Post Object $item
     * @param int $depth
     * @param array $args
     * @return void
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent         = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );

        // Passed Classes
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        // build html
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $class_names . '">';

        // If 'noLink' exists in classes, don't HTML anchor tag.
        if( in_array( 'noLink', $classes ) ) {

            $item_output = apply_filters( 'the_title', $item->title, $item->ID );

        } else {

            // link attributes
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

            $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
                $args->before,
                $attributes,
                $args->link_before,
                apply_filters( 'the_title', $item->title, $item->ID ),
                $args->link_after,
                $args->after
            );
        }

        // build html
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

//remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

class RCA_TAXONOMY_WALKER extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '<ul>';
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '</ul>';
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $classes = array();
        if( !empty( $item->classes ) ) {
            $classes = (array) $item->classes;
        }

        $active_class = '';
        if( in_array('current-menu-item', $classes) ) {
            $active_class = ' class="active"';
        } else if( in_array('current-menu-parent', $classes) ) {
            $active_class = ' class="active-parent"';
        } else if( in_array('current-menu-ancestor', $classes) ) {
            $active_class = ' class="active-ancestor"';
        }

        $url = '';
        if( !empty( $item->url ) ) {
            $url = $item->url;
        }

        // $terms = get_the_terms( get_the_ID(), 'category');
        // var_dump($terms);
        $image = get_field('taxonomy_image', 'case-studies');

        //$image = get_field( 'taxonomy_image', $item->title);
        //var_dump($image);

        $output .= '<a href="' . $url . '"><div class="secondary-menu-item-wrapper"><span class="cat-image"><img src="' . get_cat_image($item->title) . '" /></span><li'. $active_class . '>' . $item->title . '</li></div></a>';
    }


    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= '</li>';
    }
}

function rca_tax_post_pagination() {
 

    global $wp_query;

    // if( is_page('view-all') ):    
    //   $temp_query = $wp_query;
    //   $wp_query = NULL;
    //   $wp_query = $temp_query;
    //   $wp_query = $view_all;
    // endif;
    
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    sort( $links );
    if ($paged != $max - 1) {
      array_pop($links);
    }
    
    echo '<div class="navigation text-center"><ul id="pagination">' . "\n";

    /** Previous Post Link */
    if(!get_previous_posts_link() ):
        printf( get_previous_posts_link('<i class="fa fa-angle-left" aria-hidden="true"></i>') );
    else:
        printf( get_previous_posts_link('<i class="fa fa-angle-left" aria-hidden="true"></i>') );
    endif;   
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '<img src="'.get_stylesheet_directory_uri().'/images/RCA_MOBILE_HOMEPAGE_INDICATOR.jpg' .'" />' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), '<img src="'.get_stylesheet_directory_uri().'/images/RCA_MOBILE_HOMEPAGE_INDICATOR.jpg' .'" />' );
    }
 
    /** Link to last page, plus ellipses if necessary */
    // if ( ! in_array( $max, $links ) ) {
    //     if ( ! in_array( $max - 1, $links ) )
    //         echo '<li>…</li>' . "\n";
 
    //     $class = $paged == $max ? ' class="active"' : '';
    //     printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), '<img src="'.get_stylesheet_directory_uri().'/images/RCA_MOBILE_HOMEPAGE_INDICATOR.jpg' .'" />' );
    // }
 
    $difference = $max - $paged;

    while ($difference > 1) {
      printf( get_next_posts_link( '<i class="fa fa-angle-right" aria-hidden="true"></i>' ) );
      break;
    }
 
    echo '</ul></div>' . "\n";
 
}

// function rca_get_random_term() {
//   $terms_array = array ('case-studies', 'white-papers', 'webinars', 'published-articles', 'visual-resources');
//   $chosen_term = $terms_array[array_rand($terms_array)];
//   return $chosen_term;
// }

/**
 * Author : Doe
 * Retrieves Team Members on About > Staff Department
 * @param  string $role_type used for gettings users under each category
 */
function get_team_members_department($department) {

  $args = array(
    'post_type' => 'staff',
    //'order' => 'menu_order',
    'tax_query' => array(
      array(
        'taxonomy' => 'department',
        'field'    => 'slug',
        'terms'    => $department
      ),
    ),
    'posts_per_page' => -1
  );


  $dept_query = new WP_Query( $args );
  $team_members = $dept_query->posts;

  //var_dump($team_members);

  if ( !empty($team_members)) {

    $last = count($team_members);
    $end = '';

    // If we have team members count and loop through them...
    for ( $count = 0; $count < $last; $count++ ) {
    // foreach($team_members as $team_member) {
     //var_dump($team_members[$count]);
      // $member_info = get_userdata($team_members[$count]);
      // var_dump($member_info);
      // $person_info = get_user_meta( $team_members[$count] );
      //$author_description = get_the_author_meta( 'description', $user_id = $team_members[$count]->ID );
      $member_id = $team_members[$count]->ID;
      $member_description = $team_members[$count]->post_content;
      //var_dump($member_id);

      //var_dump($member_info);
      //var_dump($person_info['description'][0]);
      
      // $member_url = $member_info->user_url;
      $email = get_field('email', $member_id);
      $position = get_field('position', $member_id);
      // $first_name = $member_info->first_name;
      // $last_name = $member_info->last_name;
      //$avatar = get_wp_user_avatar($member_info->ID);
      //$id_link = strtolower($first_name . '-' . $last_name);
      // Add classes depending on count
      // Find the longest position and adjust height accordingly.

      echo '<div id="staff-block" class="row">';
      echo '<div class="small-10 small-offset-1">';

      //$position = get_field('position', $member_info);

      echo '<div class="staff-wrapper">';

      if ( !empty( $member_id ) ) {
        echo '<div class="department-staff-name text-center"><a href="' . get_the_permalink($member_id) .'" id="'. preg_replace('/[\s_]/', '-', get_the_title($member_id)) .'"><h1>' . get_the_title($member_id) . '</h1></a></div>';
      }

      if ( !empty($position) ) {
        echo '<h2 class="text-center">' . $position . '</h2>';
      }

      if( !empty($email)) : 
        echo '<div id="individual-email" class="text-center"><i class="fa fa-envelope" aria-hidden="true"></i> '. $email .'</div>';
      endif;
      echo wpautop( $member_description, $br = true );

      echo '</div>';
      echo '</div>';
      echo '</div>';


      // $additionalClass = '';
    }

  }
  
  else { echo 'No Team Members Found'; }
}

function get_random_case_study() {

  $r_case_study_args = array(
    'post_type'   => 'case_studies',
    'posts_per_page' => 1,
    'orderby' => 'rand',
  );

  return $r_case_study_args;
}

function get_random_webinar() {

  $r_webinar_args = array(
    'post_type'   => 'webinars',
    'posts_per_page' => 1,
    'orderby' => 'rand',
  );

  return $r_webinar_args;
}

function get_random_whitepaper() {

  $r_whitepaper_args = array(
    'post_type'   => 'white_papers',
    'posts_per_page' => 1,
    'orderby' => 'rand',
  );
  
  return $r_whitepaper_args;
}

function get_random_visualresource() {
  $r_visualresource_args = array(
    'post_type'   => 'visual_resources',
    'posts_per_page' => 1,
    'orderby' => 'rand',
  );
  
  return $r_visualresource_args;
}

function get_random_publishedarticle() {
  $r_publishedarticle_args = array(
    'post_type'   => 'published_articles',
    'posts_per_page' => 1,
    'orderby' => 'rand',
  );
  
  return $r_publishedarticle_args;
}

function get_all_post_types() {
  $all = array( 'white_papers', 'webinars', 'published_articles', 'case_studies', 'visual_resources' );
  return $all;
}

function rca_related_content_mobile($atts, $content = null) {
    extract(shortcode_atts(array(
        'category' => 'Uncategorized'
                    ), $atts));

    $data_attr = "";
    foreach ($atts as $key => $value) {
        if ($key != "category") {
            $data_attr .= ' data-' . $key . '="' . $value . '" ';
        }
    }

    $lazyLoad = array_key_exists("lazyload", $atts) && $atts["lazyload"] == true;

    $args = array(
        'post_type' => $atts['post_type'],
        'orderby' => 'rand',
        'order' => 'asc',
        'posts_per_page' => 3,
        //'nopaging' => true
    );

  $result = '<div id="owl-carousel-cs-slider" class="owl-carousel owl-carousel-' . sanitize_title($atts['category']) . '" ' . $data_attr . '>';

    $loop = new WP_Query($args);

    while ($loop->have_posts()) {
        $loop->the_post();

        $img_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), get_post_type());
        $meta_link = get_post_meta(get_the_ID());

          $result .= '<div class="item">';
          $result .= '<div class="row">';
          $result .= '<div class="small-10 small-offset-1 columns">';
          $result .= '<div class="owl-carousel-item-text">';
          $result .= '<a href="' . get_the_permalink() . '"><img src="' . rca_get_post_type_icon(get_post_type()) . '" style="max-width: 40px; display:block;text-align:center; margin: 0 auto 20px auto;"/>';
          $result .= '<p>' . get_the_title() . '</p></a>';
          $result .= '</div>';

          $result .= '</div></div></div>';
    }

    $result .= '</div>';
    
    /* Restore original Post Data */
    wp_reset_postdata();

    return $result;
}
add_shortcode('rca-related-content-mobile', 'rca_related_content_mobile');

/**
 * Description:
 *
 * Returns icon type for given post type
 * 
 * @return [string] [icon img URL]
 */
function rca_get_post_type_icon($post_type) {
    if($post_type == 'case_studies'):
    $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Case-Studies-Icon-Gray-01.svg';
  elseif($post_type == 'webinars'):
    elseif($post_type == 'webinars'):
    $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Webinars-Icon-Gray-01.svg';
  elseif($post_type == 'white_papers'):
    $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/White-Papers-Icon-Gray-01.svg';
  elseif($post_type == 'visual_resources'):
    $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Visual-Resources-Icon-Gray-01.svg';
  elseif($post_type == 'published_articles'):
    $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Published-Articles-Icon-Gray-01.svg';
  elseif($post_type == 'post'):
    $icon = get_stylesheet_directory_uri() . '/images/icons/RCA_News_Icon-01.svg';
  elseif($post_type == 'staff'):
    $icon = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/RCA_User_Icon-01.svg';
  elseif($post_type == 'page'):
    if(get_page_template_slug() == 'individual-staff-member.php'):
        $icon = get_stylesheet_directory_uri() . '/images/icons/bigger-icon/RCA_User_Icon-01.svg';
    else:
    $icon = get_stylesheet_directory_uri() . '/images/icons/bigger-icon/RCA_General_Icon-01.svg';
    endif;
  else:
    $icon = '';
  endif;


  return $icon;
}

function rca_get_bio_slider_icons($post_type) {
      if($post_type == 'case_studies'):
      $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Case-Studies-Icon-Gray-01.svg';
    elseif($post_type == 'webinars'):
      elseif($post_type == 'webinars'):
      $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Webinars-Icon-Gray-01.svg';
    elseif($post_type == 'white_papers'):
      $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/White-Papers-Icon-Gray-01.svg';
    elseif($post_type == 'visual_resources'):
      $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Visual-Resources-Icon-Gray-01.svg';
    elseif($post_type == 'published_articles'):
      $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Published-Articles-Icon-Gray-01.svg';
    elseif($post_type == 'post'):
      $icon = get_stylesheet_directory_uri() . '/images/icons/RCA_News_Icon-01.svg';
    elseif($post_type == 'staff'):
      $icon = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/RCA_User_Icon-01.svg';
    elseif($post_type == 'page'):
      if(get_page_template_slug() == 'individual-staff-member.php'):
          $icon = get_stylesheet_directory_uri() . '/images/icons/bigger-icon/RCA_User_Icon-01.svg';
      else:
      $icon = get_stylesheet_directory_uri() . '/images/icons/bigger-icon/RCA_General_Icon-01.svg';
      endif;
    else:
      $icon = '';
    endif;


    return $icon;
}

// Returns icons for search items.
function rca_get_search_icons($post_type) {
    if($post_type == 'case_studies'):
    $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Case-Studies-Icon-Gray-01.svg';
  elseif($post_type == 'webinars'):
    elseif($post_type == 'webinars'):
    $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Webinars-Icon-Gray-01.svg';
  elseif($post_type == 'white_papers'):
    $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/White-Papers-Icon-Gray-01.svg';
  elseif($post_type == 'visual_resources'):
    $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Visual-Resources-Icon-Gray-01.svg';
  elseif($post_type == 'published_articles'):
    $icon   = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/Published-Articles-Icon-Gray-01.svg';
  elseif($post_type == 'post'):
    $icon = get_stylesheet_directory_uri() . '/images/icons/RCA_News_Icon-01.svg';
  elseif($post_type == 'staff'):
    $icon = get_stylesheet_directory_uri() . '/images/icons/bigger-icons/RCA_User_Icon-01.svg';
  elseif($post_type == 'page'):
    if(get_page_template_slug() == 'individual-staff-member.php'):
        $icon = get_stylesheet_directory_uri() . '/images/icons/bigger-icon/RCA_User_Icon-01.svg';
    else:
    $icon = get_stylesheet_directory_uri() . '/images/icons/bigger-icon/RCA_General_Icon-01.svg';
    endif;
  else:
    $icon = '';
  endif;


  return $icon;

}

/**
 * Automatically return medical-device/pharma URLs
 * @param  [type] $postID [description]
 * @return [type]         [description]
 */
function rca_get_featured_img($postID) {
  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $actual_link = explode("/",$actual_link);

  if( $actual_link[4] == 'medical-device' || $actual_link[4] == 'medical-devices') {
    $img = get_stylesheet_directory_uri() . '/images/medical-device-header.jpg';
  }

  elseif ( $actual_link[4] == 'pharmaceutical') {
    $img = get_stylesheet_directory_uri() . '/images/pharmaceutical.jpg';
  }
  else {
    $img = get_the_post_thumbnail_url( $postID );
  }
  return $img;

}

/**
 * Shortcode for Blue Callout Box - Inline styling
 * usage = [blue-callout] your callout content here [/blue-callout]
 */
function blue_callout_shortcode( $atts, $content = null ) {
  return '<div class="blue-callout case-study-quote">' . $content . '</div>';
}
add_shortcode( 'blue-callout', 'blue_callout_shortcode' );
/**
 * Enable HTML in Profile Bios
 */
//disable WordPress sanitization to allow more than just $allowedtags from /wp-includes/kses.php
remove_filter('pre_user_description', 'wp_filter_kses');
//add sanitization for WordPress posts
add_filter( 'pre_user_description', 'wp_filter_post_kses');

/**
 * Adds column to Webinars post type.
 * @param  [type] $postID [description]
 * @return [type]         [description]
 */
  function webinars_columns_head ( $columns ) {
   return array_merge ( $columns, array ( 
     'webinar_type' => __( 'Webinar Type' ),
   ) );
 }

function webinars_columns_content($column) {
    global $post;
    if ($column == 'webinar_type') {
      $webinar_status = get_post_meta ( $post->ID, 'pre_or_post', true );
      if($webinar_status == 'pre'):
        $webinar_status = 'Pre Webinar';
      elseif($webinar_status == 'post'):
        $webinar_status = 'Post Webinar';
      elseif($webinar_status == 'gated'):
        $webinar_status = 'Gated Webinar';
      else:
        $webinar_status = '—';
      endif;
      echo $webinar_status;
    }

}

function sort_webinar_status_column( $columns ) {
    $columns['webinar_type'] = 'webinar_type';
 
    return $columns;
}

add_filter( 'manage_edit-webinars_sortable_columns', 'sort_webinar_status_column' );
add_filter('manage_webinars_posts_columns', 'webinars_columns_head');
add_action('manage_webinars_posts_custom_column', 'webinars_columns_content', 10);

function orange_button_shortcode( $atts, $content = null ) {
  $atts = shortcode_atts(
    array(
      'link'   => '',
      'target' => '',
    ), $atts
  );
  return '<a href="'.$atts['link'].'"'. 'target="' . $atts['target'] . '"><button class="orange-btn" style="width: auto;">' . $content . '</div></a>';
}
add_shortcode( 'orange-button', 'orange_button_shortcode' );

function rca_staff_articles($atts, $content = null) {
    extract(shortcode_atts(array(
        'category' => 'Uncategorized',
                    ), $atts));

    $data_attr = "";
    foreach ($atts as $key => $value) {
        if ($key != "category") {
            $data_attr .= ' data-' . $key . '="' . $value . '" ';
        }
    }

  $lazyLoad = array_key_exists("lazyload", $atts) && $atts["lazyload"] == true;
  $result = '<div id="owl-carousel-pa-slider" class="owl-carousel owl-carousel-' . sanitize_title($atts['category']) . '" ' . $data_attr . '>';




        $img_src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), get_post_type());
        $meta_link = get_post_meta(get_the_ID());

        #var_dump(get_post_meta(get_the_ID()));

          $articles = get_field('published_articles_relationship', get_the_ID());
          foreach($articles as $article) {
            $result .= '<div class="item">';
            $result .= '<div class="row">';
            $result .= '<div class="small-10 small-offset-1 columns">';
            $result .= '<div class="owl-carousel-item-text">';
            $result .= '<img src="'. rca_get_bio_slider_icons(get_post_type($article)).'" title="icon" style="max-width: 15%;">';
            $result .= '<a href="' . get_the_permalink($article) . '">';
            $result .= '<p>' . $article->post_title . '...<span style="color: #c4612b; text-decoration: underline;">Read More</span></p></a>';
            $result .= '</div></div>';
            $result .= '</div></div>';
          }
    

    $result .= '</div>';
    
    /* Restore original Post Data */
    wp_reset_postdata();

    return $result;
}
add_shortcode('rca-staff-articles', 'rca_staff_articles');


class RCA_Mega_Mobile_Menu_Walker extends Walker_Nav_Menu {
  /*
   * Add vertical menu class
   */

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat( "\t", $depth );
    $output .= "\n$indent<ul class=\"active\">\n";
  }
  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    if ( property_exists( $item, 'megamenu_settings' ) ) {
      $settings = $item->megamenu_settings;
    } else {
      $settings = Mega_Menu_Nav_Menus::get_menu_item_defaults();
    }

    // Item Class
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $classes[] = 'menu-item-' . $item->ID;

        $class = join( ' ', apply_filters( 'megamenu_nav_menu_css_class', array_filter( $classes ), $item, $args ) );

        // strip widget classes back to how they're intended to be output
        $class = str_replace( "mega-menu-widget-class-", "", $class );

    // Item ID
    $id = esc_attr( apply_filters( 'megamenu_nav_menu_item_id', "mega-menu-item-{$item->ID}", $item, $args ) );

    $output .= "<li>";

    // output the widgets
    if ( $item->type == 'widget' && $item->content ) {

      $item_output = $item->content;

    } else {

      $atts = array();

      $atts['title'] = ! empty( $item->attr_title ) ? $item->attr_title : '';
      $atts['target'] = ! empty( $item->target ) ? $item->target : '';
      $atts['class'] = '';
      $atts['rel'] = ! empty( $item->xfn ) ? $item->xfn : '';


      if ( $settings['disable_link'] != 'true') {
        $atts['href'] = ! empty( $item->url ) ? $item->url : '';
      } else {
        $atts['tabindex'] = 0;
      }

      if ( isset( $settings['icon']) && $settings['icon'] != 'disabled' ) {
        $atts['class'] = $settings['icon'];
      }

      $atts = apply_filters( 'megamenu_nav_menu_link_attributes', $atts, $item, $args );

      if ( strlen( $atts['class'] ) ) {
        $atts['class'] = $atts['class'] . ' mega-menu-link';
      } else {
        $atts['class'] = 'mega-menu-link';
      }

      // required for Surface/Win10/Edge
      if ( in_array('menu-item-has-children', $classes ) ) {
        //$atts['aria-haspopup'] = "true";
      }

      //$atts['aria-expanded'] = "true";

      if ( $depth == 0 ) {
        $atts['tabindex'] = "0";
      }

      $attributes = '';

      foreach ( $atts as $attr => $value ) {

        if ( strlen( $value ) ) {
          $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
          $attributes .= ' ' . $attr . '="' . $value . '"';
        }

      }

      $item_output = $args->before;
      $item_output .= '<a'. $attributes .'>';

      if ( in_array('icon-top', $classes ) ) {
        $item_output .= "<span class='mega-title-below'>";
      }

      if ( $settings['hide_text'] == 'true' ) {
        /** This filter is documented in wp-includes/post-template.php */
      } else if ( property_exists( $item, 'mega_description' ) && strlen( $item->mega_description ) ) {
            $item_output .= '<span class="mega-description-group"><span class="mega-menu-title">' . $args->link_before . apply_filters( 'megamenu_the_title', $item->title, $item->ID ) . $args->link_after . '</span><span class="mega-menu-description">' . $item->description . '</span></span>';
        } else {
        $item_output .= $args->link_before . apply_filters( 'megamenu_the_title', $item->title, $item->ID ) . $args->link_after;
      }

      if ( in_array('icon-top', $classes ) ) {
        $item_output .= "</span>";
      }

      $item_output .= '</a>';
      $item_output .= $args->after;

    }

    $output .= apply_filters( 'megamenu_walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }


  function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    $output .= "</li>";
  }

}

