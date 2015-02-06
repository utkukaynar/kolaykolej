
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Görüşme
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <form role="form" class="form-horizontal" method="post" action="<?=$this->_action?>" autocomplete="off">
          <input type="hidden" name="submit" value="true">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="parent_id"> Veli </label>
            <div class="col-sm-3">
              <select name="parent_id" id="parent_id" class="form-control input-sm" required="required">
                <option value="">Seçiniz</option>
                <?php foreach ($parents as $row) { ?>
                <option value="<?=$row->id;?>" <?php if ( !empty($parent_id) && $parent_id == $row->id ) echo 'selected'; ?>><?=$row->first_name;?> <?=$row->last_name;?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="communication_id"> İletişim Kanalı </label>
            <div class="col-sm-3">
              <select name="communication_id" id="communication_id" class="form-control input-sm" required="required">
                <option value="">Seçiniz</option>
                <?php foreach ($communications as $row) { ?>
                <option value="<?=$row->id;?>" <?php if ( isset($meeting->communication_id) && $meeting->communication_id == $row->id ) echo 'selected'; ?>><?=$row->name;?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="subject"> Konu </label>
            <div class="col-sm-9">
              <input type="text" name="subject" id="subject" class="form-control input-sm" value="<?php if (isset($meeting->subject)) echo $meeting->subject; ?>" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="content"> İçerik </label>
            <div class="col-sm-9">
              <textarea name="content" id="content" class="ckeditor form-control" cols="10" rows="10"><?php if (isset($meeting->content)) echo $meeting->content; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="date"> Tarih </label>
            <div class="col-sm-3">
              <div class="input-group">
                <input type="text" name="date" id="date" class="form-control input-mask-date input-sm" value="<?php if (isset($meeting->date)) echo $meeting->date; else echo $date; ?>" required="required">
                <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span></div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <input type="submit" value="Kaydet" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
