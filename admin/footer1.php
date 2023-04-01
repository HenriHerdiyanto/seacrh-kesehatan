</div>
</main>

<script src="../assets/js/bootstrap.bundle.js"></script>
<script src="../assets/js/jquery-3.5.1.js"></script>
 <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function() {
    var table = $('#datatabel').DataTable( {
        lengthChange: false,
        buttons: [
          {
            extend: 'copy',footer: true,exportOptions: {columns: ':visible'}
          },
          {
            extend: 'excel',footer: true,exportOptions: {columns: ':visible'}
          },
          {
            extend: 'pdf',footer: true,exportOptions: {columns: ':visible'}
          },
          //{
            //extend:'colvis'
          //}
        ]
    } );
 
    table.buttons().container()
        .appendTo( '#datatabel_wrapper .col-md-6:eq(0)' );
    });
  </script>
</body>
</html>