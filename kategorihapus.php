<?php
     include "includes/config.php";
     if(isset($_GET['hapuskategori']))
     {
          $fotokode = $_GET['hapuskategori'];
          mysqli_query($connection, "DELETE FROM kategori
               where kategoriID = '$fotokode' ");

          echo "<script> alert('data telat dihapus');
          document.location='kategori.php'</script>";
     }

?>