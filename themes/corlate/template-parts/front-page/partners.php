<div class="container">
    <div class="center wow fadeInDown">
        <h2><?php the_field('our_partners_title'); ?></h2>
        <p class="lead"><?php the_field('our_partners_content'); ?></p>
    </div>
    <div class="partners">
        <ul>
        <?php
            $delay = 300;
            $query6 = new WP_Query(
                array(
                    'showposts' => 5, 
                    'post_type' => 'Partner',
                    'order' => 'ASC'
                )
            );
            if ($query6->have_posts()):  
                while ($query6->have_posts()):
                    $query6->the_post();
        ?>
            <li> <a href="<?php the_field('partner_url'); ?>">
                <img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="<?php echo $delay; ?>ms" src="<?php _e(esc_url(get_the_post_thumbnail_url()));  ?>">
            </a></li>
        <?php 
            $delay += 300;
            wp_reset_postdata();
            endwhile;
        endif;
        ?>
        </ul>
    </div>        
</div><!--/.container-->