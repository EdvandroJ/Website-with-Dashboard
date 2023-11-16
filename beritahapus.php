<?php
     include "includes/config.php";
     if(isset($_GET['hapusberita']))
     {
          $fotokode = $_GET['hapusberita'];
          mysqli_query($connection, "DELETE FROM berita
               where beritaID = '$fotokode' ");

          echo "<script> alert('data telat dihapus');
          document.location='berita.php'</script>";
     }

?>