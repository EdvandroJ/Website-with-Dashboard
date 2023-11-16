<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KABUPATEN</title>
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
			$kodekabupaten = $_REQUEST['inputkode'];
		}

		if (!empty($kodekabupaten)){
			$kodekabupaten = $_REQUEST['inputkode'];
		}
		else {
			?> <h1>Anda Harus Mengisi Data</h1> <?php 
			die("anda harus memasukan datanya");
		}

		$kabupatennama = $_POST['inputnama'];
		$alamat = $_POST['inputalamat'];
		$keterangan = $_POST['inputket'];
		$ketfoto = $_POST['inputfotoic'];
		$photo = $_POST['file'];

			mysqli_query($connection, "insert into kabupaten values ('$kodekabupaten', '$kabupatennama', '$alamat', '$keterangan', '$ketfoto', '$photo')");
			header("location:kabupaten.php");
		}

	
?>

	<div class="row">
		<div class="col-sm-1">
		</div>
		<div class="col-sm-10">

			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Input Kabupaten</h1>
				</div>
			</div> <!-- penutup jumbotron -->

			<form method="POST">
				<div class="form-group row">
					<label for="kodekabupaten" class="col-sm-2 col-form-label">Kode Kabupaten</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="kodekabupaten" name="inputkode" placeholder="kode kabupaten" maxlength="4" >
	    			</div>
				</div>

				<div class="form-group row">
	    			<label for="namakabupaten" class="col-sm-2 col-form-label">Nama Kabupaten</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="namakabupaten" name="inputnama" placeholder="nama kabupaten">
	   				</div>
	  			</div>

	  			<div class="form-group row">
	    			<label for="alamat" class="col-sm-2 col-form-label">Alamat Kabupaten</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="alamat" name="inputalamat" placeholder="alamat kabupaten">
	   				</div>
	  			</div>

	  			<div class="form-group row">
	    			<label for="ketkabupaten" class="col-sm-2 col-form-label">Keterangan</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="ketkabupaten" name="inputket" placeholder="keterangan">
	   				</div>
	  			</div>

	  			<div class="form-group row">
	    			<label for="fotoicon" class="col-sm-2 col-form-label">Keterangan Foto</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="fotoicon" name="inputfotoic" placeholder="keterangan foto">
	   				</div>
	  			</div>

	  			<div class="form-group row">
	    			<label for="file" class="col-sm-2 col-form-label">Photo Kabupaten</label>
	    			<div class="col-sm-10">
	      			<input type="file" id="file" name="file" accept="image/jpeg, image/webp, image/png" onchange="loadFile(event)">
	      			<p class="help-block">Field ini digunakan untuk unggah file</p>
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
				<h1 class="display-4">Daftar Kabupaten</h1>
			</div>
		</div>

	<table class="table table-hover table-danger">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>Kode Kabupaten</th>
				<th>Nama Kabupaten</th>
				<th>Alamat Kabupaten</th>
				<th>Keterangan Kabupaten</th>
				<th>Keterangan Foto Kabupaten</th>
				<th>Foto Kabupaten</th>
				<th colspan="2" style="text-align: center;">Action</th>
			</tr>
		</thead>

		<tbody>
			<?php $query = mysqli_query($connection, "select * from kabupaten");
			$nomor = 1;
			while ($row = mysqli_fetch_array($query))
			{ ?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $row['kabupatenKODE'];?></td>
					<td><?php echo $row['kabupatenNAMA'];?></td>
					<td><?php echo $row['kabupatenALAMAT'];?></td>
					<td><?php echo $row['kabupatenKET'];?></td>
					<td><?php echo $row['kabupatenFOTOICON'];?></td>
					<td>
						<?php if(is_file("images/".$row['kabupatenFOTOICONKET']))
						{ ?>
							<img src="images/<?php echo $row['kabupatenFOTOICONKET']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						 ?>
					</td>

					<td>
						<a href="kabupatenubah.php?ubahkabupaten=<?php echo $row['kabupatenKODE']?>" class="btn btn-success btn-sm" title="EDIT">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
						</a>
					</td>

					<td>
						<a href="kabupatenhapus.php?hapuskabupaten=<?php echo $row['kabupatenKODE']?>" class="btn btn-danger btn-sm" title="DELETE">
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