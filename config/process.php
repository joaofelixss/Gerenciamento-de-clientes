<?php

session_start();

include_once("connection.php");
include_once("url.php");
require_once("models/clientes.php");
require_once("models/cliente.php");
require_once("ProcessController.php");

$post = $_POST;

if (!empty($post)) {
  // Instancie a classe ProcessController
  $processController = new ProcessController($conn);

  // Verifique o tipo de requisição e chame o método apropriado do ProcessController
  if ($post['type'] === "create") {
    $nome = $post['nome'];
    $telefone = $post['telefone'];
    $preco = $post['preco'];
    $data = $post['data'];
    $observacoes = $post['observacoes'];

    $processController->adicionarCliente($nome, $telefone, $preco, $data, $observacoes);

    $_SESSION["msg"] = "Cliente adicionado com sucesso";
  } else if ($post['type'] === "edit") {
    $nome = $post['nome'];
    $telefone = $post['telefone'];
    $preco = $post['preco'];
    $data = $post['data'];
    $observacoes = $post['observacoes'];
    $id = $post['id'];

    $processController->editarCliente($id, $nome, $telefone, $preco, $data, $observacoes);

    $_SESSION["msg"] = "Cliente atualizado com sucesso";
  } else if ($post['type'] === "delete") {

    $id = $post['id'];

    $processController->excluirCliente($id);

    $_SESSION["msg"] = "Cliente removido com sucesso";
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
