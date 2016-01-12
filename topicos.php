<html>
<head>
<link rel="stylesheet" href="estili.css">
</head>
	
	<?php
		$legiao = array();
		$array = array();
		$label = array();
		
		session_start();
		
		function printFilhos($idPai){
			$label = $_SESSION["label"];
			$legiao = $_SESSION["legiao"];
			echo "<a href=RecurseOfTopics.php/?id=" . $idPai . ">" . $idPai. " - " . $label[$idPai] . "</a><br>";
			
			echo "<hr>";
			if(array_key_exists($idPai, $legiao)){
			$array = $legiao[$idPai];
			
			foreach($array as $value){
				echo "<blockquote>";
				printFilhos($value);
			}
			}
			echo "</blockquote>";
		}
	?>
	
<body background="fundo.jpg" >
<br><br>
<h1> Tópicos </h1>
	<?php
		
		$endereco = "core-services-webapp.herokuapp.com/Model/" . $_GET["id"] . "/hierarchy";

		$curl = curl_init($endereco);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$curl_response = curl_exec($curl);
			
		$json = json_decode($curl_response, true);
		$array = $json["@Ontology#Topic"]; 
		
		$root;
		
		foreach($array as $value){
			if(!array_key_exists($value["@Ontology#parent"], $legiao)){
				$legiao[$value["@Ontology#parent"]] = array();
			}
			
			array_push($legiao[$value["@Ontology#parent"]], $value["@Ontology#id"]);
			
			if($value["@Ontology#parent"] == ""){
				$root = $value["@Ontology#id"];
			}
			
			$label[$value["@Ontology#id"]] = $value["@Ontology#label"];
		}
		$_SESSION["label"] = $label;
		$_SESSION["legiao"] = $legiao;
		printFilhos($root);
		?>
	
	</body>
		</html>