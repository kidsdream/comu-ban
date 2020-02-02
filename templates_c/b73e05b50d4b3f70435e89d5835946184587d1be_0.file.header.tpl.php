<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-02 01:05:52
  from 'C:\MAMP\htdocs\php-board\src\View\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e35a1e01f7fd7_31218755',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b73e05b50d4b3f70435e89d5835946184587d1be' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\php-board\\src\\View\\header.tpl',
      1 => 1580555355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e35a1e01f7fd7_31218755 (Smarty_Internal_Template $_smarty_tpl) {
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
<?php }
}
