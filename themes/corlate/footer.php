<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corlate
 */

?>

<section id="bottom">
    <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        <div class="row">
            <?php
            if (!is_active_sidebar('w-sidebar')) {
                return;
            }
            dynamic_sidebar('w-sidebar');
            ?>
        </div>
    </div>
</section><!--/#bottom-->

<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?php
                $footer_default = "{a} {b} {c} {d}";
                $footer_user = get_theme_mod('footer_text');
                $url = get_theme_mod('footer_url');
                $exp_footer = explode(",", $footer_user);
                $link = '<a target="_blank" href="' . $url . '" title="">' . $exp_footer[1] . '</a>.';
                $footer_text = str_replace(array("{a}", "{b}", "{c}", "{d}"), array($exp_footer[0], $link, $exp_footer[2], "&copy"), $footer_default);
                echo $footer_text;
                ?>
            </div>
            <?php
            if (wp_get_nav_menu_object('Final_Footer')):
                wp_nav_menu(
                    array(
                        'menu' => 'Final_Footer',
                        'theme_location' => 'Final_Footer',
                        'container_class' => 'col-sm-6',
                        'menu_class' => 'pull-right',
                    )
                );
            endif;
            ?>
        </div>
    </div>
</footer><!--/#footer-->
</div>

<?php wp_footer(); ?>