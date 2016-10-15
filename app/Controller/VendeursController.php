<?php
class VendeursController extends AppController{
	var $name = 'Vendeurs';
	var $scaffold;
	function index(){
	 $liste_de_vendeur =  $this->Vendeur->find('all');
	 $this->set('vendeurs', $liste_de_vendeur);
	}
	function ajout(){
		if(empty($this->data)==false){
			$resultat = $this->Vendeur->save($this->data);
			if($resultat){
				$this->flash(
				'le vendeur vient d\'etre ajouté',
				array('controller'=>'vendeurs','action'=>'index'));
			}
		}
	}
	function supprimer($id){
		$this->Vendeur->delete($id);
		$this->flash('le vendeur id=' . $id . ' a été effacé.',
		array ('controller'=>'vendeurs','action'=>'index'));
		
	}
	function modifier($id){
		$this->Vendeur->id = $id;
		if(empty($this->data)){
			$this->data = $this->Vendeur->read();
		}else{
			if($this->Vendeur->save($this->data)){
				$this->flash(
					'Le Vendeur id='.$id.'a été modifié',
					array('controller'=>'vendeurs','action'=>'index'));
				
			}
		}
	}
}

?>