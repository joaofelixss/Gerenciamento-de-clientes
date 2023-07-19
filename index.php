<?php
require_once("templates/header.php");

?>

<?php if (count($clientes) > 0) : ?>
  <?php if (isset($printMsg) && $printMsg != '') : ?>
    <p id="msg"><?= $printMsg ?></p>
  <?php endif; ?>
  <!-- search & add new -->
  <div class="d-flex justify-content-start p-4 ms-5">
    <form action="index.php" method="post">
      <div class="row">
        <div class="col-auto">
          <input type="hidden" name="type" value="text_search">
          <input type="text" class="form-control" name="text_search" id="text_search" minlength="3" maxlength="20" required>
        </div>
        <div class="col-auto"><input type="submit" class="btn btn-outline-primary" value="Procurar"></div>
        <div class="col-auto"><a href="index.php" class="btn btn-outline-primary">Ver tudo</a></div>
      </div>
    </form>

  </div>

  <div class="container">
    <h1 class="text-center p-3">Meus Clientes</h1>
    <table class="table table-sm table-striped table-bordered text-center">
      <thead class="bg-dark text-white">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Preço</th>
          <th scope="col">Data</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($clientes as $cliente) : ?>
          <tr>
            <td scope="row"><?= $cliente['id'] ?></td>
            <td scope="row"><?= $cliente['nome'] ?></td>
            <td scope="row"><?= $cliente['preco'] ?></td>
            <td scope="row"><?= $cliente['data'] ?></td>
            <td class="d-flex justify-content-center">

              <!-- =================== VISUALIZAR CLIENTE ========================== -->

              <div>
                <!-- Botão para abrir o modal 1-->
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#meuModal1<?= $cliente['id'] ?>">
                  <a><img src="<?= $BASE_URL ?>assets/eye.svg" alt="visualizar"></a>
                </button>
                <!-- Modal 1 -->
                <div class="modal fade" id="meuModal1<?= $cliente['id'] ?>" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Visualizar Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                      </div>
                      <div class="modal-body">
                        <h1><?= $cliente["nome"] ?></h1>
                        <br>
                        <h6>Telefone: <?= $cliente["telefone"] ?></h6>
                        <br>
                        <h6>Observações: <?= $cliente["observacoes"] ?></h6>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- =================== EDITAR CLIENTE ========================== -->

              <div>
                <!-- Botão para abrir o modal2 -->
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#meuModal2<?= $cliente['id'] ?>">
                  <a><img class=" img" src="<?= $BASE_URL ?>assets/edit.svg " alt="visualizar"></a>
                </button>
                <!-- Modal2 -->
                <div class="modal fade" id="meuModal2<?= $cliente['id'] ?>" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Editar Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                      </div>
                      <div class="modal-body text-start">
                        <form action="<?= $BASE_URL ?>config/process.php" method="POST">
                          <input type="hidden" name="type" value="edit">
                          <input type="hidden" name="id" value="<?= $cliente['id'] ?>">
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
                          <button type="submit" class="btn btn-primary">Atualizar cliente</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- =================== EXCLUIR CLIENTE ========================== -->

              <div>
                <!-- Botão para abrir o modal3 -->
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#meuModal3<?= $cliente['id'] ?>">
                  <a><img class=" img" src="<?= $BASE_URL ?>assets/trash2.svg " alt="visualizar"></a>
                </button>
                <!-- Modal3 -->
                <div class="modal fade" id="meuModal3<?= $cliente['id'] ?>" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Excluir Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                      </div>
                      <div class="modal-body text-start">
                        <form action="<?= $BASE_URL ?>config/process.php" method="POST">
                          <input type="hidden" name="type" value="delete">
                          <input type="hidden" name="id" value="<?= $cliente['id'] ?>">
                          <h1 class="text-center"><?= $cliente['nome'] ?></h1>
                          <div class="form-group p-2">
                            <label for="data">Data da compra</label>
                            <input type="text" class="form-control" id="data" name="data" disabled placeholder="01/01/2023" value="<?= $cliente['data'] ?>" required>
                          </div>
                          <div class="form-group p-2">
                            <label for="observacoes">Observações:</label>
                            <textarea type="text" class="form-control" id="observacoes" disabled name="observacoes" placeholder="Insira as observações" rows="3"><?= $cliente['observacoes'] ?></textarea>
                          </div>
                          <button type="submit" class="btn btn-primary">Deseja mesmo excluir o cliente ?</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else : ?>

    <!-- =================== ADICIONAR CLIENTE EM CASO DE NÃO HOUVER REGISTROS ========================== -->

    <div>
      <div class="navbar-nav">
        <div>
          <!-- Botão para abrir o modal -->
          <div class="d-flex align-items-center justify-content-center ">
            <h4 class="p-4 ">Ainda não há Clientes</h4>
            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#meuModal">
              <a>clique aqui para adicionar</a>
            </button>
          </div>


          <!-- Modal -->
          <div class="modal fade" id="meuModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
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
                    <button type="submit" class="btn btn-primary">Adicionar</button>
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
  <!-- total results -->
  <div class="row">
    <div class="col">
      <p>Total: <strong><?= count($clientes) ?></strong> clientes listados</p>
    </div>
  </div>
  </div>

  <?php
  require_once("templates/footer.php");
  ?>