
<script type="text/javascript">
function selectSeason(id){
	if (id != ""){
		loadData(id);
	} else {
		$("#classroom_id").html("<option value=\"\">Seçiniz</option>");
	}
}

function loadData(id){
	var html = '<option value="">Seçiniz</option>';
	
	$.ajax({
		type: "GET",
		url: "<?=URL?>ajax/getclassroom/"+ id,
		data: null,
		cache: false,
		success: function(result){$("#classroom_id").html(html + result);}
	});
}
</script>

<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Öğrenci
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <form role="form" class="form-horizontal" method="post" action="<?=$this->_action?>" autocomplete="off" enctype="multipart/form-data">
          <input type="hidden" name="submit" value="true">
          <div class="form-group">
            <label class="col-sm-2 control-label"> Fotoğraf </label>
            <div class="col-sm-3">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-group">
                  <div class="form-control uneditable-input"> <i class="fa fa-file fileupload-exists"></i> <span class="fileupload-preview"></span> </div>
                  <div class="input-group-btn">
                    <div class="btn btn-light-grey btn-file"> <span class="fileupload-new"><i class="fa fa-folder-open-o"></i> Dosya Seçin</span> <span class="fileupload-exists"><i class="fa fa-folder-open-o"></i> Değiştir</span>
                      <input type="file" name="image[]" class="file-input">
                    </div>
                    <a href="#" class="btn btn-light-grey fileupload-exists" data-dismiss="fileupload"> <i class="fa fa-times"></i> Sil </a> </div>
                </div>
              </div>
            </div>
            <?php if (isset($image)) { ?>
            <div class="col-sm-2"> <a class="btn btn-green" href="#static" data-toggle="modal"><i class="fa 
fa-external-link-square"></i></a> <a class="btn btn-bricky" href="<?=URL?>student/deleteimage/<?=$student->id?>"><i class="fa fa-times"></i></a> </div>
            <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
              <div class="modal-body">
                <p><img src="<?=$image?>" style="width:100%"></p>
              </div>
              <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default"> Tamam </button>
              </div>
            </div>
            <?php } ?>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="student_id"> Öğrenci No </label>
            <div class="col-sm-3">
              <input type="text" name="student_id" id="student_id" class="form-control input-sm" value="<?php if (isset($student->student_id)) echo $student->student_id; ?>" required="required" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="first_name"> Adı </label>
            <div class="col-sm-9">
              <input type="text" name="first_name" id="first_name" class="form-control input-sm" value="<?php if (isset($student->first_name)) echo $student->first_name; ?>" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="last_name"> Soyadı </label>
            <div class="col-sm-9">
              <input type="text" name="last_name" id="last_name" class="form-control input-sm" value="<?php if (isset($student->last_name)) echo $student->last_name; ?>" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="birthday"> Doğum Tarihi </label>
            <div class="col-sm-3">
              <div class="input-group">
                <input type="text" name="birthday" id="birthday" class="form-control input-mask-date input-sm" value="<?php if (isset($student->birthday)) echo $student->birthday; ?>">
                <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span></div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="gender_id"> Cinsiyet </label>
            <div class="col-sm-3">
              <select name="gender_id" id="gender_id" class="form-control input-sm" required="required">
                <option value="">Seçiniz</option>
                <?php foreach ($gender as $row) { ?>
                <option value="<?=$row->id;?>" <?php if ( isset($student->gender_id) && $student->gender_id == $row->id ) echo 'selected'; ?>><?=$row->name;?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="blood_group_id"> Kan Grubu </label>
            <div class="col-sm-3">
              <select name="blood_group_id" id="blood_group_id" class="form-control input-sm" required="required">
                <option value="">Seçiniz</option>
                <?php foreach ($blood_group as $row) { ?>
                <option value="<?=$row->id;?>" <?php if ( isset($student->blood_group_id) && $student->blood_group_id == $row->id ) echo 'selected'; ?>><?=$row->name;?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="email"> Email </label>
            <div class="col-sm-9">
              <input type="email" name="email" id="email" class="form-control input-sm" value="<?php if (isset($student->email)) echo $student->email; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="address"> Adres </label>
            <div class="col-sm-9">
              <input type="text" name="address" id="address" class="form-control input-sm" value="<?php if (isset($student->address)) echo $student->address; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="phone"> Telefon </label>
            <div class="col-sm-9">
              <input type="text" name="phone" id="phone" class="form-control input-sm" value="<?php if (isset($student->phone)) echo $student->phone; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="season_id"> Sezon </label>
            <div class="col-sm-3">
              <select name="season_id" id="season_id" class="form-control input-sm" required="required" onchange="selectSeason(this.options[this.selectedIndex].value)">
                <option value="">Seçiniz</option>
                <?php foreach ($season as $row) { ?>
                <option value="<?=$row->id;?>" <?php if ( isset($student->season_id) && $student->season_id == $row->id ) echo 'selected'; ?>><?=$row->name;?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="classroom_id"> Sınıf </label>
            <div class="col-sm-3">
              <select name="classroom_id" id="classroom_id" class="form-control input-sm" required="required">
                <option value="">Seçiniz</option>
                <?php foreach ($classroom as $row) { ?>
                <option value="<?=$row->id;?>" <?php if ( isset($student->classroom_id) && $student->classroom_id == $row->id ) echo 'selected'; ?>><?=$row->name;?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="parents"> Veliler </label>
            <div class="col-sm-9">
              <select multiple="multiple" name="parents[]" id="parents" class="form-control search-select">
                <?php foreach ($parents as $row) { ?>
                <option value="<?=$row->id;?>" <?php if ( isset($parents_to_student) && in_array($row->id, $parents_to_student) ) echo 'selected'; ?>><?=$row->first_name;?> <?=$row->last_name;?></option>
                <?php } ?>
              </select>
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
