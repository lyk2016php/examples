<?php

/** Ana para ve vade girildiğinde faiz hesaplaması yapacak, ana parayı, vadeyi, faiz oranını, geri ödenecek toplam tutarı ve her ay geri ödenecek miktarı gösteren bir hesaplayıcıya ihtiyacımız var

Vade seçenekleri: 6, 12, 24, 36

Her vade seçeneğinin kendine ait bir faiz oranı var
*/
$vadeler = array(
	6	=>	0.1,
	12	=>	0.2,
	24	=>	0.3,
	36	=>	0.4
	);
$hesaplandiMi = false;
$hata = null;

// form için vadeyi tanımlayalım, patlamasın
$vade = 0;

// eğer GET üzerinden anapara ve vade geldiyse işlemleri başlat
if(isset($_GET['anapara']) && isset($_GET['vade'])):
// ana parayı ve vadeyi al
$anaPara = $_GET['anapara'];
$vade = $_GET['vade'];

// vade, hizmet verdiğimiz vade oranlarindan mi kontrol et
if(isset($vadeler[$vade])):

// vadeye göre faiz oranını belirle
$faizOrani = $vadeler[$vade];
// ana para ile faiz oranını çarp (bu sana faizi verecek)
$faiz = $anaPara * $faizOrani;
// faiz ile ana parayı topla (bu sana geri ödenecek toplam tutarı verecek)
$geriOdenecekToplamTutar = $anaPara + $faiz;
// geri ödenecek toplam tutarı, vadeye böl (bu sana her ay geri ödenecek tutarı verecek)
$aylikTaksit = $geriOdenecekToplamTutar / $vade;
$hesaplandiMi = true;
else:
$hata = "Böyle bir vade seçeneği bulunmamakta.";
endif;
endif;

// tutarların metin çıktısı için fonksiyon
function tutarinMetinHali($tutar, $paraBirimi = "TL"){
	return number_format($tutar, 2, ",", "."). " " . $paraBirimi;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Faiz Hesapla</title>
	<style type="text/css">
		.container{
			width: 500px;
			margin: 30px auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Faiz Hesapla</h1>
		<form method="get">
			<input type="number" name="anapara" placeholder="Ana Parayı Girin" value="<? if(isset($_GET['anapara'])) echo $_GET['anapara']; ?>">
			<select name="vade">
				<? foreach($vadeler as $dongudekiVade => $dongudekiVadeninFaizOrani): ?>
				<option value="<?=$dongudekiVade?>" <? if($dongudekiVade==$vade) echo 'selected="selected"' ?>><?=$dongudekiVade?> Ay (<?=$dongudekiVadeninFaizOrani?> Faiz)</option>
				<? endforeach; ?>
			</select>
			<button type="submit">Faiz Hesapla</button>
		</form>
		<? if(! is_null($hata)): ?>
		<p><strong><?=$hata?></strong></p>
		<? endif; ?>
		<? if($hesaplandiMi): ?>
		<h2>Sonuçlar</h2>
		<table border="2" cellpadding="10" cellspacing="5">
			<tr>
				<th>Ana Para</th>
				<td><?=tutarinMetinHali($anaPara)?></td>
			</tr>
			<tr>
				<th>Faiz</th>
				<td><?=tutarinMetinHali($faiz)?></td>
			</tr>
			<tr>
				<th>Geri Ödenecek Toplam</th>
				<td><?=tutarinMetinHali($geriOdenecekToplamTutar)?></td>
			</tr>
			<tr>
				<th>Vade<br>(Faiz Orani)</th>
				<td><?=$vade?> Ay<br>(% <?=$faizOrani*100?>)</td>
			</tr>
			<tr>
				<th>Aylık Taksit</th>
				<td><strong><?=tutarinMetinHali($aylikTaksit)?></strong></td>
			</tr>
		</table>
		<? endif; ?>
	</div>
</body>
</html>