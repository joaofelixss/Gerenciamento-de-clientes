<?php

session_start();

require_once("connection.php");
require_once("url.php");
require_once(__DIR__ . "/../models/Clientes.php");
require_once(__DIR__ . "/../controllers/ClienteController.php");

$post = $_POST;

if (!empty($post)) {
  // Instancie a classe ClienteController
  $ClienteController = new ClienteController($conn);

  // Verifique o tipo de requisição e chame o método apropriado do ClienteController
  if ($post['type'] === "create") {
    $nome = $post['nome'];
    $telefone = $post['telefone'];
    $preco = $post['preco'];
    $data = $post['data'];
    $observacoes = $post['observacoes'];

    $resultado = $ClienteController->adicionarCliente($nome, $telefone, $preco, $data, $observacoes);

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

    $resultado = $ClienteController->editarCliente($id, $nome, $telefone, $preco, $data, $observacoes);

    if ($resultado) {
      $_SESSION["msg"] = "Cliente atualizado com sucesso";
    } else {
      $_SESSION["msg"] = "Falha ao atualizar cliente";
    }
  } else if ($post['type'] === "delete") {

    $id = $post['id'];

    $resultado = $ClienteController->excluirCliente($id);
    if ($resultado) {
      $_SESSION["msg"] = "Cliente removido com sucesso";
    } else {
      $_SESSION["msg"] = "Falha ao remover cliente";
    }
  }

  // Redirect HOME
  header("Location:" . $BASE_URL . "views/index.php");
}
