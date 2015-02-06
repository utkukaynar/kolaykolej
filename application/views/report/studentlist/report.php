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
    <div class="col-md-6"><span class="pull-right small">Sezon: <?php echo $season[$season_id]; ?></span></div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped table-full-width">
        <thead>
          <tr>
            <th>Öğrenci No</th>
            <th>Adı</th>
            <th>Soyadı</th>
            <th>Doğum Tarihi</th>
            <th>Cinsiyet</th>
            <th class="hidden-xs">Kan Grubu</th>
            <th class="hidden-xs">Email</th>
            <th class="hidden-xs">Adres</th>
            <th class="hidden-xs">Telefon</th>
            <th>Sınıf</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($report as $row) { ?>
          <tr>
            <td><?=$row->student_id;?></td>
            <td><?=$row->first_name;?></td>
            <td><?=$row->last_name;?></td>
            <td><?=$row->birthday;?></td>
            <td><?=$row->gender;?></td>
            <td class="hidden-xs"><?=$row->blood_group;?></td>
            <td class="hidden-xs"><?=$row->email;?></td>
            <td class="hidden-xs"><?=$row->address;?></td>
            <td class="hidden-xs"><?=$row->phone;?></td>
            <td><?=$row->classroom;?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <form role="form" class="form-horizontal" method="post" action="<?=$this->_action?>" id="frmExcel" target="_blank">
      <input type="hidden" name="submit" value="true">
      <input type="hidden" name="title" value="<?=$this->_title?>">
      <input type="hidden" name="fields">
      <input type="hidden" name="data">
      <div class="col-md-12" id="button-group">
        <button type="submit" class="btn btn-primary" id="btnExcel">Excel'e Aktar</button>
        <button type="button" class="btn btn-info" id="btnPrint">Yazdır</button>
      </div>
    </form>
  </div>
</div>
</body>
</html>