<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Hello Page</title>
</head>
<body>
<h1>データベース練習</h1>
<?=$this->form->create($entity,['url'=>['action'=>'addRecord']]) ?>
<fieldset>
<?=$this->Form->text("name") ?>
<?=$this->Form->text("title") ?>
<?=$this->Form->textarea("content") ?>
</fieldset>

<?=$this->Form->button("送信") ?>
<?=$this->Form->end() ?>

<hr>

<table>
	<tr>
		<th>社員番号</th>
		<th>氏名</th>
		<th>部署</th>
		<th>性別</th>
	</tr>

</table>

</body>
</html>