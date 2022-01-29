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
                url: '<?php echo site_url('Admin/tempat_cuci_data') ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {

                        if (data[i].kategori == 1) {
                            if (data[i].status == 0) {
                                html += '<tr>' +
                                    '<td>' + data[i].id + '</td>' +
                                    '<td>' + data[i].nama + '</td>' +
                                    '<td>' + data[i].nama_pemilik + '</td>' +
                                    '<td>' + data[i].alamat + '</td>' +
                                    '<td>' + data[i].email + '</td>' +
                                    '<td>' + data[i].hp + '</td>' +
                                    '<td>' + data[i].date_created + '</td>' +
                                    '<td>Mobil</td>' +
                                    '<td><span class="badge badge-danger">Dibanned</span></td>' +
                                    '</tr>';
                            } else {
                                html += '<tr>' +
                                    '<td>' + data[i].id + '</td>' +
                                    '<td>' + data[i].nama + '</td>' +
                                    '<td>' + data[i].nama_pemilik + '</td>' +
                                    '<td>' + data[i].alamat + '</td>' +
                                    '<td>' + data[i].email + '</td>' +
                                    '<td>' + data[i].hp + '</td>' +
                                    '<td>' + data[i].date_created + '</td>' +
                                    '<td>Mobil</td>' +
                                    '<td><span class="badge badge-success">Aktif</span></td>' +
                                    '</tr>';
                            }
                        } else if (data[i].kategori == 2) {
                            if (data[i].status == 0) {
                                html += '<tr>' +
                                    '<td>' + data[i].id + '</td>' +
                                    '<td>' + data[i].nama + '</td>' +
                                    '<td>' + data[i].nama_pemilik + '</td>' +
                                    '<td>' + data[i].alamat + '</td>' +
                                    '<td>' + data[i].email + '</td>' +
                                    '<td>' + data[i].hp + '</td>' +
                                    '<td>' + data[i].date_created + '</td>' +
                                    '<td>Motor</td>' +
                                    '<td><span class="badge badge-danger">Dibanned</span></td>' +
                                    '</tr>';
                            } else {
                                html += '<tr>' +
                                    '<td>' + data[i].id + '</td>' +
                                    '<td>' + data[i].nama + '</td>' +
                                    '<td>' + data[i].nama_pemilik + '</td>' +
                                    '<td>' + data[i].alamat + '</td>' +
                                    '<td>' + data[i].email + '</td>' +
                                    '<td>' + data[i].hp + '</td>' +
                                    '<td>' + data[i].date_created + '</td>' +
                                    '<td>Motor</td>' +
                                    '<td><span class="badge badge-success">Aktif</span></td>' +
                                    '</tr>';
                            }
                        } else if (data[i].kategori == 3) {
                            if (data[i].status == 0) {
                                html += '<tr>' +
                                    '<td>' + data[i].id + '</td>' +
                                    '<td>' + data[i].nama + '</td>' +
                                    '<td>' + data[i].nama_pemilik + '</td>' +
                                    '<td>' + data[i].alamat + '</td>' +
                                    '<td>' + data[i].email + '</td>' +
                                    '<td>' + data[i].hp + '</td>' +
                                    '<td>' + data[i].date_created + '</td>' +
                                    '<td>Mobil dan Motor</td>' +
                                    '<td><span class="badge badge-danger">Dibanned</span></td>' +
                                    '</tr>';
                            } else {
                                html += '<tr>' +
                                    '<td>' + data[i].id + '</td>' +
                                    '<td>' + data[i].nama + '</td>' +
                                    '<td>' + data[i].nama_pemilik + '</td>' +
                                    '<td>' + data[i].alamat + '</td>' +
                                    '<td>' + data[i].email + '</td>' +
                                    '<td>' + data[i].hp + '</td>' +
                                    '<td>' + data[i].date_created + '</td>' +
                                    '<td>Mobil dan Motor</td>' +
                                    '<td><span class="badge badge-success">Aktif</span></td>' +
                                    '</tr>';
                            }
                        }


                    }
                    $('#show_data').html(html);
                }

            });
        }

    });
</script>