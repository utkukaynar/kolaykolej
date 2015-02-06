
<div class="row">
  <div class="col-md-12">
    <p align="right"><a class="btn btn-primary" href="<?=URL?>student/addstudent"><i class="fa fa-plus"></i> Öğrenci Ekle</a></p>
    <!-- start: DYNAMIC TABLE PANEL -->
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Tüm Öğrenciler
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <table class="table table-striped table-bordered table-hover table-full-width" id="datatable">
          <thead>
            <tr>
              <th width="100">id</th>
              <th>Adı</th>
              <th>Soyadı</th>
              <th>Sınıf</th>
              <th class="hidden-xs">Email</th>
              <th class="hidden-xs">Telefon</th>
              <th class="no-sort" width="100"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($students as $student) { ?>
            <tr>
              <td><?=$student->id;?></td>
              <td><?=$student->first_name;?></td>
              <td><?=$student->last_name;?></td>
              <td><?=$student->classroom;?></td>
              <td class="hidden-xs"><?=$student->email;?></td>
              <td class="hidden-xs"><?=$student->phone;?></td>
              <td align="center"><a href="<?=URL?>student/updatestudent/<?=$student->id;?>" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Düzenle"><i class="fa fa-edit"></i></a> <a href="<?=URL?>student/deletestudent/<?=$student->id;?>" class="btn btn-xs btn-bricky tooltips" data-placement="top" data-original-title="Sil"><i class="fa fa-times fa fa-white"></i></a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL --> 
  </div>
</div>
