<?php
 
header("Content-type: text/html; charset=utf-8");
 
require_once("db_sample01.php");
$mysqli = db_connect();
 
if(empty($_POST)) {
	echo "<a href='update1.php'>update1.php</a>←こちらのページからどうぞ";
	exit();
}else{
	//名前入力チェック
	if (!isset($_POST['name'])  || $_POST['name'] === "" ){
		$errors['name'] = "名前が入力されていません。";
	}
	
	if(count($errors) === 0){
		//プリペアドステートメント
		$stmt = $mysqli->prepare("UPDATE member SET name=? WHERE num=?");
		if ($stmt) {
			//プレースホルダへ実際の値を設定する
			$stmt->bind_param('si', $name, $id);
			$name = $_POST['name'];
			$id = $_POST['id'];
			
			//クエリ実行
			$stmt->execute();
			//ステートメント切断
			$stmt->close();
		}else{
			echo $mysqli->errno . $mysqli->error;
		}
	}
}
 
// データベース切断
$mysqli->close();
		
?>
 
<!DOCTYPE html>
<html>
<head>
<title>変更画面</title>
</head>
<body>
<h1>変更画面</h1> 
 
<?php if (count($errors) === 0): ?>
<p>変更完了しました。</p>
<?php elseif(count($errors) > 0): ?>
<?php
foreach($errors as $value){
	echo "<p>".$value."</p>";
}
?>
<?php endif; ?>
<a href="updata1.php">戻る</a>	
</body>
</html>