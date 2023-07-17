<?php
require_once("templates/header.php");
?>

<div class="container">
  <?php if (isset($printMsg) && $printMsg != '') : ?>
    <p id="msg"><?= $printMsg ?></p>
  <?php endif; ?>
  <h1 class="text-center p-3">Meus Clientes</h1>
  <?php if (count($clientes) > 0) : ?>
    <table class="table text-center" id="contacts-table">
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
            <td class="d-flex">

              <!-- =================== VISUALIZAR CLIENTE ========================== -->

              <div>
                <!-- Botão para abrir o modal 2-->
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#meuModal2">
                  <a><img src="<?= $BASE_URL ?>assets/eye.svg" alt="visualizar"></a>
                </button>
                <!-- Modal 2 -->
                <div class="modal fade" id="meuModal2" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Visualizar Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                      </div>
                      <div class="modal-body">
                        <h1><?= $cliente["nome"] ?></h1>
                        <p class="bold">Telefone:</p>
                        <p><?= $cliente["telefone"] ?></p>
                        <p class="bold">Observações:</p>
                        <p><?= $cliente["observacoes"] ?></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- =================== EDITAR CLIENTE ========================== -->

              <div>
                <!-- Botão para abrir o modal3 -->
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#meuModal3">
                  <a><img class=" img" src="<?= $BASE_URL ?>assets/edit.svg " alt="visualizar"></a>
                </button>
                <!-- Modal3 -->
                <div class="modal fade" id="meuModal3" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Editar Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                      </div>
                      <div class="modal-body text-start">
                        <form action="<?= $BASE_URL ?>config/process.php" method="POST">
                          <input type="hidden" name="type" value="edit">
                          <div class="form-group p-2">
                            <label for="nome">Nome do cliente</label>
                            <input type="text" class="form-control " id="nome" name="nome" placeholder="nome do cliente" value="<?= $cliente['nome'] ?>" required>
                          </div>
                          <div class="form-group p-2">
                            <label for="telefone">Telefone do cliente</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="telefone do cliente" value="<?= $cliente['telefone'] ?>" required>
                          </div>
                          <div class="form-group p-2">
                            <label for="preco">Preço da Compra</label>
                            <input type="text" class="form-control" id="preco" name="preco" placeholder="R$" value="<?= $cliente['preco'] ?>" required>
                          </div>
                          <div class="form-group p-2">
                            <label for="data">Data da compra</label>
                            <input type="text" class="form-control" id="data" name="data" placeholder="01/01/2023" value="<?= $cliente['data'] ?>" required>
                          </div>
                          <div class="form-group p-2">
                            <label for="observacoes">Observações:</label>
                            <textarea type="text" class="form-control" id="observacoes" name="observacoes" placeholder="Insira as observações" rows="3"><?= $cliente['observacoes'] ?></textarea>
                          </div>
                          <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- =================== EXCLUIR CLIENTE ========================== -->

              <form class="delete-form" action="<?= $BASE_URL ?>/config/process.php" method="POST">
                <input type="hidden" name="type" value="delete">
                <input type="hidden" name="id" value="<?= $cliente['id'] ?>">
                <button type="submit" class="delete-btn"><img src="<?= $BASE_URL ?>assets/trash2.svg" alt="deletar"></button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else : ?>
    <div>
      <div class="navbar-nav">
        <div>
          <!-- Botão para abrir o modal -->
          <p id="empty-list-text">Ainda não há Clientes</p><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#meuModal1">
            <a>clique aqui para adicionar</a>
          </button>

          <!-- Modal -->
          <div class="modal fade" id="meuModal1" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalLabel">Adicionar Cliente</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
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
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif ?>
</div>

<?php
require_once("templates/footer.php");
?>