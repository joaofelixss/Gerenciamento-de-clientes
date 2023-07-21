<?php

require_once('cliente.php');

class Clientes
{
  private $clientes = array();

  // Método para adicionar um novo cliente à lista
  public function adicionar($nome, $telefone, $preco, $data, $observacoes)
  {
    $cliente = new Cliente($nome, $telefone, $preco, $data, $observacoes);
    $this->clientes[] = $cliente;
  }

  // Método para listar todos os clientes
  public function listarTodos()
  {
    return $this->clientes;
  }

  // Método para editar um cliente existente na lista
  public function editar($id, $nome, $telefone, $preco, $data, $observacoes)
  {
    foreach ($this->clientes as $cliente) {
      if ($cliente->getId() === $id) {
        $cliente->setNome($nome);
        $cliente->setTelefone($telefone);
        $cliente->setPreco($preco);
        $cliente->setData($data);
        $cliente->setObservacoes($observacoes);
        break;
      }
    }
  }

  // Método para excluir um cliente da lista
  public function excluir($id)
  {
    foreach ($this->clientes as $key => $cliente) {
      if ($cliente->getId() === $id) {
        unset($this->clientes[$key]);
        break;
      }
    }
    // Reindexar o array após excluir um elemento
    $this->clientes = array_values($this->clientes);
  }
}
