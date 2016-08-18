<meta charset="utf-8">
<a href="add-student.php">Öğrenci Ekle</a><hr>
<?php

// PHP üstünde PDO kullanarak CRUD (Create, Read, Update, Delete) işlemlerini yapacağımız basit bir sistem oluşturacağız

// Ana sayfada öğrencilerimizin listesi sıralanacak

// Öğrencilerden herhangi birinin adının üstüne tıkladığımızda detay sayfasında bu öğrencinin detayını göreceğiz

// Ana sayfada gördüğümüz "Yeni Öğrenci Ekle" düğmesi ile yeni öğrenci ekleme formunu göreceğiz ve bunu doldurduğumuzda öğrenciyi kaydedeceğiz

// Öğrenci detay sayfasındaki "Öğrenciyi Sil" düğmesine tıkladığımızda ise öğrenciyi sileceğiz


// ANA SAYFA

// öğrenci listesini almam lazım:

// BAĞLANTI VE AYARLAR İÇİN İŞLEMLERİ BAŞKA BİR DOSYAYA ALDIK, ÇAĞIRALIM

require_once "connection.php";


// veritabanındaki "students" tablosundan tüm öğrencilerin tüm verilerini sorgulayıp döngüye sokalım
foreach( $connection->query("SELECT * FROM students") as $student ): ?>
	<a href="student.php?id=<?=$student['id']?>"><?=$student['name']?> <?=$student['surname']?></a><br>
<?php endforeach;

// bir döngü ile gelen her bir öğrenciyi ekrana bastık

?>