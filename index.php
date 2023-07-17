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

  #msg {
    color: #155724;
    background-color: #D4EDDA;
    border: 1px solid #C3E6CB;
    padding: 10px;
    text-align: center;
    max-width: 500px;
    margin: 0 auto;
    margin-top: 30px;
  }
</style>

<div class="container">
  <?php if (isset($printMsg) && $printMsg != '') : ?>
    <p id="msg"><?= $printMsg ?></p>
  <?php endif; ?>
  <h1 id="main-title">Minha Agenda</h1>
  <?php if (count($clientes) > 0) : ?>
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
        <?php foreach ($clientes as $cliente) : ?>
          <tr>
            <td scope="row" class="col-id"><?= $cliente['id'] ?></td>
            <td scope="row"><?= $cliente['nome'] ?></td>
            <td scope="row"><?= $cliente['telefone'] ?></td>
            <td scope="row"><?= $cliente['preco'] ?></td>
            <td scope="row"><?= $cliente['data'] ?></td>
            <td scope="row"><?= $cliente['observacoes'] ?></td>
            <td class="actions">
              <a href="<?= $BASE_URL ?>ler.php"><img class="img" src="<?= $BASE_URL ?>assets/vixualizar.svg" alt="editar"></a>
              <a href="<?= $BASE_URL ?>editar.php""><img class=" img" src="<?= $BASE_URL ?>assets/edit.svg " alt="visualizar"></a>
              <form class="delete-form" action="<?= $BASE_URL ?>/config/process.php" method="POST">
                <input type="hidden" name="type" value="delete">
                <input type="hidden" name="id" value="">
                <button type="submit" class="delete-btn"><img src="<?= $BASE_URL ?>assets/delete.svg" alt="deletar"></button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else : ?>

  <?php endif ?>
</div>

<?php
require_once("templates/footer.php");
?>