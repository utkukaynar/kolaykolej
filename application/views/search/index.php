
<form class="form-inline" action="<?=$this->_action?>" method="post">
  <div class="input-group well">
    <input type="text" name="key" class="form-control" placeholder="Anahtar Kelime...">
    <span class="input-group-btn">
    <button class="btn btn-primary" type="submit"> <i class="fa fa-search"></i> Ara </button>
    </span>
  </div>
</form>
<?php if (isset($results)) { ?>
<hr>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th width="100">id</th>
      <th>Adı</th>
      <th>Soyadı</th>
      <th class="hidden-xs">Email</th>
      <th class="hidden-xs">Telefon</th>
      <th width="100"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($results as $row) { ?>
    <tr>
      <td><?=$row->id;?></td>
      <td><?=$row->first_name;?></td>
      <td><?=$row->last_name;?></td>
      <td class="hidden-xs"><?=$row->email;?></td>
      <td class="hidden-xs"><?=$row->phone;?></td>
      <td align="center"><a href="<?=URL?>search/getparent/<?=$row->id;?>" class="btn btn-xs btn-primary tooltips" data-placement="top" data-original-title="Görüntüle"><i class="fa fa-search"></i></a> <a href="<?=URL?>meeting/addmeeting/<?=$row->id;?>" class="btn btn-xs btn-yellow tooltips" data-placement="top" data-original-title="Yeni Görüşme"><i class="fa fa-reply"></i></a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php } ?>
