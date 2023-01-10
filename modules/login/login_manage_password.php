<?php
  ini_set('display_errors', 0 );
  error_reporting(0);
?>
<?php
  //SESSION START AND LOGIN CHECK
  session_start();
  require '../login/login_check.php';
  //SET ACTION AND REQUIRE CONTROLLER
  $action = 'recover_for_update';
  require 'login_controller.php';

?>
<!-- HEADER COMPONENT -->
<?php
  include '../../components/header/header.php';  
?>
<!-- NAVBAR COMPONENT -->
<header>
  <?php
    include '../../components/navbar/navbar.php';
  ?>
</header>
<!-- MAIN SECTION -->
<section class="d-flex justify-content-center align-items-center">
  <div class="container marginTopOne">
    <div class="row">
      <div class="col-md-12">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="login_manage.php">Gerenciar Usuários</a></li>
            <li class="breadcrumb-item active"><span>Configurações</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <!-- CHANGE PASSWORD SECTION -->
              <div class="d-flex justify-content-between">
                <h4><i class="fa fa-key me-2"></i>Alterar Senha</h4>
                <a href="login_manage.php" class="btn btn-primary">
                  <i class="fa fa-arrow-left me-2"></i>Voltar
                </a>
              </div>
              <hr />
              <?php foreach ($logins as $index => $login) {} ?>
              <form method="post" action="../login/login_controller.php?action=change_user">
              <div class="form-group">
                  <input type="hidden" value="<?= $login->id ?>" type="text" name="id" class="col-10 form-control" required>
                </div>
                <div class="form-group">
                  <label>Nova Senha:</label>
                  <input type="password" name="password" class="col-10 form-control" minlength="8" required>
                </div>
                <div class="form-group">
                  <label>Confirmar Senha:</label>
                  <input type="password" name="check_password" class="col-10 form-control mb-4" minlength="8" required>
                </div>
                <button class="btn btn-primary">
                  <i class="fa fa-rotate me-2"></i>Alterar Senha
                </button>
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
