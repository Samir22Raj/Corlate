<div class="container">
    <div class="center wow fadeInDown">
        <h2><?php _e(get_field('services_heading'),'corlate'); ?></h2>
        <p class="lead"><?php _e(get_field('services_content'),'corlate'); ?></p>
    </div>

    <div class="row">
    <?php 
        for($i=1;$i<7;$i++):
            $service = get_field('service_'.$i);
            //var_dump($service);
            if($service):
    ?> 
        <div class="col-sm-6 col-md-4">
            <div class="media services-wrap wow fadeInDown">
                <div class="pull-left">
                    <img class="img-responsive" src="<?php echo esc_url($service['service_image']); ?>">
                </div>
                <div class="media-body">
                    <h3 class="media-heading"><?php _e($service['service_title'],'corlate'); ?></h3>
                    <p><?php echo _e($service['service_content'],'corlate'); ?></p>
                </div>
            </div>
        </div>
        <?php 
                endif;
            endfor; 
        ?>
    </div><!--/.row-->
</div><!--/.container-->
