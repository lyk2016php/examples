<?php
require_once "init.php";
girisYaptiysaAnaSayfayaYonlendir();
$error = null;
// formdan kullanıcı adı ve şifre gelmiş mi diye bakalım
if(isset($_POST['username']) && isset($_POST['password'])):
	// gelen kullanıcı adı, yetkili kişilerde tanımlanmış mı diye bakalım
	if(isset($yetkiliKullanicilar[$_POST['username']])):
		// girilen parola ile ilgili kullanıcının parolası eşleşiyor mu diye bakalım
		if(md5($_POST['password'])==$yetkiliKullanicilar[$_POST['username']]):
			$_SESSION['username'] = $_POST['username'];
			header("Location: index.php");
		// kullanıcı varsa ama şifre uymuyorsa
		else:
			$error = "Yanlış parola girişi yaptınız";
		endif;
		else:
			$error = "Böyle bir kullanıcı yok, sen de kullanıcı mısın?";
	endif;
endif;
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kullanıcı Girişi</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style type="text/css">
		body {
			padding-top: 40px;
			padding-bottom: 40px;
			background-color: #eee;
		}

		.form-signin {
			max-width: 330px;
			padding: 15px;
			margin: 0 auto;
		}
		.form-signin .form-signin-heading,
		.form-signin .checkbox {
			margin-bottom: 10px;
		}
		.form-signin .checkbox {
			font-weight: normal;
		}
		.form-signin .form-control {
			position: relative;
			height: auto;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			padding: 10px;
			font-size: 16px;
		}
		.form-signin .form-control:focus {
			z-index: 2;
		}
		.form-signin input[type="email"] {
			margin-bottom: -1px;
			border-bottom-right-radius: 0;
			border-bottom-left-radius: 0;
		}
		.form-signin input[type="password"] {
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}
	</style>
</head>

<body>

	<div class="container">
		<? if(!is_null($error)): ?>
		<div class="alert alert-danger" role="alert"><?=$error?></div>
		<? endif; ?>
		<form class="form-signin" method="post">
			<h2 class="form-signin-heading">Lütfen giriş yapın</h2>
			<label for="inpUsername" class="sr-only">Kullanıcı Adı</label>
			<input type="text" id="inpUsername" class="form-control" placeholder="Kullanıcı Adınız" name="username" required autofocus>
			<label for="inpPassword" class="sr-only">Password</label>
			<input type="password" name="password" id="inpPassword" class="form-control" placeholder="Parola" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Giriş Yap</button>
		</form>
	</div>
</body>
</html>
