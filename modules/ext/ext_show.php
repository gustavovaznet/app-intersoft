<?php
  $action = 'recover';
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
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../index.php">Menu Principal</a></li>
            <li class="breadcrumb-item active"><span>Ramais</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
          <div class="col">
            <div class="d-flex justify-content-between buttonPosition">
              <h4><i class="fa fa-phone me-2"></i>Ramais Telefônicos</h4>
              <div class="d-flex">
                <form class="d-flex" method="post" action="ext_search.php?action=search">
                  <input class="form-control inputSearch" type="search" placeholder="Pesquise aqui..." aria-label="Search" name="ext_search" required>
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
                    <th scope="col">Colaborador</th>
                    <th scope="col">Setor</th>
                    <th scope="col">Ramal</th>
                  </tr>
                </thead>
                <?php foreach ($exts as $index => $ext) { ?>
                  <tbody class="table-group-divider" >
                    <tr >
                      <div id="ext_<?= $ext->id ?>">
                        <th scope="row"></th>
                        <td><b><?= $ext->name ?></b></td>
                        <td><?= $ext->department ?></td>
                        <td><b><?= $ext->ext ?></b></td>
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
