var table = $('#tbl-reviews').DataTable({
    'pagingType': 'full_numbers',
    'columnDefs': [{
        'targets': 0,
        'orderable': false,
        'searchable': false
    },{
        'targets': 5,
        'visible': false
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
    },
    'footerCallback': function ( row, data, start, end, display ) {
        var api = this.api(), data;

        // Total over all pages
        var column = api.column(5).data();

        var total = column
            .reduce(function(a, b) {
                if (isNaN(a)) {
                    return '';
                } else {
                    a = parseFloat(a);
                }
                if (isNaN(b)) {
                    return '';
                } else {
                    b = parseFloat(b);
                }
                return a + b;
            }, 0);
        // Update footer
        $(api.column(4).footer()).html(
            parseFloat(total / column.count()).toFixed(3)
        );
    }
});

table.on('order.dt search.dt', function () {
    table.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, i) {
        cell.innerHTML = i+1;
    });
}).draw();