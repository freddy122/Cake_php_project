<?php
class Vendeur extends AppModel{
	var $name = 'Vendeur';
	var $hasMany = 'Recette';
var $hasOne = 'Recette';
	
}
?>