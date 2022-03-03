<?php
require 'connection.php';
$connection = new Connection();

//Cadasro de Cores
if (!empty($_POST['corname'])) {
    $cor = $connection->query("INSERT INTO colors (name) VALUES ('" . $_POST['corname'] . "')");
    header("Location: index.php");
    die;
}

//Cadastro de Usuários
if (!empty($_POST['dname'] && !empty($_POST['email']))) {
    if (isset($_POST['id'])) {
        $user = $connection->query("UPDATE users SET name='" . $_POST['dname'] . "', email='" . $_POST['email'] . "'  WHERE id=" . $_POST['id']);
        header("Location: index.php");
        die;
    } else {
        $user = $connection->query("INSERT INTO users (name, email) VALUES ('" . $_POST['dname'] . "', '" . $_POST['email'] . "')");
        header("Location: index.php");
        die;
    }
} 

//Cadastro de Vinculos
if (!empty($_POST['user_id'] && !empty($_POST['color_id']))) {
    $vinculo = $connection->query("INSERT INTO user_colors (color_id, user_id) VALUES ('" . $_POST['color_id'] . "', '" . $_POST['user_id'] . "')");
    header("Location: index.php");
    die;
}

//DELETE
if(isset($_GET['id'])){
    $user= $connection->query("DELETE FROM users WHERE id=".$_GET['id']);
header("Location: index.php");
}

if(isset($_GET['idcolor'])){
    $user= $connection->query("DELETE FROM colors WHERE id=".$_GET['idcolor']);
header("Location: index.php");
}

if(isset($_GET['user_id'])){
    $user= $connection->query("DELETE FROM user_colors WHERE user_id=".$_GET['user_id']. ' AND color_id='.$_GET['color_id'] );
header("Location: index.php");
}


header("Location: index.php");
    die;