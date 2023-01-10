<?php
  ini_set('display_errors', 0 );
  error_reporting(0);
?>
<?php
  //SESSION START AND LOGIN CHECK
  session_start();
  require 'login_check.php';
  //SET ACTION AND REQUIRE CONTROLLER
  $action = 'recover_user';
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
    location.href = 'login_manage.php?action=delete_user&id=' + id;
  }

  function update(id){
    location.href = 'login_manage_update.php?id=' + id;
  }

</script>
<!-- MODAL DELETE  -->
<section class="container d-flex justify-content-center align-items-center">
  <div class="modal fade" id="addDeleteModal" tabindex="-1" aria-labelledby="addDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addDeleteModalLabel"><i class="fa fa-trash me-2"></i>Exclusão de Conta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h6>Deseja realmente excluir sua conta?</h6>
          <button type="submit" class="btn btn-primary btn-block mt-3" onclick="delet(<?= $login->id ?>)"><i class="fa fa-check me-2"></i>Confirmar</button>
          <a href="login_manage_user.php" type="button" class="btn btn-dark btn-block mt-3"><i class="fa fa-cancel me-2"></i>Cancelar</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- MAIN SECTION -->
<section class="d-flex justify-content-center align-items-center">
  <div class="container marginTopOne">
    <div class="row">
      <div class="col-md-12">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../main.php">Painel Administrativo</a></li>
            <li class="breadcrumb-item active"><span>Minha Conta</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
          <div class="col">
          <div class="d-flex justify-content-between">
            <h4><i class="fa fa-user-gear me-2"></i>Minha Conta</h4>
            <div class="d-flex">
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
                    <td>
                      <div class="col-sm-1 mt-2 d-flex justify-content-between">
                        <a type="button" class="me-2" data-bs-toggle="modal" data-bs-target="#addDeleteModal"><i class="fas fa-trash-alt fa-lg text-danger me-3" title="Deletar Conta"></i></a>
                        <a type="button"><i class="fas fa-edit fa-lg text-primary me-3" onclick="update(<?= $login->id ?>)" title="Editar Conta"></i></a>
                      </div>
                    </td>
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
<!-- UPDATE ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'update_success'){ ?>
  <script>
    iziToast.success({
      title: 'Usuário editado com sucesso!'
    });
  </script>
  <!-- SUCCESS LOG -->
  <?php
    $dateLog = date('d-m-Y H:i:s');
    $fileLog = fopen('../../logs/logs.txt','a+',0);
    $textLog = 'Data: '.$dateLog.' | Usuário: '.$_SESSION['user'][1].' | ID: '.$_SESSION['user'][0].' | Editou uma conta de usuário'."\n";
    fwrite($fileLog, $textLog);
    fclose($fileLog);
  ?>
<?php } ?>
<!-- DELETE ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'delete_success'){ ?>
  <script>
    iziToast.success({
      title: 'Usuário deletado com sucesso!'
    });
  </script>
  <!-- SUCCESS LOG -->
  <?php
    $dateLog = date('d-m-Y H:i:s');
    $fileLog = fopen('../../logs/logs.txt','a+',0);
    $textLog = 'Data: '.$dateLog.' | Usuário: '.$_SESSION['user'][1].' | ID: '.$_SESSION['user'][0].' | Deletou sua própria conta de usuário'."\n";
    fwrite($fileLog, $textLog);
    fclose($fileLog);
  ?>
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
