<html>

<head>
<link rel="stylesheet" href="estili.css">
</head>

<body background="fundo.jpg">
<br><br>
<h1>Dominios </h1>

<!--Invocando o serviço $endereco = http://core-services-webapp.herokuapp.com/Domain/@id -->
<br>
<?php
	// Configura a URL do serviços que queremos invocar
	$endereco = "core-services-webapp.herokuapp.com/Domain/";

	//usa a API do curl para invocar o serviço
	$curl = curl_init($endereco);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	// serviço executado e seu resultado foi guardado na variavel $curl_response
	$curl_response = curl_exec($curl);

	// decodifica a saida do serviço utilizando a funcao json_decode. 
	// O segundo parametro da funcao deve ser true para que a funcao retorne um array.
	$json = json_decode($curl_response, true);
	
	// Recuperando a tag "@Ontology#Domain" do resultado do serviço.
	// Isto retorna um vetor de Dominios.
	//print_r($json);
	$arrayOfDomains = $json["@Ontology#Domain"];

	//Descomente a linha abaixo para mostrar o conteudo da variavel $arrayOfDomains
	
	//print_r($arrayOfDomains);
	//echo "<br>";

	// Usamos o for para varrer o vetor de dominios.
	foreach($arrayOfDomains as $domain){
		// Um dominio é um array com um "@Ontology#id" e "@Ontology#label". 
		echo "<a href = 'ModelOfDomain.php?id=".$domain["@Ontology#id"]."'>".$domain["@Ontology#id"]." - ".$domain["@Ontology#label"]."</a>";
		
		
		
		echo "<br>";
	}
	?>
	</body>
	</html>