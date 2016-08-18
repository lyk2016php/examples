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
	$deleteQuery = $connection->prepare("DELETE FROM students WHERE id = ?");
	$isDeleted = $deleteQuery->execute([$idToDelete]);
}
header("Location: index.php");