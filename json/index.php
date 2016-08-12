<meta charset="utf-8">
<?php

$ogrenciler = array(
	"Alp İçer" => 100, 
	"Ahmet Ekti" => 95, 
	"Burçak Sözen" => 85
	);
echo "<pre>";
var_dump($ogrenciler);

echo "<hr>";

$jsonEncoded= json_encode($ogrenciler);
echo "<pre>";
var_dump($jsonEncoded);