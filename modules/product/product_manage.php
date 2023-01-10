<?php
  //SESSION START AND LOGIN CHECK
  session_start();
  require '../login/login_check.php';
  //SET ACTION AND REQUIRE CONTROLLER
  $action = 'recover';
  require 'product_controller.php';

?>
<!-- HEADER COMPONENTS -->
<?php
  include '../../components/header/header.php';
?>
<!-- NAVBAR COMPONENTS -->
<?php
  require '../../components/navbar/navbar.php';
?>
<!-- DELETE AND UPDATE FUNCTION -->
<script>

  function delet(id){
    location.href = 'product_manage.php?action=delete&id=' + id;
  }

  function update(id){
    location.href = 'product_manage_update.php?id=' + id;
  }
</script>
<!-- MAIN SECTION -->
<section class="d-flex justify-content-center align-items-center">
  <div class="container marginTopOne">
    <div class="row">
      <div class="col-md-12">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../main.php">Painel Administrativo</a></li>
            <li class="breadcrumb-item active"><span>Estoque</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <div class="d-flex justify-content-between buttonPosition">
                <h4><i class="fa fa-box me-2"></i>Estoque de Produtos</h4>
                <div class="d-flex buttonPosition">
                  <form class="d-flex" method="post" action="product_manage_search.php?action=search">
                    <input class="form-control inputSearch" type="search" placeholder="Pesquise aqui..." aria-label="Search" name="product_search" required>
                    <button type="submit" class="btn btn-dark btnSearch me-5"><i class="fa fa-search me-2"></i></button>
                  </form>
                  <button type="button" class="btn btn-danger me-2 mt-1" data-bs-toggle="modal" data-bs-target="#addExtModal">
                    <i class="fa fa-plus me-2"></i>Adicionar Produto
                  </button>
                  <button class="btn btn-secondary me-2 mt-1"  data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    <i class="fa fa-file me-2"></i>Importar CSV
                  </button>
                  <a href="../../main.php" class="btn btn-primary mt-1">
                    <i class="fa fa-arrow-left me-2"></i>Voltar
                  </a>
                </div>
              </div>
              <hr />
              <!-- MODAL  -->
              <section class="container d-flex justify-content-center align-items-center">
                <div class="modal fade" id="addExtModal" tabindex="-1" aria-labelledby="addExtModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="addExtModalLabel"><i class="fa fa-phone me-2"></i>Novo Produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="product_controller.php?action=insert">
                          <div class="form-group">
                            <input type="text" name="product" class="form-control iconInput mb-2" placeholder="Produto" required>
                          </div>
                          <div class="form-group">
                            <input type="text" name="model" class="form-control iconInput mb-2" placeholder="Modelo" required>
                          </div>
                          <div class="form-group">
                            <input type="number" name="amount" class="form-control iconInput mb-2" min="1" placeholder="Qtde" required>
                          </div>
                          <div class="form-group">
                            <input type="text" name="snumber" class="form-control iconInput mb-2" placeholder="Número de Série" required>
                          </div>
                          <div class="form-group">
                            <select name="function" class="form-control iconInput mb-2" required>
                              <option disabled selected>Escolha uma opção</option>  
                              <option value="Uso Próprio">Uso Próprio</option>
                              <option value="Venda">Venda</option>
                              <option value="Locação">Locação</option>
                              <option value="Emprestimo">Empréstimo</option>
                              <option value="Garantia">Garantia</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <input type="text" name="company" class="form-control iconInput mb-2" placeholder="Empresa" required>
                          </div>
                          <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus me-2"></i>Adicionar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <!-- OFFCANVAS CSV IMPORT  -->
              <section class="container d-flex justify-content-center align-items-center">
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                  <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                      <i class="fa fa-file me-2"></i>Importar Arquivo CSV
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                    <div class="col-md-12">
                      <div class="container page">
                        <h4 class="mt-1 mb-4">Use a opção abaixo para importar um arquivo .CSV com produtos no estoque:</h4>
                        <form action="../file/file_controller.php" method="post" enctype="multipart/form-data">
                          <div class="d-flex">
                            <div class="row">
                              <label>
                                <input type="file" name="file" required>
                              </label>
                              <button type="submit" class="btn btn-primary mt-3">
                                <i class="fa fa-file-import me-2"></i>Importar
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <hr />
                    <div class="col-md-12">
                      <div class="container page">
                        <h4 class="mt-1 mb-4">Se precisar de ajuda baixe o modelo correto de arquivo CSV que está abaixo:</h4>
                        <form action="../file/file_controller.php" method="post" enctype="multipart/form-data">
                          <div class="d-flex justify-content-around">
                            <div class="row">
                              <a href="../file/csv_model.csv" type="button" class="btn btn-primary mt-3">
                                <i class="fa fa-download me-2"></i>Baixar Modelo CSV
                              </a>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <!-- MAIN SECTION BODY - FOREACH -->
              <div class="table-responsive-sm">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Produto</th>
                      <th scope="col">Modelo</th>
                      <th scope="col">Qtde</th>
                      <th scope="col">Serial</th>
                      <th scope="col">Finalidade</th>
                      <th scope="col">Empresa</th>
                    </tr>
                  </thead>
                  <?php foreach ($products as $index => $product) { ?>
                    <tbody class="table-group-divider" >
                      <tr >
                      <div id="product_<?= $product->id ?>">
                        <th scope="row"></th>
                        <td><b><?= $product->product ?></b></td>
                        <td><?= $product->model ?></td>
                        <td><?= $product->amount ?></td>
                        <td><?= $product->snumber ?></td>
                        <td><?= $product->function ?></td>
                        <td><?= $product->company ?></td>
                      </div>
                      <td>
                        <div class="col-sm-2 mt-2 d-flex justify-content-between">
                          <i class="fas fa-trash-alt fa-lg text-danger me-3" title="Deletar Produto" onclick="delet(<?= $product->id ?>)"></i>
                          <i class="fas fa-edit fa-lg text-primary" title="Editar Produto" onclick="update('<?= $product->id ?>')"></i>
                        </div>
                      </td>
                    </tr>
                    </tbody>
                  <?php } ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- TOAST ALERTS -->
<script src="../../js/toast/toast.min.js" type="text/javascript"></script>
<!-- SUCCESS ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'insert_success'){ ?>
  <script>
    iziToast.success({
      title: 'Cadastro realizado com sucesso!'
    });
  </script>
  <!-- SUCCESS LOG -->
  <?php
    $dateLog = date('d-m-Y H:i:s');
    $fileLog = fopen('../../logs/logs.txt','a+',0);
    $textLog = 'Data: '.$dateLog.' | Usuário: '.$_SESSION['user'][1].' | ID: '.$_SESSION['user'][0].' | Inseriu um novo produto'.":\n";
    fwrite($fileLog, $textLog);
    fclose($fileLog);
  ?>
<?php } ?>
<!-- UPDATE ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'update_success'){ ?>
  <script>
    iziToast.success({
      title: 'Produto editado com sucesso!'
    });
  </script>
  <!-- UPDATE LOG -->
  <?php
    $dateLog = date('d-m-Y H:i:s');
    $fileLog = fopen('../../logs/logs.txt','a+',0);
    $textLog = 'Data: '.$dateLog.' | Usuário: '.$_SESSION['user'][1].' | ID: '.$_SESSION['user'][0].' | Alterou um produto existente'.":\n";
    fwrite($fileLog, $textLog);
    fclose($fileLog);
  ?>
<?php } ?>
<!-- DELETE ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'delete_success'){ ?>
  <script>
    iziToast.success({
      title: 'Produto deletado com sucesso!'
    });
  </script>
  <!-- DELETE LOG -->
  <?php
    $dateLog = date('d-m-Y H:i:s');
    $fileLog = fopen('../../logs/logs.txt','a+',0);
    $textLog = 'Data: '.$dateLog.' | Usuário: '.$_SESSION['user'][1].' | ID: '.$_SESSION['user'][0].' | Deletou um produto'.":\n";
    fwrite($fileLog, $textLog);
    fclose($fileLog);
  ?>
<?php } ?>
<!-- ERROR ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'error'){ ?>
  <script>
    iziToast.warning({
      title: 'Ops! Algo deu errado, por favor tente novamente.'
    });
  </script>
<?php } ?>
<!-- WHITE ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'white'){ ?>
  <script>
    iziToast.warning({
      title: 'Campo(s) vazio(s)! Favor preencher todos os campos!'
    });
  </script>
<?php } ?>
<!-- CSV FILE SUCCESS ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'file_success'){ ?>
  <script>
    iziToast.success({
      title: 'Arquivo CSV importado com sucesso!'
    });
  </script>
  <!-- DELETE LOG -->
  <?php
    $dateLog = date('d-m-Y H:i:s');
    $fileLog = fopen('../../logs/logs.txt','a+',0);
    $textLog = 'Data: '.$dateLog.' | Usuário: '.$_SESSION['user'][1].' | ID: '.$_SESSION['user'][0].' | Inseriu um arquivo CVS com sucesso'.":\n";
    fwrite($fileLog, $textLog);
    fclose($fileLog);
  ?>
<?php } ?>
<!-- CSV FILE INVALID ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'file_invalid'){ ?>
  <script>
    iziToast.warning({
      title: 'Arquivo inválido! Favor tente novamente com um arquivo .CSV'
    });
  </script>
<?php } ?>
<!-- FOOTER COMPONENTS -->
<?php
  require '../../components/footer/footer.php';
?>
