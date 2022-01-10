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

    <link rel="stylesheet" type="text/css" href="stylefixx.css">
</head>
<body>
	<div class="section">
          <div class="container">
            <h3>Tambah Data Produk</h3>
            <div class="box">
              <form action="" method="POST" enctype="multipart/form-data">
               <select class="input-control" name="kategori" required>
                  <option value="">--pilih--</option>
                  <?php 
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    while($r = mysqli_fetch_array($kategori)){
                  ?>
                  <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
                  <?php } ?>
                </select>
                

                <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                <input type="file" name="gambar" class="input-control" required>
                <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                <select class="input-control" name="status">
                  <option value="">--pilih--</option>
                  <option value="1">Aktif</option>
                  <option value="0">Tidak Aktif</option>
                </select>
                <button type="submit" name="submit" value="Ubah Profil" class="btn btn-danger">Submit</button>
              </form>
              <?php 
                if(isset($_POST['submit'])){

                  $kategori   = $_POST['kategori'];
                  $nama       = $_POST['nama'];
                  $harga      = $_POST['harga'];
                  $deskripsi  = $_POST['deskripsi'];
                  $status     = $_POST['status'];

                  $filename = $_FILES['gambar']['name'];
                  $tmp_name = $_FILES['gambar']['tmp_name'];

                  $type1 = explode('.', $filename);
                  $type2 = $type1[1];

                  $newname = 'produk'.time().'.'.$type2;

                  $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                  if(!in_array($type2, $tipe_diizinkan)){

                    echo '<script>alert("Format file tidak diizinkan")</script>';
                  
                  }else {

                    move_uploaded_file($tmp_name, './gambar/'.$newname);

                    $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
                                null,
                                '".$kategori."',
                                '".$nama."',
                                '".$harga."',
                                '".$deskripsi."',
                                '".$newname."',
                                '".$status."',
                                null
                                    ) ");

                    if($insert){
                      echo '<script>alert("tambah data berhasil")</script>';
                      echo '<script>window.location="data-produk.php"</script>';
                    } else{
                      echo 'gagal' .mysqli_error($conn);
                    }
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