<?php 
namespace App\Model\Table;

use Cake\ORM\Table;

class MembersTable extends Table{
	public function initialize(array $config){
		 $this->belongsTo('Teams', ['foreignKey' => 'team_id']);
	}
}