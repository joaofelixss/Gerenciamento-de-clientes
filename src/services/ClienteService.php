<?php

namespace Felix\JfGerenciamentoClientes\services;

use Felix\JfGerenciamentoClientes\config\Connection;
use Felix\JfGerenciamentoClientes\controllers\ClienteController;

class ClienteService
{
  public function getAllClientes()
  {
    // Instancie a classe Connection e obtenha a conexão
    $database = new Connection();
    $conn = $database->getConnection();

    // Instanciando o controlador de clientes
    $clienteController = new ClienteController($conn);

    // Recuperando a lista de clientes
    return $clienteController->exibirClientes();
  }
}
