<?php
 
header("Content-type: text/html; charset=utf-8");
 
require_once("db_sample01.php");
$mysqli = db_connect();
 
$sql = "SELECT * FROM member";
 
$result = $mysqli -> query($sql);
 
//クエリ失敗
if(!$result) {
	echo $mysqli->error;
	exit();
}
 
//連想配列で取得
while($row = $result->fetch_array(MYSQLI_ASSOC)){
	$rows[] = $row;
}
 
//結果セットを解放
$result->free();
 
// データベース切断
$mysqli->close();
 
?>
 
<!DOCTYPE html>
<html>
<head>
<title>社員一覧</title>
</head>
<body>
<h1>社員一覧</h1> 
 
<table border='1'>
<tr><td>社員番号</td><td>氏名</td><td>名前を変更する</td><td>部署</td><td>性別</td></tr>
 
<?php 
foreach($rows as $row){
 ?>
 
<tr> 
	<td><?=$row['num']?></td>
	<td><?=htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8')?></td>
	<td>
		<form action="update2.php" method="post">
		<input type="submit" value="変更する">
		<input type="hidden" name="id" value="<?=$row['num']?>">
		</form>
	</td>
	<td><?=$row['team']?></td>
	<td><?=$row['gender']?></td>
</tr>
 
 <?php 
 } 
 ?>

 
</table>
 
</body>
</html>