<div class="container">
    <div class="center wow fadeInDown">
        <h2><?php _e(get_field('recent_works_title'),'corlate'); ?></h2>
        <p class="lead"><?php _e(get_field('recent_works_content'),'corlate'); ?></p>
    </div>

    <div class="row">
    <?php    
        $query2=new WP_Query(
            array(
                'post_type' => 'recent-work',
                'showposts'=>8,
                'order' => 'ASC'
                )
        );
        if($query2->have_posts()):
            while ($query2->have_posts()):
                $query2->the_post();
            ?> 
        <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="recent-work-wrap">
                <img class="img-responsive" src="<?php _e(get_field('recent'),'corlate'); ?>" alt="">
                <div class="overlay">
                    <div class="recent-work-inner">
                        <h3><a href="<?php echo esc_url(the_permalink()); ?>"><?php _e(esc_html( get_the_title() ),'corlate'); ?></a> </h3>
                        <p><?php _e(get_the_excerpt(),'corlate'); ?></p>
                        <a class="preview" href="<?php esc_url(the_field('full')); ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                    </div> 
                </div>
            </div>
        </div>   
        <?php 
            wp_reset_postdata();
            endwhile;
        endif;
        ?>
    </div><!--/.row-->
</div><!--/.container-->
    