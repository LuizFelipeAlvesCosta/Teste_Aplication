<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Controller\Component\FlashComponent;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Datasource\ConnectionManager;


class ControlController extends AppController{

	////////// Pessoas - OK/////////
	public function pessoas(){

        $connection = ConnectionManager::get('default');

        $sql = "SELECT * FROM pessoas";
        $Pessoas = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('Pessoas','id'));   
        $this->set('_serialize', ['Pessoas','id']); 
  }

  public function addpessoa(){}

  public function insertpessoa(){

    $connection = ConnectionManager::get('default');

        $session = new \Cake\Network\Session;
        $user = $session->read('Auth.User');
        $nome = $user['name'];

        $sql = " INSERT INTO pessoas
                (nome,perfil)
                VALUES
                ('{$this->request['data']['nome']}',
                 '{$this->request['data']['perfil']}')";
        $connection->execute($sql);

        $this->Flash->success(__('Pessoa adicionada com sucesso !'));
        return $this->redirect(['action' => 'pessoas']);
  }

  public function viewpessoa($id){

          $connection = ConnectionManager::get('default');

          $sql = "SELECT * FROM pessoas
                  where id = '$id'";
          $pessoas = $connection->execute($sql)->fetchAll('assoc');

          $this->set(compact('pessoas','id'));   
          $this->set('_serialize',['pessoas','id']); 
  }

  public function editpessoa($id){

        $connection = ConnectionManager::get('default');

        $sql = "SELECT * FROM pessoas 
                Where id = '$id'";
        $Pessoas = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('Pessoas','id'));   
        $this->set('_serialize', ['Pessoas','id']); 
  }

  public function updatepessoa($id){


    $connection = ConnectionManager::get('default');

              $sql = "UPDATE pessoas
                      SET nome = '{$this->request['data']['Pessoa']}',
                          perfil = '{$this->request['data']['perfil']}'
                      WHERE id = '$id'";
              $connection->execute($sql);

              $this->Flash->success(__('Dados alterados com sucesso !'));
              return $this->redirect(['action' => 'pessoas']);

            $this->set(compact('id'));   
          $this->set('_serialize', ['id']); 
  }

  public function deletepessoa($id){

    $connection = ConnectionManager::get('default');

        $sql = "DELETE FROM pessoas
                Where id = '$id'";
        $connection->execute($sql);

        $this->Flash->success(__('Pessoa excluida com sucesso !'));
        return $this->redirect(['action' => 'pessoas']);

        $this->set(compact('id'));   
        $this->set('_serialize', ['id']); 
  }
	///////////////////////////////////////////////



	////////// PRODUTO - OK ////////////
	public function produto(){

        $connection = ConnectionManager::get('default');

        $sql = "SELECT * FROM produtos";
        $Produto = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('Produto','id'));   
        $this->set('_serialize', ['Produto','id']); 
	}

	public function addproduto(){
	}

  public function insertproduto(){

    $connection = ConnectionManager::get('default');

        $session = new \Cake\Network\Session;
        $user = $session->read('Auth.User');
        $nome = $user['name'];

        $sql = " INSERT INTO produtos
                (produto,preco)
                VALUES
                ('{$this->request['data']['descricao']}',
                 '{$this->request['data']['preco']}')";
        $connection->execute($sql);

        $this->Flash->success(__('Produto adicionado com sucesso !'));
        return $this->redirect(['action' => 'produto']);
  }

  public function viewproduto($id){

          $connection = ConnectionManager::get('default');

          $sql = "SELECT * FROM produtos
                  where id = '$id'";
          $Produto = $connection->execute($sql)->fetchAll('assoc');

          $this->set(compact('Produto','id'));   
          $this->set('_serialize', ['Produto','id']); 
  }

	public function editproduto($id){

		$connection = ConnectionManager::get('default');

		    $sql = "SELECT * FROM produtos 
                Where id = '$id'";
        $Produto = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('Produto','id','Unidades'));   
        $this->set('_serialize', ['Produto','id','Unidades']); 
	}

	public function updateproduto($id){

		$connection = ConnectionManager::get('default');

              $sql = "UPDATE produtos
                      SET produto = '{$this->request['data']['produto']}',
                 		      preco = '{$this->request['data']['preco']}'
                      WHERE Id = '$id'";
              $connection->execute($sql);

              $this->Flash->success(__('Dados alterados com sucesso !'));
              return $this->redirect(['action' => 'produto']);

            $this->set(compact('id'));   
        	$this->set('_serialize', ['id']); 
	}

	public function deleteproduto($id){

		$connection = ConnectionManager::get('default');

		$sql = "DELETE FROM produtos
            Where id = '$id'";
        $connection->execute($sql);

        $this->Flash->success(__('Produto excluido com sucesso !'));
        return $this->redirect(['action' => 'produto']);

        $this->set(compact('id'));   
        $this->set('_serialize', ['id']); 
	}
  /////////////////////////////////////


  /////////// VENDAS - OK ///////////
    public function listvendas(){

        $connection = ConnectionManager::get('default');

        $this->set(compact('Venda'));   
        $this->set('_serialize', ['Venda']); 
    }

    public function addvendas(){

        $connection = ConnectionManager::get('default');

        $sql = "SELECT * FROM produtos";
        $Produto = $connection->execute($sql)->fetchAll('assoc');

        $sql = "SELECT * FROM pessoas
                WHERE perfil = 'Vendedor'";
        $Vendedor = $connection->execute($sql)->fetchAll('assoc');

        $sql = "SELECT * FROM pessoas
                WHERE perfil = 'Cliente'";
        $Cliente = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('Produto','id','Vendedor','Cliente'));   
        $this->set('_serialize', ['Produto','id','Vendedor','Cliente']); 
    }

    public function insertvendas(){

      $connection = ConnectionManager::get('default');

        if ($this->request->is('post')){

                        $sql = " INSERT INTO 
                              (id_pessoa,data_venda,valor_venda,parcelamento,id_vendedor)
                              VALUES
                              ('{$this->request['data']['idcliente']}',
                               '{$this->request['data']['datavenda']}',
                               '{$this->request['data']['vallor']}',
                               '{$this->request['data']['qtdprc']}',
                               '{$this->request['data']['idvendedor']}'";
                        $connection->execute($sql);

                        $vb = $_POST['vb'];
                        for($i=0; $i<count($vb); $i++){

                            $sql = "INSERT INTO titulos_a_receber
                                    (Vencimento,Id_Venda,Valor)
                                    VALUES
                                    ('{$this->request['data']['vb'][$i]}',
                                     '$IdV',
                                     '{$this->request['data']['valr']}')";
                            $connection->execute($sql);
                        }

                        $this->Flash->success(__('Venda realizada com sucesso !'));
                        return $this->redirect(['action' => 'listvendas']);
        } 


            $this->set(compact('MaxIdCompra','QtdCompra','Compra','HistCompra'));   
            $this->set('_serialize', ['MaxIdCompra','QtdCompra','Compra','HistCompra']);           
    }

    public function viewvendas($id){

      $connection = ConnectionManager::get('default');

      $date = date('d/m/Y');
      
      $sql = "SELECT * FROM vendas
              INNER JOIN pessoas on vendas.id_pessoa = pessoas.id
              INNER JOIN boletos on vendas.id_venda = vendas.id
              where id = '$id'";
      $Dados = $connection->execute($sql)->fetchAll('assoc');
               
      $this->set(compact('Dados','id'));   
      $this->set('_serialize',['Dados','id']); 
      $this->viewBuilder()->layout('ajax');
      $this->response->type('pdf');
    }
    /////////////////////////////





    /////////// PREÇO DE VENDA ///////
  public function addprecovenda($id){

        $connection = ConnectionManager::get('default');

        $sql = "SELECT * FROM produto
                WHERE id = '$id'";
        $Produto = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('Produto','id'));   
        $this->set('_serialize', ['Produto','id']); 
  }

  public function insertprecovenda(){

        $con = ConnectionManager::get('default');

        $id = $this->request->data['id'];

        $session = new \Cake\Network\Session;
        $user = $session->read('Auth.User');
        $nome = $user['name'];
        $date = date('d/m/Y');

        $sql = "  UPDATE produto
                     SET Preco_Unidade = '{$this->request['data']['preco']}'
                  WHERE Id = '$id'";
        $con->execute($sql);

        $sql = " INSERT INTO historico_alt_preco
                 (log,data,motivo,preco,id_produto)
                 VALUES
                 ('$nome','$date',
                  '{$this->request['data']['motivo']}',
                  '{$this->request['data']['preco']}',
                  '$id')";
        $con->execute($sql);

        $this->Flash->success(__('Alteração de preço realizada com sucesso !'));
        return $this->redirect(['action' => 'produto']);
  }

	////////////////////////////////////////////


    //////////// PEDIDO DE COMPRA /////////////
    public function pedidocompra(){

        $connection = ConnectionManager::get('default');

        $sql = "SELECT historico_compra.Id_Compra AS ID, 
                       fornecedor.Razao_social as FORNECEDOR, 
                       historico_compra.Data_Compra AS DATA, 
                       SUM(historico_compra.Valor_Compra) AS VALORCOMPRA 
                       FROM historico_compra 
                       inner join fornecedor on fornecedor.Id = 
                       historico_compra.Id_Fornecedor 
                       GROUP BY historico_compra.Id_Compra,
                       fornecedor.Razao_social, 
                       historico_compra.Data_Compra";
        $Compra = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('Compra','id'));   
        $this->set('_serialize', ['Compra','id']); 
    }

    public function viewpedido($id){

        $connection = ConnectionManager::get('default');

        $sql = "SELECT historico_compra.Id_Compra AS ID, 
                       fornecedor.Razao_social as FORNECEDOR, 
                       historico_compra.Data_Compra AS DATA, 
                       SUM(historico_compra.Valor_Compra) AS VALORCOMPRA,
                       produto.Descricao as Descri,
                       historico_compra.valor_unitario as valoruni,
                       historico_compra.Qtd_Entrada as QTD
                       FROM historico_compra 
                       inner join fornecedor on fornecedor.Id = 
                       historico_compra.Id_Fornecedor 
                       inner join produto on produto.id = historico_compra.Id_produto
                       where historico_compra.Id_Compra = '$id' 
                       GROUP BY historico_compra.Id_Compra,
                       fornecedor.Razao_social , 
                       historico_compra.Data_Compra";
        $Compra = $connection->execute($sql)->fetchAll('assoc');

        $sql = "SELECT historico_compra.Id_Compra AS ID, 
                       historico_compra.Data_Compra AS DATA, 
                       historico_compra.Valor_Compra AS VALORCOMPRA,
                       produto.Descricao as Descri,
                       historico_compra.valor_unitario as valoruni,
                       historico_compra.Qtd_Entrada as QTD
                       FROM historico_compra 
                       inner join produto on produto.id = 
                       historico_compra.Id_produto 
                       where historico_compra.Id_Compra ='$id'";
        $HistProd = $connection->execute($sql)->fetchAll('assoc');

        $sql = "SELECT historico_compra.Id_Compra AS ID, 
                       historico_compra.Data_Compra AS DATA, 
                       historico_compra.Valor_Compra AS VALORCOMPRA,
                       produto.Descricao as Descri,
                       historico_compra.valor_unitario as valoruni,
                       historico_compra.Qtd_Entrada as QTD
                       FROM historico_compra 
                       inner join produto on produto.id = 
                       historico_compra.Id_produto 
                       where historico_compra.Id_Compra ='$id'";
        $HistProd = $connection->execute($sql)->fetchAll('assoc');

        $sql = " SELECT * FROM titulos_a_pagar 
                 WHERE Id_Compra = '$id' 
                 and Baixa is null";
        $Estoque = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('Compra','id','HistProd','Estoque'));   
        $this->set('_serialize', ['Compra','id','HistProd','Estoque']); 
    }     

    public function addpedido(){

        $connection = ConnectionManager::get('default');

        $sql = "SELECT * FROM fornecedor";
        $Fornecedor = $connection->execute($sql)->fetchAll('assoc');

        $sql = "SELECT produto.Id AS ID,
               produto.Descricao AS PRODUTO,
               produto.Peso_Produto AS PESO FROM produto
               inner join historico_alt_preco on historico_alt_preco.id_produto 
               = produto.Id";
        $Produto = $connection->execute($sql)->fetchAll('assoc');

        $sql = "SELECT * FROM unidade_medicao
                WHERE id != '1'";
        $Unidade = $connection->execute($sql)->fetchAll('assoc');

        $sql = "SELECT * FROM forma_pag";
        $Forma = $connection->execute($sql)->fetchAll('assoc');

        $sql = "SELECT * FROM condicao_pag";
        $Condicao = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('Fornecedor','id','Produto','Unidade','Forma','Condicao'));   
        $this->set('_serialize', ['Fornecedor','id','Produto','Unidade','Forma','Condicao']); 
    }

    public function insertpedido(){

      $connection = ConnectionManager::get('default');

        if ($this->request->is('post')){

          $parcela = $this->request->data['vlrparc'];
          $qtdprc = $this->request->data['qtdprc'];
          $session = new \Cake\Network\Session;
          $user = $session->read('Auth.User');
          $nome = $user['name'];

            $MaxHistCompr = $connection->execute("SELECT MAX(Id)AS ID FROM historico_compra");

            $MaxId = '';
            foreach ($MaxHistCompr as $value) {
                $MaxId = $value['ID'];
            }

            $MaxIdCompra = $connection->execute("SELECT Id_Compra FROM historico_compra 
            WHERE Id = '$MaxId'");

            $IdCompra = '';
            foreach ($MaxIdCompra as $value) {
                $IdCompra = $value['Id_Compra'];
            }

            $IdComp = 0;
            if ($MaxId == 0){
               $IdComp = '00001';
            }else{
               $IdComp = '0000'.($IdCompra+1);
            }


                for ($i=0; $i < 10; $i++){
                  
                      $qtd = $this->request->data['qtdprod'][$i];

                      echo "inserido".$qtd;

                      if ( $qtd == ''){

                      }else{
                          $sql = " INSERT INTO historico_compra
                                (Id_Fornecedor,Id_Produto,Valor_Compra,Qtd_Entrada,
                                 Data_Compra,Id_Compra,valor_unitario,Unidade,
                                 qtd_parcelas,forma_pag)
                                VALUES
                                ('{$this->request['data']['fornecedor']}',
                                 '{$this->request['data']['produto'][$i]}',
                                 '{$this->request['data']['valor'][$i]}',
                                 '{$this->request['data']['qtdprod'][$i]}',
                                 '{$this->request['data']['data']}',
                                 '$IdComp',
                                 '{$this->request['data']['vlr'][$i]}',
                                 '{$this->request['data']['unidade'][$i]}',
                                 '$qtdprc',
                                 '{$this->request['data']['forma']}')";
                        $connection->execute($sql);
                      }      
                }
               
                $MaxHistC = $connection->execute("SELECT MAX(Id)AS ID FROM historico_compra");

                $MxId = '';
                foreach ($MaxHistC as $value) {
                    $MxId = $value['ID'];
                }

                $MaxIdC = $connection->execute("SELECT Id_Compra FROM historico_compra 
                WHERE Id = '$MxId'");

                $IdC = '';
                foreach ($MaxIdC as $value) {
                    $IdC = $value['Id_Compra'];
                }

                $sql = "SELECT id_Produto,Qtd_Entrada,Unidade FROM historico_compra 
                        Where Id_Produto != 0
                        AND Id_Compra = '$IdC'";
                $Compra = $connection->execute($sql)->fetchAll('assoc');

                foreach ($Compra as $value) {

                        $IdProduto = $value['id_Produto'];
                        $QtdProduto = $value['Qtd_Entrada'];
                        $Unidade = $value['Unidade'];
                        
                        $sql = "SELECT * FROM estoque
                                WHERE Id_Prod = '$IdProduto'";
                        $Estoque = $connection->execute($sql)->fetchAll('assoc');

                        $QtdEstoque = '';
                        $novoestoque = '';
                        foreach ($Estoque as $value) {
                           $QtdEstoque = $value['Qtd_Prod'];
                           $novoestoque = $QtdEstoque + $QtdProduto;
                        }

                        $sql = " UPDATE estoque
                                 SET qtd_prod = '$novoestoque',
                                     Unidade = '$Unidade'
                                 WHERE id_prod in ('$IdProduto')";
                        $connection->execute($sql);
                } 

                $cb = $_POST['cb'];
                $vb = $_POST['vb'];
                for($i=0; $i<count($cb); $i++){

                  $sql = "INSERT INTO titulos_a_pagar
                          (Codigo,Vencimento,Id_Compra,Valor)
                          VALUES
                          ('{$this->request['data']['cb'][$i]}',
                           '{$this->request['data']['vb'][$i]}',
                           '$IdC',
                           '$parcela')";
                  $connection->execute($sql);
                }

        }
              
           $this->Flash->success(__('Lançamento realizado com sucesso !'));
           return $this->redirect(['action' => 'pedidocompra']);


          $this->set(compact('MaxIdCompra','QtdCompra','Compra','HistCompra'));   
          $this->set('_serialize', ['MaxIdCompra','QtdCompra','Compra','HistCompra']); 
    }

    public function editpedido($id){

        $connection = ConnectionManager::get('default');

        $sql = "SELECT * FROM historico_compra 
                Where Id = '$id'";
        $Historico = $connection->execute($sql)->fetchAll('assoc');

        $sql = "SELECT * FROM fornecedor";
        $Fornecedor = $connection->execute($sql)->fetchAll('assoc');

        $sql = "SELECT * FROM produto";
        $Produto = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('Produto','id','Historico','Fornecedor'));   
        $this->set('_serialize', ['Produto','id','Historico','Fornecedor']); 
    }

    public function updatepedido($id){

        $connection = ConnectionManager::get('default');

              $sql = "UPDATE historico_compra
                      SET Id_Fornecedor = '{$this->request['data']['fornecedor']}',
                          Id_Produto = '{$this->request['data']['prod']}',
                          Valor_Compra = '{$this->request['data']['val']}',
                          Qtd_Entrada = '{$this->request['data']['qtd']}',
                          Data_Compra = '{$this->request['data']['data']}',
                          NF = '{$this->request['data']['file']}' 
                      WHERE Id = '$id'";
              $connection->execute($sql);

              $this->Flash->success(__('Dados alterados com sucesso !'));
              return $this->redirect(['action' => 'pedidocompra']);

            $this->set(compact('id'));   
            $this->set('_serialize', ['id']); 
    }
    //////////////////////////////////////////

    
  	//////////////// CLIENTE //////////////
  	public function cliente(){

        $session = new \Cake\Network\Session;
        $user = $session->read('Auth.User');
        $Id = $user['id_grupo'];
        $Cpf = $user['cpf'];

          $connection = ConnectionManager::get('default');

          if ($Id == 2){
              $sql = "SELECT *,cidade.nome AS NCIDADE,estado.nome NESTADO FROM cliente 
                  INNER JOIN cidade on cidade.id = cliente.Cidade
                  INNER JOIN estado on estado.id = cliente.UF
                  WHERE Obsoleto = 0";
              $Cliente = $connection->execute($sql)->fetchAll('assoc');
          }else if($Id == 1){
              $sql = "SELECT *,cidade.nome AS NCIDADE,estado.nome NESTADO FROM cliente 
                      INNER JOIN users on users.cpf = cliente.Vendedor
                      INNER JOIN cidade on cidade.id = cliente.Cidade
                      INNER JOIN estado on estado.id = cliente.UF   
                      WHERE Obsoleto = 0
                      AND cliente.Vendedor = '$Cpf'";
              $Cliente = $connection->execute($sql)->fetchAll('assoc');
          }
          $this->set(compact('Cliente','id'));   
          $this->set('_serialize', ['Cliente','id']); 
  	}

  	public function addcliente(){

          $connection = ConnectionManager::get('default');

          $sql = "SELECT * FROM estado";
          $Estado = $connection->execute($sql)->fetchAll('assoc');

          $sql = "SELECT * FROM cidade";
          $Cidade = $connection->execute($sql)->fetchAll('assoc');

          $this->set(compact('Estado','Cidade'));   
          $this->set('_serialize', ['Estado','Cidade']); 
  	}

  	public function insertcliente(){

  		$con = ConnectionManager::get('default');

        $session = new \Cake\Network\Session;
        $user = $session->read('Auth.User');
        $Cpf = $user['cpf'];

          $sql = " INSERT INTO cliente
                  (Nome,Email,Endereco,Bairro,UF,Cidade,Telefone,obsoleto,Vendedor,
                   Contato,Cep)
                  VALUES
                  ('{$this->request['data']['nome']}',
                   '{$this->request['data']['email']}',
                   '{$this->request['data']['ende']}',
                   '{$this->request['data']['bairro']}',
                   '{$this->request['data']['uf']}',
                   '{$this->request['data']['cidade']}',
                   '{$this->request['data']['tele']}',
                   'NÃO',
                   '$Cpf',
                   '{$this->request['data']['contato']}',
                   '{$this->request['data']['cep']}')";
          $con->execute($sql);

          $this->Flash->success(__('Cliente adiconado com sucesso !'));
          return $this->redirect(['action' => 'cliente']);
  	}

  	public function viewcliente($id){

          $connection = ConnectionManager::get('default');

          $sql = "SELECT *,cidade.nome AS NCIDADE,estado.nome NESTADO FROM cliente 
                  INNER JOIN cidade on cidade.id = cliente.Cidade
                  INNER JOIN estado on estado.id = cliente.UF
                  WHERE cliente.id = '$id'";
          $Cliente = $connection->execute($sql)->fetchAll('assoc');

          $this->set(compact('Cliente','id'));   
          $this->set('_serialize', ['Cliente','id']); 
  	}

  	public function editcliente($id){

  		$connection = ConnectionManager::get('default');

  		$sql = "SELECT *,cidade.nome AS NCIDADE,estado.nome NESTADO FROM cliente 
                  INNER JOIN cidade on cidade.id = cliente.Cidade
                  INNER JOIN estado on estado.id = cliente.UF
                  WHERE cliente.id = '$id'";
      $Cliente = $connection->execute($sql)->fetchAll('assoc');

          $sql = "SELECT * FROM estado";
          $Estado = $connection->execute($sql)->fetchAll('assoc');

          $sql = "SELECT * FROM cidade";
          $Cidade = $connection->execute($sql)->fetchAll('assoc');

          $this->set(compact('Cliente','id','Estado','Cidade'));   
          $this->set('_serialize', ['Cliente','id','Estado','Cidade']); 
  	}

  	public function updatecliente(){

      $session = new \Cake\Network\Session;
      $user = $session->read('Auth.User');
      $Cpf = $user['name'];

  		$connection = ConnectionManager::get('default');

          $id = $this->request->data['idcliente'];

                $sql = "UPDATE cliente
                        SET Nome = '{$this->request['data']['nome']}',
                            Telefone = '{$this->request['data']['tele']}',
                            UF = '{$this->request['data']['uf']}',
                            Bairro = '{$this->request['data']['bairro']}',
                            Cep = '{$this->request['data']['cep']}',
                            Contato = '{$this->request['data']['contato']}',
                   		      Email = '{$this->request['data']['email']}',
                            Cidade = '{$this->request['data']['cidade']}',  
                   		      Endereco = '{$this->request['data']['ende']}',
                   		      Obsoleto = '{$this->request['data']['obsole']}',
                            Vendedor = '$Cpf'
                        WHERE Id = '$id'";
                $connection->execute($sql);

                $this->Flash->success(__('Dados do cliente alterado com sucesso !'));
                return $this->redirect(['action' => 'cliente']);

               $this->set(compact('id'));   
          	   $this->set('_serialize', ['id']); 
  	}
    ////////////////////////////////////////////





    /////////// BOLETOS ////////
    public function boletos($id){

        $connection = ConnectionManager::get('default');

        $session = new \Cake\Network\Session;
        $user = $session->read('Auth.User');
        $Id = $user['id_grupo'];
        $ids = $user['id'];
        $Nome = $user['name'];
        $Cpf = $user['cpf'];

          $connection = ConnectionManager::get('default');

          if ($Id == 2){
              $sql = "SELECT *,cidade.nome AS NCIDADE,estado.nome NESTADO FROM cliente 
                  INNER JOIN cidade on cidade.id = cliente.Cidade
                  INNER JOIN estado on estado.id = cliente.UF
                  WHERE Obsoleto = 0";
              $Cliente = $connection->execute($sql)->fetchAll('assoc');
          }else if($Id == 1){
              $sql = "SELECT *,cidade.nome AS NCIDADE,estado.nome NESTADO FROM cliente 
                      INNER JOIN users on users.cpf = cliente.Vendedor
                      INNER JOIN cidade on cidade.id = cliente.Cidade
                      INNER JOIN estado on estado.id = cliente.UF
                      
                      WHERE Obsoleto = 0
                      AND cliente.Vendedor = '$Cpf'";
              $Cliente = $connection->execute($sql)->fetchAll('assoc');
          }

        $sql = " SELECT Id_Prod,produto.Descricao AS DESCR,
                        Qtd_Prod,produto.Preco_Unidade AS PREC,
                        unidade_medicao.unidade  AS UND
                        FROM estoque 
                INNER JOIN produto ON produto.id 
                = estoque.Id_Prod 
                INNER JOIN unidade_medicao on unidade_medicao.id 
                = estoque.Unidade 
                WHERE Qtd_Prod != 0";
        $Produto = $connection->execute($sql)->fetchAll('assoc');

        $sql = "SELECT * FROM forma_pag";
        $Forma = $connection->execute($sql)->fetchAll('assoc');

        $sql = " SELECT limite FROM users
                 WHERE id = '$ids'";
        $Usuario = $connection->execute($sql)->fetchAll('assoc');

        $Limite = 0;
        foreach ($Usuario as $value) {
               $Limite = $value['limite'];
        }


        $sql = "SELECT * FROM historico_vendas
                WHERE Id_Venda = '$id'";
        $Vendas = $connection->execute($sql)->fetchAll('assoc');

        $VlrVenda = '';
        foreach ($Vendas as $value){
            $VlrVenda += $value['Valor_Venda'];
        }

        $this->set(compact('Produto','Cliente','Nome','Limite',
        'Usuario','Forma','VlrVenda','id'));   
        $this->set('_serialize', ['Produto','Cliente','Nome',
        'Limite','Usuario','Forma','VlrVenda','id']);
    }

    public function addboletos(){

      $connection = ConnectionManager::get('default');

        $vb = $_POST['vb'];
        for($i=0; $i<count($vb); $i++){

            $sql = " INSERT INTO titulos_a_receber
                   (Vencimento,Id_Venda,Valor)
                   VALUES
                   ('{$this->request['data']['vb'][$i]}',
                    '{$this->request['data']['id']}',
                    '{$this->request['data']['vlrprc']}')";
            $connection->execute($sql);

        }

        $this->Flash->success(__('Boleto lançado com sucesso !'));
        return $this->redirect(['action' => 'listvendas']);
    }
    ///////////////////////////

    ////////// ESTOQUE /////////
    public function estoque(){

      $connection = ConnectionManager::get('default');
      
      $sql = " SELECT Id_Prod AS COD, 
                      produto.Descricao AS PRODUTO, 
                      Qtd_Prod AS QTD,
                      unidade_medicao.unidade as UND FROM estoque 
               INNER JOIN produto on produto.Id = estoque.Id_Prod
               INNER JOIN unidade_medicao on unidade_medicao.Id = estoque.Unidade";
      $Estoque = $connection->execute($sql)->fetchAll('assoc');

      $this->set(compact('Estoque'));   
      $this->set('_serialize', ['Estoque']);    
    }
    ///////////////////////////


    //////// ROMANEIO ////////
    public function romaneio(){

      $connection = ConnectionManager::get('default');

      $sql = " SELECT id,nome FROM cidade
               ORDER BY id";
      $Cidade = $connection->execute($sql)->fetchAll('assoc');

      $sql = " SELECT id,Nome FROM cliente";
      $Cliente = $connection->execute($sql)->fetchAll('assoc');

      $sql = " SELECT id,name FROM users
               WHERE id != '3'";
      $Usuario = $connection->execute($sql)->fetchAll('assoc');

      $sql = " SELECT id,nome FROM estado";
      $Estado = $connection->execute($sql)->fetchAll('assoc');

      $sql = " SELECT Id,Razao_social FROM fornecedor";
      $Fornecedor = $connection->execute($sql)->fetchAll('assoc');

      $this->set(compact('Cidade','Cliente','Usuario','Estado','Fornecedor'));   
      $this->set('_serialize', ['Cidade','Cliente','Usuario','Estado','Fornecedor']);
    }

    public function vendascidade(){

        $codcidade = $this->request->data['cidade'];

        $connection = ConnectionManager::get('default');

        $sql = " SELECT users.name AS VENDEDOR, 
                        forma_pag.Tipo AS FORMAPAG, 
                        historico_vendas.Desconto AS PERCDESCONTO, 
                        historico_vendas.Valor_Desconto AS VLRDSC, 
                        historico_vendas.Valor_venda_sem_desconto AS VLSDSC, 
                        historico_vendas.Valor_Final_Venda AS VLRVNDA, 
                        historico_vendas.Parcela_Venda AS PARCELAS, 
                        titulos_a_receber.Vencimento AS DTVENC, 
                        titulos_a_receber.Valor AS VLR,
                        historico_vendas.Data_Venda AS DTVENDA,
                        titulos_a_receber.Baixa AS BAIXA,
                        cliente.nome AS CLIENTE,
                        cidade.nome AS CIDADE
                        FROM historico_vendas 
                 INNER JOIN cliente on cliente.Id = historico_vendas.Id_Cliente       
                 INNER JOIN forma_pag on forma_pag.Id = historico_vendas.Id_Form_Pag 
                 INNER JOIN users on users.Id = historico_vendas.Id_Vendedor 
                 INNER JOIN titulos_a_receber on titulos_a_receber.Id_Venda = 
                 historico_vendas.Id_Venda 
                 INNER JOIN cidade on cidade.id = cliente.Cidade
                 WHERE cidade.id = '$codcidade'
                 GROUP BY users.name,forma_pag.Tipo,historico_vendas.Desconto,
                 historico_vendas.Valor_Desconto, historico_vendas.Valor_venda_sem_desconto,
                 historico_vendas.Valor_Final_Venda, historico_vendas.Parcela_Venda,
                 titulos_a_receber.Vencimento,titulos_a_receber.Valor,cliente.Nome";
        $Cidade = $connection->execute($sql)->fetchAll('assoc');

        $QtdVenda = count($Cidade);
        $ValorVenda = 0;
        foreach ($Cidade as $value) {
           $ValorVenda += $value['VLR'];
        }

        $this->set(compact('Cidade','QtdVenda','ValorVenda'));   
        $this->set('_serialize', ['Cidade','QtdVenda','ValorVenda']);
    }

    public function vendasestado(){

        $codestd = $this->request->data['estd'];

        $connection = ConnectionManager::get('default');

        $sql = " SELECT users.name AS VENDEDOR, 
                        forma_pag.Tipo AS FORMAPAG, 
                        historico_vendas.Desconto AS PERCDESCONTO, 
                        historico_vendas.Valor_Desconto AS VLRDSC, 
                        historico_vendas.Valor_venda_sem_desconto AS VLSDSC, 
                        historico_vendas.Valor_Final_Venda AS VLRVNDA, 
                        historico_vendas.Parcela_Venda AS PARCELAS, 
                        titulos_a_receber.Vencimento AS DTVENC, 
                        titulos_a_receber.Valor AS VLR,
                        historico_vendas.Data_Venda AS DTVENDA,
                        titulos_a_receber.Baixa AS BAIXA,
                        cliente.nome AS CLIENTE,
                        cidade.nome AS CIDADE,
                        estado.nome AS ESTADO
                        FROM historico_vendas 
                 INNER JOIN cliente on cliente.Id = historico_vendas.Id_Cliente       
                 INNER JOIN forma_pag on forma_pag.Id = historico_vendas.Id_Form_Pag 
                 INNER JOIN users on users.Id = historico_vendas.Id_Vendedor 
                 INNER JOIN titulos_a_receber on titulos_a_receber.Id_Venda = 
                 historico_vendas.Id_Venda 
                 INNER JOIN cidade on cidade.id = cliente.Cidade
                 INNER JOIN estado on estado.id = cliente.UF
                 WHERE estado.id = '$codestd'
                 GROUP BY users.name,forma_pag.Tipo,historico_vendas.Desconto,
                 historico_vendas.Valor_Desconto, historico_vendas.Valor_venda_sem_desconto,
                 historico_vendas.Valor_Final_Venda, historico_vendas.Parcela_Venda,
                 titulos_a_receber.Vencimento,titulos_a_receber.Valor,cliente.Nome,
                 estado.nome";
        $Estado = $connection->execute($sql)->fetchAll('assoc');

        $QtdVenda = count($Estado);
        $ValorVenda = 0;
        foreach ($Estado as $value) {
           $ValorVenda += $value['VLR'];
        }

        $this->set(compact('Estado','QtdVenda','ValorVenda'));   
        $this->set('_serialize', ['Estado','QtdVenda','ValorVenda']);
    }

    public function vendasmes(){

        $connection = ConnectionManager::get('default');

        $mes = $this->request->data['monthly'];
        $ano = $this->request->data['year'];

        $period = '';
          if ($mes == 'JANEIRO'){
               $period = '01';
          }elseif ($mes == 'FEVEREIRO') {
               $period = '02';
          }elseif ($mes == 'MARÇO') {
               $period = '03';
          }elseif ($mes == 'ABRIL') {
               $period = '04';
          }elseif ($mes == 'MAIO') {
               $period = '05';
          }elseif ($mes == 'JUNHO') {
               $period = '06';
          }elseif ($mes == 'JULHO') {
               $period = '07';
          }elseif ($mes == 'AGOSTO') {
               $period = '08';
          }elseif ($mes == 'SETEMBRO') {
               $period = '09';
          }elseif ($mes == 'OUTUBRO') {
               $period = '10';
          }elseif ($mes == 'NOVEMBRO') {
               $period = '11';
          }elseif ($mes == 'DEZEMBRO') {
               $period = '12';
          }

          $data = $period.'/'.$ano;

          $sql = " SELECT users.name AS VENDEDOR, 
                        forma_pag.Tipo AS FORMAPAG, 
                        historico_vendas.Desconto AS PERCDESCONTO, 
                        historico_vendas.Valor_Desconto AS VLRDSC, 
                        historico_vendas.Valor_venda_sem_desconto AS VLSDSC, 
                        historico_vendas.Valor_Final_Venda AS VLRVNDA, 
                        historico_vendas.Parcela_Venda AS PARCELAS, 
                        titulos_a_receber.Vencimento AS DTVENC, 
                        titulos_a_receber.Valor AS VLR,
                        historico_vendas.Data_Venda AS DTVENDA,
                        historico_vendas.Id AS ID,
                        titulos_a_receber.Baixa AS BAIXA,
                        cliente.nome AS CLIENTE,
                        cidade.nome AS CIDADE,
                        estado.nome AS ESTADO
                        FROM historico_vendas 
                 INNER JOIN cliente on cliente.Id = historico_vendas.Id_Cliente       
                 INNER JOIN forma_pag on forma_pag.Id = historico_vendas.Id_Form_Pag 
                 INNER JOIN users on users.Id = historico_vendas.Id_Vendedor 
                 INNER JOIN titulos_a_receber on titulos_a_receber.Id_Venda = 
                 historico_vendas.Id_Venda 
                 INNER JOIN cidade on cidade.id = cliente.Cidade
                 INNER JOIN estado on estado.id = cliente.UF
                 WHERE Data_Venda LIKE '%$data%' and titulos_a_receber.estorno is null
                 GROUP BY titulos_a_receber.Id_Venda

                 order by historico_vendas.Data_Venda";
        $MesAno = $connection->execute($sql)->fetchAll('assoc');

        $QtdVenda = count($MesAno);
        $ValorVenda = 0;
        foreach ($MesAno as $value) {
           $ValorVenda += $value['VLR'];
        }

        $sql = " SELECT historico_vendas.Data_Venda AS DTVENDA,
                        cliente.nome AS CLIENTE,
                        historico_vendas.Id_Venda AS ID
                        FROM historico_vendas 
                 INNER JOIN cliente on cliente.Id = historico_vendas.Id_Cliente       
                 INNER JOIN forma_pag on forma_pag.Id = historico_vendas.Id_Form_Pag 
                 INNER JOIN users on users.Id = historico_vendas.Id_Vendedor 
                 INNER JOIN titulos_a_receber on titulos_a_receber.Id_Venda = 
                 historico_vendas.Id_Venda 
                 INNER JOIN cidade on cidade.id = cliente.Cidade
                 INNER JOIN estado on estado.id = cliente.UF
                 WHERE Data_Venda LIKE '%$data%'
                 GROUP BY historico_vendas.Data_Venda,cliente.nome";
        $Vendas = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('MesAno','data','QtdVenda','ValorVenda',
        'data','Vendas'));   
        $this->set('_serialize',['MesAno','data','QtdVenda','ValorVenda',
        'data','Vendas']);
    }

    public function vendasperiod(){

          $connection = ConnectionManager::get('default');

          $dateinci = $this->request->data['dateinci'];

          $datefinal = $this->request->data['datefinal'];

          $diaini = substr($dateinci,0,2);$diafin = substr($datefinal,0,2);

          $mesini = substr($dateinci,3,2);$mesfin = substr($datefinal,3,2);

          $anoini = substr($dateinci,6,4);$anofin = substr($datefinal,6,4);

          $dataini = $diaini.'/'.$mesini.'/'.$anoini;

          $datafim = $diafin.'/'.$mesfin.'/'.$anofin;


          $sql = " SELECT users.name AS VENDEDOR, 
                        forma_pag.Tipo AS FORMAPAG, 
                        historico_vendas.Desconto AS PERCDESCONTO, 
                        historico_vendas.Valor_Desconto AS VLRDSC, 
                        historico_vendas.Valor_venda_sem_desconto AS VLSDSC, 
                        historico_vendas.Valor_Final_Venda AS VLRVNDA, 
                        historico_vendas.Parcela_Venda AS PARCELAS, 
                        titulos_a_receber.Vencimento AS DTVENC, 
                        titulos_a_receber.Valor AS VLR,
                        historico_vendas.Data_Venda AS DTVENDA,
                        historico_vendas.Id AS ID,
                        titulos_a_receber.Baixa AS BAIXA,
                        cliente.nome AS CLIENTE,
                        cidade.nome AS CIDADE,
                        estado.nome AS ESTADO
                        FROM historico_vendas 
                 INNER JOIN cliente on cliente.Id = historico_vendas.Id_Cliente       
                 INNER JOIN forma_pag on forma_pag.Id = historico_vendas.Id_Form_Pag 
                 INNER JOIN users on users.Id = historico_vendas.Id_Vendedor 
                 INNER JOIN titulos_a_receber on titulos_a_receber.Id_Venda = 
                 historico_vendas.Id_Venda 
                 INNER JOIN cidade on cidade.id = cliente.Cidade
                 INNER JOIN estado on estado.id = cliente.UF
                 WHERE 

                 STR_TO_DATE(Data_Venda, '%d/%m/%Y') BETWEEN STR_TO_DATE('$dataini', '%d/%m/%Y') AND STR_TO_DATE('$datafim', '%d/%m/%Y')

                 and titulos_a_receber.estorno is null

                 GROUP BY titulos_a_receber.Id_Venda
                 order by STR_TO_DATE(Data_Venda, '%d/%m/%Y')";

        $MesAno = $connection->execute($sql)->fetchAll('assoc');

        $QtdVenda = count($MesAno);
        $ValorVenda = 0;
        foreach ($MesAno as $value) {
           $ValorVenda += $value['VLR'];
        }

        $sql = " SELECT historico_vendas.Data_Venda AS DTVENDA,
                        cliente.nome AS CLIENTE,
                        historico_vendas.Id_Venda AS ID
                        FROM historico_vendas 
                 INNER JOIN cliente on cliente.Id = historico_vendas.Id_Cliente       
                 INNER JOIN forma_pag on forma_pag.Id = historico_vendas.Id_Form_Pag 
                 INNER JOIN users on users.Id = historico_vendas.Id_Vendedor 
                 INNER JOIN titulos_a_receber on titulos_a_receber.Id_Venda = 
                 historico_vendas.Id_Venda 
                 INNER JOIN cidade on cidade.id = cliente.Cidade
                 INNER JOIN estado on estado.id = cliente.UF
                 WHERE 
                 STR_TO_DATE(Data_Venda, '%d/%m/%Y') BETWEEN STR_TO_DATE('$dataini', '%d/%m/%Y') AND STR_TO_DATE('$datafim', '%d/%m/%Y') 
                 GROUP BY historico_vendas.Data_Venda,cliente.nome";
        $Vendas = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('MesAno','dateinci','datefinal','data','QtdVenda','ValorVenda',
        'data','Vendas'));   
        $this->set('_serialize',['MesAno','dateinci','datefinal','data','QtdVenda','ValorVenda',
        'data','Vendas']);
    }

    public function viewvendames(){

      $connection = ConnectionManager::get('default');

      if ($this->request->is('post')){
         
            $ids = $this->request->data['selecao'];
            $str = implode(',',$ids);

            $sql = " SELECT historico_vendas.Id_Venda AS ID,
                    cliente.Nome as CLIENTE,
                    historico_vendas.Valor_Final_Venda as VLR
                  FROM historico_vendas 
                  INNER JOIN cliente ON historico_vendas.Id_Cliente = cliente.Id
                  WHERE historico_vendas.Id_Venda in ($str)
                  AND historico_vendas.Estorno IS NULL
                  GROUP BY historico_vendas.Id_Venda
                  ORDER BY cliente.Nome";
          $cliente = $connection->execute($sql)->fetchAll('assoc');

          $sql = " SELECT produto.Descricao AS DESCRICAO,
                     SUM(historico_vendas.Qtd_Venda) AS QTD,
                     SUM(historico_vendas.Valor_Prod_Venda) AS PRECO,
                     count(historico_vendas.Qtd_Venda) AS QTDuni,
                     unidade_medicao.unidade AS UND
                  FROM historico_vendas 
                  INNER JOIN produto ON produto.Id = historico_vendas.Id_Prod
                  INNER JOIN unidade_medicao ON unidade_medicao.Id = historico_vendas.Unidade_Medicao
                  WHERE historico_vendas.Id_Venda in ($str)
                  AND historico_vendas.Estorno IS NULL
                  GROUP BY produto.Descricao";
          $Vendas = $connection->execute($sql)->fetchAll('assoc');



          $sql = " SELECT produto.Descricao AS DESCRICAO,
                     SUM(historico_vendas.Qtd_Venda) AS QTD,
                     unidade_medicao.unidade AS UND,
                     cidade.Nome AS CIDADE,
                     estado.nome AS ESTADO
                  FROM historico_vendas 
                  INNER JOIN produto ON produto.Id = historico_vendas.Id_Prod
                  INNER JOIN unidade_medicao ON unidade_medicao.Id = historico_vendas.Unidade_Medicao
                  INNER JOIN cliente on cliente.Id = historico_vendas.Id_Cliente
                  INNER JOIN cidade on cidade.id = cliente.cidade
                  INNER JOIN estado on estado.id = cliente.UF
                  WHERE historico_vendas.Id_Venda in ($str)
                  AND historico_vendas.Estorno IS NULL
                  GROUP BY produto.Descricao";
          $Vendaestado = $connection->execute($sql)->fetchAll('assoc');

      }
 
        $this->set(compact('Vendas','selecao','Vendaestado','cliente'));   
        $this->set('_serialize',['Vendas','selecao','Vendaestado','cliente']);
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
    }

    public function viewvendaperiodo(){

      $connection = ConnectionManager::get('default');


      if ($this->request->is('post')){
         
          $dateinci = $this->request->data['dateinci'];

          $datefinal = $this->request->data['datefinal'];

          $diaini = substr($dateinci,0,2);$diafin = substr($datefinal,0,2);

          $mesini = substr($dateinci,3,2);$mesfin = substr($datefinal,3,2);

          $anoini = substr($dateinci,6,4);$anofin = substr($datefinal,6,4);

          $dataini = $diaini.'/'.$mesini.'/'.$anoini;

          $datafim = $diafin.'/'.$mesfin.'/'.$anofin;

            $sql = " SELECT historico_vendas.Id_Venda AS ID,
                    cliente.Nome as CLIENTE,
                    historico_vendas.Valor_Final_Venda as VLR,
                    historico_vendas.Data_Venda as DTVENDA
                  FROM historico_vendas 
                  INNER JOIN cliente ON historico_vendas.Id_Cliente = cliente.Id
                  WHERE STR_TO_DATE(Data_Venda, '%d/%m/%Y') BETWEEN STR_TO_DATE('$dataini', '%d/%m/%Y') AND STR_TO_DATE('$datafim', '%d/%m/%Y')
                  AND historico_vendas.Estorno IS NULL
                  GROUP BY historico_vendas.Id_Venda
                  ORDER BY STR_TO_DATE(Data_Venda, '%d/%m/%Y')";
          $cliente = $connection->execute($sql)->fetchAll('assoc');

          $sql = " SELECT produto.Descricao AS DESCRICAO,
                     SUM(historico_vendas.Qtd_Venda) AS QTD,
                     SUM(historico_vendas.Valor_Prod_Venda) AS PRECO,
                     count(historico_vendas.Qtd_Venda) AS QTDuni,
                     unidade_medicao.unidade AS UND
                  FROM historico_vendas 
                  INNER JOIN produto ON produto.Id = historico_vendas.Id_Prod
                  INNER JOIN unidade_medicao ON unidade_medicao.Id = historico_vendas.Unidade_Medicao
                  WHERE STR_TO_DATE(Data_Venda, '%d/%m/%Y') BETWEEN STR_TO_DATE('$dataini', '%d/%m/%Y') AND STR_TO_DATE('$datafim', '%d/%m/%Y')
                  AND historico_vendas.Estorno IS NULL
                  GROUP BY produto.Descricao";
          $Vendas = $connection->execute($sql)->fetchAll('assoc');



          $sql = " SELECT produto.Descricao AS DESCRICAO,
                     SUM(historico_vendas.Qtd_Venda) AS QTD,
                     unidade_medicao.unidade AS UND,
                     cidade.Nome AS CIDADE,
                     estado.nome AS ESTADO

                  FROM historico_vendas 
                  INNER JOIN produto ON produto.Id = historico_vendas.Id_Prod
                  INNER JOIN unidade_medicao ON unidade_medicao.Id = historico_vendas.Unidade_Medicao
                  INNER JOIN cliente on cliente.Id = historico_vendas.Id_Cliente
                  INNER JOIN cidade on cidade.id = cliente.cidade
                  INNER JOIN estado on estado.id = cliente.UF
                  WHERE STR_TO_DATE(Data_Venda, '%d/%m/%Y') BETWEEN STR_TO_DATE('$dataini', '%d/%m/%Y') AND STR_TO_DATE('$datafim', '%d/%m/%Y')
                  AND historico_vendas.Estorno IS NULL
                  GROUP BY produto.Descricao
                  order by cidade.Nome";
          $Vendaestado = $connection->execute($sql)->fetchAll('assoc');

      }
 
        $this->set(compact('Vendas','dateinci','datefinal','selecao','Vendaestado','cliente'));   
        $this->set('_serialize',['Vendas','dateinci','datefinal','selecao','Vendaestado','cliente']);
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
    }

    public function viewvendaperiodoanalitico(){

      $connection = ConnectionManager::get('default');


      if ($this->request->is('post')){
         
          $dateinci = $this->request->data['dateinci'];

          $datefinal = $this->request->data['datefinal'];

          $diaini = substr($dateinci,0,2);$diafin = substr($datefinal,0,2);

          $mesini = substr($dateinci,3,2);$mesfin = substr($datefinal,3,2);

          $anoini = substr($dateinci,6,4);$anofin = substr($datefinal,6,4);

          $dataini = $diaini.'/'.$mesini.'/'.$anoini;

          $datafim = $diafin.'/'.$mesfin.'/'.$anofin;

            $sql = " SELECT historico_vendas.Id_Venda AS ID,
                    cliente.Nome as CLIENTE,
                    historico_vendas.Valor_Final_Venda as VLR,
                    historico_vendas.Data_Venda as DTVENDA
                  FROM historico_vendas 
                  INNER JOIN cliente ON historico_vendas.Id_Cliente = cliente.Id
                  WHERE STR_TO_DATE(Data_Venda, '%d/%m/%Y') BETWEEN STR_TO_DATE('$dataini', '%d/%m/%Y') AND STR_TO_DATE('$datafim', '%d/%m/%Y')
                  AND historico_vendas.Estorno IS NULL
                  GROUP BY historico_vendas.Id_Venda
                  ORDER BY STR_TO_DATE(Data_Venda, '%d/%m/%Y')";
          $cliente = $connection->execute($sql)->fetchAll('assoc');

          $sql = " SELECT produto.Descricao AS DESCRICAO,
                     SUM(historico_vendas.Qtd_Venda) AS QTD,
                     SUM(historico_vendas.Valor_Prod_Venda) AS PRECO,
                     count(historico_vendas.Qtd_Venda) AS QTDuni,
                     unidade_medicao.unidade AS UND
                  FROM historico_vendas 
                  INNER JOIN produto ON produto.Id = historico_vendas.Id_Prod
                  INNER JOIN unidade_medicao ON unidade_medicao.Id = historico_vendas.Unidade_Medicao
                  WHERE STR_TO_DATE(Data_Venda, '%d/%m/%Y') BETWEEN STR_TO_DATE('$dataini', '%d/%m/%Y') AND STR_TO_DATE('$datafim', '%d/%m/%Y')
                  AND historico_vendas.Estorno IS NULL
                  GROUP BY produto.Descricao";
          $Vendas = $connection->execute($sql)->fetchAll('assoc');



          $sql = " SELECT produto.Descricao AS DESCRICAO,
                     SUM(historico_vendas.Qtd_Venda) AS QTD,
                     unidade_medicao.unidade AS UND,
                     cidade.Nome AS CIDADE,
                     estado.nome AS ESTADO

                  FROM historico_vendas 
                  INNER JOIN produto ON produto.Id = historico_vendas.Id_Prod
                  INNER JOIN unidade_medicao ON unidade_medicao.Id = historico_vendas.Unidade_Medicao
                  INNER JOIN cliente on cliente.Id = historico_vendas.Id_Cliente
                  INNER JOIN cidade on cidade.id = cliente.cidade
                  INNER JOIN estado on estado.id = cliente.UF
                  WHERE STR_TO_DATE(Data_Venda, '%d/%m/%Y') BETWEEN STR_TO_DATE('$dataini', '%d/%m/%Y') AND STR_TO_DATE('$datafim', '%d/%m/%Y')
                  AND historico_vendas.Estorno IS NULL
                  GROUP BY produto.Descricao
                  order by cidade.Nome";
          $Vendaestado = $connection->execute($sql)->fetchAll('assoc');

      }
 
        $this->set(compact('Vendas','dateinci','datefinal','selecao','Vendaestado','cliente'));   
        $this->set('_serialize',['Vendas','dateinci','datefinal','selecao','Vendaestado','cliente']);
        $this->viewBuilder()->layout('ajax');
        $this->response->type('pdf');
    }

    public function vendascliente(){

        $codclien = $this->request->data['codcli'];

        $connection = ConnectionManager::get('default');

        $sql = " SELECT users.name AS VENDEDOR, 
                        forma_pag.Tipo AS FORMAPAG, 
                        historico_vendas.Desconto AS PERCDESCONTO, 
                        historico_vendas.Valor_Desconto AS VLRDSC, 
                        historico_vendas.Valor_venda_sem_desconto AS VLSDSC, 
                        historico_vendas.Valor_Final_Venda AS VLRVNDA, 
                        historico_vendas.Parcela_Venda AS PARCELAS, 
                        titulos_a_receber.Vencimento AS DTVENC, 
                        titulos_a_receber.Valor AS VLR,
                        historico_vendas.Data_Venda AS DTVENDA,
                        titulos_a_receber.Baixa AS BAIXA,
                        cliente.nome AS CLIENTE,
                        cidade.nome AS CIDADE,
                        estado.nome AS ESTADO
                        FROM historico_vendas 
                 INNER JOIN cliente on cliente.Id = historico_vendas.Id_Cliente       
                 INNER JOIN forma_pag on forma_pag.Id = historico_vendas.Id_Form_Pag 
                 INNER JOIN users on users.Id = historico_vendas.Id_Vendedor 
                 INNER JOIN titulos_a_receber on titulos_a_receber.Id_Venda = 
                 historico_vendas.Id_Venda 
                 INNER JOIN cidade on cidade.id = cliente.Cidade
                 INNER JOIN estado on estado.id = cliente.UF
                 WHERE cliente.Id = '$codclien'
                 GROUP BY users.name,forma_pag.Tipo,historico_vendas.Desconto,
                 historico_vendas.Valor_Desconto, historico_vendas.Valor_venda_sem_desconto,
                 historico_vendas.Valor_Final_Venda, historico_vendas.Parcela_Venda,
                 titulos_a_receber.Vencimento,titulos_a_receber.Valor,cliente.Nome,
                 estado.nome";
        $Cliente = $connection->execute($sql)->fetchAll('assoc');

        $QtdVenda = count($Cliente);

        $this->set(compact('Cliente','QtdVenda','ValorVenda'));   
        $this->set('_serialize', ['Cliente','QtdVenda','ValorVenda']);
    }

    public function vendasvendedor(){

        $codvnd = $this->request->data['codvnd'];
        $mes = $this->request->data['monthly'];
        $ano = $this->request->data['year'];

        $period = '';
          if ($mes == 'JANEIRO'){
               $period = '01';
          }elseif ($mes == 'FEVEREIRO') {
               $period = '02';
          }elseif ($mes == 'MARÇO') {
               $period = '03';
          }elseif ($mes == 'ABRIL') {
               $period = '04';
          }elseif ($mes == 'MAIO') {
               $period = '05';
          }elseif ($mes == 'JUNHO') {
               $period = '06';
          }elseif ($mes == 'JULHO') {
               $period = '07';
          }elseif ($mes == 'AGOSTO') {
               $period = '08';
          }elseif ($mes == 'SETEMBRO') {
               $period = '09';
          }elseif ($mes == 'OUTUBRO') {
               $period = '10';
          }elseif ($mes == 'NOVEMBRO') {
               $period = '11';
          }elseif ($mes == 'DEZEMBRO') {
               $period = '12';
          }

        $PeriodoInicial = $period.'/'.$ano;
        $connection = ConnectionManager::get('default');

        $sql = "SELECT name FROM users
                WHERE id = '$codvnd'";
        $Vend = $connection->execute($sql)->fetchAll('assoc');

        $NomVnd = '';
        foreach ($Vend as $value) {
              $NomVnd = $value['name'];
        }

        $sql = " SELECT historico_vendas.Id_Venda AS ID,
                        forma_pag.Tipo AS FORMAPAG, 
                        titulos_a_receber.Valor AS VLR,
                        historico_vendas.Data_Venda AS DTVENDA,
                        cliente.nome AS CLIENTE,
                        cidade.nome AS CIDADE,
                        estado.nome AS ESTADO
                 FROM historico_vendas   
                 INNER JOIN users on users.Id = historico_vendas.Id_Vendedor 
                 INNER JOIN cliente on cliente.Id = historico_vendas.Id_Cliente       
                 INNER JOIN forma_pag on forma_pag.Id = historico_vendas.Id_Form_Pag 
                 INNER JOIN titulos_a_receber on titulos_a_receber.Id_Venda = 
                 historico_vendas.Id_Venda 
                 INNER JOIN cidade on cidade.id = cliente.Cidade
                 INNER JOIN estado on estado.id = cliente.UF
                 INNER JOIN produto on produto.Id = historico_vendas.Id_Prod
                 INNER JOIN unidade_medicao on unidade_medicao.Id 
                 = historico_vendas.Unidade_Medicao
                 WHERE users.id = '$codvnd'
                 AND historico_vendas.Data_Venda LIKE '%$PeriodoInicial%'
                 AND titulos_a_receber.estorno is null
                 GROUP BY historico_vendas.Data_Venda,
                 cliente.nome,forma_pag.Tipo,cidade.nome,
                 estado.nome,historico_vendas.Id_Venda
                 ORDER BY historico_vendas.Id_Venda";
        $Vendedor = $connection->execute($sql)->fetchAll('assoc');

        $QtdVenda = count($Vendedor);
        $ValorVenda = 0;
        foreach ($Vendedor as $value) {
           $ValorVenda += $value['VLR'];
        }

        $this->set(compact('Vendedor','QtdVenda','ValorVenda','Vend',
        'NomVnd','PeriodoInicial'));   
        $this->set('_serialize',['Vendedor','QtdVenda','ValorVenda',
        'Vend','NomVnd','PeriodoInicial']);
    }

    public function prodvendavendedor($id){

       $connection = ConnectionManager::get('default');

       $sql = " SELECT historico_vendas.Desconto AS PERCDESCONTO, 
                        historico_vendas.Valor_Desconto AS VLRDSC, 
                        historico_vendas.Valor_venda_sem_desconto AS VLSDSC, 
                        historico_vendas.Valor_Final_Venda AS VLRVNDA, 
                        titulos_a_receber.Valor AS VLR,
                        produto.Descricao AS PRODUTO,
                        historico_vendas.Qtd_Venda AS QTD,
                        unidade_medicao.unidade AS UNIDADE
                        FROM historico_vendas   
                 INNER JOIN users on users.Id = historico_vendas.Id_Vendedor 
                 INNER JOIN cliente on cliente.Id = historico_vendas.Id_Cliente       
                 INNER JOIN forma_pag on forma_pag.Id = historico_vendas.Id_Form_Pag 
                 INNER JOIN titulos_a_receber on titulos_a_receber.Id_Venda = 
                 historico_vendas.Id_Venda 
                 INNER JOIN cidade on cidade.id = cliente.Cidade
                 INNER JOIN estado on estado.id = cliente.UF
                 INNER JOIN produto on produto.Id = historico_vendas.Id_Prod
                 INNER JOIN unidade_medicao on unidade_medicao.Id 
                 = historico_vendas.Unidade_Medicao
                 WHERE historico_vendas.Id_Venda = '$id'
                 AND historico_vendas.Data_Venda
                 GROUP BY historico_vendas.Desconto,historico_vendas.Valor_Desconto,
                 historico_vendas.Valor_venda_sem_desconto,historico_vendas.Valor_Final_Venda,
                 titulos_a_receber.Valor,produto.Descricao,historico_vendas.Qtd_Venda,
                 unidade_medicao.unidade";
        $Produto = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('Produto'));   
        $this->set('_serialize',['Produto']);
    }

    public function comprafornecedor(){

        $connection = ConnectionManager::get('default');

        $codfrn = $this->request->data['codfor'];

        if ( $codfrn == '0'){
          $sql = " SELECT fornecedor.Razao_social AS FORNECEDOR,
                          fornecedor.CNPJ AS CNPJ,
                          fornecedor.Estado AS ESTADO,
                          fornecedor.Municipio AS MUNICIPIO,
                          historico_compra.Valor_Compra AS VALOR,
                          historico_compra.Data_Compra AS DATA
                   FROM historico_compra
                   INNER JOIN fornecedor on fornecedor.Id = 
                   historico_compra.Id_Fornecedor
                   GROUP BY fornecedor.Razao_social,historico_compra.Valor_Compra,
                            historico_compra.Data_Compra,fornecedor.CNPJ,
                            fornecedor.Estado,fornecedor.Municipio";
          $Fornecedor = $connection->execute($sql)->fetchAll('assoc');
        }else{
          $sql = " SELECT fornecedor.Razao_social AS FORNECEDOR,
                          fornecedor.CNPJ AS CNPJ,
                          fornecedor.Estado AS ESTADO,
                          fornecedor.Municipio AS MUNICIPIO,
                          historico_compra.Valor_Compra AS VALOR,
                          historico_compra.Data_Compra AS DATA
                   FROM historico_compra
                   INNER JOIN fornecedor on fornecedor.Id = 
                   historico_compra.Id_Fornecedor
                   WHERE fornecedor.Id = '$codfrn'
                   GROUP BY fornecedor.Razao_social,historico_compra.Valor_Compra,
                            historico_compra.Data_Compra,fornecedor.CNPJ,
                            fornecedor.Estado,fornecedor.Municipio";
          $Fornecedor = $connection->execute($sql)->fetchAll('assoc');
        }
        
        $this->set(compact('Fornecedor'));   
        $this->set('_serialize',['Fornecedor']);
    }

    public function myvendas(){

      $connection = ConnectionManager::get('default');

        $session = new \Cake\Network\Session;
        $user = $session->read('Auth.User');
        $Id = $user['id_grupo'];
        $Cpf = $user['cpf'];

        $sql = " SELECT *,cidade.nome AS NCIDADE,estado.nome NESTADO FROM cliente 
                      INNER JOIN users on users.cpf = cliente.Vendedor
                      INNER JOIN cidade on cidade.id = cliente.Cidade
                      INNER JOIN estado on estado.id = cliente.UF   
                      WHERE Obsoleto = 0
                      AND cliente.Vendedor = '$Cpf'";
        $Cliente = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('Cliente'));   
        $this->set('_serialize',['Cliente']);
    }

    public function meusclientes(){

        $codclien = $this->request->data['codcli'];

        $connection = ConnectionManager::get('default');

        $sql = " SELECT users.name AS VENDEDOR, 
                        forma_pag.Tipo AS FORMAPAG, 
                        historico_vendas.Desconto AS PERCDESCONTO, 
                        historico_vendas.Valor_Desconto AS VLRDSC, 
                        historico_vendas.Valor_venda_sem_desconto AS VLSDSC, 
                        historico_vendas.Valor_Final_Venda AS VLRVNDA, 
                        historico_vendas.Parcela_Venda AS PARCELAS, 
                        titulos_a_receber.Vencimento AS DTVENC, 
                        titulos_a_receber.Valor AS VLR,
                        historico_vendas.Data_Venda AS DTVENDA,
                        titulos_a_receber.Baixa AS BAIXA,
                        cliente.nome AS CLIENTE,
                        cidade.nome AS CIDADE,
                        estado.nome AS ESTADO
                        FROM historico_vendas 
                 INNER JOIN cliente on cliente.Id = historico_vendas.Id_Cliente       
                 INNER JOIN forma_pag on forma_pag.Id = historico_vendas.Id_Form_Pag 
                 INNER JOIN users on users.Id = historico_vendas.Id_Vendedor 
                 INNER JOIN titulos_a_receber on titulos_a_receber.Id_Venda = 
                 historico_vendas.Id_Venda 
                 INNER JOIN cidade on cidade.id = cliente.Cidade
                 INNER JOIN estado on estado.id = cliente.UF
                 WHERE cliente.Id = '$codclien'
                 GROUP BY users.name,forma_pag.Tipo,historico_vendas.Desconto,
                 historico_vendas.Valor_Desconto, historico_vendas.Valor_venda_sem_desconto,
                 historico_vendas.Valor_Final_Venda, historico_vendas.Parcela_Venda,
                 titulos_a_receber.Vencimento,titulos_a_receber.Valor,cliente.Nome,
                 estado.nome";
        $Cliente = $connection->execute($sql)->fetchAll('assoc');

        $QtdVenda = count($Cliente);
        $ValorVenda = 0;
        foreach ($Cliente as $value) {
           $ValorVenda += $value['VLR'];
        }

        $this->set(compact('Cliente','QtdVenda','ValorVenda'));   
        $this->set('_serialize', ['Cliente','QtdVenda','ValorVenda']);
    }

    public function minhasvendas(){

        $mes = $this->request->data['monthly'];
        $ano = $this->request->data['year'];

        $period = '';
          if ($mes == 'JANEIRO'){
               $period = '01';
          }elseif ($mes == 'FEVEREIRO') {
               $period = '02';
          }elseif ($mes == 'MARÇO') {
               $period = '03';
          }elseif ($mes == 'ABRIL') {
               $period = '04';
          }elseif ($mes == 'MAIO') {
               $period = '05';
          }elseif ($mes == 'JUNHO') {
               $period = '06';
          }elseif ($mes == 'JULHO') {
               $period = '07';
          }elseif ($mes == 'AGOSTO') {
               $period = '08';
          }elseif ($mes == 'SETEMBRO') {
               $period = '09';
          }elseif ($mes == 'OUTUBRO') {
               $period = '10';
          }elseif ($mes == 'NOVEMBRO') {
               $period = '11';
          }elseif ($mes == 'DEZEMBRO') {
               $period = '12';
          }

        $PeriodoInicial = $period.'/'.$ano;

        $session = new \Cake\Network\Session;
        $user = $session->read('Auth.User');
        $codvnd = $user['id'];

        $connection = ConnectionManager::get('default');

        $sql = "SELECT name FROM users
                WHERE id = '$codvnd'";
        $Vend = $connection->execute($sql)->fetchAll('assoc');

        $NomVnd = '';
        foreach ($Vend as $value) {
              $NomVnd = $value['name'];
        }

        $sql = " SELECT forma_pag.Tipo AS FORMAPAG, 
                        historico_vendas.Desconto AS PERCDESCONTO, 
                        historico_vendas.Valor_Desconto AS VLRDSC, 
                        historico_vendas.Valor_venda_sem_desconto AS VLSDSC, 
                        historico_vendas.Valor_Final_Venda AS VLRVNDA, 
                        historico_vendas.Parcela_Venda AS PARCELAS, 
                        titulos_a_receber.Vencimento AS DTVENC, 
                        titulos_a_receber.Valor AS VLR,
                        historico_vendas.Data_Venda AS DTVENDA,
                        titulos_a_receber.Baixa AS BAIXA,
                        cliente.nome AS CLIENTE,
                        cidade.nome AS CIDADE,
                        estado.nome AS ESTADO,
                        produto.Descricao AS PRODUTO,
                        historico_vendas.Qtd_Venda AS QTD,
                        unidade_medicao.unidade AS UNIDADE
                        FROM historico_vendas   
                 INNER JOIN users on users.Id = historico_vendas.Id_Vendedor 
                 INNER JOIN cliente on cliente.Id = historico_vendas.Id_Cliente       
                 INNER JOIN forma_pag on forma_pag.Id = historico_vendas.Id_Form_Pag 
                 INNER JOIN titulos_a_receber on titulos_a_receber.Id_Venda = 
                 historico_vendas.Id_Venda 
                 INNER JOIN cidade on cidade.id = cliente.Cidade
                 INNER JOIN estado on estado.id = cliente.UF
                 INNER JOIN produto on produto.Id = historico_vendas.Id_Prod
                 INNER JOIN unidade_medicao on unidade_medicao.Id 
                 = historico_vendas.Unidade_Medicao
                 WHERE users.id = '$codvnd'
                 AND historico_vendas.Data_Venda
                 GROUP BY users.name,forma_pag.Tipo,historico_vendas.Desconto,
                 historico_vendas.Valor_Desconto, historico_vendas.Valor_venda_sem_desconto,
                 historico_vendas.Valor_Final_Venda, historico_vendas.Parcela_Venda,
                 titulos_a_receber.Vencimento,titulos_a_receber.Valor,cliente.Nome,
                 estado.nome";
        $Vendedor = $connection->execute($sql)->fetchAll('assoc');

        $QtdVenda = count($Vendedor);
        $ValorVenda = 0;
        foreach ($Vendedor as $value) {
           $ValorVenda += $value['VLR'];
        }

        $this->set(compact('Vendedor','QtdVenda','ValorVenda','Vend','NomVnd'));   
        $this->set('_serialize',['Vendedor','QtdVenda','ValorVenda','Vend','NomVnd']);
    }
    /////////////////////////////////



    //////////////// TITULOS /////////////
    public function titulospagar(){

       $connection = ConnectionManager::get('default');

        $date = date('m/Y');
        $sql = "SELECT historico_compra.Id_Compra AS CODIGO,
                       titulos_a_pagar.Vencimento AS VENCIMENTO,
                       titulos_a_pagar.Data_Baixa AS DATABAIXA,
                       titulos_a_pagar.Valor AS VALOR,
                       fornecedor.Razao_social AS FORNECEDOR
                FROM titulos_a_pagar 
                INNER JOIN historico_compra ON  historico_compra.Id_Compra 
                = titulos_a_pagar.Id_Compra
                INNER JOIN fornecedor ON fornecedor.Id = 
                historico_compra.Id_Fornecedor
                WHERE Baixa IS NULL
                AND titulos_a_pagar.Vencimento LIKE '%$date%'";
        $TituloPag = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('TituloPag'));   
        $this->set('_serialize', ['TituloPag']);
    }

    public function baixatitulospagar($id){

        $connection = ConnectionManager::get('default');

            $date = date('d/m/Y');

              $sql = "UPDATE titulos_a_pagar
                      SET Baixa = 'SIM',
                          Data_Baixa = '$date'
                      WHERE Id_Compra = '$id'";
              $connection->execute($sql);

            $this->Flash->success(__('Título Baixado com sucesso !'));
            return $this->redirect(['action' => 'titulospagar']);

            $this->set(compact('id'));   
            $this->set('_serialize', ['id']); 
    }

    public function titulosbaixados(){

      $connection = ConnectionManager::get('default');

        $sql = "SELECT historico_compra.Id_Compra AS CODIGO,
                       titulos_a_pagar.Vencimento AS VENCIMENTO,
                       titulos_a_pagar.Data_Baixa AS DATABAIXA,
                       titulos_a_pagar.Valor AS VALOR,
                       fornecedor.Razao_social AS FORNECEDOR
                FROM titulos_a_pagar
                INNER JOIN historico_compra ON  historico_compra.Id_Compra 
                = titulos_a_pagar.Id_Compra
                INNER JOIN fornecedor ON fornecedor.Id = 
                historico_compra.Id_Fornecedor
                WHERE Baixa IS NOT NULL";
        $TituloBaix = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('TituloBaix'));   
        $this->set('_serialize', ['TituloBaix']);
    }


    public function titulosreceber(){

      $connection = ConnectionManager::get('default');

        $sql = "SELECT 
                       titulos_a_receber.Id AS ID,
                       historico_vendas.Id_Venda AS CODIGO,
                       titulos_a_receber.Vencimento AS VENCIMENTO,
                       titulos_a_receber.Data_Baixa AS DATABAIXA,
                       titulos_a_receber.Valor AS VALOR,
                       cliente.Nome AS CLIENTE
                FROM historico_vendas 
                INNER JOIN cliente ON cliente.Id = 
                historico_vendas.Id_Cliente
                INNER JOIN titulos_a_receber ON titulos_a_receber.Id_Venda = 
                historico_vendas.Id_Venda
                WHERE Baixa IS NULL
                AND historico_vendas.Estorno IS NULL and historico_vendas.Id_Form_Pag != '3'
                GROUP BY historico_vendas.Id_Venda,titulos_a_receber.Vencimento,
                titulos_a_receber.Data_Baixa,titulos_a_receber.Valor,
                cliente.Nome";
        $TituloRec = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('TituloRec'));   
        $this->set('_serialize', ['TituloRec']);
    }

    public function titulosreceberavista(){

      $connection = ConnectionManager::get('default');

        $sql = "SELECT historico_vendas.Id_Venda AS CODIGO,
                       titulos_a_receber.Vencimento AS VENCIMENTO,
                       titulos_a_receber.Data_Baixa AS DATABAIXA,
                       titulos_a_receber.Valor AS VALOR,
                       cliente.Nome AS CLIENTE,
                       historico_vendas.Data_Venda AS DATAVENDA
                FROM historico_vendas 
                INNER JOIN cliente ON cliente.Id = 
                historico_vendas.Id_Cliente
                INNER JOIN titulos_a_receber ON titulos_a_receber.Id_Venda = 
                historico_vendas.Id_Venda
                WHERE Baixa IS NULL
                AND titulos_a_receber.Estorno IS NULL AND historico_vendas.Id_Form_Pag = '3'
                GROUP BY historico_vendas.Id_Venda,titulos_a_receber.Vencimento,
                titulos_a_receber.Data_Baixa,titulos_a_receber.Valor,
                cliente.Nome";
        $TituloRecavista = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('TituloRecavista'));   
        $this->set('_serialize', ['TituloRecavista']);
    }

    public function baixatitulorecebe($id){

      $connection = ConnectionManager::get('default');

              $date = date('d/m/Y');

              $sql = "UPDATE titulos_a_receber
                      SET Baixa = 'SIM',
                          Data_Baixa = '$date'
                      WHERE Id = '$id'";
              $connection->execute($sql);

            $this->Flash->success(__('Título Baixado com sucesso !'));
            return $this->redirect(['action' => 'titulosreceber']);

            $this->set(compact('id'));   
            $this->set('_serialize', ['id']);
    }

    public function baixatitulorecebermult (){

      $connection = ConnectionManager::get('default');

      if ($this->request->is('post')){
         
            $ids = $this->request->data['selecao'];
            $str = implode(',',$ids);

            $date = date('d/m/Y');

              $sql = "UPDATE titulos_a_receber
                      SET Baixa = 'SIM',
                          Data_Baixa = '$date'
                      WHERE Id in ($str)";
              $connection->execute($sql);

            $this->Flash->success(__('Título Baixado com sucesso !'));
            return $this->redirect(['action' => 'titulosreceber']);

            $this->set(compact('id'));   
            $this->set('_serialize', ['id']);

      }
    }


    public function titulosbaixadosrec(){

       $connection = ConnectionManager::get('default');

        $sql = "SELECT 
                       titulos_a_receber.Id AS ID,
                       historico_vendas.Id_Venda AS CODIGO,
                       titulos_a_receber.Vencimento AS VENCIMENTO,
                       titulos_a_receber.Data_Baixa AS DATABAIXA,
                       titulos_a_receber.Valor AS VALOR,
                       cliente.Nome AS CLIENTE
                FROM historico_vendas 
                INNER JOIN cliente ON cliente.Id = 
                historico_vendas.Id_Cliente
                INNER JOIN titulos_a_receber ON titulos_a_receber.Id_Venda = 
                historico_vendas.Id_Venda
                WHERE Baixa IS NOT NULL AND titulos_a_receber.Estorno IS NULL
                group by titulos_a_receber.Id";
        $TituloRec = $connection->execute($sql)->fetchAll('assoc');

        $this->set(compact('TituloRec'));   
        $this->set('_serialize', ['TituloRec']);
    }
    //////////////////////////////////////

    /////// BAIXA TITULO HOME //////////
    public function baixatitulopaghome($id){

        $connection = ConnectionManager::get('default');

            $date = date('d/m/Y');

              $sql = "UPDATE titulos_a_pagar
                      SET Baixa = 'SIM',
                          Data_Baixa = '$date'
                      WHERE Id_Compra = '$id'";
              $connection->execute($sql);

            $this->Flash->success(__('Título Baixado com sucesso !'));
            return $this->redirect(['controller' => 'pages','action' => 'home']);

            $this->set(compact('id'));   
            $this->set('_serialize', ['id']);
    }
    //////////////////////////////////

}
?>