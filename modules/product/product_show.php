<?php
  $action = 'recover';
  require 'product_controller.php';
?>
<!-- HEADER COMPONENT -->
<?php
  include '../../components/header/header.php';
?>
<!-- NAVBAR COMPONENT -->
<?php
  include '../../components/navbar_white/navbar_white.php';
?>
<!-- MAIN SECTION -->
<section class="d-flex justify-content-center align-items-center">
  <div class="container marginTopOne">
    <div class="row">
      <div class="col-md-12">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../index.php">Menu Principal</a></li>
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
              <div class="d-flex">
                <form class="d-flex" method="post" action="product_search.php?action=search">
                  <input class="form-control inputSearch" type="search" placeholder="Pesquise aqui..." aria-label="Search" name="product_search" required>
                  <button type="submit" class="btn btn-dark btnSearch me-3"><i class="fa fa-search me-2"></i></button>
                </form>
                <a href="../../index.php" class="btn btn-primary">
                  <i class="fa fa-arrow-left me-2"></i>Voltar
                </a>
              </div>
            </div>
            <hr />
            <!-- MAIN SECTION -->
            <div class="table-responsive-sm">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Qtde</th>
                    <th scope="col">Serial</th>
                    <th scope="col">Patrimônio</th>
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
                        <td><b><?= $product->amount ?></b></td>
                        <td><?= $product->snumber ?></td>
                        <td><?= $product->anumber ?></td>
                        <td><b><?= $product->function ?></b></td>
                        <td><?= $product->company ?></td>
                      </div>
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
</section>
<!-- FOOTER -->
<?php
  include '../../components/footer/footer.php';
?>
