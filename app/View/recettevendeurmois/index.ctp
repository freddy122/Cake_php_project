<script>
function cond(){
	(confirm('voulez-vous supprimer cette historique'));
 }
</script>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Recette par moi</div>
								
                            </div>
							
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>Nom</th>
												<th>Mois</th>
												<th>Ans</th>
												<th>Montant</th>
												<th>Action</th>
											</tr>
										</thead>
										
										<tbody>
										<?php foreach($recettevendeurmois as $recettevendeurmoi): ?>
											<tr class="odd gradeX">
												<td><?php echo $recettevendeurmoi['Vendeur']['name'];?></td>
												<td><?php echo $recettevendeurmoi['Recettevendeurmoi']['rc_mois'];?></td>
												<td><?php echo $recettevendeurmoi['Recettevendeurmoi']['rc_an'];?></td>
												<td><?php echo $recettevendeurmoi['Recettevendeurmoi']['montant'];?></td>
												<td><?php echo $this->Html->link(
		'<button class="btn btn-warning" type="button" onclick="cond()">effacer historique</button>',array('controller'=>'recettevendeurmois','action'=>'effacer',$recettevendeurmoi['Recettevendeurmoi']['id']),
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
	1: Janvier; 2: F�vrier; 3: Mars ; 4: Avril ; 5: May ; 6: Juin; 7: Juillet; 8: Aout; 9: Septembre; 10: Octobre; 11: Novembre;12: D�cembre;