<?php
  $action = 'recover_for_update';
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
<!-- MAIN SECTION -->
<section class="d-flex justify-content-center align-items-center">
  <div class="container marginTopOne">
    <div class="row">
      <div class="col-md-12">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../main.php">Painel Administrativo</a></li>
            <li class="breadcrumb-item"><a href="schedule_manage.php">Escala de Horários</a></li>
            <li class="breadcrumb-item active"><span>Editar Escala</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <!-- MAIN SECTION BODY -->
              <div class="d-flex justify-content-between">
                  <h4><i class="fa fa-calendar me-2"></i>Editar Escala</h4>
              </div>
              <hr />
              <!-- SCHEDULE FOREACH -->
              <?php foreach ($schedules as $index => $schedule) {} ?>
              <form method="post" action="schedule_controller.php?action=update">
                <div class="form-group">
                  <label>Edite a escala de horário alterando os campos abaixo:</label>
                  <input type="hidden" value="<?= $schedule->id ?>" name="id" class="col-10 form-control mt-3 mb-2" required>
                  <input type="date" value="<?= $schedule->date ?>" name="date" class="col-10 form-control mt-3 mb-2" required>
                  <select name="month" class="form-control iconInput mb-2" required>
                    <option selected><?= $schedule->month ?></option>
                    <option value="Janeiro">Janeiro</option>
                    <option value="Fevereiro">Fevereiro</option>
                    <option value="Março">Março</option>
                    <option value="Abril">Abril</option>
                    <option value="Maio">Maio</option>
                    <option value="Junho">Junho</option>
                    <option value="Julho">Julho</option>
                    <option value="Agosto">Agosto</option>
                    <option value="Setembro">Setembro</option>
                    <option value="Outubro">Outubro</option>
                    <option value="Novembro">Novembro</option>
                    <option value="Dezembro">Dezembro</option>
                  </select>
                  <input type="text" value="<?= $schedule->company_worker ?>" name="company_worker" class="col-10 form-control mt-3 mb-2" required>
                  <input type="text" value="<?= $schedule->home_worker ?>" name="home_worker" class="col-10 form-control mt-3 mb-2" required>
                </div>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-check me-2"></i>Confirmar</button>
                  <a href="schedule_manage.php" type="button" class="btn btn-dark"><i class="fa fa-cancel me-2"></i>Cancelar</a>
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
