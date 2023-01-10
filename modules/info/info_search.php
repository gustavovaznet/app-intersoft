<?php
  require 'info_controller.php';  
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
            <li class="breadcrumb-item"><a href="../../index.php">Página Inicial</a></li>
            <li class="breadcrumb-item"><a href="info_show.php">FAQ</a></li>
            <li class="breadcrumb-item active"><span>Resultados da Busca</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <!-- MAIN SECTION -->
              <div class="d-flex justify-content-between">
                  <h4><i class="fa fa-search me-2"></i>Resultados da Busca</h4>
                  <a href="info_show.php" class="btn btn-primary">
                    <i class="fa fa-arrow-left me-2"></i>Voltar
                  </a>
              </div>
              <hr />
              <!-- ACCORDION -->
              <?php foreach ($infos as $index => $info) { ?>
                <div class="accordion_<?= $info->id ?> accordion-flush" id="accordionFlushExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne_<?= $info->id ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                      <?= $info->question ?>
                      </button>
                    </h2>
                    <div id="flush-collapseOne_<?= $info->id ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body"><h5><?= $info->answer ?></h5></div>
                    </div>
                  </div>
                </div>
              <?php } ?>
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
