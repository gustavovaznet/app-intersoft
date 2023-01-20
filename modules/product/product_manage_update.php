<?php
  //SESSION START AND LOGIN CHECK
  session_start();
  require '../login/login_check.php';
  //SET ACTION AND REQUIRE CONTROLLER
  $action = 'recover_prod_spec';
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
<!-- MAIN SECTION -->
<section class="d-flex justify-content-center align-items-center">
  <div class="container marginTopOne">
    <div class="row">
      <div class="col-md-12">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../main.php">Painel Administrativo</a></li>
            <li class="breadcrumb-item"><a href="product_manage.php">Produtos</a></li>
            <li class="breadcrumb-item active"><span>Editar Produto</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <!-- MAIN SECTION BODY -->
              <div class="d-flex justify-content-between">
                  <h4><i class="fa fa-search me-2"></i>Editar Produto</h4>
              </div>
              <hr />
              <!-- PRODUCT FOREACH -->
              <?php foreach ($products as $index => $product) {} ?>
              <form method="post" action="product_controller.php?action=update">
                <div class="form-group">
                  <label>Edite o produto alterando os campos abaixo:</label>
                  <input type="hidden" value="<?= $product->id ?>" name="id" class="col-10 form-control mt-3 mb-2" required>
                  <input type="text" value="<?= $product->product ?>" name="product" class="col-10 form-control mt-3 mb-2" required>
                  <input type="text" value="<?= $product->model ?>" name="model" class="col-10 form-control mt-3 mb-2" required>
                  <input type="number" min="1" value="<?= $product->amount ?>" name="amount" class="col-10 form-control mt-3 mb-2" required>
                  <input type="text" value="<?= $product->snumber ?>" name="snumber" class="col-10 form-control mt-3 mb-2" required>
                  <input type="text" value="<?= $product->anumber ?>" name="anumber" class="col-10 form-control mt-3 mb-2" required>
                  <select name="function" class="form-control iconInput mb-2" required>
                    <option selected><?= $product->function ?></option> 
                    <option value="Uso Próprio">Uso Próprio</option>
                    <option value="Venda">Venda</option>
                    <option value="Locação">Locação</option>
                    <option value="Emprestimo">Empréstimo</option>
                    <option value="Garantia">Garantia</option>
                  </select>
                  <input type="text" value="<?= $product->company ?>" name="company" class="col-10 form-control mt-3 mb-2" required>
                </div>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-check me-2"></i>Confirmar</button>
                  <a href="product_manage.php" type="button" class="btn btn-dark"><i class="fa fa-cancel me-2"></i>Cancelar</a>
              </form>
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
