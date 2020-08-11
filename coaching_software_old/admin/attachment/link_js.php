<script src="<?php echo $coaching_software_path; ?>assests/js/jquery.min.js"></script>
<script src="<?php echo $coaching_software_path; ?>assests/js/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?php echo $coaching_software_path; ?>assests/js/bootstrap.min.js"></script>
<script src="<?php echo $coaching_software_path; ?>assests/js/raphael.min.js"></script>
<script src="<?php echo $coaching_software_path; ?>assests/js/morris.min.js"></script>
<script src="<?php echo $coaching_software_path; ?>assests/js/jquery.sparkline.min.js"></script>
<script src="<?php echo $coaching_software_path; ?>assests/js/jquery.knob.min.js"></script>
<!-- daterangepicker -->


<!-- DataTables -->
<script src="<?php echo $coaching_software_path; ?>assests/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $coaching_software_path; ?>assests/js/dataTables.bootstrap.min.js"></script>
<!-- datepicker -->
<script src="<?php echo $coaching_software_path; ?>assests/js/bootstrap-datepicker.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo $coaching_software_path; ?>assests/js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $coaching_software_path; ?>assests/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $coaching_software_path; ?>assests/js/adminlte.min.js"></script>

<script src="<?php echo $coaching_software_path; ?>assests/js/demo.js"></script>
<script src="<?php echo $coaching_software_path; ?>assests/js/select2.full.min.js"></script>

<script>
$.extend( true, $.fn.dataTable.defaults, {
  'scrollY':'60vh',
    "pageLength": 50,
     "scrollX": true,
     "autoWidth": false
} );
</script>
<script type="text/javascript">
var timeSinceLastMove = 0;
$(document).mousemove(function() {
timeSinceLastMove = 0;
});
$(document).keyup(function() {
timeSinceLastMove = 0;
});
checkTime();
function checkTime() {
timeSinceLastMove++;
if (timeSinceLastMove > 1 * 60) {
get_content('attachment/logout');
session_destroy();
}
setTimeout(checkTime, 10000);
}
</script>
