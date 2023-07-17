<?php
require_once("templates/header.php");
?>

<style>
  header {
    display: none;
  }

  .container {
    width: 70vh;
  }
</style>

<div class="container p-5">
  <?php include_once("templates/btn.html"); ?>
  <h1 id="main-title">Adicionar Cliente</h1>
  <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
    <input type="hidden" name="type" value="create">
    <div class="form-group p-2">
      <label for="nome">Nome do cliente</label>
      <input type="text" class="form-control " id="nome" name="nome" placeholder="nome do cliente" required>
    </div>
    <div class="form-group p-2">
      <label for="telefone">Telefone do cliente</label>
      <input type="text" class="form-control" id="telefone" name="telefone" placeholder="telefone do cliente" required>
    </div>
    <div class="form-group p-2">
      <label for="preco">Preço da Compra</label>
      <input type="text" class="form-control" id="preco" name="preco" placeholder="R$" required>
    </div>
    <div class="form-group p-2">
      <label for="data">Data da compra</label>
      <input type="text" class="form-control" id="data" name="data" placeholder="01/01/2023" required>
    </div>
    <div class="form-group p-2">
      <label for="observacoes">Observações:</label>
      <textarea type="text" class="form-control" id="observacoes" name="observacoes" placeholder="Insira as observações" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
</div>