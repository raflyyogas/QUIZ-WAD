<?php
    session_start();

    if(!isset($_SESSION['login'])){
        header("location:login.php");
    }
    require('config.php');

    if(isset($_POST['update'])){
        profile($_POST);
    }

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

    $id = $_SESSION['id'];
    $query = "SELECT * FROM users WHERE id = '$id'";
    $data = mysqli_query($koneksi,$query);
    $tampil = mysqli_fetch_array($data);


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
                        Profile
                        <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>    
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

    <?php if(isset($_SESSION['update'])) :?>
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong><?=$_SESSION['update'];?></strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    <?php 
        unset($_SESSION['update']);
        endif;
    ?>
    
    <?php if(isset($_SESSION['TidakSama'])) :?>
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong><?=$_SESSION['TidakSama'];?></strong> Mohon di check kembali
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    <?php 
        unset($_SESSION['TidakSama']);
        endif;
    ?>    
    
    <?php if(isset($_SESSION['ID'])) :?>
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong><?=$_SESSION['ID'];?></strong> Mohon di check kembali
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    <?php 
        unset($_SESSION['ID']);
        endif;
    ?>

    <div class="container">
        <form action="#" method="POST" class="form shadow p-2 mb-5 mt-3 bg-white rounded" style="width:85%">
            <h3 class="text-center mb-3"><strong>Profile</strong></h3>
            
            <div class="row mb-3">
                <label for="id" class="col-sm-2 col-form-label fw-bold">ID: </label>
                <div class="col-sm-10">
                    <input name="id" type="text" class="form-control" id="id" value="<?= $tampil['id'];?>" name="<?= $tampil['id'];?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $tampil['nama'];?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="Email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?= $tampil['email'];?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="hp" class="col-sm-2 col-form-label">Nomor Handphone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="hp" name="no_hp" value="<?= $tampil['no_hp'];?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="sandi" class="col-sm-2 col-form-label">Kata sandi</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="sandi" placeholder="Kata Sandi" name="sandi">
                </div>
            </div>
            <div class="row mb-3">
                <label for="confw" class="col-sm-2 col-form-label">Konfirmasi Kata Sandi</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="conf" placeholder="Konfirmasi Kata Sandi" name="conf">
                </div>
            </div>
            <div class="container mt-2 text-center">
                <button type="submit" class="btn btn-primary btn-md" name="update" id="update">Simpan</button>
                <a href="index.php" class="btn btn-warning btn-md" >Cancel</a>
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