<?php
require 'connection.php';
$connection = new Connection();
$user = $connection->query("SELECT * FROM users WHERE id=" . $_GET['id']);

foreach ($user as $u) {
    $id = $u->id;
    $nome = $u->name;
    $email = $u->email;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Teste PHP - Editar</title>
</head>

<body>
    <div class="container">
        <form action="./save.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="dname">Nome</label>
                    <input type="text" class="form-control" id="dname" name="dname" placeholder="<?= $nome ?>" value="<?= $nome ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="<?= $email ?>" value="<?= $email ?>">
                </div>
                <div id="hidden">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $id ?>" hidden>
                </div>
            </div>
            <a href="http://localhost:7070/" class="btn btn-danger btn-sm">Voltar</a>
            <button type="submit" class="btn btn-success btn-sm">Salvar</button>

        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>