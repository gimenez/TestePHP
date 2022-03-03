<?php 
    require 'connection.php';
    $connection = new Connection();
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
