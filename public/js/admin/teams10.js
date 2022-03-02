var table = $('#tbl-index').DataTable({
    'pagingType': 'full_numbers',
    'columnDefs': [{
        'searchable': false,
        'orderable': false,
        'targets': 0
    }],
    'order': [[ 1, 'asc' ]],
    'language': {
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

table.on('order.dt search.dt', function () {
    table.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, i) {
        cell.innerHTML = i+1;
    });
}).draw();

function showTeams() {
    $('body').loadingModal({
        text:'Un momento, por favor...',
        animation:'wanderingCubes'
    });
    $.ajax({
        type: 'get',
        url: 'users.getByEdition/' + $('#edition_id').val(),
        success: function(data) {
            table.clear().draw();
            var dataSet = [];
            $(JSON.parse(data)).each(function() {
                dataSet.push([
                    '',
                    '<i class="fa fa-users"></i> ' + this.username,
                    this.college,
                    '<center>' + this.brand + '</center>',
                    '<center>' + this.situation + '</center>',
                    '<center><a href="evaluation/' + this.id + '">' + (this.is_completed ? '<i class="fa fa-eye"></i>&nbsp;Envío' : '') + '</a></center>',
                    '<center><a href="reviews/' + this.id + '">' + (this.score ? parseFloat(this.score).toFixed(2) : '') + '</a></center>',
                    '<center><a href="users/' + this.id + '"><i class="fa fa-search-plus"></i><i class="' + (this.is_viewed ? '' : 'new') + '"></i></a></center>'
                ]);
            });
            table.rows.add(dataSet).draw();
            $('body').loadingModal('destroy');
            $('#numteams').text(dataSet.length);
            $('#fail-msg').text('');
            $('#fail-div').css('display','none');
            animacion();
        },
        error: function(msg) {
            $('body').loadingModal('destroy');
            $('#fail-msg').text(JSON.stringify(msg.responseJSON['errors']));
            $('#fail-div').css('display','block');
        }
    });
}

$(function() {
    showTeams();

    $('#edition_id').change(function() {
        showTeams();
    });
});