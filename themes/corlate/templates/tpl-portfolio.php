<?php
/*Template Name: Portfolio Template*/
get_header();
?>
<section id="portfolio">
    <div class="container">
        <div class="center">
            <h2>
                <?php the_field('portfolio_title'); ?>
            </h2>
            <p class="lead">
                <?php the_field('portfolio_content'); ?>
            </p>
        </div>

        <ul class="portfolio-filter text-center">
            <?php
            $i = 0;
            $works = get_terms('type-rw');
            // var_dump( $works );
            foreach ($works as $work):
                ?>
                <li><a class="btn btn-default <?php if ($i == 0): ?>active<?php endif; ?>" href="#"
                        data-filter="<?php if ($work->name == "All Works"):
                            echo "*"; else:
                            echo "." . $work->slug; endif; ?>"><?php echo $work->name; ?></a></li>
                <?php
                $i++;
            endforeach;
            ?>
        </ul><!--/#portfolio-filter-->
        <div class="row">
            <div class="portfolio-items">
                <?php
                $args = array(
                    'post_type' => 'recent-work',
                    'posts_per_page' => 8,
                    'order' => 'ASC'
                );


                $recent_posts = new WP_Query($args);
                $tax = [];
                if ($recent_posts->have_posts()):
                    while ($recent_posts->have_posts()):
                        $recent_posts->the_post();
                        $terms = get_the_terms(get_the_ID(), 'type-rw');
                        if ($terms) {
                            foreach ($terms as $term) {
                                $tax[] = $term->slug;
                            }
                        }
                        ?>
                        <div class="portfolio-item <?php echo implode(" ", $tax); ?> col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <img class="img-responsive" src="<?php the_field('recent'); ?>" alt="">
                                <div class="overlay">
                                    <div class="recent-work-inner">
                                        <h3><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <p>
                                            <?php the_content(); ?>
                                        </p>
                                        <a class="preview" href="<?php the_field('full'); ?>" rel="prettyPhoto"><i
                                                class="fa fa-eye"></i> View</a>
                                    </div>
                                </div>
                            </div>
                        </div><!--/.portfolio-item-->
                        <?php
                        $tax = [];
                    endwhile;
                else:
                    echo "Nothing";
                endif;
                ?>
            </div>
        </div>
</section><!--/#portfolio-->
<?php
get_footer();