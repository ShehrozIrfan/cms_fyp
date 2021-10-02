$('.btn-index-news').click(function(e) {
    let elm = $(e.target);
    let news_id = elm.attr('news-id');
    $('.btn-index-news').attr('href', 'news.php?id=' + news_id);
})
