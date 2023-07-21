<?php

require_once('cliente.php');

class ClienteController
{
  private $clientes;

  public function __construct()
  {
    $this->clientes = new Clientes();
  }

  public function exibirClientes()
  {
    return $this->clientes->listarTodos();
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
    return !empty($this->clientes);
  }
}
