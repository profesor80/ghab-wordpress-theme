
<?php  

$like_comment="می پسندم";

  if(isset($_GET['post_id']) && isset($_GET['user_id']))
{
	connect();
	$info = does_like_the_post($_GET['post_id'],$_GET['user_id']);
	 
	
		if(count($info)!=0)
			{

				remove_users_like($_GET['post_id'],$_GET['user_id']);
				 echo "می پسندم";return;
			}
		
	
else{

	 insert_post_like_by_user($_GET['post_id'],$_GET['user_id']);
		if(count_all_post_like($_GET['post_id'])==1) {
						echo "شما این را می پسندید";return;
					}
					else
						{	 
							$like_comment= "شما و ";
							$like_comment.=count_all_post_like($_GET['post_id']) -1 . "نفر دیگر این پست را می پسندید ";
							echo trim($like_comment);return;
						}
		
	}	

	}


?>


<?php get_header(); ?>

	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	

		<?php get_template_part('content',get_post_format()); ?>
		<?php 

		// connect();
		// 			$postID=intval(get_the_ID());
					
		// 			$like_comment="می پسندم";
		// 			$users_resault=get_users_who_like_the_post($postID,get_current_user_id());
					
						
		// 				if(count($users_resault)!=0){
		// 					if(count_all_post_like($postID)==1) {
		// 				$like_comment="شما این را می پسندید";
		// 			}else
		// 				{	
		// 					$like_comment= " شما و ";
		// 					$like_comment.=  count_all_post_like($postID) -1 . " نفر دیگر این پست را می پسندید";
		// 				}
		// 				}

	 ?>

			<?php endwhile; else: ?>
			<h1><?php _e('هیچ پستی وجود ندارد'); ?></h1>
			<?php endif; ?>
<div class="page-navigation">
	<p class="fr"><?php next_posts_link(__('&rarr; نوشته‌های قدیمی تر ','ghab-framework')); ?></p>
	<p class="fl"><?php previous_posts_link(__('نوشته‌های جدیدتر &larr;','ghab-framework')); ?></p>
</div>
<?php get_footer(); ?>