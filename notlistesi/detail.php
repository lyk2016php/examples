<?php
require_once "init.php";
girisYapmadiysaGiriseYonlendir();

if(!isset($_GET['exam'])) die("Hangi sınav?");
if(!isset($sinavlar[$_GET['exam']])) die("Sen de sınav mısın?");

$sinav = $sinavlar[$_GET['exam']];
$notlar = $sinavlar[$_GET['exam']]['results'];

if(isset($_GET['sort']) && in_array($_GET['sort'], ['ksort', 'krsort', 'asort', 'arsort'])) $_GET['sort']($notlar);

$enYuksekNot = max($notlar);
$enDusukNot = min($notlar);
$notOrtalaması = array_sum($notlar)/count($notlar);

// notlar dizindeki her bir elemanı (yani notu) değeri ve harf karşılığıyla ekrana basalım
require "header.php";
?>
<? if(isset($_GET['add'])): ?>
	<div class="alert alert-success" role="alert">Tebrikler! <strong><?=$sinav['title']?></strong> sonuçları başarıyla eklendi.</div>
<? endif; ?>
<div class="col-md-8">
	<h1><?=$_GET['exam']?> Sınav Sonuçları</h1>
	<table class="table table-striped table-hover">
		<tr>
			<th>
				Öğrenci
				<div class="btn-group" role="group">
					<a href="?exam=<?=$_GET['exam']?>&sort=ksort" class="btn btn-default <? if($_GET['sort']=="ksort") echo "btn-primary" ?>"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
					<a href="?exam=<?=$_GET['exam']?>&sort=krsort" class="btn btn-default <? if($_GET['sort']=="krsort") echo "btn-primary" ?>"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
				</div>
			</th>
			<th>
				Not
				<div class="btn-group" role="group">
					<a href="?exam=<?=$_GET['exam']?>&sort=asort" class="btn btn-default <? if($_GET['sort']=="asort") echo "btn-primary" ?>"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></a>
					<a href="?exam=<?=$_GET['exam']?>&sort=arsort" class="btn btn-default <? if($_GET['sort']=="arsort") echo "btn-primary" ?>"><i class="fa fa-sort-numeric-desc" aria-hidden="true"></i></a>
				</div>
			</th>
			<th>Harf Karşılığı</th>
		</tr>
		<?php foreach ($notlar as $kisi => $not): ?>
			<tr class="<?if($not===$enYuksekNot) echo "success"?> <?if($not===$enDusukNot) echo "danger"?>">
				<td><?=$kisi?></td>
				<td><?=$not?></td>
				<td><?=notunHarfKarsiligi($not)?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<div class="col-md-4">
	<h1>Kimi İstatistikler</h1><hr>
	Katılımcı Sayısı: <?=count($notlar)?><hr>
	En Yüksek Not: <?=$enYuksekNot?><hr>
	En Düşük Not: <?=$enDusukNot?><hr>
	Not Ortalaması: <?=number_format($notOrtalaması, 2, ",", ".")?>
</div>