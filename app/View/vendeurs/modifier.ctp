

<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Modification vendeur</div>
								
                            </div>
							
                            <div class="block-content collapse in">
                                <div class="span12">
  									<?php
echo $this->Form->create('Vendeur');
echo $this->Form->input('name');
echo $this->Form->input('salaire');
echo $this->Form->input('id',array('type' =>'hidden'));
echo $this->Form->end('Modifier');

?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>