<?php
if(!isset($_COOKIE['user_id'])){
	header('Location: /microblog/login.php');
}
require_once('includes/database.php');

if( isset($_POST['fullname']) || isset($_POST['location']) || isset($_POST['bio'])){

	$fullname = $_POST['fullname'];
	$location = $_POST['location'];
	$bio = $_POST['bio'];
	update_bio($fullname, $location, $bio);
}

if(isset($_FILES['image'])){
	$extension = false;
	if($_FILES['image']['type'] == 'image/png'){
		$extension = ".png";
	} else if($_FILES['image']['type'] == 'image/jpeg'){
		$extension = ".jpg";
	}
	if($extension){
		$uploadName = time() . $extension;
		move_uploaded_file($_FILES["image"]["tmp_name"], 'uploads/' . $uploadName);

		$uploadPath = 'uploads/' . $uploadName;

		if($extension == '.jpg'){
				$img = imagecreatefromjpeg($uploadPath);
		}else if($extension == '.png'){
			$img = imagecreatefrompng($uploadPath);
		}

		imagesx($img);
		imagesy($img);

		
	}
}
$userbio = read_bio();
?>
<html>
	<head>
		<link rel="stylesheet" href="styles.css" />
	</head>
	<body>
		<form action="updatebio.php" method="post" enctype="multipart/form-data">
			<div>
				<label for="fullname">Fullname</label>
				<input type="text" name="fullname" id="fullname" value="<?= $userbio['fullname'] ?>" />
			</div>
			<div>
				<label for="location">Location</label>
				<input type="text" name="location" id="location" value="<?= $userbio['location'] ?>"/>
			</div>
			<div>
				<label for="bio">Biography</label>
				<textarea name="bio" id="bio"><?= $userbio['bio']?></textarea>
			</div>
			<div>
				<label for="image">Profile Image</label>
				<input type="file" name="image" id="image" />
			</div>
			<div>
				<input type="submit" value="UPDATE" />
			</div>
		</form>
	</body>
</html>