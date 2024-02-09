<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package corlate
 */

get_header();
?>
    <section id="main-slider" class="no-margin">
    <?php 
        //After breaking the entire page into parts, adding them.
        //Get slider.
        get_template_part('template-parts/front-page/slider'); 
    ?>
    </section><!--/#main-slider-->

    <section id="feature" >
        <div class="container">
        <?php 
            //Get features.
            get_template_part('template-parts/front-page/features'); 
        ?>
        </div>
    </section><!--features-->

    <section id="recent-works">
    <?php 
        //Get reccent works.
        get_template_part('template-parts/front-page/recent-works'); 
    ?>
    </section>

    <section id="services" class="service-item">
    <?php 
        //Get services.
        get_template_part('template-parts/front-page/services'); 
    ?>
    </section><!--/#recent-works-->

    <section id="middle">
        <div class="container">
            <div class="row">
                <?php 
                    //Get skills.
                    get_template_part('template-parts/front-page/skills'); 
                ?>
                <div class="col-sm-6 wow fadeInDown">
                <?php 
                    //Get accordion.
                    get_template_part('template-parts/front-page/accordion'); 
                ?>
                </div>
            </div><!--row-->
        </div><!--container-->
    </section>
                
    <section id="content">
        <div class="container">
            <div class="row">
            <?php 
                //Get tab.
                get_template_part('template-parts/front-page/tab'); 
            ?>

            <?php 
                //Get testimonials.
                get_template_part('template-parts/front-page/testimonials'); 
            ?>  
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#content-->

    <section id="partner">
    <?php 
        //Get partners.
        get_template_part('template-parts/front-page/partners'); 
    ?> 
    </section><!--/#partner-->

    <section id="conatcat-info">
    <?php 
        //Get contact-info.
        get_template_part('template-parts/front-page/contact'); 
    ?> 
    </section><!--/#conatcat-info-->

<?php
get_footer();
?>