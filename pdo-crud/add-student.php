<?php

// ÖĞRENCİ EKLEME SAYFASI

/**
	Sayfa ilk çalıştırıldığı zaman öğrenci ekleme için bilgilerin alındığı form gözükür. Form doldurulup aynı sayfaya POST ile bilgiler gönderildiğinde bilgiler yakalanır, veritabanına eklenir
*/

// BAĞLANTI İŞLEMLERİNİ İÇEREN DOSYAYI ÇAĞIRALIM
require_once "connection.php";

// Post ile veri gelmiş mi bakalım
if($_POST){
	// Post üstünden gelen verileri değişkenlere alalım
	$number = $_POST['number'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$birth_year = $_POST['birth_year'];
	
	// bir ekleme sorgusu içine, bu değişkenlerle veritabanı sunucusuna talepte bulunalım

	// INSERT INTO students ('number', 'name', 'surname', 'birth_year') VALUES ('123', 'Uğur', 'ARICI', '1923')

	$addQuery = $connection->prepare("INSERT INTO students (number, name, surname, birth_year) VALUES (?, ?, ?, ?)");

	$isAdded = $addQuery->execute(array($number, $name, $surname, $birth_year));
	
	if($isAdded){
		header("Location: index.php");
	}else{
		$error = "Eklenemedi.";
	}
}

?>
<meta charset="utf-8">
<? if(isset($error)): ?>
	<?=$error?>
	<hr>
<? endif; ?>
<form method="post">
	<input type="text" name="number" placeholder="Öğrenci Numarası"><br>
	<input type="text" name="name" placeholder="Öğrencinin Adı"><br>
	<input type="text" name="surname" placeholder="Öğrencinin Soyadı"><br>
	<select name="birth_year">
		<? for($i=(int)date('Y'); $i>=1923; $i--): ?>
		<option value="<?=$i?>"><?=$i?></option>
		<? endfor; ?>
	</select><br>
	<button type="submit">Öğrenci Ekle</button>
</form>