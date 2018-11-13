<?php
    require_once ('includes/database.php');

$post_id = $_GET['post_id'];
$user_id = $_COOKIE['user_id'];

mysqli_query($conn,"DELETE FROM `posts` WHERE `id`= '$post_id' AND `user_ud`=$user_id'");

header('Location: /microblog');

?>