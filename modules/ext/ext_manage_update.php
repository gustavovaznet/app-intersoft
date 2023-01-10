<?php
  //SESSION START AND LOGIN CHECK
  session_start();
  require '../login/login_check.php';
  //SET ACTION AND REQUIRE CONTROLLER
  $action = 'recover_for_update';
  require 'ext_controller.php';

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
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../main.php">Painel Administrativo</a></li>
            <li class="breadcrumb-item"><a href="ext_manage.php">Ramais</a></li>
            <li class="breadcrumb-item active"><span>Editar Ramal</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <!-- MAIN SECTION BODY -->
              <div class="d-flex justify-content-between">
                  <h4><i class="fa fa-phone me-2"></i>Editar Ramal</h4>
              </div>
              <hr />
              <!-- EXT FOREACH -->
              <?php foreach ($exts as $index => $ext) {} ?>
              <form method="post" action="ext_controller.php?action=update">
                <div class="form-group">
                  <label>Edite o ramal alterando os campos abaixo:</label>
                  <input type="hidden" value="<?= $ext->id ?>" name="id" class="col-10 form-control mt-3 mb-2" required>
                  <input type="text" value="<?= $ext->name ?>" name="name" class="col-10 form-control mt-3 mb-2" required>
                  <input type="text" value="<?= $ext->department ?>" name="department" class="col-10 form-control mt-3 mb-2" required>
                  <input type="number" min="1" value="<?= $ext->ext ?>" name="ext" class="col-10 form-control mt-3 mb-2" required>
                </div>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-check me-2"></i>Confirmar</button>
                  <a href="ext_manage.php" type="button" class="btn btn-dark"><i class="fa fa-cancel me-2"></i>Cancelar</a>
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
