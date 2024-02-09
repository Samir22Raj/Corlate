<div class="accordion">
    <h2>
        <?php 
            $j = 0;
            $frontpage_id = get_option('page_on_front'); 
            $page_id = get_the_ID();
            //$pages = get_all_page_ids();
            if($page_id == $frontpage_id):
                _e(get_field('heading',$frontpage_id),'corlate');
                $j=5; 
            elseif($page_id == "32"):
                echo "Accordion";
                $j=4;
            endif;
        ?>
    </h2>
    <div class="panel-group" id="accordion1">
        <?php
            for($i=1;$i<$j;$i++):
                $accordion = get_field('like_'.$i,$frontpage_id);
                if($accordion):
        ?>
        <div class="panel panel-default">
            <div class="panel-heading <?php if($i == 1): echo "active"; endif;?>">
                <h3 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1"
                        href="#acc<?php echo $i; ?>">
                        <?php _e($accordion['title'],'corlate'); ?>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                </h3>
            </div>

            <div id="acc<?php echo $i; ?>"
            class="panel-collapse collapse <?php if ($i == 1) : echo "in"; endif;?>">
                <div class="panel-body">
                    <?php
                    if (!empty($accordion['image'])):
                    ?>
                        <div class="media accordion-inner">
                            <div class="pull-left">
                                <img class="img-responsive" src="<?php echo esc_url($accordion['image']); ?>">
                            </div>
                            <div class="media-body">
                                <h4>
                                    <?php _e($accordion['heading'],'corlate'); ?>
                                </h4>
                                <p>
                                    <?php _e($accordion['content'],'corlate'); ?>
                                </p>
                            </div>
                        </div>
                    <?php else: ?>
                    <div class="panel-body" >
                        <?php _e($accordion['content'],'corlate'); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php
            endif;
        endfor;
    ?>
</div><!--/#accordion1-->
