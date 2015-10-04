<?php
include 'libraries/general.php';
$id = $_GET['id'];
check_if_rack_exists($id);
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit <?php echo get_rack_name($id); ?></h4>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
            <a href="#" class="btn btn-primary">Button</a>
            <a href="#" class="btn btn-primary">Another button...</a>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->