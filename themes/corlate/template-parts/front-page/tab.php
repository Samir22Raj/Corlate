<?php 
    $frontpage_id = get_option('page_on_front'); 
    $page_id = get_the_ID();
    if($page_id == $frontpage_id): ?>
        <div class="col-xs-12 col-sm-8 wow fadeInDown">
    <?php elseif($page_id == "32"): ?>
        <div class="col-xs-12 col-sm-7 wow fadeInDown">
        <h2>Tab</h2>
<?php endif; ?>  
    <div class="tab-wrap"> 
        <div class="media">
            <div class="parrent pull-left">
                <ul class="nav nav-tabs nav-stacked">
                <?php
                    $j=1;
                    for($i=1;$i<6;$i++):
                        $tab = get_field('tab_'.$i,$frontpage_id);
                        if($tab): 
                ?>
                    <li class="<?php if($i == 2): echo "active"; endif; ?>">
                    <a href="#tab<?php echo $i; ?>" data-toggle="tab" class="<?php
                    if (!empty($tab['image'])): echo"analytics-".$j; else: echo"technical"; endif; ?>">
                    <?php _e($tab['title'],'corlate'); ?></a></li>
                <?php 
                        $j++; 
                        endif;
                    endfor;
                ?>
                </ul>
            </div>
            <div class="parrent media-body">
                <div class="tab-content">
                <?php
                    for($i=1;$i<6;$i++):
                        $tab = get_field('tab_'.$i,$frontpage_id);
                        if($tab): 
                ?>
                    <div class="tab-pane fade <?php if($i == 2): echo "active in"; endif; ?>" id="tab<?php echo $i; ?>">
                    <?php
                    if (!empty($tab['image'])):
                    ?>
                        <div class="media">
                            <div class="pull-left">
                                <img class="img-responsive" src="<?php echo esc_url($tab['image']); ?>">
                            </div>
                            <div class="media-body">
                                <h2><?php _e($tab['heading'],'corlate'); ?></h2>
                                <p><?php _e($tab['content'],'corlate'); ?></p>
                            </div>
                        </div>
                    <?php else: ?>
                        <p><?php _e($tab['content'],'corlate'); ?></p>  
                    <?php endif; ?> 
                    </div><!--tab-pane-->   
                <?php 
                        endif;
                    endfor;
                ?>
                </div> <!--/.tab-content-->  
            </div> <!--/.media-body--> 
        </div> <!--/.media-->    
    </div><!--/.tab-wrap-->               
</div><!--/.col-sm-6-->