
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
      <div class="panel-heading"> <i class="fa fa-external-link-square"></i> Sınıf Listesi
        <div class="panel-tools"> <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a> <a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> </a> <a class="btn btn-xs btn-link panel-refresh" href="#"> <i class="fa fa-refresh"></i> </a> <a class="btn btn-xs btn-link panel-expand" href="#"> <i class="fa fa-resize-full"></i> </a> <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i> </a> </div>
      </div>
      <div class="panel-body">
        <form role="form" class="form-horizontal" method="post" action="<?=$this->_action?>" autocomplete="off" target="_blank">
          <input type="hidden" name="submit" value="true">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="season_id"> Sezon </label>
            <div class="col-sm-3">
              <select name="season_id" id="season_id" class="form-control input-sm" required="required" onchange="selectSeason(this.options[this.selectedIndex].value)">
                <option value="">Seçiniz</option>
                <?php foreach ($season as $row) { ?>
                <option value="<?=$row->id;?>" <?php if ( isset($season_id) && $season_id == $row->id ) echo 'selected'; ?>><?=$row->name;?></option>
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
                <option value="<?=$row->id;?>"><?=$row->name;?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-9 col-sm-offset-2">
              <input type="submit" value="Gönder" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
