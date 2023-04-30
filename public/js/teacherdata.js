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

    $('.filter-icon').on('click', function() {
        $('.filter-container').css('overflow', 'unset');
        $('.filter-container').css('height', 'auto');
        $( this ).css('display', 'none');
        $('.filter-close').css('display', 'flex');
    });

    $('.filter-close').on('click', function() {
        $('.filter-container').css('overflow', 'hidden');
        $('.filter-container').css('height', '55px');
        $( this ).css('display', 'none');
        $('.filter-icon').css('display', 'flex');
    });

    $('button.btn-filter').on('click', function() {

        $('div.message_container').text("");
        $('div.message_container').css('display', "none");
        function build_teacher_view (response) {

            var teachers = response.teachers.map(element => element.id);

            if (teachers.length == 0) {
                $('div.message_container').text("Nincs találat a megadott feltételekkel.");
                $('div.message_container').css('display', "block");
            }

            $(".teacher-card-a").filter(function( index ) {
                return !teachers.includes(parseInt($( this ).attr( "id" ), 10));
              }).css("display", "none");

              $(".teacher-card-a").filter(function( index ) {
                return teachers.includes(parseInt($( this ).attr( "id" ), 10));
              }).css("display", "block");

        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var data = {
        };

        if($('#subject').val().length > 0){
            data['subject'] = $('#subject').val();
        }

        if($('#grades').val().length > 0){
            data['grade'] =$('#grades').val();
        }

        if($('#lesson_type').val().length > 0){
            data['lesson_type'] = $('#lesson_type').val();
        }

        if($('#towns').val().length > 0){
            data['town'] = $('#towns').val();
        }

        if(!jQuery.isEmptyObject(data)){
            $.ajax({
                type: "POST",
                url: "/filterteacher",
                data: data,
                dataType: "json",
                success: function (response) {
                    build_teacher_view(response)
                }
            });
        }
    });
});