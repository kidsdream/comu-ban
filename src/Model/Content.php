<?php

require_once(dirname(__FILE__) . "/ModelBase.php");

class Content extends ModelBase {



  // コンテンツを取得
  public function getContents() {
    $stmt = static::$dbh->prepare('SELECT id, name, message, category, user_id, created_at FROM messages ORDER BY id DESC');
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $rows;
  }



  // コンテンツを登録
  public function addContent() {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $message = $_POST['message'];

    // サニタイズ
    $name = htmlspecialchars($name, ENT_QUOTES);
    $category = htmlspecialchars($category, ENT_QUOTES);
    $message = htmlspecialchars($message, ENT_QUOTES);

    // 入力チェック
    if (trim($name) === '') {
      $errors['name'] = 'お名前欄が入力されていません';
    }
    if (trim($message) === '') {
      $errors['message'] = '内容欄が入力されていません';
    }

    // 全ての項目に値が正常に入っていた時
    if (count($errors) === 0) {
      $user_id = $_COOKIE["userId"];
      $created_at = date("Y-m-d H:i:s");
      $stmt = static::$dbh->prepare('INSERT INTO messages (name, message, category, user_id, created_at) VALUES (:name, :message, :category, :user_id, :created_at)');
      $stmt->bindValue(':name', $name, PDO::PARAM_STR);
      $stmt->bindValue(':message', $message, PDO::PARAM_STR);
      $stmt->bindValue(':category', $category, PDO::PARAM_STR);
      $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
      $stmt->bindValue(':created_at', $created_at, PDO::PARAM_STR);
      $stmt->execute();
      $success_message = 'メッセージを書き込みました';
      // 変数の破棄
      unset($name, $message, $created_at);
    }
  }

  // コンテンツを削除
  public function removeContent() {

  }
}
