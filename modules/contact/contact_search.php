<?php
  require 'contact_controller.php';
?>
<!-- HEADER COMPONENT -->
<?php
  include '../../components/header/header.php';
?>
<!-- NAVBAR COMPONENT -->
<?php
  include '../../components/navbar_white/navbar_white.php';
?>
<!-- MAIN SECTION -->
<section class="d-flex justify-content-center align-items-center">
  <div class="container marginTopOne">
    <div class="col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../../index.php">Menu Principal</a></li>
          <li class="breadcrumb-item"><a href="contact_show.php">Contatos</a></li>
          <li class="breadcrumb-item active"><span>Resultados da Busca</span></li>
        </ol>
      </nav>
    </div>
    <!-- ALERT -->
    <?php
      include '../../components/alert/alert.php';
    ?>
    <!-- HEADER -->
    <div class="col-md-12">
      <div class="container page">
        <div class="row">
          <div class="col">
            <div class="d-flex justify-content-between">
              <h4><i class="fa fa-search me-2"></i>Resultados da Busca</h4>
              <div class="d-flex">
                <a href="contact_show.php" class="btn btn-primary">
                  <i class="fa fa-arrow-left me-2"></i>Voltar
                </a>
              </div>
            </div>
            <hr />
            <!-- MAIN TABLE -->
            <div class="table-responsive-sm">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <?php foreach ($contacts as $index => $contact) { ?>
                  <tbody class="table-group-divider" >
                    <tr >
                      <div id="contact_<?= $contact->id ?>">
                        <th scope="row"></th>
                        <td><b><?= $contact->name ?></b></td>
                        <td><?= $contact->phone ?></td>
                        <td><?= $contact->mail ?></td>
                      </div>
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
</section>
<!-- FOOTER COMPONENT -->
<?php
  include '../../components/footer/footer.php';
?>
