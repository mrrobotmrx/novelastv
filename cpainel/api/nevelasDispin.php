
<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
include("../conect.php");

try {
	
	if(!$con){
		echo "Não foi possivel conectar com Banco de Dados!";
	}

$query = $con->prepare('SELECT * FROM `novelas` INNER JOIN `emissoras` ON novelas.idemissora = emissoras.id');
		$query->execute();
		$out = "[";
		while($result = $query->fetch()){
			if ($out != "[") {
				$out .= ",";
			}
			$out .= '{"ids": "'.$result["ids"].'",';
            $out .= '"nomenovela": "'.$result["nomenovela"].'",';
            $out .= '"foto": "'.$result["foto"].'",';
            $out .= '"idemissora": "'.$result["idemissora"].'",';
            $out .= '"nomeemissoras": "'.$result["nomeemissoras"].'"}';	
		}
		$out .= "]";
		echo $out;
} catch (Exception $e) {
	echo "Erro: ". $e->getMessage();
};
