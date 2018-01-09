<?php  
	
	$xml = new DomDocument("1.0","UFT-8");

	$container = $xml->createElement("container");
	$container = $xml->appendChild($container);

	$sale = $xml->createElement("sale");
	$sale = $container->appendChild($container);

	$item = $xml->createElement("item");
	$item = $sale->appendChild($item);

	$price = $xml->createElement("price");
	$price = $sale->appendChild($sale);

	$xml->FormatOutput = true;
	$string_value = $xml->saveXML();
	$xml->save("TestXML.xml");

?>