<?php 
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Person Extends Entity{
	protected $_accessible=[
	'*'=>true,
	'id'=>false];
}