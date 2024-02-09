<?php
    /*Template Name: Shortcodes Template*/
    get_header();
?>
    <section id="content" class="shortcode-item">
        <div class="container">
            <div class="row">
            <?php 
                //Get Tab.
                get_template_part('template-parts/front-page/tab'); 
            ?>
                <div class="col-xs-12 col-sm-5">
                <?php 
                    //Get accordion.
                    get_template_part('template-parts/front-page/accordion'); 
                ?>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing-area shortcode-item">
        <div class="container">
            <h2><?php _e(get_field('pricing_title',25),'corlate'); ?></h2>
            <div class="row text-center">
                <?php 
                    //Get pricing template.
                    get_template_part('template-parts/pricing'); 
                ?>
            </div>
        </div>
    </section><!--/pricing_area-->

    <section class="recent-works" class="shortcode-item">
        <div class="container">
            <h2>Gallery</h2>
            <div class="row">
                <div class="portfolio-items">
                <?php 
                $args = array(
                    'post_type' => 'recent-work', 
                    'posts_per_page' => 8,
                    'order' => 'ASC'
                );
                
                $recent_posts = new WP_Query( $args );

                $tax = [];
                if ($recent_posts->have_posts()) : 
                        while ($recent_posts->have_posts()) : $recent_posts->the_post();
                            $terms = get_the_terms( get_the_ID(), 'type-rw' );
                            if ($terms) {
                                foreach($terms as $term) {
                                    $tax[] = $term->slug;
                                } 
                            } 
                ?>
                <div class="portfolio-item <?php echo implode(" ",$tax); ?> col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="<?php the_field('recent'); ?>" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p><?php the_content(); ?></p> 
                                    <a class="preview" href="<?php the_field('full'); ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->
                <?php 
                        $tax = [];
                        wp_reset_postdata();
                    endwhile; 
                    else :
                        echo "Nothing";
                    endif;
                ?>
                </div>
            </div>
        </div>
    </section>
<?php
    get_footer();
?>