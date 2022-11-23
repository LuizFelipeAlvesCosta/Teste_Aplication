<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-info">
                <legend align="center">
                <?= __('Visualizar Pessoa')?> 
                </legend>

                <div align="left">
                 <?php
                    
                    echo $this->Html->link(__('Voltar'), 
                    array('controller' => 'Control','action' => 'pessoas'), 
                    array('class' => 'btn btn-warning btn-xs'));
                 ?>   
                </div>

<div class="box-body">
  <div style="overflow: auto;"> 
    <table id="example2" cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
      <thead>
         <tr align="center">
            <td align="center"><b>Cod.Pessoa:</b></td>
            <td align="center"><b>Nome:</b></td>
            <td align="center"><b>Perfil:</b></td>
         </tr>
      </thead>
      <tbody>
        <?php foreach ($pessoas as $value):?>
        <tr>
           <td align="center"><?= $value['id'] ?></td>
           <td align="center"><?= $value['nome']?></td>
           <td align="center"><?= $value['perfil'] ?></td>
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