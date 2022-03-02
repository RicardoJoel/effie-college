$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
    }
});

var table = $('#tbl-files').DataTable({
    info: false,
    sorting: false,
    paginate: false,
    ordering: false,
    searching: false,
    pagingType: false,
	language: {
		'decimal': '',
		'emptyTable': 'No hay información para mostrar',
		'info': 'Mostrando _START_ a _END_ de _TOTAL_ entradas',
		'infoEmpty': 'Mostrando 0 to 0 of 0 entradas',
		'infoFiltered': '(Filtrado de _MAX_ total entradas)',
		'infoPostFix': '',
		'thousands': ',',
		'lengthMenu': 'Mostrar _MENU_ entradas',
		'loadingRecords': 'Cargando...',
		'processing': 'Procesando...',
		'search': 'Buscar ',
		'zeroRecords': 'Sin resultados encontrados',
		'paginate': {
			'first': 'Primero',
			'last': 'Último',
			'next': 'Siguiente',
			'previous': 'Anterior'
		}
    }
});

$(function() {
    $('#frm-file').submit(function(e) {
        e.preventDefault();
        var formdata = new FormData();
        formdata.append('filename', $('#filename').val());
        formdata.append('filedata', $('#filedata').prop('files')[0]);
        $('body').loadingModal({
            text:'Un momento, por favor...',
            animation:'wanderingCubes'
        });
        $.ajax({
            type: 'post',
            url: $(this).attr('action'),
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                table.clear().draw();
                var dataSet = [];
                $(JSON.parse(data)).each(function() {
                    dataSet.push([
                        '<i class="fa fa-file-o"></i>&nbsp;' + this.filedata,
                        this.filename,
                        '<center>' + this.datetime + '</center>',
                        '<center><a onclick="removeFile('+ this.id +')"><i class="fa fa-trash"></i></a></center>'
                    ]);
                });
                table.rows.add(dataSet).draw();
                clearForm('Archivo agregado exitosamente.');
            },
            error: function(msg) {
                $('body').loadingModal('destroy');
                /*$('#txt-detalle').text(JSON.stringify(msg));
                $('#mdl-message').modal('show');*/
                var message = '<b>¡Atención!</b><ul>';
                $.each(msg.responseJSON['errors'], function() {
                    message += addItem(this);
                });
                message += '</ul>';
                $('#ans5a-fail-msg').html(message);
                $('#ans5a-fail-div').css('display','block');
                $('#ans5a-done-div').css('display','none');
            }
        });
    });
});

function removeFile(id) {
	if (confirm('¿Realmente desea eliminar el archivo seleccionado?')) {
		$('body').loadingModal({
			text:'Un momento, por favor...',
			animation:'wanderingCubes'
		});
		$.ajax({
			type: 'get',
			url: 'files.destroy/' + id,
			success: function(data) {
				table.clear().draw();
				var dataSet = [];			
				$(JSON.parse(data)).each(function() {
					dataSet.push([
                        '<i class="fa fa-file-o"></i>&nbsp;' + this.filedata,
						this.filename,
                        '<center>' + this.datetime + '</center>',
                        '<center><a onclick="removeFile('+ this.id +')"><i class="fa fa-trash"></i></a></center>'
					]);
				});
				table.rows.add(dataSet).draw();
                clearForm('Archivo eliminado exitosamente.');
			},
			error: function(msg) {
                $('body').loadingModal('destroy');
                /*$('#txt-detalle').text(JSON.stringify(msg));
                $('#mdl-message').modal('show');*/
                var message = '<b>¡Atención!</b><ul>';
                $.each(msg.responseJSON['errors'], function() {
                    message += addItem(this);
                });
                message += '</ul>';
                $('#ans5a-fail-msg').html(message);
                $('#ans5a-fail-div').css('display','block');
                $('#ans5a-done-div').css('display','none');
			}
		});
	}
}

function clearForm(string) {
    $('body').loadingModal('destroy');
    $('#filename').val('');
    $('#filedata').val('');
    $('#ans5a-done-msg').text(string);
    $('#ans5a-fail-div').css('display','none');
    $('#ans5a-done-div').css('display','block');
}