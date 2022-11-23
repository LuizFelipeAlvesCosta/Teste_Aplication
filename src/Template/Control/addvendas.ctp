<?php
  
  $Vend[0] = 'Selecione...';
  foreach ($Vendedor  as $value) {
      $Vend[$value['id']] = $value['nome'];
  }

  $Cli[0] = 'Selecione...';
  foreach ($Cliente  as $value) {
      $Cli[$value['id']] = $value['nome'];
  }

  $x = ['Selecione...','Avista','Parcelado'];
  $Form= [];
  for($i = 0; $i < sizeof($x); $i++){
      $Form[$x[$i]] = $x[$i];
  }
?>

<section class="content">
 <div class="row">
  <div class="col-md-8">
   <div class="box box-info">
    <div class="box-body">
      
      <legend align="center"><?= __('Realizar Venda')?></legend>

      <br>

        <div align="left">
            <?php
              echo $this->Html->link(__('Voltar'), 
              array('controller' => 'Control','action' => 'listvendas'), 
              array('class' => 'btn btn-warning btn-xs', 'escape' => false, 
                'data-toggle'=>'tooltip', 'title' => 'Voltar'));
            ?>
        </div>
      <?php
        $x = null;
        echo $this->Form->create($x,['url' => ['controller' => 'Control',
        'action' => 'insertvendas']]);
      ?>
      
      <br>
      <div class="col-md-6">
        <?php
          echo $this->Form->input('idvendedor',['id' => 'idvendedor','class' => 
          'form-control select2','label'=>'Vendedor: *','required','options' => $Vend]);
        ?>  
      </div>
      <div class="col-md-6">
        <?php
          echo $this->Form->input('idcliente',['id' => 'idcliente','class' => 
          'form-control select2','label'=>'Cliente: *','required','options' => $Cli]);
        ?>  
      </div>
      <br><br>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <div class="box-header">
              <h3 class="box-title">Itens de Venda</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th><b>Produto</b></th>
                  <th><b>Quantidade</b></th>
                  <th><b>Valor</b></th>
                  <th><b>Valor Total</b></th>
                </tr>
                <?php 
                  $count = 0;
                  foreach ($Produto as $value):
                ?>
                <tr>
                   <td align="center"><br><?= $value['produto'] ?></td>
                   <td align="center">
                    <?= $this->Form->input('qtd[]',['id' => $count.'qtd','label' =>'',
                        'onchange' => 'valor()','value' => 0]); ?>
                   </td> 
                   <td align="center"><br>R$ <?= $value['preco'] ?>
                      
                   </td> 
                   <td align="center">
                    <br>
                     <p id=<?= $count.'vlrtotal' ?>></p>
                  </td> 

              </tr> 

                <div style="display:none">
                    <?php echo $this->Form->input('vlr[]',['id' => $count.'vlr','label' =>'','value' => $value['preco']]); ?>
                </div>
              <?php 
                 $count++; 
                 endforeach; 
              ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>  

          <div style="display:none">
           <?php
              echo $this->Form->input('quantidade',['id' => 'quantidade','value' => $count]); 
              echo $this->Form->input('vallor',['id' => 'vallor']);
              echo $this->Form->input('datavenda',['id' => 'datavenda','value'=>$date = date('d/m/Y');]); 
           ?> 
          </div> 

           <script type="text/javascript">     

              var quantidade = (document.getElementById('quantidade').value);

              function valor(){

                  for(var i = 0; i < quantidade; i++){

                     var qtd = document.getElementById(i + 'qtd').value;
                     var vlr = document.getElementById(i + 'vlr').value;

                     var novqtd = qtd.split(",").join(".");
                     qtds = parseFloat(novqtd);
                     var totalvenda = (qtd * vlr);

                     document.getElementById([i] +'vlrtotal').innerHTML = totalvenda;
                     document.getElementById('result').innerHTML = totalvenda;
                     document.getElementById('vallor').value = totalvenda;
                  }     
              }
           </script>

          <div align="center">
           <input type="button" onClick="somarValores()" value="Concluir Venda" 
            data-toggle="modal" data-target="#modal-dois">  
          </div>

          <div class="modal modal-Default fade" id="modal-dois">
           <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                    <h4 class="modal-title">Informe os Parametros</h4>
              </div>

                <div class="modal-body">
                 <section class="content">
                  <div class="tab-content">
                   <div class="box-tools pull-right">
                    </div>
                  </div>

                  <div class="box-body">
                   <div class="chart">
                    <div class="box-body">
                     <div class="roles form large-9 medium-8 columns content">


                      <table id="example2" cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th align="center">Data da Venda</th>
                                <th align="center">Valor total da Venda</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr align="center">
                                <td align="center"><?= $date = date('d/m/Y'); ?></td>
                                <td align="center"><p id="result"></td>
                          </tr>
                        </tbody>
                      </table>

                      <table id="example2" cellpadding="0" cellspacing="0" class="table table-bordered table-hover"> 
                        <thead>
                            <tr align="center">
                                <th align="center">Pagamento</th>
                                <th align="center">Parcelas</th>
                                <th align="center">Valor das Parcelas</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr align="center">
                                <th align="center">
                                  <?php
                                    echo $this->Form->input('forma',['id' => 'forma','label' => '',
                                    'options' => $Form]);
                                  ?>
                                </th>
                                <th align="center">
                                  <?php
                                    echo $this->Form->input('qtdprc',['id' => 'qtdprc','label' => '',
                                    'onchange' => 'parcelas()']);
                                  ?>
                                </th>
                                <th align="center"><br><p id="vl"> </th>
                          </tr>
                        </tbody>
                      </table> 

                    <input type="button" onclick="add_row();" value="Add Vencimento das Parcelas" 
                    align="center">
                    <br><br>
                      

                   <table id="employee_table">
                      <tr id="row1">
                        <td><input type="text" id="vencimento" name="vb[]" onkeypress="mascaraData(this)" 
                             maxlength="10" placeholder="Vencimento Boleto"></td>
                      </tr>
                   </table>

            <script type="text/javascript">  
              function parcelas(){

                   var vlrvenda = document.getElementById('vallor').value;
                   var qtdprcl = document.getElementById('qtdprc').value;

                   var total = (vlrvenda / qtdprcl);

                   document.getElementById("vl").innerHTML = total.toFixed(2);
              }


              function add_row(){
                 $rowno=$("#employee_table tr").length;
                 $rowno=$rowno+1;
                 $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='vb[]' placeholder='Vencimento Boleto'></td></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
              }

              function delete_row(rowno){

                $('#'+rowno).remove();
              } 

              function mascaraData(val) {

                var pass = val.value;
                var expr = /[0123456789]/;

                for (i = 0; i < pass.length; i++) {
                  // charAt -> retorna o caractere posicionado no índice especificado
                  var lchar = val.value.charAt(i);
                  var nchar = val.value.charAt(i + 1);

                  if (i == 0) {
                    // search -> retorna um valor inteiro, indicando a posição do inicio da primeira
                    // ocorrência de expReg dentro de instStr. Se nenhuma ocorrencia for encontrada o método retornara -1
                    // instStr.search(expReg);
                    if ((lchar.search(expr) != 0) || (lchar > 3)) {
                      val.value = "";
                    }

                  } else if (i == 1) {

                    if (lchar.search(expr) != 0) {
                      // substring(indice1,indice2)
                      // indice1, indice2 -> será usado para delimitar a string
                      var tst1 = val.value.substring(0, (i));
                      val.value = tst1;
                      continue;
                    }

                    if ((nchar != '/') && (nchar != '')) {
                      var tst1 = val.value.substring(0, (i) + 1);

                      if (nchar.search(expr) != 0)
                        var tst2 = val.value.substring(i + 2, pass.length);
                      else
                        var tst2 = val.value.substring(i + 1, pass.length);

                      val.value = tst1 + '/' + tst2;
                    }

                  } else if (i == 4) {

                    if (lchar.search(expr) != 0) {
                      var tst1 = val.value.substring(0, (i));
                      val.value = tst1;
                      continue;
                    }

                    if ((nchar != '/') && (nchar != '')) {
                      var tst1 = val.value.substring(0, (i) + 1);

                      if (nchar.search(expr) != 0)
                        var tst2 = val.value.substring(i + 2, pass.length);
                      else
                        var tst2 = val.value.substring(i + 1, pass.length);

                      val.value = tst1 + '/' + tst2;
                    }
                  }

                  if (i >= 6) {
                    if (lchar.search(expr) != 0) {
                      var tst1 = val.value.substring(0, (i));
                      val.value = tst1;
                    }
                  }
                }

                if (pass.length > 10)
                  val.value = val.value.substring(0, 10);
                return true;
              }
            </script>

                            <br>
                            <br>


                              <div align="center" id="botao">
                                  <button class="btn btn-success" type="submit" onclick="bloqueio()">
                                            <?php echo __('Salvar');?>   
                                  </button>
                              </div>

                              <div align="center" id="venda">
                                <button>
                                  <?php echo $this->Html->link(__('Realizar Nova Venda'), 
                                        array('controller'=> 'control','action' => 'vendas')); 
                                  ?>
                                </button>
                              </div>
                     </div>   
                    </div>
                   </div>
                  </div>
                 </section>
                </div>

            </div>
           </div>
          </div>         

    </div>
  </div>
</section>
<script type="text/javascript">

  document.getElementById("venda").style.display = "none";  

  function bloqueio(){
  
      document.getElementById("botao").style.display = "none";  
      document.getElementById("venda").style.display = "block";   

  }
</script>

<?php
  $this->Html->css([
      'AdminLTE./plugins/daterangepicker/daterangepicker-bs3',
      'AdminLTE./plugins/iCheck/all',
      'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
      'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
      'AdminLTE./plugins/select2/select2.min',
    ],
    ['block' => 'css']);

  $this->Html->script([
    'AdminLTE./plugins/select2/select2.full.min',
    'AdminLTE./plugins/input-mask/jquery.inputmask',
    'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
    'AdminLTE./plugins/input-mask/jquery.inputmask.extensions',
    'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
    'AdminLTE./plugins/daterangepicker/daterangepicker',
    'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
    'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
    'AdminLTE./plugins/iCheck/icheck.min',
  ],
  ['block' => 'script']);
  ?>
  <?php $this->start('scriptBotton'); ?>
  <script>
    $(function () {
      //Initialize Select2 Elements
      $(".select2").select2();
    });
  </script>
<?php $this->end(); ?>