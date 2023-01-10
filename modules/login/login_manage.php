<?php
  ini_set('display_errors', 0 );
  error_reporting(0);
?>
<?php
  //SESSION START AND LOGIN CHECK
  session_start();
  require 'login_check.php';
  //SET ACTION AND REQUIRE CONTROLLER
  $action = 'recover';
  require 'login_controller.php';

?>
<!-- HEADER COMPONENT -->
<?php
  include '../../components/header/header.php';
?>
<!-- NAVBAR COMPONENT -->
<?php
  include '../../components/navbar/navbar.php';
?>
<!-- DELETE AND UPDATE FUNCTION -->
<script>

  function delet(id){
    location.href = 'login_manage.php?action=delete&id=' + id;
  }

  function update(id){
    location.href = 'login_manage_update.php?id=' + id;
  }

  function password(id){
    location.href = 'login_manage_password.php?id=' + id;
  }

</script>
<!-- MAIN SECTION -->
<section class="d-flex justify-content-center align-items-center">
  <div class="container marginTopOne">
    <div class="row">
      <div class="col-md-12">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../main.php">Painel Administrativo</a></li>
            <li class="breadcrumb-item active"><span>Gerenciar Usuários</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
          <div class="col">
          <div class="d-flex justify-content-between buttonPosition">
            <h4><i class="fa fa-users me-2"></i>Gerenciar Usuários</h4>
            <div class="d-flex">
              <form class="d-flex" method="post" action="login_manage_search.php?action=search">
                <input class="form-control inputSearch" type="search" placeholder="Pesquise aqui..." aria-label="Search" name="login_search" required>
                <button type="submit" class="btn btn-dark btnSearch me-3"><i class="fa fa-search me-2"></i></button>
              </form>
              <a href="../../main.php" class="btn btn-primary">
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
                  <th scope="col">Nome</th>
                  <th scope="col">Sobrenome</th>
                  <th scope="col">Email</th>
                  <th scope="col">Conta</th>
                </tr>
              </thead>
              <?php foreach ($logins as $index => $login) { ?>
                <tbody class="table-group-divider">
                  <tr>
                    <div id="login_<?= $login->id ?>">
                      <th scope="row"></th>
                      <td><?= $login->name ?></td>
                      <td><?= $login->surname ?></td>
                      <td><?= $login->mail ?></td>
                      <td><?= $login->type ?></td>
                    </div>
                    <?php if(isset($_SESSION['user'][2]) && $_SESSION['user'][2] == 'Administrador'){ ?>
                      <td>
                        <div class="col-sm-1 mt-2 d-flex justify-content-between">
                          <a type="button"><i class="fas fa-trash-alt fa-lg text-danger me-3" title="Deletar Usuário" onclick="delet(<?= $login->id ?>)"></i></a>
                          <a type="button"><i class="fas fa-edit fa-lg text-primary me-3" title="Editar Usuário" onclick="update(<?= $login->id ?>)"></i></a>
                          <a type="button"><i class="fas fa-key fa-lg text-secondary me-3" title="Trocar Senha" onclick="password(<?= $login->id ?>)"></i></a>
                        </div>
                      </td>
                    <?php } ?>
                  </tr>
                </tbody>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- TOAST ALERTS -->
<script src="../../js/toast/toast.min.js" type="text/javascript"></script>
<!-- DELETE SUCCESS ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'delete_success'){ ?>
  <script>
    iziToast.success({
      title: 'Usuário deletado com sucesso!'
    });
  </script>
  <?php
    $dateLog = date('d-m-Y H:i:s');
    $fileLog = fopen('../../logs/logs.txt','a+',0);
    $textLog = 'Data: '.$dateLog.' | Usuário: '.$_SESSION['user'][1].' | ID: '.$_SESSION['user'][0].' | Deletou um usuário no sistema'."\n";
    fwrite($fileLog, $textLog);
    fclose($fileLog);
  ?>
<?php } ?>
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
    $textLog = 'Data: '.$dateLog.' | Usuário: '.$_SESSION['user'][1].' | ID: '.$_SESSION['user'][0].' | Alterou a senha de um usuário do sistema'."\n";
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
