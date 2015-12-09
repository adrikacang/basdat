<?php
	require_once('database.php');
	try {
		$results = $db->query('select * from sikoper.produk');
		$items = $results->fetchAll(PDO::FETCH_ASSOC);
		$transactionID = $db->query('select (MAX(id)+1) from sikoper.pembelian_produk');
	}
	catch (Exception $e) {
		echo $e->getMessage();
	}
?>


<!DOCTYPE html>

<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Pembelian Barang</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>

<body id="home">
	<?php echo "$transactionID";
		echo $POST_['AnggotaID'];
		echo "Tanggal";
	?>
	<table>
		<thead>
			<tr><td>Kode Produk</td> <td>Nama Produk</td> <td>Stock</td> <td>HargaSatuan</td> <td>Kuantitas</td> <td>Beli</td> </tr>
		</thead>
		<tbody>
			<?php
				foreach ($items as  $item) {
					echo "<tr><td>$item.kodeProduk</td><td>$item.namaProduk</td><td>$item.jmlStock</td><td>$item.harga </td> <td> <input name='kuantitas'> </td><td><button class = 'btn'>Beli</button></td></tr>";				
				}
			?>
		</tbody>
	</table>

	<form method="POST" display="hidden" class="pembelian"> 

	</form>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	<script>

		var array = [];


		$(document).ready(function(){
			$(".btn btn-default").click(function() {
				$(this).toggleClass("btn btn-success");
				$(this).prop('disabled', true);
				var baris = $this.parent();
				var anak = baris[0].children;
				barang = {
					kodeProduk : anak[0].innerHTML,
					namaProduk :  anak[1].innerHTML,
					jmlStock : anak[2].innerHTML,
					harga : anak[3].innerHTML,
					kuantitas : anak[4].innerHTML
				};
				array.push(barang); //masukin ke array buat di encode ke JSON terus kirim ke PHP
			}); //end button.click(function)
		}); //end document.ready(function)

	</script>
</body>
