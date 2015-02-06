
<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Kullanıcı
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <form role="form" class="form-horizontal" method="post" action="<?=$this->_action?>" autocomplete="off" enctype="multipart/form-data">
          <input type="hidden" name="submit" value="true">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="user_group_id"> Kullanıcı Grubu </label>
            <div class="col-sm-3">
              <select name="user_group_id" id="user_group_id" class="form-control input-sm" required="required">
                <option value="">Seçiniz</option>
                <?php foreach ($user_groups as $row) { ?>
                <option value="<?=$row->id;?>" <?php if ( isset($user->user_group_id) && $user->user_group_id == $row->id ) echo 'selected'; ?>><?=$row->name;?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="username"> Kullanıcı Adı </label>
            <div class="col-sm-9">
              <input type="text" name="username" id="username" class="form-control input-sm" value="<?php if (isset($user->username)) echo $user->username; ?>" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="password"> Şifre </label>
            <div class="col-sm-9">
              <input type="text" name="password" id="password" class="form-control input-sm" value="<?php if (isset($user->password)) echo $user->password; ?>" required="required">
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-2 control-label" for="first_name"> Adı </label>
            <div class="col-sm-9">
              <input type="text" name="first_name" id="first_name" class="form-control input-sm" value="<?php if (isset($user->first_name)) echo $user->first_name; ?>" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="last_name"> Soyadı </label>
            <div class="col-sm-9">
              <input type="text" name="last_name" id="last_name" class="form-control input-sm" value="<?php if (isset($user->last_name)) echo $user->last_name; ?>" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="email"> Email </label>
            <div class="col-sm-9">
              <input type="email" name="email" id="email" class="form-control input-sm" value="<?php if (isset($user->email)) echo $user->email; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"> Durum </label>
            <div class="col-sm-9">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="status" value="1" class="flat-green" <?php if (isset($user->status) && $user->status == 1) echo 'checked'; ?>>
                  Aktif</label>
              </div>
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
