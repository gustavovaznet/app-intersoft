<?php
  ini_set('display_errors', 0 );
  error_reporting(0);
?>
<?php
  //SET ACTION AND REQUIRE CONTROLLER
  $action = 'recover_for_update';
  require 'login_controller.php';

  //SESSION START AND LOGIN CHECK
  session_start();
  require 'login_check.php';
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
            <li class="breadcrumb-item"><a href="../../main.php">Painel Administrativo</a></li>
            <li class="breadcrumb-item"><a href="login_manage_user.php">Minha Conta</a></li>
            <li class="breadcrumb-item active"><span>Editar Conta</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <!-- MAIN SECTION BODY -->
              <div class="d-flex justify-content-between">
                  <h4>Editar Conta</h4>
              </div>
              <hr />
              <!-- USER FOREACH -->
              <?php foreach ($logins as $index => $login) {} ?>
              <form method="post" action="login_controller.php?action=update">
                <div class="form-group">
                  <label>Edite os dados da sua conta nos campos abaixo:</label>
                  <input type="hidden" value="<?= $login->id ?>" name="id" class="col-10 form-control mt-3 mb-2" required>
                  <input type="text" value="<?= $login->name ?>" name="name" class="col-10 form-control mt-3 mb-2" required>
                  <input type="text" value="<?= $login->surname ?>" name="surname" class="col-10 form-control mt-3 mb-2" required>
                  <input type="text" value="<?= $login->mail ?>" name="mail" class="col-10 form-control mt-3 mb-2" required>
                  <?php if(isset($_SESSION['user'][2]) && $_SESSION['user'][2] == 'Administrador'){ ?>
                    <div class="form-group">
                      <select name="type" class="col-10 form-control mt-3 mb-4" required>
                        <option disabled selected>Tipo de Conta</option>  
                        <option value="Comum">Comum</option>
                        <option value="Administrador">Administrador</option>
                      </select>
                    </div>
                  <?php } ?>
                </div>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-check me-2"></i>Confirmar</button>
                  <a href="login_manage_user.php" type="button" class="btn btn-dark"><i class="fa fa-cancel me-2"></i>Cancelar</a>
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
