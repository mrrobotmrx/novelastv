<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
include("../conect.php");

try {
	
	if(!$con){
		echo "Não foi possivel conectar com Banco de Dados!";
	}		
		$query = $con->prepare('SELECT * FROM resumos ORDER BY id DESC LIMIT 10');
	
		$query->execute();
		$out = "[";
		while($result = $query->fetch()){
			if ($out != "[") {
				$out .= ",";
			}
			$out .= '{"id": "'.$result["id"].'",';
			$out .= '"titulo": "'.$result["titulo"].'",';
			$out .= '"urlfoto": "'.$result["urlfoto"].'"}';
		}
		$out .= "]";
		echo $out;
} catch (Exception $e) {
	echo "Erro: ". $e->getMessage();
};
