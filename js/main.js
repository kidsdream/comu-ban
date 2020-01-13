// グローバル

// モーダルウィンドウ編集ボタン押下時のデータをモーダルに渡す、背景処理
function js_edit(){
  // データ取得
  let editId = $(event.currentTarget).siblings().get(0).value;
  let editName = $(event.currentTarget).parent().siblings().get(0).innerHTML;
  let editMessage = $(event.currentTarget).parent().parent().siblings().get(0).innerHTML;
  $("#editId").val(editId);
  $("#editName").val(editName);
  $("#editMessage").val(editMessage);
  $('.p-contents').slideUp();
  $('.js-editModal').fadeIn();
};
$('.js-modal-close').on('click',function(){
  $('.p-contents').slideDown();
  $('.js-editModal').fadeOut();
});


// ローカル
$(function(){

  // モーダルウィンドウ表示ボタン押下時の背景処理
  $("#js-createContent").click(function(){
    $('.p-contents').slideUp();
    $('.js-modal').fadeIn();
  });
  $('.js-modal-close').on('click',function(){
    $('.p-contents').slideDown();
    $('.js-modal').fadeOut();
  });



  // 各カテゴリー選択時の強調表示処理
  if(document.URL.match("category=animation")) {
    $("#js-animBtn").addClass("is-listAsideBtnActive");
  }
  if(document.URL.match("category=game")) {
    $("#js-gameBtn").addClass("is-listAsideBtnActive");
  }
  if(document.URL.match("category=music")) {
    $("#js-musicBtn").addClass("is-listAsideBtnActive");
  }
  if(document.URL.match("category=tv")) {
    $("#js-tvBtn").addClass("is-listAsideBtnActive");
  }
  if(document.URL.match("category=radio")) {
    $("#js-radioBtn").addClass("is-listAsideBtnActive");
  }


});
