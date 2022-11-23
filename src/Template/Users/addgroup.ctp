<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-success">
        <div class="box-body">
          <div class="roles form large-9 medium-8 columns content">
            <fieldset>
                    
                  <legend><?= __('Adicionar Grupo:') ?></legend>
                  
                  <?php

                    $x = null;
                    echo $this->Form->create($x,['url' =>['controller' => 'Users',
                    'action' => 'insertgroup']]);

                    echo $this->Form->input('nome',['label' => 'Nome:']);
                      
                    echo $this->Form->input('descricao',['label' => 'Descrição:']);
                  ?>


            </fieldset>

                      <div align="center">
                        <?php
                          echo $this->Html->link(__('Voltar'), 
                          array('controller' => 'Users','action' => 'group'), 
                          array('class' => 'btn btn-warning'));
                        ?>

                          <button class="btn btn-success" type="submit" onclick="bloqueio()">
                                  <?php echo __('Salvar');?>   
                          </button>
                      </div>
 

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  function bloqueio(){
      
      document.getElementById("botao").style.display = "none";   
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