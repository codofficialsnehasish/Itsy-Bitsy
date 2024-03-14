        <!-- Required datatable js -->
        <script src="<?= base_url('assets/admin/libs/datatables.net/js/jquery.dataTables.min.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
        <!-- Buttons examples -->
        <script src="<?= base_url('assets/admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/jszip/jszip.min.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/pdfmake/build/pdfmake.min.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/pdfmake/build/vfs_fonts.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/datatables.net-buttons/js/buttons.html5.min.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/datatables.net-buttons/js/buttons.print.min.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/datatables.net-buttons/js/buttons.colVis.min.js');?>"></script>
        <!-- Responsive examples -->
        <script src="<?= base_url('assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js');?>"></script>
        <script src="<?= base_url('assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js');?>"></script>

        <!-- Datatable init js -->
        <script src="<?= base_url('assets/admin/js/pages/datatables.init.js');?>"></script> 
        <!-- Sweet Alerts js -->
        <script src="<?= base_url('assets/admin/libs/sweetalert2/sweetalert2.min.js');?>"></script>

        <!-- Sweet alert init js-->
        <script src="<?= base_url('assets/admin/js/pages/sweet-alerts.init.js');?>"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script>
	$(document).ready(function(){
		$("#post_list" ).sortable({
			placeholder : "ui-state-highlight",
			update  : function(event, ui)
			{
				var post_order_ids = new Array();
				$('#post_list li').each(function(){
					post_order_ids.push($(this).data("post-id"));
				});
                $(".alert-success").hide();
				$.ajax({
					url:"<?= admin_url('questions/update-question-order')?>",
					method:"POST",
					data:{post_order_ids:post_order_ids},
					success:function(data)
					{
					 if(data){
						$('#post_list').html(data);
					 	$(".alert-danger").hide();
					 	$(".alert-success").show();
                        $(".alert-success").fadeOut(5000);
					 }else{
					 	$(".alert-success").hide();
					 	$(".alert-danger").show();
					 }
					}
				});
			}
		});
	});
</script>