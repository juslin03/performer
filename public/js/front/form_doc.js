$(document).ready(function(){
    $('#postal-check').on('click', function(){
        if($(this).is(':checked')){
            $('#container-address').slideDown();
            $('.field_address').prop('disabled',false);
        }else{
            $('#container-address').slideUp();
            $('.field_address').prop('disabled',true);
        }
    })
    var Fname = $('#formation_title').data('name');
    console.log(Fname);
    /*** AJAX Docs express ***/
    $("#submit_form" ).on( "click", function(e) {
        e.preventDefault();
        $('.error-message').fadeOut().remove();
        $('.field').each(function(e){
            $(this).removeClass('form-error') ;
        });
        var form = $(this).parents('form'),
            action = '/Documentations/verif_documentation_ajax'
        $("#submit_form" ).val('Merci de patienter...').prop('disabled',true);
        $.post(
            action,
            form.serialize(),
            function(response){
                console.log(response)
                if(response.status == 0) {
                    $("#submit_form" ).val('Recevoir ma documentation').prop('disabled',false);
                    var tab = [];
                    $('.field').each(function(){
                        var elt = $(this);

                        var champ = elt.attr('id');
                        if(response.errors[champ]) {
                            elt.addClass('form-error');
                           // elt.next('.error-message').remove();
                            tab.push('<div class="message">'+response.errors[champ]+'</div>');
                            //$( "#"+champ).after('<div class="error-message">'+response.errors[champ]+'</div>');
                            // errorList += '<li class="error-item">'+response.errors[champ]+'</li>'
                        }
                    })

                    $('#first-modal').foundation('reveal','open');
                    $('#error_list').html(tab);
                }else{
                    ga('send', 'event', 'Formulaire','Demande de doc', 'Formation '+Fname, 1);
                    form.submit();
                }

            },'json')

    });

    $('.field').on('keyup',function(){
        var $this = $(this);
        if($this.hasClass('form-error')) {
            $this.removeClass('form-error');
            var small = $('.error-message');
            $(this).next(small).slideToggle();
        }
    });

    $('.field-check').on('change',function(){
        var $this = $(this);
        if($this.hasClass('form-error')){
            $this.removeClass('form-error');
            //var small = $('.error-message');
            //$(this).next(small).slideToggle();
        }

    })

    if(window.innerWidth > 1000){
        $("#DemandeDoc").sticky({
            topSpacing:0,
            bottomSpacing:320
        });
    }

    $('#LienTarifDoc').on('click',function(){
        ga('send', 'event', 'Version Mobile', 'clic sur lien', 'Formation '+Fname, 1);
    })

    $('#BoutonTarifDoc').on('click',function(){
        ga('send', 'event', 'Version Mobile', 'clic sur bouton', 'Formation '+Fname, 1);
    })

});
