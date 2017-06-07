<?php 
namespace App\Model\Entity;

use Cake\ORM\Enitiy;

class Test extends Entity{
	protected $_accessible =[
	'*'=>true,
	'id'=>false
	];
}