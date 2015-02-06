
<div class="row btnset">
  <div class="col-md-6">
    <form role="form" class="form-inline" method="post" action="<?=$this->_action?>">
      <input type="hidden" name="submit" value="true">
      <div class="form-group">
        <label class="control-label" for="season_id"> Sezon </label>
        <select name="season_id" id="season_id" class="form-control input-sm">
          <?php foreach ($season as $row) { ?>
          <option value="<?=$row->id;?>" <?php if ( isset($season_id) && $season_id == $row->id ) echo 'selected'; ?>>
          <?=$row->name;?>
          </option>
          <?php } ?>
        </select>
        <input type="submit" value="Seç" class="btn btn-default btn-sm">
      </div>
    </form>
  </div>
  <div class="col-md-6"><span class="pull-right"><a class="btn btn-primary" href="<?=URL?>classroom/addclassroom"><i class="fa fa-plus"></i> Sınıf Ekle</a></span></div>
</div>

<div class="row">
  <div class="col-md-12">
    <!-- start: DYNAMIC TABLE PANEL -->
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Tüm Sınıflar
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <table class="table table-striped table-bordered table-hover table-full-width" id="datatable">
          <thead>
            <tr>
              <th width="100">id</th>
              <th>Adı</th>
              <th class="hidden-xs">Açıklama</th>
              <th class="no-sort" width="100"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($classrooms as $classroom) { ?>
            <tr>
              <td><?=$classroom->id;?></td>
              <td><?=$classroom->name;?></td>
              <td class="hidden-xs"><?=$classroom->description;?></td>
              <td align="center"><a href="<?=URL?>classroom/updateclassroom/<?=$classroom->id;?>" class="btn btn-xs btn-teal tooltips" data-placement="top" data-original-title="Düzenle"><i class="fa fa-edit"></i></a> <a href="<?=URL?>classroom/deleteclassroom/<?=$classroom->id;?>" class="btn btn-xs btn-bricky tooltips" data-placement="top" data-original-title="Sil"><i class="fa fa-times fa fa-white"></i></a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL --> 
  </div>
</div>
