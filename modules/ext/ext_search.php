<?php
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
    <div class="col-md-12">
      <!-- BREADCRUMB -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../../index.php">Menu Principal</a></li>
          <li class="breadcrumb-item"><a href="ext_show.php">Ramais</a></li>
          <li class="breadcrumb-item active"><span>Resultados da Busca</span></li>
        </ol>
      </nav>
    </div>
    <div class="col-md-12">
      <div class="container page">
        <div class="row">
          <div class="col">
            <div class="d-flex justify-content-between">
              <h4><i class="fa fa-search me-2"></i>Resultados da Busca</h4>
              <div class="d-flex">
                <a href="ext_show.php" class="btn btn-primary">
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
<!-- TOAST ALERTS -->
<script src="../../js/toast/toast.min.js" type="text/javascript"></script>
<!-- WHITE ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'white'){ ?>
  <script>
    iziToast.warning({
      title: 'Campo(s) vazio(s)! Favor preencher todos os campos!'
    });
  </script>
<?php } ?>
<!-- FOOTER COMPONENT -->
<?php
  include '../../components/footer/footer.php';
?>
