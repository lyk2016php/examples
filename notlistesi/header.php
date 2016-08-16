<? 
if(!defined('sekuri')) header("Location: index.php");
require_once "init.php" ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sınav Listesi</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body style="margin-top:20px;">
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php"><i class="fa fa-graduation-cap" aria-hidden="true" style="color:purple"></i> Not Kayıt Sistemi</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Ana Sayfa</a></li>
					</ul>
					<? if(isset($_SESSION['username'])): ?>
					<p class="navbar-text navbar-right">Merhaba <em><?=$_SESSION['username']?></em> <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a></p>
					<? else: ?>
					<form class="navbar-form navbar-right" action="login.php" method="post">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Adınız" name="username">
						</div>
						<button type="submit" class="btn btn-default">Giriş</button>
					</form>
					<? endif; ?>
					<form class="navbar-form navbar-right" role="search">
						<a href="add.php" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i> Sınav Sonucu Ekle</a>
					</form>
				</div>
			</div>
		</nav>