<?php
require_once("templates/header.php");
?>

<style>
  .delete-form {
    display: inline-block;
  }

  .delete-btn {
    background-color: transparent;
    border: none;
    padding: 0;
  }
</style>

<div class="container">
  <h1 id="main-title">Minha Agenda</h1>
  <table class="table" id="contacts-table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Telefone</th>
        <th scope="col">Preço</th>
        <th scope="col">Data</th>
        <th scope="col">Observações</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td scope="row" class="col-id"></td>
        <td scope="row"></td>
        <td scope="row"></td>
        <td scope="row"></td>
        <td scope="row"></td>
        <td scope="row"></td>
        <td class="actions">
          <a href="<?= $BASE_URL ?>CRUD's/ler.php"><img class="img" src="<?= $BASE_URL ?>assets/edit.svg" alt="editar"></a>
          <a href="<?= $BASE_URL ?>CRUD's/editar.php""><img class=" img" src="<?= $BASE_URL ?>assets/vixualizar.svg" alt="visualizar"></a>
          <form class="delete-form" action="<?= $BASE_URL ?>/config/process.php" method="POST">
            <input type="hidden" name="type" value="delete">
            <input type="hidden" name="id" value="">
            <button type="submit" class="delete-btn"><img src="<?= $BASE_URL ?>assets/delete.svg" alt="deletar"></button>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<?php
require_once("templates/footer.php");
?>