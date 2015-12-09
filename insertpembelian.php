<?
	require('database.php');
	
	try {
		$results = $db->query('select * from sikoper.produk');
		$items = $results->fetchAll(PDO::FETCH_ASSOC);
		$transactionID = $db->query('select (MAX(id)+1) from sikoper.pembelian_produk');
	}
	catch (Exception $e) {
		echo $e->getMessage();
	}


	if(isset($_POST["jsondata"])) {
	 	$array = json_decode($_POST['jsondata']);
	 	//var_dump($array);
	 	foreach ($array as $items ) {
	 		try {
	 			$db->query("INSERT INTO(bla,bla,bla) VALUE(asd,asd,asd,asd)");
	 		}
	 		catch (Exception $e) {
	 			echo $e->getMessage();
	 		}
	 	}
	}
	else {
		echo "kosong";
	}
?>