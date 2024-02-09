<?php
class My_Search_Widget extends WP_Widget_Search
{
    function widget($args, $instance)
    {

        $title = !empty($instance['title']) ? $instance['title'] : '';

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);

        //Overriding the search to display a specific search form widget that is displayed only in aside sidebar.
        if ($args['id'] == 'sidebar-aside'):
            $argsu = array(
                'before_widget' => '<div class="widget search">',
                'after_widget' => '</div>',
            );
            $args = wp_parse_args($argsu, $args);
            echo $args['before_widget'];
            ?>
            <form role="search" action="<?php echo home_url('/'); ?>">
                <input type="text" class="form-control search_box" name="s" autocomplete="off" placeholder="Search Here" />
            </form>
            <?php
        else:
            echo $args['before_widget'];
            if ($title) {
                echo $args['before_title'] . $title . $args['after_title'];
            }

            // Use active theme search form if it exists.
            get_search_form();
        endif;
        echo $args['after_widget'];
    }
}

class My_Recent_Comments extends WP_Widget_Recent_Comments
{
    function widget($args, $instance)
    {
        static $first_instance = true;

        if (!isset($args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }

        $output = '';

        $default_title = __('Recent Comments');
        $title = (!empty($instance['title'])) ? $instance['title'] : $default_title;

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);

        $number = (!empty($instance['number'])) ? absint($instance['number']) : 5;
        if (!$number) {
            $number = 5;
        }
        if ($args['id'] == 'sidebar-aside'):
            $argsu = array(
                'before_widget' => '<div class="widget categories">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>'
            );
            $args = wp_parse_args($argsu, $args);
        endif;
        $comments = get_comments(
            apply_filters(
                'widget_comments_args',
                array(
                    'number' => $number,
                    'status' => 'approve',
                    'post_status' => 'publish',
                    'parent' => 0
                ),
                $instance
            )
        );
        $output .= $args['before_widget'];
        if ($title) {
            $output .= $args['before_title'] . $title . $args['after_title'];
        }

        $recent_comments_id = ($first_instance) ? 'recentcomments' : "recentcomments-{$this->number}";
        $first_instance = false;

        $format = current_theme_supports('html5', 'navigation-widgets') ? 'html5' : 'xhtml';

        /** This filter is documented in wp-includes/widgets/class-wp-nav-menu-widget.php */
        $format = apply_filters('navigation_widgets_format', $format);

        if ('html5' === $format) {
            // The title may be filtered: Strip out HTML and make sure the aria-label is never empty.
            $title = trim(strip_tags($title));
            $aria_label = $title ? $title : $default_title;
            $output .= '<nav aria-label="' . esc_attr($aria_label) . '">';
        }

        if ('html5' === $format) {
            $output .= '</nav>';
        }
        if ($args['id'] == 'sidebar-aside'):
            $output .= "<div class='row'>   <div class='col-sm-12'>";

            foreach ($comments as $com):
                if ($com->comment_approved):
                    $output .= '<div class="single_comments">
                    <img src="' . esc_url(get_avatar_url($com->user_id, array('size' => '55'))) . '" alt=""  />
                        <p>' . $com->comment_content . '</p>
                        <div class="entry-meta small muted">
                            <span>By ' . get_comment_author_link($com) . ' </span><span>On <a href="#">' . get_the_title($com->comment_post_ID) . '</a></span>
                        </div>
                    </div>';
                endif;
            endforeach;
            $output .= '</div>    </div>';
        else:
            $output .= '<ul id="' . esc_attr($recent_comments_id) . '">';
            if (is_array($comments) && $comments) {
                // Prime cache for associated posts. (Prime post term cache if we need it for permalinks.)
                $post_ids = array_unique(wp_list_pluck($comments, 'comment_post_ID'));
                _prime_post_caches($post_ids, strpos(get_option('permalink_structure'), '%category%'), false);

                foreach ((array) $comments as $comment) {
                    $output .= '<li class="recentcomments">';
                    $output .= sprintf(
                        /* translators: Comments widget. 1: Comment author, 2: Post link. */
                        _x('%1$s on %2$s', 'widgets'),
                        '<span class="comment-author-link">' . get_comment_author_link($comment) . '</span>',
                        '<a href="' . esc_url(get_comment_link($comment)) . '">' . get_the_title($comment->comment_post_ID) . '</a>'
                    );
                    $output .= '</li>';
                }
            }
            $output .= '</ul>';
        endif;

        $output .= $args['after_widget'];
        echo $output;
    }
}

class My_Category extends WP_Widget_Categories
{
    function widget($args, $instance)
    {

    }
}

function my_custom_widget_register()
{
    unregister_widget('WP_Widget_Search');
    register_widget('My_Search_Widget');
    unregister_widget('WP_Widget_Recent_Comments');
    register_widget('My_Recent_Comments');
    unregister_widget('WP_Widget_Categories');
    register_widget('My_Category');
}
add_action('widgets_init', 'my_custom_widget_register');
?>