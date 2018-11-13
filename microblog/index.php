<?php
require_once('includes/database.php');
?>
<html>
<head>
	<title>	Microblog</title>
	<link rel="stylesheet" href="styles.css" />
</head>
<body>
	<div class="header">
		<?php
		if(isset($_COOKIE['user_id'])){
			echo '<a href="logout.php">LOGOUT</a>';
		}else{
			echo '<a href="login.php">LOGIN</a>';
		}
		
		?>
	</div>
<?php
if(isset($_COOKIE['user_id'])){
?>
<form action="new_post.php" method="post">
	<textarea name="body"></textarea>
	<input type="submit" value="POST" />
</form>
<?php
}else{
	?>

	<div>You are not logged in! <a href="login.php">Login</a>a</div>div>
<?php
}
?>
<?php
	$posts = mysqli_query($conn, "SELECT *, `posts`.`id` AS `post_id` FROM `posts` LEFT JOIN `users` ON `posts`.`user_id`=`users`.`id`");
	while($post = mysqli_fetch_assoc($posts)){
		echo '<div class="post-wrap">';
		if(isset($_COOKIE['user_id']) && $_COOKIE['user_id'] == $post['user_id']){
			echo '<a href="deletepost.php?post_id=' . $post['post_id'] . '">DELETEPOST</a>';
		}
		echo '<div class="username">'.$post['username'].'</div>';
		echo '<div class="date">'.$post['created_at'].'</div>';
		echo '<div class="post">'. $post['body']. '</div>';
		echo '</div>';

	}
?>
</body>
</html>