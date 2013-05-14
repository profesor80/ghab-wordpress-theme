<?php get_header();?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<div class="article">
			<div class="top_post">
				
				<p class="category-container">
					<?php  the_category('&nbsp;/&nbsp');?>
				</p>
				<h2><?php the_title();?></h2>
				
			</div> <!-- /.top_post -->
			<article>
				<div>
					<?php the_content(); ?>
				</div>
			</article>
			
			<div class="shadow-RT"></div>
			<div class="shadow-RB"></div>
			<div class="shadow-LT"></div>
			<div class="shadow-LB"></div>
		</div> <!-- /.article -->
	

			<?php endwhile; else: ?>
			<h1><?php _e('هیچ پستی وجود ندارد'); ?></h1>
		<?php endif; ?>
		<div class="article-author article">
				<figure>
					<?php echo get_avatar(get_the_author_meta('ID',32)); ?>
				</figure>
			<h5>نوشته شده توسط <?php the_author_posts_link(); ?></a></h5>
				<article>
					<?php the_author_meta('description'); ?>
				</article>
				
			
			
		</div>
		
			
				<?php comments_template('',true); ?>
			
		
<?php get_footer(); ?>