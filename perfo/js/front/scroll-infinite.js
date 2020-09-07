$('#btn-scroll').on('click', function(){
    console.log($('.item-scroll').last().data('date'));
    $('.ajax-loader').show();
    var link = $(this).data('url');
    $.post(
        link,
        {
            date:$('.item-scroll').last().data('date')
        },
        function(response){
            $('.item-scroll').last().fadeIn(1000).after(response);
            if(response == null || response == ''){
                $('#btn-scroll').hide();
            }
            $('.ajax-loader').hide();
        },'html'
    )
    return false;
});

$('#btn-scroll_blog').on('click', function(){
    $('.ajax-loader').show();
    var link = $(this).data('url');
    var category_id = $(this).data('category-id');
    $.post(
        link,
        {
            date:$('.item-scroll').last().data('date'),
            category_id:category_id
        },
        function(response){
            $('.item-scroll').last().fadeIn(1000).after(response);
            if(response == null || response == ''){
                $('#btn-scroll_blog').hide();
            }
            $('.ajax-loader').hide();
        },'html'
    )
    return false;
});