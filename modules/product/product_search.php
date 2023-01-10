<?php
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
    <div class="col-md-12">
      <!-- BREADCRUMB -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../../index.php">Menu Principal</a></li>
          <li class="breadcrumb-item"><a href="product_show.php">Estoque</a></li>
          <li class="breadcrumb-item active"><span>Resultados da Busca</span></li>
        </ol>
      </nav>
    </div>
    <div class="col-md-12">
      <div class="container page">
        <div class="row">
          <div class="col">
            <div class="d-flex justify-content-between">
              <h4><i class="fa fa-search me-2"></i>Resultados da Busca</h4>
              <div class="d-flex">
                <a href="product_show.php" class="btn btn-primary">
                  <i class="fa fa-arrow-left me-2"></i>Voltar
                </a>
              </div>
            </div>
            <hr />
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
                        <td><b><?= $product->amount ?></b></td>
                        <td><?= $product->snumber ?></td>
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
<!-- TOAST JS -->
<script src="../../js/toast/toast.min.js" type="text/javascript"></script>
<!-- WHITE ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'white'){ ?>
  <script>
    iziToast.warning({
      title: 'Campo(s) vazio(s)! Favor preencher todos os campos!'
    });
  </script>
<?php } ?>
<!-- FOOTER COMPONENT -->
<?php
  include '../../components/footer/footer.php';
?>
