<?php
require 'connection.php';
$connection = new Connection();
$users = $connection->query("SELECT * FROM users");
$usersVinculos = $connection->query("SELECT * FROM users");
$cores = $connection->query("SELECT * FROM colors");
$coresVinculos = $connection->query("SELECT * FROM colors");
//$vinculos = $connection->query("SELECT * FROM user_colors");
$dados = $connection->query("SELECT user_colors.user_id,
                                    user_colors.color_id,
                                    users.name as UserName,
                                    users.id, colors.id as colorId,
                                    colors.name as colorName FROM user_colors 
                                    INNER JOIN users  ON user_colors.user_id = users.id 
                                    INNER JOIN colors ON user_colors.color_id = colors.id ");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Teste PHP</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row">
                    <h3>Tabela de Usuários</h3>
                </div>
                <div class="row" style="float: left;">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalusuario">
                        Adicionar Usuário
                    </button>
                </div>
                <table class="table table-sm table-hover ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col" style="float: right;">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td><?= $user->id ?></td>
                                <td><?= $user->name ?></td>
                                <td><?= $user->email ?></td>
                                <td style="float: right;">
                                    <a href="<?= '/editar.php?id=' . $user->id ?>" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="<?= '/save.php?id=' . $user->id ?>" class="btn btn-danger btn-sm">Excluir</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <div class="row">
                    <h3>Tabela de Cores</h3>
                </div>
                <div class="row" style="float: right;">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalcor">
                        Adicionar Cor
                    </button>
                </div>
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col" style="float: right;">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cores as $cor) { ?>
                            <tr>
                                <td><?= $cor->id ?></td>
                                <td><?= $cor->name ?></td>
                                <td style="float: right;">
                                    <a href="<?= '/save.php?idcolor=' . $cor->id ?>" class="btn btn-danger btn-sm">Excluir</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <h3>Tabela de Vínculos</h3>
        </div>
        <div class="row" style="float: right;">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#vinculos">
                Adicionar Vinculo
            </button>
        </div>
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Cor</th>
                    <th scope="col" style="float: right;">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dados as $dado) { ?>
                    <tr>
                        <td><?= $dado->UserName ?></td>
                        <td><?= $dado->colorName ?></td>
                        <td style="float: right;">
                        <a href="<?= '/save.php?color_id=' . $dado->color_id .'&user_id='. $dado->user_id ?>" class="btn btn-danger btn-sm">Excluir</a>
                        </td>

                        <!--
                            user_colors.user_id,
                            user_colors.color_id,
                        -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Inicio Modal cadastro de usuarios-->
    <div class="modal fade" id="modalusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="./save.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar Usuário</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nome</span>
                            </div>
                            <input type="text" class="form-control" name="dname" id="dname" aria-label="Exemplo do tamanho do input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                            </div>
                            <input type="text" class="form-control" name="email" id="email" aria-label="Exemplo do tamanho do input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- fim Modal cadastro de usuarios-->

    <!-- Inicio modal Cores-->
    <div class="modal fade" id="modalcor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="./save.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar Cor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nome da Cor</span>
                            </div>
                            <input type="text" class="form-control" name="corname" id="corname" aria-label="Exemplo do tamanho do input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--Fim modal Cores -->

    <!-- Modal Vinculos -->
    <div class="modal fade" id="vinculos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="./save.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar Vínculo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Usuário</label>
                                </div>
                                <select class="custom-select" name="user_id">
                                    <option value="">Escolher...</option>
                                    <?php foreach ($usersVinculos as $usr) { ?>
                                        <option value="<?= $usr->id ?>"><?= $usr->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Core</label>
                                </div>
                                <select class="custom-select" name="color_id">
                                    <option value="">Escolher...</option>
                                    <?php foreach ($coresVinculos as $corV) { ?>
                                        <option value="<?= $corV->id ?>"><?= $corV->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Fim Modal Vinculos -->
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>