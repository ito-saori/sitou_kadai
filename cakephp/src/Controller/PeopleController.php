<?php
namespace App\Controller;

use App\Contorller\AppContoroller;

class PeopleController extends AppController {
	public function index(){
		$query=$this->People->find()->contain(['Boards']);
		$this->set('data',$this->paginate($query));
	}
}