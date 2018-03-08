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
    if(isset($_POST["cadastrarresumo"])){

        $titulo = $_POST["titulo"];
        $foto = $_POST["foto"];
        $conteudo = $_POST["conteudo"];
        $novelas = $_POST["novelas"];
        $emissoras = $_POST["emissoras"];

        $stmt = $con->prepare('INSERT INTO `resumos`(`titulo`, `urlfoto`, `resumo`, `idnovela`, `idemissora`) VALUES (:titulo, :foto, :conteudo, :novelas, :emissoras)');
        $stmt->execute(array(
            ':titulo' => $titulo,
            ':foto' => $foto,
            ':conteudo' => $conteudo,
            ':novelas' => $novelas,
            ':emissoras' => $emissoras
        ));
   
        echo "<div class='certo'>Cadastrado com Sucesso</div>"; 
         }
    ?>

    <form id="ssargsdrg" method="post">

        <input placeholder="Título" id="titulo" name="titulo" class="efsr4d" type="text" />

        <input type="text" name="foto" placeholder="URL da Foto" id="foto">

        <textarea placeholder="Conteudo" name="conteudo" id="cont" cols="30" rows="10"></textarea>

        <select name="novelas" id="categ">

        
        <?php
            $query = $con->prepare('SELECT * FROM novelas ORDER BY id DESC');

            $query->execute();

		while($result = $query->fetch()){ 

            ?>

            <option value="<?php echo $result['id']; ?>"><?php echo $result["nomenovela"]; ?></option>


        <?php
        } 

        ?>

        </select>

        <select name="emissoras" id="categ">

        
        <?php
            $query = $con->prepare('SELECT * FROM emissoras ORDER BY id DESC');

            $query->execute();

		while($result = $query->fetch()){ 

            ?>

            <option value="<?php echo $result['id']; ?>"><?php echo $result["nomeemissoras"]; ?></option>


        <?php
        } 

        ?>

        </select>

        <?php

            } catch (Exception $e) {
                echo "Erro: ". $e->getMessage();
            };
        ?>

        <button name="cadastrarresumo">Cadastrar</button>

    </form>

    <div id="sefsrg">
        <p>Adicionar Resumos</p>
        <a href="add-noticias.php">Adicionar Notícias</a> |
        <a href="add-novela.php">Adicionar Novela</a> |
        <a href="geren-resumos.php">Gerenciar Resumos</a> |
        <a href="geren-noticias.php">Gerenciar Notícias</a> |
    </div>    

</body>
</html>