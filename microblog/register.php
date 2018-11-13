<?php 
require_once('includes/database.php');
register();
?>
<html>
<head>
	<title>Microblog | Register</title>
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
<form action="register.php" method="post">
	<?php
		if(isset($num_accounts) && $num_accounts >= 1){
			echo "Account already created with username or email";
		}

	?>
	<div>
		<input type="text" name="username" placeholder="Username" />
	</div>
	<div>
		<input type="email" name="email" placeholder="Email" />

		<!--
			
			html tag attributes: id, class, style
			input tag attributes: type, name, placeholder, value
		-->
	</div>
	<div>
		<input type="password" name="password" placeholder="Password" />
	</div>
	<div>
		<input type="submit" value="Register"/>
	</div>

</form>

</body>
</html>