<?php
require_once('includes/database.php');
   

if(isset($_COOKIE['user_id'])){
    
    if(isset($_POST['body']) && strlen($_POST['body']) >=2){
        
        $post_body = $_POST['body'];
        $user_id =  $_COOKIE['user_id'];
        $create_date = date('Y-m-d H:i:s');
        $username=
        $num_rows = new_post($user_id, $post_body);
        if($num_rows == 1){
            header('Location: /microblog/');
        }
        
    }
}
?>
<html>
    <head>
    <link rel="stylesheet" href="/microblog/styles.css">
    <title>Microblog</title>

    </head>
    <body>
        <div class= "header">
        <?php
        if(isset($_COOKIE['user_id'])){
            echo '<a href="updatebio.php"> Click here to Update User Bio</a>';
                echo '<span>|</span>';
            echo '<a href="logout.php">LOGOUT</a>';
        }else {
            echo '<a href="login.php">LOGIN</a>';
        }
        ?>    
    </div>

<?php
    if (isset($_COOKIE['user_id'])){
     ?>
    <form action ="new_post.php" method= "post">
    <textarea name= "body"></textarea>
    <input type = "submit" value="POST">
    </form>
    <?php 
    }
    else{
     ?>   
    <div> You are not logged in! <a href="login.php">LOGIN</a></div>    
    <?php
    }
    ?>
    
<div>
</div>
</body>
</html>