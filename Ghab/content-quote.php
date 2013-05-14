<?php 
// require "functions/post-like-functions.php";

					
if(!isset($_GET['post_id']))
{
						connect();
					$postID=intval(get_the_ID());

					$like_comment="می پسندم";
					$users_resault=does_like_the_post($postID,get_current_user_id());
					
						
						if(count($users_resault)!=0){
							if(count_all_post_like($postID)==1) {
						$like_comment="شما این را می پسندید";
					}else
						{	
							$like_comment= " شما و ";
							$like_comment.=  count_all_post_like($postID)-1 . " نفر دیگر این پست را می پسندید";
						}
						}


}
?>
<div <?php post_class('article'); ?> id="post-<?php the_ID();?>">

			<div class="top_post">

				<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
				
				
				
			</div> <!-- /.top_post -->
			<article>
					
					<div class="quote-container">
						<span class="post-format-quote"></span>
						<?php the_content(); ?>
					</div>
					
				
			</article>
			<div class="bottom_post">
				<?php 
						// اگر کامنت اجازه داشت و پست با پسورد محافظت نمی شد لینک کامنت را نشان بده
						if(comments_open() && !post_password_required()){
							echo '<div class="comment-link grid_7"><span class="bubble"></span>';
							comments_popup_link('نظر دهید','یک نظر','% نظر');
							echo "</div>";
						}
						 ?>

					
				
				<div class="like grid_7">
					<span class="heart"></span>
					<?php if(get_current_user_id()!=0): ?>

				     <a class="Ilikeit" data-user_id="<?php echo get_current_user_id(); ?>" data-post_id="<?php the_ID(); ?>" href="<?php bloginfo('url') ?>/?post_id=<?php the_ID();?>&user_id=<?php echo get_current_user_id(); ?>">
				    <?php  echo '<span>' .$like_comment .  '</span>';?></a>
				 <?php else: 
				echo "برای پسندیدن باید وارد شوید.";?>
					<?php endif;?>
				
				</div>
				<div class="date grid_4 omega">
					<span class="calendar"></span>
					<span><?php the_date(get_option('date_format')); ?> </span>
				</div>
				
			</div> <!-- /.bottom_post -->
			<div class="shadow-RT"></div>
			<div class="shadow-RB"></div>
			<div class="shadow-LT"></div>
			<div class="shadow-LB"></div>
		</div> <!-- /.article -->