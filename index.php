<?php

  require_once("functions.php");

  // PHPのエラーを表示するように設定
  error_reporting(E_ALL & ~E_NOTICE);
  // タイムゾーン指定
  date_default_timezone_set('Asia/Tokyo');

  // 変数初期化
  $name = null;
  $message = null;
  $created_at = null;
  $errors = array();

  session_start();

  // 送信ボタンが押された場合
  if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $message = $_POST['message'];

    // サニタイズ
    $name = htmlspecialchars($name, ENT_QUOTES);
    $message = htmlspecialchars($message, ENT_QUOTES);

    // 入力チェック
    if (trim($name) === '') {
      $errors['name'] = 'お名前欄が入力されていません';
    }
    if (trim($message) === '') {
      $errors['message'] = '内容欄が入力されていません';
    }

    // セッションに名前を保存
    $_SESSION['name'] = $name;

    // 全ての項目に値が正常に入っていた時
    if (count($errors) === 0) {
      $created_at = date("Y-m-d H:i:s");
      $dbh = db_connect();
      $sql = 'INSERT INTO messages (name, message, created_at) VALUES (?, ?, ?)';
      $stmt = $dbh->prepare($sql);
      $stmt->bindValue(1, $name, PDO::PARAM_STR);
      $stmt->bindValue(2, $message, PDO::PARAM_STR);
      $stmt->bindValue(3, $created_at, PDO::PARAM_STR);
      $stmt->execute();

      $success_message = 'メッセージを書き込みました';

      // データベース切断
      $dbh = null;
      // 変数の破棄
      unset($name, $message, $created);
    }
  }

?>



<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="utf-8">
    <link rel="canonical" href="https://comuban.site/">

    <!-- サイトタイトル -->
    <title>コミュばん！ | 趣味で同士と語り合う掲示板</title>

    <!-- metaタグ -->
    <meta name="author" content="DREAM">
    <meta name="keywords" content="提示版,コミュニティー,趣味">
    <meta name="description" content="普通の提示版です">
    <meta name="application-name" content="コミュばん！">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">

    <!-- OGPタグ -->
    <meta property="og:site_name" content="コミュばん！" />
    <meta property="og:title" content="コミュばん！" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://comuban.site/" />
    <meta property="og:image" content="サムネイル画像のURL" />
    <meta property="og:description" content="趣味で同士と語り合う掲示板"/>
    <meta property="og:locale" content="ja_JP" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@new_kidsdream">


  <!-- ================================
        Asset定義
       ================================ -->

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/page/home/style.min.css">

    <!-- Favicons -->
    <link rel="shortcut icon" href="img/ico/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/favicon.ico">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p&display=swap" rel="stylesheet">

    <!-- JavaScript -->
    <!-- jQuery -->
    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
      crossorigin="anonymous">
    </script>

    <!-- jQueryフォールバック -->
    <script>
      window.jQuery || document.write(‘<script src="js/jquery-3.4.1.slim.min.js"><\/script>’);
    </script>

  </head>
  <body>

  <header id="l-header">
    <div class="l-container">
      <img src="img/logo.png" alt="コミュばん！のロゴ" class="u-mt10">
    </div>
  </header>

  <aside class="l-aside">
    <div class="">
      <a href="#"></a>
    </div>
  </aside>

  <main>
    <!-- メッセージが正常に投稿された場合の表示 -->
    <?php if (!empty($success_message)): ?>
      <div class="c-info">
        <p class="c-info__message c-successMessage"><?php echo $success_message; ?></p>
      </div>
    <?php endif; ?>

    <!-- エラー表示 -->
    <?php if (!empty($errors)): ?>
      <div class="c-info">
        <ul class="error_message">
          <?php foreach ($errors as $value): ?>
            <li><?php echo $value; ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="index.php" method="post" class="c-form">
      <ul>
        <li>
          <label for="name">名前</label>
          <input
            type="text"
            id="name"
            name="name"
            value="<?php if(isset($name)) { print($name); } ?>"
          />
        </li>
          <li>
            <label for="message">内容</label>
            <textarea name="message" id="message" ><?php if(isset($message)) { print($message); } ?></textarea>
          </li>
        <li><input type="submit" name="submit" class="c-btn" value="書き込む" /></li>
      </ul>
    </form>

    <?php
      $dbh = db_connect();
      $sql = 'SELECT id, name, message, created_at FROM messages ORDER BY id DESC';
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
      $dbh = null;
    ?>

    <div class="l-flex">
      <?php while($value = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <article class="p-contents">
          <div class="p-info">
            <h2 class="p-info__name"><?php echo $value['name']; ?></h2>
            <time class="p-info__time"><?php echo date('Y年m月d日 H:i', strtotime($value['created_at'])); ?></time>
          </div>
          <p class="p-message"><?php echo $value['message']?></p>
        </article>
      <?php endwhile ?>
    </div>
  </main>

  <footer id="l-footer">
    <p>
      <small>&copy; 2019 - <span id="thisYear"></span>  DREAM</small>
      <script type="text/javascript">
        date = new Date();
        thisYear = date.getFullYear();
        document.getElementById("thisYear").innerHTML = thisYear;
      </script>
    </p>
  </footer>

  </body>
</html>