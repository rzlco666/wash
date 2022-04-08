<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="<?= base_url('assets_admin/'); ?>vendors/datepicker/daterangepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script type="text/javascript">

	$(document).ready(function() {
		var table = $('#tabelData').DataTable({
			"order": [[ 1, "desc" ]],
			"ordering": true,
			dom: 'Bfrtip',
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			],
		});
		$.fn.dataTable.ext.search.push(
			function(settings, data, dataIndex) {
				var min = $('.date_range_filter').val();
				var max = $('.date_range_filter2').val();
				var createdAt = data[2];  // -> rubah angka 4 sesuai posisi tanggal pada tabelmu, dimulai dari angka 0
				if (
					(min == "" || max == "") ||
					(moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
				) {
					return true;
				}
				return false;
			}
		);
		$('.pickdate').each(function() {
			$(this).daterangepicker({singleDatePicker: true,
				showDropdowns: true,format: 'mm/dd/yyyy'});
		});
		$('.pickdate').change(function() {
			table.draw();
		});
	});
</script>
