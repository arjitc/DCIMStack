<br>
<div class="row">
  <div class="col">
<div class="card">
  <div class="card-header">
    Disk Information
  </div>
<ul class="list-group list-group-flush">
  <li class="list-group-item">Disk Label: <?php echo $device_label; ?></li>
  <li class="list-group-item">Disk Brand: <?php echo $device_brand; ?></li>
  <li class="list-group-item">Disk Serial: <?php echo $device_serial; ?></li>
  <li class="list-group-item">Disk In-Use: <?php

if ($device_inuse == 1) {
  echo "Yes";
}
else {
  echo "No";
}
?></li>
</ul>
</div>
</div>
</div>
