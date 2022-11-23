<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Datasource\ConnectionManager;

class UsersController extends AppController{

    public function index(){
        $this->paginate = [
            'limit' => 40
        ];

        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }


    public function view($id = null){
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);

        $connection = ConnectionManager::get('default');

        $sql = "SELECT * FROM users
                WHERE id = '$id'";
        $User = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('User','id'));   
        $this->set('_serialize', ['User','id']); 
    }

    public function addCelk(){
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário cadastrado com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro: Usuário não foi cadastrado com sucesso'));
        }
        $this->set(compact('user'));
    }

    public function add(){

        $connection = ConnectionManager::get('default');

        $sql = "SELECT * FROM roles";
        $Grupos = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('Grupos'));   
        $this->set('_serialize', ['Grupos']); 

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('O usuário foi salvo!'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('O usuário não pôde ser salvo. Por favor, tente novamente.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function edit($id = null){

        $connection = ConnectionManager::get('default');

        $sql = "SELECT * FROM roles";
        $Grupos = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('Grupos'));   
        $this->set('_serialize', ['Grupos']); 
        
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário editado com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro: Usuário não foi editado com sucesso'));
        }
        $this->set(compact('user'));
    }

    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Usuário apagado com sucesso'));
        } else {
            $this->Flash->error(__('Erro: Usuário não foi apagado com sucesso'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login() {
       if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->error(__('Erro: login ou senha incorreto'));
            }
       }
    }

    public function logout(){
        $this->Flash->success(__('Deslogado com sucesso!'));
        return $this->redirect($this->Auth->logout());
    }


    ////////////// GRUPOS DE ACESSO //////////////////
    public function group(){

        $connection = ConnectionManager::get('default');

        $sql = "SELECT * FROM roles";
        $Grupos = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('Grupos','id'));   
        $this->set('_serialize', ['Grupos','id']); 
    }

    public function addgroup(){
    }

    public function insertgroup(){

        $con = ConnectionManager::get('default');

        $sql = " INSERT INTO roles
                (Nome,Descricao)
                VALUES
                ('{$this->request['data']['nome']}',
                 '{$this->request['data']['descricao']}')";
        $con->execute($sql);

        $this->Flash->success(__('Grupo adicionado com sucesso !'));
        return $this->redirect(['action' => 'group']);
    }

    public function editgroup($id){

        $connection = ConnectionManager::get('default');

        $sql = "SELECT * FROM roles
                WHERE Id = '$id'";
        $Grupos = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('Grupos','id'));   
        $this->set('_serialize', ['Grupos','id']);
    }

    public function updategroup(){

        $con = ConnectionManager::get('default');

        $sql = " UPDATE roles
                    SET Nome = '{$this->request['data']['nome']}',
                        Descricao = '{$this->request['data']['descricao']}'
                 WHERE Id = '{$this->request['data']['id']}'";
        $con->execute($sql);

        $this->Flash->success(__('Dados do grupo alterado com sucesso !'));
        return $this->redirect(['action' => 'group']);
    }
    ///////////////////////////////////////////////
}
?>