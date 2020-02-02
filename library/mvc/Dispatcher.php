<?php

class Dispatcher {
  private $sysRoot;

  public function setSystemRoot($path) {
    $this->sysRoot = rtrim($path . '/');
  }



  public function dispatch() {
    // パラメーター取得
    $param = $_SERVER['REQUEST_URI'];

    $params = array();
    if ('' != $param) {
      // パラメーターを/で分割
      $params = explode('/', $param);
    }

    //
    // コントローラー
    //

    // 1番目のパラメーターをコントローラーとして取得
    $controller = "index";

    if ($params[2] != "") {
      $controller = $params[2];
    }

    // パラメーターより取得したコントローラー名によりクラス振り分け
    $className = ucfirst(strtolower($controller)) . 'Controller';
    // クラスファイル読み込み
    require_once $this->sysRoot . 'Controller/' . $className . '.php';
    // クラスインスタンス生成
    $controllerInstance = new $className();

    //
    // アクション
    //

    // 2番目のパラメーターをアクションとして取得
    $action = 'index';

    if (3 < count($params)) {
      $action = $params[3];
    }

    // アクションメソッドの実行
    $actionMethod = $action . 'Action';
    $controllerInstance->$actionMethod();
  }

}
