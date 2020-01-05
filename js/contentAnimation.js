$(function(){

  // スクロール時のアニメーション
  $(window).scroll(function (){
    $('.p-contents').each(function(){
        var elemPos = $(this).offset().top;
        var scroll = $(window).scrollTop();
        var windowHeight = $(window).height();
        var windowTop = $(window);
        if (scroll >= elemPos - windowHeight + 200){
          $(this).addClass('isFadeinAnim');
        }
    });
  });

  // 初期表示時のコンテンツ表示アニメーション
  $(window).on('load', function(){
    $('.p-contents').each(function(index, element){
      for (var index; index <= 5; index++) {
        $(this).addClass('isFadeinAnim');
      };
    });
  });

});
