<!DOCTYPE html>

<?php
  include "includes/config.php";
  $query = mysqli_query($connection, "SELECT * FROM area");
  $querys = mysqli_query($connection, "SELECT * FROM kabupaten");
  $query2 = mysqli_query($connection, "SELECT * FROM hotel");
  $query3 = mysqli_query($connection, "SELECT * FROM berita");

  $hotel = mysqli_query($connection, "SELECT * FROM hotel");

  $sql = mysqli_query($connection, "SELECT * FROM destinasi");
  $jumlah = mysqli_num_rows($sql);

  $sqls = mysqli_query($connection, "SELECT * FROM hotel");
  $jumlahh = mysqli_num_rows($sqls);

  $sql2 = mysqli_query($connection, "SELECT * FROM berita");
  $jumlah2 = mysqli_num_rows($sql2);

  $foto = mysqli_query($connection, "SELECT * FROM hotel");

?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>UAS WEBDEV</title>
</head>
<body>

  <!-- membuat menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Area
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        <?php if(mysqli_num_rows($query) > 0) {
          while ($row = mysqli_fetch_array($query))
          { ?>
            <a class="dropdown-item" href="#"><?php echo $row["areanama"] ?></a>
        <?php } } ?>          

        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kabupaten
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        <?php if(mysqli_num_rows($querys) > 0) {
          while ($row = mysqli_fetch_array($querys))
          { ?>
            <a class="dropdown-item" href="#"><?php echo $row["kabupatenNAMA"] ?></a>
        <?php } } ?>          

        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Hotel
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        <?php if(mysqli_num_rows($query2) > 0) {
          while ($row = mysqli_fetch_array($query2))
          { ?>
            <a class="dropdown-item" href="#"><?php echo $row["hotelnama"] ?></a>
        <?php } } ?>          

        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Berita
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        <?php if(mysqli_num_rows($query3) > 0) {
          while ($row = mysqli_fetch_array($query3))
          { ?>
            <a class="dropdown-item" href="#"><?php echo $row["beritajudul"] ?></a>
        <?php } } ?>          

        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<!-- akhir menu -->

<!-- slider -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/candi.jpg" alt="First slide">

      <div class="carousel-caption d-none d-md-block">
        <h1>CANDI BOROBUDUR</h1>
        <p>Sebuah candi besar peninggalan jaman Kerajaan</p>
      </div>

    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/pantai.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
      <h1>Pantai Indrayati</h1>
      <p>Sebuah pantai cantik yang berada di Pantai Jalur Selatan Yogyakarta-Pacitan</p>
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/candi2.jpg" alt="Third slide">

      <div class="carousel-caption d-none d-md-block">
      <h1>Candi Cetho</h1>
      <p>Candi peninggalan jaman Hindu-Buddha yang berada di Karang Anyar</p>
    </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- akhir slider -->

<br>

<!-- awal tabel -->

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Daftar Area</h1>
      </div>
    </div>

  <table class="table table-hover table-danger">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>Kode Area</th>
        <th>Nama Area</th>
        <th>Alamat Area</th>
        <th>Keterangan Area</th>
        <th>Kode Kabupaten</th>
        <th>Nama Kabupaten</th>
      </tr>
    </thead>

    <tbody>
      <?php $query = mysqli_query($connection, "select area.*, kabupaten.kabupatenKODE, kabupaten.kabupatenNAMA from area, kabupaten where area.kabupatenKODE = kabupaten.kabupatenKODE");
      $nomor = 1;
      while ($row = mysqli_fetch_array($query))
      { ?>
        <tr>
          <td><?php echo $nomor;?></td>
          <td><?php echo $row['areaID'];?></td>
          <td><?php echo $row['areanama'];?></td>
          <td><?php echo $row['areawilayah'];?></td>
          <td><?php echo $row['areaketerangan'];?></td>
          <td><?php echo $row['kabupatenKODE'] ?></td>
          <td><?php echo $row['kabupatenNAMA'] ?></td>
        </tr>
        <?php $nomor = $nomor + 1;?>
      <?php } ?>
    </tbody>
    
  </table>
    </div>

<!-- akhir tabel -->


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>