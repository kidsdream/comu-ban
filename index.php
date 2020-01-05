<?php

  require_once("functions.php");

  // PHPのエラーを表示するように設定
  error_reporting(E_ALL & ~E_NOTICE);
  // タイムゾーン指定
  date_default_timezone_set('Asia/Tokyo');

  // 変数初期化
  $name = null;
  $message = null;
  $category = null;
  $created_at = null;
  $errors = array();

  session_start();

  // 送信ボタンが押された場合
  if(isset($_POST['submit'])) {
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

    // セッションに名前を保存
    $_SESSION['name'] = $name;

    // 全ての項目に値が正常に入っていた時
    if (count($errors) === 0) {
      $created_at = date("Y-m-d H:i:s");
      $dbh = db_connect();
      $stmt = $dbh->prepare('INSERT INTO messages (name, message, category, created_at) VALUES (:name, :message, :category, :created_at)');
      $stmt->bindValue(':name', $name, PDO::PARAM_STR);
      $stmt->bindValue(':message', $message, PDO::PARAM_STR);
      $stmt->bindValue(':category', $category, PDO::PARAM_STR);
      $stmt->bindValue(':created_at', $created_at, PDO::PARAM_STR);
      $stmt->execute();

      $success_message = 'メッセージを書き込みました';

      // データベース切断
      $dbh = null;
      // 変数の破棄
      unset($name, $message, $created_at);
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

    <!-- URL正規化 -->
    <link rel="canonical" href="http://comuban.site/">

  <!-- ================================
        Asset定義
       ================================ -->

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.min.css">

    <!-- Favicons -->
    <link rel="shortcut icon" href="img/ico/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/favicon.ico">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9b759cafa6.js" crossorigin="anonymous"></script>

    <!-- JavaScript -->
    <script src="js/contentAnimation.js" charset="utf-8" async></script>

    <!-- jQuery -->
    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
      crossorigin="anonymous">
    </script>

    <!-- jQueryフォールバック -->
    <script>
      window.jQuery || document.write("<script src='js/jquery-3.4.1.slim.min.js'><\/script>");
    </script>

  </head>
  <body>

  <header id="l-header">
    <div class="p-title">
      <h1><a href="http://comuban.site/">COMUBAN</a></h1>
    </div>
  </header>

  <div class="l-wrapper">
    <aside class="l-aside">
      <ul class="c-listAside">
        <li><a href="?category=animation"><i class="fas fa-caret-square-right"></i>アニメ</a></li>
        <li><a href="?category=game"><i class="fas fa-gamepad"></i>ゲーム</a></li>
        <li><a href="?category=music"><i class="fas fa-music"></i>　音楽</a></li>
        <li><a href="?category=tv"><i class="fas fa-tv"></i>テレビ</a></li>
        <li><a href="?category=radio"><i class="fas fa-broadcast-tower"></i>ラジオ</a></li>
      </ul>
    </aside>

    <main id="l-main">
      <!-- メッセージが正常に投稿された場合の表示 -->
      <?php if (!empty($success_message)): ?>
        <div class="c-info">
          <p class="c-info__message c-successMessage"><?php echo $success_message; ?></p>
        </div>
      <?php endif; ?>

      <!-- エラー表示 -->
      <?php if (!empty($errors)): ?>
        <div class="c-info">
          <ul class="c-info__message c-errorMessage">
            <?php foreach ($errors as $value): ?>
              <li><?php echo $value; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form action="" method="post" class="c-form u-mt60">
        <ul>
          <li>
            <label for="name">名前</label>
            <input
              type="text"
              id="name"
              name="name"
              class="nameInput"
              value="<?php if(isset($name)) { print($name); } ?>"
            />
          </li>
          <li>
            <label for="message">内容</label>
            <textarea name="message" id="message" class="messageTextarea" ><?php if(isset($message)) { print($message); } ?></textarea>
          </li>
          <li>
            <label for="category">カテゴリー</label>
            <div class="selectWrap">
              <select class="categorySelect" name="category" id="category">
                <option value="animation">アニメ</option>
                <option value="game">ゲーム</option>
                <option value="music">音楽</option>
                <option value="tv">テレビ</option>
                <option value="radio">ラジオ</option>
              </select>
            </div>
          </li>
          <li><input type="submit" name="submit" class="c-btn" value="書き込む" /></li>
        </ul>
      </form>

      <?php
        if(isset($_GET['category'])) {
          $dbh = db_connect();
          $category = $_GET['category'];
          $stmt = $dbh->prepare('SELECT id, name, message, created_at FROM messages WHERE category = :category ORDER BY id DESC');
          $stmt->bindValue(':category', $category, PDO::PARAM_STR);
          $stmt->execute();
          $dbh = null;
        } else {
          $dbh = db_connect();
          $stmt = $dbh->prepare('SELECT id, name, message, created_at FROM messages ORDER BY id DESC');
          $stmt->execute();
          $dbh = null;
        }
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

  </div>

  </body>
</html>
