$(document).ready(function(){
    $('#FilterFormTestimony').on('change', function(){

        var category = $('.select-testimony-category').val();

            /*** Si la catégorie est déjà définit alors je remplace par la catégorie sélectionné ***/
            if(category !== ''){
                window.location.href = '/ils-ont-suivi-une-formation-dans-le-domaine-'+ category +'.html';
            }
            /*** Sinon je renvoi à la page index ***/
            else{
                location.href = '/nos-eleves-donnent-leurs-avis-et-temoignages.html'
            }
    });
});