<div class="center wow fadeInDown">
    <h2><?php the_field('team_title'); ?></h2>
    <p class="lead"><?php the_field('about_team') ?></p>
</div>

<?php
    $i = 0;
    $delay2 = 300;
    $args = array(
        'showposts' => 4, 
        'post_type' => 'team-member',
        'order' => 'ASC'
    );
    $query3 = new WP_Query($args);
    if ($query3->have_posts()):  
        while ($query3->have_posts()):
            $query3->the_post();
?>
    <?php if($i==0 || $i==2) { ?> <div class="row clearfix"> <?php } ?>
    <div class="col-md-4 col-sm-6 <?php if($i>=1): echo "col-md-offset-2"; endif; ?>">	
        <div class="single-profile-<?php if($i<=1): echo"top"; else: echo "bottom"; endif; ?>
         wow <?php if($i<=1): echo "fadeInDown"; else: echo "fadeInUp"; endif; ?> 
         data-wow-duration="1000ms" data-wow-delay="<?php echo $delay2; ?>ms">
            <div class="media">
                <div class="pull-left">
                    <a href="#"><img class="media-object" src="<?php echo the_post_thumbnail_url(); ?>" alt=""></a>
                </div>
                <div class="media-body">
                    <h4><?php the_title(); ?></h4>
                    <h5><?php the_field('position'); ?></h5>
                    <ul class="tag clearfix">
                        <?php 
                            $tags = get_the_terms(get_the_ID(),'team_tag');
                            // var_dump($tags);
                            foreach($tags as $tag): 
                        ?>
                        <li class="btn"><a href="<?php echo get_term_link($tag->slug,'team_tag'); ?>"><?php echo $tag->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <ul class="social_icons">
                        <li><a href="<?php the_field('facebook_profile'); ?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?php the_field('twitter_profile'); ?>"><i class="fa fa-twitter"></i></a></li> 
                        <li><a href="<?php the_field('google_plus_profile'); ?>"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div><!--/.media -->
            <p><?php the_content(); ?></p>
        </div>
    </div><!--/.col-lg-4 -->
<?php if($i==1 || $i==3 ){ ?> </div> <?php } ?>
<?php if($i==1): ?>
    <div class="row team-bar">
        <div class="first-one-arrow hidden-xs">
            <hr>
        </div>
        <div class="first-arrow hidden-xs">
            <hr> <i class="fa fa-angle-up"></i>
        </div>
        <div class="second-arrow hidden-xs">
            <hr> <i class="fa fa-angle-down"></i>
        </div>
        <div class="third-arrow hidden-xs">
            <hr> <i class="fa fa-angle-up"></i>
        </div>
        <div class="fourth-arrow hidden-xs">
            <hr> <i class="fa fa-angle-down"></i>
        </div>
    </div> <!--skill_border-->    
<?php 
    $delay2 += 300;
    endif;
?>
<?php   
    $i++;
    endwhile;
    wp_reset_postdata();
endif;
?>