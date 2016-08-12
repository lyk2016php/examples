<?php
$jsonDosyasi = fopen("data.json", "r");
$sinavlarJson = fread($jsonDosyasi, filesize("data.json"));
fclose($jsonDosyasi);

$sinavlar = json_decode($sinavlarJson, true);

/*
$sinavlar = array(
	"MAT1" => array(
		"code" => "MAT1",
		"title" => "Matematik Birinci Sınavı",
		"results" => array(
			"Uğur ARICI" => 100,
			"Ebru ÇİÇEKLİ" => 45,
			"Hakan YILDIZ" => 12,
			"Merve SAKOĞLU" => 56,
			"Şeyma Nur KARAYAĞLI" => 45,
			"Rabia ASLAN" => 13,),
		),
	"TRK1" => array(
		"code" => "TRK1",
		"title" => "Türkçe Birinci Sınavı",
		"results" => array(
			"Cansu DOĞAN" => 100,
			"Sedanur DOĞAN" => 85,
			"Nihat DOĞAN" => 12,),
		),
	);
*/