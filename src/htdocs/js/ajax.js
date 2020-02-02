$(function(){
  // 投稿ボタン押下時の非同期処理
  $("#js-contentCreateBtn").click(function(){

    let name = $("#name").val();
    let message = $("#message").val();
    let category = $("#category").val();
    $.ajax({
      type:'POST',
      url: './src/Controller/IndexController.php',
      cache: false,
      data: {name: name, message: message, category: category, submit: true},
    })
    .done((data) => {
      console.log('【Ajax】正常にDONE通過');
      // エラー表示
      $('#js-info').html($('#js-info', $(data)).html());
      // 更新後のデータを再描画
      $('#ajax-result').html($('#ajax-result', $(data)).html());
      $('.js-modal').fadeOut();
      // フェードアニメーション
      $('.p-contents').each(function(index, element){
        for (var index; index <= 9; index++) {
          $(this).addClass('isFadeinAnim');
        };
      });
      return false;
    })
    .fail((XMLHttpRequest, textStatus, errorThrown) => {
      alert("XMLHttpRequest : " + XMLHttpRequest.status);
      alert("textStatus     : " + textStatus);
      alert("errorThrown    : " + errorThrown.message);
      alert('失敗しました');
    });
  });

  // 編集ボタン押下時の非同期処理
  $("#js-contentEditBtn").click(function(){
    let editId = $("#editId").val();
    let editName = $("#editName").val();
    let editMessage = $("#editMessage").val();
    $.ajax({
      type:'POST',
      url: 'index.php',
      cache: false,
      data: {editId: editId, editName: editName, editMessage: editMessage, editSubmit: true},
    })
    .done((data) => {
      // エラー表示
      $('#js-info').html($('#js-info', $(data)).html());
      // 更新後のデータを再描画
      $('#ajax-result').html($('#ajax-result', $(data)).html());
      $('.js-editModal').fadeOut();
      // フェードアニメーション
      $('.p-contents').each(function(index, element){
        for (var index; index <= 9; index++) {
          $(this).addClass('isFadeinAnim');
        };
      });
      return false;
    })
    .fail((XMLHttpRequest, textStatus, errorThrown) => {
      alert("XMLHttpRequest : " + XMLHttpRequest.status);
      alert("textStatus     : " + textStatus);
      alert("errorThrown    : " + errorThrown.message);
      alert('失敗しました');
    });
  });
});
