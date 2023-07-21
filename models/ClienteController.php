<?php

require_once('Cliente.php');

class ClienteController
{
  private $clientes;

  public function __construct($connection)
  {
    $this->clientes = new Clientes($connection);
  }

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

  public function adicionarCliente($nome, $telefone, $preco, $data, $observacoes)
  {
    $this->clientes->adicionar($nome, $telefone, $preco, $data, $observacoes);
  }

  public function editarCliente($id, $nome, $telefone, $preco, $data, $observacoes)
  {
    $this->clientes->editar($id, $nome, $telefone, $preco, $data, $observacoes);
  }

  public function excluirCliente($id)
  {
    $this->clientes->excluir($id);
  }

  public function temClientes()
  {
    return !empty($this->clientes->listarTodos());
  }
}
