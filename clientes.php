<?php

require_once('cliente.php');

class Clientes {
  private $clientes = array();

  // Método para adicionar um novo cliente à lista
  public function adicionar($nome, $telefone, $preco, $data, $observacoes) {
    $cliente = new Cliente($nome, $telefone, $preco, $data, $observacoes);
    $this->clientes[] = $cliente;
  }

  // Método para listar todos os clientes
  public function listarTodos() {
    return $this->clientes;
  }

}