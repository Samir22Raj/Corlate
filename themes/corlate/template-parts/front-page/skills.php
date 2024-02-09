<div class="col-sm-6 wow fadeInDown">
    <div class="skill">
        <h2><?php the_field('skills_heading'); ?></h2>
        <p class="lead"><?php the_field('skills_content'); ?></p>

        <div class="progress-wrap">
            <?php 
                for($i=1;$i<5;$i++):
                    $skill = get_field('skill_'.$i);
                    if($skill):
                    
            ?> 
            <h3><?php _e($skill['skill_name'],'corlate'); ?></h3>
            <div class="progress">
                <div class="progress-bar  color<?php echo $i; ?>" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $skill['proficiency']; ?>%">
                <span class="bar-width"><?php _e($skill['proficiency'],'corlate'); ?>%</span>
                </div>

            </div>
            <?php 
                    endif;
                endfor;
            ?>
        </div>
    </div>
</div>