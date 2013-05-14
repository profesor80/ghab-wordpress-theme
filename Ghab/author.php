
<?php get_header(); ?>

	<?php if(have_posts()) : ?>
		<div class="additional-content">
			<?php
			$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
			?>

			<h4><?php _e('نوشته  های : ','ghab-framework'); ?> <?php echo $curauth->display_name; ?></h4>
								

		</div> <!-- end additional content -->

	<?php while(have_posts()) : the_post(); ?>
		<?php get_template_part('content',get_post_format()); ?>

			

			<?php endwhile; else: ?>
			<div class="article">
				<article>
			<h3><?php _e('این نویسنده هیچ نوشته ای ندارد.','ghab-framework'); ?></h3>
				<?php get_search_form(); ?>
			</article>
			</div>
		<?php endif; ?>
<div class="page-navigation">
	<p class="fr"><?php next_posts_link(__('&rarr;  نوشته‌های قدیمی تر ','ghab-framework')); ?></p>
	<p class="fl"><?php previous_posts_link(__('نوشته‌های جدیدتر &larr;','ghab-framework')); ?></p>
</div>
<?php get_footer(); ?>