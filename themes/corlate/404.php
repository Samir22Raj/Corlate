<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package corlate
 */

get_header();
?>

	<section id="error" class="container text-center">
        <h1><?php the_field('404-title',12); ?></h1>
        <p><?php the_field('404_message',12); ?></p>
        <a class="btn btn-primary" href="<?php the_field('redirect',12); ?>">GO BACK TO THE HOMEPAGE</a>
    </section><!--/#error-->

<?php
get_footer();
