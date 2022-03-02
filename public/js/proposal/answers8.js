$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
    }
});

const MSG_ANSWER_UPDATE = 'Respuesta actualizada satisfactoriamente.';
const MSG_ANSWER_STORE = 'Respuesta guardada satisfactoriamente.';
const MSG_TITLE_UPDATE = 'Título de la propuesta actualizado satisfactoriamente.';
const MSG_TITLE_STORE = 'Título de la propuesta guardado satisfactoriamente.';

$('#btn5b-hist').css('display',$('#ans5b_detail').val() ? 'block' : 'none');

configEditor('1a');
configEditor('1b');
configEditor('1c');
configEditor('1d');
configEditor('2a');
configEditor('2b');
configEditor('2c');
configEditor('3a');
configEditor('3b');
configEditor('3c');
configEditor('4a');
configEditor('4c');
configEditor('4d');

function configEditor(idx) {
    $('#ans' + idx).Editor();
    $('#ans' + idx).Editor('setName', idx);
    $('#ans' + idx).Editor('setMaxWords', $('#qst' + idx + '_maxwrd').val());
    $('#ans' + idx).Editor('setMaxGraps', $('#qst' + idx + '_maxgrp').val());
    $('#ans' + idx).Editor('setText', $('#ans' + idx + '_detail').val());
    $('#btn' + idx + '-canc').css('display','none');
    //configuración del formulario
    if ($('#ans' + idx + '_method').val()) { //actualización de respuesta
        $('#ans' + idx).Editor('setEditable', false);
        $('#btn' + idx + '-save').text('Actualizar').css('display','none');
        $('#btn' + idx + '-edit').css('display','block');
        $('#btn' + idx + '-hist').css('display','block');
    }
    else { //creación de respuesta
        $('#ans' + idx).Editor('setEditable', true);
        $('#btn' + idx + '-save').text('Guardar').css('display','block');
        $('#btn' + idx + '-edit').css('display','none');
        $('#btn' + idx + '-hist').css('display','none');
    }
}

function reviewButtons(idx) {
    var ctw = $('#ans' + idx).Editor('getWordCount');
	var ctg = $('#ans' + idx).Editor('getGrapCount');
    var mxw = $('#ans' + idx).Editor('getMaxWords');
	var mxg = $('#ans' + idx).Editor('getMaxGraps');
	$('#btn' + idx + '-save').prop('disabled', mxw < ctw || mxg < ctg);
}

function enableEditor(idx) {
    $('#ans' + idx + '-done-div').css('display','none');
    $('#ans' + idx + '-fail-div').css('display','none');
    $('#btn' + idx + '-edit').css('display','none');
    $('#btn' + idx + '-save').css('display','block');
    $('#btn' + idx + '-canc').css('display','block');
    $('#ans' + idx).Editor('setEditable', true);
}

function disableEditor(idx) {
    $('#ans' + idx).Editor('setText', $('#ans' + idx + '_detail').val());
    $('#ans' + idx + '-done-div').css('display','none');
    $('#ans' + idx + '-fail-div').css('display','none');
    $('#btn' + idx + '-edit').css('display','block');
    $('#btn' + idx + '-save').css('display','none');
    $('#btn' + idx + '-canc').css('display','none');
    $('#ans' + idx).Editor('setEditable', false);
}

function sendAnswer(evt, idx) {
    evt.preventDefault();
    var method = $('#ans' + idx + '_method').val();
    var qstnid = $('#qst' + idx + '_id').val();
    var detail = $('#ans' + idx).Editor('getText');

    $('body').loadingModal({
        text:'Un momento, por favor...',
        animation:'wanderingCubes'
    });

    $.post($('#frm-ans' + idx).attr('action'), {
        '_method': method,
        'question_id': qstnid,
        'detail': detail
    })
    .done(function(data) {
        $('body').loadingModal('destroy');
        $('#ans' + idx + '_detail').val(data.detail);
        $('#ans' + idx).Editor('setEditable', false);
        if (method) {
            $('#ans' + idx + '-done-msg').text(MSG_ANSWER_UPDATE);
            $('#btn' + idx + '-save').css('display','none');
            $('#btn' + idx + '-canc').css('display','none');
        }
        else {
            $('#ans' + idx + '-done-msg').text(MSG_ANSWER_STORE);
            $('#ans' + idx + '_method').val('PATCH');
            $('#btn' + idx + '-save').text('Actualizar').css('display','none');
            $('#btn' + idx + '-hist').css('display','block');
            $('#ans' + idx + '_id').val(data.id);
            $('#frm-ans' + idx).attr('action','answers.update/' + data.id);
        }
        $('#btn' + idx + '-edit').css('display','block');
        $('#ans' + idx + '-done-div').css('display','block');
        $('#ans' + idx + '-fail-div').css('display','none');
    })
    .fail(function(msg) {
        $('body').loadingModal('destroy');
        /*$('#txt-detalle').text(JSON.stringify(msg));
        $('#mdl-message').modal('show');*/
		var message = '<b>¡Atención!</b><ul>';
        $.each(msg.responseJSON['errors'], function() {
            message += addItem(this);
        });
        message += '</ul>';
        $('#ans' + idx + '-fail-msg').html(message);
        $('#ans' + idx + '-fail-div').css('display','block');
        $('#ans' + idx + '-done-div').css('display','none');
    });
}

function sendTitle(evt, idx) {
    evt.preventDefault();
    var method = $('#ans' + idx + '_method').val();
    var qstnid = $('#qst' + idx + '_id').val();
    var detail = $('#ans' + idx).val();

    $('body').loadingModal({
        text:'Un momento, por favor...',
        animation:'wanderingCubes'
    });

    $.post($('#frm-ans' + idx).attr('action'), {
        '_method': method,
        'question_id': qstnid,
        'title': detail
    })
    .done(function(data) {
        $('body').loadingModal('destroy');
        $('#ans' + idx + '_detail').val(data.detail);
        if (method) {
            $('#ans' + idx + '-done-msg').text(MSG_TITLE_UPDATE);
        }
        else {
            $('#ans' + idx + '-done-msg').text(MSG_TITLE_STORE);
            $('#ans' + idx + '_method').val('PATCH');
            $('#btn' + idx + '-hist').css('display','block');
            $('#ans' + idx + '_id').val(data.id);
            $('#frm-ans' + idx).attr('action','updateTitle/' + data.id);
        }
        $('#ans' + idx + '-done-div').css('display','block');
        $('#ans' + idx + '-fail-div').css('display','none');
    })
    .fail(function(msg) {
        $('body').loadingModal('destroy');
        /*$('#txt-detalle').text(JSON.stringify(msg));
        $('#mdl-message').modal('show');*/
		var message = '<b>¡Atención!</b><ul>';
        $.each(msg.responseJSON['errors'], function() {
            message += addItem(this);
        });
        message += '</ul>';
        $('#ans' + idx + '-fail-msg').html(message);
        $('#ans' + idx + '-fail-div').css('display','block');
        $('#ans' + idx + '-done-div').css('display','none');
    });
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
            /*$('#txt-detalle').text(JSON.stringify(msg));
            $('#mdl-message').modal('show');*/
            var message = '<b>¡Atención!</b><ul>';
            $.each(msg.responseJSON['errors'], function() {
                message += addItem(this);
            });
            message += '</ul>';
            $('#ans' + idx + '-fail-msg').html(message);
            $('#ans' + idx + '-fail-div').css('display','block');
            $('#ans' + idx + '-done-div').css('display','none');
        }
    });
}