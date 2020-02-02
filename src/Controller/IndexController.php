<?php

require_once(dirname(__FILE__) . "/../../library/mvc/smarty-3.1.34/libs/Smarty.class.php");
require_once(dirname(__FILE__) ."/..//Model/Content.php");

class IndexController {
  public function indexAction() {
    $smarty = new Smarty();
    // $smarty->setTemplateDir("./tmp/smarty/templates/");
    // $smarty->setCompileDir("./tmp/smarty/templates_c/");

    // コンテンツ投稿
    if(isset($_POST['submit'])) {
      $addcontent = new Content();
      $addcontent->addContent();
      // assignメソッドを使ってテンプレートに渡す値を設定
      $smarty->assign("success_message", "メッセージを書き込みました");
    }


    // 利用者を判別するためブラウザにクッキーを保存させる。
    if(!isset($_COOKIE["userId"])) {
      $str_shuffle = str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz');
      setcookie('userId', $str_shuffle, time() + 60 * 60 * 24 * 30);
    }

    // コンテンツ一覧を取得
    $content = new Content();
    $contents = $content->getContents();
    $smarty->assign("contents", $contents);

    // テンプレートを表示する
    $smarty->display("./src/View/index.tpl");
  }

}
