<?php
  //SESSION START AND LOGIN CHECK
  session_start();
  require '../login/login_check.php';
  //SET ACTION AND REQUIRE CONTROLLER
  $action = 'recover';
  require 'product_controller.php';
  
?>
<!-- HEADER COMPONENT -->
<?php
  include '../../components/header/header.php';
?>
<!-- NAVBAR COMPONENT -->
<?php
  include '../../components/navbar/navbar.php';
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
            <li class="breadcrumb-item"><a href="product_manage.php">Estoque</a></li>
            <li class="breadcrumb-item active"><span>Resultado da Busca</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <div class="d-flex justify-content-between">
                <h4><i class="fa fa-search me-2"></i>Estoque de Produtos</h4>
                <div class="d-flex">
                  <a href="product_manage.php" class="btn btn-primary">
                    <i class="fa fa-arrow-left me-2"></i>Voltar
                  </a>
                </div>
              </div>
              <hr />
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
<!-- FOOTER COMPONENT -->
<?php
  include '../../components/footer/footer.php';
?>
