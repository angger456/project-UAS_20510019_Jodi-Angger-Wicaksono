<?php 
	include "db.php";
	include "header.php";

	$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
  	$p = mysqli_fetch_object($produk);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>
	<div class="section">
          <div class="container">
            <h3>Edit Data Produk</h3>
            <div class="box">
              <form action="" method="POST" enctype="multipart/form-data">
                

                <input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p->product_name ?>" required>
                <input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php echo $p->product_price ?>" required>
                
                <img src="gambar/<?php echo $p->product_image ?>" width="150px">
                <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
                <input type="file" name="gambar" class="input-control">
                <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->product_description ?></textarea>
                <select class="input-control" name="status">
                  <option value="">--pilih--</option>
                  <option value="1" <?php echo ($p->product_status == 1)? 'selected':''; ?>>Aktif</option>
                  <option value="0" <?php echo ($p->product_status == 0)? 'selected':''; ?>>Tidak Aktif</option>
                </select>
                <button type="submit" name="submit" value="Ubah Profil" class="btn btn-danger">Submit</button>
              </form>
              <?php 
                if(isset($_POST['submit'])){

                 
                  $nama       = $_POST['nama'];
                  $harga      = $_POST['harga'];
                  $deskripsi  = $_POST['deskripsi'];
                  $status     = $_POST['status'];
                  $foto     = $_POST['foto'];

                  $filename = $_FILES['gambar']['name'];
                  $tmp_name = $_FILES['gambar']['tmp_name'];

                  

                  if($filename != ''){
                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];

                    $newname = 'gambar'.time().'.'.$type2;

                    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                    if(!in_array($type2, $tipe_diizinkan)){

                    echo '<script>alert("Format file tidak diizinkan")</script>';
                  }else{
                    unlink('./produk/'.$foto);
                    move_uploaded_file($tmp_name, './gambar/'.$newname);
                    $namagambar = $newname;
                  }
                  
                  }else{
                    $namagambar = $foto;  
                  }

                  $update = mysqli_query($conn, "UPDATE tb_product SET 
                                          category_id = '".$kategori."',
                                          product_name = '".$nama."',
                                          product_price = '".$harga."',
                                          product_description = '".$deskripsi."', 
                                          product_image = '".$namagambar."', 
                                          product_status = '".$status."'
                                          WHERE product_id = '".$p->product_id."' ");
                  if($update){
                      echo '<script>alert("ubah data berhasil")</script>';
                      echo '<script>window.location="data-produk.php"</script>';
                    } else{
                      echo 'gagal' .mysqli_error($conn);
                    }

                }
              ?>
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