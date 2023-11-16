<?php
     include "includes/config.php";
     if(isset($_GET['hapusdestinasi']))
     {
          $fotokode = $_GET['hapusdestinasi'];
          mysqli_query($connection, "DELETE FROM destinasi
               where destinasiID = '$fotokode' ");

          echo "<script> alert('data telat dihapus');
          document.location='destinasi.php'</script>";
     }

?>