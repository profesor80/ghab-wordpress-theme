<?php 
/*
Template Name: صفحه آرشیو

*/
 ?>
<?php get_header();?>

		<div class="article">
			<div class="top_post">
				<p class="category-container">
					<?php  the_category('&nbsp;/&nbsp');?>
				</p>
				<h2><?php the_title();?></h2>
				<?php if(current_user_can('edit_post',$post->ID)){
					edit_post_link(__('ویرایش کنید','Ghab-Framework'),'<p>','</p>');
				} ?>
			</div> <!-- /.top_post -->
			<article>
				<div class="grid_8 alpha">
					<h4><?php _e('آرشیو ماهانه','Ghab-Framework'); ?></h4>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</div>
				<div class="grid_8 omega">
					<h4><?php _e('آرشیو موضوعی','Ghab-Framework'); ?></h4>
					<ul>
						<?php wp_list_categories('hiararchical=0&title_li='); ?>
					</ul>
				</div>
			</article>
			
			<div class="shadow-RT"></div>
			<div class="shadow-RB"></div>
			<div class="shadow-LT"></div>
			<div class="shadow-LB"></div>
		</div> <!-- /.article -->
	

			
		
		
			
				
			
		
<?php get_footer(); ?>