<!DOCTYPE html>

<?php 
	include "includes/config.php";
	if (isset($_POST['Edit'])) {

		if (isset($_REQUEST['inputkode'])) {
			$kodearea = $_REQUEST['inputkode'];
		}

		if (!empty($kodearea)){
			$kodearea = $_REQUEST['inputkode'];
		}
		else {
			?> <h1>Anda Harus Mengisi Data</h1> <?php 
			die("anda harus memasukan datanya");
		}

		$areanama = $_POST['inputnama'];
		$wilayah = $_POST['inputwilayah'];
		$keterangan = $_POST['inputket'];
		$kodekabupaten = $_POST['kodekabupaten'];

		mysqli_query($connection, "UPDATE area set areaID = '$kodearea',areanama = '$areanama',areawilayah = '$wilayah',areaketerangan = '$keterangan',kabupatenKODE = '$kodekabupaten'
			where areaID = '$kodearea'");
		header("location:area.PHP");

	}

	$datakabupaten = mysqli_query($connection, "SELECT * FROM kabupaten");

	//
	$areakode = $_GET["ubaharea"];
	$editarea = mysqli_query($connection, "select * from area
		where areaID = '$areakode'");
	$rowedit = mysqli_fetch_array($editarea);

	$editkabupaten = mysqli_query($connection, "select * from kabupaten");
	$rowedit2 = mysqli_fetch_array($editkabupaten);

?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AREA</title>
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
					<h1 class="display-4">Input Area</h1>
				</div>
			</div> <!-- penutup jumbotron -->

			<form method="POST">
				<div class="form-group row">
					<label for="kodearea" class="col-sm-2 col-form-label">Kode Area</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="kodearea" name="inputkode" value="<?php echo $rowedit["areaID"]?>" >
	    			</div>
				</div>

				<div class="form-group row">
	    			<label for="namaarea" class="col-sm-2 col-form-label">Nama Area</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="namaarea" name="inputnama" value="<?php echo $rowedit["areanama"]?>">
	   				</div>
	  			</div>

	  			<div class="form-group row">
	    			<label for="wilayah" class="col-sm-2 col-form-label">Wilayah Area</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="wilayah" name="inputwilayah" value="<?php echo $rowedit["areawilayah"]?>">
	   				</div>
	  			</div>

	  			<div class="form-group row">
	    			<label for="areaket" class="col-sm-2 col-form-label">Keterangan</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="areaket" name="inputket" value="<?php echo $rowedit["areaketerangan"]?>">
	   				</div>
	  			</div>

	  			<div class="form-group row">
	    			<label for="refkabupaten" class="col-sm-2 col-form-label">Kode Kabupaten</label>
	    			<div class="col-sm-10">
	      			<select type="text" class="form-control" id="kodekabupaten" name="kodekabupaten" value="<?php echo $rowedit2["kabupatenKODE"]?>">
	      				<?php while($row = mysqli_fetch_array($datakabupaten)) 
      					{ ?>
      	   				<option value="<?php echo $row ["kabupatenKODE"]?>">
      	   	    			<?php echo $row["kabupatenKODE"]?>
      		    			<?php echo $row["kabupatenNAMA"]?>

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
				<h1 class="display-4">Daftar Area</h1>
			</div>
		</div>

	<table class="table table-hover table-danger">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>Kode Area</th>
				<th>Nama Area</th>
				<th>Alamat Area</th>
				<th>Keterangan Area</th>
				<th>Kode Kabupaten</th>
				<th colspan="2" style="text-align: center;">Action</th>
			</tr>
		</thead>

		<tbody>
			<?php $query = mysqli_query($connection, "select * from area");
			$nomor = 1;
			while ($row = mysqli_fetch_array($query))
			{ ?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $row['areaID'];?></td>
					<td><?php echo $row['areanama'];?></td>
					<td><?php echo $row['areawilayah'];?></td>
					<td><?php echo $row['areaketerangan'];?></td>
					<td><?php echo $row['kabupatenKODE'] ?></td>

					<td>
						<a href="areaubah.php?ubaharea=<?php echo $row['areaID']?>" class="btn btn-success btn-sm" title="EDIT">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
						</a>
					</td>

					<td>
						<a href="areahapus.php?hapusarea=<?php echo $row['areaID']?>" class="btn btn-danger btn-sm" title="DELETE">
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