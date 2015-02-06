
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>
          <?=$student_count->total;?>
        </h3>
        <p> Öğrenci </p>
      </div>
      <div class="icon"> <i class="clip-user"></i> </div>
      <a href="<?=URL?>student" class="small-box-footer"> Öğrencileri Göster <i class="fa fa-arrow-circle-right"></i> </a> </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3>
          <?=$teacher_count->total;?>
        </h3>
        <p> Öğretmen </p>
      </div>
      <div class="icon"> <i class="clip-user-5"></i> </div>
      <a href="<?=URL?>teacher" class="small-box-footer"> Öğretmenleri Göster <i class="fa fa-arrow-circle-right"></i> </a> </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>
          <?=$parent_count->total;?>
        </h3>
        <p> Veli </p>
      </div>
      <div class="icon"> <i class="clip-users-2"></i> </div>
      <a href="<?=URL?>parents" class="small-box-footer"> Velileri Göster <i class="fa fa-arrow-circle-right"></i> </a> </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3>
          <?=$classroom_count->total;?>
        </h3>
        <p> Sınıf </p>
      </div>
      <div class="icon"> <i class="clip-study"></i> </div>
      <a href="<?=URL?>classroom" class="small-box-footer"> Sınıfları Göster <i class="fa fa-arrow-circle-right"></i> </a> </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-blue">
      <div class="inner">
        <h3>
          <?=$subject_count->total;?>
        </h3>
        <p> Ders </p>
      </div>
      <div class="icon"> <i class="clip-book"></i> </div>
      <a href="<?=URL?>subject" class="small-box-footer"> Dersleri Göster <i class="fa fa-arrow-circle-right"></i> </a> </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-purple">
      <div class="inner">
        <h3>
          <?=$exam_count->total;?>
        </h3>
        <p> Sınav </p>
      </div>
      <div class="icon"> <i class="clip-stack-2"></i> </div>
      <a href="<?=URL?>exam" class="small-box-footer"> Sınavları Göster <i class="fa fa-arrow-circle-right"></i> </a> </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-teal">
      <div class="inner">
        <h3>
          <?=$meeting_count->total;?>
        </h3>
        <p> Görüşme </p>
      </div>
      <div class="icon"> <i class="clip-bubbles-2"></i> </div>
      <a href="<?=URL?>meeting" class="small-box-footer"> Görüşmeleri Göster <i class="fa fa-arrow-circle-right"></i> </a> </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-maroon">
      <div class="inner">
        <h3>
          <?=$notice_count->total;?>
        </h3>
        <p> Duyuru </p>
      </div>
      <div class="icon"> <i class="clip-bubble-3"></i> </div>
      <a href="<?=URL?>notice" class="small-box-footer"> Duyuruları Göster <i class="fa fa-arrow-circle-right"></i> </a> </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Son Duyurular
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Konu</th>
              <th class="hidden-xs">Açıklama</th>
              <th class="no-sort" width="50"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($notices as $notice) { ?>
            <tr>
              <td><?=$notice->name;?></td>
              <td class="hidden-xs"><?=$notice->description;?></td>
              <td align="center"><a href="<?=URL?>notice/updatenotice/<?=$notice->id;?>" class="btn btn-xs btn-primary tooltips" data-placement="top" data-original-title="Görüntüle"><i class="fa fa-search"></i></a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Son Görüşmeler
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Adı Soyadı</th>
              <th class="hidden-xs">Konu</th>
              <th class="no-sort" width="50"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($meetings as $meeting) { ?>
            <tr>
              <td><?=$meeting->first_name;?> <?=$meeting->last_name;?></td>
              <td class="hidden-xs"><?=$meeting->subject;?></td>
              <td align="center"><a href="<?=URL?>meeting/updatemeeting/<?=$meeting->id;?>" class="btn btn-xs btn-primary tooltips" data-placement="top" data-original-title="Görüntüle"><i class="fa fa-search"></i></a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
