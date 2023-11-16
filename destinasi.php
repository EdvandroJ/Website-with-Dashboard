<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DESTINASI</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<?php include "header.php";?>

<div class="container-fluid">
<div class="card shadow mb-4">

<body>

	<?php 
	include "includes/config.php";
	if (isset($_POST['Simpan'])) {

		if (isset($_REQUEST['inputkode'])) {
			$kodedestinasi = $_REQUEST['inputkode'];
		}

		if (!empty($kodedestinasi)){
			$kodedestinasi = $_REQUEST['inputkode'];
		}
		else {
			?> <h1>Anda Harus Mengisi Data</h1> <?php 
			die("anda harus memasukan datanya");
		}

		$destinasinama = $_POST['inputnama'];
		$alamat = $_POST['inputalamat'];
		$kodekategori = $_POST['kodekategori'];
		$kodearea = $_POST['kodearea'];

			mysqli_query($connection, "insert into destinasi values ('$kodedestinasi', '$destinasinama', '$alamat', '$kodekategori', '$kodearea')");
			header("location:destinasi.php");
		}
		
		$datakategori = mysqli_query($connection, "SELECT * FROM kategori");
		$dataarea = mysqli_query($connection, "SELECT * FROM area");
	
?>

	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-10">

			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Input Destinasi</h1>
				</div>
			</div> <!-- penutup jumbotron -->

			<form method="POST">
				<div class="form-group row">
					<label for="kodedestinasi" class="col-sm-2 col-form-label">Kode Destinasi</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="kodedestinasi" name="inputkode" placeholder="kode destinasi" maxlength="4" >
	    			</div>
				</div>

				<div class="form-group row">
	    			<label for="namadestinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="namadestinasi" name="inputnama" placeholder="nama destinasi">
	   				</div>
	  			</div>

	  			<div class="form-group row">
	    			<label for="alamat" class="col-sm-2 col-form-label">Alamat Destinasi</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="alamat" name="inputalamat" placeholder="alamat destinasi">
	   				</div>
	  			</div>

	  			<div class="form-group row">
	    			<label for="kodekategori" class="col-sm-2 col-form-label">Kategori ID</label>
	    			<div class="col-sm-10">
	      			<select type="text" class="form-control" id="kodekategori" name="kodekategori">
	      				<?php while($row = mysqli_fetch_array($datakategori)) 
      					{ ?>
      	   				<option value="<?php echo $row ["kategoriID"]?>">
      	   	    			<?php echo $row["kategoriID"]?>
      		    			<?php echo $row["kategorinama"]?>

      	   				</option>
      					<?php } ?>

      					</select>
	   				</div>
	  			</div>

	  			<div class="form-group row">
	    			<label for="kodearea" class="col-sm-2 col-form-label">Area ID</label>
	    			<div class="col-sm-10">
	      			<select type="text" class="form-control" id="kodearea" name="kodearea">
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
					<input type="submit" name="Simpan" class="btn btn-primary" value="Simpan">
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
				<h1 class="display-4">Daftar Destinasi</h1>
			</div>
		</div>

	<table class="table table-hover table-danger">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>Kode Destinasi</th>
				<th>Nama Destinasi</th>
				<th>Alamat Destinasi</th>
				<th>Kategeori ID</th>
				<th>Area ID</th>
				<th colspan="2" style="text-align: center;">Action</th>
			</tr>
		</thead>

		<tbody>
			<?php $query = mysqli_query($connection, "select * from destinasi");
			$nomor = 1;
			while ($row = mysqli_fetch_array($query))
			{ ?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $row['destinasiID'];?></td>
					<td><?php echo $row['destinasinama'];?></td>
					<td><?php echo $row['destinasialamat'];?></td>
					<td><?php echo $row['kategoriID'];?></td>
					<td><?php echo $row['areaID'];?></td>

					<td>
						<a href="destianasiubah.php?ubahdestinasi=<?php echo $row['destinasiID']?>" class="btn btn-success btn-sm" title="EDIT">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
						</a>
					</td>

					<td>
						<a href="destinasihapus.php?hapusdestinasi=<?php echo $row['destinasiID']?>" class="btn btn-danger btn-sm" title="DELETE">
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
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</html>