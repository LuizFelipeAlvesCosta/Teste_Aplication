<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Network\Exception\internalErrorException;
use cake\utility\text;
use cake\ORM\tableRegistry;


/**
 * Upload component
 */
class UploadComponent extends Component
{

  public $max_files = 5;

  public function Upload($arquivo)
  {

  	if (count($data) > $this ->max_files)
  	{
  		$this->_registry->getController()->fash->error('Limite de arquivos excedidos') 
  	}
  }
}
