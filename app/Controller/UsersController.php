<?php
class UsersController extends AppController{
public $uses = array('Users','User');
 function index(){
	$lis = $this->User->find('all');
	$this->set('users',$lis);
 }

}
?>