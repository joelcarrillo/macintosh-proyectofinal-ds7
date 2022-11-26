  <!-- Required Js -->
  <script src="assets/js/vendor-all.min.js"></script>
  <script src="assets/js/plugins/bootstrap.min.js"></script>
  <script src="assets/js/plugins/feather.min.js"></script>
  <script src="assets/js/pcoded.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
  <script src="assets/js/plugins/clipboard.min.js"></script>
  <script src="assets/js/uikit.min.js"></script>

  <script src="assets/js/plugins/apexcharts.min.js"></script>

    <!-- SweetAlert Js -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
// ********* MODAL PARA CONFIRMACIONES **********

//Creamos la instancia
const modal_valores = window.location.search;
const modal_urlParams = new URLSearchParams(modal_valores);

//Accedemos a los valores
var msg_title = modal_urlParams.get('titulo');
var msg_modal = modal_urlParams.get('msg');
var msg_icon = modal_urlParams.get('icon');

swal(msg_title, msg_modal, msg_icon);
</script>

 <!-- DATATABLES -->
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
  <script src="  https://cdn.datatables.net/rowreorder/1.3.1/js/dataTables.rowReorder.min.js"></script>

