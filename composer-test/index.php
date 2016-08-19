<?php

// composer'dan bahsetmek ve örnek bir işlem yapabilmek için açılan proje

// her şeyden önce ihtiyaç duyduğumuz paketi packagist.org adresinden bulup ismine erişiyoruz

// ihtiyaç duyduğumuz paketleri belirtmek adına bir composer.json dosyası oluşturuyoruz

// konsolda bulunduğumuz dizindeyken "curl -sS https://getcomposer.org/installer | php" komutu ile proje dosyamıza composer.phar programını indiriyoruz, bunu php ile çalıştırabiliriz (gerekirse global olarak da kurabiliriz)

//	composer.phar proje dizinimize indikten sonra konsolda yine proje dizinindeyken "php composer.phar install" diyoruz, eğer "composer" globale kurulduysa direkt "composer install" da diyebiliriz

// composer bağımlılıkları indirip "vendor" klasörü içinde barındırıyor, buna dair bilgileri tam olarak hangi sürümü tuttuğu vs gibi composer.lock içine yazıyor ve bizim için otomatik yükleme dosyalarını da oluşturuyor

//	yapmamız gereken tek şey tek bir otomatik yükleme dosyasını kendi kodumuzun içine çağırmak oluyor

require_once "vendor/autoload.php";

//	vendor/autoload.php dosyası koda çağırıldıktan sonra composer üzerinden projeye dahil ettiğimiz sınıflara erişebilir hale geliyoruz

echo HelloWorld\Say::hello();

echo "<hr>";

echo Carbon\Carbon::createFromDate(1993, 4, 13)->age;



