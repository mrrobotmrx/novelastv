<!DOCTYPE html>
<html>
<head>

<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
include("conect.php");
try {
	$con = new PDO($dns, $user, $pass);

?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <script src="main.js"></script>
</head>
<body>


<div id="sefsrg">
        <p>Gerenciar Resumos</p>
        <a href="add-noticias.php">Adicionar Notícias</a> |
        <a href="add-novela.php">Adicionar Novela</a> |
        <a href="add-resumos.php">Adicionar Resumos</a> |
        <a href="geren-noticias.php">Gerenciar Notícias</a> |
    </div>  
    

    <?php 

        if(isset($_GET["id"])){
            $id = $_GET["id"];

            $stmt = $con->prepare('DELETE FROM resumos WHERE id = :id');
            $stmt->bindParam(':id', $id); 
            $stmt->execute();
     
            echo "<div style='margin-top:10px;' class='certo'>Resumo Excluido com Sucesso</div>"; 
        }

        $query = $con->prepare('SELECT * FROM resumos ORDER BY id DESC LIMIT 100');
        $query->execute();
		while($result = $query->fetch()){
    ?>

    <div class="aewf4">
        <div class="fotoresnot">
            <img src="<?php echo $result["urlfoto"]; ?>" class="srgrgerg44">
        </div>
        <div class="tituloresu">
        <p><?php echo $result["titulo"]; ?></p>
        <span><?php echo substr($result["resumo"], 0, 150); ?></span>
        </div>

        <div class="butt">
            <a name="excluir" href="?id=<?php echo $result["id"]; ?>">Excluir</a>
        </div>
    </div>

    <?php 
        }
        } catch (Exception $e) {
            echo "Erro: ". $e->getMessage();
        };
    ?>
</body>
</html>