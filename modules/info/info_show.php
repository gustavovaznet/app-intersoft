<?php
  $action = 'recover';
  require 'info_controller.php';
?>
<!-- HEADER COMPONENT -->
<?php
  include '../../components/header/header.php';
?>
<body>
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
            <li class="breadcrumb-item"><a href="../../index.php">Pagina Inicial</a></li>
            <li class="breadcrumb-item active"><span>FAQ</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <!-- MAIN SECTION BODY -->
              <div class="d-flex justify-content-between buttonPosition">
                <h4><i class="fa fa-comment me-2"></i>FAQ - Dúvidas Frequentes</h4>
                <div class="d-flex">
                  <form class="d-flex" method="post" action="info_search.php?action=search">
                    <input class="form-control inputSearch" type="search" placeholder="Pesquise aqui..." aria-label="Search" name="info_search" required>
                    <button type="submit" class="btn btn-dark btnSearch me-3"><i class="fa fa-search me-2"></i></button>
                  </form>
                  <a href="../../index.php" class="btn btn-primary">
                    <i class="fa fa-arrow-left me-2"></i>Voltar
                  </a>
                </div>
              </div>
              <hr />
              <!-- ACCORDION -->
              <?php foreach ($infos as $index => $info) { ?>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading_<?= $info->id ?>">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_<?= $info->id ?>" aria-expanded="false" aria-controls="flush-collapse_<?= $info->id ?>">
                        <?= $info->question ?>
                      </button>
                    </h2>
                    <div id="flush-collapse_<?= $info->id ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading_<?= $info->id ?>" data-bs-parent="#accordionFlushExample">
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
