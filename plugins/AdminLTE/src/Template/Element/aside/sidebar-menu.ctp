<?php

$file = ROOT . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside' . DS . 'sidebar-menu.ctp';

$session = new \Cake\Network\Session;
$user = $session->read('Auth.User');
$Nome = $user['name'];
$Id = $user['id_grupo'];

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
    ?>
    <ul class="sidebar-menu">

        <li class="treeview">
            <a href="#">
                <i class="fa fa-dropbox"></i> <span>Estoque</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                    <li>
                       <?= $this->Html->link(__('Produto'),
                       ['controller' => 'Control', 'action' => 'produto']) ?>
                    </li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-calculator"></i> <span>Vendas</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
               <li> 
                <?= $this->Html->link(__('Listar Vendas'),['controller' => 'Control','action' => 'listvendas']) ?>  
               </li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-users"></i> <span>Área de Pessoas</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
               <li> 
                <?= $this->Html->link(__('Listagem'), ['controller' => 'Control','action' => 'pessoas']) ?>  
               </li>
            </ul>
        </li>

    </ul>
<?php } ?>