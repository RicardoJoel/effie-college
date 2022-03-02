$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
    }
});

$(function() {
    var table = $('#tbl-casos').DataTable({
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
    
    showCases();

    $('#edition_id').change(function() {
        showCases();
    });

    function showCases() {
        $('body').loadingModal({
            text:'Un momento, por favor...',
            animation:'wanderingCubes'
        });
        $.ajax({
            type: 'get',
            url: 'casos.getByEdition/' + $('#edition_id').val(),
            success: function(data) {
                table.clear().draw();
				var dataSet = [];			
				$(JSON.parse(data)).each(function() {
                    dataSet.push([
                        '<i class="fa fa-check-circle" style="margin-left:10px"></i> ' + this.brand,
                        '<center>' + (this.brief ? ('<a href="../downloadBrief/' + this.edition + '/' + this.brand + '"><i class="fa fa-file-pdf-o"></i>&nbsp;' + this.brief + '</a>') : '-') + '</center>',
                        '<center>' + (this.whole ? ('<a href="../downloadWhole/' + this.edition + '/' + this.brand + '"><i class="fa fa-file-archive-o"></i>&nbsp;' + this.whole + '</a>') : '-') + '</center>',
                    ]);
                });
                table.rows.add(dataSet).draw();
                $('body').loadingModal('destroy');
				$('#fail-msg').text('');
				$('#fail-div').css('display','none');
            },
            error: function(msg) {
                $('body').loadingModal('destroy');
                $('#fail-msg').text(JSON.stringify(msg.responseJSON['errors']));
                $('#fail-div').css('display','block');
			}
        });
    }
});
