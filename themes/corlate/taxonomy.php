<?php 
    get_header();
?>

    <section id="blog" class="container">
        <div class="center">
            <h2><?php the_field('blog_title',27); ?></h2>
            <p class="lead"><?php the_field('blog_content',27); ?></p>
        </div>

        <div class="blog">
            <div class="row">
            <?php 
                $args = array( 
                    'posts_per_page' => 2
                );
                
                $recent_posts = new WP_Query( $args );

                if ($recent_posts->have_posts()) : 
                    while ($recent_posts->have_posts()) : $recent_posts->the_post();
            ?>
                    <div class="blog-item">
                        <div class="row">
                            <div class="col-sm-2 text-center">
                                <div class="entry-meta">
                                    <span id="publish_date"><?php _e(get_the_date('d M')); ?></span>
                                    <span><i class="fa fa-user"></i> <a href="#"><?php the_author(); ?></a></span>
                                    <span><i class="fa fa-comment"></i> <a href="<?php the_permalink(); ?>#comments">
                                    <?php 
                                        $com = get_comments_number(); 
                                        if($com == 1):
                                            echo $com." Comment";
                                        else: 
                                            echo $com." Comments";
                                        endif;
                                    ?>
                                    </a></span>
                                    <span><i class="fa fa-heart"></i><a href="#">
                                    <?php 
                                        $like = get_field('likes');
                                        if($like == 1):
                                            echo $like." Like";
                                        else: 
                                            echo $like." Likes";
                                        endif;
                                    ?>
                                    </a></span>
                                </div>
                            </div>
                                    
                            <div class="col-sm-10 blog-content">
                                <a href="#"><img class="img-responsive img-blog" src="<?php echo get_the_post_thumbnail_url(); ?>" width="100%" alt="" /></a>  
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <h3><?php the_excerpt(); ?></h3>
                                <a class="btn btn-primary readmore" href="<?php the_permalink(); ?>">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div><!--/.blog-item-->
                    
            </div><!--/.row-->

        </div><!--/.blog-->

    </section><!--/#blog-->  

<?php
get_footer();