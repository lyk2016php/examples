<meta charset="utf-8">
<?php

// PHP üstünde mysql_ fonksiyonlarını kullanarak CRUD (Create, Read, Update, Delete) işlemlerini yapacağımız basit bir sistem oluşturacağız

// Ana sayfada öğrencilerimizin listesi sıralanacak

// Öğrencilerden herhangi birinin adının üstüne tıkladığımızda detay sayfasında bu öğrencinin detayını göreceğiz

// Ana sayfada gördüğümüz "Yeni Öğrenci Ekle" düğmesi ile yeni öğrenci ekleme formunu göreceğiz ve bunu doldurduğumuzda öğrenciyi kaydedeceğiz

// Öğrenci detay sayfasındaki "Öğrenciyi Sil" düğmesine tıkladığımızda ise öğrenciyi sileceğiz


// ANA SAYFA

// öğrenci listesini almam lazım:

// Veritabanı sunucusuna bağlanacağım
// $connection = mysql_connect("localhost", "root", "root");

// Veritabanını seçeceğim
// mysql_select_db("lyk2016_sis", $connection);

// utf8 karakter seti ile haberleşeceğimi belirteceğim
// mysql_set_charset("utf8", $connection);

// BAĞLANTI VE AYARLAR İÇİN İŞLEMLERİ BAŞKA BİR DOSYAYA ALDIK, ÇAĞIRALIM

require_once "connection.php";

// veritabanındaki "students" tablosundan tüm öğrencilerin tüm verilerini sorgulayacağım
$query = mysql_query("SELECT * FROM students");


while ( $student = mysql_fetch_array($query, MYSQL_ASSOC) ): ?>
	<a href="student.php?id=<?=$student['id']?>"><?=$student['name']?> <?=$student['surname']?></a><br>
<?php endwhile;

// bir döngü ile gelen her bir öğrenciyi ekrana basacağım











?>