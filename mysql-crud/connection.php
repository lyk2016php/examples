<?php

// Veritabanı sunucusuna bağlanacağım
$connection = mysql_connect("localhost", "root", "root");

// Veritabanını seçeceğim
mysql_select_db("lyk2016_sis", $connection);

// utf8 karakter seti ile haberleşeceğimi belirteceğim
mysql_set_charset("utf8", $connection);