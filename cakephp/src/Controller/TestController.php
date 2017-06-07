<?php
namespace App\Controller;

class TestController extends AppController {
	public function index(){
		$data=$this->Test->find('all');
		$this->set('data',$data);
	}
}
