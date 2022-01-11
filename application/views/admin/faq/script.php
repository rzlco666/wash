<script type="text/javascript">
    $(document).ready(function() {
        show_faq(); //call function show all faq

        $('#mydata').DataTable({
            responsive: true
        });

        //function show all faq
        function show_faq() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('Admin/faq_data') ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].id + '</td>' +
                            '<td>' + data[i].question + '</td>' +
                            '<td>' + data[i].answer + '</td>' +
                            '<td>' +
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id="' + data[i].id + '" data-question="' + data[i].question + '" data-answer="' + data[i].answer + '">Edit</a>' + ' ' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="' + data[i].id + '">Delete</a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
        }

        //Save faq
        $('#btn_save').on('click', function() {
            var id = $('#id').val();
            var question = $('#question').val();
            var answer = $('#answer').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Admin/save_faq') ?>",
                dataType: "JSON",
                data: {
                    id: id,
                    question: question,
                    answer: answer
                },
                success: function(data) {
                    $('[name="id"]').val("");
                    $('[name="question"]').val("");
                    $('[name="answer"]').val("");
                    $('#Modal_Add').modal('hide');
                    show_faq();
                }
            });
            return false;
        });

        //get data for update record
        $('#show_data').on('click', '.item_edit', function() {
            var id = $(this).data('id');
            var question = $(this).data('question');
            var answer = $(this).data('answer');

            $('#Modal_Edit').modal('show');
            $('[name="id_edit"]').val(id);
            $('[name="question_edit"]').val(question);
            $('[name="answer_edit"]').val(answer);
        });

        //update record to database
        $('#btn_update').on('click', function() {
            var id = $('#id_edit').val();
            var question = $('#question_edit').val();
            var answer = $('#answer_edit').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Admin/update_faq') ?>",
                dataType: "JSON",
                data: {
                    id: id,
                    question: question,
                    answer: answer
                },
                success: function(data) {
                    $('[name="id_edit"]').val("");
                    $('[name="question_edit"]').val("");
                    $('[name="answer_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_faq();
                }
            });
            return false;
        });

        //get data for delete record
        $('#show_data').on('click', '.item_delete', function() {
            var id = $(this).data('id');

            $('#Modal_Delete').modal('show');
            $('[name="id_delete"]').val(id);
        });

        //delete record to database
        $('#btn_delete').on('click', function() {
            var id = $('#id_delete').val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Admin/delete_faq') ?>",
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(data) {
                    $('[name="id_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_faq();
                }
            });
            return false;
        });

    });
</script>