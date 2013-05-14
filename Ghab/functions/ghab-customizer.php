<?php 
/***********************************************************************************************/
/* Add a menu option to link to the customizer */
/***********************************************************************************************/
add_action('admin_menu', 'display_custom_options_link');
function display_custom_options_link() {
	add_theme_page('Ghab Options', 'تنظیمات قالب قاب', 'edit_theme_options', 'customize.php');
}
/***********************************************************************************************/
/* Add options in the theme customizer page */
/***********************************************************************************************/
add_action('customize_register','Ghab_customize_register');

function Ghab_customize_register($wp_customize){

//Logo

	$wp_customize->add_section('Ghab_logo',array(
		'title'=>__('لوگو','Ghab-Framewok'),
		'description' =>__('به شما اجازه می دهد تا لوگوی خود را اضافه کنید.','Ghab-Framewok'),
		'priority' => 23
			)
	);

	$wp_customize->add_setting('Ghab_custom_settings[logo]',array(
		'default' => IMAGES . '/logo.png',
		'type'	=>'option'
		));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
		'label' => __('لوگوی خود را بارگذاری نمایید', 'Ghab-Framewok'),
		'section' => 'Ghab_logo',
		'settings' => 'Ghab_custom_settings[logo]'
	)));


//Email Option
		$wp_customize->add_section('Ghab_Contact_Email',array(
		'title'=>__('ایمیل برای فرم تماس','Ghab-Framewok'),
		'description' =>__('ایمیل خود را جهت دریافت پیغام های صفحه تماس با ما وارد نمایید.','Ghab-Framewok'),
		'priority' => 24
			)
	);

	$wp_customize->add_setting('Ghab_custom_settings[contact_email]',array(
		'default' => '',
		'type'	=>'option'
		));
	$wp_customize->add_control('Ghab_custom_settings[contact_email]',array(
		'label' => __('آدرس ایمیل خود را وارد نمایید.', 'Ghab-Framewok'),
		'section' => 'Ghab_Contact_Email',
		'settings' => 'Ghab_custom_settings[contact_email]',
		'type' => 'text'
		));
}
 ?>