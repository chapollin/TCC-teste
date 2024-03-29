
<?php
require_once('../valida_session/valida_session.php');
require_once('../layout/header.php'); 
require_once('../layout/sidebar.php'); 
require_once ("../bd/bd_usuario.php");

$codigo = $_GET['cod'];
$dados = buscaUsuarioeditar($codigo);
$nome = $dados["nome"];
$email = $dados["email"];
?>

<!-- Main Content -->
<div id="content">

    <?php require_once('../layout/navbar.php');?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-2">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-8">
                        <h6 class="m-0 font-weight-bold text-primary" id="title">ATUALIZAR DADOS DO USUÁRIO</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="user" action="editar_usuario_envia.php" method="post">
                    <input type="hidden" name="cod" value="<?=$codigo?>">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> Nome Completo </label>
                            <input type="text" class="form-control form-control-user" id="nome" name="nome" value="<?= $nome ?>">
                        </div>
                        <div class="col-sm-6">
                            <label> Email </label>
                            <input type="email" class="form-control form-control-user" id="email" name="email" value="<?= $email ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                            <div class="col-sm-6">
                                <label> Nova Senha </label>
                                <input type="password" class="form-control form-control-user" id="senha" name="senha" placeholder="Digite a nova senha">
                            </div>
                        </div>                     
                    <div class="card-footer text-muted" id="btn-form">
                        <div class=text-right>
                            <a title="Voltar" href="usuario.php"><button type="button" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>&nbsp;</i>Voltar</button></a>
                            <a title="Adicionar"><button type="submit" name="updatebtn" class="btn btn-primary uptadebtn"><i class="fas fa-edit">&nbsp;</i>Atualizar</button> </a>
                        </div>
                    </div>
                </form>  
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
require_once('../layout/footer.php');
?>


