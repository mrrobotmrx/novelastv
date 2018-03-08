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
         if(isset($_POST["cadasttitulo"])){

            $titulo = $_POST["titulo"];
            $emissoras = $_POST["emissoras"];
            $foto = $_POST["foto"];

            $stmt = $con->prepare('INSERT INTO `novelas`(`nomenovela`, `foto`, `idemissora`) VALUES (:titulo, :foto, :emissoras)');
            $stmt->execute(array(
                ':titulo' => $titulo,
                ':emissoras' => $emissoras,
                ':foto' => $foto
              ));
   
            echo "<div class='certo'>Cadastrado com Sucesso</div>"; 
         }
    ?>

    <form id="ssargsdrg" method="post">

    <input placeholder="Título da Novela" id="titulo" name="titulo" class="efsr4d" type="text" />
    <input placeholder="Foto da Novela" id="titulo" name="foto" class="efsr4d" type="text" />

        <select name="emissoras" id="categ">

        
        <?php
            $query = $con->prepare('SELECT * FROM emissoras ORDER BY id DESC LIMIT 10');

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

        <button name="cadasttitulo">Cadastrar</button>


    </form>

    <div id="sefsrg">
        <p>Adicionar Novela</p>
        <a href="add-resumos.php">Adicionar Resumos</a> |
        <a href="add-noticias.php">Adicionar Notícias</a> |
        <a href="geren-resumos.php">Gerenciar Resumos</a> |
        <a href="geren-noticias.php">Gerenciar Notícias</a> |
    </div>

</body>
</html>