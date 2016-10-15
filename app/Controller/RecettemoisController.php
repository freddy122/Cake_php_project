<?php
class RecettemoisController extends AppController{
public $uses = array('Recettemois','Recettemoi');
 function index(){
 
	$liste = $this->Recettemoi->find('all');
	$this->set('recettemois',$liste);
 }
 function effacer($id){
		$this->Recettemois->delete($id);
		$this->flash(
			'le recette du mois qui a pour id='.$id. ' a &eacutet&eacute supprim&eacute',
			array('controller' => 'recettemois', 'action'=>'index')
		);
	}
}
?>