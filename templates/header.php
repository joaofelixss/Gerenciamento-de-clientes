<?php
require_once("config/process.php");
require_once("config/url.php");

// limpa a mensagem
if (isset($_SESSION['msg'])) {
  $printMsg = $_SESSION['msg'];
  $_SESSION['msg'] = '';
}
?>

<!DOCTYPE html>
<html lang="en pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap</title>
  <link rel="stylesheet" href="<?= $BASE_URL ?>assets/Bootstrap/bootstrap.min.css">
</head>

<style>
  .inicio {
    font-size: 1.5rem;
    color: white;
  }
</style>

<body>
  <header class="mb-5">
    <nav class="flex justify-content-center navbar navbar-expand-lg navbar-dark bg-primary">
      <div>
        <div class="navbar-nav">
          <a class="inicio nav-link active" href="<?= $BASE_URL ?>create.php">Adicionar Contato <img src="<?= $BASE_URL ?>assets/pessoa.svg" alt="add"></a>
        </div>
      </div>
    </nav>
  </header>