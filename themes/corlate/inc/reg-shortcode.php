<?php
    function add_archives(){
        ob_start();
        ?>
        <h3>Archives</h3>
            <div class="row">
                <div class="col-sm-12">
                    <ul class="blog_archieve">
                    <?php 
                        $args = array(
                            'type'            => 'monthly',
                            'before'          => '<i class="fa fa-angle-double-right"></i>',
                            'after'           => '',
                            'show_post_count' => true,
                        );
                        wp_get_archives($args);
                    ?>
                    </ul>
                </div>
            </div>    
        <?php
        $output = ob_get_clean();
        return $output;
    }

    function add_tags(){
        ob_start();
        $tags = get_terms( array(
            'taxonomy'   => 'post_tag',
            'hide_empty' => false,
        ) );
        ?>
        <h3>Tag Cloud</h3>
            <ul class="tag-cloud">
            <?php 
                if($tags):
                    foreach($tags as $tag): ?>
                    <li><a class="btn btn-xs btn-primary" href="<?php echo get_term_link($tag); ?>">
                    <?php 
                        $term = get_term($tag); 
                        echo $term->name;
                    ?> 
                    </a></li>
                    <?php endforeach;
                endif;
            ?>
            </ul>   
        <?php
        $output = ob_get_clean();
        return $output;
    }

    function add_categories(){
        ob_start();
        $categories = get_terms( array(
            'taxonomy' => 'category',
            'hide_empty' => false,
            'exclude' => array('1'),
        ) );
        ?>
        <h3>Categories</h3>
        <div class="row">
            <div class="col-sm-6">
                <ul class="blog_category">
                    <?php 
                    if($categories):
                        foreach($categories as $cat): ?>
                            <li><a href="<?php echo get_term_link($cat); ?>">
                            <?php 
                                $term = get_term($cat); 
                                echo $term->name;
                            ?>
                            <span class="badge"><?php echo $term->count; ?></span> 
                            </a></li>
                        <?php endforeach;
                    endif;
                    ?>
                </ul>
            </div>
        </div>    
        <?php
        $output = ob_get_clean();
        return $output;
    }

    function add_comments(){
        ob_start();
        ?>
        <h3>Recent Comments</h3>
            <div class="row">
                <div class="col-sm-12">
                    <?php 
                        $comments = get_comments(array('number' => 3, 'parent' => 0)); 
                        foreach($comments as $com):
                            //var_dump($com);
                            if($com->comment_approved): ?>
                                <div class="single_comments">
                                <img src="<?php echo get_avatar_url($com->user_id,array('size' => '55')); ?>" alt=""  />
                                    <p><?php echo $com->comment_content; ?></p>
                                    <div class="entry-meta small muted">
                                        <span>By <a href="#"><?php echo $com->comment_author; ?></a></span><span>On <a href="#"><?php echo get_the_title($com->comment_post_ID); ?></a></span>
                                    </div>
                                </div>
                            <?php
                            endif;
                        endforeach;
                    ?>
                </div>
            </div>
        <?php
        $output = ob_get_clean();
        return $output;
    }

    function contact_form_display(){
        ob_start();
        ?>

        <!-- Echo a container used that will be used for the JavaScript validation -->
        <div id="validation-messages-container"></div>
        <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="<?php echo get_template_directory_uri(); ?>/sendemail.php">
            <div class="col-sm-5 col-sm-offset-1">
                <div class="form-group">
                    <label>Name *</label>
                    <input type="text" name="name" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label>Email *</label>
                    <input type="email" name="email" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="number" class="form-control">
                </div>
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" class="form-control">
                </div>                        
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Subject *</label>
                    <input type="text" name="subject" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label>Message *</label>
                    <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                </div>                        
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit Message</button>
                </div>
            </div>
        </form> 
        <?php
        $output = ob_get_clean();
        return $output;  
    }

    function  shortcode_register_test(){
        add_shortcode( 'Archives', 'add_archives' ); 
        add_shortcode( 'Tags', 'add_tags' ); 
        add_shortcode( 'Categories', 'add_categories' ); 
        add_shortcode( 'Comments', 'add_comments' );
        add_shortcode( 'Contact_form', 'contact_form_display');
    }
    add_action( 'init', 'shortcode_register_test' );
?>