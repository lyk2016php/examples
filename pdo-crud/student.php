<?php

// ÖĞRENCİ DETAY SAYFASI

// Adres çubuğundan "id" değişkeni içinde gelen öğrenci id'sini $_GET üzerinden alacağız, veritabanında bu id ile kayıtlı öğrenciyi seçeceğiz ve bilgilerini ekranda göstereceğiz

// BAĞLANTI İŞLEMLERİNİ İÇEREN DOSYAYI ÇAĞIRALIM
require_once "connection.php";

// GETten ID'yi integer olarak alalım
$studentId = (int)$_GET['id'];

// sorgu ile oluşan kaynağı dizi olarak alalım
$student = $connection->query("SELECT * FROM students WHERE id = $studentId")->fetch();

// kaynaktan dizi alamadıysak (öğrenci yoksa) ana sayfaya yönlendirelim
if( ! $student) header("Location: index.php");

?>
<meta charset="utf-8">
<h1><?=$student['name']?> <?=$student['surname']?></h1>
Öğrenci Numarası: <?=$student['number']?><br>
Doğum Tarihi: <?=$student['birth_year']?><br>
<hr>
<form action="update-student.php" method="get">
	<input type="hidden" name="id" value="<?=$student['id']?>">
    <button type="submit">Öğrenci Bilgilerini Düzenle</button>
</form>
<form method="post" action="delete-student.php" onsubmit="return confirm('Öğrenci silinsin mi?')">
	<input type="hidden" name="idToDelete" value="<?=$student['id']?>">
	<button type="submit">Öğrenciyi Sil</button>
</form>
<hr>
<a href="index.php">Listeye Geri Dön</a>