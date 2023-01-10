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
            <li class="breadcrumb-item active"><span>Info</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <!-- MAIN SECTION -->
              <div class="d-flex justify-content-between">
                <h4><i class="fa fa-info me-2"></i>Info</h4>
                <a href="../../main.php" class="btn btn-primary">
                  <i class="fa fa-arrow-left me-2"></i>Voltar
                </a>
              </div>
                <hr />
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Categorias</th>
                    <th scope="col">Descrição</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider" >
                  <tr >
                      <td>Sistema</td>
                      <td>Intersys - Sistema Interno</td>
                  </tr>
                  <tr >
                      <td>Versão</td>
                      <td>2.0</td>
                  </tr>
                  <tr >
                      <td>SGBD</td>
                      <td>MySQL</td>
                  </tr>
                  <tr >
                      <td>Empresa</td>
                      <td>Company Name</td>
                  </tr>
                  <tr >
                      <td>Contato</td>
                      <td>(11) 9999-9999</td>
                  </tr>
                </tbody>
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
