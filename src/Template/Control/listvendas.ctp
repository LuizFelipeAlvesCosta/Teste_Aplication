<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        
          <div align="center">
             <legend> Lista de Vendas </legend>
          </div>

          <div align="right">
                <?php
                  echo $this->Html->link(__('Adicionar Venda'), 
                  array('controller' => 'Control','action' => 'addvendas'), 
                  array('class' => 'btn btn-success btn-xs', 'escape' => false, 
                  'data-toggle' => 'tooltip', 'title' => 'Clique para Adicionar Venda'));
                ?>
          </div>

        <div class="box-body">
          <div style="overflow: auto;"> 
            <table id="example2" cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th align="center">Cód.Venda</th>
                        <th align="center">Nome</th>
                        <th align="center">Perfil</th>
                        <th align="center">Data da venda</th>
                        <th align="center">Valor da Venda</th>
                        <th align="center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php ?>
                      <tr>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center">
                          <?php
                            echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), 
                            array('controller' => 'Control','action' => ''), 
                            array('class' => 'btn btn-success btn-xs', 'escape' => false, 
                              'data-toggle'=>'tooltip', 'title' => 'Adicionar Boletos'));
                          ?>
                          <?php
                            echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), 
                            array('controller' => 'Control','action' => ''), 
                            array('class' => 'btn btn-info btn-xs', 'escape' => false, 
                              'data-toggle'=>'tooltip', 'title' => 'Visualizar Venda'));
                          ?>  
                          <?php
                            echo $this->Html->link(__('<i class="glyphicon glyphicon-download-alt"></i>'), 
                            array('controller' => 'Control','action' => ''), 
                            array('class' => 'btn btn-danger btn-xs', 'escape' => false, 
                            'data-toggle' => 'tooltip', 'title' => 'Estonar Venda','confirm' => 
                            'Deseja estornar essa venda ?'));
                          ?>  
                        </td>
                      </tr>    
                    <?php ?>        
                </tbody>   
            </table>
          </div>               
        </div>

        </div>
        </div>
        </div>
             
          <?php echo $this->Form->end();   ?>

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
          },"lengthMenu": [ 7, 10, 15, 20, 25,50,100,290,500],
          order: [[ 0, 'desc' ]]
      });

  });
</script>