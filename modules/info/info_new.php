<?php
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
<!-- MAIN SECTION -->
<section class="d-flex justify-content-center align-items-center">
  <div class="container marginTopOne">
    <div class="row">
      <div class="col-md-12">
        <!-- BREADCRUMB -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../main.php">Painel Administrativo</a></li>
            <li class="breadcrumb-item active"><span>Adicionar Questão</span></li>
          </ol>
        </nav>
      </div>
      <div class="col-md-12">
        <div class="container page">
          <div class="row">
            <div class="col">
              <!-- MAIN SECTION -->
              <div class="d-flex justify-content-between">
                  <h4><i class="fa fa-user-plus me-2"></i>Nova Questão</h4>
                  <a href="../../main.php" class="btn btn-primary">
                    <i class="fa fa-arrow-left me-2"></i>Voltar
                  </a>
              </div>
              <hr />
              <form method="post" action="info_controller.php?action=insert">
                <div class="form-group">
                  <label>Adicione uma nova questão ao FAQ preenchendo os campos abaixo:</label>
                  <input type="text" name="question" class="col-10 form-control mt-3 mb-2" placeholder="Digite a pergunta" required>
                  <textarea type="text" name="answer" class="col-10 form-control mb-4" placeholder="Digite a resposta" required></textarea>
                </div>
                  <button class="btn btn-primary"><i class="fa fa-plus me-2"></i>Adicionar</button>
              </form>
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
      title: 'Questão cadastrada com sucesso!'
    });
  </script>
  <!-- SUCCESS LOG -->
  <?php
    $dateLog = date('d-m-Y H:i:s');
    $fileLog = fopen('../../logs/logs.txt','a+',0);
    $textLog = 'Data: '.$dateLog.' | Usuário: '.$_SESSION['user'][1].' | ID: '.$_SESSION['user'][0].' | Incluiu nova questão ao FAQ'.":\n";
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
