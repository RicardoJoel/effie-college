$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
    }
});

var table = $('#tbl-students').DataTable({
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
    $('#frm-student').submit(function(e) {
        e.preventDefault();
        $('body').loadingModal({
            text:'Un momento, por favor...',
            animation:'wanderingCubes'
        });
        $.post($(this).attr('action'), $(this).serialize())
        .done(function(data) {
            table.clear().draw();
            var dataSet = [];
            $(JSON.parse(data)).each(function(index) {
                dataSet.push([
                    this.student_name + ' ' + this.student_lastname,
                    '<center>' + this.student_document + '</center>',
                    '<center>' + this.student_email + '</center>',
                    '<center>' + this.student_mobile + '</center>',
                    '<center>' + this.student_career + '</center>',
                    '<center>' + this.student_cycle + '</center>',
					'<center><a name="' + index + '" onclick="editStudent(this)"><i class="fa fa-edit"></i></a></center>',
                    '<center><a name="' + index + '" onclick="removeStudent(this)"><i class="fa fa-trash"></i></a></center>'
                ]);
            });
            table.rows.add(dataSet).draw();
            $('body').loadingModal('destroy');
            clearForm();
        })
        .fail(function(msg) {
            $('body').loadingModal('destroy');
			var message = '<b>¡Atención!</b><ul>';
            $.each(msg.responseJSON['errors'], function() {
                message += addItem(this);
            });
            message += '</ul>';
            $('#fail-msg').html(message);
            $('#fail-div').css('display','block');
        });
    });
});

function editStudent(e) {
    $('body').loadingModal({
        text:'Un momento, por favor...',
        animation:'wanderingCubes'
    });
    $.ajax({
        type: 'get',
        url: '../../../students.edit/' + e.name,
        success: function(data) {
            var item = JSON.parse(data);
            $('#id').val(item.id);
            $('#student_name').val(item.student_name);
            $('#student_lastname').val(item.student_lastname);
            $('#student_email').val(item.student_email);
            $('#student_document_type_id').val(item.student_document_type_id);
            $('#student_document').val(item.student_document);
            $('#student_mobile').val(item.student_mobile);
            $('#student_career_id').val(item.student_career_id);
            $('#student_cycle_id').val(item.student_cycle_id);
            $('#submit').text('Actualizar');
            $('#frm-student').attr('action','../../../students.update/' + e.name);
            $('#subtitle').text('Editar alumno');
            $('#fail-msg').text('');
            $('#fail-div').css('display','none');
            $('body').loadingModal('destroy');
            setStudentDocFormat();
            animacion();
        },
        error: function(msg) {
            $('body').loadingModal('destroy');
            $('#fail-msg').text(JSON.stringify(msg));
            $('#fail-div').css('display','block');
        }
    });
}

function removeStudent(e) {
	if (confirm('¿Realmente desea eliminar el alumno seleccionado?')) {
		$('body').loadingModal({
			text:'Un momento, por favor...',
			animation:'wanderingCubes'
		});
		$.ajax({
			type: 'get',
			url: '../../../students.destroy/' + e.name,
			success: function(data) {
				table.clear().draw();
				var dataSet = [];			
				$(JSON.parse(data)).each(function(index) {
					dataSet.push([
                        this.student_name + ' ' + this.student_lastname,
                        '<center>' + this.student_document + '</center>',
                        '<center>' + this.student_email + '</center>',
                        '<center>' + this.student_mobile + '</center>',
                        '<center>' + this.student_career + '</center>',
                        '<center>' + this.student_cycle + '</center>',
						'<center><a name="' + index + '" onclick="editStudent(this)"><i class="fa fa-edit"></i></a></center>',
						'<center><a name="' + index + '" onclick="removeStudent(this)"><i class="fa fa-trash"></i></a></center>'
					]);
				});
				table.rows.add(dataSet).draw();
				$('body').loadingModal('destroy');
                clearForm();
			},
			error: function(msg) {
                $('body').loadingModal('destroy');
                $('#fail-msg').text(JSON.stringify(msg));
                $('#fail-div').css('display','block');
			}
		});
	}
}

function clearForm() {
    $('#id').val('');
    $('#student_name').val('');
    $('#student_lastname').val('');
    $('#student_email').val('');
    $('#student_document_type_id').val('');
    $('#student_document').val('');
    $('#student_pattern').val('');
    $('#student_mobile').val('');
    $('#student_career_id').val('');
    $('#student_cycle_id').val('');
    $('#submit').text('Agregar');
    $('#frm-student').attr('action','../../../students.store');
    $('#subtitle').text('Agregar alumno');
    $('#fail-msg').text('');
    $('#fail-div').css('display','none');
}