<html>

<head>
<link rel="stylesheet" href="../estili.css">
</head>

<body background="../fundo.jpg">
<br><br>
<h1> Recursos </h1>

<br>
<?php
	
	$endereco = "core-services-webapp.herokuapp.com/Topic/".$_GET['id']."/resources";

	$curl = curl_init($endereco);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$curl_response = curl_exec($curl);

	
	$json = json_decode($curl_response, true);
	
	
	$arrayOfResources = $json["@Ontology#Resource"];

	//print_r($arrayOfResources);
	//echo "<br>";
	
	foreach($arrayOfResources as $resources){
		echo "<a href = '".$resources["@Ontology#link"]."'>  ".$resources["@Ontology#id"]." - ".$resources["@Ontology#label"]."</a>";
		echo "<br>";
	}
	?>
	</body>
	</html>