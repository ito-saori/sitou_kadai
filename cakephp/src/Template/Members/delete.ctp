<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Membersテスト</title>
</head>
<body>
<h1>データの削除</h1>
<?=$this->Html->link('社員一覧のページに戻る', ['action'=>'index']); ?>  


<?=$this->Form->create($member,['url'=>['action'=>'delRecord']]) ?>
<!-- <pre><?php var_dump($teams) ?></pre> -->

<p>ID：<? echo $member["id"] ?></p>
<p>氏名：<? echo $member["name"] ?></p>
<p>部署：<? echo $member->team["team_name"] ?></p>
<p>性別：<? echo $member["gender"] ?></p>

<!-- <p>ID：<?=$this->request->data['id']; ?></p>
<p>氏名：<?=$this->request->data['name']; ?></p>
<p>部署：<?=$this->request->data['team']; ?></p>
<p>性別：<?=$this->request->data['gender']; ?></p> -->

<?=$this->Form->hidden("id") ?>

<?=$this->Form->button("削除する") ?>
<?=$this->Form->end() ?>


</body>
</html>