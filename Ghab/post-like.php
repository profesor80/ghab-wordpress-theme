<?php 

require "functions/post-like-functions.php";

  if(isset($_GET['post_id']) && isset($_GET['user_id']))
{
	connect();
	$info = get_users_who_like_the_post($_GET['post_id'],$_GET['user_id']);
	 
	
		if(count($info)!=0)
			{remove_users_like($_GET['post_id'],$_GET['user_id']);
		echo "removed";return;}
		
	
else{

	 insert_post_like_by_user($_GET['post_id'],$_GET['user_id']);
	 
		echo "added";return;
	}	
	
}


 ?>.salam