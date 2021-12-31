<?php
    session_start();

    if(!isset($_SESSION['login'])){
        header("location:login.php");
    }
    require('config.php');

    if (!isset($_COOKIE['color'])){
        $BGcolor = '#63b9db';
        $TextC = 'text-black';
    }else{
        if($_COOKIE['color'] == '#63b9db'){
            $BGcolor = $_COOKIE['color'];
            $TextC= 'text-black';
        }elseif($_COOKIE['color'] =='#6c757d'){
            $BGcolor = $_COOKIE['color'];
            $TextC='text-white';
        }
    }
    if(isset($_POST['upload'])){    
        $id = $_POST['id'];
        $NamaUser = $_POST['NamaUser'];
        $namaAlat = $_POST['namaAlat'];
        $harga = $_POST['harga'];
        $tanggal = $_POST['tanggal'];    
        $status = $_POST['status'];
    
        $rand = rand();
        $Gambar        = $_FILES['gambar']['name'];    
        $merge         = $rand.'_'.$Gambar;
        $ekstensi      = array('png','jpg','jpeg');
        $format        = explode('.',$merge);
        $sesi          = strtolower(end($format));
        $file_tmp      = $_FILES['gambar']['tmp_name'];
        $query = "UPDATE bookings SET id='$id', bukti_pembayaran='$merge' WHERE id = '$id'";
        $insert = mysqli_query($koneksi, $query);
        header("Location:bookings.php");
    
        if (in_array($sesi,$ekstensi) === true){
        move_uploaded_file($file_tmp,'gambar/bukti/'.$merge);
        }
    }

    $id = $_GET['upload'];
    $data = mysqli_query($koneksi,"Select * from bookings where id ='$id'");
    $tampil = mysqli_fetch_assoc($data);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rafly Yogaswara | Modul 4</title>
    <!-- style css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color:<?=$BGcolor?>;">
        <div class="container">
            <a class="navbar-brand <?=$TextC?>" href="index.php"><strong>Xenon</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end " id="navbarNav">
                <ul class="navbar-nav ">
                    <div class='dropdown <?=$TextC?>'>
                        <a class='dropdown-toggle <?=$TextC?>' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>    
                            
                            Profile
                        </a>

                        <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                            <li><a class='dropdown-item' href='profile.php?users=<?=$_SESSION['id']?>'>Profile</a></li>
                            <li><a class='dropdown-item' href='config.php?logout=yes'>Logout</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <?php if(isset($_SESSION['success'])) :?>
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong><?=$_SESSION['success'];?></strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    <?php 
        unset($_SESSION['success']);
        endif;
    ?>    
    
    <?php if(isset($_SESSION['ekstensi'])) :?>
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong><?=$_SESSION['ekstensi'];?></strong> Mohon di check kembali
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    <?php 
        unset($_SESSION['ekstensi']);
        endif;
    ?>

    <?php if(isset($_SESSION['Ukuran'])) :?>
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong><?=$_SESSION['Ukuran'];?></strong> Mohon di check kembali
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    <?php 
        unset($_SESSION['Ukuran']);
        endif;
    ?>

    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data" class="form shadow p-2 mb-5 mt-3 bg-white rounded" style="width:85%">
            <h3 class="text-center mb-3"><strong>Upload Bukti Pembayaran</strong></h3>
            
            <div class="row mb-3">
                <label for="id" class="col-sm-2 col-form-label fw-bold">ID: </label>
                <div class="col-sm-10">
                    <input name="id" type="text" class="form-control" id="id" value="<?php echo $tampil['id'];?>" name="<?php echo $tampil['id'];?>" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label for="namaAlat" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="NamaUser" name="NamaUser" value="<?php echo $tampil['NamaUser'];?>" required readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label for="namaAlat" class="col-sm-2 col-form-label">Nama Alat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="namaAlat" name="namaAlat" value="<?php echo $tampil['namaAlat'];?>" required readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $tampil['harga'];?>" required readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="col-sm-2 col-form-label">Tanggal Pembelian</label>
                <div class="col-sm-10">
                    <input type="text" name="tanggal" class="form-control" id="tanggal" value="<?php echo $tampil['tanggal'];?>" required readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="status" name="status" value="<?php echo $tampil['status'];?>" required readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="status" class="col-sm-2 col-form-label">Upload File Bukti</label>
                <div class="col-sm-10">
				    <input type="file" name="gambar" id="gambar" required="required">
                </div>
            </div>
            <div class="container mt-2 text-center">
                <button type="upload" class="btn btn-primary btn-md" name="upload" id="upload">Simpan</button>
                <a href="bookings.php" class="btn btn-secondary btn-md" >Cancel</a>
            </div>
        </form>
    </div>

    <div class="footer" style="background-color:<?=$BGcolor?>;">
        <p class="text-center mt-3 <?=$TextC?>">&copy; Copyright <a href="#" data-bs-toggle="modal" data-bs-target="#identitas">RAFLY_1202190061</a></p>
    </div>

    <div class="modal fade" id="identitas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Created By</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <pre>Nama    : Rafly Yogaswara</pre>
                    <pre>NIM     : 1202190061</pre>
                </div>
            </div>
        </div>
    </div>
</body>
</html>