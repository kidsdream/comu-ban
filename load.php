<!-- データ一覧表示 -->
<?php
  $dbh = db_connect();
  // 一画面に表示するデータ件数指定
  $displayCount = 21;
  if (isset($_GET['page']) && is_numeric($_GET['page'])){
    $page = $_GET['page'];
  } else {
    $page = 1;
  }

  $user_id = $_COOKIE["userId"];
  $start = $displayCount * ($page - 1);

  if (isset($_GET['category'])){
    $category = $_GET['category'];
    $stmt = $dbh->prepare('SELECT id, name, message, user_id, created_at FROM messages WHERE category = :category ORDER BY id DESC LIMIT :start, ' . $displayCount);
    $stmt->bindValue(':category', $category, PDO::PARAM_STR);
    $stmt->bindValue(':start', $start, PDO::PARAM_INT);
  } else {
    $stmt = $dbh->prepare('SELECT id, name, message, user_id, created_at FROM messages ORDER BY id DESC LIMIT :start, ' . $displayCount);
    $stmt->bindValue(':start', $start, PDO::PARAM_INT);
  }
  $stmt->execute();
?>

<div class="l-flex u-mt30 addContent">
  <?php while($value = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
    <article class="p-contents">
      <div class="p-info">
        <h2 class="p-info__name"><?php echo $value['name']; ?></h2>
        <time class="p-info__time"><?php echo date('Y年m月d日 H:i', strtotime($value['created_at'])); ?></time>
          <?php if($value['user_id'] == ($_COOKIE["userId"])) { ?>
            <form class="" action="" method="post">
              <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
              <input type="submit" name="remove" class="removeBtn js-remove" value="削除" onclick="return confirm('本当に削除しますか？')">
              <button type="button" name="edit" class="editBtn js-edit" onclick="js_edit();">編集</button>
            </form>
          <?php } ?>

      </div>
      <p class="p-message"><?php echo $value['message']?></p>
    </article>
  <?php endwhile ?>
</div>
