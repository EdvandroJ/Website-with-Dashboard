<?php
     include "includes/config.php";
     if(isset($_GET['hapusarea']))
     {
          $fotokode = $_GET['hapusarea'];
          mysqli_query($connection, "DELETE FROM area
               where areaID = '$fotokode' ");

          echo "<script> alert('data telat dihapus');
          document.location='area.php'</script>";
     }

?>