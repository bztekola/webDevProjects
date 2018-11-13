<html>

<head>
<style>
#BlueDiv {
	background: #0000ff;
	
	display: inline; //block

	//0  0  255
	//RR GG BB;

	//0, 1, 2, 3, 4, 5, 6, 7, 8, 9, A, B, C, D, E, F;
}

.orange{
	background: #ff9900;


}
.square100{
	width: 100px;
	height: 100px;
}
div .blue-inner-text{
	color: #0099ff;
}
.blue-inner-text{
	color: #0000ff;
}
form{
	background: gray;
	width: 500px;
	height: 300px;
	border: 5px solid #333;
}
form.every-field-green-borders input{
	border: 1px solid #00ff00;
}
span{
	color: #f00;
	font-family: Arial;
	font-weight: bold;
	font-style: italic;
}
ol > li {
	background: #ccc;
}

ol li ul > li{
	background: #00f;
}
</style>
</head>
<body>
<?php
if(isset($_POST['name'])){

	echo 'Welcome ' . $_POST['name'];
}
function sayHiFiveTimes(){
	for($i = 0; $i < 5; $i++){
		echo '<div class="hi">Hi</div>';
	}
}
sayHiFiveTimes();
?>
<span>Hello again?</span>
	<form action="index.php" method="post">
		What is your name? <input type="text" name="name" placeholder="name" />
		<input type="submit" name="Submit" />

	</form>

	<form action="index.php" method="post" class="every-field-green-borders">
		What is your name? <input type="text" name="different" placeholder="name" />
		<input type="submit" name="Submit" />

	</form>
	<div id="BlueDiv">This is blue</div>
	<div class="orange square100"><div class="blue-inner-text">This is blue text</div>This is orange</div>
	<div class="blue-inner-text">I don't actually want this blue as it's not inner</div>

	<ol>
		<li>First List item</li>
		<li>Second List item</li>
		<li>
			<span>Child list</span>
			<ul>
				<li>Undordered item</li>
				<li>Undordered item</li>
				<li>Undordered item</li>
				<li>Undordered item</li>
			</ul>
		<li>List item</li>
		<li>List item</li>
		<li>List item</li>
	</ol>
</body>
</html>	