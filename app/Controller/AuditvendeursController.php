<?php
	class AuditvendeursController extends AppController{
		public function index(){
			$list = $this->Auditvendeur->find('all');
			$this->set('auditvendeurs',$list);
		}
		public function effacer($id){
			$this->Auditvendeur->delete($id);
			$this->flash(
				'cette historique est éffacé',
				array('controller'=>'auditvendeurs','action'=>'index')
			);
		}
		
	}

?>