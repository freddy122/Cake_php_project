<?php
class RecettesController extends AppController{
	var $name = 'Recettes';
		var $scaffold;
	public function index(){
		
		$liste =  $this->Recette->find('all');
		$this->set('recettes',$liste);
	}
	function ajout(){
		if(empty($this->data)==false){
			$resultat=$this->Recette->save($this->data);
			if($resultat){
				$this->flash(
				'le recette vient d\'etre ajouté',
				array('controller'=>'recettes','action'=>'index'));
			}
		}
		
		$this->set('vendeurs',$this->Recette->Vendeur->find('list'));
	}
	function supprimer($id){
		$this->Recette->delete($id);
		$this->flash(
			'le recette id='.$id. ' a été supprimé',
			array('controller' => 'recettes', 'action'=>'index')
		);
	}
	function modifier($id){
		$this->Recette->id = $id;
		if (empty($this->data)){
			$this->data = $this->Recette->read();
		} else {
			if($this->Recette->save($this->data)){
				$this->flash(
					'le recette id = '.$id.' a été modifié',
					array('controller'=>'recettes','action'=>'index')
				);
			}
		}
	}
	
}


?>