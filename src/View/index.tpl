<!-- ヘッダー -->
{include file='src/View/header.tpl'}

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
      {if !empty($success_message)}
        <div class="c-info">
          <p class="c-info__message c-successMessage">{$success_message}</p>
        </div>
      <!-- メッセージが正常に削除された場合の表示 -->
      {elseif !empty($remove_message)}
        <div class="c-info">
          <p class="c-info__message c-removeMessage">{$remove_message}</p>
        </div>
      {/if}

      <!-- エラー表示 -->
      {if !empty($errors)}
        <div class="c-info">
          <ul class="c-info__message c-errorMessage">
            {foreach $errors as $value}
              <li>{$value}</li>
            {/foreach}
          </ul>
        </div>
      {/if}
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
                  {if $_GET['category'] == "animation"}
                    <option selected value="animation">アニメ</option>
                    <option value="game">ゲーム</option>
                    <option value="music">音楽</option>
                    <option value="tv">テレビ</option>
                    <option value="radio">ラジオ</option>
                  {elseif $_GET['category'] == "game"}
                    <option value="animation">アニメ</option>
                    <option selected value="game">ゲーム</option>
                    <option value="music">音楽</option>
                    <option value="tv">テレビ</option>
                    <option value="radio">ラジオ</option>
                  {elseif $_GET['category'] == "music"}
                    <option value="animation">アニメ</option>
                    <option value="game">ゲーム</option>
                    <option selected value="music">音楽</option>
                    <option value="tv">テレビ</option>
                    <option value="radio">ラジオ</option>
                  {elseif $_GET['category'] == "tv"}
                    <option value="animation">アニメ</option>
                    <option value="game">ゲーム</option>
                    <option value="music">音楽</option>
                    <option selected value="tv">テレビ</option>
                    <option value="radio">ラジオ</option>
                  {elseif $_GET['category'] == "radio"}
                    <option value="animation">アニメ</option>
                    <option value="game">ゲーム</option>
                    <option value="music">音楽</option>
                    <option value="tv">テレビ</option>
                    <option selected value="radio">ラジオ</option>
                  {else}
                    <option value="animation">アニメ</option>
                    <option value="game">ゲーム</option>
                    <option value="music">音楽</option>
                    <option value="tv">テレビ</option>
                    <option value="radio">ラジオ</option>
                  {/if}

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
              <input type="hidden" id="editId" name="editId" value="{if isset($id)}$id{/if}">
            </li>
            <li>
              <label for="editName">名前</label>
              <input
                type="text"
                id="editName"
                name="editName"
                class="nameInput"
                value="{if isset($name)}$name{/if}"
              />
            </li>
            <li>
              <label for="editMessage">内容</label>
              <textarea name="editMessage" id="editMessage" class="messageTextarea" >{if isset($message)}$message{/if}</textarea>
            </li>
            <li><input type="button" name="editSubmit" class="c-btn c-btn--pink" id="js-contentEditBtn" value="更新" /></li>
          </ul>
        </form>
      </div>
    </div>


    <!-- コンテンツ表示処理 -->
    <div id="ajax-result">
      {include file='src/View/load.tpl'}
    </div>

  </main>

<!-- フッター -->
{include file='src/View/footer.tpl'}
