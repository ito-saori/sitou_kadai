<?php 
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class BoardsTable extends Table{
	public function initialize(array $config){
		$this->belongsTo('people');
	}
	public function validationDefault(validator $validator){
		$validator->integer('id');
		$validator->notEmpty('name','必須項目です');
		$validator->notEmpty('password','必須項目です');
		$validator->notEmpty('comment','必須項目です');
		return $validator;
	}
}