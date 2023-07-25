<?php

namespace Felix\JfGerenciamentoClientes\models;

class Cliente
{
  private $id;
  private $nome;
  private $telefone;
  private $preco;
  private $data;
  private $observacoes;

  public function __construct($nome = '', $telefone = '', $preco = '', $data = '', $observacoes = '')
  {
    $this->nome = $nome;
    $this->telefone = $telefone;
    $this->preco = $preco;
    $this->data = $data;
    $this->observacoes = $observacoes;
  }

  // Métodos Getters e Setters (acessores e modificadores) para cada propriedade

  public function getId()
  {
    return $this->id;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function getTelefone()
  {
    return $this->telefone;
  }

  public function getPreco()
  {
    return $this->preco;
  }

  public function getData()
  {
    return $this->data;
  }

  public function getObservacoes()
  {
    return $this->observacoes;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function setTelefone($telefone)
  {
    $this->telefone = $telefone;
  }

  public function setPreco($preco)
  {
    $this->preco = $preco;
  }

  public function setData($data)
  {
    $this->data = $data;
  }

  public function setObservacoes($observacoes)
  {
    $this->observacoes = $observacoes;
  }
}
