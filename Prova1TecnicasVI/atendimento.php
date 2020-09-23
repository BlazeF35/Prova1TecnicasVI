<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <title>Cadastro de Clientes</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>

  <body>
    <?php include_once("direction.php"); ?>

    <div width=60% align=center>

      <form class="agencia" method="post" action="consultaAtendimento.php" align=left>
        
        <h1>Bem vindo ao cadastro de Clientes</h1>

        <input type="hidden">

        <div class="field">
          <label for="Nome">Nome do Cliente:</label>
          <input type="text" name="Nome" placeholder="Nome do Cliente*" required>
        </div>

        <div class="field">
          <label for="Telefone">Telefone:</label>
          <input type="number" name="Telefone" placeholder="Digite o numero do Telefone*" required>
        </div>

        <div class="field">
            <select id="Atividade" name="Atividade">
            <option value=" ">   </option>
            <option value="SegundaVia">Segunda Via de Conta</option>
            <option value="Mudanca">Mudança de Endereço</option>
            <option value="Suspensao">Suspensão do Serviço</option>
            <option value="Negociacao">Negociação de Débitos</option>
        </select>
        </div>

        <input type="submit" class="botao">   Clique para enviar o cadastro   </input>

      </form>

  <br><br><br><br><br>
        
        <h1>Listagem de atendimentos</h1> <br>
        <table border=4 width=95% align=center>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Telefone</td>
                <td>Atividade</td>
                <td>Registro</td>
                <td>Atendimento</td>
                <td>Status</td>
                <td>Ações</td>
            </tr>
            <?php
            
            include("conexao.php");

            $query = mysqli_query($conexao, "select * from atendimentos");

            while ($result = mysqli_fetch_array($query)) {

            ?>

                <div>
                    <form action="alterar.php" method="post">
                        <?= "<input type='hidden' name='id' value='" . $result['id'] . "'>"; ?>
                        <tr>
                            <td><?= $result["id"]; ?></td>
                            <td><?= $result["Nome"]; ?></td>
                            <td><?= $result["Telefone"]; ?></td>
                            <td><?= $result["Atividade"]; ?></td>
                            <td> 
                              <?php if ($result["Registro"] != '') echo (new DateTime($result["Registro"]))->format('d/m/Y H:i:s'); ?></td>
                            <td>
                              <?php if ($result["Atendimento"] != '') echo (new DateTime($result["Atendimento"]))->format('d/m/Y H:i:s'); ?>
                            </td>
                            <td><?= $result["Status"]; ?></td>
                            <td>
                                <?php
                                if ($result["Status"] == "em espera") {
                                    echo "<input type='submit' name='btn' value='atender' class='botao'>Atender</input>";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($result["Status"] == "em espera") {
                                    echo "<input type='submit' name='btn' value='cancelar' class='botao'>Cancelar</input>";
                                }
                                ?>
                            </td>
                        </tr>
                    </form>
                </div>
            <?php } ?>

        </table>

    </div>




</body>

</html>