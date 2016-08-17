<?php
// ÖĞRENCİ SİLME SAYFASI

/**
	POST ile bu sayfaya gönderilen öğrenci ID'si ile veritabanındaki bu ID'ye sahip satırı silmeliyiz
*/

// BAĞLANTI İŞLEMLERİNİ İÇEREN DOSYAYI ÇAĞIRALIM
require_once "connection.php";

if(isset($_POST['idToDelete'])){
	$idToDelete = (int)$_POST['idToDelete'];
	// DELETE FROM students WHERE id = $idToDelete
	$isDeleted = mysql_query("DELETE FROM students WHERE id = $idToDelete");
}
header("Location: index.php");