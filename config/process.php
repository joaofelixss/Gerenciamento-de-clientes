<?php

session_start();

include_once("connection.php");
include_once("url.php");

$post = $_POST;

if (!empty($post)) {

  if ($post['type'] === "create") {
    $nome = $post['nome'];
    $telefone = $post['telefone'];
    $preco = $post['preco'];
    $data = $post['data'];
    $observacoes = $post['observacoes'];

    $query = "INSERT INTO clientes(nome, telefone, preco, data, observacoes) VALUES (:nome, :telefone, :preco, :data, :observacoes)";

    $concluir = $conn->prepare($query);

    $concluir->bindParam(":nome", $nome);
    $concluir->bindParam(":telefone", $telefone);
    $concluir->bindParam(":preco", $preco);
    $concluir->bindParam(":data", $data);
    $concluir->bindParam(":observacoes", $observacoes);

    try {

      $concluir->execute();
      $_SESSION["msg"] = "Cliente adicionado com sucesso";
    } catch (PDOException $e) {
      $error = $e->getMessage();
      echo "Erro: $error";
    }
  } else if ($post['type'] === "edit") {
    $nome = $post['nome'];
    $telefone = $post['telefone'];
    $preco = $post['preco'];
    $data = $post['data'];
    $observacoes = $post['observacoes'];
    $id = $post['id'];

    $query = "UPDATE clientes
              SET nome = :nome, telefone = :telefone, preco = :preco, data = :data, observacoes = :observacoes
              WHERE id = :id";

    $concluir = $conn->prepare($query);

    $concluir->bindParam(":nome", $nome);
    $concluir->bindParam(":telefone", $telefone);
    $concluir->bindParam(":preco", $preco);
    $concluir->bindParam(":data", $data);
    $concluir->bindParam(":observacoes", $observacoes);
    $concluir->bindParam(":id", $id);

    try {

      $concluir->execute();
      $_SESSION["msg"] = "Cliente atualizado com sucesso";
    } catch (PDOException $e) {
      $error = $e->getMessage();
      echo "Erro: $error";
    }
  } else if ($post['type'] === "delete") {

    $id = $post['id'];

    $query = "DELETE FROM clientes WHERE id = :id";

    $concluir = $conn->prepare($query);

    $concluir->bindParam(":id", $id);

    try {

      $concluir->execute();
      $_SESSION["msg"] = "Cliente removido com sucesso";
    } catch (PDOException $e) {
      $error = $e->getMessage();
      echo "Erro: $error";
    }
  }

  // Redirect HOME
  header("Location:" . $BASE_URL . "../index.php");
} else {

  $id;

  if (!empty($_GET)) {
    $id = $_GET["id"];
  }

  // Retorna o dado de um contato
  if (!empty($id)) {

    $query = "SELECT * FROM clientes WHERE id = :id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    $contact = $stmt->fetch();
  } else {

    // Retorna todos os contatos
    $clientes = [];

    $query = "SELECT * FROM clientes";

    $stmt = $conn->prepare($query);

    $stmt->execute();

    $clientes = $stmt->fetchAll();
  }
}

// FECHAR CONEXÃO
$conn = null;
