$("#teacher_mobile").inputmask({"mask":"999 999 999"});
$("#student_mobile").inputmask({"mask":"999 999 999"});

if ($('#caso_id').val()) {
    $.ajax({
        type: 'get',
        url: 'casos.getBrand/' + $('#caso_id').val(),
        success: (data) => {
            $('#brand').val(data);
        },
        error: (msg) => {
            alert(JSON.stringify(msg.responseJSON['errors']));
        }
    });
}

function selectCaso(e) {
    $('#caso_id').val(e.name);
    $('#brand').val(e.value);
}

$('#teacher_document_type_id').change(function() {
    setTeacherDocFormat();
});

if ($('#teacher_document_type_id').val()) {
    setTeacherDocFormat();
}

function setTeacherDocFormat() {
    $.ajax({
        type: 'get',
        url: 'users.getDocumentType/' + $('#teacher_document_type_id').val(),
        success: (data) => {
            var value = $('#teacher_document').val();
            $('#teacher_document')
                .prop('disabled',false)
                .prop('maxlength',data.length)
                .css('background-color','#fff')
                .attr('onkeypress','return check' + (data.is_number ? 'Number' : 'AlNum') + '(event)')
                .val((data.is_number ? getNumbersInString(value) : value).substr(0, data.length));
            $('#teacher_pattern').val(data.is_exact?'[0-9]{'+data.length+'}':'[A-Za-z0-9]{1,'+data.length+'}');
        },
        error: (msg) => {
            alert(JSON.stringify(msg.responseJSON['errors']));
        }
    });
}

$('#student_document_type_id').change(function() {
    setStudentDocFormat();
});

if ($('#student_document_type_id').val()) {
    setStudentDocFormat();
}

function setStudentDocFormat() {
    $.ajax({
        type: 'get',
        url: 'users.getDocumentType/' + $('#student_document_type_id').val(),
        success: (data) => {
            var value = $('#student_document').val();
            $('#student_document')
                .prop('disabled',false)
                .prop('maxlength',data.length)
                .css('background-color','#fff')
                .attr('onkeypress','return check' + (data.is_number ? 'Number' : 'AlNum') + '(event)')
                .val((data.is_number ? getNumbersInString(value) : value).substr(0, data.length));
            $('#student_pattern').val(data.is_exact?'[0-9]{'+data.length+'}':'[A-Za-z0-9]{1,'+data.length+'}');
        },
        error: (msg) => {
            alert(JSON.stringify(msg.responseJSON['errors']));
        }
    });
}

$('#lnk-terminos').click(function() {
    $('#mdl-terminos').modal('show');
});

$('#lnk-politicas').click(function() {
    $('#mdl-politicas').modal('show');
});

$('#btn-terminos').click(function() {
    $('#mdl-terminos').modal('hide');
    $('#chk-terminos').prop('checked', true);
    $('#btn-submit').attr('disabled', !$('#chk-politicas').prop('checked'));
});

$('#btn-politicas').click(function() {
    $('#mdl-politicas').modal('hide');
    $('#chk-politicas').prop('checked', true);
    $('#btn-submit').attr('disabled', !$('#chk-terminos').prop('checked'));
});