
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Duyuru
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <form role="form" class="form-horizontal" method="post" action="<?=$this->_action?>" autocomplete="off">
          <input type="hidden" name="submit" value="true">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="name"> Adı </label>
            <div class="col-sm-9">
              <input type="text" name="name" id="name" class="form-control input-sm" value="<?php if (isset($notice->name)) echo $notice->name; ?>" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="description"> Açıklama </label>
            <div class="col-sm-9">
              <input type="text" name="description" id="description" class="form-control input-sm" value="<?php if (isset($notice->description)) echo $notice->description; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="content"> İçerik </label>
            <div class="col-sm-9">
              <textarea name="content" id="content" class="ckeditor form-control" cols="10" rows="10"><?php if (isset($notice->content)) echo $notice->content; ?></textarea>
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
