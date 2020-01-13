<?php

  require_once("functions.php");

  // タイムゾーン指定
  date_default_timezone_set('Asia/Tokyo');

  // 変数初期化
  $id = null;
  $name = null;
  $message = null;
  $category = null;
  $created_at = null;
  $errors = array();

  // データ削除処理
  if(isset($_POST['remove'])) {
    $dbh = db_connect();
    $id = $_POST['id'];
    $stmt = $dbh->prepare('DELETE FROM messages WHERE id=:id');
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $remove_message = 'メッセージを削除しました';
    $dbh = null;
    unset($id);
  }

  // データ投稿処理
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


  // データ更新処理
  if(isset($_POST['editSubmit'])) {
    $editId = $_POST['editId'];
    $editName = $_POST['editName'];
    $editMessage = $_POST['editMessage'];

    // サニタイズ
    $editName = htmlspecialchars($editName, ENT_QUOTES);
    $editMessage = htmlspecialchars($editMessage, ENT_QUOTES);

    // 入力チェック
    if (trim($editName) === '') {
      $errors['name'] = 'お名前欄が入力されていません';
    }
    if (trim($editMessage) === '') {
      $errors['message'] = '内容欄が入力されていません';
    }

    // 全ての項目に値が正常に入っていた時
    if (count($errors) === 0) {
      $created_at = date("Y-m-d H:i:s");
      $dbh = db_connect();
      $stmt = $dbh->prepare('UPDATE messages SET name = :editName, message = :editMessage, created_at = :created_at WHERE id = :editId');
      $stmt->bindValue(':editId', $editId, PDO::PARAM_INT);
      $stmt->bindValue(':editName', $editName, PDO::PARAM_STR);
      $stmt->bindValue(':editMessage', $editMessage, PDO::PARAM_STR);
      $stmt->bindValue(':created_at', $created_at, PDO::PARAM_STR);
      $stmt->execute();

      $success_message = 'メッセージを更新しました';

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

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-135126667-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-135126667-2');
    </script>


  <!-- ================================
        Asset定義
       ================================ -->
    <!-- jQuery -->
    <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
      >
    </script>

    <!-- jQueryフォールバック -->
    <script>
      window.jQuery || document.write("<script src='js/jquery-3.4.1.min.js'><\/script>");
    </script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.min.css">

    <!-- Favicons -->
    <link rel="shortcut icon" href="img/ico/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/favicon.ico">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9b759cafa6.js" crossorigin="anonymous"></script>

    <!-- JavaScript -->
    <script src="js/contentAnimation.js" charset="utf-8" defer></script>
    <script src="js/main.js" charset="utf-8" defer></script>
    <script src="js/ajax.js" charset="utf-8" defer></script>

  </head>
  <body>

  <header id="l-header">
    <div class="p-title">
      <h1><a href="https://comuban.site/">COMUBAN</a></h1>
    </div>
  </header>

  <button type="button" name="button" class="p-displayPostBtn c-btn c-btn--circle c-btn--pink" id="js-createContent">投稿する</button>

  <div class="l-wrapper">
    <aside class="l-aside">
      <ul class="c-listAside">
        <li><a href="?category=animation" class="p-asideBtn" id="js-animBtn"><i class="fas fa-caret-square-right"></i>アニメ</a></li>
        <li><a href="?category=game" class="p-asideBtn" id="js-gameBtn"><i class="fas fa-gamepad"></i>ゲーム</a></li>
        <li><a href="?category=music" class="p-asideBtn" id="js-musicBtn"><i class="fas fa-music"></i>　音楽</a></li>
        <li><a href="?category=tv" class="p-asideBtn" id="js-tvBtn"><i class="fas fa-tv"></i>テレビ</a></li>
        <li><a href="?category=radio" class="p-asideBtn" id="js-radioBtn"><i class="fas fa-broadcast-tower"></i>ラジオ</a></li>
      </ul>
    </aside>

    <main id="l-main">
      <div id="js-info">
        <!-- メッセージが正常に投稿された場合の表示 -->
        <?php if (!empty($success_message)): ?>
          <div class="c-info">
            <p class="c-info__message c-successMessage"><?php echo $success_message; ?></p>
          </div>
        <?php endif; ?>
        <!-- メッセージが正常に削除された場合の表示 -->
        <?php if (!empty($remove_message)): ?>
          <div class="c-info">
            <p class="c-info__message c-removeMessage"><?php echo $remove_message; ?></p>
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
      </div>




      <!-- 投稿モーダル -->
      <div class="c-modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
          <h2>新規投稿</h2>
          <form action="" method="post" class="c-form u-mt60">
            <ul>
              <li>
                <label for="name">名前</label>
                <input
                  type="text"
                  id="name"
                  name="name"
                  class="nameInput"
                />
              </li>
              <li>
                <label for="message">内容</label>
                <textarea name="message" id="message" class="messageTextarea" ></textarea>
              </li>
              <li>
                <label for="category">カテゴリー</label>
                <div class="selectWrap">
                  <select class="categorySelect" name="category" id="category">

                    <!-- 閲覧中のカテゴリにより、選択できるカテゴリの初期値を変更 -->
                    <?php if ($_GET['category'] == "animation") { ?>
                      <option selected value="animation">アニメ</option>
                      <option value="game">ゲーム</option>
                      <option value="music">音楽</option>
                      <option value="tv">テレビ</option>
                      <option value="radio">ラジオ</option>
                    <?php } elseif ($_GET['category'] == "game") { ?>
                      <option value="animation">アニメ</option>
                      <option selected value="game">ゲーム</option>
                      <option value="music">音楽</option>
                      <option value="tv">テレビ</option>
                      <option value="radio">ラジオ</option>
                    <?php } elseif ($_GET['category'] == "music") { ?>
                      <option value="animation">アニメ</option>
                      <option value="game">ゲーム</option>
                      <option selected value="music">音楽</option>
                      <option value="tv">テレビ</option>
                      <option value="radio">ラジオ</option>
                    <?php } elseif ($_GET['category'] == "tv") { ?>
                      <option value="animation">アニメ</option>
                      <option value="game">ゲーム</option>
                      <option value="music">音楽</option>
                      <option selected value="tv">テレビ</option>
                      <option value="radio">ラジオ</option>
                    <?php } elseif ($_GET['category'] == "radio") { ?>
                      <option value="animation">アニメ</option>
                      <option value="game">ゲーム</option>
                      <option value="music">音楽</option>
                      <option value="tv">テレビ</option>
                      <option selected value="radio">ラジオ</option>
                    <?php } else { ?>
                      <option value="animation">アニメ</option>
                      <option value="game">ゲーム</option>
                      <option value="music">音楽</option>
                      <option value="tv">テレビ</option>
                      <option value="radio">ラジオ</option>
                    <?php } ?>

                  </select>
                </div>
              </li>
              <li><input type="button" name="submit" class="c-btn c-btn--pink" id="js-contentCreateBtn" value="書き込む" /></li>
            </ul>
          </form>
        </div>
      </div>

      <!-- 編集モーダル -->
      <div class="c-modal js-editModal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
          <h2>更新</h2>
          <form action="" method="post" class="c-form u-mt60">
            <ul>
              <li>
                <input type="hidden" id="editId" name="editId" value="<?php if (isset($id)) { print($id); } ?>">
              </li>
              <li>
                <label for="editName">名前</label>
                <input
                  type="text"
                  id="editName"
                  name="editName"
                  class="nameInput"
                  value="<?php if (isset($name)) { print($name); } ?>"
                />
              </li>
              <li>
                <label for="editMessage">内容</label>
                <textarea name="editMessage" id="editMessage" class="messageTextarea" ><?php if (isset($message)) { print($message); } ?></textarea>
              </li>
              <li><input type="button" name="editSubmit" class="c-btn c-btn--pink" id="js-contentEditBtn" value="更新" /></li>
            </ul>
          </form>
        </div>
      </div>


      <!-- コンテンツ表示処理 -->
      <div id="ajax-result">
        <?php require('load.php'); ?>
      </div>



    <!-- ページネーション -->
    <?php if ($page >= 2 && !isset($_GET['category'])): ?>
      <a href="?page=<?php echo($page-1); ?>" class="c-pageBtn c-pageBack"><?php echo($page-1); ?>ページ目へ</a>
    <?php endif; ?>
    <?php
      $limitCounts = $dbh->query('SELECT COUNT(*) as cnt FROM messages');
      $limitCount =  $limitCounts->fetch();
      $max_page = ceil($limitCount['cnt'] / $displayCount);
    ?>
    <?php if ($page < $max_page && !isset($_GET['category'])): ?>
      <a href="?page=<?php echo($page+1); ?>" class="c-pageBtn c-pageNext"><?php echo($page+1); ?>ページ目へ</a>
    <?php endif; ?>
    <!-- 各カテゴリーページ用ページネーション -->
    <?php if (!empty($_GET['category'])) {
      $selectCategory = $_GET['category'];
      $nonQueryURL =  $_SERVER['SCRIPT_NAME'];
      $qeryURL = $_SERVER['QUERY_STRING'];
      parse_str($qeryURL, $str);
      $nowURL = $nonQueryURL . '?category=' . $str['category'];
    }; ?>
    <?php if ($page >= 2 && isset($_GET['category'])): ?>
      <a href="<?php echo($nowURL) ?>&page=<?php echo($page-1); ?>" class="c-pageBtn c-pageBack"><?php echo($page-1); ?>ページ目へ</a>
    <?php endif; ?>
    <?php
      $limitCounts = $dbh->query("SELECT COUNT(*) as cnt FROM messages WHERE category = '$selectCategory' ");
      $limitCount =  $limitCounts->fetch();
      $max_page = ceil($limitCount['cnt'] / $displayCount);
    ?>
    <?php if ($page < $max_page && isset($_GET['category'])): ?>
      <a href="<?php echo($nowURL) ?>&page=<?php echo($page+1); ?>" class="c-pageBtn c-pageNext"><?php echo($page+1); ?>ページ目へ</a>
    <?php endif; ?>

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
