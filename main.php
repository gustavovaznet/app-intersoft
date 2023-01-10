<?php
  //SESSION START AND LOGIN CHECK
  session_start();
  require 'modules/login/login_check.php';
?>
<!-- HEADER COMPONENT -->
<?php
  include 'components/header/header.php';
?>
<!-- NAVBAR COMPONENT -->
<?php
  include 'components/navbar/navbar.php';
?>
<!-- MAIN SECTION -->
<div class="col-md-12 marginTopOne">
  <div class="container page">
    <div class="row">
      <div class="col">
        <!-- MAIN INTERFACE SECTION -->
        <div class="d-flex">
          <h4>Painel Administrativo</h4>
        </div>
        <hr />
        <div class="dflex justify-content-between row row-cols-1 row-cols-sm-2 row-cols-md-6">
          <a href="modules/info/info_new.php" type="button" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-plus fa-2x"></i><hr>Nova Questão</a>
          <a href="modules/info/info_manage.php" type="button" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-comment fa-2x"></i><hr>Gerenciar FAQ</a>
          <a href="modules/login/login_new.php" type="button" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-user fa-2x"></i><hr>Cadastrar Usuário</a>
          <a href="modules/login/login_manage.php" type="button" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-users-cog fa-2x"></i><hr>Gerenciar Usuários</a>
          <a href="modules/login/login_manage_user.php" type="button" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-user-cog fa-2x"></i><hr>Minha Conta</a>
          <a href="modules/ext/ext_manage.php" type="button" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-phone fa-2x"></i><hr>Ramais</a>
          <a href="modules/schedule/schedule_manage.php" type="button" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-calendar fa-2x"></i><hr>Escalas de Horários</a>
          <a href="modules/contact/contact_manage.php" type="button" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-users fa-2x"></i><hr>Contatos</a>
          <a href="modules/project/project_manage.php" type="button" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-screwdriver-wrench fa-2x"></i><hr>Projetos</a>
          <a href="modules/product/product_manage.php" type="button" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-boxes fa-2x"></i><hr>Gerenciar Estoque</a>
          <a href="modules/file/file_show.php" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-file fa-2x"></i><hr>Importar CSV</a>
          <a href="modules/settings/settings_show.php" type="button" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-gear fa-2x"></i><hr>Configurações</a>
          <a href="modules/help/help_show.php" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-question fa-2x"></i><hr>Ajuda</a>
          <a href="modules/downloads/downloads_show.php" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-download fa-2x"></i><hr>Donwloads</a>
          <a href="modules/inf/inf_show.php" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-info fa-2x"></i><hr>Info</a>
          <?php if(isset($_SESSION['user'][1]) && $_SESSION['user'][1] == 'Gustavo'){ ?>
            
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- FOOTER COMPONENT -->
<?php
  include 'components/footer/footer.php';
?>
