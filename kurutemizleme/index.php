<meta charset="utf-8">
<?php

function __autoload($className){
	echo $className. " sınıfı tanımlanmamış, otomatik yüklemeye geçildi<br>";
	require_once "classes/".$className.".php";
}

$kt = new EveKuruTemizleme;
$kt->setCamasir("Gömlek");
$kt->yika();
?>