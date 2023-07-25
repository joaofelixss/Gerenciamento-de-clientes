<?php

namespace Felix\JfGerenciamentoClientes\controllers;

use Felix\JfGerenciamentoClientes\models\Cliente;
use Felix\JfGerenciamentoClientes\models\Clientes;

class ClienteController
{
  private $conn;
  private $clientes;

  // Construtor da classe (caso necessário)
  public function __construct($connection)
  {
    $this->conn = $connection;
    $this->clientes = new Clientes($connection); //Instanciamos o objeto Clientes
  }

  public function temClientes()
  {
    return !empty($this->clientes->listarTodos());
  }

  // Métodos para processar as requisições

  public function exibirClientes()
  {
    $clientesData = $this->clientes->listarTodos();
    $clientes = array();

    foreach ($clientesData as $clienteData) {
      $cliente = new Cliente();
      $cliente->setId($clienteData['id']);
      $cliente->setNome($clienteData['nome']);
      $cliente->setTelefone($clienteData['telefone']);
      $cliente->setPreco($clienteData['preco']);
      $cliente->setData($clienteData['data']);
      $cliente->setObservacoes($clienteData['observacoes']);

      $clientes[] = $cliente;
    }

    return $clientes;
  }

  // Método para adicionar um novo cliente
  public function adicionarCliente($nome, $telefone, $preco, $data, $observacoes)
  {
    // Chamamos o método adicionar do objeto Clientes
    return $this->clientes->adicionar($nome, $telefone, $preco, $data, $observacoes);
  }

  // Método para editar um cliente existente
  public function editarCliente($id, $nome, $telefone, $preco, $data, $observacoes)
  {
    // Chamamos o método adicionar do objeto Clientes
    return $this->clientes->editar($id, $nome, $telefone, $preco, $data, $observacoes);
  }

  // Método para excluir um cliente
  public function excluirCliente($id)
  {
    // Chamamos o método adicionar do objeto Clientes
    return $this->clientes->excluir($id);
  }
}
