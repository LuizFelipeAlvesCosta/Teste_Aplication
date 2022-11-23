<?php
  $x = ['Selecione...','Cliente','Vendedor'];
  $sel= [];
  for($i = 0; $i < sizeof($x); $i++){
      $sel[$x[$i]] = $x[$i];
  }
?>

<section class="content">
  <div class="row">
   <div class="col-md-6">
    <div class="box box-info">
     <div class="box-body">
      
      <legend align="center"><?= __('Nova Pessoa')?></legend>

      <div align="left">
                 <?php
                    
                    echo $this->Html->link(__('Voltar'), 
                    array('controller' => 'Control','action' => 'pessoas'), 
                    array('class' => 'btn btn-warning btn-xs'));
                 ?>   
      </div>

      <?php

      $x = null;
      echo $this->Form->create($x,['url' => ['controller' => 'Control',
      'action' => 'insertpessoa']]);

      echo $this->Form->input('nome',['id'=>'nome','label'=>'Nome']);

      echo $this->Form->input('perfil',['id'=>'perfil','label'=>'Perfil','options'=>$sel,'required']);

      ?>             


            <div align="center" id="botao">
                <button class="btn btn-success" type="submit" onclick="bloqueio()">
                          <?php echo __('Salvar');?>   
                </button>
            </div>

    </div>
  </div>
</section>
<script type="text/javascript">
  function bloqueio(){
      
      document.getElementById("botao").style.display = "none";   
  }
</script>