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
<!-- CSV IMPORT MAIN SECTION -->
<section class="d-flex justify-content-center align-items-center">
  <div class="container marginTopOne">
    <div class="row">
      <div class="col-md-12">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../main.php">Painel Administrativo</a></li>
            <li class="breadcrumb-item active"><span>Importar CSV</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="d-flex justify-content-between buttonPosition">
            <h4><i class="fa fa-file me-2"></i>Importar CSV</h4>
            <div class="d-flex buttonPosition">
              <a href="../downloads/downloads_show.php" class="btn btn-danger mt-1 me-2">
                <i class="fa fa-file me-2"></i>Baixar Modelo CSV
              </a>
              <a href="../../main.php" class="btn btn-primary mt-1">
                <i class="fa fa-arrow-left me-2"></i>Voltar
              </a>
            </div>
          </div>
          <hr />
          <div class="dflex justify-content-center">
            <h6 class="mt-4 mb-3">Use a opção abaixo para importar um arquivo .CSV com produtos no estoque:</h6>
            <form action="file_controller.php" method="post" enctype="multipart/form-data">
              <div class="d-flex justify-content-center mt-4">
                <div class="row">
                  <label>
                    <input type="file" name="file" required>
                  </label>
                  <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-file-import me-2"></i>Importar
                  </button>
                </div>
              </div>
            </form>
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
