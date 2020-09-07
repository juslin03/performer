$(document).ready(function(){

    /*** AJAX Docs express ***/
    $("#submit_doc" ).on( "click", function(e) {
        e.preventDefault();
        $('.error-message').fadeOut().remove();
        var form = $(this).parents('form'),
            action = '/Documentations/verif_documentation_ajax'
        $("#submit_doc" ).val('Vérification...').prop('disabled',true);
        $.post(
            action,
            form.serialize(),
            function(response){

                if(response.status == 0) {
                    $("#submit_doc" ).val('Recevoir notre documentation').prop('disabled',false);
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
