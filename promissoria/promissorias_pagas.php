<?php
require_once('../valida_session/valida_session.php');
require_once('../layout/header.php'); 
require_once('../layout/sidebar.php');
require_once('../bd/bd_promissoria.php');

function formatarDinheiro($valor) {
    return 'R$ ' . number_format($valor, 2, ',', '.');
}

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
                        <h6 class="m-0 font-weight-bold text-primary" id="title">GERENCIAR PROMISSÓRIAS</h6>
                    </div>
                    <div class="col-md-4 card_button_title">
                        <a title="Adicionar nova ordem" href="cad_promissoria.php"><button type="button" class="btn btn-primary btn-sm card_button_title" data-toggle="modal" id=" "> <i class="fas fa-fw fa-clipboard-list">&nbsp;</i> Adicionar Promissória</button></a>

                    </div>
                </div>

            </div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['texto_erro'])):
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?= $_SESSION['texto_erro'] ?></strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    unset($_SESSION['texto_erro']);
                endif;
                ?>

                <?php
                if (isset($_SESSION['texto_sucesso'])):
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-check"></i>&nbsp;&nbsp;<?= $_SESSION['texto_sucesso'] ?></strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    unset($_SESSION['texto_sucesso']);
                endif;
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="display:none;">cod</th>
                                <th>Nome do Cliente</th>
                                <th>Descrição do Produto(s)</th>
                                <th>Valor</th>
                                <th>Data de vencimento</th>
                                <th>Status</th>
                                <th class="text-center" data-orderable="false">Atualizar</th>
                                <th class="text-center" data-orderable="false">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                          
                            $promissoria = listaPromissoriaPagas1();
                            foreach($promissoria as $dados): 
                                ?>
                                <tr>
                                    <td style="display:none;"><?= $dados['cod'] ?></td>
                                    <td><?= $dados['nome'] ?></td>
                                    <td><?= $dados['descricao'] ?></td>
                                    <td><?= formatarDinheiro($dados['valor']) ?></td>
                                    <td class="text-center"><?= date('d/m/Y',strtotime($dados['data_vencimento']))?></td>
                                    <td class="text-center">
                                        <?php
                                         switch ($dados['status']) {
                                            case 1:
                                                echo '<span class="badge badge-success">Pago</span>';
                                                break;
                                            case 2:
                                                echo '<span class="badge badge-warning">Não Pago</span>';
                                                break;
                                            case 3:
                                                echo '<span class="badge badge-danger">Vencido</span>';
                                                break;
                                            default:
                                                echo '';
                                            }
                                        ?>
                                        </td>
                                    <td class="text-center"> 
                                        <a title="Atualizar" href="editar_promissoria.php?cod=<?=$dados['cod']; ?>" class="btn btn-sm btn-success"><i class="fas fa-edit">&nbsp;</i>Atualizar</a>
                                    </td>
                                    <td class="text-center">
                                        <a title="Excluir" href="javascript:void(0)" data-toggle="modal" data-target="#excluir-<?=$dados['cod'];?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt">&nbsp;</i>Excluir</a>
                                    </td> 
                                </tr>

                                <div class="modal fade" id="excluir-<?=$dados['cod'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Excluir Promissoria</h5>
                                            </div>
                                            <div class="modal-body">Deseja realmente excluir esta informação?</div>
                                            <div class="modal-footer">
                                             <a href="remove_promissoria.php?cod=<?=$dados['cod'];?>"><button class="btn btn-primary btn-user" type="button">Confirmar</button></a>
                                             <a href="ordem.php"><button class="btn btn-danger btn-user" type="button">Cancelar</button></a>

                                         </div>
                                     </div>
                                 </div>
                             </div>

                            <?php endforeach ?>   
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php
require_once('../layout/footer.php');
?>