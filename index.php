<?php include './variableStore.php'; ?>
<html>
<head>
	<title> login </title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		body {
			background-image: url(images/backg.jpg);
		}
		input {
			width: 74%;
		}
		button {
		    background-color: dodgerblue;
		    color: white;
		    padding: 14px 20px;
		    margin: 8px 0;
		    border: none;
		    cursor: pointer;
		    width: 100%;
		}
	</style>
</head>
<body>
<div class="main-container">
	<div class="caption">
		<center>
			<h1 class="display-4-bold">SPK Promosi Kenaikan Jabatan</h1>
			<h1 class="display-4-bold">Dengan Metode Analitycal Hierarchy Process</h1>
		</center>
	</div>
	<div class="box-login">
		<h4 class="login">Silakan login</h4>
		<form action="/login/login.php" method="post">
			<div class="form_login">
    			<label for="username"><b>Username</b></label>
		    	<input type="text" placeholder="Username" name="username" required>
		    </div>
		    <div class="form_login">
		   		<label for="password"><b>Password</b></label>
		    	<input type="password" placeholder="Password" name="password" required>
		    </div>
		    <button type="submit" > Login </button>
		</form>
	</div>
</div>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>