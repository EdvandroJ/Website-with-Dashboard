<?php
     include "includes/config.php";
     if(isset($_GET['hapushotel'])){
          $fotokode = $_GET['hapushotel'];
          $hapusfoto = mysqli_query($connection, "SELECT * FROM hotel
               where hotelID = '$fotokode' ");
          $hapus = mysqli_fetch_array($hapusfoto);
          $namafile = $hapus['hotelfoto'];

          mysqli_query($connection, "DELETE FROM hotel
               where hotelID = '$fotokode' ");
          unlink('images/'.$namafile);

          echo "<script> alert('data telat dihapus');
          document.location='hotel.php'</script>";
     }

?>