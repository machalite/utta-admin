<!-- displays footer and loads javascript  -->

<!-- FOOTER CONTENT -->
	<footer>
		<div class="pull-right">
			<?php echo $footerText;?>
		</div>
		<!-- JS -->
		<!-- jQuery -->
		  <script src="js/jquery.min.js"></script>
			<!-- Snackbar -->
		  <script src="js/snackbar.js"></script>
		  <!-- Bootstrap -->
		  <script src="js/bootstrap.min.js"></script>
		  <!-- FastClick -->
		  <script src="js/fastclick.js"></script>
		  <!-- NProgress -->
		  <script src="js/nprogress.js"></script>
			<!-- Timepicker -->
			<script src="js/bootstrap-timepicker.js"></script>
		  <!-- Datatables -->
		  <script src="js/jquery.dataTables.min.js"></script>
		  <script src="js/dataTables.bootstrap.min.js"></script>
		  <script src="js/buttons.bootstrap.min.js"></script>
		  <script src="js/buttons.flash.min.js"></script>
		  <script src="js/buttons.html5.min.js"></script>
		  <script src="js/buttons.print.min.js"></script>
		  <script src="js/dataTables.fixedHeader.min.js"></script>
		  <script src="js/dataTables.keyTable.min.js"></script>
		  <script src="js/dataTables.responsive.min.js"></script>
		  <script src="js/responsive.bootstrap.js"></script>
		  <script src="js/datatables.scroller.min.js"></script>
		  <script src="js/jszip.min.js"></script>
		  <script src="js/vfs_fonts.js"></script>

			<!-- Datatables -->
		  <script>
		    $(document).ready(function() {
		      var handleDataTableButtons = function() {
		        if ($("#datatable-buttons").length) {
		          $("#datatable-buttons").DataTable({
		            dom: "Bfrtip",
		            responsive: true
		          });
		        }
		      };

		      TableManageButtons = function() {
		        "use strict";
		        return {
		          init: function() {
		            handleDataTableButtons();
		          }
		        };
		      }();

		      $('#datatable').dataTable();
		      $('#datatable-keytable').DataTable({
		        keys: true
		      });

		      $('#datatable-responsive').DataTable();

		      $('#datatable-scroller').DataTable({
		        ajax: "js/datatables/json/scroller-demo.json",
		        deferRender: true,
		        scrollY: 380,
		        scrollCollapse: true,
		        scroller: true
		      });

		      var table = $('#datatable-fixed-header').DataTable({
		        fixedHeader: true
		      });

		      TableManageButtons.init();
		    });
		  </script>
		  <!-- /Datatables -->

			<!-- checkbox activate/deactivate -->
			<script>
				function actDeact(mod, id, name, active)
				{
					var vmod=mod+"_func.php?&ops=4";
					var vid="&id="+id;
					var vname="&name="+name;
					var vactive="&active="+active;
					var link=vmod.concat(vid,vname,vactive);
					location.href=link;
					// $.get(link);
				}
			</script>
			<!-- /checkbox activate/deactivate -->

		  <!-- Custom Theme Scripts -->
		  <script src="js/custom.min.js"></script>
		<!-- END OF JS -->
		</body>
		<div class="clearfix"></div>
	</footer>
	<!-- END OF FOOTER CONTENT -->
</html>
