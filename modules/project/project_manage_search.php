<?php
  //SESSION START AND LOGIN CHECK
  session_start();
  require '../login/login_check.php';
  //SET ACTION AND RECOVER CONTROLLER
  $action = 'recover';
  require 'project_controller.php';

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
    location.href = 'project_manage.php?action=delete&id=' + id;
  }

  function update(id){
    location.href = 'project_manage_update.php?id=' + id;
  }

</script>
<!-- MAIN SECTION -->
<section class="d-flex justify-content-center align-items-center">
  <div class="container marginTopOne">
    <div class="row">
      <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../main.php">Painel Administrativo</a></li>
            <li class="breadcrumb-item"><a href="project_manage.php">Projetos</a></li>
            <li class="breadcrumb-item active"><span>Resultados da Busca</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <div class="d-flex justify-content-between">
                <h4><i class="fa fa-search me-2"></i>Projetos</h4>
                <div class="d-flex">
                  <a href="project_manage.php" class="btn btn-primary">
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
                      <th scope="col">Empresa</th>
                      <th scope="col">Projeto</th>
                      <th scope="col">Observações</th>
                    </tr>
                  </thead>
                  <?php foreach ($projects as $index => $project) { ?>
                    <tbody class="table-group-divider" >
                      <tr >
                        <div id="project_<?= $project->id ?>">
                          <th scope="row"></th>
                          <td><b><?= $project->company ?></b></td>
                          <td><?= $project->project ?></td>
                          <td><?= $project->note ?></td>
                        </div>
                        <td>
                          <div class="col-sm-2 mt-2 d-flex justify-content-between">
                            <i class="fas fa-trash-alt fa-lg text-danger me-3" title="Deletar Projeto" onclick="delet(<?= $project->id ?>)"></i>
                            <i class="fas fa-edit fa-lg text-primary" title="Editar Projeto" onclick="update('<?= $project->id ?>','<?= $project->company ?>','<?= $project->project ?>','<?= $project->note ?>')"></i>
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
