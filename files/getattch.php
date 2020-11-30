<?php session_start(); if (isset($_SESSION['attch'])): ?>
	<?php foreach ($_SESSION['attch'] as $key => $attch): ?>
		<p  style="font-size: 13px" ><i class="fa fa-file"></i> <?= $attch ?> <i class="fa fa-close" id="remove__attch"style="color: red;cursor: pointer;" data-key=<?= $key ?>></i></p>
	<?php endforeach ?>
<?php endif ?>