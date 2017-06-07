<?php
namespace App\Controller;

use cake\Validation\Validator;

class BoardsController extends AppController {
	public function index($id=null){
		$data=$this->Boards->find('all')->contain(['People']);
		$this->set('data',$data);
	}
}