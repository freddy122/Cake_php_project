<?php 
	echo $this->Html->link(' ajout recette',array('controller'=>'recettes','action'=>'ajout'));
?>
<script>
function cond(){
	(confirm('voulez-vous supprimer cette recette'));
 }
</script>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Gestion de recettes</div>
								
                            </div>
							
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>Nom Vendeur</th>
												<th>DateRecette</th>
												<th>Montant</th>
												<th>Action</th>
												
											</tr>
										</thead>
										
										<tbody>
										<?php foreach($recettes as $recette):?>
											<tr class="odd gradeX">
												<td><?php echo $recette['Vendeur']['name'];?></td>
												<td><?php echo date('j M  Y, h:i',strtotime($recette['Recette']['date_recette']));?></td>
												<td><?php echo $recette['Recette']['montant'];?></td>
												<td><?php echo $this->Html->link(
		'<button class="btn btn-danger" type="button" onclick="cond()">supprimer</button>',array('controller'=>'recettes','action'=>'supprimer',$recette['Recette']['id']),
		array('escape'=>false));
		?>
		<?php echo $this->Html->link(
		'<button class="btn btn-info" type="button">modifier</button>',array('controller'=>'recettes','action'=>'modifier',$recette['Recette']['id']),
		array('escape'=>false));
		?></td>
												
											</tr>
										<?php endforeach; ?>	
										</tbody>
										
									</table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
<script>
        $(function() {
            
        });
        </script>