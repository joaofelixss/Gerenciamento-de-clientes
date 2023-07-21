<?php

require_once('cliente.php');

class Clientes
{
  private $conn;

  // Construtor da classe (recebe a conexão com o banco de dados)
  public function __construct($connection)
  {
    $this->conn = $connection;
  }

  // Método para adicionar um novo cliente ao banco de dados
  public function adicionar($nome, $telefone, $preco, $data, $observacoes)
  {
    $query = "INSERT INTO clientes(nome, telefone, preco, data, observacoes) VALUES (:nome, :telefone, :preco, :data, :observacoes)";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":telefone", $telefone);
    $stmt->bindParam(":preco", $preco);
    $stmt->bindParam(":data", $data);
    $stmt->bindParam(":observacoes", $observacoes);

    return $stmt->execute(); // Retorna true se a inserção foi bem sucedida, ou false caso contrário.
  }

  // Método para listar todos os clientes do banco de dados
  public function listarTodos()
  {
    $query = "SELECT * FROM clientes";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(); // Retorna um array com todos os clientes encontrados no banco de dados.
  }

  // Método para editar um cliente existente no banco de dados
  public function editar($id, $nome, $telefone, $preco, $data, $observacoes)
  {
    $query = "UPDATE clientes SET nome = :nome, telefone = :telefone, preco = :preco, data = :data, observacoes = :observacoes WHERE id = :id";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":telefone", $telefone);
    $stmt->bindParam(":preco", $preco);
    $stmt->bindParam(":data", $data);
    $stmt->bindParam(":observacoes", $observacoes);
    $stmt->bindParam(":id", $id);

    return $stmt->execute(); // Retorna true se a atualização foi bem sucedida, ou false caso contrário.
  }

  // Método para excluir um cliente do banco de dados
  public function excluir($id)
  {
    $query = "DELETE FROM clientes WHERE id = :id";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":id", $id);

    return $stmt->execute(); // Retorna true se a exclusão foi bem sucedida, ou false caso contrário.
  }
}
