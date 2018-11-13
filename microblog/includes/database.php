<?php
 $conn = mysqli_connect('127.0.0.1', 'microblog', 'GaNBrWog06xkqnR1', 'microblog');//7YD19Fm6SA2dcccq;

function login(){
    global $conn;
    
    

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        //$conn = mysql_connect('server-address.or.IP-address', 'username', 'password', 'optionalDatabaseName');
       
        echo "SELECT * FROM `users` WHERE `username`='$username'";
        $result = mysqli_query($conn, "SELECT * FROM `users` WHERE `username`='$username'");
        echo mysqli_num_rows($result);
        if (mysqli_num_rows($result) ){

            $user = mysqli_fetch_assoc($result);

            setcookie('username', $user['username'], time() + 3600);
            setcookie('user_id', $user['id'], time() + 3600);
            header("Location: /");


        }

    }
	
}
function redirectIfLoggedIn(){
    

    if(isset($_COOKIE['user_id'])){
         header("Location: /microblog");

    }
}

function register(){
    global $conn;
    
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        //$conn = mysql_connect('server-address.or.IP-address', 'username', 'password', 'optionalDatabaseName');
        $exists = mysqli_query($conn,"SELECT `id`, `username`, `email` FROM `users` WHERE `username`= '$username' OR `email`= '$email'");
        $num_accounts = mysqli_num_rows($exists);

        if($num_accounts==0){


            $result = mysqli_query($conn, "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', SHA2(CONCAT('$username', '$password'), 512))");
        }
    }
}

function update_bio($fullname, $location, $bio){
	global $conn;
	
	
	$userID = $_COOKIE['user_id'];
	mysqli_query($conn, "UPDATE `users` SET `fullname`='$fullname', `location`='$location', `bio`='$bio' WHERE `id`='$userID'") or die(mysqli_error($conn));
	
}
function read_bio(){
    global $conn;
    $userID = $_COOKIE['user_id'];
    $res = mysqli_query($conn, "SELECT * FROM `users` WHERE `id`='$userID'");
    return mysqli_fetch_assoc($res);
}
function new_post($userID, $body) {
    global $conn;
    $body = mysqli_escape_string($conn, $body);
    $create_date = date('Y-m-d H:i:s');
   mysqli_query($conn, "INSERT INTO `posts`(`user_id`, `body`, `created_at`)
        VALUES ('$userID', '$body', '$create_date')") or die(mysql_error());
    $num_rows = mysqli_affected_rows($conn);
    return $num_rows;
}
    
    
    
    