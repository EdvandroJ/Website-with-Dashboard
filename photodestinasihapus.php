<?php
	include "includes/config.php";
	if(isset($_GET['hapusfoto'])){
		$fotokode = $_GET['hapusfoto'];
		$hapusfoto = mysqli_query($connection, "SELECT * FROM fotodestinasi
			where fotoID = '$fotokode' ");
		$hapus = mysqli_fetch_array($hapusfoto);
		$namafile = $hapus['fotofile'];

		mysqli_query($connection, "DELETE FROM fotodestinasi
			where fotoID = '$fotokode' ");
		unlink('images/'.$namafile);

		echo "<script> alert('data telat dihapus');
		document.location='photodestinasi.php'</script>";
	}

?>