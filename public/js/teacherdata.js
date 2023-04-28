$( document ).ready(function(){
    $('div.row.my-2.location-row').css('display', "none");
    $('select#location').attr('disabled', true);

    $('select#lesson_type').bind('change', function () {
        if ($('select#lesson_type option:selected').text() == 'online') {
            $('div.row.my-2.location-row').css('display', "none");
            $('select#location').attr('disabled', true);
        } else {
            $('div.row.my-2.location-row').css('display', "flex");
            $('select#location').attr('disabled', false);
        }
    });

    $('form#teacher_data_form').on('submit', function () {
    
        var msg = '<ul>';
        var validated = true;

        const file_input = $('#profile_pic')[0];
        
            const file = file_input.files[0];
    
        if  (file.size > 2 * 1024 * 1024) {
            msg += '<li>' + file.name + ' nagyobb a megengedett maximális méretnél (2MB).</li>';
            validated = false;
        } else {
            validated = true;
        }
        
        if ($('select#lesson_type option:selected').text() != 'online' && $('select#location').find('option:selected').length == 0) {
            msg += '<li>Helyszíni oktatáshoz válasszon legalább egy települést vagy kerületet!</li>';
            validated = false;
        }

        if (!validated) {
            msg += '</ul>'
            $('.form_messages').html(msg);
            $('.form_messages').css('display', "block");
            $(window).scrollTop(0);
        }
        return validated;
    });
});