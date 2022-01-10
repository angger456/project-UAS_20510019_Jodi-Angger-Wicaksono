<?php 
	include "db.php";
	include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <link rel="stylesheet" type="text/css" href="stylefixx.css">
</head>
<body>
      <div class="section">
        <div class="container">
          <h3>Data Produk</h3>
          <div class="box">
            <p><a href="tambah-produk.php" class="btn btn-primary">Tambah Produk</a></p>
            <table border="1" cellspacing="0" class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Deskripsi</th>
                  <th>Gambar</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1; 
                  $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");
                  if(mysqli_num_rows($produk) > 0){
                  while ($row = mysqli_fetch_array($produk)){
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $row['category_name'] ?></td>
                  <td><?php echo $row['product_name'] ?></td>
                  <td>Rp.<?php echo number_format($row['product_price']) ?></td>
                  <td><?php echo $row['product_description'] ?></td>
                  <td><img src="gambar/<?php echo $row['product_image'] ?>" width="100px"></td>
                  <td><?php echo ($row['product_status'] == 0)? 'Tidak aktif':'Aktif'; ?></td>
                  <td>
                    <a href="edit-produk.php?id=<?php echo $row['product_id'] ?>" class="btn btn-primary">Edit</a> || <a href="proses-hapus.php?idp=<?php echo $row['product_id'] ?>" class="btn btn-danger" onclick="return confirm('hapus data?')">Hapus</a>
                  </td>
                </tr>
              <?php }}else{ ?>
                <tr>
                  <td colspan="8">Tidak ada data</td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

<footer>
  <div class="container">
    <small>Copyright &copy: 2022 | Jodi Angger Wicaksono</small>
  </div>
</footer>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>