configViewer('1a');
configViewer('1b');
configViewer('1c');
configViewer('1d');
configViewer('2a');
configViewer('2b');
configViewer('2c');
configViewer('3a');
configViewer('3b');
configViewer('3c');
configViewer('4a');
configViewer('4c');
configViewer('4d');

function configViewer(idx) {
    $('#ans' + idx).Viewer();
    $('#ans' + idx).Viewer('setText', $('#ans' + idx + '_detail').val());
    $('#btn' + idx + '-hist').css('display', $('#ans' + idx + '_method').val() ? 'block' : 'none');
}

function showHistory(idx) {
    $.ajax({
        type: 'get',
        url: 'answers.history/' + $('#ans' + idx + '_id').val(),
        success: function(data) {
            var changes = '';
            $(data).each(function() {
                changes += ('<h3 class="title">' + this.type + ': ' + this.time + ' horas</h3>' + '<p>' + this.after + '</p><hr>');
            });
            $('#txt-history').html(changes);
            $('#mdl-history').modal('show');
        },
        error: function(msg) {
            $('#txt-detalle').text(JSON.stringify(msg));
            $('#mdl-message').modal('show');
        }
    });
}