<?php
try {
  //--------------------
  // データベースへ接続する
  //--------------------
  $pdo = new PDO("mysql:host=localhost;dbname=test_db", "user", "secret");

  //--------------------
  // エラーモードを例外モードに設定
  //--------------------
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //--------------------
  // 文字コードをUTF-8に設定する
  //--------------------
  $pdo->exec("SET NAMES utf8");
  //--------------------
  // テーブルからデータを取得
  //--------------------
  $stmt = $pdo->query("SELECT * FROM member");
  $memberList = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>データベース操作</title>
</head>
<body>
<h1>社員一覧</h1>
<table border="1" cellpadding="0" cellspacing="0">
  <tr>
    <th>社員番号</th>
    <th>氏名</th>
    <th>部署</th>
    <th>性別</th>
  </tr>
  <?php foreach($memberList as $members): ?>
    <tr>
    <td><?php echo $members["num"]; ?></td>
    <td><?php echo $members["name"]; ?></td>
    <td><?php echo $members["team"]; ?></td>
    <td><?php echo $members["gender"]; ?></td>
    </tr>
  <?php endforeach; ?>
</table>


 
</body>
</html>
