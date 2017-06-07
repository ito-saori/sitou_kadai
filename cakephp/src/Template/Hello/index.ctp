<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Hello Page</title>
</head>
<body>
<h1>フォームサンプル</h1>
<p>
	<?=$result; ?>
</p>
<p>フォームの送信</p>
<?=$this->Form->create(null,['type'=>'post','url'=>['controller'=>'Hello','action'=>'index']]) ?>
<?=$this->Form->text("HelloForm.text1")?>
<?=$this->Form->submit("送信") ?>
<?=$this->Form->end(); ?>

<!-- <form action="/cakephp/Hello/sendForm" method="get">
	<input type="text" name="text1">
	<input type="submit">
</form> -->
</body>
</html>