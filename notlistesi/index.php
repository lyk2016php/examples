<?php require "header.php" ?>

<div class="list-group">

	<? foreach ($sinavlar as $sinavKodu => $sinavBilgisi): ?>
		<a href="detail.php?exam=<?=$sinavKodu?>" class="list-group-item"><?=$sinavKodu?> - <?=$sinavBilgisi['title']?> - <?=count($sinavBilgisi['results'])?></a>
	<? endforeach; ?>

</div>

<?php require "footer.php" ?>