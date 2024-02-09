<?php
    /*Template Name: Services Template*/
    get_header();
?>
    <section id="feature" class="transparent-bg">
        <div class="container">
            <?php 
                //Get features.
                get_template_part('template-parts/front-page/features'); 
            
                //Get Quote.
                get_template_part('template-parts/skills/ready'); 
            
                //Get clients-area.
                get_template_part('template-parts/skills/client'); 
            ?>   
        </div>
    </div>
<?php
get_footer();