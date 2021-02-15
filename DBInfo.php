<?php

// DB接続情報を扱うクラス
class DBInfo
{
  // クラス内定数
  const DSN = 'mysql:dbname=rescued_pets;host=localhost;port=3306';
  const USER = 'root';
  // const PASSWORD = '2ew4epHNs';
  const PASSWORD = '';
}

function getPdo()
{
  try {
    $pdo = new PDO(DBInfo::DSN, DBInfo::USER, DBINfo::PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  } catch (PDOException $e) {
    //エラー情報の表示
    $code = $e->getCode();      //エラーコードの取得
    $message = $e->getMessage();  //エラーメッセージの取得
    print("{$code}/{$message}<br/>");
    exit;
  }
}
