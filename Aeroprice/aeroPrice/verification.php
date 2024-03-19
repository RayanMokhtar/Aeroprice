<?php
	$search = "";
	if (isset($_GET['gare-depart']) && !empty($_GET['gare-depart'])) {
		$search = $_GET['gare-depart'];
	}

	$tab = array();
	if (($handle = fopen("reseau.csv", "r")) !== FALSE) {
    	while (($data = fgetcsv($handle, 1000, ":")) !== FALSE) { // line by line
	        if ($data[0] === $search) {
    	    	$tab[] = $data['1'];
    	    }
    	    if ($data[1] === $search) {
    	    	$tab[] = $data['0'];    	    
    	    }
    	}
    }
    fclose($handle);

	header("Content-type: application/json");
	$response = json_encode($tab);
	echo $response.PHP_EOL;
?>









