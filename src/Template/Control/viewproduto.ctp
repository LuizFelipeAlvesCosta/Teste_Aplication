<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-info">
                <legend align="center">
                <?= __('Visualizar Produto')?> 
                </legend>

                <div align="left">
                 <?php
                    
                    echo $this->Html->link(__('Voltar'), 
                    array('controller' => 'Control','action' => 'produto'), 
                    array('class' => 'btn btn-warning btn-xs'));
                 ?>   
                </div>

<div class="box-body">
  <div style="overflow: auto;"> 
    <table id="example2" cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
      <thead>
         <tr align="center">
            <td align="center"><b>Cod.Produto:</b></td>
            <td align="center"><b>Descrição:</b></td>
            <td align="center"><b>Preço de Venda:</b></td>
         </tr>
      </thead>
      <tbody>
        <?php foreach ($Produto as $value):?>
        <tr>
           <td align="center"><?= $value['id'] ?></td>
           <td align="center"><?= $value['produto']?></td>
           <td align="center">R$ <?= $value['preco'] ?></td>
        </tr> 
        <?php endforeach; ?>                     
       </tbody> 
    </table>    
   

  </div>               
</div>

            </div>
        </div>
    </div>
</section>                         