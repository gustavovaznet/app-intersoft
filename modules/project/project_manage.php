<?php
  //SESSION START AND LOGIN CHECK
  session_start();
  require '../login/login_check.php';
  //SET ACTION AND RECOVER CONTROLLER
  $action = 'recover';
  require 'project_controller.php';

?>
<!-- HEADER COMPONENT -->
<?php
  include '../../components/header/header.php';
?>
<!-- NAVBAR COMPONENT -->
<?php
  require '../../components/navbar/navbar.php';
?>
<!-- DELETE AND UPDATE FUNCTION -->
<script>

    function delet(id){
      location.href = 'project_manage.php?action=delete&id=' + id;
    }

    function update(id){
      location.href = 'project_manage_update.php?id=' + id;
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
            <li class="breadcrumb-item active"><span>Projetos</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <div class="d-flex justify-content-between buttonPosition">
                <h4><i class="fa fa-screwdriver-wrench me-2"></i>Projetos</h4>
                <div class="d-flex buttonPosition">
                  <form class="d-flex" method="post" action="project_manage_search.php?action=search">
                    <input class="form-control inputSearch" type="search" placeholder="Pesquise aqui..." aria-label="Search" name="project_search" required>
                    <button type="submit" class="btn btn-dark btnSearch me-5"><i class="fa fa-search me-2"></i></button>
                  </form>
                  <button type="button" class="btn btn-danger me-2 mt-1" data-bs-toggle="modal" data-bs-target="#addExtModal">
                    <i class="fa fa-plus me-2"></i>Adicionar Projeto
                  </button>
                  <a href="../../main.php" class="btn btn-primary mt-1">
                    <i class="fa fa-arrow-left me-2"></i>Voltar
                  </a>
                </div>
              </div>
              <hr />
              <!-- MODAL  -->
              <section class="container d-flex justify-content-center align-items-center">
                <div class="modal fade" id="addExtModal" tabindex="-1" aria-labelledby="addExtModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="addExtModalLabel"><i class="fa fa-tools me-2"></i>Novo Projeto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="project_controller.php?action=insert">
                          <div class="form-group">
                            <input type="text" name="company" class="form-control iconInput mb-2" placeholder="Empresa" required>
                          </div>
                          <div class="form-group">
                            <input type="text" name="project" class="form-control iconInput mb-2" placeholder="Projeto" required>
                          </div>
                          <div class="form-group">
                            <input type="text" name="note" class="form-control iconInput mb-2" placeholder="Observações" required>
                          </div>
                          <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus me-2"></i>Adicionar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <!-- MAIN SECTION BODY - FOREACH -->
              <div class="table-responsive-sm">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Empresa</th>
                      <th scope="col">Projeto</th>
                      <th scope="col">Observações</th>
                    </tr>
                  </thead>
                  <?php foreach ($projects as $index => $project) { ?>
                    <tbody class="table-group-divider" >
                      <tr >
                        <div id="project_<?= $project->id ?>">
                          <th scope="row"></th>
                          <td><b><?= $project->company ?></b></td>
                          <td><?= $project->project ?></td>
                          <td><?= $project->note ?></td>
                        </div>
                        <td>
                          <div class="col-sm-2 mt-2 d-flex justify-content-between">
                            <i class="fas fa-trash-alt fa-lg text-danger me-3" title="Deletar Projeto" onclick="delet(<?= $project->id ?>)"></i>
                            <i class="fas fa-edit fa-lg text-primary" title="Editar Projeto" onclick="update('<?= $project->id ?>')"></i>
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
  <!-- SUCCESS LOG -->
  <?php
    $dateLog = date('d-m-Y H:i:s');
    $fileLog = fopen('../../logs/logs.txt','a+',0);
    $textLog = 'Data: '.$dateLog.' | Usuário: '.$_SESSION['user'][1].' | ID: '.$_SESSION['user'][0].' | Inseriu um novo projeto'.":\n";
    fwrite($fileLog, $textLog);
    fclose($fileLog);
  ?>
<?php } ?>
<!-- UPDATE ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'update_success'){ ?>
  <script>
    iziToast.success({
      title: 'Projeto editado com sucesso!'
    });
  </script>
  <!-- UPDATE LOG -->
  <?php
    $dateLog = date('d-m-Y H:i:s');
    $fileLog = fopen('../../logs/logs.txt','a+',0);
    $textLog = 'Data: '.$dateLog.' | Usuário: '.$_SESSION['user'][1].' | ID: '.$_SESSION['user'][0].' | Alterou um projeto existente'.":\n";
    fwrite($fileLog, $textLog);
    fclose($fileLog);
  ?>
<?php } ?>
<!-- DELETE ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'delete_success'){ ?>
  <script>
    iziToast.success({
      title: 'Projeto deletado com sucesso!'
    });
  </script>
  <!-- DELETE LOG -->
  <?php
    $dateLog = date('d-m-Y H:i:s');
    $fileLog = fopen('../../logs/logs.txt','a+',0);
    $textLog = 'Data: '.$dateLog.' | Usuário: '.$_SESSION['user'][1].' | ID: '.$_SESSION['user'][0].' | Deletou um projeto'.":\n";
    fwrite($fileLog, $textLog);
    fclose($fileLog);
  ?>
<?php } ?>
<!-- ERROR ALERT -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'error'){ ?>
  <script>
    iziToast.error({
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
  require '../../components/footer/footer.php';
?>
