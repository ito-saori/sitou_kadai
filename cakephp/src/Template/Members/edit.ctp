<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Membersテスト</title>
</head>
<body>
<h1>データの修正</h1>
<?=$this->Html->link('社員一覧のページに戻る', ['action'=>'index']); ?>  

<?=$this->Form->create($member,['url'=>['action'=>'editRecord']]) ?>
<?=$this->Form->hidden("id") ?>
<fieldset>
    氏名
    <?=$this->Form->text("name") ?>
    部署
    <?=$this->Form->select('team_id', $teams, ['default'=>$member->team_id]); ?>
    性別
    <?=$this->Form->radio("gender",[
            ['text'=>'女','value'=>'f'],
            ['text'=>'男','value'=>'m']
        ],
        ['label'=>true,'default'=>'$member->gender']) ?>
</fieldset>
<?=$this->Form->button("送信") ?>
<?=$this->Form->end() ?>


</body>
</html>