<?php
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
  include '../../components/navbar_white/navbar_white.php';
?>
<!-- DELETE AND UPDATE FUNCTION -->
<script>

  function delet(id){
    location.href = 'info_manage.php?action=delete&id=' + id;
  }

  function update(id){
    location.href = 'info_manage_update.php?id=' + id;
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
            <li class="breadcrumb-item"><a href="info_manage.php">FAQ</a></li>
            <li class="breadcrumb-item active"><span>Resultados da Busca</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <!-- MAIN SECTION BODY -->
              <div class="d-flex justify-content-between">
                  <h4><i class="fa fa-search me-2"></i>Resultados da Busca</h4>
                  <a href="info_manage.php" class="btn btn-primary">
                    <i class="fa fa-arrow-left me-2"></i>Voltar
                  </a>
              </div>
              <hr />
              <!-- ACCORDION -->
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
</section>
<!-- FOOTER COMPONENT -->
<?php
  include '../../components/footer/footer.php';
?>
