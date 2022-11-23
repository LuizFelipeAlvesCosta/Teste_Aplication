<section class="content">
  <div class="row">
   <div class="col-md-6">
    <div class="box box-info">
     <div class="box-body">
      
      <legend align="center"><?= __('Editar Produto')?></legend>

      <div align="left">
                 <?php     
                    echo $this->Html->link(__('Voltar'), 
                    array('controller' => 'Control','action' => 'produto'), 
                    array('class' => 'btn btn-warning btn-xs'));
                 ?>   
      </div>

      <?php
      $x = null;
      echo $this->Form->create($x,['url' => ['controller' => 'Control',
      'action' => 'updateproduto',$id]]);
      ?>

      <?php foreach ($Produto as $value):?>

      <?php
        echo $this->Form->input('produto',['label' => 'Produto: *', 'type' => 'text',
        'value' => $value['produto']]);

        echo $this->Form->input('preco',['label' => 'Preço: *','value' => $value['preco']]); 
      ?>             
               
      <?php endforeach;?>

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