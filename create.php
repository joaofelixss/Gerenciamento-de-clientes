<?php
require_once("templates/header.php");
?>

<style>
  header {
    display: none;
  }

  .container {
    width: 50vh;
  }
</style>

<div class="container p-5">
  <?php include_once("templates/btn.html"); ?>
  <h1 id="main-title">Adicionar Cliente</h1>
  <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
    <input type="hidden" name="type" value="create">
    <div class="form-group p-2">
      <label for="nome">Nome do contato:</label>
      <input type="text" class="form-control " id="name" name="name" placeholder="Digite o nome" required>
    </div>
    <div class="form-group p-2">
      <label for="telefone">Telefone do contato:</label>
      <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o telefone" required>
    </div>
    <div class="form-group p-2">
      <label for="observacoes">Observações:</label>
      <textarea type="text" class="form-control" id="observations" name="observations" placeholder="Insira as observações" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
</div>