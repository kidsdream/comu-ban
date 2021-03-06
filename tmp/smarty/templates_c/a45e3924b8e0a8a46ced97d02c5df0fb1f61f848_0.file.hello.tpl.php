<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-01 18:52:40
  from 'C:\MAMP\htdocs\php-board\src\View\hello.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e354a68b7b914_94920166',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a45e3924b8e0a8a46ced97d02c5df0fb1f61f848' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\php-board\\src\\View\\hello.tpl',
      1 => 1580550345,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e354a68b7b914_94920166 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
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
    <?php echo '<script'; ?>
 async src="https://www.googletagmanager.com/gtag/js?id=UA-135126667-2"><?php echo '</script'; ?>
>
    <!-- Smartyタグとバッティングを起こすためリテラルとして認識させる -->
    
      <?php echo '<script'; ?>
>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-135126667-2');
      <?php echo '</script'; ?>
>
    


  <!-- ================================
        Asset定義
       ================================ -->
    <!-- jQuery -->
    <?php echo '<script'; ?>

      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
      >
    <?php echo '</script'; ?>
>

    <!-- jQueryフォールバック -->
    <?php echo '<script'; ?>
>
      window.jQuery || document.write("<?php echo '<script'; ?>
 src='./src/htdocs/js/jquery-3.4.1.min.js'><\/script>");
    <?php echo '</script'; ?>
>

    <!-- CSS -->
    <link rel="stylesheet" href="./src/htdocs/css/style.min.css">

    <!-- Favicons -->
    <link rel="shortcut icon" href="./src/htdocs/img/ico/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./src/htdocs/img/ico/favicon.ico">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p&display=swap" rel="stylesheet">
    <?php echo '<script'; ?>
 src="https://kit.fontawesome.com/9b759cafa6.js" crossorigin="anonymous"><?php echo '</script'; ?>
>

    <!-- JavaScript -->
    <?php echo '<script'; ?>
 src="./src/htdocs/js/contentAnimation.js" charset="utf-8" defer><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="./src/htdocs/js/main.js" charset="utf-8" defer><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="./src/htdocs/js/ajax.js" charset="utf-8" defer><?php echo '</script'; ?>
>

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
          <?php if (!empty($_smarty_tpl->tpl_vars['success_message']->value)) {?>
            <div class="c-info">
              <p class="c-info__message c-successMessage"><?php echo $_smarty_tpl->tpl_vars['success_message']->value;?>
</p>
            </div>
          <?php }?>
        </div>

        <!-- コンテンツ表示処理 -->
        <div id="ajax-result">

        </div>

      </main>

      <footer id="l-footer">
        <p>
          <small>&copy; 2019 - <span id="thisYear"></span>  DREAM</small>
          <?php echo '<script'; ?>
 type="text/javascript">
            date = new Date();
            thisYear = date.getFullYear();
            document.getElementById("thisYear").innerHTML = thisYear;
          <?php echo '</script'; ?>
>
        </p>
      </footer>

    </div>
  </body>
</html>
<?php }
}
