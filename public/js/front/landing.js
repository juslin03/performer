$(document).ready(function(){
    $('input[name="data[LandingUser][state]"]').change(function()
    {
        if($('#LandingUserStateOui').is(':checked'))
        {
            $('#LandingUserDate').val('');
            $('#LandingUserDate2').val('');
            $('.place').prop('checked',false);
            $('.sub_choice').prop('checked',false);
        }
        else if($('#LandingUserStateNon').is(':checked'))
        {
            $('.horaire').prop('checked',false);
        }

    });

    $('input[name="data[LandingUser][sub_choice]"]').change(function()
    {
        if($('#LandingUserStateOui').is(':checked'))
        {
            $('#LandingUserDate').val('');
            $('#LandingUserDate2').val('');
            $('#LandingUserStateOui').prop('checked',false);
            $('#LandingUserStateNon').prop('checked',true);
            $('.horaire').prop('checked',false);
            $('.place').prop('checked',false);
        }
        else if($('#LandingUserStateNon').is(':checked'))
        {
            if($('.place').is(':checked')){
                $('.place').prop('checked',false);
            }

            $('.horaire').prop('checked',false);
        }

    });

    $('.horaire').change(function()
    {
       // $('#LandingUserStateNon').attr('checked',false);
        if($('#LandingUserStateOui').is(':checked'))
        {
            $('#LandingUserDate').val('');
            $('#LandingUserDate2').val('');
            $('.place').prop('checked',false);
            $('.sub_choice').prop('checked',false);
        }
        else if($('#LandingUserStateNon').is(':checked'))
        {
            $('#LandingUserStateOui').prop('checked',true);
            $('#LandingUserStateNon').prop('checked',false);
            $('#LandingUserDate').val('');
            $('#LandingUserDate2').val('');
            $('.place').prop('checked',false);
            $('.sub_choice').prop('checked',false);
        }

    });

    $('.place').change(function(){
        if($('#LandingUserStateNon').is(':checked'))
        {
            $('.horaire').prop('checked', false);
            $('#LandingUserSubChoicePlace').prop('checked', true);
        }
        else if($('#LandingUserStateOui').is(':checked')) {
            $('#LandingUserStateOui').prop('checked', false);
            $('#LandingUserStateNon').prop('checked', true);
            $('#LandingUserSubChoicePlace').prop('checked', true);
            $('.horaire').prop('checked', false);
        }

    });

    $('.rdv').change(function()
    {

        if($('#LandingUserStateNon').is(':checked'))
        {
            $('.horaire').prop('checked', false);
        }
        else if($('#LandingUserStateOui').is(':checked')) {
            $('#LandingUserStateOui').prop('checked', false);
            $('#LandingUserStateNon').prop('checked', true);
            $('.horaire').prop('checked', false);
        }

    });

    var submit_btn = $("#landing"),
        form =  $('#LandingUserViewForm'),
        error_msg = $('.error-message'),
        field = $('.field'),
        action = '/LandingUsers/verif_ajax';

    submit_btn.on( "click", function(e) {
        e.preventDefault();
        error_msg.fadeOut().remove();
        field.removeClass('form-error');

        submit_btn.text('Merci de patienter...').prop('disabled',true);
        $.post(
            action,
            form.serialize(),
            function(response){
                if(response.status == 0) {
                    submit_btn.text('Valider ma demande').prop('disabled',false);
                    field.each(function(){
                        var elt = $(this);
                        var champ = elt.attr('id');
                        if(response.errors[champ]) {
                            elt.addClass('form-error');
                            elt.next('.error-message').remove();
                            $( "#"+champ).after('<div class="error-message">'+response.errors[champ]+'</div>');
                        }
                    });
                    var pos = ($('.error-message').first().offset()) ;
                    $.scrollTo(pos.top-50,1000)
                }else{
                    form.submit();
                }

            },'json')

    });

    $('.datetime').datetimepicker({
        lang:'fr',
        format:'d/m/Y H:i',
        minDate:0,
        dayOfWeekStart : 1,
        step : 30,
        minTime:'09:00',
        maxTime:'19:00'
    });

    form.on('keyup','.form-error',function(){
        $(this).removeClass('form-error');
        $(this).next('.error-message').remove();
    })
        .on('change','.field-radio',function(){
            $(this).removeClass('form-error');
            $(this).next('.error-message').remove();
        })
        .on('change','.field-select',function(){
            $(this).removeClass('form-error');
            $(this).next('.error-message').remove();
        })
        .on('change','.field-date',function(){
            $(this).removeClass('form-error');
            $(this).next('.error-message').remove();
        })


    $('#secteur').on('change', function(){
        $('#echeances').html('');
        $('#elearning_choice_label').hide();
        $('#elearning_choice').html('');
        var url = '/Formations/listFormationsInscription/',
            categoryId = $(this).val();
        $.post(
            url + categoryId,
            function(response){
                $('#formation').empty().append(response);
            },'html'
        )
    });

    $('#secteur2').on('change', function(){
        $('#echeances').html('');
        $('#elearning_choice_label2').hide();
        $('#elearning_choice2').html('');
        var url = '/Formations/listFormationsInscription/',
            categoryId = $(this).val();
        $.post(
            url + categoryId,
            function(response){
                $('#formation2').empty().append(response);
            },'html'
        )
    });

    $('#formation').on('change',function(){
        $('#elearning_choice_label').hide();
        $('#elearning_choice').html('');
        $.post(
            '/Inscriptions/getOptions/'+$(this).val(),
            function(response){
                if(response !== undefined){
                    $('#options').html('').append(response);
                }
            },'html'
        );
        $.post(
            '/Inscriptions/elearning_formation/'+$('#formation').val(),
            function(response){
                if(response !== undefined){
                    if(response !=''){
                        $('#elearning_choice_label').show();
                        $('#elearning_choice').html('').append(response);
                    }

                    console.log(response);
                }
            },'html'
        )
    })

    $('#formation2').on('change',function(){
        $('#elearning_choice_label2').hide();
        $('#elearning_choice2').html('');
        $.post(
            '/Inscriptions/getOptions/'+$(this).val(),
            function(response){
                if(response !== undefined){
                    $('#options2').html('').append(response);
                }
            },'html'
        );
        $.post(
            '/Inscriptions/elearning_formation2/'+$('#formation2').val(),
            function(response){
                if(response !== undefined){
                    if(response !=''){
                        $('#elearning_choice_label2').show();
                        $('#elearning_choice2').html('').append(response);
                    }

                    console.log(response);
                }
            },'html'
        )
    })
});

