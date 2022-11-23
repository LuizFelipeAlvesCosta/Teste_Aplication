<br>

<section class="content">
 <div class="row">
    <div align="center" class="col-md-3">
 
        <div class="box box-success">
            
            <div class="box-header with-border">
                <h3 class="box-title"><b>Informações sobre o usuário:</b></h3>
            </div>
            
            <div class="box-body">
                <?php foreach ($User as $value):?>
                <p><b>Nome:</b><?= $value['name'] ?></p> 
                <p><b>CPF:</b><?= $value['cpf'] ?></p>
                <p><b>Usuário:</b><?= $value['username'] ?></p> 
                <p><b>Email:</b><?= $value['email'] ?></p> 
                <p><b>Id:</b><?= $value['id'] ?></p> 
                <p><b>Ativado:</b><?= $value['status'] ?></p>

                <?php 
                    echo $this->Html->link(__('<i class="glyphicon glyphicon-arrow-left"></i>'), 
                    array('action' => 'index'), 
                    array('class' => 'btn btn-info btn-xs', 'escape' => false, 
                    'data-toggle' => 'tooltip', 'title' => 'Voltar')); 
                ?>

                <?php 
                    echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), 
                    array('action' => 'edit', $value['id']), 
                    array('class' => 'btn btn-warning btn-xs', 'escape' => false, 
                    'data-toggle' => 'tooltip', 'title' => 'Editar')); 
                ?>

                <?php 
                    echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'),
                    array('action' => 'delete', $value['id']),
                    array('class' => 'btn btn-danger btn-xs', 'escape' => false, 
                    'data-toggle' => 'tooltip', 'title' => 'Deletar', 'confirm' => 
                    __('Tem certeza de que deseja excluir?',$user->id))); 
                ?> 

                <?php endforeach; ?>
            </div>
        </div>

    </div>
 </div>
</section>