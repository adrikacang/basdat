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

	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>

<body id="home">

	<script>

		$(document).ready(function(){
			var array = [];
			alert("tes")
			barang = {
				kodeProduk : "123",
				namaProduk :  "durex",
				jmlStock : "100",
				harga : "5000",
				kuantitas : "10"
			};
			barang2 = {
				kodeProduk : "321",
				namaProduk :  "fiesta",
				jmlStock : "10",
				harga : "500",
				kuantitas : "1"
			};
			array.push(barang); //masukin ke array buat di encode ke JSON terus kirim ke PHP
			array.push(barang2);
			var x  = JSON.stringify(array);
			sessionStorage.setItem('jsondata',x);
			var y = sessionStorage.getItem('jsondata');
			alert(y);
			$.ajax({
				url:'insertpembelian.php',
				type:'POST',
				data:{jsondata:x, action:'barang'},
				success: function(status) {
					alert(status);
				},
				error: function(xhr, desc, err) {
					alert(err);
				}
			}); // end ajax
			alert("hem");
		}); //end document.ready(function)

	</script>
</body>
