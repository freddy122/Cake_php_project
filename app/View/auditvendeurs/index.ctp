<script>
function cond(){
	(confirm('voulez-vous supprimer cet audit'));
 }
</script>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Audit vendeurs</div>
								
                            </div>
							
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>Utilisateur</th>
												<th>QUI</th>
												<th>QUOI</th>
												<th>QUAND</th>
												<th>ANCIEN SALAIRE</th>
												<th>NOUVEAU SALAIRE</th>
												<th>ACTION</th>
											</tr>
										</thead>
										
										<tbody>
										<?php foreach($auditvendeurs as $auditvendeur): ?>
											<tr class="odd gradeX">
												<td><?php echo $auditvendeur['Auditvendeur']['user'];?></td>
												<td><?php echo $auditvendeur['Auditvendeur']['qui'];?></td>
												<td><?php echo $auditvendeur['Auditvendeur']['quoi'];?></td>
												<td><?php echo date('j M  Y',strtotime($auditvendeur['Auditvendeur']['quand']));?></td>
												<td><?php echo $auditvendeur['Auditvendeur']['ancien_salaire'];?></td>
												<td><?php echo $auditvendeur['Auditvendeur']['new_salaire'];?></td>
												<td><?php echo $this->Html->link(
		'<button class="btn btn-warning" type="button" onclick="cond()">effacer historique</button>',array('controller'=>'auditvendeurs','action'=>'effacer',$auditvendeur['Auditvendeur']['id']),
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