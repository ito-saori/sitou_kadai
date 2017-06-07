<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

class MembersController extends AppController {
	public function index($id=null){

		$query=$this->Members
			->find()
			->contain(['Teams'])
			->order(['Members.id'=>'ASC']);

		$this->set('members',$this->paginate($query)); 
    	$this->set('entity',$this->Members->newEntity());

    	if($id !=null){
            try{
                   $entity=$this->Members->get($id);
                   $this->set('entity',$entity);
              }catch(Exception $e){
                   Log::write('debug',$e->getMessage());
              }
         }
         $data=$this->Members->find('all')->order(['id'=>'DESC']);
         $this->set('data',$data->toArray());
         $this->set('count',$data->count());

		$this->set('entity',$this->Members->newEntity());
		if($this->request->is('post')){
			$data=$this->Members->find('all',[
				'conditions'=>['id'=>$this->request->data['id']]
				]);
		}else{
			$data=$this->Members->find('all');
		}
		$this->set('data',$data);
	}
	public function addMember(){
    	$member=$this->Members
    			->find()
    			->contain(['Teams'])
    			->order(['Members.id'=>'ASC']);
    			// debug($query);

    	$this->Teams = TableRegistry::get('Teams');
		$teams = $this->Teams->find()->order(['id' => 'ASC'])->all();
		// debug($teams);

		$teamsList = [];
		foreach ($teams as $team) {
			$teamsList[] = [
				'value' => $team->id,
				'text' => $team->team_name,
			];
		}
		$this->set('teams', $teamsList);
		$this->set('member',$member);
		$this->set('entity',$this->Members->newEntity());
	}
	public function reName(){
    	$query=$this->Members->find()->contain(['Teams'])->order(['Members.id'=>'ASC']);
		$this->set('members',$this->paginate($query));
		$this->set('entity',$this->Members->newEntity());

	}
	public function edit($id=null){
		$member = $this->Members->get($id);
		$this->set('member',$member);

		$this->Teams = TableRegistry::get('Teams');
		$teams = $this->Teams->find()->order(['id' => 'ASC'])->all();
		$teamsList = [];
		foreach ($teams as $team) {
			$teamsList[] = [
				'value' => $team->id,
				'text' => $team->team_name,
			];
		}

		$this->set('teams', $teamsList);

	}
	public function delete($id=null){

		$member = $this->Members
				->find()
				->contain(['Teams'])
				->where([
					'Members.id'=>$id,
				])
				->first();

		// debug($member);
		$this->set('member',$member);

		$this->Teams = TableRegistry::get('Teams');
		$teams = $this->Teams->find()->order(['id' => 'ASC'])->all();

		$teamsList = [];
		foreach ($teams as $team) {
			$teamsList[] = [
				'value' => $team->id,
				'text' => $team->team_name,
			];
		}
		$this->set('teams', $teamsList);
	
		// $query=$this->Members->find()->contain(['Teams'])->order(['Members.id'=>'ASC']);
		// $this->set('members',$this->paginate($query));
		// $this->set('entity',$this->Members->newEntity());
	}
	public function addRecord(){
		if($this->request->is('post')){
			$member=$this->Members->newEntity($this->request->data);
			$this->Members->save($member);
		}
		return $this->redirect(['action'=>'index']);
	}
	public function delRecord(){
		if($this->request->is('post')){
			try{
				$entity=$this->Members->get($this->request->data['id']);
				$this->Members->delete($entity);
			}catch(Exception $e){
				Log::write('debug',$e->getMessage());
			}
		}
		$this->redirect(['action'=>'index']);
	}
    public function editRecord(){
         if($this->request->is('post')){
              $arr1=['id'=>$this->request->data['id']];
              $arr2=['name'=>$this->request->data['name'],'team_id'=>$this->request->data['team_id'],'gender'=>$this->request->data['gender']];
          
              $this->Members->updateAll($arr2,$arr1);
         }
         return $this->redirect(['action'=>'index']);
    }
    



}