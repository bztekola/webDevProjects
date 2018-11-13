<?php
require_once('includes/database.php');

redirectIfLoggedIn();
login();
?>
<html>
<head>
	<title>Microblog | Login</title>
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
<form action="login.php" method="post">
	<div>
		<input type="text" name="username" placeholder="Username" />
	</div>
	<div>
		<input type="password" name="password" placeholder="Password" />
	</div>
	<div>
		<input type="submit" value="Log In"/>
	</div>

</form>

</body>
</html>