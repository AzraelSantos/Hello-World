<html>

<head>
<link rel="stylesheet" href="estili.css">
</head>

<body background="fundo.jpg">
<br><br>
<h1>Modelos </h1>

<!--Invocando o servi�o $endereco = http://core-services-webapp.herokuapp.com/Model -->
<?php
	// Configura a URL do servi�os que queremos invocar
	$endereco = "core-services-webapp.herokuapp.com/Model";

	//usa a API do curl para invocar o servi�o
	$curl = curl_init($endereco);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	// servi�o executado e seu resultado foi guardado na vari�vel $curl_response
	$curl_response = curl_exec($curl);

	// decodifica a sa�da do servi�o utilizando a fun��o json_decode. 
	// O segundo par�metro da fun��o deve ser true para que a fun��o retorne um array.
	$json = json_decode($curl_response, true);
	
	// Recuperando a tag "@Ontology#Model" do resultado do servi�o.
	// Isto retorna um vetor de Dom�nios.
	$arrayOfModels = $json["@Ontology#Model"];

	//Descomente a linha abaixo para mostrar o conte�do da vari�vel $arrayOfmodels
	//print_r($arrayOfmodels);

	// Usamos o for para varrer o vetor de dom�nios.
	foreach($arrayOfModels as $model){
		// Um dominio � um array com um "@Ontology#id" e "@Ontology#label". 
		echo "<a href = 'topicos.php?id=".$model["@Ontology#id"]."'>".$model["@Ontology#id"]." - ".$model["@Ontology#label"]."</a>";
		
		
		
		echo "<br>";
	}
	?>
	</body>
	</html>