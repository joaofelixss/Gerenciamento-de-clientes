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
  <title>Gerenciamento de Clientes</title>
  <link rel="stylesheet" href="<?= $BASE_URL ?>assets/Bootstrap/bootstrap.min.css">
</head>

<style>
  .container {
    height: 50vh;
  }

  .inicio {
    font-size: 1rem;
    color: white;
  }

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

  footer{
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 60px;
  }
</style>

<body>
  <header class="mb-2">
    <nav class="flex justify-content-center navbar navbar-expand-lg navbar-dark bg-primary">
      <div>
        <div class="navbar-nav">
          <div>
            <!-- Botão para abrir o modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#meuModal1">
              <a>Adicionar Clientes<img src="<?= $BASE_URL ?>assets/pessoa.svg" alt="add"></a>
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
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </nav>

  </header>