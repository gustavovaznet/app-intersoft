<!-- NAVBAR COMPONENT -->
<header>
  <nav class="navbar navbar-light fixed-top bg-light navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <!-- LOGO -->
      <a class="navbar-brand"><img width="150px" src="../../assets/logo.png"></a>
      <div class="d-flex">
        <!-- NAVBAR TOGGLE -->
        <button class="navbar-toggler me-5" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- NAVBAR DROPDOWN MENU -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa me-2"></i><b>Olá, <?php echo $_SESSION['user'][1]; ?></b></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a href="../../modules/login/login_manage_user.php"><button class="btn btn-outline-success my-2 my-sm-0 dropdown-item" type="button"><i class="fa fa-user-cog fa me-2"></i>Minha Conta</button></a>
                <a href="../../modules/settings/settings_show.php"><button class="btn btn-outline-success my-2 my-sm-0 dropdown-item" type="button"><i class="fa fa-gear fa me-2"></i>Configurações</button></a>
                <a href="../../modules/help/help_show.php"><button class="btn btn-outline-success my-2 my-sm-0 dropdown-item" type="button"><i class="fa fa-question fa me-2"></i>Ajuda</button></a>
                  <hr>
                <a href="../../modules/logout/logout.php"><button class="btn btn-outline-success my-2 my-sm-0 dropdown-item" type="button"><i class="fa fa-right-to-bracket fa me-2"></i>Sair</button></a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>
