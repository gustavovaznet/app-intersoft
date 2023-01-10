<?php
  //SESSION START AND LOGIN CHECK
  session_start();
  require '../login/login_check.php';
  //SET ACTION AND RECOVER CONTROLLER
  $action = 'recover_for_update';
  require 'project_controller.php';

?>
<!-- HEADER COMPONENT -->
<?php
  include '../../components/header/header.php';
?>
<!-- NAVBAR COMPONENT -->
<?php
  include '../../components/header/header.php';
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
            <li class="breadcrumb-item"><a href="project_manage.php">Projetos</a></li>
            <li class="breadcrumb-item active"><span>Editar Projetos</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <!-- MAIN SECTION BODY -->
              <div class="d-flex justify-content-between">
                  <h4><i class="fa fa-screwdriver-wrench me-2"></i>Editar Projeto</h4>
              </div>
              <hr />
              <!-- PROJECTS FOREACH -->
              <?php foreach ($projects as $index => $project) {} ?>
              <form method="post" action="project_controller.php?action=update">
                <div class="form-group">
                  <label>Edite o projeto alterando os campos abaixo:</label>
                  <input type="hidden" value="<?= $project->id ?>" name="id" class="col-10 form-control mt-3 mb-2" required>
                  <input type="text" value="<?= $project->company ?>" name="company" class="col-10 form-control mt-3 mb-2" required>
                  <input type="text" value="<?= $project->project ?>" name="project" class="col-10 form-control mt-3 mb-2" required>
                  <input type="text" value="<?= $project->note ?>" name="note" class="col-10 form-control mt-3 mb-2" required>
                </div>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-check me-2"></i>Confirmar</button>
                  <a href="project_manage.php" type="button" class="btn btn-dark"><i class="fa fa-cancel me-2"></i>Cancelar</a>
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
