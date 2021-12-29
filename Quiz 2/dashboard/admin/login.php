<?php
    session_start();
    
    // if(isset($_SESSION['login'])){
    //     header("location:index.php");
    //     exit;
    // }

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
    <link rel="stylesheet" type="text/css" href="css/footer.css">

    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <a class="navbar-brand text-white" href="index.php"><strong>Xenon</strong></a>
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
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary d-grid col-6 mx-auto" name="login">Login</button
        </form>
    </div>
    
    <footer class="footer bg-primary sticky-bottom">
        <p class="text-center mt-3 text-white">&copy; Copyright <a href="#" class="text-white" data-bs-toggle="modal" data-bs-target="#identitas">RAFLY_1202190061</a></p>
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