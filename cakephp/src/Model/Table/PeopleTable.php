<?php 
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PeopleTable extends Table{
	public function initialize(array $config){
		$this->hasOne('Boards', [
		'foreignKey'=>'person_id']);
	}
	public function validationDefault(Validator $validator){
		$validator->integer('id');
		$validator->notEmpty('name','必須項目です');
		$validator->notEmpty('password','必須項目です');
		$validator->notEmpty('comment','必須項目です');

		return $validator;
	}
	public function buildRules(RulesChecker $rules){
		$rules->inUnique(['name'],'すでに登録済みです');
		return $rules;
	}
}