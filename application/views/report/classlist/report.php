<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Rapor - <?=$this->_title?></title>
<link rel="stylesheet" href="<?=URL?>public/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=URL?>public/css/report.css">
<script src="<?=URL?>public/js/jquery-2.1.1.min.js"></script>
<script src="<?=URL?>public/js/print.js"></script>
<script src="<?=URL?>public/plugins/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6"><strong><?=TITLE?></strong></div>
    <div class="col-md-6"><span class="pull-right"><?php echo date("d/m/Y h:i", time()); ?></span></div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-6"><span class="small"><?=$this->_title?></span></div>
    <div class="col-md-6"><span class="pull-right small"><strong>Sezon:</strong> <?php echo $season[$season_id]; ?> <strong>Sınıf:</strong> <?php echo $classroom[$classroom_id]; ?></span></div>
  </div>
  <div class="row">
    <?php
	foreach ($report as $row) {
		$file = 'public/upload/student/' . $row->id . '.jpg';
		$image = URL . $file;
	?>
    <div class="col-md-3 text-center">
      <p><?php if ( file_exists(ROOT . $file) ) echo "<p><img src=\"$image\" style=\"width:100px\"></p>"; ?></p>
      <p><?=$row->student_id;?><br>
      <?=$row->name;?></p>
    </div>
    <?php
	}
	?>
    <div class="col-md-12" id="button-group">
      <button type="button" class="btn btn-info" id="btnPrint">Yazdır</button>
    </div>
  </div>
</div>
</body>
</html>