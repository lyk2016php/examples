<meta charset="utf-8">
<?php

// ay ve günü alıp, burç söyleyeceğiz

/*
	Burçların Tarih Aralığı
	Oğlak Burcu : 22 Aralık - 21 Ocak
	Kova Burcu : 22 Ocak - 19 Şubat
	Balık Burcu : 20 Şubat - 20 Mart
	Koç Burcu : 21 Mart - 20 Nisan
	Boğa Burcu : 21 Nisan - 21 Mayıs
	İkizler Burcu : 22 Mayıs - 22 Haziran
	Yengeç Burcu : 23 Haziran - 22 Temmuz
	Aslan Burcu : 23 Temmuz - 22 Ağustos
	Başak Burcu : 23 Ağustos - 22 Eylül
	Terazi Burcu : 23 Eylül - 22 Ekim
	Akrep Burcu : 23 Ekim - 21 Kasım
	Yay Burcu : 22 Kasım - 21 Aralık

	Dizi olarak tutulabilir
*/


/*
	Aylar, 1-12 arası integer
	her ayın en fazla gün sayısını bilmeliyiz

	gunler 1-{ayın gün sayısı} arası integer
*/
/**
*/
$aylar = array(
	array(
		"sira" => 1,
		"ad" => "Ocak",
		"gunSayisi" => 31,
		"kirilmaNoktasi" => 21,
		"oncesi" => "Oğlak",
		"sonrasi" => "Kova",
		),
	array(
		"sira" => 2,
		"ad" => "Şubat",
		"gunSayisi" => 29,
		"kirilmaNoktasi" => 19,
		"oncesi" => "Kova",
		"sonrasi" => "Balık",
		),
	array(
		"sira" => 3,
		"ad" => "Mart",
		"gunSayisi" => 31,
		"kirilmaNoktasi" => 20,
		"oncesi" => "Balık",
		"sonrasi" => "Koç",
		),
	array(
		"sira" => 4,
		"ad" => "Nisan",
		"gunSayisi" => 30,
		"kirilmaNoktasi" => 20,
		"oncesi" => "Koç",
		"sonrasi" => "Boğa",
		),
	array(
		"sira" => 5,
		"ad" => "Mayıs",
		"gunSayisi" => 31,
		"kirilmaNoktasi" => 21,
		"oncesi" => "Boğa",
		"sonrasi" => "İkizler",
		),
	array(
		"sira" => 6,
		"ad" => "Haziran",
		"gunSayisi" => 30,
		"kirilmaNoktasi" => 22,
		"oncesi" => "İkizler",
		"sonrasi" => "Yengeç",
		),
	array(
		"sira" => 7,
		"ad" => "Temmuz",
		"gunSayisi" => 31,
		"kirilmaNoktasi" => 22,
		"oncesi" => "Yengeç",
		"sonrasi" => "Aslan",
		),
	array(
		"sira" => 8,
		"ad" => "Ağustos",
		"gunSayisi" => 31,
		"kirilmaNoktasi" => 22,
		"oncesi" => "Aslan",
		"sonrasi" => "Başak",
		),
	array(
		"sira" => 9,
		"ad" => "Eylül",
		"gunSayisi" => 30,
		"kirilmaNoktasi" => 22,
		"oncesi" => "Başak",
		"sonrasi" => "Terazi",
		),
	array(
		"sira" => 10,
		"ad" => "Ekim",
		"gunSayisi" => 31,
		"kirilmaNoktasi" => 22,
		"oncesi" => "Terazi",
		"sonrasi" => "Akrep",
		),
	array(
		"sira" => 11,
		"ad" => "Kasım",
		"gunSayisi" => 30,
		"kirilmaNoktasi" => 21,
		"oncesi" => "Akrep",
		"sonrasi" => "Yay",
		),
	array(
		"sira" => 12,
		"ad" => "Aralık",
		"gunSayisi" => 31,
		"kirilmaNoktasi" => 21,
		"oncesi" => "Yay",
		"sonrasi" => "Oğlak",
		),
	);

if(isset($_POST['gun']) AND isset($_POST['ay'])):

	$ay = $_POST['ay'];
$gun = $_POST['gun'];

if($gun>$aylar[$ay-1]["gunSayisi"] OR $gun<1) die("Böyle gün olmaz. Sen de gün müsün?");

$ayKismi = "oncesi";
if($gun>$aylar[$ay-1]["kirilmaNoktasi"]) $ayKismi = "sonrasi";

$burc = $aylar[$ay-1][$ayKismi];

endif;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Burcumu Söyle</title>
	<style type="text/css">
		body{
			background-image: url("http://bilgifili.com/wp-content/uploads/2016/07/y%C4%B1ld%C4%B1zlarnedenyan%C4%B1ps%C3%B6ner-1200x750.jpg");
			background-size: cover;
			background-repeat: no-repeat;
			background-color: #212121;
			font-family: "Helvetica", "Arial", sans-serif;
			line-height: 1.6;
		}
		.container{
			text-align: center;
			width: 500px;
			margin: 25px auto;
			background-color: rgba(33, 33, 33, 0.82);
			color: #ececec;
			padding: 30px;
		}
		h1{
			line-height: 1;
		}
		.sonuc{
			padding: 10px;
			background-color: rgba(0, 112, 255, 0.3);
			margin-bottom: 20px;
		}
		.sonuc>.burc{
			font-size: 36px;
			font-weight: bold;
		}
		input{
			font-size: 16;
			width: 50px !important;
		}
		select{
			font-size: 24px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Burcunu Öğren</h1>
		<? if(isset($burc)): ?>
		<div class="sonuc">
			Burcunuz
			<div class="burc"><?=$burc?></div>
		</div>
		<? endif; ?>
		<form method="post">
			<input type="number" name="gun" placeholder="Gün" max="31" min="1">
			<select name="ay">
				<? foreach($aylar as $ay): ?>
				<option value="<?=$ay['sira']?>"><?=$ay['ad']?></option>
				<? endforeach; ?>
			</select>
			<button type="submit">Burcumu Söyle</button>
		</form>
		<h2>Burçlar</h2>
		<p>
			Oğlak Burcu : 22 Aralık - 21 Ocak<br>
			Kova Burcu : 22 Ocak - 19 Şubat<br>
			Balık Burcu : 20 Şubat - 20 Mart<br>
			Koç Burcu : 21 Mart - 20 Nisan<br>
			Boğa Burcu : 21 Nisan - 21 Mayıs<br>
			İkizler Burcu : 22 Mayıs - 22 Haziran<br>
			Yengeç Burcu : 23 Haziran - 22 Temmuz<br>
			Aslan Burcu : 23 Temmuz - 22 Ağustos<br>
			Başak Burcu : 23 Ağustos - 22 Eylül<br>
			Terazi Burcu : 23 Eylül - 22 Ekim<br>
			Akrep Burcu : 23 Ekim - 21 Kasım<br>
			Yay Burcu : 22 Kasım - 21 Aralık<br>
		</p>
	</div>
</body>
</html>











