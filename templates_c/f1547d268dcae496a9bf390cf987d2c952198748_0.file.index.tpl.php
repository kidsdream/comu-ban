<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-02 22:43:56
  from 'C:\MAMP\htdocs\php-board\src\View\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e36d21cc25ae4_51828504',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1547d268dcae496a9bf390cf987d2c952198748' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\php-board\\src\\View\\index.tpl',
      1 => 1580651032,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:src/View/header.tpl' => 1,
    'file:src/View/load.tpl' => 1,
    'file:src/View/footer.tpl' => 1,
  ),
),false)) {
function content_5e36d21cc25ae4_51828504 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- ヘッダー -->
<?php $_smarty_tpl->_subTemplateRender('file:src/View/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<header id="l-header">
  <div class="p-title">
    <h1><a href="https://comuban.site/">COMUBAN</a></h1>
  </div>
</header>

<button type="button" name="button" class="p-displayPostBtn c-btn c-btn--circle c-btn--pink" id="js-createContent">投稿する</button>

<div class="l-wrapper">
  <!-- <aside class="l-aside">
    <ul class="c-listAside">
      <li><a href="?category=animation" class="p-asideBtn" id="js-animBtn"><i class="fas fa-caret-square-right"></i>アニメ</a></li>
      <li><a href="?category=game" class="p-asideBtn" id="js-gameBtn"><i class="fas fa-gamepad"></i>ゲーム</a></li>
      <li><a href="?category=music" class="p-asideBtn" id="js-musicBtn"><i class="fas fa-music"></i>　音楽</a></li>
      <li><a href="?category=tv" class="p-asideBtn" id="js-tvBtn"><i class="fas fa-tv"></i>テレビ</a></li>
      <li><a href="?category=radio" class="p-asideBtn" id="js-radioBtn"><i class="fas fa-broadcast-tower"></i>ラジオ</a></li>
    </ul>
  </aside> -->

  <main id="l-main">
    <div id="js-info">
      <!-- メッセージが正常に投稿された場合の表示 -->
      <?php if (!empty($_smarty_tpl->tpl_vars['success_message']->value)) {?>
        <div class="c-info">
          <p class="c-info__message c-successMessage"><?php echo $_smarty_tpl->tpl_vars['success_message']->value;?>
</p>
        </div>
      <!-- メッセージが正常に削除された場合の表示 -->
      <?php } elseif (!empty($_smarty_tpl->tpl_vars['remove_message']->value)) {?>
        <div class="c-info">
          <p class="c-info__message c-removeMessage"><?php echo $_smarty_tpl->tpl_vars['remove_message']->value;?>
</p>
        </div>
      <?php }?>

      <!-- エラー表示 -->
      <?php if (!empty($_smarty_tpl->tpl_vars['errors']->value)) {?>
        <div class="c-info">
          <ul class="c-info__message c-errorMessage">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
              <li><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </ul>
        </div>
      <?php }?>
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
                  <?php if ($_smarty_tpl->tpl_vars['_GET']->value['category'] == "animation") {?>
                    <option selected value="animation">アニメ</option>
                    <option value="game">ゲーム</option>
                    <option value="music">音楽</option>
                    <option value="tv">テレビ</option>
                    <option value="radio">ラジオ</option>
                  <?php } elseif ($_smarty_tpl->tpl_vars['_GET']->value['category'] == "game") {?>
                    <option value="animation">アニメ</option>
                    <option selected value="game">ゲーム</option>
                    <option value="music">音楽</option>
                    <option value="tv">テレビ</option>
                    <option value="radio">ラジオ</option>
                  <?php } elseif ($_smarty_tpl->tpl_vars['_GET']->value['category'] == "music") {?>
                    <option value="animation">アニメ</option>
                    <option value="game">ゲーム</option>
                    <option selected value="music">音楽</option>
                    <option value="tv">テレビ</option>
                    <option value="radio">ラジオ</option>
                  <?php } elseif ($_smarty_tpl->tpl_vars['_GET']->value['category'] == "tv") {?>
                    <option value="animation">アニメ</option>
                    <option value="game">ゲーム</option>
                    <option value="music">音楽</option>
                    <option selected value="tv">テレビ</option>
                    <option value="radio">ラジオ</option>
                  <?php } elseif ($_smarty_tpl->tpl_vars['_GET']->value['category'] == "radio") {?>
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
                  <?php }?>

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
              <input type="hidden" id="editId" name="editId" value="<?php if (isset($_smarty_tpl->tpl_vars['id']->value)) {?>$id<?php }?>">
            </li>
            <li>
              <label for="editName">名前</label>
              <input
                type="text"
                id="editName"
                name="editName"
                class="nameInput"
                value="<?php if (isset($_smarty_tpl->tpl_vars['name']->value)) {?>$name<?php }?>"
              />
            </li>
            <li>
              <label for="editMessage">内容</label>
              <textarea name="editMessage" id="editMessage" class="messageTextarea" ><?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {?>$message<?php }?></textarea>
            </li>
            <li><input type="button" name="editSubmit" class="c-btn c-btn--pink" id="js-contentEditBtn" value="更新" /></li>
          </ul>
        </form>
      </div>
    </div>


    <!-- コンテンツ表示処理 -->
    <div id="ajax-result">
      <?php $_smarty_tpl->_subTemplateRender('file:src/View/load.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>

  </main>

<!-- フッター -->
<?php $_smarty_tpl->_subTemplateRender('file:src/View/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
