<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-danger">
             <div align="center">
             <legend> Lista Pessoas </legend>
             </div>

            <div align="right">
                <?php
                  echo $this->Html->link(__('Adicionar Pessoas'), 
                  array('controller' => 'Control','action' => 'addpessoa'), 
                  array('class' => 'btn btn-success btn-xs', 'escape' => false, 
                  'data-toggle' => 'tooltip', 'title' => 'Clique para Adicionar Fornecedor'));
                ?>
            </div>

<br>
<div class="box-body">
  <div style="overflow: auto;"> 
    <table id="example2" cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
        <thead>
            <tr align="center">
                <th align="center">Cód.Pessoa</th>
                <th align="center">Nome</th>
                <th align="center">Perfil</th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Pessoas as $value):?>
              <tr>
                <td align="center"><?= $value['id'] ?></td>
                <td align="center"><?= $value['nome'] ?></td>
                <td align="center"><?= $value['perfil'] ?></td>
                <td align="center">
                <?php
                  echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), 
                  array('controller' => 'Control','action' => 'viewpessoa',$value['id']), 
                  array('class' => 'btn btn-success btn-xs', 'escape' => false, 
                  'data-toggle' => 'tooltip', 'title' => 'Visualizar Pessoas'));
                ?> 
                <?php
                  echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), 
                  array('controller' => 'Control','action' => 'editpessoa',$value['id']), 
                  array('class' => 'btn btn-warning btn-xs', 'escape' => false, 
                  'data-toggle' => 'tooltip', 'title' => 'Editar Pessoas'));
                ?> 
                <?php
                  echo $this->Html->link(__('<i class="glyphicon glyphicon-trash"></i>'), 
                  array('controller' => 'Control','action' => 'deletepessoa',$value['id']), 
                  array('class' => 'btn btn-danger btn-xs', 'escape' => false, 
                  'data-toggle' => 'tooltip', 'title' => 'Excluir Pessoa'));
                ?> 
                </td>
              </tr>    
            <?php endforeach; ?>        
        </tbody>   
    </table>
  </div>               
</div>

        </div>
        </div>
        </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"></link>

<?php
$this->Html->script(['AdminLTE./plugins/fileSaver/FileSaver.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/canvasToBlob/canvas-toBlob.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/Chart.js-2.3.0/dist/Chart.js',], ['block' => 'script']);
$this->Html->script(['//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js',], ['block' => 'script']);
?>

<script>
$(document).ready(function(){
    $('#example2').DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(Filtrado de _MAX_ total registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior"
            }
        },"lengthMenu": [ 7, 10, 15, 20, 25,50,100,290,350],
        order: [[ 0, 'desc' ]]
    });

});
</script>
