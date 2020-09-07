/**
 * Created by bruno on 21/05/2017.
 */
$("#newsletter_subscribe" ).on( "click", function(e) {

    e.preventDefault();
    $('.error-message').fadeOut().remove();
    $('.field_newsletter').removeClass('form-error');
    var form = $(this).parents('form'),
        action = form.attr('action'),
        text = $("#newsletter_subscribe").val();

    $("#newsletter_subscribe").val('Vérification...').prop('disabled',true);

    $.post(
        action,
        form.serialize(),
        function(response){
            if(response.status === 0) {
                $("#newsletter_subscribe").val(text).prop('disabled',false);
                $('.field_newsletter').each(function(){
                    var elt = $(this);
                    var champ = elt.attr('id');
                    if(response.errors[champ]) {
                        elt.addClass('form-error');
                        elt.next('.error-message').remove();
                        $( "#"+champ).after('<div class="error-message">'+response.errors[champ]+'</div>');
                    }
                })
                return false;
            }else{
                $('.field_newsletter').each(function(){
                    var elt = $(this);
                    elt.val('')
                    elt.next('.error-message').remove();
                })
                $('<div class="success-message  small-12 columns">Vous êtes à présent abonné à notre newsletter, merci de votre confiance.</div>').appendTo(".wrapper__newsletter");
                setTimeout(function(){
                    $('.success-message').fadeOut(1500).remove();
                },3000)

            }
            $("#newsletter_subscribe").val(text).prop('disabled',false);

        },'json')

});