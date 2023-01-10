<?php
  $action = 'recover';
  require 'schedule_controller.php';

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
<!-- DELETE AND UPDATE FUNCTION -->
<script>

  function delet(id){
    location.href = 'schedule_manage.php?action=delete&id=' + id;
  }

  function update(id){
    location.href = 'schedule_manage_update.php?id=' + id;
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
            <li class="breadcrumb-item"><a href="schedule_manage.php">Escalas</a></li>
            <li class="breadcrumb-item active"><span>Resultado da Busca</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
            <div class="d-flex justify-content-between">
              <h4><i class="fa fa-search me-2"></i>Escalas de Horários</h4>
              <div>
                <a href="schedule_manage.php" class="btn btn-primary">
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
                    <th scope="col">Data</th>
                    <th scope="col">Mês</th>
                    <th scope="col">Colaborador Presencial</th>
                    <th scope="col">Colaborador Remoto</th>
                  </tr>
                </thead>
                <?php foreach ($schedules as $index => $schedule) { ?>
                  <tbody class="table-group-divider" >
                    <tr >
                      <div id="schedule_<?= $schedule->id ?>">
                        <th scope="row"></th>
                        <td><b><?= $schedule->date ?></b></td>
                        <td><?= $schedule->month ?></td>
                        <td><?= $schedule->company_worker ?></td>
                        <td><?= $schedule->home_worker ?></td>
                      </div>
                      <td>
                        <div class="col-sm-2 mt-2 d-flex justify-content-between">
                          <i class="fas fa-trash-alt fa-lg text-danger me-3" title="Deletar Escala" onclick="delet(<?= $schedule->id ?>)"></i>
                          <i class="fas fa-edit fa-lg text-primary" title="Editar Escala" onclick="update('<?= $schedule->id ?>','<?= $schedule->date ?>','<?= $schedule->month ?>','<?= $schedule->company_worker ?>','<?= $schedule->home_worker ?>')"></i>
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
</section>
<!-- FOOTER COMPONENT -->
<?php
  include '../../components/footer/footer.php';
?>
