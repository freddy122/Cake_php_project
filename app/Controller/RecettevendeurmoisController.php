<?php
class RecettevendeurmoisController extends AppController{
public $uses = array('Recettevendeurmois','Recettevendeurmoi');
 function index(){
 
	$list = $this->Recettevendeurmoi->find('all');
	$this->set('recettevendeurmois',$list);
 }
 function effacer($id){
		$this->Recettevendeurmois->delete($id);
		$this->flash(
			'le recette du vendeur  '.$id. 'a &eacutet&eacute supprim&eacute',
			array('controller' => 'recettevendeurmois', 'action'=>'index')
		);
	}
}
?>