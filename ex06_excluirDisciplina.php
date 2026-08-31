<?php 
    $sigla = "";
    $msg = "";
    $novoArquivo = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_POST["sigla"])) {
        $sigla = $_POST["sigla"];

        $arqDisc = fopen("disciplinas.txt", "r") or die("erro ao abrir o arquivo");

        while(!feof($arqDisc)) {
            $linha = fgets($arqDisc);
            $colunaDados = explode(";", $linha);

            if($colunaDados[1] == $sigla) {

            } else {
                $novoArquivo = $novoArquivo . $linha;   
            }
        }

        fclose($arqDisc);

        $arqDisc = fopen("disciplinas.txt", "w") or die("erro ao abrir o arquivo");
        fwrite($arqDisc, $novoArquivo);
        fclose($arqDisc);

        $msg = "Deu tudo certo!!!";
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Disciplina</title>
</head>
<body>
    <h1>Excluir disciplina</h1>

    <form action="ex06_excluirDisciplina.php" method="POST">
        Digite a sigla da disciplina que voce quer excluir: <input type="text" name="sigla"><br><br>
        <input type="submit" value="Excluir Disciplina">
    </form>

    <?php echo $msg ?>
</body>
</html>
