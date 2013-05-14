<?php get_header(); ?>

	<?php if(have_posts()) : ?>
		<div class="additional-content">
			<h4><?php single_cat_title(__('نوشته های مربوط به : ','ghab-framework'),true);?> <?php echo get_search_query(); ?></h4>
								

		</div> <!-- end additional content -->

	<?php while(have_posts()) : the_post(); ?>
		<?php get_template_part('content',get_post_format()); ?>

			

			<?php endwhile; else: ?>
			<div class="article">
				<article>
			<h3><?php _e('هیچ پستی یاف نشد.'); ?></h3>
				<?php get_search_form(); ?>
			</article>
			</div>
		<?php endif; ?>
<div class="page-navigation">
	<p class="fl"><?php next_posts_link(__('نوشته قدیمی تر &larr;','ghab-framework')); ?></p>
	<p class="fr"><?php previous_posts_link(__('&rarr;نوشته جدیدتر ','ghab-framework')); ?></p>
</div>
<?php get_footer(); ?>