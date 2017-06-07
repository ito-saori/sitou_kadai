<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Membersテスト</title>
</head>
<body>
<h1>社員一覧</h1>
<a href="Members/addMember">追加のページ</a>
<table cellpadding="0" cellspacing="0">
 <thead>
    <tr>
        <th><?= $this->Paginator->sort('id') ?></th>
        <th><?= $this->Paginator->sort('name') ?></th>
        <th><?= $this->Paginator->sort('team_name') ?></th>
        <th><?= $this->Paginator->sort('gender') ?></th>
        <th>修正</th>
        <th>削除</th>
    </tr>
 </thead>
 <tbody>
<?php foreach ($members as $member): ?>
    <tr>
        <td><?= $member->id ?></td>
        <td><?= h($member->name) ?>
        </td>
        <!-- <td>
        <?=$this->Form->create($entity,['url'=>['action'=>'editRecord']]) ?>
        <?=$this->Form->text("name") ?>
        <?=$this->Form->input("名前の変更",["type"=>"submit"]) ?>
        <?=$this->Form->hidden("id",["value"=>"$member->id"]) ?>
		<?=$this->Form->end() ?>
        </td> -->
        <td><?= h($member->team->team_name) ?></td>
        <td><?= h($member->gender) ?></td>
        <td>
        	<?=$this->Html->link('編集', ['controller'=>'Members','action'=>'edit',$member->id]); ?>		
		</td>
		<td>
		<?=$this->Html->link('削除', ['controller'=>'Members','action'=>'delete',$member->id]); ?>	
		<!-- <?=$this->Form->create($entity,['url'=>['action'=>'delete']]) ?>
        <?=$this->Form->hidden("id",["value"=>"$member->id"]) ?>
        <?=$this->Form->hidden("name",["value"=>"$member->name"]) ?>
        <?=$this->Form->hidden("team",["value"=>"$member->team"]) ?>
        <?=$this->Form->hidden("gender",["value"=>"$member->gender"]) ?>
        <?=$this->Form->input("削除",["type"=>"submit"]) ?>
		<?=$this->Form->end() ?> -->
		</td>
    </tr>
<?php endforeach; ?>
 </tbody>
</table>

<!-- <h1>社員名更新</h1>
<?=$this->Form->create($entity,['url'=>['action'=>'editRecord']]) ?>
<fieldset>
	<p>idを指定して苗字の変更</p>

	id<?=$this->Form->text("id") ?>
	氏名<?=$this->Form->text("name") ?>

</fieldset>
<?=$this->Form->button("送信") ?>
<?=$this->Form->end() ?> -->

<!-- <h2>削除</h2>
<?=$this->Form->create($entity,['url'=>['action'=>'delRecord']]) ?>
<fieldset>
	<?=$this->Form->text("id") ?>
</fieldset>
<?=$this->Form->button("送信") ?>
<?=$this->Form->end() ?> -->


<!-- <?=$this->Form->create($entity,['url'=>['action'=>'addRecord']]) ?>
<fieldset>
	氏名<?=$this->Form->text("name") ?>
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
<?=$this->Form->end() ?> -->
<!-- 
<h1>社員一覧検索</h1>
<?=$this->Form->create($entity,['url'=>['action'=>'index']]) ?>
<fieldset>
	<?=$this->Form->text("id") ?>
</fieldset>
<?=$this->Form->button("送信") ?>
<?=$this->Form->end() ?> -->



</body>
</html>