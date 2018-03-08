<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
include("../conect.php");

try {
	if(!$con){
		echo "Não foi possivel conectar com Banco de Dados!";
	}		
		$query = $con->prepare('SELECT * FROM noticias ORDER BY id DESC LIMIT 5');
	
		$query->execute();
		$out = "[";
		while($result = $query->fetch()){
			if ($out != "[") {
				$out .= ",";
			}
			$out .= '{"id": "'.$result["id"].'",';
			$out .= '"titulo": "'.$result["titulo"].'",';
            $out .= '"foto": "'.$result["foto"].'",';
			$out .= '"conteudo": "'.$result["conteudo"].'",';
			$out .= '"resumo": "'.$result["resumo"].'"}';
		}
		$out .= "]";
		echo $out;
} catch (Exception $e) {
	echo "Erro: ". $e->getMessage();
};
