<meta charset="utf-8">
<?php

// ÖĞRENCİ DETAY SAYFASI

// Adres çubuğundan "id" değişkeni içinde gelen öğrenci id'sini $_GET üzerinden alacağız, veritabanında bu id ile kayıtlı öğrenciyi seçeceğiz ve bilgilerini ekranda göstereceğiz

// BAĞLANTI İŞLEMLERİNİ İÇEREN DOSYAYI ÇAĞIRALIM
require_once "connection.php";

$studentId = (int)$_GET['id'];

$studentQuery = mysql_query("SELECT * FROM students WHERE id = $studentId");

$student = mysql_fetch_array($studentQuery, MYSQL_ASSOC);

?>
<h1><?=$student['name']?> <?=$student['surname']?></h1>
Öğrenci Numarası: <?=$student['number']?><br>
Doğum Tarihi: <?=$student['birth_year']?><br>
<a href="index.php">Listeye Geri Dön</a>