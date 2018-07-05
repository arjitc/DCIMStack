<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><img src='assets/img/lorry.png'> LibreNMS API Key</h3>
  </div>
  <div class="panel-body">
    <p>Current LibreNMS API Key: <?php echo $librenms_api_key; ?></p>
    <form action="settings_db.php" id="librenms_api_key" method="post">
      <input type="hidden" name="token" value="<?php echo $token; ?>">
      <input type="hidden" name="setting" value="librenms_api_key">
      <input type="text" name="value" placeholder="LibreNMS API Key" class="form-control" required>
    </div>
    <div class="panel-footer">
      <center><input type="submit" form="librenms_api_key" value="Update" class="btn btn-primary"></center>
    </div>
  </form>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><img src='assets/img/lorry.png'> LibreNMS API Endpoint</h3>
  </div>
  <div class="panel-body">
    <p>Example: http://librenms.domain.com/api/v0/devices/</p>
    <p>Current LibreNMS API Endpoint: <?php echo $librenms_api_endpoint; ?></p>
    <form action="settings_db.php" id="librenms_api_endpoint" method="post">
      <input type="hidden" name="token" value="<?php echo $token; ?>">
      <input type="hidden" name="setting" value="librenms_api_endpoint">
      <input type="text" name="value" placeholder="LibreNMS API Endpoint" class="form-control" required>
    </div>
    <div class="panel-footer">
      <center><input type="submit" form="librenms_api_endpoint" value="Update" class="btn btn-primary"></center>
    </div>
  </form>
</div>