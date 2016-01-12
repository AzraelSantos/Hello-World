<html>

<head>
<link rel="stylesheet" href="estili.css">
</head>

<body background="fundo.jpg">
<br><br>
<h1>Modelos </h1>

<!--Invocando o serviço $endereco = http://core-services-webapp.herokuapp.com/Model -->
<?php
	// Configura a URL do serviços que queremos invocar
	$endereco = "core-services-webapp.herokuapp.com/Model";

	//usa a API do curl para invocar o serviço
	$curl = curl_init($endereco);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	// serviço executado e seu resultado foi guardado na variável $curl_response
	$curl_response = curl_exec($curl);

	// decodifica a saída do serviço utilizando a função json_decode. 
	// O segundo parâmetro da função deve ser true para que a função retorne um array.
	$json = json_decode($curl_response, true);
	
	// Recuperando a tag "@Ontology#Model" do resultado do serviço.
	// Isto retorna um vetor de Domínios.
	$arrayOfModels = $json["@Ontology#Model"];

	//Descomente a linha abaixo para mostrar o conteúdo da variável $arrayOfmodels
	//print_r($arrayOfmodels);

	// Usamos o for para varrer o vetor de domínios.
	foreach($arrayOfModels as $model){
		// Um dominio é um array com um "@Ontology#id" e "@Ontology#label". 
		echo "<a href = 'topicos.php?id=".$model["@Ontology#id"]."'>".$model["@Ontology#id"]." - ".$model["@Ontology#label"]."</a>";
		
		
		
		echo "<br>";
	}
	?>
	</body>
	</html>