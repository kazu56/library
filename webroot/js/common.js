$(function(){
    //レビュー･書評を書く
    $('#write_impression_btn').click(function(){
        $('#write_impression_form').submit();
    })

    //TOPへスクロール
    $(window).scroll(function(){
        if($(this).scrollTop() > 160){
            $('#back-to-top').fadeIn();
        }else{
            $('#back-to-top').fadeOut();
        }
    });
    $('#back-to-top').click(function(){
        $('body').animate({
            scrollTop:0
        },500)
    });

    $('#btn_open_borrow_book_modal').click(function(){
        $('#possessed_book_id').val($(this).data('possessed_book_id'));
        $('#borrow_book_modal').modal();
    })

    //TODO 一旦全てのformにvalidationつける方向で。
    $("form").validationEngine();

    /*
    $('#btn_return').click(function(){
        $.ajax({
            url: '../return',
            type: 'get',
            data: {
                possessed_book_id:$(this).data('possessed_book_id')
            },
            dataType: 'html'
        }).done(function( data) {
            $('#result_search_borrow_user').html(data);
        }).fail(function( jqXHR, textStatus, errorThrown) {
            alert('エラー')
        })
    })
*/
})
