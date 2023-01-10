<?php
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
  include '../../components/navbar/navbar.php';
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
            <li class="breadcrumb-item active"><span>Ajuda</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
            <div class="row">
            <div class="col">
              <!-- MAIN SECTION -->
              <div class="d-flex justify-content-between">
                <h4><i class="fa fa-question me-2"></i>Ajuda</h4>
                <a href="../../main.php" class="btn btn-primary">
                  <i class="fa fa-arrow-left me-2"></i>Voltar
                </a>
                </div>
              <hr />
              <a href="../docs/docs.php" class="btn btn-primary mb-2">
                <i class="fa fa-book me-2"></i>Acessar Documentação
              </a>
              <a href="../docs/documentation.pdf" class="btn btn-primary mb-2">
                <i class="fa fa-download me-2"></i>Baixar Documentação
              </a>
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
