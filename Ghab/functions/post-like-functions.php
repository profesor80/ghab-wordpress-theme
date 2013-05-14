<?php 
function isXHR(){
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']);
}

function connect(){
	global $pdo;
	$pdo = new PDO("mysql:host=localhost;dbname=wp", "root" ,"");
}

function insert_post_like_by_user($post,$user){
	global $pdo;
	
$stmt = $pdo->prepare(
		"INSERT INTO wp_posts_like(post_id, user_id) 
		VALUES ('$post','$user')"
		);
	$stmt->execute();
// 	echo $post;
	// INSERT INTO `wp_posts_like`(`post_id`, `user_id`) VALUES ([value-1],[value-2])

}
function does_like_the_post($post,$user){
	global $pdo;
	
$stmt = $pdo->prepare(
		'SELECT user_id FROM wp_posts_like WHERE post_id=:posts AND user_id=:user'
		);
	$stmt->execute( array( ':posts' => $post,':user'=>$user) );
	return $stmt->fetchAll(PDO::FETCH_OBJ);
}
function count_all_post_like($post){
	global $pdo;
	$stmt = $pdo->prepare(
		'SELECT user_id FROM wp_posts_like WHERE post_id=:posts'
		);
	$stmt->execute(array(':posts'=>$post));
	$count = $stmt->rowcount();
	return $count;
}


function remove_users_like($post,$user){
	global $pdo;
	$stmt = $pdo->prepare(
		"DELETE FROM wp_posts_like WHERE post_id=$post AND user_id=$user"
		);
	$stmt->execute();

}
 ?>