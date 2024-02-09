<div class="center wow fadeInDown">
    <h2><?php the_field('about_skill_title'); ?></h2>
    <p class="lead"><?php _e(get_field('about_skill_content'),'corlate'); ?></p>
</div>
<div class="row">
<?php   
    $delay = 300;    
    for($i=1;$i<5;$i++):
        $skill = get_field('skill_'.$i);
        if($skill):
        //var_dump($service);
?>
    <div class="col-sm-3">
        <div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="<?php echo $delay; ?>ms">
            <div class="<?php if($skill['name']=='Wordpress'): echo "wp"; else: _e(strtolower($skill['name']),'corlate'); endif; ?>-skill">                                  
                <p><em><?php _e($skill['skill_level'],'corlate'); ?>%</em></p>
                <p><?php _e($skill['name'],'corlate'); ?></p>
            </div>
        </div>
    </div>
<?php
        $delay += 300;
        endif;
    endfor;
?>
</div>