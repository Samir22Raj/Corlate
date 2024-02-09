<div class="col-xs-12 col-sm-4 wow fadeInDown">
    <div class="testimonial">
        <h2><?php _e(the_field('testimonial_heading'),'corlate'); ?></h2>
        <?php
            for($i=1;$i<3;$i++):
                $test = get_field('testimonial_'.$i);
                if($test): 
        ?>
            <div class="media testimonial-inner">
                <div class="pull-left">
                    <img class="img-responsive img-circle" src="<?php echo esc_url($test['image']); ?>" />
                </div>
                <div class="media-body">
                    <p><?php _e($test['testimony'],'corlate') ?></p>
                    <span><strong>-<?php _e($test['name'],'corlate'); ?>/</strong> <?php _e($test['position'],'corlate'); ?></span>
                </div>
            </div>
        <?php 
                endif;
            endfor;
        ?>
    </div>
</div>