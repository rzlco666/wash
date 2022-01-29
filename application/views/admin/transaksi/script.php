<script type="text/javascript">
    $(document).ready(function() {
        //show_pemilik(); //call function show all pemilik

        $('#mydata').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            bDestroy: true,
            responsive: true,
        });

    });
</script>