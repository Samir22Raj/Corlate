<?php
    /*Template Name: Contact Template*/
    get_header();
?>
    <section id="contact-info">
        <div class="center">                
            <h2><?php the_field('contact_title'); ?></h2>
            <p class="lead"><?php the_field('contact_content'); ?></p>
        </div>
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 text-center">
                        <div class="gmap">
                        <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=JoomShaper,+Dhaka,+Dhaka+Division,+Bangladesh&amp;aq=0&amp;oq=joomshaper&amp;sll=37.0625,-95.677068&amp;sspn=42.766543,80.332031&amp;ie=UTF8&amp;hq=JoomShaper,&amp;hnear=Dhaka,+Dhaka+Division,+Bangladesh&amp;ll=23.73854,90.385504&amp;spn=0.001515,0.002452&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=1073661719450182870&amp;output=embed"></iframe>
                        </div>
                    </div>
                    <div class="col-sm-7 map-content">
                        <ul class="row">
                            <?php 
                                for($i=1;$i<5;$i++):
                                    $contact = get_field('contact_info_'.$i);
                                    if($contact):?>
                                        <li class="col-sm-6">
                                            <address>
                                                <h5><?php _e($contact['office'],'corlate'); ?></h5>
                                                <p><?php _e($contact['office_address'],'corlate'); ?></p>
                                                <p>Phone:<?php _e($contact['phone'],'corlate'); ?><br>
                                                Email Address:<?php _e($contact['email'],'corlate'); ?></p>
                                            </address>
                                        </li>
                                    <?php
                                    endif;
                                endfor;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--/gmap_area -->
    </section>  
    <section id="contact-page">
        <div class="container">
            <div class="center">       
                <h2><?php _e(get_field('message_title'),'corlate'); ?></h2>
                <p class="lead"><?php _e(get_field('message'),'corlate'); ?></p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <?php echo do_shortcode('[Contact_form]'); ?>
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->
<?php
    get_footer();
?>