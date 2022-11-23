<?php 

  $Grup[0] = 'Selecione...';
  foreach ($Grupos as $value) {
      $Grup[$value['Id']] = $value['Nome'];
  }

  $x = ['Selecione...','Sim','Não'];
  $Stat = [];
  for($i = 0; $i < sizeof($x); $i++){
      $Stat[$x[$i]] = $x[$i];
  }

?>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="roles form large-9 medium-8 columns content">
                    <?= $this->Form->create($user) ?>
                    <fieldset>
                        <legend><?= __('Adicionar Usuário') ?></legend>
                        <?php
                        echo $this->Form->input('name',['label' => 'Nome:']);
                        echo $this->Form->input('username',['label' => 'Usuário']);
                        echo $this->Form->input('password',['label' => 'Senha:']);
                        echo $this->Form->input('email',['label' => 'Email:']);
                        echo $this->Form->input('cpf',['label' => 'Cpf:']);
                        echo $this->Form->input('id_grupo',['label' => 'Grupo Pertencente:',
                        'options' => $Grup]);
                        echo $this->Form->input('limite', ['label'=>'Limite de Desconto (%):']);
                        echo $this->Form->input('status',['label' => 'Status:',
                        'options' => $Stat]);
                        ?>
                    </fieldset>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <?= $this->Html->link(__('Voltar'), ['action' => 'index'], array('class' => 'btn btn-primary')) ?>
                            </div>
                            <div align="right" class="col-md-6" id="botao">
                                <?= $this->Form->button(__('Salvar'), ['align'=>'center','class' => 'form-group']) ?>

                            </div>
                        </div>
                    </div>

                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

    function mascaraMutuario(o,f){
        v_obj=o
        v_fun=f
        setTimeout('execmascara()',1)
    }
 
    function execmascara(){

        v_obj.value=v_fun(v_obj.value)
    }
 
    function cpfCnpj(v){
 
        //Remove tudo o que não é dígito
        v=v.replace(/\D/g,"")
 
        if (v.length <= 14) { //CPF
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d)/,"$1.$2")
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
        //de novo (para o segundo bloco de números)
        v=v.replace(/(\d{3})(\d)/,"$1.$2")
 
        //Coloca um hífen entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
 
        } else { //CNPJ
 
        //Coloca ponto entre o segundo e o terceiro dígitos
        v=v.replace(/^(\d{2})(\d)/,"$1.$2")
 
        //Coloca ponto entre o quinto e o sexto dígitos
        v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
 
        //Coloca uma barra entre o oitavo e o nono dígitos
        v=v.replace(/\.(\d{3})(\d)/,".$1/$2")
 
        //Coloca um hífen depois do bloco de quatro dígitos
        v=v.replace(/(\d{4})(\d)/,"$1-$2")
 
        }
     
        return v
    }
</script>

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
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function (start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
        showInputs: false
    });

});
</script>
<?php $this->end(); ?>