$(document).ready(function(){

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

    //$('#options').on('change',function(){
    //    $.post(
    //        '/Inscriptions/elearning_formation/'+$('#formation').val(),
    //        function(response){
    //            if(response !== undefined){
    //                if(response !=''){
    //                    $('#elearning_choice_label').show();
    //                    $('#elearning_choice').html('').append(response);
    //                }
    //
    //            }
    //        },'html'
    //    )
    //})
    //
    //$('#options2').on('change',function(){
    //    $.post(
    //        '/Inscriptions/elearning_formation2/'+$('#formation2').val(),
    //        function(response){
    //            if(response !== undefined){
    //                if(response !=''){
    //                    $('#elearning_choice_label2').show();
    //                    $('#elearning_choice2').html('').append(response);
    //                }
    //
    //                console.log(response);
    //            }
    //        },'html'
    //    )
    //})

    /*** AJAX Docs express ***/
    $("#submit_inscription" ).on( "click", function(e) {
        e.preventDefault();
        $('.error-message').fadeOut().remove();
        var form = $(this).parents('form'),
            action = '/Inscriptions/verif_inscription_ajax'
        $("#submit_inscription" ).val('Vérification...').prop('disabled',true);
        $.post(
            action,
            form.serialize(),
            function(response){

                if(response.status == 0) {
                    $("#submit_inscription" ).val('Valider ma demande').prop('disabled',false);
                    $('.field').each(function(){
                        var elt = $(this);
                        var champ = elt.attr('id');
                        if(response.errors[champ]) {
                            elt.next('.error-message').remove();
                            $( "#"+champ).after('<div class="error-message">'+response.errors[champ]+'</div>');
                           // errorList += '<li class="error-item">'+response.errors[champ]+'</li>'
                        }
                    })
                    var pos = ($('.error-message').first().offset()) ;
                    $.scrollTo(pos.top-50,1000)
                }else{
                    form.submit();
                }

            },'json')

    });
    /*** AJAX FORM ERRORS END ***/

});