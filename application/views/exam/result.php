
<?php if(isset($message)) { ?>
<div class="alert alert-success">
  <button data-dismiss="alert" class="close"> &times; </button>
  <i class="fa fa-check-circle"></i> <strong>Başarılı!</strong>
  <?=$message?>
</div>
<?php } ?>

<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Sonuçlar
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <form role="form" class="form-horizontal" method="post" action="<?=$this->_action?>" autocomplete="off">
          <input type="hidden" name="submit" value="true">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Sınav</th>
                <th>Sınıf</th>
                <th>Ders</th>
                <th width="100"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><select name="exam_id" class="form-control input-sm" required="required">
                    <option value="">Seçiniz</option>
                    <?php foreach ($exams as $row) { ?>
                    <option value="<?=$row->id;?>" <?php if ( isset($exam_id) && $exam_id == $row->id ) echo 'selected'; ?>><?=$row->name;?></option>
                    <?php } ?>
                  </select></td>
                <td><select name="classroom_id" class="form-control input-sm" required="required">
                    <option value="">Seçiniz</option>
                    <?php foreach ($classrooms as $row) { ?>
                    <option value="<?=$row->id;?>" <?php if ( isset($classroom_id) && $classroom_id == $row->id ) echo 'selected'; ?>><?=$row->name;?></option>
                    <?php } ?>
                  </select></td>
                <td><select name="subject_id" class="form-control input-sm" required="required">
                    <option value="">Seçiniz</option>
                    <?php foreach ($subjects as $row) { ?>
                    <option value="<?=$row->id;?>" <?php if ( isset($subject_id) && $subject_id == $row->id ) echo 'selected'; ?>><?=$row->name;?></option>
                    <?php } ?>
                  </select></td>
                <td align="right"><input type="submit" value="Gönder" class="btn btn-primary"></td>
              </tr>
            </tbody>
          </table>
        </form>
        <?php if (isset($results)) { ?>
        <hr>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>id</th>
              <th>Öğrenci</th>
              <th>Not</th>
              <th>Yorum</th>
              <th width="100"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($results as $row) { ?>
            <tr>
              <form role="form" method="post" action="<?=$this->_action?>" autocomplete="off">
                <input type="hidden" name="exam_id" value="<?=$exam_id;?>">
                <input type="hidden" name="classroom_id" value="<?=$classroom_id;?>">
                <input type="hidden" name="subject_id" value="<?=$subject_id;?>">
                <input type="hidden" name="student_id" value="<?=$row->student_id;?>">
                <input type="hidden" name="update" value="true">
                <input type="hidden" name="submit" value="true">
                <td><?=$row->student_id;?></td>
                <td><?=$row->first_name;?>
                  <?=$row->last_name;?></td>
                <td><input type="text" name="result" class="form-control input-sm" value="<?=$row->result;?>"></td>
                <td><input type="text" name="comment" class="form-control input-sm" value="<?=$row->comment;?>"></td>
                <td align="right"><input type="submit" value="Güncelle" class="btn btn-sm btn-green"></td>
              </form>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
