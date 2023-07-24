<?php

session_start();

include_once("connection.php");
include_once("url.php");
require_once(__DIR__ . "/../models/Clientes.php");
require_once(__DIR__ . "/../models/Cliente.php");
require_once(__DIR__ . "/../controllers/ProcessController.php");

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

    $resultado = $processController->adicionarCliente($nome, $telefone, $preco, $data, $observacoes);

    if ($resultado) {
      $_SESSION["msg"] = "Cliente adicionado com sucesso, ID: " . $resultado;
    } else {
      $_SESSION["msg"] = "Falha ao adicionar cliente";
    }
  } else if ($post['type'] === "edit") {
    $id = $post['id'];
    $nome = $post['nome'];
    $telefone = $post['telefone'];
    $preco = $post['preco'];
    $data = $post['data'];
    $observacoes = $post['observacoes'];

    $resultado = $processController->editarCliente($id, $nome, $telefone, $preco, $data, $observacoes);

    if ($resultado) {
      $_SESSION["msg"] = "Cliente atualizado com sucesso";
    } else {
      $_SESSION["msg"] = "Falha ao atualizar cliente";
    }
  } else if ($post['type'] === "delete") {

    $id = $post['id'];

    $resultado = $processController->excluirCliente($id);
    if ($resultado) {
      $_SESSION["msg"] = "Cliente removido com sucesso";
    } else {
      $_SESSION["msg"] = "Falha ao remover cliente";
    }
  }

  // Redirect HOME
  header("Location:" . $BASE_URL . "views/index.php");
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
