<?php
require_once(dirname(__FILE__) . "/../../environment.php");

class ModelBase {

  protected static $dbh;

  public function __construct() {
    $this->initDb();
  }

  public function initDb() {
    try {
      global $dsn, $user, $pass;
      static::$dbh = new PDO($dsn, $user, $pass);
      static::$dbh->query('SET NAMES utf8mb4');
      static::$dbh->setAttribute(pdo::ATTR_EMULATE_PREPARES, false);
      static::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "接続失敗しました。: " . $e->getMessage() . "\n";
        exit();
    }
  }
}
