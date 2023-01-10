<?php
  $action = 'recover';
  require 'schedule_controller.php';
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
            <li class="breadcrumb-item"><a href="../../index.php">Menu Principal</a></li>
            <li class="breadcrumb-item active"><span>Escalas</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
          <div class="col">
            <div class="d-flex justify-content-between buttonPosition">
              <h4><i class="fa fa-calendar me-2"></i>Escalas de Horários</h4>
              <div class="d-flex">
                <form class="d-flex" method="post" action="schedule_search.php?action=search">
                  <input class="form-control inputSearch" type="search" placeholder="Pesquise aqui..." aria-label="Search" name="schedule_search" required>
                  <button type="submit" class="btn btn-dark btnSearch me-3"><i class="fa fa-search me-2"></i></button>
                </form>
                <a href="../../index.php" class="btn btn-primary">
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
