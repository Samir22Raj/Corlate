<?php
get_header();
?>
<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package corlate
 */

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
                <div class="blog-item">
                    <?php
                    while (have_posts()):
                        the_post();

                        get_template_part('template-parts/content', get_post_type());


                        // If comments are open or we have at least one comment, load up the comment template.
                        /*if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;*/

                    endwhile; // End of the loop.
                    ?>
                </div><!--blog-item-->
                <?php
                $comments = get_comments(
                    array(
                        'post_id' => get_the_ID(),
                    )
                );
                $reply = 0;
                foreach ($comments as $comment):
                    if ($comment->comment_parent):
                        $reply = $comment->comment_ID;
                        break;
                    endif;
                endforeach;
                if ($reply):
                    $comment = get_comment(intval($reply));

                    if (!empty($comment)): ?>
                        <div class="media reply_section">
                            <div class="pull-left post_reply text-center">
                                <a href="#"><img src="<?php echo get_avatar_url($comment->user_id); ?>" class="img-circle"
                                        alt="" /></a>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
                                </ul>
                            </div>
                            <div class="media-body post_reply_content">
                                <h3>
                                    <?php echo $comment->comment_author; ?>
                                </h3>
                                <p class="lead">
                                    <?php echo $comment->comment_content; ?>
                                </p>
                                <p><strong>Web:</strong> <a href="<?php echo $comment->comment_author_url; ?>"><?php echo $comment->comment_author_email; ?></a></p>
                            </div>
                        </div>
                    <?php endif;
                endif; ?>
                <h1 id="comments_title">
                    <?php
                    $coms = get_comment_count(get_the_ID());
                    //var_dump($coms);
                    $com = $coms['approved'];
                    if ($com == 1):
                        echo $com . " Comment";
                    else:
                        echo $com . " Comments";
                    endif;
                    ?>
                </h1>
                <?php
                $i = 0;
                foreach ($comments as $com):
                    if ($com->comment_approved && $com->comment_parent == 0): ?>
                        <div class="media comment_section">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="<?php echo get_avatar_url($com->user_id); ?>" class="img-circle"
                                        alt="" /></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3>
                                    <?php echo $com->comment_author; ?>
                                </h3>
                                <h4>
                                    <?php
                                    $dt = strtotime($com->comment_date_gmt);
                                    $newdt = date('F j, Y \A\T h: i A', $dt);
                                    echo $newdt; ?>
                                </h4>
                                <p>
                                    <?php echo $com->comment_content; ?>
                                </p>
                                <a href="#">Reply</a>
                            </div>
                        </div>
                        <?php
                        $i++;
                    endif;
                    if ($i > 2):
                        break;
                    endif;
                endforeach;
                ?>

                <?php
                $args = array(
                    'title_reply_before' => '<div class="status alert alert-success" style="display: none"></div><div class="message_heading"><h4>',
                    'title_reply_after' => '</h4><p>Make sure you enter the(*)required information where indicate.HTML code is not allowed</p></div>',
                    'class_container' => '',
                    'comment_notes_before' => '',
                    'comment_notes_after' => '',
                    'logged_in_as' => '',
                    'submit_field' => '<div class="form-group">%1$s %2$s
                                    </div>
                                </div>',
                    'label_submit' => __('Submit Message'),
                    'class_submit' => 'btn btn-primary btn-lg',
                    'fields' => apply_filters(
                        'comment_form_default_fields',
                        array(

                            'author' => '<div class="row">' .
                            '<div class="col-sm-5">' .
                            '<div class="form-group">' .
                            '<label>Name *</label>' .
                            '<input id="author" type="text" class="form-control" name="author" aria-required="true"/>' .
                            '</div>',

                            'email' => '<div class="form-group">' .
                            '<label>Email *</label>' .
                            '<input id="email" type="email" class="form-control" name="email" aria-required="true" />' .
                            '</div>',

                            'url' => '<div class="form-group">' .
                            '<label>URL</label>' .
                            '<input id="url" type="url" class="form-control" />' .
                            '</div> ' . '</div>',
                        )
                    ),
                    'comment_field' => '<div class="col-sm-7">                        
                                <div class="form-group">
                                    <label>Message *</label>
                                    <textarea name="comment" id="message" aria-required="true" class="form-control" rows="8"></textarea>
                                </div>',
                );
                //adding a filter to reorder the fields in comment
                add_filter('comment_form_fields', 'move_comment_field');
                function move_comment_field($fields)
                {
                    $comment_field = $fields['comment'];
                    $author_field = $fields['author'];
                    $email_field = $fields['email'];
                    $url_field = $fields['url'];
                    unset($fields['comment']);
                    unset($fields['author']);
                    unset($fields['email']);
                    unset($fields['url']);
                    unset($fields['cookies']);
                    // the order of fields is the order below, change it as needed:
                    $fields['author'] = $author_field;
                    $fields['email'] = $email_field;
                    $fields['url'] = $url_field;
                    $fields['comment'] = $comment_field;
                    // done ordering, now return the fields:
                    return $fields;
                }
                comment_form($args);
                ?>
                <?php if (!is_user_logged_in()): ?>
                </div>
            <?php endif; ?>
        </div><!--/.col-md-8-->

        <aside class="col-md-4">
            <div class="widget search">
                <?php
                function custom_search_form()
                {
                    $form = '<form role="form" action="' . home_url('/') . '">
                            <input type="text" class="form-control search_box" name="s" autocomplete="off" placeholder="Search Here">
                            <input type="hidden" name="post_type" value="corlate_blog" />
                            </form>';

                    return $form;
                }
                add_filter('get_search_form', 'custom_search_form');
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
            </div><!--/.blog_gallery-->
        </aside>

    </div><!--/.row-->

    </div><!--/.blog-->

</section><!--/#blog-->

<?php
get_footer();