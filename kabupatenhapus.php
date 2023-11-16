<?php
     include "includes/config.php";
     if(isset($_GET['hapuskabupaten'])){
          $fotokode = $_GET['hapuskabupaten'];
          $hapusfoto = mysqli_query($connection, "SELECT * FROM kabupaten
               where kabupatenKODE = '$fotokode' ");
          $hapus = mysqli_fetch_array($hapusfoto);
          $namafile = $hapus['kabupatenFOTOICONKET'];

          mysqli_query($connection, "DELETE FROM kabupaten
               where kabupatenKODE = '$fotokode' ");
          unlink('images/'.$namafile);

          echo "<script> alert('data telat dihapus');
          document.location='kabupaten.php'</script>";
     }

?>