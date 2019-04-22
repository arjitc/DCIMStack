<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/js/bootstrap-select.js"></script>

<script type="text/javascript">
    $('[data-toggle="ajaxModal"]').on('click',
      function(e) {
        $('#ajaxModal').remove();
        e.preventDefault();
        var $this = $(this)
        , $remote = $this.data('remote') || $this.attr('href')
        , $modal = $('<div class="modal" id="ajaxModal"><div class="modal-body"></div></div>');
        $('body').append($modal);
        $modal.modal({backdrop: 'static', keyboard: false});
        $modal.load($remote);
    }
    );
</script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#search_table').DataTable();
} );
</script>
<script type="text/javascript">
  new Clipboard('.copy2clipboard');
</script>
<script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
  })
</script>
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
      $('#tabs').tab();
  });
</script>