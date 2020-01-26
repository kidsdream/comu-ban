<?php

require_once("./library/mvc/smarty-3.1.34/libs/Smarty.class.php");

class IndexController {
    public function indexAction() {
      $smarty = new Smarty();
      $smarty->template_dir = "./tmp/smarty/templates/";
      $smarty->compile_dir = "./tmp/smarty/templates_c/";
      // assignメソッドを使ってテンプレートに渡す値を設定
      $smarty->assign("name", "Worldaa");
      // テンプレートを表示する
      $smarty->display("./src/View/hello.tpl");
    }

    public function testAction() {
        echo 'Hello Test!';
    }
}
