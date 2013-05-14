<?php 
/*
Template Name: صفحه تماس

*/
 ?>
<?php 

function isEmail($verify_email) {
	
		return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$verify_email));
	
	}
	$error_name=false;
	$error_email=false;
	$error_message=false;


	if(isset($_POST['contact_submit'])){
		
		
			// Initialize the variables
		$name = '';
		$email = '';
	
		$message = '';
		$receiver_email = '';
		
		// Get the name
		if (trim($_POST['contact_name']) === '') {
			$error_name = true;
		} else {
			$name = trim($_POST['contact_name']);
		}
		
		// Get the email
		if (trim($_POST['contact_email']) === '' || !isEmail($_POST['contact_email'])) {
			$error_email = true;
		} else {
			$email = trim($_POST['contact_email']);
		}

		
		
		// Get the message
		if (trim($_POST['contact_message']) === '') {
			$error_message = true;
		} else {
			$message = stripslashes(trim($_POST['contact_message']));
		}
		
		//اگر خطایی نبود
		if(!$error_name && !$error_email && !$error_message){

			//Get the receiver email
			$options=get_option('Ghab_custom_settings');
			$receiver_email=$options['contact_email'];
			$subject=$name . ' با شما تماس گرفته است.';
			$body="شخصی با نام $name  با شما تماس گرفته است و پیغام زیر را فرستاده است".PHP_EOL. PHP_EOL ;
			$body.=$message . PHP_EOL .PHP_EOL;
			$body.="شما می توانید با $name از طریق آدرس ایمیل $email تماس بگیرید.";
			$body.= PHP_EOL .PHP_EOL;
			
			$headers="From $email" . PHP_EOL;
			$headers.="Reply-To: $email" . PHP_EOL;
			$headers .= "MIME-Version: 1.0" . PHP_EOL;
			$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
			$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
			
			if(mail($receiver_email, $subject, $body,$headers)){
				$email_sent = true;
			}else {
				$email_sent_error = true;
			}
		}
	}
 ?>

<?php get_header();?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<div class="article">
			<div class="top_post">
				
				<h2><?php the_title();?></h2>
				<?php if(current_user_can('edit_post',$post->ID)){
					edit_post_link(__('ویرایش کنید','Ghab-Framework'),'<p>','</p>');
				} ?>
			</div> <!-- /.top_post -->
			<?php if (isset($email_sent) && $email_sent == true) : ?>
							
								<h3><?php _e('موفقیت!', 'Ghab-Framework'); ?></h3>
								<p><?php _e('پیغام شما با موفقیت ارسال شد. ما به زودی با شما تماس می گیریم', 'Ghab-Framework'); ?></p>
							
							<?php elseif (isset($email_sent_error) && $email_sent_error == true) : ?>

								<h3><?php _e('خطایی بوجود آمده است!', 'Ghab-Framework'); ?></h3>
								<p><?php _e('متاسفانه ما در این لحظه نمی توانیم پیغام شما را ارسال کنیم لطفا مجددا تلاش کنید.', 'Ghab-Framework'); ?></p>
								
							<?php else : ?>

			<article>
				<div>
					<?php the_content(); ?>
				</div>
				<div id="contact">
	<h2>تماس با من</h2>
	<form action="<?php the_permalink(); ?>" method="post">
		
			<p <?php if ($error_name) echo 'class="p-errors"'; ?>>
				<label for="contact_name"><?php _e('نام:','Ghab-Framework'); ?> </label>
	 			<input type="text" value="<?php if(isset($_POST['contact_name'])) echo $_POST['contact_name']; ?>" name="contact_name" id="contact_name">
			</p>

			<p <?php if ($error_email) echo 'class="p-errors"'; ?>>
				<label for="contact_email"><?php _e('ایمیل:','Ghab-Framework'); ?> </label>
		 		<input  type="email" value="<?php if(isset($_POST['contact_email'])) echo $_POST['contact_email']; ?>" name="contact_email" id="contact_email">
			</p>

			<p <?php if ($error_message) echo 'class="p-errors"'; ?>>
				<label for="contact_message"><?php _e('چه خبر؟','Ghab-Framework'); ?></label>
				<textarea name="contact_message" id="contact_message" cols="30" rows="10"><?php if(isset($_POST['contact_message'])) echo stripcslashes($_POST['contact_message']);  ?></textarea>
			</p>
			<input type="hidden" id="contact_submit" name="contact_submit" value="true" />
			<p>
				<input type="submit" value="بفرست">
			</p>
		
	</form>
	<?php endif ?>
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
		
		
			
				
			
		
<?php get_footer(); ?>