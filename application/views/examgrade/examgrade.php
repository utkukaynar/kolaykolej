
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Not
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <form role="form" class="form-horizontal" method="post" action="<?=$this->_action?>" autocomplete="off">
          <input type="hidden" name="submit" value="true">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="name"> Harf Notu </label>
            <div class="col-sm-3">
              <input type="text" name="name" id="name" class="form-control input-sm" value="<?php if (isset($examgrade->name)) echo $examgrade->name; ?>" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="point"> Puan </label>
            <div class="col-sm-3">
              <input type="text" name="point" id="point" class="form-control input-sm" value="<?php if (isset($examgrade->point)) echo $examgrade->point; ?>" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="from"> Alt Limit</label>
            <div class="col-sm-3">
              <input type="text" name="from" id="from" class="form-control input-sm" value="<?php if (isset($examgrade->from)) echo $examgrade->from; ?>" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="upto"> Üst Limit</label>
            <div class="col-sm-3">
              <input type="text" name="upto" id="upto" class="form-control input-sm" value="<?php if (isset($examgrade->upto)) echo $examgrade->upto; ?>" required="required">
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
