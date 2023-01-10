<?php
  session_start();
  require 'login_check.php';
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
            <li class="breadcrumb-item active"><span>Adicionar Usuário</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
            <div class="row">
            <div class="col">
              <!-- NEW CUSTOMER SECTION -->
              <div class="d-flex justify-content-between">
                <h4><i class="fa fa-user-plus me-2"></i>Novo Usuário</h4>
                <a href="../../main.php" class="btn btn-primary">
                  <i class="fa fa-arrow-left me-2"></i>Voltar
                </a>
              </div>
              <hr />
              <?php if(isset($_SESSION['user'][2]) && $_SESSION['user'][2] == 'Comum'){ ?>
                <!-- ORDINARY USERS -->
                <div class="alert alert-info d-flex justify-content-center text-center" role="alert">
                    <b>
                        <i class="fa fa-circle-exclamation me-2"></i>
                            VOCÊ NÃO TEM PERMISSÃO PARA CADASTRAR USUÁRIOS, FAVOR LOGAR COM UMA CONTA DO TIPO ADMINISTRADOR.
                            <span class="me-2"></span>
                        <i class="fa fa-circle-exclamation"></i>
                    </b>
                </div>
              <?php } ?>
              <!-- ADMIN USERS -->
              <?php if(isset($_SESSION['user'][2]) && $_SESSION['user'][2] == 'Administrador'){ ?>
                <form method="post" action="login_controller.php?action=register">
                  <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" class="col-10 form-control" placeholder="José" required>
                  </div>
                  <div class="form-group">
                    <label>Sobrenome:</label>
                    <input type="text" name="surname" class="col-10 form-control" placeholder="Oliveira da Silva" required>
                  </div>
                  <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="mail" class="col-10 form-control" placeholder="exemplo@email.com" required>
                  </div>
                  <div class="form-group">
                    <label>Senha:</label>
                    <input type="password" name="password" class="col-10 form-control " minlength="8" placeholder="Mínimo 8 caracteres" required>
                  </div>
                  <div class="form-group">
                    <label>Confirmar Senha:</label>
                    <input type="password" name="password_check" class="col-10 form-control" minlength="8" placeholder="Repita a senha" required>
                  </div>
                  <div class="form-group">
                    <label>Tipo de Conta:</label>
                    <select name="type" class="col-10 form-control mb-4" required>
                      <option disabled selected>Escolha uma opção</option>  
                      <option value="Comum">Comum</option>
                      <option value="Administrador">Administrador</option>
                    </select>
                  </div>
                  <button class="btn btn-primary">
                    <i class="fa fa-plus me-2"></i>Cadastrar
                  </button>
                </form>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- TOAST ALERTS -->
<script src="../../js/toast/toast.min.js" type="text/javascript"></script>
<!-- SUCCESS ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'insert_success'){ ?>
  <script>
    iziToast.success({
      title: 'Cadastro realizado com sucesso!'
    });
  </script>
  <?php
    $dateLog = date('d-m-Y H:i:s');
    $fileLog = fopen('../../logs/logs.txt','a+',0);
    $textLog = 'Data: '.$dateLog.' | Usuário: '.$_SESSION['user'][1].' | ID: '.$_SESSION['user'][0].' | Cadastrou um novo usuário no sistema'."\n";
    fwrite($fileLog, $textLog);
    fclose($fileLog);
  ?>
<?php } ?>
<!-- PASSWORD ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'password'){ ?>
  <script>
    iziToast.warning({
      title: 'As senhas não conferem! favor tente novamente.'
    });
  </script>
<?php } ?>
<!-- ERROR ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'error'){ ?>
  <script>
    iziToast.warning({
      title: 'Ops! Algo deu errado, por favor tente novamente.'
    });
  </script>
<?php } ?>
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
