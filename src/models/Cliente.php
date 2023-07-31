<?php

namespace Felix\JfGerenciamentoClientes\models;

class Cliente
{
  private int $id;
  private string $nome;
  private string $telefone;
  private float $preco;
  private string $data;
  private string $observacoes;

  public function __construct(string $nome = '', string $telefone = '', float $preco = 0.0, string $data = '', string $observacoes = '')
  {
    $this->nome = $nome;
    $this->telefone = $telefone;
    $this->preco = $preco;
    $this->data = $data;
    $this->observacoes = $observacoes;
  }

  // Métodos Getters e Setters (acessores e modificadores) para cada propriedade

  public function getId(): int
  {
    return $this->id;
  }

  public function getNome(): string
  {
    return $this->nome;
  }

  public function getTelefone(): string
  {
    return $this->telefone;
  }

  public function getPreco(): float
  {
    return $this->preco;
  }

  public function getData(): string
  {
    return $this->data;
  }

  public function getObservacoes(): string
  {
    return $this->observacoes;
  }

  public function setId(int $id)
  {
    $this->id = $id;
  }

  public function setNome(string $nome)
  {
    $this->nome = $nome;
  }

  public function setTelefone(string $telefone)
  {
    $this->telefone = $telefone;
  }

  public function setPreco(float $preco)
  {
    $this->preco = $preco;
  }

  public function setData(string $data)
  {
    $this->data = $data;
  }

  public function setObservacoes(string $observacoes)
  {
    $this->observacoes = $observacoes;
  }
}
