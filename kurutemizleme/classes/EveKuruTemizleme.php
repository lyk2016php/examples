<?php

class EveKuruTemizleme extends KuruTemizleme{

	private $evdenAlinsinMi;
	private $eveBirakilsinMi;

	public function __construct($evdenAlinsinMi=true, $eveBirakilsinMi=true){
		// önce miras aldığımız sınıfın __construct metodu çalışsın
		parent::__construct();
		
		$this->evdenAlinsinMi = $evdenAlinsinMi;
		$this->eveBirakilsinMi = $eveBirakilsinMi;
	}

	public function setCamasir($gelenCamasir){
		$this->camasir = $gelenCamasir;
		echo $this->camasir . " evden alındı<br>";
	}

	public function __destruct(){
		if($this->eveBirakilsinMi) echo "Çamaşırlarınız eve bırakıldı<br>";

		parent::__destruct();
	}
}