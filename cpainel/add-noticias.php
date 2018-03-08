<!DOCTYPE html>
<html>
<head>

<?php 
 
 include("conect.php");
try{

?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <script src="main.js"></script>
</head>
<body>

<?php
    if(isset($_POST["cadastrarnoticias"])){

        $titulo = $_POST["titulo"];
        $foto = $_POST["foto"];
        $conteudo = $_POST["conteudo"];

        $stmt = $con->prepare('INSERT INTO `noticias`(`titulo`, `foto`, `conteudo`) VALUES (:titulo, :foto, :conteudo)');
        $stmt->execute(array(
            ':titulo' => $titulo,
            ':foto' => $foto,
            ':conteudo' => $conteudo
        ));
   
        echo "<div class='certo'>Cadastrado com Sucesso</div>"; 
         }
    ?>
    <form id="ssargsdrg" method="post">

        <input placeholder="Título" id="titulo" name="titulo" class="efsr4d" type="text" />

        <input type="text" name="foto" placeholder="URL da Foto" id="foto">

        <textarea placeholder="Conteudo" name="conteudo" id="cont" cols="30" rows="10"></textarea>

        <?php

            } catch (Exception $e) {
                echo "Erro: ". $e->getMessage();
            };
        ?>

        <button name="cadastrarnoticias">Cadastrar</button>

    </form>

    <div id="sefsrg">
        <p>Adicionar Notícias</p>
        <a href="add-resumos.php">Adicionar Resumos</a> |
        <a href="add-novela.php">Adicionar Novela</a> |
        <a href="geren-resumos.php">Gerenciar Resumos</a> |
        <a href="geren-noticias.php">Gerenciar Notícias</a> |
    </div>

</body>
</html>