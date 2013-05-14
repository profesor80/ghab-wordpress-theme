<?php 
// دسترسی مستقیم به این فایل را می بندیم
if(!empty($_SERVER["SCRIPT-FILENAME"]) && basename($_SERVER["SCRIPT-FILENAME"]) == 'comments.php'){
	die(__('شما اجازه دسترسی به این فایل را ندارید!!!','ghab-framework'));
}
//پست پسوردی هست یا نه؟؟؟
if(post_password_required()): ?>
	<p>
		<?php _e('این پست محافظت شده است.جهت مشاهده نظرات، رمز صحیح را وارد نمایید.','ghab-framework'); ?>
		<?php return; ?>
	</p>
<?php endif; 
	if(have_comments()) :?>
	
	<h3> <?php comments_number(__('هیچ نظری داده نشده','ghab-framework'),__('یک نظر داده شده','ghab-framework'),__('% نظر داده شده','ghab-framework')); ?></h3>
	<div class="comment-area">
		<ol >
			<?php wp_list_comments('callback=ghab_comments'); ?>
		</ol>


		<?php if(get_comment_pages_count()>1 && get_option('page_comments')): ?>
		<div class="comments-nav-section clearfix">
							
							<p class="fl"><?php previous_comments_link(__('نظرات قدیمی تر &larr;','ghab-framework')); ?></p>
							<p class="fr"><?php next_comments_link(__('&rarr;نظرات جدیدتر ','ghab-framework')); ?></p>
							
						</div> <!-- end comments-nav-section -->
					<?php endif; ?>
	</div>
	<?php 
	 elseif(!comments_open() && !is_page() && post_type_supports(get_post_type(),'comments')): ?>
	 <h3><?php _e('نظردهی مسدود شده است:(','ghab-framework') ?></h3>
	 <?php  endif;
	 //نمایش فرم
	 comment_form();
 ?>