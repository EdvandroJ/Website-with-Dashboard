<!DOCTYPE html>

<?php 
	include "includes/config.php";
	if (isset($_POST['Simpan'])) {

		if (isset($_REQUEST['inputkode'])) {
			$kodebot = $_REQUEST['inputkode'];
		}

		if (!empty($kodebot)){
			$kodebot = $_REQUEST['inputkode'];
		}
		else {
			?> <h1>Anda Harus Mengisi Data</h1> <?php 
			die("anda harus memasukan datanya");
		}

		$botnama = $_POST['inputnama'];
		$keterangan = $_POST['inputket'];
		$photo = $_POST['file'];
		
		mysqli_query($connection, "insert into transformer values ('$kodebot', '$botnama', '$keterangan', '$photo')");
		header("location:tf.php");
		
	}

?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TRANSFORMER</title>
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
					<h1 class="display-4">Input Transformer</h1>
				</div>
			</div> <!-- penutup jumbotron -->

			<form method="POST">
				<div class="form-group row">
					<label for="kodehotel" class="col-sm-2 col-form-label">Kode</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="kodehotel" name="inputkode" placeholder="kode transformer" maxlength="4" >
	    			</div>
				</div>

				<div class="form-group row">
	    			<label for="namahotel" class="col-sm-2 col-form-label">Nama Servant</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="namahotel" name="inputnama" placeholder="nama bot">
	   				</div>
	  			</div>

	  			<div class="form-group row">
	    			<label for="kethotel" class="col-sm-2 col-form-label">Keterangan</label>
	    			<div class="col-sm-10">
	      			<input type="text" class="form-control" id="kethotel" name="inputket" placeholder="keterangan">
	   				</div>
	  			</div>

	  			<div class="form-group row">
	    			<label for="file" class="col-sm-2 col-form-label">Photo bot</label>
	    			<div class="col-sm-10">
	      			<input type="file" id="file" name="file">
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
				<h1 class="display-4">Daftar Transformer</h1>
			</div>
		</div>

	<table class="table table-hover table-danger">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>Kode Transformer</th>
				<th>Nama Transformer</th>
				<th>Keterangan Transformer</th>
				<th>Foto Transformer</th>
				<th colspan="2" style="text-align: center;">Action</th>
			</tr>
		</thead>

		<tbody>
			<?php $query = mysqli_query($connection, "select * from transformer");
			$nomor = 1;
			while ($row = mysqli_fetch_array($query))
			{ ?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $row['botID'];?></td>
					<td><?php echo $row['botnama'];?></td>
					<td><?php echo $row['botket'];?></td>
					<td>
						<?php if(is_file("images/".$row['botfoto']))
						{ ?>
							<img src="images/<?php echo $row['botfoto']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						 ?>
					</td>

					<td>
						<a href="tfubah.php?ubah=<?php echo $row['botID']?>" class="btn btn-success btn-sm" title="EDIT">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
						</a>
					</td>

					<td>
						<a href="tfhapus.php?hapus=<?php echo $row['botID']?>" class="btn btn-danger btn-sm" title="DELETE">
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