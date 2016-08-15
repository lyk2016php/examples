<?php
require_once "init.php";
girisYapmadiysaGiriseYonlendir();

if(isset($_POST['form'])):
	if($_POST['form']=="2"):
		$newExam = array(
			"code" => $_POST['code'],
			"title" => $_POST['title'],
			"results" => array()
			);
	foreach ($_POST['studentName'] as $rowNumber => $studentName) {
		$newExam['results'][$studentName] = $_POST['studentGrade'][$rowNumber];
	}
	$sinavlar[$newExam['code']] = $newExam;
			// sinavlar dizisi güncellendi, json'ı güncelleyelim
	$jsonKaynagi = fopen("data.json", "w");
	$yazildiMi = fwrite($jsonKaynagi, json_encode($sinavlar));
	fclose($jsonKaynagi);
	if($yazildiMi) header("Location: detail.php?exam=".$newExam['code']."&add=success");
	endif;
	endif;
	?>
	<? require "header.php" ?>
	<? if(!isset($_POST['form'])): ?>
	<form class="form-inline" method="post">
		<div class="form-group">
			<label for="inpExamTitle">Sınav Başlığı</label>
			<input name="title" type="text" class="form-control" id="inpExamTitle" placeholder="Türkçe 2016 - 2nci Sınav">
		</div>
		<div class="form-group">
			<label for="inpExamCode">Sınav Kodu</label>
			<input name="code" type="text" class="form-control" id="inpExamCode" placeholder="TRK2016-2">
		</div>
		<div class="form-group">
			<label for="inpStudentCount">Kişi Sayısı</label>
			<input name="studentCount" type="number" class="form-control" id="inpStudentCount" placeholder="10" value="10">
		</div>
		<input type="hidden" name="form" value="1">
		<button type="submit" class="btn btn-default">Listeyi Oluştur</button>
	</form>
<? endif; ?>
<hr>
<? if(isset($_POST['form'])): ?>
<? if($_POST['form']=="1"): ?>
<h1><?=$_POST['code']?> - <?=$_POST['title']?></h1>
<p><strong><?=$_POST['code']?></strong> kodlu, <strong><?=$_POST['title']?></strong> başlıklı sınavın <strong><?=$_POST['studentCount']?></strong> katılımcıyla yapılan sınav sonuçlarını aşağıdaki forma girebilirsiniz. Tamamlayıp en aşağıdaki <strong>Sonuçları Kaydet</strong> butonuna basmadığınız sürece tüm verilerin <strong><em>kaybolacağını</em></strong> unutmayın.</p>
<form method="post">
	<table class="table table-striped table-hover table-border">
		<tr>
			<th>#</th>
			<th>Öğrenci</th>
			<th>Not</th>
		</tr>
		<?php for ($i=1; $i <= $_POST['studentCount']; $i++): ?>
			<tr>
				<td><?=$i?></td>
				<td><input type="text" name="studentName[]" class="form-control"></td>
				<td><input type="number" name="studentGrade[]" class="form-control"></td>
			</tr>
		<? endfor; ?>
		<tr>
			<td colspan="3"><button type="submit" class="btn btn-primary btn-block btn-lg">Sonuçları Kaydet</button></td>
		</tr>
	</table>
	<input type="hidden" name="form" value="2">
	<input type="hidden" name="code" value="<?=$_POST['code']?>">
	<input type="hidden" name="title" value="<?=$_POST['title']?>">
</form>
<? endif; ?>
<? endif; ?>
<?php require "footer.php" ?>