<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package corlate
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<img class="img-responsive img-blog" src="<?php echo get_the_post_thumbnail_url(); ?>" width="100%" alt="" />
	<div class="row">
		<div class="col-xs-12 col-sm-2 text-center">
			<div class="entry-meta">
				<span id="publish_date"><?php _e(get_the_date('d M')); ?></span>
				<span><i class="fa fa-user"></i> <a href="#"><?php the_author(); ?></a></span>
				<span><i class="fa fa-comment"></i> <a href="<?php the_permalink(); ?>#comments">
				<?php 
					$com = get_comments_number(); 
					if($com == 1):
						echo $com." Comment";
					else: 
						echo $com." Comments";
					endif;
				?>
				</a></span>
				<span><i class="fa fa-heart"></i><a href="#">
				<?php 
					$like = get_field('likes');
					if ($like == null):
						$like = 0;
					endif;
					if($like == 1):
						echo $like." Like";
					else: 
						echo $like." Likes";
					endif;
				?>
				</a></span>
			</div>
		</div>
				
		<div class="col-xs-12 col-sm-10 blog-content">
			<h2><?php the_title(); ?></h2>
			<p><?php the_content(); ?></p>
			<div class="post-tags">
				<strong>Tag: </strong>
				<?php  
				$tags = wp_get_post_terms(get_the_ID());
				if($tags):
					$i=0;
					foreach($tags as $tag): ?>
						<a href="<?php echo get_term_link($tag); ?>"> <?php echo $tag->name;?></a>
						<?php	
							$i++;
							if($i==count($tags)):
								break;
						endif;
					?>
						/
					<?php endforeach;
				endif;
				?>
			</div>
		</div>
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->
