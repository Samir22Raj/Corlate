<div class="carousel slide">
    <ol class="carousel-indicators">
        <?php for($i=0;$i<3;$i++): ?>
            <li data-target="#main-slider" data-slide-to="<?php echo $i; ?>" class="<?php if($i==0) : echo "active"; endif; ?>"></li>
        <?php endfor; ?>
    </ol>
    <div class="carousel-inner">
    <?php
        for($i=1;$i<4;$i++):
            $slider = get_field('slider_'.$i);
            //var_dump($slider);
    ?>  
        <div class="item <?php if($i==1): echo "active"; endif; ?>" style="background-image: url('<?php echo $slider['background']; ?>')">
            <div class="container">
                <div class="row slide-margin">
                    <div class="col-sm-6">
                        <div class="carousel-content">
                            <h1 class="animation animated-item-1"><?php _e($slider['slider_title'],'corlate'); ?></h1>
                            <h2 class="animation animated-item-2"><?php _e($slider['slider_content'],'corlate');?></h2>
                            <a class="btn-slide animation animated-item-3" href="<?php  echo esc_url(get_site_url()); ?>">Read More</a>
                        </div>
                    </div>

                    <div class="col-sm-6 hidden-xs animation animated-item-4">
                        <div class="slider-img">
                            <img src="<?php echo $slider['responsive']; ?>" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.item-->
    <?php   endfor; ?>
    </div>
</div><!--/.carousel-->
<a class="prev hidden-xs" href="#main-slider" data-slide="prev">
    <i class="fa fa-chevron-left"></i>
</a>
<a class="next hidden-xs" href="#main-slider" data-slide="next">
    <i class="fa fa-chevron-right"></i>
</a>
