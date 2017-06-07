<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Membersテスト</title>
</head>
<body>
<h1>データの修正</h1>
<a href="../Members">戻る</a>
<!-- <pre><?php var_dump($this) ?></pre> -->  

<?=$this->Form->create($entity,['url'=>['action'=>'editRecord']]) ?>
<fieldset>
    氏名<?=$this->Form->text("name",array('value'=>"name")) ?>
    <?=$this->Form->hidden("id") ?>
    部署
    <select name="team_id">
    <?php foreach ($members as $member): ?>
        <option value="<?= h($member->team_id) ?>"><?= h($member->team->team_name) ?></option>
    <?php endforeach; ?>
    </select>
    性別<?=$this->Form->radio("gender",[
    ['text'=>'女','value'=>'f'],
    ['text'=>'男','value'=>'m']
    ],
    ['label'=>true,'value'=>'m']) ?>
</fieldset>
<?=$this->Form->button("送信") ?>
<?=$this->Form->end() ?>


</body>
</html>