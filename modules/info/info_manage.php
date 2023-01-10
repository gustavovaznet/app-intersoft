<?php
  $action = 'recover';
  require 'info_controller.php';

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
<!-- DELETE AND UPDATE FUNCTION -->
<script>

  function update(id){
    location.href = 'info_manage_update.php?id=' + id;
  }

  function delet(id){
    location.href = 'info_manage.php?action=delete&id=' + id;
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
            <li class="breadcrumb-item active"><span>Gerenciar FAQ</span></li>
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
                  <form class="d-flex" method="post" action="info_manage_search.php?action=search">
                    <input class="form-control inputSearch" type="search" placeholder="Pesquise aqui..." aria-label="Search" name="info_search" required>
                    <button type="submit" class="btn btn-dark btnSearch me-3"><i class="fa fa-search me-2"></i></button>
                  </form>
                  <a href="../../main.php" class="btn btn-primary">
                    <i class="fa fa-arrow-left me-2"></i>Voltar
                  </a>
                </div>
              </div>
              <hr />
              <div class="d-flex justify-content-center">
                <div class="table-responsive-sm">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Pergunta</th>
                        <th scope="col">Resposta</th>
                        <th scope="col">Ações</th>
                      </tr>
                    </thead>
                    <?php foreach ($infos as $index => $info) { ?>
                      <tbody class="table-group-divider" >
                        <tr >
                          <div id="info_<?= $info->id ?>">
                            <th scope="row"></th>
                            <td><?= $info->question ?></td>
                            <td><?= $info->answer ?></td>
                          </div>
                          <td>
                            <div class="col-sm-2 mt-2 d-flex justify-content-between">
                              <i class="fas fa-trash-alt fa-lg text-danger me-3" title="Deletar Questão" onclick="delet(<?= $info->id ?>)"></i>
                              <i class="fas fa-edit fa-lg text-primary" title="Editar Questão" onclick="update('<?= $info->id ?>')"></i>
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
      title: 'Questão editada com sucesso!',
      position: 'topCenter'
    });
  </script>
  <!-- UPDATE LOG -->
  <?php
    $dateLog = date('d-m-Y H:i:s');
    $fileLog = fopen('../../logs/logs.txt','a+',0);
    $textLog = 'Data: '.$dateLog.' | Usuário: '.$_SESSION['user'][1].' | ID: '.$_SESSION['user'][0].' | Editou uma questão no FAQ'.":\n";
    fwrite($fileLog, $textLog);
    fclose($fileLog);
  ?>
<?php } ?>
<!-- DELETE ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'delete_success'){ ?>
  <script>
    iziToast.success({
      title: 'Questão deletada com sucesso!'
    });
  </script>
  <!-- DELETE LOG -->
  <?php
    $dateLog = date('d-m-Y H:i:s');
    $fileLog = fopen('../../logs/logs.txt','a+',0);
    $textLog = 'Data: '.$dateLog.' | Usuário: '.$_SESSION['user'][1].' | ID: '.$_SESSION['user'][0].' | Deletou uma questão no FAQ'.":\n";
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
<!-- FOOTER -->
<?php
  include '../../components/footer/footer.php';
?>
