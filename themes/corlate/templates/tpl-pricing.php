<?php
    /*Template Name: Pricing Template*/
    get_header();
?>
    <section class="pricing-page">
        <div class="container">
            <div class="center">  
                <h2><?php _e(get_field('pricing_title'),'corlate'); ?></h2>
                <p class="lead"><?php _e(get_field('pricing_content'),'corlate'); ?></p>
            </div>  

            <div class="pricing-area text-center">
                <div class="row">
                <?php 
                    //Get pricing template.
                    get_template_part('template-parts/pricing'); 
                ?>
                </div>
            </div><!--/pricing-area-->
        </div><!--/container-->
    </section><!--/pricing-page-->
<?php
    get_footer();
?>