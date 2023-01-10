<?php
  //SESSION START AND LOGIN CHECK
  session_start();
  require '../login/login_check.php';
  //SET ACTION AND REQUIRE CONTROLLER
  $action = 'recover';
  require 'ext_controller.php';

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
    location.href = 'ext_manage.php?action=delete&id=' + id;
  }

  function update(id){
    location.href = 'ext_manage_update.php?id=' + id;
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
            <li class="breadcrumb-item"><a href="ext_manage.php">Ramais</a></li>
            <li class="breadcrumb-item active"><span>Resultado da Busca</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <div class="d-flex justify-content-between">
                <h4><i class="fa fa-search me-2"></i>Ramais Telefônicos</h4>
                <div class="d-flex">
                  <a href="ext_manage.php" class="btn btn-primary">
                    <i class="fa fa-arrow-left me-2"></i>Voltar
                  </a>
                </div>
              </div>
              <hr />
              <!-- MAIN SECTION EXT TABLE -->
              <div class="table-responsive-sm">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Colaborador</th>
                      <th scope="col">Setor</th>
                      <th scope="col">Ramal</th>
                    </tr>
                  </thead>
                  <?php foreach ($exts as $index => $ext) { ?>
                    <tbody class="table-group-divider" >
                      <tr >
                        <div id="ext_<?= $ext->id ?>">
                          <th scope="row"></th>
                          <td><b><?= $ext->name ?></b></td>
                          <td><?= $ext->department ?></td>
                          <td><b><?= $ext->ext ?></b></td>
                        </div>
                        <td>
                          <div class="col-sm-2 mt-2 d-flex justify-content-between">
                            <i class="fas fa-trash-alt fa-lg text-danger me-3" title="Deletar Ramal" onclick="delet(<?= $ext->id ?>)"></i>
                            <i class="fas fa-edit fa-lg text-primary" title="Editar Ramal" onclick="update('<?= $ext->id ?>')"></i>
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
