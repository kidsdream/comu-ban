<?php

  function db_connect() {

    $dsn = 'mysql:dbname=comuban;host=localhost;charset=utf8mb4';
    $user = 'root';
    $pass = 'root';

    // データベース接続
    try {
      $dbh = new PDO($dsn, $user, $pass);
      $dbh->query('SET NAMES utf8mb4');
      $dbh->setAttribute(pdo::ATTR_EMULATE_PREPARES, false);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $dbh;
    } catch (PDOException $e) {
        echo "接続失敗しました。: " . $e->getMessage() . "\n";
        exit();
    }
  }
