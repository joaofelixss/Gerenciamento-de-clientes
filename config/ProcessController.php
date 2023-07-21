<?php

class ProcessController
{
  private $conn;

  // Construtor da classe (caso necessário)
  public function __construct($connection)
  {
    $this->conn = $connection;
  }

  // Métodos para processar as requisições

  // Método para adicionar um novo cliente
  public function adicionarCliente($nome, $telefone, $preco, $data, $observacoes)
  {

    $query = "INSERT INTO clientes(nome, telefone, preco, data, observacoes) VALUES (:nome, :telefone, :preco, :data, :observacoes)";

    $concluir = $this->conn->prepare($query);

    $concluir->bindParam(":nome", $nome);
    $concluir->bindParam(":telefone", $telefone);
    $concluir->bindParam(":preco", $preco);
    $concluir->bindParam(":data", $data);
    $concluir->bindParam(":observacoes", $observacoes);

    $concluir->execute();
  }

  // Método para editar um cliente existente
  public function editarCliente($id, $nome, $telefone, $preco, $data, $observacoes)
  {

    $query = "UPDATE clientes
    SET nome = :nome, telefone = :telefone, preco = :preco, data = :data, observacoes = :observacoes
    WHERE id = :id";

    $concluir = $this->conn->prepare($query);

    $concluir->bindParam(":nome", $nome);
    $concluir->bindParam(":telefone", $telefone);
    $concluir->bindParam(":preco", $preco);
    $concluir->bindParam(":data", $data);
    $concluir->bindParam(":observacoes", $observacoes);
    $concluir->bindParam(":id", $id);

    $concluir->execute();
  }

  // Método para excluir um cliente
  public function excluirCliente($id)
  {

    $query = "DELETE FROM clientes WHERE id = :id";

    $concluir = $this->conn->prepare($query);

    $concluir->bindParam(":id", $id);

    $concluir->execute();
  }

  // Outros métodos conforme necessário

}
