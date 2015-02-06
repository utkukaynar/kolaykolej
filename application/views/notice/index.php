
<div class="row">
  <div class="col-md-12">
    <p align="right"><a class="btn btn-primary" href="<?=URL?>notice/addnotice"><i class="fa fa-plus"></i> Duyuru Ekle</a></p>
    <!-- start: DYNAMIC TABLE PANEL -->
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Tüm Duyurular
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <table class="table table-striped table-bordered table-hover table-full-width" id="datatable">
          <thead>
            <tr>
              <th width="100">id</th>
              <th>Konu</th>
              <th class="hidden-xs">Açıklama</th>
              <th class="no-sort" width="100"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($notices as $notice) { ?>
            <tr>
              <td><?=$notice->id;?></td>
              <td><?=$notice->name;?></td>
              <td class="hidden-xs"><?=$notice->description;?></td>
              <td align="center"><a href="<?=URL?>notice/updatenotice/<?=$notice->id;?>" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Düzenle"><i class="fa fa-edit"></i></a> <a href="<?=URL?>notice/deletenotice/<?=$notice->id;?>" class="btn btn-xs btn-bricky tooltips" data-placement="top" data-original-title="Sil"><i class="fa fa-times fa fa-white"></i></a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL --> 
  </div>
</div>
