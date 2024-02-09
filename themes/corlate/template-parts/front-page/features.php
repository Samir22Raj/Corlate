<div class="center wow fadeInDown">
<?php $frontpage_id = get_option('page_on_front'); //As features is registerd as a custom field in frontpage,get front page ID so it can be shown in other pages. ?>
    <h2><?php _e(the_field('features_heading',$frontpage_id),'corlate'); ?></h2>
    <p class="lead"><?php _e(the_field('features_content',$frontpage_id),'corlate'); ?></p>
</div>

<div class="row">
<?php    
    for($i=1;$i<7;$i++):
        $feature = get_field('feature_'.$i,$frontpage_id);
        if($feature):
?>
    <div class="features">
        <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="feature-wrap">
                <i class="<?php _e($feature['class'],'corlate'); ?>"></i>
                <h2><?php _e($feature['feature_title'],'corlate'); ?></h2>
                <h3><?php _e($feature['feature_content'],'corlate');?></h3>
            </div>
        </div><!--/.col-md-4-->
    </div>
    <?php 
            endif;
        endfor; 
    ?>
</div>

    