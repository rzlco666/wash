<script type="text/javascript">
    var save_label;

    function load_galeri() {
        $.ajax({
            url: "<?= base_url() ?>Admin/get_data",
            type: "GET",
            dataType: "JSON",
            success: function(result) {
                var url = '<?= base_url() ?>/uploads/admin/';
                var img = '';
                var i = 1;
                $('#galeri').html('');

                $.each(result, function(key, val) {

                    img = `<h6 class="card-title">Your Profile</h6>
                                            <div class="d-flex mb-3">
                                                <figure class="avatar avatar-lg mr-3 border-0">
                                                    <img width="100" class="rounded-circle" src="${url + val.foto}" alt="...">
                                                </figure>
                                                <div>
                                                    <p>${val.nama}</p>
                                                    <button onclick="edit(${val.id})" class="btn btn-primary btn-uppercase">
                                                        <i class="ti-settings mr-2"></i> Edit Profile
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" value="${val.nama}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" value="${val.email}" readonly>
                                                    </div>
                                                </div>
                                            </div>`;

                    $('#galeri').append(img);
                });
            }
        });
    }

    function edit(id) {
        save_label = 'edit';
        $('#myModal').modal('show');
        $('#myModal .modal-title').text('Edit Profile');

        $.ajax({
            url: "<?= base_url() ?>Admin/get_single/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(result) {
                $('[name="id"]').val(result.id);
                $('[name="nama"]').val(result.nama);
                $('[name="email"]').val(result.email);
                var path = '<?= base_url() ?>uploads/admin/';
                var img = `<img src="${path + result.foto}" class="rounded img-thumbnail" style="max-height: 75px;width: auto;"/>`;
                $('#preview').html(img);
            }
        });
    }

    function readUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = `<img src="${e.target.result}" class="rounded img-thumbnail" style="max-height: 75px;width: auto;"/>`;
                $('#preview').html(img);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function() {
        load_galeri();

        $('[name="file"]').on('change', function() {
            readUrl(this);
        });

        $('#form').submit(function(e) {
            e.preventDefault();
            e.stopPropagation();
            url = '';

            $('#btn_upload').attr('disabled', 'disabled').text('Tunggu...');

            if (save_label == 'add') {
                url = '<?php echo base_url(); ?>Admin/do_upload';
            } else if (save_label == 'edit') {
                url = '<?php echo base_url(); ?>Admin/edit';
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    if (data.status) {
                        $('#myModal').modal('hide');
                        load_galeri();
                        swalert('disimpan');
                    } else {
                        console.log(data);
                        var error;

                        if (data.errors.nama) {
                            error = `<p class="invalid-feedback">${data.errors.nama}</p>`;
                            $('[name="nama"]').addClass('is-invalid').after(error);
                        }

                        if (data.errors.email) {
                            error = `<p class="invalid-feedback">${data.errors.email}</p>`;
                            $('[name="email"]').addClass('is-invalid').after(error);
                        }

                        if (data.errors.file) {
                            error = `<p class="invalid-feedback">${data.errors.file}</p>`;
                            $('[name="file"]').addClass('is-invalid').after(error);
                        }

                        if (data.errors.fail_upload) {
                            error = `<div class="alert alert-danger">
											${data.errors.fail_upload}
										</div>`;
                            $('#fail_upload_msg').html(error);
                        }
                    }
                    $('#btn_upload').removeAttr('disabled', 'disabled').text('Update');
                }
            });
        });

        $('#myModal').on('hidden.bs.modal', function(e) {
            $('#form').trigger('reset');
            $('[name="id"]').val('');
            $('#preview').html('');
            $('#fail_upload_msg').html('');
            $('#form').find('input').removeClass('is-invalid');
            $('#form').find('p.invalid-feedback').remove();
        });
    });

    function swalert(method) {
        Swal({
            title: 'Success',
            text: 'Data berhasil ' + method,
            type: 'success'
        });
    };
</script>