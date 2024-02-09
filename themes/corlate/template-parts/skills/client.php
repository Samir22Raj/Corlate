<div class="clients-area center wow fadeInDown">
    <h2><?php _e(get_field('clients_say_h'),'corlate');  ?></h2>
    <p class="lead"><?php _e(get_field('clients_say_c'),'corlate'); ?></p>
</div>

<div class="row">
<?php   
    for($i=1;$i<4;$i++):
        $client = get_field('client_'.$i);
        if($client):
?> 
        <div class="col-md-4 wow fadeInDown">
            <div class="clients-comments text-center">
                <img src="<?php echo esc_url($client['image']) ?>" class="img-circle" alt="">
                <h3><?php _e($client['saying'],'corlate'); ?></h3>
                <h4><span>-<?php _e($client['name'],'corlate'); ?> /</span> <?php _e($client['position'],'corlate'); ?></h4>
                <?php //echo sprintf( '<h4><span>-%s /</span> %s</h4>', $client['name'], $client['position'] ); ?> 
            </div> 
        </div><!--/.col-md-4-->
    <?php 
        endif;
    endfor;
    ?>
</div>