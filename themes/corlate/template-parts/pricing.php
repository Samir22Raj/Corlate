<?php
    $j = 0;
    $page_id = get_the_ID();
    if($page_id == "25"):
        $j=8;
    elseif($page_id == "32"):
        $j=4;
    endif;
    for($i=1;$i<$j;$i++):
        $pricing = get_field('pricing_plan_details_'.$i,25);
        if($pricing):
    if($i<=3): 
?>
    <div class="col-sm-4 plan price-<?php echo numfmt_format(numfmt_create('en_US', NumberFormatter::SPELLOUT), $i);//Function to convert numbers into words so that they meet naming conditions for css class. ?> wow fadeInDown">
    <?php else: ?>
    <div class="col-sm-6 col-md-3 plan price-<?php echo numfmt_format(numfmt_create('en_US', NumberFormatter::SPELLOUT), $i); ?> wow fadeInDown"> 
    <?php endif; ?>
    <?php if($pricing['feature_image']): ?><img src="<?php echo esc_url($pricing['feature_image']); ?>"><?php endif; ?>
        <ul>
            <li class="heading-<?php echo numfmt_format(numfmt_create('en_US', NumberFormatter::SPELLOUT), $i); ?>">
                <h1><?php _e($pricing['name'],'corlate'); ?></h1>
                <span>$<?php _e($pricing['price'],'corlate'); ?>/Month</span>
            </li>
            <li><?php _e($pricing['space'],'corlate'); ?> GB Disk Space</li>
            <li><?php _e($pricing['ram'],'corlate'); ?>GB Dadicated Ram</li>
            <li><?php _e($pricing['addon_domain'],'corlate'); ?> Addon Domain</li>
            <li><?php _e($pricing['email'],'corlate'); ?> Email Account</li>
            <li><?php _e($pricing['support'],'corlate'); ?> Support</li>
            <li class="plan-action">
                <a href="<?php _e($pricing['link'],'corlate');; ?>" class="btn btn-primary">Sign up</a>
            </li>
        </ul>
    </div>
    
<?php
        endif;
    endfor;
?>
