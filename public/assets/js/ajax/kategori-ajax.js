
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('name'));
        $('#myModal').modal('show');
    });
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.edit', function() {

        $.ajax({
            type: 'post',
            url: '/kategori_update',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'nama_kategori': $('#n').val()
            },
            success: function(data) {
                $('.kategori' + data.id).replaceWith("<tr class='kategori" + data.id + "'><td>" + data.id + "</td><td>" + data.nama_kategori + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.nama_kategori + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.nama_kategori + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        });
    });
    $("#add").click(function() {
            $.ajax({
            type: 'post',
            url: "{{ route('kategori.store') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'nama_kategori': $('input[name=nama_kategori]').val()
            },
            success: function(data) {
                if ((data.errors)){
                  $('.error').removeClass('hidden');
                    $('.error').text(data.errors.nama_kategori);
                }
                else {
                    $('.error').addClass('hidden');
                    $('#table').append("<tr class='kategori" + data.id + "'><td>" + data.id + "</td><td>" + data.nama_kategori + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.nama_kategori + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.nama_kategori + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                    toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
                }
            },

        }).;
        $('#kategori').val('');
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/hapus_kategori',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.kategori' + $('.did').text()).remove();
            }
        });
    });