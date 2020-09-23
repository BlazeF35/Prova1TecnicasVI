<?php

include("conexao.php");
$id = $_post["id"];
$btn = $_pst["btn"];

if ($btn == "atender") {
    $now = date('Y/m/d h:m:s');
    $sql = "update Atendimento set  Status = 'Atendido', Atendimento = '$now'  where id = '$id'";
    $query = mysqli_query($conexao, $sql);

    if ($query) {
        echo "<script>alert('Atendido com sucesso')</script>";
        header('Location: atendimento.php');
    } else {
        echo "<script>alert('erro ao ser atendido')</script>";
        header('Location: atendimento.php');
    }
} else if ($btn == 'cancelar') {
    $sql = "update Atendimento set  Status = 'cancelado'  where id = '$id'";
    $query = mysqli_query($conexao, $sql);

    if ($query) {
        echo "<script>alert('Atendido com sucesso')</script>";
        header('Location: atendimento.php');
    } else {
        echo "<script>alert('erro ao ser atendido')</script>";
        header('Location: atendimento.php');
    }
}