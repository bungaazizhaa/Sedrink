<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />

    <!-- My CSS -->
    <link rel="stylesheet" href="style.css" />

    <title>Sedrink</title>
  </head>
  <body id="home">
    <!-- Navbar -->
    <!--PHP-->
  <?php
  require_once("sparqllib.php");
  $test = "";
  if (isset($_POST['search-minuman'])) {
    $test = $_POST['search-minuman'];
    $data = sparql_get(
      "http://localhost:3030/sedrink",
      "
      PREFIX p: <http://sedrinks.com>
      PREFIX d: <http://sedrinks.com/ns/data#>

      SELECT ?Minuman ?JenisMinuman ?Pemanis ?Pengawet ?Usia ?Tersedia 
      WHERE
      { 
          ?s  d:namaMinuman ?Minuman ;
              d:JenisMinuman ?JenisMinuman;
              d:Pemanis ?Pemanis;
              d:Pengawet ?Pengawet;
              d:Usia ?Usia;
              d:Tersedia ?Tersedia;
              FILTER (regex (?Minuman,  '$test', 'i') || regex (?JenisMinuman,  '$test', 'i') || regex (?Pemanis,  '$test', 'i') || regex (?Pengawet,  '$test', 'i') || regex (?Usia,  '$test', 'i') || regex (?Tersedia,  '$test', 'i'))
            }"
    );
  } else {
    $data = sparql_get(
      "http://localhost:3030/sedrink",
      "
      PREFIX p: <http://sedrinks.com>
      PREFIX d: <http://sedrinks.com/ns/data#>

      SELECT ?Minuman ?JenisMinuman ?Pemanis ?Pengawet ?Usia ?Tersedia
      WHERE
      { 
          ?s  d:namaMinuman ?Minuman ;
              d:JenisMinuman ?JenisMinuman;
              d:Pemanis ?Pemanis;
              d:Pengawet ?Pengawet;
              d:Usia ?Usia;
              d:Tersedia ?Tersedia;
              
      }

            "
    );
  }

  if (!isset($data)) {
    print "<p>Error: " . sparql_errno() . ": " . sparql_error() . "</p>";
  }

  ?>
    <!-- Akhir Navbar -->

    <!-- Jumbotron -->
    <section class="jumbotron text-center">
      <img src="img/1.png" alt="Bunga" width="450" />
      <form action="" method="post" id="nameform">
      <div class="search-box">
        <input type="text" name="search-minuman" placeholder="Cari Minuman" />
        <button type="submit" class="btn btn-primary">Cari</button>
      </div>
      <i class="bi bi-search"></i>
      </form>
    </section>
    <!-- Akhir Jumbotron -->

    <!-- About -->
    <section id="about">
      <div class="container">
      

        <div class="row tentang">
        <div class="col-lg-6">
          <img src="img/2.jpg" alt="tentang" class="img-fluid" />
        </div>
        <div class="col-lg">
          <h3>Apa itu <span>Sedrinks ?</span></h3>
          <p>
          Sedrinks adalah sebuah website pencarian menu minuman. Dengan Sedrinks, anda bisa mengetahui
            segala tentang minuman yang akan anda pesan. Sehingga tidak khawatir lagi dengan kandungan minuman
            dan tentunya tidak salah memilih jenis minuman yang aman untuk disajikan bersama orang orang terdekat anda.
          </p>
        </div>
      </div>


      <!-- Rekomendasi Minuman -->
        <div class="row rekom row text-center mb-3">
          <div class="col">
            <h2>Cari Minumanmu !</h2>
            <br>
          </div>
        </div>
        <div class="row key">
          <div class="col-lg-3 mb-3">
            <div class="card shadow" style="width: 15rem">
              <div class="inner">
                <img src="img/a.jpg" class="card-img-top" alt="" />
              </div>
              <div class="card-body text-center">
                <h5 class="card-title">Jus</h5>
                <p class="card-text"></p>
                
              </div>
            </div>
          </div>
          <div class="col-lg-3 mb-3">
            <div class="card shadow" style="width: 15rem">
              <div class="inner">
                <img src="img/b.jpg" class="card-img-top" alt="" />
              </div>
              <div class="card-body text-center">
                <h5 class="card-title">Kopi</h5>
                <p class="card-text"></p>
                
              </div>
            </div>
          </div>

          <div class="col-lg-3 mb-3">
            <div class="card shadow" style="width: 15rem">
              <div class="inner">
                <img src="img/c.jpg" class="card-img-top" alt="" />
              </div>
              <div class="card-body text-center">
                <h5 class="card-title">Wedang</h5>
                <p class="card-text"></p>
                
              </div>
            </div>
          </div>

          <div class="col-lg-3 mb-3">
            <div class="card shadow" style="width: 15rem">
              <div class="inner">
                <img src="img/d.jpg" class="card-img-top" alt="" />
              </div>
              <div class="card-body text-center">
                <h5 class="card-title">Beer</h5>
                <p class="card-text"></p>
                
              </div>
            </div>
          </div>
        </div>

        <div class="row key">
          <div class="col-lg-3 mb-3">
            <div class="card shadow" style="width: 15rem">
              <div class="inner">
                <img src="img/e.jpg" class="card-img-top" alt="" />
              </div>
              <div class="card-body text-center">
                <h5 class="card-title">Chatime</h5>
                <p class="card-text"></p>
                
              </div>
            </div>
          </div>
          <div class="col-lg-3 mb-3">
            <div class="card shadow" style="width: 15rem">
              <div class="inner">
                <img src="img/f.jpg" class="card-img-top" alt="" />
              </div>
              <div class="card-body text-center">
                <h5 class="card-title">Milkshake</h5>
                <p class="card-text"></p>
                
              </div>
            </div>
          </div>

          <div class="col-lg-3 mb-3">
            <div class="card shadow" style="width: 15rem">
              <div class="inner">
                <img src="img/g.jpg" class="card-img-top" alt="" />
              </div>
              <div class="card-body text-center">
                <h5 class="card-title">Teh</h5>
                <p class="card-text"></p>
                
              </div>
            </div>
          </div>

          <div class="col-lg-3 mb-3">
            <div class="card shadow" style="width: 15rem">
              <div class="inner">
                <img src="img/h.jpg" class="card-img-top" alt="" />
              </div>
              <div class="card-body text-center">
                <h5 class="card-title">Es</h5>
                <p class="card-text"></p>
                
              </div>
            </div>
          </div>
        </div>

        <div class="row key">
          <div class="col-lg-3 mb-3">
            <div class="card shadow" style="width: 15rem">
              <div class="inner">
                <img src="img/i.jpg" class="card-img-top" alt="" />
              </div>
              <div class="card-body text-center">
                <h5 class="card-title">Amer</h5>
                <p class="card-text"></p>
                
              </div>
            </div>
          </div>
          <div class="col-lg-3 mb-3">
            <div class="card shadow" style="width: 15rem">
              <div class="inner">
                <img src="img/j.jpg" class="card-img-top" alt="" />
              </div>
              <div class="card-body text-center">
                <h5 class="card-title">Flat</h5>
                <p class="card-text"></p>
                
              </div>
            </div>
          </div>

          <div class="col-lg-3 mb-3">
            <div class="card shadow" style="width: 15rem">
              <div class="inner">
                <img src="img/k.jpg" class="card-img-top" alt="" />
              </div>
              <div class="card-body text-center">
                <h5 class="card-title">Air</h5>
                <p class="card-text"></p>
                
              </div>
            </div>
          </div>

          <div class="col-lg-3 mb-3">
            <div class="card shadow" style="width: 15rem">
              <div class="inner">
                <img src="img/l.jpg" class="card-img-top" alt="pad" />
              </div>
              <div class="card-body text-center">
                <h5 class="card-title">Macchiato</h5>
                <p class="card-text"></p>
                
              </div>
            </div>
          </div>
        </div>
        
      <!-- Hasil Pencarian -->

        <div class="row text-center mb-3 hasil">
          <div class="col">
            <h2>Hasil Pencarian</h2>
          </div>
        </div>
        <div class="row fs-5">
          <div class="col-md-5">
            <p>
              Menampilkan pencarian :
              <br />
            </p>
            <p>
              <span>
          <?php
          if ($test != NULL) {
            echo $test;
          } else {
            echo "Minuman yang dicari :";
          }
          ?></span>
            </p>
          </div>
        </div>
          
        <div class="row">

<?php $i = 0; ?>
<?php foreach ($data as $dat) : ?>
  <div class="col-md-4">
  <div class="box"> 
    <ul class="list-group list-group-flush">
          <div class="header-data"> <b>Nama Minuman :</b></div>
          <div class="item-data"><?= $dat['Minuman'] ?></div>
  
          <div class="header-data"> <b>Jenis Minuman :</b></div>
          <div class="item-data"><?= $dat['JenisMinuman'] ?></div>
        
          <div class="header-data"> <b>Pemanis :</b></div>
          <div class="item-data"><?= $dat['Pemanis'] ?></div>

          <div class="header-data"> <b>Pengawet :</b></div>
          <div class="item-data"><?= $dat['Pengawet'] ?></div>

          <div class="header-data"> <b>Usia :</b></div>
          <div class="item-data"><?= $dat['Usia'] ?></div>

          <div class="header-data"> <b>Tersedia Di :</b></div>
          <div class="item-data"><?= $dat['Tersedia'] ?></div>

      </ul>
    </div>
  </div>

<?php endforeach; ?>
</div>



      </div>
    </section>
    <!-- Akhir About -->

    <!-- Footer -->
    <footer class="footer text-black text-center pb-3">
      <p>Created with love <i class="bi bi-suit-heart-fill text-primary"></i> by Bunga Azizha and Sitti Ufairoh</p>
    </footer>
    <!-- Akhir Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>



