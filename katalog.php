<?php 
	include "header.php";
	include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="stylefixx.css">

</head>
<body>
<div class="container">
  <div class="row">
      <?php 
       	$no = 1;
       	$produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");
       	if (mysqli_num_rows($produk) > 0){
       	while($row = mysqli_fetch_array($produk)){
       ?>
	
        <div class="col-md-3">
          <div class="card text-center">
            <img src="gambar/<?php echo $row['product_image']?>">
            <div class="card-body">
              <h5>T-Shirt</h5>
              <p><?php echo $row['product_name'] ?></p>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i><br><br>
               <a href="#" class="btn btn-primary" data-target="#produk1" data-toggle="modal">Detail</a>
               <a href="#" class="btn btn-danger">Rp.<?php echo number_format($row['product_price']) ?></a>
            </div>
          </div>
        </div> 
    <?php 
      }}
  ?>
  </div>
</div>

<div class="container">
  <footer class="bg-default text-dark">
    <div class="row">
      <div class="col-md-3">
        <h5>LAYANAN PELANGGAN</h5>
        <ul>
          <li>Pusat bantuan</li>
          <li>Cara pembelian</li>
          <li>Pengiriman</li>
          <li>Cara pengembalian</li>
        </ul>
      </div>
      <div class="col-md-3">
        <H5>TENTANG KAMI</H5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
      <div class="col-md-3">
        <h5>MITRA KERJASAMA</h5>
        <ul>
          <li>Gojek</li>
          <li>Grab</li>
          <li>JNE</li>
          <li>PT. POS Indonesia</li>
          <li>TIKI</li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5>HUBUNGI KAMI</h5>
        <ul>
          <li>0881-036314467</li>
          <li>@Doctrine.co</li>
        </ul>
      </div>
    </div>
  </footer>
</div>
 

  <div class="copyright text-center text-white font-weight-bold bg-warning  p-1 ">
    <p>Developed by JODI ANGGER WICAKSONO (20510019) <i class="far fa-copyright"></i> 2021</p>
  </div> 
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>