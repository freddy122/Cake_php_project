<script>
function cond(){
	(confirm('voulez-vous supprimer ce vendeur'));
 }
</script>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Recette par jours</div>
								
                            </div>
							
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>Date recette</th>
												<th>Montant recette</th>
												<th>Action</th>
											</tr>
										</thead>
										
										<tbody>
										<?php foreach($recettejours as $recettejour): ?>
											<tr class="odd gradeX">
												<td><?php echo date('j M  Y, h:i',strtotime($recettejour['Recettejour']['date_recette']));?></td>
												<td><?php echo $recettejour['Recettejour']['montant_recette'];?></td>
												
												<td><?php echo $this->Html->link(
		'<button class="btn btn-warning" type="button" onclick="cond()">effacer historique</button>',array('controller'=>'recettejours','action'=>'effacer',$recettejour['Recettejour']['id']),
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