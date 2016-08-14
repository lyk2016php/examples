<?php

if(isset($_POST['username']))
	setcookie("username", $_POST['username']);

header("Location: index.php");