<?php
  $action = 'recover_for_update';
  require 'info_controller.php';

  //SESSION START AND LOGIN CHECK
  session_start();
  require '../login/login_check.php';
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
            <li class="breadcrumb-item"><a href="info_manage.php">FAQ</a></li>
            <li class="breadcrumb-item active"><span>Editar Pergunta</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <!-- MAIN SECTION BODY -->
              <div class="d-flex justify-content-between">
                  <h4><i class="fa fa-comment me-2"></i>Editar Pergunta</h4>
              </div>
              <hr />
              <!-- INFO FOREACH -->
              <?php foreach ($infos as $index => $info) {} ?>
              <form method="post" action="info_controller.php?action=update">
                <div class="form-group">
                  <label>Edite a pergunta alterando os campos abaixo:</label>
                  <input type="hidden" value="<?= $info->id ?>" name="id" class="col-10 form-control mt-3 mb-2" required>
                  <input type="text" value="<?= $info->question ?>" name="question" class="col-10 form-control mt-3 mb-2" required>
                  <input type="text" value="<?= $info->answer ?>" name="answer" class="col-10 form-control mt-3 mb-2" required>
                </div>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-check me-2"></i>Confirmar</button>
                  <a href="info_manage.php" type="button" class="btn btn-dark"><i class="fa fa-cancel me-2"></i>Cancelar</a>
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
