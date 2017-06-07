<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Boardテスト</title>
</head>
<body>
<!-- <h1>Database</h1>
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Title</th>
			<th>Content</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $odj): ?>
			<tr>
				<td><?= $odj->id ?></td>
				<td><?= h($odj->name) ?></td>
				<td><?= h($odj->title) ?></td>
				<td><?= h($odj->content) ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
 -->
 <h1>Boardサンプル</h1>
<?php foreach ($data as $odj): ?>
<pre><?php print_r($odj->toArray()) ?></pre>	
<?php endforeach; ?>
</body>
</html>