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
												<th>id</th>
												
											</tr>
										</thead>
										
										<tbody>
										<?php foreach($users as $user): ?>
											<tr class="odd gradeX">
												<td><?php echo $user['User']['id'];?></td>
												
												
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