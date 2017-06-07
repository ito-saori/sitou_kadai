<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>peopleテスト</title>
</head>
<body>
<!-- <pre><?php print_r($data) ?></pre> -->
<!-- <h1>peopleサンプル</h1>
<?php foreach($data as $obj): ?>
	<pre><?php print_r($obj->toArray()) ?></pre>
<?php endforeach; ?>
</body> -->

<table>
	<thead>
		<tr>
			<th><?=$this->paginator->sort('id') ?></th>
			<th><?=$this->paginator->sort('name') ?></th>
			<th><?=$this->paginator->sort('title') ?></th>
			<th><?=$this->paginator->sort('content') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($data as $obj): ?>
		<tr>
			<td><?= h($obj->id) ?></td>
			<td><?= h($obj->name) ?></td>
			<td><?= h($obj->board->title) ?></td>
			<td><?= h($obj->board->content) ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
<?php foreach($data as $obj): ?>
	<pre><?php print_r($obj->toArray()) ?></pre>
<?php endforeach; ?>

</html>