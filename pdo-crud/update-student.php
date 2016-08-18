<?php

//	 ÖĞRENCİ BİLGİLERİ GÜNCELLEME SAYFASI

/**
	Bu sayfaya gönderilen öğrenciye ait bilgilerin içinde bulunduğu ve düzenlenebileceği şekilde form gösterilir, bu formda değiştirilebilecek alanlar Öğrencinin mevcut bilgileri ile doldurulur, değiştirilemeyecek tanımlayıcı alan olarak ID hidden olarak gönderilir, bu form gönderildiğinde, ilgili öğrenci için (ID üstünden yakaladığımız) ilgili alanları güncelleriz, işlem başarılı olursa öğrencinin detay sayfasına geri gideriz, olmazsa hatayla birlikte formu tekrar gösteririz
*/

// BAĞLANTI İŞLEMLERİNİ İÇEREN DOSYAYI ÇAĞIRALIM
require_once "connection.php";

// öncelikle güncellenecek öğrencinin GET üzerinden alınan id'si ile güncel bilgilerine erişelim, bunları formun içine doldurmamız gerekmektedir
$studentId = (int)$_GET['id'];
$student = $connection->query("SELECT * FROM students WHERE id = $studentId")->fetch();
if( ! $student) header("Location: index.php");

if($_POST){
	// sayfaya form bilgileri post ile gelmiş
	// Post üstünden gelen verileri değişkenlere alalım
	$number = $_POST['number'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$birth_year = $_POST['birth_year'];

	// UPDATE students SET number='555032', name='Cansu', surname='DOĞAN', birth_year='1995' WHERE id = 4

	$updateQuery = $connection->prepare("UPDATE students SET number = :newNumber, name = :newName, surname = :newSurname, birth_year = :newBirth_year WHERE id = :idToUpdate");

	$isUpdated = $updateQuery->execute(array(
		"newNumber"		=>	$number,
		"newName"		=>	$name,
		"newSurname"	=>	$surname,
		"newBirth_year"	=>	$birth_year,
		"idToUpdate"	=>	$studentId
		));

	if($isUpdated){
		header("Location: student.php?id=".$studentId);
	}else{
		$error = "Güncellenemedi";
	}
}

?>
<meta charset="utf-8">
<? if(isset($error)): ?>
	<?=$error?>
	<hr>
<? endif; ?>
<form method="post">
	<input type="text" name="number" placeholder="Öğrenci Numarası" value="<?=$student['number']?>"><br>
	<input type="text" name="name" placeholder="Öğrencinin Adı" value="<?=$student['name']?>"><br>
	<input type="text" name="surname" placeholder="Öğrencinin Soyadı" value="<?=$student['surname']?>"><br>
	<select name="birth_year">
		<? for($i=(int)date('Y'); $i>=1923; $i--): ?>
		<option value="<?=$i?>" <? if($i==$student['birth_year']) echo 'selected' ?> ><?=$i?></option>
		<? endfor; ?>
	</select><br>
	<button type="submit">Öğrenci Bilgilerini Güncelle</button>
</form>








