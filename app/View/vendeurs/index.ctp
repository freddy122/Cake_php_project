

	

<?php 
	echo $this->Html->link('Ajout Vendeur',array('controller'=>'vendeurs','action'=>'ajout'));
?>
<script>
function cond(){
	(confirm('voulez-vous supprimer ce vendeur'));
 }
</script>
 
		
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Gestion de vendeurs</div>
								
                            </div>
							
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>Nom</th>
												<th>salaire</th>
												<th>Action</th>
												
											</tr>
										</thead>
										
										<tbody>
										<?php foreach($vendeurs as $vendeur):?>
											<tr class="odd gradeX">
												<td><?php echo $vendeur['Vendeur']['name']?></td>
												<td><?php echo $vendeur['Vendeur']['salaire']?></td>
												<td ><?php echo $this->Html->link(
		'<button class="btn btn-danger" type="button" onclick="cond()">supprimer</button>',array('controller'=>'vendeurs','action'=>'supprimer',$vendeur['Vendeur']['id']),
		array('escape'=>false));
		?>
		<?php echo $this->Html->link(
		'<button class="btn btn-info" type="button">modifier</button>',array('controller'=>'vendeurs','action'=>'modifier',$vendeur['Vendeur']['id']),
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
	

		
		



