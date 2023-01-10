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
<header>
  <?php
    include '../../components/navbar/navbar.php';
  ?>
</header>
<!-- MAIN SECTION -->
<section class="d-flex justify-content-center align-items-center">
  <div class="container marginTopOne">
    <div class="row">
      <div class="col-md-12">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../main.php">Painel Administrativo</a></li>
            <li class="breadcrumb-item active"><span>Configurações</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <!-- CHANGE PASSWORD SECTION -->
              <div class="d-flex justify-content-between">
                <h4><i class="fa fa-key me-2"></i>Alterar Senha</h4>
                <a href="../../main.php" class="btn btn-primary">
                  <i class="fa fa-arrow-left me-2"></i>Voltar
                </a>
              </div>
              <hr />
              <form method="post" action="../login/login_controller.php?action=change">
              <div class="form-group">
                  <label>Senha Atual:</label>
                  <input type="password" name="current_password" class="col-10 form-control" minlength="8" required>
                </div>
                <div class="form-group">
                  <label>Nova Senha:</label>
                  <input type="password" name="password" class="col-10 form-control" minlength="8" required>
                </div>
                <div class="form-group">
                  <label>Confirmar Senha:</label>
                  <input type="password" name="check_password" class="col-10 form-control mb-4" minlength="8" required>
                </div>
                <button class="btn btn-primary">
                  <i class="fa fa-rotate me-2"></i>Alterar Senha
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- TOAST ALERTS -->
<script src="../../js/toast/toast.min.js" type="text/javascript"></script>
<!-- STATUS WHITE FIELDS -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'white'){ ?>
  <script>
    iziToast.warning({
      title: 'Campo(s) vazio(s)! Favor preencha todos os campos!'
    });
  </script>
<?php } ?>
<!-- STATUS CHECK PASSWORD -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'check_password'){ ?>
  <script>
    iziToast.warning({
      title: 'As novas senhas não coincidem, favor tente novamente.'
    });
  </script>
<?php } ?>
<!-- STATUS SUCCESS -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'password_success'){ ?>
  <script>
    iziToast.success({
      title: 'Senha alterada com sucesso!'
    });
  </script>
  <!-- SUCCESS LOG -->
  <?php
    $dateLog = date('d-m-Y H:i:s');
    $fileLog = fopen('../../logs/logs.txt','a+',0);
    $textLog = 'Data: '.$dateLog.' | Usuário: '.$_SESSION['user'][1].' | ID: '.$_SESSION['user'][0].' | Alterou com sucesso a senha da sua própria conta'."\n";
    fwrite($fileLog, $textLog);
    fclose($fileLog);
  ?>
<?php } ?>
<!-- STATUS ERROR -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'error'){ ?>
  <script>
    iziToast.error({
      title: 'Falha ao alterar senha, favor tente novamente.'
    });
  </script>
<?php } ?>
<!-- FOOTER COMPONENT -->
<?php
  include '../../components/footer/footer.php';
?>
