(function($){

    if($.cookie('cookiebar') === undefined){

        $('body').prepend('<div class="cookie" id="cookie">En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de cookies qui nous permettent de mieux connaître vos attentes et de réaliser des statistiques de fréquentation du site. <a href="/p-traitement-des-donnees-36.html" class="cookie__link">En savoir plus</a><button class="cookie__btn cookie__btn-success" id="cookie-accept">x</button></div>');

        $('#cookie-accept').on('click', function(e){
            e.preventDefault();

            $.cookie('cookiebar', "viewed", { expires : 396 });

            $('#cookie').fadeOut(500, function(){
                $(this).remove();
            })
        });

        $('#cookie-cancel').on('click', function(e){
            e.preventDefault();

            $.cookie('cookiebar', "viewed", { expires : 396 });
            $.cookie('cookiecancel', "refused", { expires : 396 });

            $('#cookie').fadeOut(500, function(){
                $(this).remove();
            })
        });

        // Conditions pour les scripts de statistiques et trackings
        /*if($.cookie('cookiecancel') === undefined){
            alert('Analytics est actif.');
        }*/
    }

})(jQuery);