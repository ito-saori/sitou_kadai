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
  // テーブルへデータを追加
  //--------------------
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $isValidated = TRUE;
    $num=$_POST["num"];
    $name = $_POST["name"];
    $team = $_POST["team"];
    $gender=$_POST["gender"];

    if ($name === "") {
      $nameError = "氏名を入力してください";
      $isValidated = FALSE;
    }

    if ($isValidated == TRUE) {
      $stmt = $pdo->prepare("INSERT INTO member (num, name, team,gender) VALUES (?, ?, ?,?)");
      $stmt->execute(array($num, $name,$team,$gender));
      $name = "";
    }
  }

  //--------------------
  // テーブルからデータを取得
  //--------------------
  $stmt = $pdo->query("SELECT * FROM team_list");
  $team1=$stmt->fetchAll();
  $stmt = $pdo->query("SELECT * FROM member JOIN team_list ON member.team=team_list.team_num");
  $team = $stmt->fetchAll();
}
catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}
function h($string) {
  return htmlspecialchars($string, ENT_QUOTES);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>データベース操作</title>
</head>
<body>
  <form action="" method="post">
    <h2>社員</h2>
 <p>社員番号：<input type="text" name="num" value="<?php echo $num; ?>" /></p>
 <p>氏名：<input type="text" name="name" value="<?php echo $name; ?>" /></p>
  <p>部署：<!-- <input type="text" name="team" value="<?php echo $team; ?>" /> -->
  <select name="team" id="">
  <?php foreach($team1 as $teams): ?>
    <option value="<?php echo $teams["team_num"]; ?>"><?php echo $teams["team_name"]; ?></option>
  <?php endforeach; ?>
  </select>
  </p>
   <p>性別：
    <input type="radio" name="gender" value="f">女
    <input type="radio" name="gender" value="m">男
   </p>
    <p><input type="submit" value="送信" /></p>
  </form>
  <?php if($isValidated===false){echo $nameError;} ?> 
</body>
</html>
