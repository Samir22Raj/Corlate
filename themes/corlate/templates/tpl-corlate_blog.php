<?php
/*Template Name: Blog Template*/
get_header();
?>
<section id="blog" class="container">
    <div class="center">
        <h2>
            <?php the_field('blog_title', 27); ?>
        </h2>
        <p class="lead">
            <?php the_field('blog_content', 27); ?>
        </p>
    </div>

    <div class="blog">
        <div class="row">
            <div class="col-md-8">
                <?php
                $page_id = get_the_ID();
                if (get_query_var('paged')) {
                    $paged = get_query_var('paged');
                } elseif (get_query_var('page')) {
                    $paged = get_query_var('page');
                } else {
                    $paged = 1;
                }
                $args = array(
                    'posts_per_page' => 2,
                    'paged' => $paged
                );

                $recent_posts = new WP_Query($args);

                if ($recent_posts->have_posts()):
                    while ($recent_posts->have_posts()):
                        $recent_posts->the_post();
                        ?>
                        <div class="blog-item">
                            <div class="row">
                                <div class="col-sm-2 text-center">
                                    <div class="entry-meta">
                                        <span id="publish_date">
                                            <?php _e(get_the_date('d M')); ?>
                                        </span>
                                        <span><i class="fa fa-user"></i> <a href="#">
                                                <?php the_author(); ?>
                                            </a></span>
                                        <span><i class="fa fa-comment"></i> <a href="<?php the_permalink(); ?>#comments">
                                                <?php
                                                $com = get_comments_number();
                                                if ($com == 1):
                                                    echo $com . " Comment";
                                                else:
                                                    echo $com . " Comments";
                                                endif;
                                                ?>
                                            </a></span>
                                        <span><i class="fa fa-heart"></i><a href="#">
                                                <?php
                                                $like = get_field('likes');
                                                if ($like == 1):
                                                    echo $like . " Like";
                                                else:
                                                    echo $like . " Likes";
                                                endif;
                                                ?>
                                            </a></span>
                                    </div>
                                </div>

                                <div class="col-sm-10 blog-content">
                                    <a href="#"><img class="img-responsive img-blog"
                                            src="<?php echo get_the_post_thumbnail_url(); ?>" width="100%" alt="" /></a>
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <h3>
                                        <?php the_excerpt(); ?>
                                    </h3>
                                    <a class="btn btn-primary readmore" href="<?php the_permalink(); ?>"><?php _e("Read More", 'corlate'); ?>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div><!--/.blog-item-->
                        <?php
                    endwhile;
                    $total_pages = $recent_posts->max_num_pages;

                    if ($total_pages > 1):

                        $current_page = max(1, get_query_var('paged'));
                        ?>
                        <ul class="pagination pagination-lg">
                            <?php
                            $links = paginate_links(
                                array(
                                    'base' => get_pagenum_link(1) . '%_%',
                                    'format' => '/page/%#%',
                                    'current' => $current_page,
                                    'type' => 'link',
                                    'total' => $total_pages,
                                    'prev_text' => __('<i class="fa fa-long-arrow-left"></i>Previous Page'),
                                    'next_text' => __('Next Page<i class="fa fa-long-arrow-right"></i>'),
                                )
                            );
                            if ($links):
                                $comp = preg_split('/\R/', $links);
                                foreach ($comp as $page):
                                    ?>
                                    <li>
                                        <?php _e($page, 'corlate'); ?>
                                    </li>
                                    <?php
                                endforeach;
                            endif;
                    endif;
                endif;
                ?>
                </ul><!--/.pagination-->
            </div><!--/.col-md-8-->
            <aside class="col-md-4">
                <?php
                if (!is_active_sidebar('sidebar-aside')) {
                    return;
                }
                dynamic_sidebar('sidebar-aside');
                dynamic_sidebar('sidebar-2');
                wp_list_categories();
                /*
                function custom_search_form(  ) {
                    $form = '<form role="form" action="'. home_url( '/' ) .'">
                    <input type="text" class="form-control search_box" name="s" autocomplete="off" placeholder="Search Here">
                    </form>';
              
                    return $form;
                }
                add_filter( 'get_search_form', 'custom_search_form');
                get_search_form();
            ?>
            </div><!--/.search-->

            <div class="widget comments">
                <?php echo do_shortcode('[Comments]'); ?>                 
            </div><!--/.archieve-->

            <div class="widget categories">
                <?php echo do_shortcode('[Categories]'); ?>                 
            </div><!--/.archieve-->

            <div class="widget archieve">
                <?php echo do_shortcode('[Archives]'); ?>                 
            </div><!--/.archieve-->

            <div class="widget Tags">
                <?php echo do_shortcode('[Tags]'); ?>                 
            </div><!--/.archieve-->

            <div class="widget blog_gallery">
                <h3>Our Gallery</h3>
                <ul class="sidebar-gallery">
                    <?php dynamic_sidebar('gallery'); ?>
                </ul>
            </div><!--/.blog_gallery--><?php */
                ?>
            </aside>
        </div>
    </div>
</section>
<?php
get_footer();