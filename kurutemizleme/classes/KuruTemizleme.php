<?php
// Kuru temizleme işi için bir kural kitabına ihtiyacımız var

// Bu kural kitabı ile, kuru temizleme işleminde yapılabilecekler tanımlanır, bunları gerçekleştirirken tutması gereken veriler için alanlar açılır
class KuruTemizleme{
	protected $camasir;

	const deterjan = "OMO";

	// sınıftan bir obje üretildiği anda çalışacak kısım __construct metodu içine yazılır
	// kuruTemizlemeciyle muhattap olduğumuz anda bize hoş geldiniz der
	public function __construct(){
		echo "Kuru Temizlemeciye hoş geldiniz :)))<br>";
	}


	public function __destruct(){
		echo "Güle güle, yine bekleriz<br>";
	}

	public function setCamasir($gelenCamasir){
		if(gettype($gelenCamasir)=="integer") die("Sen de çamaşır mısın?");
		// varsa kontrollerden geçirelim
		$this->camasir = $gelenCamasir;
	}

	public function yika(){
		// yıkama çıktısını verelim
		// aslında dışarıdan yıkma diye talep edilen işlemde, kuru temizlemeci kendi içinde yıkama, kurulama ve ütüleme işlemlerini yapar, bu yüzden bu işlemler için sınıf içinde özel olarak tanımlanmış (dışarıdan erişilemeyen) metodları kullanacağız
		if(!isset($this->camasir)) die("Çamaşır yok, neyi yıkayayım?<br>");
		$this->yikamaIslemi();
		$this->kurulamaIslemi();
		$this->utulemeIslemi();

	}

	private function yikamaIslemi(){
		echo $this->camasir." ".self::deterjan." çamaşırı yıkandı<br>";
	}

	private function kurulamaIslemi(){
		echo $this->camasir. " çamaşırı kurulandı<br>";
	}

	private function utulemeIslemi(){
		echo $this->camasir. " çamaşırı ütülendi<br>";
	}
}