<section class="content">
  <div class="box box-success">
    <div class="box-body">
      <div class="roles form large-9 medium-8 columns content">

         <div align='right'>
               <?php echo $this->Html->link(__('<i>Adicionar Grupo</i>'), 
                     array('action' => 'addgroup'), 
                     array('class' => 'btn btn-success btn-xs', 'escape' => false)); 
               ?>
         </div>
        
        <legend><?= __('Lista Grupos:') ?></legend>

        	<div class="box-body" align="center">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                         <td align="center"><b>Id</b></td>
                         <td align="center"><b>Nome</b></td>
                         <td align="center"><b>Descrição</b></td>
                         <td align="center"><b>Ações</b></td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($Grupos as $value):?>
                      <tr>
                        <td align="center"><?= $value['Id'] ?></td>
                        <td align="center"><?= $value['Nome'] ?></td>
                        <td align="center"><?= $value['Descricao'] ?></td>
                        <td align="center">
                         <?php
                          echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), 
                          array('controller' => 'Users','action' => 'editgroup',$value['Id']), 
                          array('class' => 'btn btn-info btn-xs', 'escape' => false, 
                          'data-toggle' => 'tooltip', 'title' => 'Editar'));
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
</section>

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
    $('#example1').DataTable({
        "language": {
            "lengthMenu": " ",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(Filtrado de _MAX_ total registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior"
            }
        },"lengthMenu": [ 7, 10, 15, 20, 25]
    });
});
</script>