<!-- HEADER COMPONENT -->
<?php
  include 'components/header/header.php';
?>
<!-- HEADER NAVBAR -->
<header>
  <nav class="navbar navbar-light bg-light navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand bold" href="index.php"><img width="150px" src="assets/logo.png"></a>
      <div class="d-flex">
        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#navbarModal">
          <i class="fa fa-right-to-bracket me-2"></i>Entrar
        </button>
        <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#helpModal">
          <i class="fa fa-handshake me-2"></i>Ajuda
        </button>
      </div>
  </nav>
</header>
<!-- MODAL LOGIN -->
<section class="container d-flex justify-content-center align-items-center">
  <div class="modal fade" id="navbarModal" tabindex="-1" aria-labelledby="navbarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="navbarModalLabel"><i class="fa fa-right-to-bracket me-2"></i>Acesso</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="modules/login/login_controller.php?action=login">
            <div class="form-group">
              <i class="fa fa-envelope iconImg"></i>
              <input type="email" name="mail" class="form-control iconInput mb-2" placeholder="Seu email" required>
            </div>
            <div class="form-group">
              <i class="fa fa-lock iconImg"></i>
              <input type="password" name="password" id="password" class="form-control iconInput mb-2 me-5" placeholder="Sua senha" required>
            </div>
            <div class="d-flex justify-content-between">
              <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-right-to-bracket me-2"></i>Entrar</button>
              <div class="d-flex">
                <input class="me-1" type="checkbox" onclick="showPassword()">
                <p class="mt-3">Mostrar senha</p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- MODAL HELP -->
<section class="container d-flex justify-content-center align-items-center">
  <div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="helpModalLabel"><i class="fa fa-handshake me-2"></i>Ajuda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex justify-content-center">
          <a href="./modules/docs/docs.php" class="btn btn-secondary me-2">
            <i class="fa fa-book me-2"></i>Acessar Documentação
          </a>
          <a href="./modules/docs/documentation.pdf" class="btn btn-secondary">
            <i class="fa fa-download me-2"></i>Baixar Documentação
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- MAIN SECTION -->
<div class="col-md-12 marginTopOne">
  <div class="container page">
    <div class="row">
      <div class="col">
        <div class="d-flex justify-content-center row row-cols-2 row-cols-sm-2 row-cols-md-6">
          <a href="modules/info/info_show.php" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-comment fa-2x"></i><hr>FAQ</a>
          <a href="modules/ext/ext_show.php" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-phone fa-2x"></i><hr>Ramais</a>
          <a href="modules/schedule/schedule_show.php" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-calendar fa-2x"></i><hr>Escalas de Horários</a>
          <a href="modules/contact/contact_show.php" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-users fa-2x"></i><hr>Contatos</a>
          <a href="modules/project/project_show.php" type="button" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-screwdriver-wrench fa-2x"></i><hr>Projetos</a>
          <a href="modules/product/product_show.php" type="button" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-box fa-2x"></i><hr>Estoque</a>
          <a href="modules/docs/docs.php" type="button" class="btn btn-primary btn-md me-4 mb-4"><i class="fa fa-book fa-2x"></i><hr>Documentação</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- INPUT PASSWORD SHOW/HIDE -->
<script>
  function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
<!-- TOAST ALERTS -->
<script src="js/toast/toast.min.js" type="text/javascript"></script>
<!-- STATUS ERROR -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'error'){ ?>
  <script>
    iziToast.error({
      title: 'Login e/ou senha incorretos! Favor tente novamente.'
    });
  </script>
<?php } ?>
<!-- STATUS WHITE FIELDS -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'white'){ ?>
  <script>
    iziToast.warning({
      title: 'Campo(s) vazio(s)! Favor preencha todos os campos.'
    });
  </script>
<?php } ?>
<!-- STATUS INVALID -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'invalid'){ ?>
  <script>
    iziToast.error({
      title: 'Digite suas credenciais para acessar o sistema!'
    });
  </script>
<?php } ?>
<!-- STATUS ACCOUNT DELETED -->
<?php if(isset($_GET['status']) && $_GET['status'] == 'delete_account'){ ?>
  <script>
    iziToast.success({
      title: 'Sua conta foi deletada com sucesso!'
    });
  </script>
<?php } ?>
<!-- FOOTER COMPONENT -->
<?php
  include 'components/footer/footer.php';
?>
