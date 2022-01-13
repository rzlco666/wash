<script>
    $('.image-popup').magnificPopup({
        type: 'image',
        zoom: {
            enabled: true,
            duration: 300,
            easing: 'ease-in-out',
            opener: function(openerElement) {
                return openerElement.is('img') ? openerElement : openerElement.find('img');
            }
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        show_pemilik(); //call function show all pemilik

        $('#mydata').DataTable({
            responsive: true
        });

        //function show all pemilik
        function show_pemilik() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('Admin/pemilik_data') ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        if (data[i].status == 0) {
                            html += '<tr>' +
                                '<td>' + data[i].id + '</td>' +
                                '<td>' + data[i].nama + '</td>' +
                                '<td>' + data[i].email + '</td>' +
                                '<td>' + data[i].hp + '</td>' +
                                '<td>' + data[i].nama_usaha + '</td>' +
                                '<td>' + data[i].alamat_usaha + '</td>' +
                                '<td>' + data[i].date_created + '</td>' +
                                '<td>' +
                                '<a target="_blank" class="image-popup" href="<?= base_url('uploads/pemilik/ktp/'); ?>' + data[i].ktp + '">' +
                                '<img style="width:50px;" src="<?= base_url('uploads/pemilik/ktp/'); ?>' + data[i].ktp + '">' +
                                '</a>' +
                                '</td>' +
                                '<td><span class="badge badge-danger">Dibanned</span></td>' +
                                '<td>' +
                                '<a href="javascript:void(0);" class="btn btn-primary btn-sm item_aktif" data-id="' + data[i].id + '">Aktifkan</a>' +
                                '</td>' +
                                '</tr>';
                        } else {
                            html += '<tr>' +
                                '<td>' + data[i].id + '</td>' +
                                '<td>' + data[i].nama + '</td>' +
                                '<td>' + data[i].email + '</td>' +
                                '<td>' + data[i].hp + '</td>' +
                                '<td>' + data[i].nama_usaha + '</td>' +
                                '<td>' + data[i].alamat_usaha + '</td>' +
                                '<td>' + data[i].date_created + '</td>' +
                                '<td>' +
                                '<a target="_blank" class="image-popup" href="<?= base_url('uploads/pemilik/ktp/'); ?>' + data[i].ktp + '">' +
                                '<img style="width:50px;" src="<?= base_url('uploads/pemilik/ktp/'); ?>' + data[i].ktp + '">' +
                                '</a>' +
                                '</td>' +
                                '<td><span class="badge badge-success">Aktif</span></td>' +
                                '<td>' +
                                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_banned" data-id="' + data[i].id + '">Banned</a>' +
                                '</td>' +
                                '</tr>';
                        }

                    }
                    $('#show_data').html(html);
                }

            });
        }

        //get data for banned record
        $('#show_data').on('click', '.item_banned', function() {
            var id = $(this).data('id');

            $('#Modal_Banned').modal('show');
            $('[name="id_banned"]').val(id);
        });

        //banned record to database
        $('#btn_banned').on('click', function() {
            var id = $('#id_banned').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Admin/banned_pemilik') ?>",
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(data) {
                    $('[name="id_banned"]').val("");
                    $('#Modal_Banned').modal('hide');
                    show_pemilik();
                }
            });
            return false;
        });

        //get data for aktif record
        $('#show_data').on('click', '.item_aktif', function() {
            var id = $(this).data('id');

            $('#Modal_Aktif').modal('show');
            $('[name="id_aktif"]').val(id);
        });

        //aktif record to database
        $('#btn_aktif').on('click', function() {
            var id = $('#id_aktif').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Admin/aktif_pemilik') ?>",
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(data) {
                    $('[name="id_aktif"]').val("");
                    $('#Modal_Aktif').modal('hide');
                    show_pemilik();
                }
            });
            return false;
        });

    });
</script>