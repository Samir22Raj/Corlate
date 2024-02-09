<!-- about us slider -->
<div id="about-slider">
    <div id="carousel-slider" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators visible-xs">
            <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-slider" data-slide-to="1"></li>
            <li data-target="#carousel-slider" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
        <?php
            for($i=1;$i<4;$i++):
                $image = get_field('image_'.$i);
        ?>    
                <div class="item <?php if($i==1) : echo "active"; endif; ?>">
                    <img src="<?php echo esc_url($image); ?>" class="img-responsive" alt=" " /> 
                </div>					
        <?php endfor; ?>
        </div>

        <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
            <i class="fa fa-angle-left"></i> 
        </a>
        
        <a class=" right carousel-control hidden-xs"href="#carousel-slider" data-slide="next">
            <i class="fa fa-angle-right"></i> 
        </a>
    </div> <!--/#carousel-slider-->
</div><!--/#about-slider-->