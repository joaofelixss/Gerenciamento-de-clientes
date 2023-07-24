<?php

class ProcessController
{
  private $conn;
  private $clientes;

  // Construtor da classe (caso necessário)
  public function __construct($connection)
  {
    $this->conn = $connection;
    $this->clientes = new Clientes($connection); //Instanciamos o objeto Clientes
  }

  // Métodos para processar as requisições

  // Método para adicionar um novo cliente
  public function adicionarCliente($nome, $telefone, $preco, $data, $observacoes)
  {

    // Chamamos o método adicionar do objeto Clientes
    $resultado = $this->clientes->adicionar($nome, $telefone, $preco, $data, $observacoes);

    // Agora $resultado contém o id do último registro inserido
    return $resultado; // Retorna true se a inserção foi bem sucedida, ou false caso contrário.
  }

  // Método para editar um cliente existente
  public function editarCliente($id, $nome, $telefone, $preco, $data, $observacoes)
  {

    // Chamamos o método adicionar do objeto Clientes
    $resultado = $this->clientes->editar($id, $nome, $telefone, $preco, $data, $observacoes);

    return $resultado; // Retorna true se a inserção foi bem sucedida, ou false caso contrário.
  }

  // Método para excluir um cliente
  public function excluirCliente($id)
  {

    // Chamamos o método adicionar do objeto Clientes
    $resultado = $this->clientes->excluir($id);

    return $resultado; // Retorna true se a inserção foi bem sucedida, ou false caso contrário.
  }

  // Outros métodos conforme necessário

}
