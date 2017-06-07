<?php 
$num1=$_GET["num1"];
$num2=$_GET["num2"];
$siki=$_GET["siki"];
if($_SERVER["REQUEST_METHOD"] != "POST"){

if($siki==kasan){
		$total=$num1+$num2;
	}
	elseif ($siki==genzan) {
		$total=$num1-$num2;
	}
	elseif($siki==jouzan){
		$total=$num1*$num2;
	}
	elseif ($siki==jozan) {
		$total=$num1/$num2;
	}
}else{

}
 ?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>PHPで四則演算</title>
</head>
<body>
	<form action="" method="get">
		<input type="number" name="num1">
		<input type="number" name="num2">
		<select name="siki" id="">
			<option value="kasan">加算</option>
			<option value="genzan">減算</option>
			<option value="jouzan">乗算</option>
			<option value="jozan">除算</option>
		</select>
		<input type="submit">
	</form>
	結果は<?php echo $total; ?>
</body>
</html>