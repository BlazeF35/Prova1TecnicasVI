<?php

include("conexao.php");

$Nome = @$_post["Nome"];
$Telefone = @$_post["Telefone"];
$Atividade = @$_post["Atividade"];
$Registro = date('Y/m/d h:m:s');
$Status = 'espera';

$sql = "insert into `Atendimento`(`id`, `Nome`, `Telefone`, `Atividade`, `Registro`, `Status`) 
            values (null,'$Nome', '$Telefone', '$Atividade', '$Registro', '$Status') ";


$query = mysqli_query($conexao, $sql);

if ($query) {
    echo "<script>alert('Cadastrado efetuado')</script>";
    header('Location: atendimento.php');
} else {
    echo "<script>alert('Cadastrado cefetuado')</script>";
    header('Location: atendimento.php');
};