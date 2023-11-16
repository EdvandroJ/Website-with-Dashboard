<!DOCTYPE html>

<?php 
	include "includes/config.php";
	if (isset($_POST['Edit'])) {

		if (isset($_REQUEST['inputkode'])) {
			$kodehotel = $_REQUEST['inputkode'];
		}

		if (!empty($kodehotel)){
			$kodehotel = $_REQUEST['inputkode'];
		}
		else {
			?> <h1>Anda Harus Mengisi Data</h1> <?php 
			die("anda harus memasukan datanya");
		}

		$hotelnama = $_POST['inputnama'];
		$alamat = $_POST['inputalamat'];
		$keterangan = $_POST['inputket'];
		$photo = $_POST['file'];
		$kodearea = $_POST['kodearea'];

		mysqli_query($connection, "UPDATE hotel set hotelID = '$kodehotel',hotelnama = '$hotelnama',hotelalamat = '$alamat',hotelketerangan = '$keterangan',hotelfoto = '$photo',areaID = '$kodearea'
			where hotelID = '$kodehotel'");
		header("location:hotel.PHP");
		
	}

	$dataarea = mysqli_query($connection, "SELECT * FROM area");

	//
	$hotelkode = $_GET["ubahfoto"];
	$edithotel = mysqli_query($connection, "select * from hotel
		where hotelID = '$hotelkode'");
	$rowedit = mysqli_fetch_array($edithotel);

	$editarea = mysqli_query($connection, "select * from area");
	$rowedit2 = mysqli_fetch_array($editarea);

?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOTEL</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<?php include "header.php";?>

<div class="container-fluid">
<div class="card shadow mb-4">

<body>

	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-10">

			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Input Hotel</h1>
				</div>
			</div> <!-- penutup jumbotron -->

			<form method="POST">
				<div class="form-group row">
					<label for="kodehotel" class="col-sm-2 col-form-label">Kode Hotel</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="kodehotel" name="inputkode" value="<?php echo $rowedit["hotelID"]?>" maxlength="4" >
	    			</div>
				</div>

				<div class="form-group row">
	    			<label for="namahotel" class="col-sm-2 col-form-label">Nama Hotel</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="namahotel" name="inputnama" value="<?php echo $rowedit["hotelnama"]?>">
	   				</div>
	  			</div>

	  			<div class="form-group row">
	    			<label for="alamat" class="col-sm-2 col-form-label">Alamat Hotel</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="alamat" name="inputalamat" value="<?php echo $rowedit["hotelalamat"]?>">
	   				</div>
	  			</div>

	  			<div class="form-group row">
	    			<label for="kethotel" class="col-sm-2 col-form-label">Keterangan</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="kethotel" name="inputket" value="<?php echo $rowedit["hotelketerangan"]?>">
	   				</div>
	  			</div>

	  			<div class="form-group row">
	    			<label for="file" class="col-sm-2 col-form-label">Photo Hotel</label>
	    			<div class="col-sm-10">
	      			<input type="file" id="file" name="file" value="<?php echo $rowedit["hotelfoto"]?>">
	      			<p class="help-block">Field ini digunakan untuk unggah file</p>
	   				</div>
	  			</div>

	  			<div class="form-group row">
	    			<label for="kodearea" class="col-sm-2 col-form-label">Area ID</label>
	    			<div class="col-sm-10">
	      			<select type="text" class="form-control" id="kodearea" name="kodearea" value="<?php echo $rowedit2["areaID"]?>">
	      				<?php while($row = mysqli_fetch_array($dataarea)) 
      					{ ?>
      	   				<option value="<?php echo $row ["areaID"]?>">
      	   	    			<?php echo $row["areaID"]?>
      		    			<?php echo $row["areanama"]?>

      	   				</option>
      					<?php } ?>

      					</select>
	   				</div>
	  			</div>

	  			<div class="form-group row">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
					<input type="submit" name="Edit" class="btn btn-primary" value="Edit">
					<input type="submit" name="Batal" class="btn btn-secondary" value="Batal">

					</div>
		
				</div>

			</form>
		</div>
		<div class="col-sm-1">
		</div>
	</div>

	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">Daftar Hotel</h1>
			</div>
		</div>

	<table class="table table-hover table-danger">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>Kode Hotel</th>
				<th>Nama Hotel</th>
				<th>Alamat Hotel</th>
				<th>Keterangan Hotel</th>
				<th>Foto Hotel</th>
				<th>Kode Area</th>
				<th colspan="2" style="text-align: center;">Action</th>
			</tr>
		</thead>

		<tbody>
			<?php $query = mysqli_query($connection, "select * from hotel");
			$nomor = 1;
			while ($row = mysqli_fetch_array($query))
			{ ?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $row['hotelID'];?></td>
					<td><?php echo $row['hotelnama'];?></td>
					<td><?php echo $row['hotelalamat'];?></td>
					<td><?php echo $row['hotelketerangan'];?></td>
					<td>
						<?php if(is_file("images/".$row['hotelfoto']))
						{ ?>
							<img src="images/<?php echo $row['hotelfoto']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						 ?>
					</td>
					<td><?php echo $row['areaID'] ?></td>

					<td>
						<a href="hotelubah.php?ubahhotel=<?php echo $row['hotelID']?>" class="btn btn-success btn-sm" title="EDIT">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
						</a>
					</td>

					<td>
						<a href="hotelhapus.php?hapushotel=<?php echo $row['hotelID']?>" class="btn btn-danger btn-sm" title="DELETE">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
						</a>
					</td>

				</tr>
				<?php $nomor = $nomor + 1;?>
			<?php } ?>
		</tbody>
		
	</table>
		</div>
		<div class="col-sm-1"></div>
	</div>

</body>
</div>
</div>
<?php include "footer.php";?>
</html>