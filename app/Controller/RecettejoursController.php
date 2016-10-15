<?php
class RecettejoursController extends AppController{
public $uses = array('Recettejours','Recettejour');
 function index(){
	$lister = $this->Recettejour->find('all');
	$this->set('recettejours',$lister);
 }
 function effacer($id){
		$this->Recettejours->delete($id);
		$this->flash(
			'le recette du jour id='.$id. ' a été supprimé',
			array('controller' => 'recettejours', 'action'=>'index')
		);
	}
}
?>