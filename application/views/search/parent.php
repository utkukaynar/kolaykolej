<div class="row">
  <div class="col-sm-5 col-md-4">
    <div class="user-left">
      <div class="center">
        <h4><?=$parent->first_name;?> <?=$parent->last_name;?></h4>
        <div class="user-image">
          <div class="thumbnail">
            <?php if (isset($image)) { ?><img src="<?=$image?>" style="max-width:200px"><?php } ?>
          </div>
        </div>
      </div>
      <table class="table table-condensed">
        <thead>
          <tr>
            <th colspan="2">Kişisel Bilgiler</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td width="100">Adı</td>
            <td><?=$parent->first_name;?></td>
          </tr>
          <tr>
            <td>Soyadı</td>
            <td><?=$parent->last_name;?></td>
          </tr>
          <tr>
            <td>Doğum Tarihi</td>
            <td><?=$parent->birthday;?></td>
          </tr>
          <tr>
            <td>Cinsiyet</td>
            <td><?php echo $gender[$parent->gender_id]; ?></td>
          </tr>
        </tbody>
      </table>
      <table class="table table-condensed">
        <thead>
          <tr>
            <th colspan="2">İletişim Bilgileri</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td width="100">Email</td>
            <td><a href="mailto:<?=$parent->email;?>"><?=$parent->email;?></a></td>
          </tr>
          <tr>
            <td>Adres</td>
            <td><?=$parent->address;?></td>
          </tr>
          <tr>
            <td>Telefon</td>
            <td><?=$parent->phone;?></td>
          </tr>
        </tbody>
      </table>
      <table class="table table-condensed">
        <thead>
          <tr>
            <th>Öğrenciler</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($students as $student) { ?>
          <tr>
            <td><?=$student->first_name;?> <?=$student->last_name;?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-sm-7 col-md-8">
    <table class="table table-striped table-bordered table-hover table-full-width" id="datatable">
      <thead>
        <tr>
          <th width="100">id</th>
          <th class="hidden-xs">Konu</th>
          <th>Tarih</th>
          <th class="no-sort" width="100"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($meetings as $meeting) { ?>
        <tr>
          <td><?=$meeting->id;?></td>
          <td class="hidden-xs"><?=$meeting->subject;?></td>
          <td><?=$meeting->date;?></td>
          <td align="center"><a href="<?=URL?>meeting/updatemeeting/<?=$meeting->id;?>" class="btn btn-xs btn-primary tooltips" data-placement="top" data-original-title="Görüntüle"><i class="fa fa-search"></i></a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
