<?php
/*Template Name: About Us Template*/
get_header();
?>
<section id="about-us">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>
                <?php the_field('corlate_title'); ?>
            </h2>
            <p class="lead">
                <?php the_field('about_content'); ?>
            </p>
        </div>

        <?php
        //Get team.
        get_template_part('template-parts/about-us/slider');
        ?>

        <!-- Our Skill -->
        <div class="skill-wrap clearfix">
            <?php
            //Get team.
            get_template_part('template-parts/about-us/skills');
            ?>
        </div>

        <!-- our-team -->
        <div class="team">
            <?php
            //Get team.
            get_template_part('template-parts/about-us/team');
            ?>
        </div>
    </div><!--/.container-->
</section><!--/about-us-->
<?php
get_footer();
?>