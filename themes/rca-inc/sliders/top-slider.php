<?php

/**
 * Slider on top of home page
 * @param  [type] $atts    [description]
 * @param  [type] $content [description]
 * @return [type]          [description]
 */

function rca_top_slider($atts, $content = null) {
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

	$result = '<div id="owl-carousel-top-slider" class="owl-carousel owl-carousel-' . sanitize_title($atts['category']) . '" ' . $data_attr . '>';

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
add_shortcode('rca-top-slider', 'rca_top_slider');
