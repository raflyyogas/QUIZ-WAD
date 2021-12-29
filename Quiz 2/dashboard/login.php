<?php
    session_start();

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

    if(isset($_SESSION['login'])){
        header("location:index.php");
        exit;
    }

    require('config.php');

    if(isset($_POST['login'])){
        login($_POST);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rafly Yogaswara 1202190061 SI4301</title>
    <!-- style css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color:<?=$BGcolor?>;">
        <div class="container">
            <a class="navbar-brand <?=$TextC?>" href="http://localhost/QUIZ-WAD/"><strong>Xenon</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end " id="navbarNav">
                <ul class="navbar-nav ">
                    <li class='nav-item'>
                        <a class='nav-link text-secondary' href='register.php'>Register</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link <?=$TextC?>' href='login.php'>Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php if (isset($_GET['alert'])){
        if($_GET['alert'] =='logout'){
            echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Berhasil Logout</strong> Silahkan Login
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
        }
    }?>

    <?php if(isset($_SESSION['BerhasilDaftar'])) :?>
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong><?=$_SESSION['BerhasilDaftar'];?></strong> Silahkan Login
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    <?php 
        unset($_SESSION['BerhasilDaftar']);
        endif;
    ?>
    
    <?php if(isset($_SESSION['password'])) :?>
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong><?=$_SESSION['password'];?></strong> Mohon di check kembali
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    <?php 
        unset($_SESSION['password']);
        endif;
    ?>

    <?php if(isset($_SESSION['gagal'])) :?>
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong><?=$_SESSION['gagal'];?></strong> Mohon di check kembali email
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    <?php 
        unset($_SESSION['gagal']);
        endif;
    ?>
    <div class="container">
        <form action="" method="POST" class="shadow p-3 mb-5 mt-5 bg-white rounded">
            <h3 class="text-center">Login</h3>
            <hr style="height:5px;border-width:0;color:gray">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary d-grid col-6 mx-auto" name="login">Login</button
        </form>
        <p class="text-center mt-3">Belum punya akun? <a href="register.php">Register</a></p>
    </div>
    
    <footer class="footer" style="background-color:<?=$BGcolor?>;">
        <p class="text-center mt-3 <?=$TextC?>">&copy; Copyright <a href="#" data-bs-toggle="modal" data-bs-target="#identitas">RAFLY_1202190061</a></p>
    </footer>

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