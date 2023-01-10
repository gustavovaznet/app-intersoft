<?php
  //SESSION START AND LOGIN CHECK
  session_start();
  require '../login/login_check.php';
  //SET ACTION AND REQUIRE CONTROLLER
  $action = 'recover_for_update';
  require 'contact_controller.php';

?>
<!-- HEADER COMPONENT -->
<?php
include '../../components/header/header.php';
?>
<!-- NAVBAR COMPONENT -->
<?php
include '../../components/navbar/navbar.php';
?>
<!-- JQUERY -->
<script type='text/javascript' src='../../js/mask/phone/plugin'></script>
<script type='text/javascript' src='../../js/mask/phone/mask'></script>
<!-- MAIN SECTION -->
<section class="d-flex justify-content-center align-items-center">
  <div class="container marginTopOne">
    <div class="row">
      <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../main.php">Painel Administrativo</a></li>
            <li class="breadcrumb-item"><a href="contact_manage.php">Contato</a></li>
            <li class="breadcrumb-item active"><span>Editar Contato</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <!-- MAIN SECTION BODY -->
              <div class="d-flex justify-content-between">
                  <h4><i class="fa fa-users me-2"></i>Editar Contato</h4>
              </div>
              <hr />
              <!-- EXT FOREACH -->
              <?php foreach ($contacts as $index => $contact) {} ?>
              <form method="post" action="contact_controller.php?action=update">
                <div class="form-group">
                  <label>Edite o contato alterando os campos abaixo:</label>
                  <input type="hidden" value="<?= $contact->id ?>" name="id" class="col-10 form-control mt-3 mb-2" required>
                  <input type="text" value="<?= $contact->name ?>" name="name" class="col-10 form-control mt-3 mb-2" required>
                  <input type="text" value="<?= $contact->phone ?>" name="phone" class="phone col-10 form-control mt-3 mb-2" required>
                  <input type="email" value="<?= $contact->mail ?>" name="mail" class="col-10 form-control mt-3 mb-2" required>
                </div>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-check me-2"></i>Confirmar</button>
                  <a href="contact_manage.php" type="button" class="btn btn-dark"><i class="fa fa-cancel me-2"></i>Cancelar</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- PHONE INPUT MASK -->
<script>
  var behavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 0 0000-0000' : '(00) 0000-00009';
  },
  options = {
      onKeyPress: function (val, e, field, options) {
          field.mask(behavior.apply({}, arguments), options);
      }
  };
  $('.phone').mask(behavior, options);
</script>
<!-- FOOTER COMPONENT -->
<?php
include '../../components/footer/footer.php';
?>
