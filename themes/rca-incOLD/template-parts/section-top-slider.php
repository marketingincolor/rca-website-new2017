<!-- SLIDER -->
<div class="row expanded">
		<div id="top-slider" class="">
			<?php #echo do_shortcode('[slick-carousel-slider dots="true" ]'); ?>
            <?php
                                ob_start(); 

                                $unique         = wpsisac_get_unique();
                                $post_type      = 'slick_slider';
                                $orderby        = 'post_date';
                                $order          = 'DESC';
                                $cat = 4;       

                                $args = array ( 
                                    'post_type'      => $post_type, 
                                    'orderby'        => $orderby, 
                                    'order'          => $order,
                                    'posts_per_page' => 6,
                                    'category' => ""  
                                   
                                );

                                if($cat != ""){
                                    $args['tax_query'] = array( array( 'taxonomy' => 'wpsisac_slider-category', 'field' => 'id', 'terms' => $cat) );
                                }        
                                $query      = new WP_Query($args);
                                //var_dump($query);
                                if ( $query->have_posts() ) :

                                $post_count = $query->post_count;   
                                ?>

                                <div class="slider-nav">
                                    <?php while ( $query->have_posts() ) : $query->the_post();
                                    $sliderurl = get_post_meta( get_the_ID(),'wpsisac_slide_link', true );
                                    $sliderimage_size = "thumbnail";

                                    echo    '<div>';
                                    echo    the_post_thumbnail('thumbnail'); 
                                    echo    '</div>';
                                    endwhile;
                                    ?>
                                </div>
                                <div class="slider-for orange-overlay" style="position:absolute;">
                                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                    <div>
                                        <h1><?php the_title(); ?></h1>
                                        <p><?php the_content(); ?></span>
                                    </div>
                                    <?php endwhile;
                                    ?>
                                </div>
                                    <?php
                                    endif;
                                    wp_reset_query(); 
                                ?>
		</div>
</div>
<!-- /END SLIDER -->