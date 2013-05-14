<?php require "functions/post-like-functions.php" ?>
<?php 
/******************************************************
Define Constraint
******************************************************/
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT . '/images');



/******************************************************
منو ها
******************************************************/
	function register_menus(){
		register_nav_menus(array(
			'top-menu'=>__('Top Menu','Ghab-framework'),
			'sticky-menu'=>__('sticky Menu','Ghab-framework')
			));
	}
	add_action('init','register_menus');


/******************************************************
افزودن اسکریپت ها در فوتر
******************************************************/
function load_custom_scripts(){
	
	wp_enqueue_script('waypoint',THEMEROOT . '/js/waypoints.min.js',array('jquery'),false,true);
	wp_enqueue_script('custom_script',THEMEROOT . '/js/script.js',array('jquery'),false,true);

	 if(is_singular()) wp_enqueue_script( 'comment-reply' );

}
add_action('wp_enqueue_scripts', 'load_custom_scripts');



	/******************************************************
ابزارک ها
******************************************************/

if(function_exists('register_sidebar')){
	
	register_sidebar(
		array(
			'name'=>__('ابزارک پایین راست','Ghab-framework'),
			'id'=>'right-footer',
			'description'=>__('ابزارک پایین سمت راست','Ghab-framework'),
			 'before_widget'=>'<div class="widget-area">',
			'after_widget'=>'</div><!--  پایان ابزارک -->',
			'before_title'=>'<h3>',
			'after_title'=>'</h3>'
			)
		);
	register_sidebar(
		array(
			'name'=>__('ابزارک پایین وسط','Ghab-framework'),
			'id'=>'middle-footer',
			'description'=>__('ابزارک پایین وسط','Ghab-framework'),
			'before_widget'=>'<div class="widget-area">',
			'after_widget'=>'</div><!--  پایان ابزارک -->',
			'before_title'=>'<h3>',
			'after_title'=>'</h3>'
			)
		);
	register_sidebar(
		array(
			'name'=>__('ابزارک پایین سمت چپ','Ghab-framework'),
			'id'=>'left-footer',
			'description'=>__('ابزارک پایین سمت چپ','Ghab-framework'),
			'before_widget'=>'<div class="widget-area">',
			'after_widget'=>'</div><!--  پایان ابزارک -->',
			'before_title'=>'<h3>',
			'after_title'=>'</h3>'
			)
		);
}



/******************************************************
	Localization
******************************************************/

function custom_theme_localization() {
	$lang_dir = THEMEROOT . '/lang';
	
	load_theme_textdomain('Ghab-framework', $lang_dir);
}

add_action('after_theme_setup', 'custom_theme_localization');
	




/******************************************************
قابلیت های پوسته
******************************************************/
if(function_exists('add_theme_support')){
	add_theme_support('post-formats',array('link','quote'));
	add_theme_support('automatic-feed-links');
}

 /******************************************************
تابع نمایش دهنده ی نظرات
******************************************************/
function ghab_comments($comment,$args,$depth){
	$GLOBALS['comment']=$comment;

if(get_comment_type()=='pingback' ||get_comment_type()=='trackback'):?>

	
	<li class="pingback" id='comment-<?php comment_ID();?>'>
	<div <?php comment_class('article');?>>
		<div class="top_post">
			<h5><?php _e('بازتاب','Ghab-framework'); ?></h5>
			<p><?php edit_comment_link(); ?></p>
		</div>
		<article>
			<?php comment_author_link(); ?>
		</article>	
	</div>

<?php elseif 
(get_comment_type()=='comment'):?>

<li id='comment-<?php comment_ID();?>'>
	<div <?php comment_class('article');?>>
		<div class="top_post">
			<h5><?php comment_author_link(); ?></h5>
			<p><span>در تاریخ <?php comment_date(); ?> ساعت <?php comment_time(); ?>&nbsp;-&nbsp;</span>
				<?php comment_reply_link(
					array_merge(
						$args,array('depth'=>$depth,'max_depth'=>$args['max_depth']))
										); ?>
			</p>
		</div>
	
			<figure style="float:right;">
				<?php
				$avatar_size=80;
				if('0' != $comment->comment_parent){
					$avatar_size=64;
				} 
				echo get_avatar($comment,$avatar_size);
				 ?>
			</figure>
			<article>
				<?php if($comment->comment_approved== '0'): ?>
				<p class="comment-approval"><?php _e('نظر شما پس از بررسی، نمایش داده خواهد شد.') ?></p>
			<?php endif; ?>
			<?php comment_text(); ?>
			</article>
					
	</div>
</li>


<?php endif; 
}


/******************************************************
Custom Comment Form
******************************************************/
function ghab_custom_comment_form($defaults){
	$defaults['comment_notes_before'] = '';
	$defaults['comment_notes_after'] = '' ;
	$defaults['id_form'] = 'comment-form' ;
	$defaults['comment_field'] = '<p><textarea name="comment" id="comment" cols="30" rows="10"></textarea></p>';
	return $defaults;
}
add_filter('comment_form_defaults','ghab_custom_comment_form');

function ghab_custom_comment_field()
{
	$commenter=wp_get_current_commenter();
	$req = get_option('require_name_email');
	$aria_req=($req ? " aria_required='true'" : ' ');
	$fields= array(
				'author'=>'<p>'.
							'<input type="text" id="author" name="author" value="'. esc_attr($commenter['comment_author']) .'"'.
							 $aria_req.' />'.
							 				'<label for="author">' . __('نام', 'Ghab-framework') . ' ' .($req ? '*' : ''). '</label>'.
							 				'</p>',
 				'email'=>'<p>'.
							'<input type="text" id="email" name="email" value="'. esc_attr($commenter['comment_author_email']) .'"'.
							 $aria_req.' />'.
							 				'<label for="email">' . __('ایمیل', 'Ghab-framework') . ' ' .($req ? '*' : ''). '</label>'.
							 				'</p>',
 				'url'=>'<p>'.
							'<input type="text" id="url" name="url" value="'. esc_attr($commenter['comment_author_url']) .'"'.
							 $aria_req.' />'.
							 				'<label for="url">' . __('وبسایت', 'Ghab-framework') . '</label>'.
							 				'</p>',
				);
	return 	$fields;
}

add_filter('comment_form_default_fields','ghab_custom_comment_field');

/******************************************************
lksjfdlksjdf
******************************************************/



/******************************************************
توابع مورد نیاز ...
******************************************************/
require_once("functions/ghab-customizer.php");

require_once("functions/shortcodes.php");

 ?>